<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    // Start Register Function
    public function register()
    {
        // Load user model
        $this->load->model('User');

        // Load CI form validation library
        $this->load->library('form_validation');

        // Calling the rules in form_validation.php
        if ($this->form_validation->run() === FALSE)
        {
            // Reload registration form if is invalid
            $this->load->view('users/register');
        }
        else
        {
            // Call Model register method if is valid and load login page
            $this->User->register();
            redirect('users/login');
        }
    }

    // Start Login Function
    public function login()
    {
        $this->load->view('users/login');
        // TODO

    }
}
