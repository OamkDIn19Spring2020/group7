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
        // public function SubTypeChosen()
        // {
        //     $subtypePicked = array(
        //         'SubTypeChosen'=>$this->input->post('Id_Button')
        //     );
        // }

        public function subtypesRedirect()
        {
            $subtypePicked = $this->input->post('Id_Button');

            // if ($this->session->has_userdata('customer_id'))
            {
                $this->load->view('subtypes/buytest',$subtypePicked);
            }
            // else
            // {
            // $this->load->view('users/login');
            // }
        }
}
?>
