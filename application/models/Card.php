<?php

    class Card extends CI_Model
    {

        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }

        // creat semi-random variable
        
        public function randomNum()
        {
            $bar0 = 11;
            $bar1 =  mt_rand (10,99);
            $bar2 =  mt_rand (1000,9999);
            $newcardNumber = $bar0.$bar1.$bar2;
            return $newcardNumber;

        }
    
        //make a card

           
         public function makeCard($userid)
        { 
        
            
        
        //check wether user has cards

            $userquery = $this->db->get_where('card',array('customer_id' => $userid));

        //if user doesn't exist, no card will be made
        if ($userid == NULL)
        {
            return false;
        }

        //if the input is newCard, a new card will be made and the old one deleted.
        else if($userid == 'newCard')
        {
            //get userid from userdata

            $userid = $this->session->userdata('customer_id');

            //unset userdata from old card
            $query =  $this->db->get_where('card', array('customer_id' => $userid));
            $data =  $query->row_array();
            $this->session->unset_userdata($data);

            $newcardNumber = $this->Card ->randomNum();

            //check wether the number is taken

             $query = $this->db->get_where('card', array('cardnumber' => $newcardNumber));

             //while cardnum already exists, make another cardnumber until its new.

            while ($query->num_rows() > 0  )
                {
                   $newcardNumber = randomNum();
                     $query = $this->db->get_where('card', array('cardnumber' => $newcardNumber));
                }
            
            
            //the data for the row
                  $data = [
                'card_id' => '',
                'cardnumber' => $newcardNumber,
                'credit' => 100,
                'customer_id'=> $userid
            ];

          
             $this->db->insert('card', $data);

        }
        

        //if user doesnt have any cards. create new card for this user
        else if ($userquery->num_rows() == 0)
        { 
            
            //random card number

            $newcardNumber = $this->Card ->randomNum();

            //check wether the number is taken

        $query = $this->db->get_where('card', array('cardnumber' => $newcardNumber));

        //while cardnum already exists, make another cardnumber until its new.

            while ($query->num_rows() > 0  )
            {
                 $newcardNumber = randomNum();
                 $query = $this->db->get_where('card', array('cardnumber' => $newcardNumber));
            }
            
            
            //the data for the row
                  $data = [
                'cardnumber' => $newcardNumber,
                'credit' => 100,
                'customer_id'=> $userid
            ];

        //push data into db and set the userdata for the card
        return $this->db->insert('card', $data);
          }
        
        // if card already exists just read the row from table, get the latest card.
          
            // $query =  $this->db->get_where('card', array('customer_id' => $userid));
            $query = $this->db->query("SELECT * FROM card WHERE customer_id=$userid ORDER BY card_id DESC LIMIT 1");
            $data =  $query->row_array();
            $this->session->set_userdata($data);

    
    }

     //start update cards function
     public function update_cards()
     {
     
         // Retrieve data from AJAX POST
         $data = [
                     'credit' => $this->input->post('Amount') + $this->input->post('credit'),
         ];

         
         
         // Retrieve id from AJAX POST
         $id = $this->input->post('id');
         
         // Update customer where id = $id
         $this->db->where('customer_id', $id);
         $this->db->update('card', $data);
     }


     public function cards_info()
     {
        //query for inner join of sub and subtype with card_id 
        $card_id = $this->session->userdata('card_id');
         $query = $this->db->query("SELECT sub.sub_id,sub.startdate,sub.expirydate,subtype.name,subtype.description,subtype.subtype_id FROM sub INNER JOIN subtype ON subtype.subtype_id = sub.subtype_id WHERE sub.card_id=$card_id");

         return $query->result_array();
       
     }

     public function replace_cards()
     {
        
        //get old card_id
        $old_card_id = $this->session->userdata('card_id');

        //make new card

        $this->Card->makeCard('newCard');
       
        // makeCard updates userdata, and updates session card_id

        $new_card_id = $this->session->userdata('card_id');

        //update all subs

        $this->db->query("UPDATE sub SET card_id = $new_card_id WHERE card_id = $old_card_id");

        //delete old card
        $this->db->delete('card', array('card_id'=>$old_card_id));

       
     }

     public function card_info_get()
     {
        //Get the card info and set it as userdata
        $data['card_info'] = $this->Card->cards_info();
        $this->session->set_userdata($data);
       
     }


 }



