<?php

    class User extends CI_Model
    {
        public function __construct()
        {
            // Load CI database library
            $this->load->database();
        }

        // Start Get Function
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
                $query = $this->db->get_where('customer', array('customer_id' => $id));
                return $query;
            }
            else
            {
                // Return record that match $email
                $query = $this->db->get_where('customer', array('email' => $email));
                return $query;
            }
        }

        // Start Register Function
        public function register()
        {
            // Clean password
            $password = $this->security->xss_clean($this->input->post('password'));

            // Hash Password
            $password = password_hash($password, PASSWORD_DEFAULT);

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

        // Start Authenticate Function
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

        // Start Profile Update Function
        public function update_profile()
        {
            // Retrieve data from AJAX POST
            $data = [
                        'firstname' => $this->input->post('firstname'),
                        'lastname' => $this->input->post('lastname'),
                        'birthday' => $this->input->post('birthday'),
                        'phone' => $this->input->post('phone'),
                        'address' => $this->input->post('address')
            ];

            // Retrieve id from AJAX POST
            $id = $this->input->post('id');

            // Update customer where id = $id
            $this->db->where('customer_id', $id);
            $this->db->update('customer', $data);
        }

        // Start Email Update Function
        public function update_email()
        {
            // Retrieve data from AJAX POST
            $data = [
                        'email' => $this->input->post('email'),
            ];

            // Retrieve id from AJAX POST
            $id = $this->input->post('id');

            // Update customer where id = $id
            $this->db->where('customer_id', $id);
            $this->db->update('customer', $data);
        }

       // Start Password Update Function 
        public function update_password()
        {

            // Retrieve data from AJAX POST
            $oldpassword = $this->security->xss_clean($this->input->post('oldpassword'));
            $newpassword = $this->security->xss_clean($this->input->post('newpassword'));


            // Retrive id from AJAX POST
            $id = $this->input->post('id');

            // Get user hashed password by id
            $hashed_password = $this->get($id)->row_object()->password;

            // If old password matches hashed password in database
            if (password_verify($oldpassword, $hashed_password))
            {
                // Hash user new password
                $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
                
                // Update user password with the new password
                $this->db->where('customer_id', $id);
                $this->db->update('customer', array('password' => $newpassword));

                return true;
            }

            // User entered wrong old password
            else
            {
                if (strlen($oldpassword) > 6)
                {
                    return false;
                }
            }

        }

        // Start Delete Account Funtion
        public function delete_account()
        {
            // Retrieve id from AJAX POST
            $id = $this->input->post('id');

            // Update customer where id = $id
            $this->db->where('customer_id', $id);
            $this->db->delete('customer');
        }
}
