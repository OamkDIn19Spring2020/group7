<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('include/header.php');
        $this->load->view('include/nav.php');
        $this->load->view('users/register.php');
        $this->load->view('include/footer.php');
	}

    public function register()
    {
        $this->load->model('User');
        $this->User->register();


        $this->load->view('include/header.php');
        $this->load->view('include/nav.php');
        $this->load->view('users/login.php');
        $this->load->view('include/footer.php');
    }
}
