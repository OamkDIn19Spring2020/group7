<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SubTypes extends CI_Controller 
    {

        public function hello() 
            { 
            echo "This is hello function."; 
            }
        public function index() { 
       
            $this->load->model('Sub_type');
            $data['subtype']=$this->Sub_type->getSubtypeData();
            $this->load->view('subtypes/mainsubtype',$data);
        }

        public function subtypesRedirect()
        {
        //   check if user logged in.
            if ($this->session->has_userdata('customer_id'))
            {
                $subtypePicked =array('ID' => $this->input->post('Id_Button')); 
                $this->load->view('subtypes/buytest',$subtypePicked);
            }
            else
            {
            //get the current Url to return to
            $returnUrl = current_url().'/subtypesRedirect';
            // save the url in session data
            $this->session->set_userdata('ReturnUrl', $returnUrl);
            //need to unset after order?
             redirect('users/login');
            }
        }
}
?>
