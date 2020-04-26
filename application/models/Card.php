<?php

    class Card extends CI_Model
    {

        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }

        //Start randomNum function, creates semi-random variable
        public function randomNum()
        {
        //The random number is split in 3, of which 2 are generated so the process is easier for the server instead of 1 big random number.   
            $bar0 = 11;
            $bar1 =  mt_rand (10,99);
            $bar2 =  mt_rand (1000,9999);
            $newcardNumber = $bar0.$bar1.$bar2;
            return $newcardNumber;

        }
    
        //Start makeCard() function
        //This functions either. 1.Makes a card for user with no cards. 2.Replaces existing card with new card. 
         public function makeCard($userid)
        { 

        //check wether user has cards.
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

            //create new card number
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

            //insert the data into the database.
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
            $this->db->insert('card', $data);
          }
        
        // if card exists, get the row information of the latest card and push it into the userdata.
        
            $query = $this->db->query("SELECT * FROM card WHERE customer_id=$userid ORDER BY card_id DESC LIMIT 1");
            $data =  $query->row_array();
            $this->session->set_userdata($data);
            

    
    }

     //start update cards function
    public function update_credit($data)
     {
     
         // Retrieve id from AJAX POST
         $id = $this->session->userdata('customer_id');
         
         // Update card table where customer_id = $id
         $this->db->where('customer_id', $id);
         $this->db->update('card', $data);
     }

     //start cards_info function. This function read the active subs on the card.
    public function cards_info($cardid)
     {
        //query for inner join of sub and subtype with card_id 
        $query = $this->db->query("SELECT sub.sub_id,sub.startdate,sub.expirydate,subtype.name,subtype.description,subtype.subtype_id FROM sub INNER JOIN subtype ON subtype.subtype_id = sub.subtype_id WHERE sub.card_id=$cardid");
        //returns the active subs on the card with the $cardid
        return $query->result_array();
       
     }

     //start replace_card function
    public function replace_cards()
     {
        
        //get old card_id
        $old_card_id = $this->session->userdata('card_id');

        //make new card Sends 'newCard' value to initiate the correct function.
        $this->Card->makeCard('newCard');
       
        //makeCard() updates userdata, and updates session card_id
        //New card id is retrieved, to transfer the subs. 
        $new_card_id = $this->session->userdata('card_id');

        //update all subs active on old card, to be active on new card.
        $this->db->query("UPDATE sub SET card_id = $new_card_id WHERE card_id = $old_card_id");

        //delete old card
        $this->db->delete('card', array('card_id'=>$old_card_id));
     }

     //start get function, this function retrieves the row of the card specified by the $cardid
    public function get($cardid)
      {
        $query = $this->db->query("SELECT * FROM card WHERE card_id=$cardid ORDER BY card_id DESC LIMIT 1");
        //returns the query, which is a database object. Needs to processed to be a row_array();
        return $query;
      }

      //end of Card Model.
 }



