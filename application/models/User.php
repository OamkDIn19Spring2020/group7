<?php

    class User extends CI_Model
    {
        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }

        // Start get function
        public function get($id = false, $email = false)
        {
            // If no $id passed return all records in customer table
            if ($id === false && $email === false)
            {
                $query = $this->db->get('customer');
                return $query->row_array();
            }
            else if($email === false)
            {
                // Return record that match $id
                $query = $this->db->get_where('customer', array('id' => $id));
                return $query;
            }
            else
            {
                // Return record that match $email
                $query = $this->db->get_where('customer', array('email' => $email));
                return $query;
            }
        }

        // Start register function
        public function register()
        {
            // Hash Password
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            // Retrieve user inputs from POST and store it in $data array
            $data = [
                        'email' => $this->input->post('email'),
                        'password' => $password,
                        'firstname' => $this->input->post('firstname'),
                        'lastname' => $this->input->post('lastname'),
                        'birthday' => $this->input->post('birthday'),
                        'phone' => $this->input->post('phone'),
                        'address' => $this->input->post('address')
            ];

            // Insert into customer table
            return $this->db->insert('customer', $data);
        }

        // Start login function
        public function authenticate()
        {
            // Check if the email entered by the user exists
            $user = $this->get('', $this->security->xss_clean($this->input->post('email')));

            // Retrieve user inserted password and clean it
            $password = $this->security->xss_clean($this->input->post('password'));

            // If get() returns a row
            if ($user->num_rows() == 1) {
                // User email exists

                // Retrieve hashed password
                $hashed_password = $user->row_object()->password;

                // Check hashed password against password inserted by user
                if (password_verify($password, $hashed_password))
                {
                    // If password verified, return user information
                    return $user->row_array();
                }
                else
                {
                    // User entered wrong password
                    return false;
                }
            }
            else
            {
                // User email does not exists
                 return false;
            }
        }
    }
