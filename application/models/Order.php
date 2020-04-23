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
            $cardid =$this->session->userdata('card_id');
            $subPicked =$this->session->userdata('SubTypePicked');
            $subtyperow = $this->db->get_where('subtype',['subtype_id'=>$subPicked])->row_array();
            $subCost = $subtyperow['cost'];
            if ($credits - $subCost < 0)
            {
                //Has money
                $countedCredits = $credits - $subCost;
                $newCredits =['credit'=> $countedCredits];

                $data = [
                    'startdate' =>$subStartDate,
                    'expirydate'=>$subEndDate,
                    'subtype_id' =>$subPicked,
                    'card_id'=>$cardid
                ];

                $Test =  $this->db->insert('sub', $data);
                $Test += $this->db->update('card', $newCredits);
                if ($Test == TRUE)
                {
                    return 1;
                }
                else {
                    return 3;
                    }
                }   
                else {
                //too poor add credits peasant.
                return 2;
            }
        }
    }