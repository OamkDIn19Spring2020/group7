<?php

    class Order extends CI_Model
    {

        public function __construct()
        {


        }


        public function get_sub()
        {
            $subtypePicked = $this->session->userdata('subtypePicked');
            $cardId = $this->session->userdata('card_id');

            $this->db->where('subtype_id', $subtypePicked);
            $this->db->where('card_id', $cardId);
            $userSub = $this->db->get('sub');

            
            if ($userSub->num_rows() == 1)
            {
                return $userSub->row_array();

            }
            else 
            {
                return FALSE;
            }
        }

        public function update_sub($expiryDate, $extensionPeriod)
        {

            $newExpiryDate = "DATE_ADD( '{$expiryDate}' , INTERVAL {$extensionPeriod} DAY)";

            $subtypePicked = $this->session->userdata('subtypePicked');
            $cardId = $this->session->userdata('card_id');

            $this->db->set('expirydate', $newExpiryDate, false);
            $this->db->where('subtype_id', $subtypePicked);
            $this->db->where('card_id', $cardId);
            $this->db->update('sub');
        }

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
