<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BuyPages extends CI_Controller {

    public function index()
    {
        // Save the Id what was picked from sub types.
        if ($this->input->post('Id_Button') != null)
        {
        $subtypePicked =$this->input->post('Id_Button'); 
        $this->session->set_userdata('SubTypePicked' , $subtypePicked);
        }

         //   check if user logged in.
        if ($this->session->has_userdata('customer_id'))
        {            
            $this->load->view('subtypes/buytest');
        }
         
        else
        {
        //get the current Url to return to
        $returnUrl = current_url();
        // save the url in session data
        $this->session->set_userdata('ReturnUrl', $returnUrl);
        //need to unset after order?
        redirect('users/login');
        }
    }
}

?>
