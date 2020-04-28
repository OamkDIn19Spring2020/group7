<?php

    class Sub_type extends CI_model
    {
        public function __construct()
        {
            //Codeigniter : Write Less Do More
            parent::__construct();
            $this->load->database();
        }
        public function getSubtypeData()
        {
            return $this->db->get('subtype')->result_array();
        }
        
        public function getSubtypeById($id)
        {
            $this->db->where('subtype_id', $id);
            return $this->db->get('subtype')->row_array();
        }


    }
 
