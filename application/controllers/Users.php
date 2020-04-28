<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load user model
        $this->load->model('User');

        // Load card model
        $this->load->model('Card');
    }

    // Start Register Function
    public function register()
    {
        // Calling the rules from form_validation.php
        if ($this->form_validation->run() === false)
        {
            // If logged in redirect to home page
            if ($this->session->has_userdata('customer_id'))
            {
                redirect('pages');
            }

            // Reload registration form if form is invalid
            $this->load->view('users/register');
        }
        else
        {
            // Call Model register method if form is valid and load login page
            if ($this->User->register())
            {    
                // Setting flash message that will be displayed in login view
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="flash-msg">Registered successfully</div>');
                
                redirect('users/login');
            }
            else
            {
                // If for some reason user couldn't register, kill it(the page:)
                die('Something went wrong! try again later');
            }

        }
    }

    // Start Login Function
    public function login()
    {     
            // If logged in redirect to home page
            if ($this->session->has_userdata('customer_id'))
            {
                redirect('users/profile');
            }
            else
            {
                // Load login view
                $this->load->view('users/login');
            }
           

    }

    // Start Authentication Function
    public function authenticate()
    {
        // If user authenticated continue to set session
        if ($user = $this->User->authenticate())
        {

            // Set user session
            $this->session->set_userdata($user);
            // Make a card if card doesnt exist, or read cards. 
            $this->Card->makeCard($this->session->userdata('customer_id'));
    
            // Session values set on BuyPages.php
            $redirect = $this->session->userdata('ReturnUrl');

            // If the user is coming from Subtype page redirect him to Buy page after logging in
            if(isset($redirect))
            {
                $this->session->unset_userdata('ReturnUrl');
                redirect($redirect . "/?subtype_id=" . $this->session->userdata('subtypePicked') . "&name=" . $this->session->userdata('subtypeName') . "&cost=" . $this->session->userdata('subtypeCost'));
            }
            
            // Redirect to profil if $redirect doesn't carry a value
            redirect('Pages');
        }
        else
        {
            // If user unauthenticated display failed login message and redirect to login again
            $this->session->set_flashdata('fail', '<div class="alert alert-danger text-center" id="flash-msg">Email or Password is invalid. Please try again.</div>');
            $this->login();
        }
    }

    // Start Logout Function
    public function logout()
    {
        // User clicked on logout
        // Unset user session
        $this->session->unset_userdata($this->session->userdata());

        // Destroy user session
        $this->session->sess_destroy();

        redirect('users/login');
    }

    // Start Profile Function
    public function profile()
    {  

        if($this->uri->segment(3) == true)
        {
            $this->session->set_userdata('card_tab',true);
        }
        // Restrict non logged users from accessing profile page
        if (!$this->session->has_userdata('customer_id'))
        {
            redirect('pages');
        }

        // Calling the rules from form_validation.php
        if ($this->form_validation->run() === false)
        {
            // Reload profile view
            $this->load->view('users/profile');
        }
        else
        {
            // Update user infromation in database
            $this->User->update_profile();
            // Get user data by id
            $user = $this->User->get($this->session->userdata('customer_id'))->row_array();

            // Clean last registered session
            $this->session->unset_userdata($user);

            // Reset session values with new user information
            $this->session->set_userdata($user);
            
            // Send a feedback
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="flash-msg">Profile updated successfully.</div>');

            // Load profile view
            $this->load->view('users/profile');
        }
    }


    // Start Account Function
    public function update_email()
    {
 
        // Calling the rules from form_validation.php
        if ($this->form_validation->run() === false)
        {
            // Reload profile view
            $this->load->view('users/profile');
        }
        else
        {
            // Update user infromation in database
            $this->User->update_email();

            // Get user data by id
            $user = $this->User->get($this->session->userdata('customer_id'))->row_array();

            // Clean last registered session value for email
            $this->session->unset_userdata('email');

            // Create new session with new user email
            $this->session->set_userdata('email', $user['email']);
            
            // Send a success update feedback
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="flash-msg">Email updated successfully.</div>');

            // Load profile view
            redirect('users/profile');
        }
    }

    // Start Update Password Function
    public function update_password()
    {
        // Calling the rules from form_validation.php
        if ($this->form_validation->run() === false)
        {
            // Reload profile view
            $this->load->view('users/profile');
        }
        else
        {
            // Update user infromation in database
            if ($this->User->update_password())
            {
                // Send a success update feedback
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="flash-msg">Password updated successfully.</div>');
                redirect('users/profile');
            }
            else
            {
                // If user entered wrong old password display failed login message and load profile view
                $this->session->set_flashdata('fail', '<div class="alert alert-danger text-center" id="flash-msg">Password is invalid. Please try again.</div>');
                redirect('users/profile');
            }
        }
            

    }

    

    // Start Delete Account Function
    public function delete_account()
    {
        // Call delete_account from User model
        $this->User->delete_account();

        // Unset user session
        $this->session->unset_userdata($this->session->userdata());

        // Destroy user session
        $this->session->sess_destroy();

        // Redirect to home page
        redirect('pages/index');
    }

    public function aboutus()
    {
        $this->load->view('etc/aboutus');
        
    }


}
