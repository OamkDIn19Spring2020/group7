<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load user model
        $this->load->model('User');
    }

    // Start Register Function
    public function register()
    {
        // Load CI form validation library
        $this->load->library('form_validation');

        // Calling the rules in form_validation.php
        if ($this->form_validation->run() === false)
        {
            // If logged in redirect to home page
            if ($this->session->has_userdata('customer_id'))
            {
                redirect('pages');
            }
            // Reload registration form if is invalid
            $this->load->view('users/register');
        }
        else
        {
            // Call Model register method if is valid and load login page
            if ($this->User->register())
            {
                // Setting flash message that will be displayed in login view
                $this->session->set_flashdata('success', '<div class="alert alert-success" id="flash-msg">Registered successfully. You can log in now.</div>');

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
                redirect('pages');
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
            redirect('pages');
        }
        else
        {
            // If user unauthenticated display failed login message and redirect to login again
            $this->session->set_flashdata('fail', '<div class="alert alert-danger" id="flash-msg">Email or Password is invalid. Please try again.</div>');
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
}
