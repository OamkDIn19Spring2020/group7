<?php

    class Sub_type extends CI_model
    {
        public function __construct()
        {
            //Codeigniter : Write Less Do More
            parent::__construct();

            // Load CodeIgniter Libary for databases
            $this->load->database();
        }
        public function getSubtypeData()
        {
            return $this->db->get('subtype')->result_array();
        }
    }