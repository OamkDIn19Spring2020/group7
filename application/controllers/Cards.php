<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cards extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Card');
    }

    // Start card_info function
    public function card_info()
    {
        //This function retrieves all the sub info on the card with the model.
        $data['card_info'] = $this->Card->cards_info($this->session->userdata('card_id'));
        $this->session->set_userdata($data);
        $this->load->view('users/profile');
    }


    
     // Start update_cards Function
    public function update_cards()
     {
        // Dropdown list doesn't need validation neccessarily

         // Retrieve data from AJAX POST
         $data = [
                     'credit' => $this->input->post('Amount') + $this->session->userdata('credit'),
         ];
             
        // Update user infromation in database
        $this->Card->update_credit($data);
             
        // Get data with the card_id
        $card_data = $this->Card->get($this->session->userdata('card_id'))->row_array();
 
        // Clean last registered session
        $this->session->unset_userdata($card_data);
 
        // Create new session with new user information
        $this->session->set_userdata($card_data);
             
        // Send a success update feedback
        $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="flash-msg">Cards updated successfully.</div>');
 
        // Load profile view
        redirect('users/profile');
    
     }

     // Start Cards Function
     public function replace_cards()
     {
         //dropdown list doesn't need validation neccessarily

             // Update user infromation in database
             $this->Card->replace_cards();
 
             // Get user data by id
             $card_data = $this->Card->get($this->session->userdata('card_id'))->row_array();
 
             // Clean last registered session
             $this->session->unset_userdata($card_data);
 
             // Create new session with new user information
             $this->session->set_userdata($card_data);

             $this->card_info();
             // Send a success update feedback
             $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="flash-msg">Cards replaced successfully.</div>');
 
             // Load profile view
             redirect('users/profile');

     }


//End of cards controller
}

?>
