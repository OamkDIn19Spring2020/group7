<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class SubTypes extends CI_Controller 
    {
        //Loads the model what returns from database the subtypes table as row array.  
        public function index() 
        { 
            $this->load->model('Sub_type');
            $data['subtype']=$this->Sub_type->getSubtypeData();
            $this->load->view('subtypes/subtype', $data);
        }
    }

?>
