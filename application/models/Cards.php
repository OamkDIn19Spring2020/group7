<?php

    class Cards extends CI_Model
    {

        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }


        public function randomcardNumber()
        {   
            // construct random 8 digit number

            $bar0 = 55;
            $bar1 =  mt_rand (10,99);
            $bar2 =  mt_rand (10,99);
            $bar3 =  mt_rand (10,99);

            $newNumber = $bar0.$bar1.$bar2.$bar3; 
            return $newNumber;
        }

        //make a card

           
         public function makeCard()
        {
           //check if card exists
            $userid = $this->session->has_userdata('customer_id');
            $query = $this->db->get_where('cards', array('cardnumber' => $newcardNumber));
            $userquery = $this->db->get_where('cards',array('customer' => $userid));

        
        //if it doesnt

    
        if ($query->num_rows() == 0 && $userquery->num_rows() == 0)
          //create new card
         {
            $newcardNumber = randomcardNumber();
        

            $data = [
                'cardnumber' => $newcardNumber,
                'credits' => '0',
                'customer_id'=> $userid
            ];

      
        return $this->db->insert('cards', $data);

        }


       
 
        } 

    }



