<?php
    class Pages extends CI_controller
    {
     public function view($page = "home")
     {
        if(!file_exists(APPPATH.'views/Pages/'.$page.'.php'))
        {
            show_404();
        }
        // insert data into title what can be called on the pages
        // in  this $title will get the bages file name
         $data['title'] = ucfirst($page);

        // makes the basic core of the page. 
        //load the header then the page it self and then the footer
        //header start the html and body tags and footer closes them
         $this ->load->view('templates/Header');
         $this ->load->view('Pages/'.$page , $data);
         $this ->load->view('templates/Footer');
     }   
    }