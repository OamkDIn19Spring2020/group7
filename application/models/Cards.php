<?php

    class Cards extends CI_Model
    {
        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }

        public function randomcardNumber();
        {   
            // construct random 12 digit number

            $bar0 = 55;
            $bar1 =  mt_rand (10,99);
            $bar2 =  mt_rand (1000,9999);
            $bar3 =  mt_rand (1000,9999);

            $newNumber = $bar0.$bar1.$bar2.$bar3; 
            return $newNumber;
        }

        //make a card
         public function makeCard()
        {

        $newcardNumber = randomcardNumber();
        
        //check if card exists

        $sqlfind = "SELECT * FROM CARDS WHERE cardID = '".$newcardNumber."';" ;
        $result = $this->db->query($sqlfind);
        
        //if it doesnt
        if ($result->num_rown < 1)
        {

            $data = [
                'cardnumber' => $newcardNumber,
                'credits' => '0',
            ];

        //create new card
        return $this->db->insert('cards', $data);

         }


       
 } 

}

?>

  
