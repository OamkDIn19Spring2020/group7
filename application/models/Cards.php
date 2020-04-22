<?php

    class Cards extends CI_Model
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

           
         public function makeCard($userID)
        { 
        
            

        //check wether user has cards

            $userid = $userID;
            $userquery = $this->db->get_where('card',array('customer_id' => $userid));

        
        //if user doesnt have any cards.
        if ($userquery->num_rows() == 0)
           
            
        //create new card for this user

         {

            //random card number

            $newcardNumber = $this->Cards->randomNum();

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
        $this->session->set_userdata($data);
        return $this->db->insert('card', $data);
          }
        
        // if card already exists just read the row from table
          else
          {
            $query =  $this->db->get_where('card', array('customer_id' => $userid));
            $data =  $query->row_array();
            $this->session->set_userdata($data);
          }

     } 

 }


