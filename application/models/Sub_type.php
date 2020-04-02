<?php

    class Sub_type extends CI_model
    {
        public function __construct()
        {
            //Codeigniter : Write Less Do More
            parent::__construct();
        }
        public function getSubtypeData()
        {
            return $this->db->get('subtype')->result_array();
        }
    }
