<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cards extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Card');
    }

    
    public function card_info()
    {
        $data['card_info'] = $this->Card->cards_info($this->input->post('id'),$this->input->post('card_id'));
        $this->session->set_userdata($data);
        $this->load->view('users/profile');
    }

}

?>