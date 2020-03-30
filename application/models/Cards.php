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

           
         public function makeCard()
        { 
        
            

        //check if card exists

            $userid = $this->session->has_userdata('customer_id');
            $userquery = $this->db->get_where('card',array('customer_id' => $userid));

        
        //if it doesnt

    
        if ($userquery->num_rows() == 0)
           
            
        //create new card

         {
            $newcardNumber = $this->Cards->randomNum();

            $query = $this->db->get_where('card', array('cardnumber' => $newcardNumber));
        
            while ($query->num_rows() > 0  )
            {
                 $newcardNumber = randomNum();
                 $query = $this->db->get_where('card', array('cardnumber' => $newcardNumber));
            }
            
            

                  $data = [
                'cardnumber' => $newcardNumber,
                'credit' => 100,
                'customer_id'=> $userid
            ];

        //push data into db
        return $this->db->insert('card', $data);
          }
     } 

 }



