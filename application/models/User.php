<?php

    class User extends CI_Model
    {
        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }

        public function register()
        {
            // Hashing Password
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            // Retrieving user inputs from POST and store it in $data array
            $data = [
                        'email' => $this->input->post('email'),
                        'password' => $password,
                        'firstname' => $this->input->post('firstname'),
                        'lastname' => $this->input->post('lastname'),
                        'birthday' => $this->input->post('birthday'),
                        'phone' => $this->input->post('phone'),
                        'address' => $this->input->post('address')
            ];

            // Inserting into customer table
            return $this->db->insert('customer', $data);
        }

    }
