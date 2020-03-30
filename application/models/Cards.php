<?php

    class Cards extends CI_Model
    {

        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }


    
        //make a card

           
         public function makeCard()
        { 
            
            $bar0 = 5555;
            $bar1 =  mt_rand (1000,9999);

            
            
            $newcardNumber = $bar0.$bar1;
           //check if card exists
            $userid = $this->session->has_userdata('customer_id');
            $query = $this->db->get_where('card', array('cardnumber' => $newcardNumber));
            $userquery = $this->db->get_where('card',array('customer_id' => $userid));

        
        //if it doesnt

    
        if ($query->num_rows() == 0 && $userquery->num_rows() == 0)
          //create new card
         {
          
        

            $data = [
                'cardnumber' => $newcardNumber,
                'credit' => 100,
                'customer_id'=> $userid
            ];

      
        return $this->db->insert('card', $data);
          }
     } 

 }



