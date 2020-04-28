<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order');
        $this->load->model('Card');
        $this->load->model('Sub_type');
    }

    public function index()
    {

            // On order page load set passed values into session
            $subtypePicked = $this->input->get('subtype_id'); 
            $subtype = $this->Sub_type->getSubtypeById($subtypePicked);
            $subtypeName = $subtype['name'];
            $subtypeCost = $subtype['cost'];
                
            $this->session->set_userdata('subtypePicked' , $subtypePicked);
            $this->session->set_userdata('subtypeName' , $subtypeName);
            $this->session->set_userdata('subtypeCost', $subtypeCost);

        // If user is logged in
        if ($this->session->has_userdata('customer_id'))
        {
            // Don't allow user to pass infromation through url
            if ($this->input->get('subtype_id') == null)
            {
                redirect('SubTypes');
            }

            $this->check_sub_status();
        }
        else 
        {
                //get the current Url to return to
                $returnUrl = current_url();
            
                // save the url in session data
                $this->session->set_userdata('ReturnUrl', $returnUrl);

                //need to unset after order?
                $this->load->view('users/login');
        }
    }

    public function order()
    
    {
        // If the user tried to type in the url and he didn't pass extension period
        if ($this->input->post('extension_period') != null)
        {
            $currentCredit = (integer) $this->session->userdata('credit');
            $subCost = $this->input->post('cost');

            // The user has already subscribed before and has enough credit
            if ($currentCredit >= $subCost)
            {
                $extensionPeriod = $this->input->post('extension_period');
                $expiryDate = $this->session->userdata('expirydate');
                $today = $this->get_today_date();

                if ($expiryDate > $today)
                {
                    // Update active subcription
                    $this->Order->update_sub($expiryDate, $extensionPeriod);
                }
                else
                {
                    // Update expired subscription
                    $this->Order->update_sub($today, $extensionPeriod);
                }


                // Deduct subscription cost from user credit
                $newCredit = [ 
                                'credit' => $currentCredit - $subCost
                            ];

                $this->Card->update_credit($newCredit);

                // Reset credit session
                $this->session->unset_userdata('credit');
                $this->session->set_userdata($newCredit);

                $this->session->set_flashdata('success', '$(\'#success\').modal(\'show\');');

                $this->check_sub_status();
            }
            
            // The user has already subscribed before but has no enough credit
            else if ($currentCredit < $subCost)
            {
                $hasCredit = false;
                
                // Card_tab will be used to redirect user to card tab view
                $this->session->set_userdata('card_tab', true);

                $this->check_sub_status($hasCredit);
            }
        }
        else
        {
            redirect('SubTypes');
        }
    }

    public function order_new()
    {
        // If the user tried to type in the url and he didn't pass extension period
        if ($this->input->post('extension_period') != null)
        {
            $currentCredit = (integer) $this->session->userdata('credit');
            $subCost = $this->input->post('cost');

            // The user does not have subscription but has enough credit
            if ($currentCredit >= $subCost)
            {
                //Get todays date and adds the extension period to date.
                $startDate = $this->get_today_date();
                $extensionPeriod = $this->input->post('extension_period');
                $expiryDate = "DATE_ADD('{$startDate}', INTERVAL {$extensionPeriod} DAY)";

                $this->Order->insert_sub($startDate, $expiryDate, $extensionPeriod);

                // New credit amount
                $newCredit = $currentCredit - $subCost;

                //Update the new credit amount in session data.
                $this->session->unset_userdata('credit');
                $this->session->set_userdata('credit', $newCredit);

                $sub = $this->Order->get_sub();

                $this->session->set_userdata($sub);

                $this->session->set_flashdata('success', '$(\'#success\').modal(\'show\');');

                $this->check_sub_status();
            }

            // The User does not have subscription and has no enough credits
            else if ($currentCredit < $subCost)
            {
                $hasCredit = false;

                // Card_tab will be used to redirect user to card tab view
                $this->session->set_userdata('card_tab', true);

                $this->check_sub_status($hasCredit);
            }
        }

        else
        {
            redirect('SubTypes');
        }
    }

    public function check_sub_status($hasCredit = true)
    {

            // Check if the user has pervious subscription
            if ($sub = $this->Order->get_sub())
            {
                $this->session->unset_userdata($sub);
                $this->session->set_userdata($sub);

                // Get how many days till sub expire
                $expiryDate= new Datetime($this->session->userdata('expirydate'));
                $today = new DateTime("now");

                // Subscription still active
                if ($expiryDate > $today)
                {
                    $interval = $expiryDate->diff($today);
                    $data['timeLeft'] = 'Your subscription will expire in ' . $interval->days . ' Days';
                    $data['status'] = 'Extend your subscription';
                    $data['hasCredit'] = $hasCredit;
                    $this->load->view('subtypes/order', $data);
                 }

                // Subscription expired
                else
                {
                    $data['timeLeft'] = 'You subscription has expired';
                    $data['status'] = 'Renew your subscription';
                    $data['hasCredit'] = $hasCredit;
                    $this->load->view('subtypes/order',$data);

                }

            }

            // User Didn't subscribe before
            else
            {
                $this->session->unset_userdata('sub_id');
                $this->session->unset_userdata('startdate');
                $this->session->unset_userdata('expirydate');
                $this->session->unset_userdata('subtype_id');

                $data['timeLeft'] = 'You have not subscribed Yet!';
                $data['status'] = 'Subscribe';
                $data['hasCredit'] = $hasCredit;
                $this->load->view('subtypes/order', $data);
            }
    }


    // Generate today's date
    function get_today_date()
    {
        //load date helper
        $this->load->helper('date');

        $format = "%Y-%m-%d";
        return @mdate($format);
    }
}

?>
