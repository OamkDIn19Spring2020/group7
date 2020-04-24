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
                //this could be skipped or changed if extends a sub?
                //the sub_id from userdata 'subIdtoExtend'
                // only need to update end date + 30 days or 60 days
                $data = [
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
    }
