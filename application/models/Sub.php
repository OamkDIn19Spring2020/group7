<?php

class Sub extends CI_Model
{

    public function __construct()
    {
        // Load CI database library
        $this->load->database();
    }
    public function HasActiveSub()
    {
        $subTypePicked = $this->session->userdata('SubTypePicked');
        $cardId = $this->session->userdata('card_id');

        // Does this work? 2 requirements for get where
        $subRow = $this->db->get_where('sub',array('card_id'=>$cardId,'subtype_id'=>$subTypePicked) );

        // Should work as live version of database one card only can have one active sub of each type.
        // So if we found one we will ask if they want to extend the sub
        
        
        if ($subRow->num_rows() == 1)
        {
            $data = $subRow->row_array();
            $subTypeId = $data['subtype_id'];
            $EndDate = $data['expirydate'];
            $data2=$data['sub_id'];
            //need to add to order model? Know the ID of the sub to extend
            $this->session->set_userdata('subIdtoExtend',$data2);
            $this->session->set_userdata('expiryDateToExtend' ,$EndDate );
            //Return end date to Controller
            return $EndDate;
        }
        else 
        {
            // dosent have active sub for that subtype Id
            return FALSE;
        }
    }
}
