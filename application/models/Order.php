<?php

    class Order extends CI_Model
    {
        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }
        // Get all the variables.
        public function Order($subStartDate,$subEndDate)
        {
            $credits =$this->session->userdata('credits');
            $credits =settype($credits,"integer");
            $cardid =$this->session->userdata('card_id');
            $subPicked =$this->session->userdata('SubTypePicked');
            $subtyperow = $this->db->get_where('subtype',['subtype_id'=>$subPicked])->row_array();
            $subCost = $subtyperow['cost'];
            $subCost= settype($subCost,"integer");
            //Check if user has credits for the sub
            if (($credits-$subCost )>= 0)
            {
                //Has money
                $countedCredits = $credits - $subCost;
                $newCredits =['credit'=> $countedCredits];
                $data=
                    [
                    'startdate' =>$subStartDate,
                    'expirydate'=>$subEndDate,
                    'subtype_id' =>$subPicked,
                    'card_id'=>$cardid
                    ];

                $Test =  $this->db->insert('sub', $data);
                
                
                //Insert was OK if true
                if ($Test == TRUE)
                    {
                    $Test = $this->db->update('card', $newCredits);
                        if ( $Test == TRUE)
                            {
                                $this->session->set_userdata('credits',$countedCredits);
                                // All Ok 
                                return 1; 
                            }
                        else
                            {
                            // failure to update credits to DB
                            return 4;    
                            }
                    }
                    else 
                    {
                        // failure in insert $data to sub DB
                        return 3;
                    }
            }

            else {
                    //too poor add credits you peasant. They are free. Eat some cake too.
                return 2;
            }
        }
        public function OrderExtend($daysToextend)
        {
            //this was set in sub model when we checked if had active sub of this type
            $subIdToExtend = $this->session->userdata('subIdtoExtend');
            $subExDateToExtend = $this->session->userdata('expiryDateToExtend');
            //So we have the Id of sub to extend, End date and the amount of days to extend
            //need to check credits and subcost
            $credits =$this->session->userdata('credits');
            $credits =settype($credits,"integer");
            $subPicked =$this->session->userdata('SubTypePicked');
            $subtyperow = $this->db->get_where('subtype',['subtype_id'=>$subPicked])->row_array();
            $subCost = $subtyperow['cost'];
            $subCost= settype($subCost,"integer");
            //has lot of same code with Order function? merge or split credit check??

           if (($credits-$subCost )>= 0)
           {
            $countedCredits = $credits - $subCost;
            $newCredits =['credit'=> $countedCredits];

            // how to init $builder?

            


            // $builder = $this->db->table('sub');
            // $builder ->where('sub_id',$subIdToExtend);
            // $data =[ 'SELECT DATE_ADD("$subExDateToExtend", INTERVAL 30*$daysToextend DAY )' ];


            $sql = "SELECT DATE_ADD('$subExDateToExtend', INTERVAL 30*$daysToextend DAY ) WHERE sub_id = $subIdToExtend";
            $quary = $this->db->update($sql,'sub');

           }
           else{
               //too poor no credits
               return 2;
           }

        }
        
    
    }
