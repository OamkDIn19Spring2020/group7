<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		$this->load->view('include/header.php');
        $this->load->view('include/nav.php');
        $this->load->view('pages/index.php');
        $this->load->view('include/footer.php');
	}
}
