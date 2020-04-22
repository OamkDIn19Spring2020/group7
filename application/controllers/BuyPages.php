<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SubTypes extends CI_Controller {

    public function index()
    {
        // Save the Id what was picked from sub types.
        $subtypePicked =array('ID' => $this->input->post('Id_Button')); 
        $this->session->set_userdata('SubTypePicked' , $subtypePicked);

         //   check if user logged in.
        if ($this->session->has_userdata('customer_id'))
            {
                //Check the variable is there
            if($subtypePicked != $this->session->userdata('SubTypePicked'))
            {      
                $subtypePicked == $this->session->userdata('SubTypePicked');
            }
            $this->load->view('subtypes/buytest',$subtypePicked);
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
