<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BuyPages extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Load Order model
        $this->load->model('Order');
        $this->load->model('Sub');

    }

    public function index()
    {
        $this->load->library('calendar');
        // Save the Id what was picked from sub types.
        if ($this->input->post('Id_Button') != null)
        {
        $subtypePicked =$this->input->post('Id_Button'); 
        $this->session->set_userdata('SubTypePicked' , $subtypePicked);
        }

         //   check if user logged in.
        if ($this->session->has_userdata('customer_id'))
        {       
            //Checks if card id has active sub for this Subtype. Return
            $hasActiveSub =$this->Sub->HasActiveSub();
            $this->load->view('subtypes/buytest',$hasActiveSub);
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
    public function orderSub()
    {
        $subStartDate = $this->input->post('startdate');
        $subEndDate   = $this->input->post('enddate');
        //put those as vars
        $result =$this->Order->Order($subStartDate,$subEndDate);
        if ($result == 1)
        {
            //All ok
            $data['test'] = 'Successful';
            $this->load->view('pages/buy',$data);
            $this->output->set_header('refresh:5;url="../users/profile');
            
        }
       else if ($result == 2)
        {
            // too poor
            $data['test'] = 'Not enough credits';
            $this->load->view('pages/buy',$data);
        }
        else if ($result == 3)
        {
            // error in database insert
            $data['test'] = 'Database insert error';
            $this->load->view('pages/buy',$data);
        }
        else if ($result == 4)
        {
            // error in credit update
            $data['test'] = 'credit update error';
            $this->load->view('pages/buy',$data);
        }
        else{
            //Something went really wrong.
            $data['test'] = 'Something went really wrong';
            $this->load->view('pages/buy',$data);
        }
    }
    public function updateSub()
    {
        //gets from buytest view radio buttons 1 or 2 value.So easy to use as multiplier. 2=60 days
        $daysToextend =$this->input->post('Extension');
        
        $result = $this->Order->OrderExtend($daysToextend);
    }
}

?>
