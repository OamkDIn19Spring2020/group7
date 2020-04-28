<?php

    class Order extends CI_Model
    {

        public function __construct()
        {


        }

        //This function checks if the user card has active subscription for this type of subtype.
        public function get_sub()
        {
            $subtypePicked = $this->session->userdata('subtypePicked');
            $cardId = $this->session->userdata('card_id');

            $this->db->where('subtype_id', $subtypePicked);
            $this->db->where('card_id', $cardId);
            //So we try to get the row where the Subtype_id and card_id match
            $userSub = $this->db->get('sub');

            // In here check the row if it has a value of 1.
            if ($userSub->num_rows() == 1)
            {
                return $userSub->row_array();

            }
            else 
            {
                return FALSE;
            }
        }
        
        //Function is used to update a function if one already exist.
        public function update_sub($expiryDate, $extensionPeriod)
        {
            //
            $newExpiryDate = "DATE_ADD( '{$expiryDate}' , INTERVAL {$extensionPeriod} DAY)";

            $subtypePicked = $this->session->userdata('subtypePicked');
            $cardId = $this->session->userdata('card_id');

            $this->db->set('expirydate', $newExpiryDate, false);
            $this->db->where('subtype_id', $subtypePicked);
            $this->db->where('card_id', $cardId);
            $this->db->update('sub');
        }

        //Function is used to insert a new sub into database
        public function insert_sub($startDate, $expiryDate, $extensionPeriod)
        {

            $subtypePicked = $this->session->userdata('subtypePicked');
            $cardId = $this->session->userdata('card_id');

            $this->db->set('startdate', $startDate);
            $this->db->set('expirydate', $expiryDate, false);
            $this->db->set('card_id', $cardId);
            $this->db->set('subtype_id', $subtypePicked);
            $this->db->where('subtype_id', $subtypePicked);
            $this->db->where('card_id', $cardId);
            $this->db->insert('sub');
        }
    
    }
