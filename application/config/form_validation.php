<?php

// Form Validation rules
$config = [
            [
                'field' => 'firstname',
                'label' => 'first name',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'lastname',
                'label' => 'last name',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'is_unique[customer.email]|valid_email|required|trim',
                'errors' => [ 
                                'is_unique' => 'Email is already taken.'
                            ]
            ],
            [
                'field' => 'cnfm_email',
                'label' => 'confirm email',
                'rules' => 'matches[email]|valid_email|required|trim',
                'errors' => [
                                'matches' => 'Email does not match.'
                            ]
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'min_length[6]|required|trim',
                'errors' => [
                                'min_length' => 'Enter at least 6 characters.'
                            ]
            ],
            [
                'field' => 'cnfm_password',
                'label' => 'confirm password',
                'rules' => 'min_length[6]|matches[password]|required|trim',
                'errors' => [
                                'matches' => 'Password does not match.',
                                'min_length' => 'Enter at least 6 characters.'
                            ]
            ]
];
