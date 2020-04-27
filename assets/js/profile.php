<script>
    var body = document.querySelector('body');
    body.addEventListener('load', card_tab());
    // Show no_credit modal if the user doesn't have enough credit
   function card_tab()
   {
        // Check for 'card_tab' session if exist open card_tab
        <?php if ($this->session->userdata('card_tab')) {
                    $this->session->unset_userdata('card_tab');?>
            
            var profile_tab = document.querySelector('#profile-tab');
            profile_tab.classList.remove("active");

            var account_tab = document.querySelector('#cards-tab');
            account_tab.classList.add("active");

            var profile = document.querySelector('#profile');
            profile.classList.remove("show");
            profile.classList.remove("active");
        
            var account = document.querySelector('#cards');
            account.classList.add("show");
            account.classList.add("active");
                    
        <?php };?>
   }

    // Get 'name=value' string from all input fields in a form
    function get_name_value(form)
    {
        var parameters = "";

        for (element of form.elements)
        {
            if (element.hasAttribute("name"))
            {
                parameters += element.name + "=" + element.value + "&";
            }
            else
            {
                continue;
            }
        }

        // truncate the last & from parameters and return it
        return parameters.substring(0, parameters.lastIndexOf('&'));
    }
    
    // Ajax request to update user profile
    function update_profile(form) {

        // Create XMLHttpRequest new object
        var xhttp = new XMLHttpRequest();

        // Check if response received successfully
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var html = document.querySelector('html');

                // Assign response to HTML element
                html.innerHTML  = this.responseText;

                // set flashdata to expire after 1 sec
                var flashdata = document.querySelector('#flash-msg');
                setTimeout(function() {
                    flashdata.parentNode.removeChild(flashdata);
                    <?php $this->session->set_flashdata('success', ''); ?>
                }, 2000);
            }
        };

        // Open AJAX request
        xhttp.open(form.method , form.action, true);
        // Set AJAX request header encryption type
        xhttp.setRequestHeader('Content-Type', form.enctype);
        // Send data within header
        xhttp.send('<?php echo "id=" . $this->session->userdata('customer_id'); ?>' + '&' + get_name_value(form));
    }

    function update_email(form) {

        // Create XMLHttpRequest new object
        var xhttp = new XMLHttpRequest();

        // Check if response received successfully
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var html = document.querySelector('html');

                // Assign response to HTML element
                html.innerHTML = this.responseText;

                var profile_tab = document.querySelector('#profile-tab');
                profile_tab.classList.remove("active");

                var account_tab = document.querySelector('#account-tab');
                account_tab.classList.add("active");

                var profile = document.querySelector('#profile');
                profile.classList.remove("show");
                profile.classList.remove("active");

                
                var account = document.querySelector('#account');
                account.classList.add("show");
                account.classList.add("active");

                // set flashdata to expire after 1 sec
                var flashdata = document.querySelector('#flash-msg');
                console.log(flashdata);
                setTimeout(function() {
                    flashdata.parentNode.removeChild(flashdata);
                    console.log(flashdata);
                    <?php $this->session->set_flashdata('success', ''); ?>
                }, 2000);
            }
        };

        // Open AJAX request
        xhttp.open(form.method , form.action, true);
        // Set AJAX request header encryption type
        xhttp.setRequestHeader('Content-Type', form.enctype);
        // Send data within header
        xhttp.send('<?php echo "id=" . $this->session->userdata('customer_id'); ?>' + '&' + get_name_value(form));
    }

    function update_password(form) {

        // Create XMLHttpRequest new object
        var xhttp = new XMLHttpRequest();

        // Check if response received successfully
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
        
                var html = document.querySelector('html');

                // Assign response to HTML element
                html.innerHTML  = this.responseText;

                var profile_tab = document.querySelector('#profile-tab');
                profile_tab.classList.remove("active");

                var account_tab = document.querySelector('#account-tab');
                account_tab.classList.add("active");

                var profile = document.querySelector('#profile');
                profile.classList.remove("show");
                profile.classList.remove("active");
                
                var account = document.querySelector('#account');
                account.classList.add("show");
                account.classList.add("active");

                // set flashdata to expire after 1 sec
                var flashdata = document.querySelector('#flash-msg');
                setTimeout(function() {
                    <?php $this->session->set_flashdata('success', ''); ?>
                    flashdata.parentNode.removeChild(flashdata);
                }, 2000);

            }
        };

        // Open AJAX request
        xhttp.open(form.method , form.action, true);
        // Set AJAX request header encryption type
        xhttp.setRequestHeader('Content-Type', form.enctype);
        // Send data within header
        xhttp.send('<?php echo "id=" . $this->session->userdata('customer_id'); ?>' + '&' + get_name_value(form));
    }


    // Change "Delete account tab" styles when active
    function delete_account_style(){
        setTimeout(function() {
            var deleteAccount = document.querySelector("#delete-account-tab");
            if (deleteAccount.classList.contains('active'))
            {
                deleteAccount.classList.replace('text-danger', 'text-white');
            }
            else
            {
                deleteAccount.classList.remove('bg-danger');
                deleteAccount.classList.replace('text-white', 'text-danger');
            }
        }, 0.1);
    }


    //update cards function.
    function update_cards(form) 
    {

         // Create XMLHttpRequest new object
         var xhttp = new XMLHttpRequest();

         // Check if response received successfully
        xhttp.onreadystatechange = function() 
        {

        if (this.readyState == 4 && this.status == 200) 
        {

            var html = document.querySelector('html');

            // Assign response to HTML element
             html.innerHTML  = this.responseText;

            var profile_tab = document.querySelector('#profile-tab');
            profile_tab.classList.remove("active");

            var account_tab = document.querySelector('#cards-tab');
            account_tab.classList.add("active");

            var profile = document.querySelector('#profile');
            profile.classList.remove("show");
            profile.classList.remove("active");
        
            var account = document.querySelector('#cards');
            account.classList.add("show");
            account.classList.add("active");

            // set flashdata to expire after 2 sec
            var flashdata = document.querySelector('#flash-msg');
            setTimeout(function() 
            {
                <?php $this->session->set_flashdata('success', ''); ?>
                flashdata.parentNode.removeChild(flashdata);
            }, 2000);

        }
        };

    // Open AJAX request
    xhttp.open(form.method , form.action, true);
    // Set AJAX request header encryption type
    xhttp.setRequestHeader('Content-Type', form.enctype);
    // Send data within header
    xhttp.send('<?php echo "id=" . $this->session->userdata('customer_id'); ?>' + '&' + get_name_value(form));

    //end update_cards function
    }


    //start card info
    function card_info(form) 
        {

        // Create XMLHttpRequest new object
        var xhttp = new XMLHttpRequest();

        // Check if response received successfully
        xhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {

            var html = document.querySelector('html');

            // Assign response to HTML element
            html.innerHTML  = this.responseText;

            var profile_tab = document.querySelector('#profile-tab');
            profile_tab.classList.remove("active");

            var account_tab = document.querySelector('#cards-tab');
            account_tab.classList.add("active");

            var profile = document.querySelector('#profile');
            profile.classList.remove("show");
            profile.classList.remove("active");

            var account = document.querySelector('#cards');
            account.classList.add("show");
            account.classList.add("active");
            
            //show the modal with the active subs. 
            $('#card_infos').modal('show');
            
            }
        };

    // Open AJAX request
    xhttp.open(form.method , form.action, true);
    // Set AJAX request header encryption type
    xhttp.setRequestHeader('Content-Type', form.enctype);
    // Send data within header
    xhttp.send('<?php echo "id=" . $this->session->userdata('customer_id') . "&" .  "card_id=" . $this->session->userdata('card_id'); ?>');

    //end card_info function
    }



    //start replace cards function
    function replace_cards(form) 
    {

        // Create XMLHttpRequest new object
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {

            var html = document.querySelector('html');

            // Assign response to HTML element
             html.innerHTML  = this.responseText;

            var profile_tab = document.querySelector('#profile-tab');
            profile_tab.classList.remove("active");

            var account_tab = document.querySelector('#cards-tab');
            account_tab.classList.add("active");

            var profile = document.querySelector('#profile');
            profile.classList.remove("show");
            profile.classList.remove("active");
        
            var account = document.querySelector('#cards');
            account.classList.add("show");
            account.classList.add("active");

            // set flashdata to expire after 2 sec
            var flashdata = document.querySelector('#flash-msg');
            setTimeout(function() 
            {
                <?php $this->session->set_flashdata('success', ''); ?>
                flashdata.parentNode.removeChild(flashdata);
            }, 2000);

            }
        };

    // Open AJAX request
    xhttp.open(form.method , form.action, true);
    // Set AJAX request header encryption type
    xhttp.setRequestHeader('Content-Type', form.enctype);
    // Send data within header
    xhttp.send('<?php echo "card_id=" . $this->session->userdata('card_id'); ?>');

    //end replace_card function
    }
</script>
