
<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="card text-center col-md-12 bg-light shadow-lg mt-5">
            <div class="card-header bg-light">
                <h5 class="card-title">Personal Settings</h5>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('fail'); ?>
            </div>
            <div class="card-body row tab-content p-3" id="personal-info-content">
                <ul class="nav nav-pills col-lg-3 flex-column p-3" id="personal-info" role="tablist" aria-orientation="vertical">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cards-tab" data-toggle="pill" href="#cards" role="tab" aria-controls="cards" aria-selected="false">cards</a>
                    </li>
                </ul>
                <div class="col-lg-9 mt-4 p-3 tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <!-- Form Start -->
                    <?php echo form_open('Users/profile', 'class="form-row" id="profile-form" onsubmit="update_profile(this); return false;"'); ?>

                        <!-- First Name -->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="fname">First name</label>
                            <input class="form-control col-lg-9 <?php echo (form_error('firstname')) ? "is-invalid" : ""; ?>" type="text" id="fname" name="firstname" value="<?php echo (form_error('firstname')) ? set_value('firstname') : $this->session->userdata('firstname'); ?>">
                            <!-- CI Form Validation -->
                            <?php echo form_error('firstname', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->
                          
                        <!--Last Name -->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="lname">Last name</label>
                            <input class="form-control col-lg-9 <?php echo (form_error('lastname')) ? "is-invalid" : ""; ?>" type="text" id="lname" name="lastname" value="<?php echo (form_error('lastname')) ? set_value('lastname') : $this->session->userdata('lastname'); ?>">
                            <!-- CI Form Validation -->
                            <?php echo form_error('lastname', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->

                        <!-- Birthday -->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="bday">Birthday</label>
                            <input class="form-control col-lg-9" type="text" id="bday" name="birthday" value="<?php echo $this->session->userdata('birthday'); ?>" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div><!-- Form Group -->

                        <!-- Phone Number -->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="phone">Phone number</label>
                            <input class="form-control col-lg-9" type="text" id="phone" name="phone" value="<?php echo $this->session->userdata('phone'); ?>">
                        </div><!-- Form Group -->

                        <!-- Address -->
                        <div class="form-group row col-12 mb-4">
                            <label class="form-control-label col-lg-3" for="address">Address</label>
                            <input class="form-control col-lg-9" type="text" id="address" name="address" value="<?php echo $this->session->userdata('address'); ?>">
                        </div><!-- Form Group -->

                        <!-- Submit -->
                        <div class="d-flex justify-content-end col-lg-12">
                            <input class="btn btn-primary text-center" type="submit" value="Update profile">
                        </div><!-- Submit -->
                   </form>
                </div>

                <!-- cards tab -->

                <div class="col-lg-9 mt-4 p-3 tab-pane fade" id="cards" role="tabpanel" aria-labelledby="cards-tab">

                    <!-- Form Start -->
                    <?php echo form_open('Users/update_cards', 'class="form-row" id="cards-form" onsubmit="update_cards(this); return false;"'); ?>

                        <!-- Card number-->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="cardnumber">Cardnumber:</label>
                            <input class="form-control col-lg-9 <?php echo (form_error('cardnumber')) ? "is-invalid" : ""; ?>" readonly type="text" id="cardnumber" name="cardnumber" value="<?php echo $this->session->userdata('cardnumber'); ?>">
                            <!-- CI Form Validation -->
                            <?php echo form_error('cardnumber', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->

                          <!-- Credits -->
                          <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="credit">Credits:</label>
                            <input class="form-control col-lg-9 <?php echo (form_error('credit')) ? "is-invalid" : ""; ?>"  type="text" id="credit" name="credit" value="<?php echo $this->session->userdata('credit'); ?>">
                            <!-- CI Form Validation -->
                            <?php echo form_error('credit', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->

                         <!-- There are no functions yet used by this tab -->
                         <!-- Submit -->
                        <div class="d-flex justify-content-end col-lg-12">
                            <input class="btn btn-primary text-center" type="submit" value="Update cards">
                        </div>
                        <!-- Submit -->
                   </form>
                </div>

                <div class="col-lg-9 tab-pane fade mt-4 p-3" id="account" role="tabpanel" aria-labelledby="account-tab">

                    <!-- Form Start -->
                    <?php echo form_open('Users/update_email', 'class="form-row" id="email-form" onsubmit="update_email(this); return false;"'); ?>

                        <!-- Email -->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="email">Email</label>
                            <div class="input-group col-lg-9">
                                <input class="form-control <?php echo (form_error('email')) ? "is-invalid" : ""; ?>" type="email" id="email"  name="email" value="<?php echo (form_error('email')) ? set_value('email') : $this->session->userdata('email'); ?>">
                                <div class="input-group-append">
                                    <input class="btn btn-primary text-center" type="submit" value="Change email">
                                </div>
                            </div>
                            <!-- CI Form Validation -->
                            <?php echo form_error('email', '<span class="input-group-prepend invalid-feedback justify-content-center" styles="display:flex">', '</span>'); ?>
                        </div><!-- Form Group -->
                    </form>

                <hr class="mb-4">

                    <!-- Form Start -->
                    <?php echo form_open('Users/update_password', 'class="form-row" id="password-form" onsubmit="update_password(this); return false;"'); ?>

                        <!-- Old Password -->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="pwd">Old password</label>
                            <input class="form-control col-lg-9 <?php echo (form_error('oldpassword')) ? "is-invalid" : ""; ?>" type="password" id="old_pwd" name="oldpassword" value="">
                             <!-- CI Form Validation -->
                             <?php echo form_error('oldpassword', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->

                        <!-- New Password -->
                        <div class="form-group row col-lg-12 mb-4">
                            <label class="form-control-label col-lg-3" for="cnfm_pwd">New password</label>
                            <input class="form-control col-lg-9 <?php echo (form_error('newpassword')) ? "is-invalid" : ""; ?>" type="password" id="new_pwd"  name="newpassword" value="">
                             <!-- CI Form Validation -->
                             <?php echo form_error('newpassword', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->
                        <!-- Submit -->
                        <div class="d-flex justify-content-end col-12">
                            <input class="btn btn-primary text-center" type="submit" value="Change password">
                        </div><!-- Submit -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

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

    //update cards function.

    function update_cards(form) {

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

        var account_tab = document.querySelector('#cards-tab');
        account_tab.classList.add("active");

        var profile = document.querySelector('#profile');
        profile.classList.remove("show");
        profile.classList.remove("active");
        
        var account = document.querySelector('#cards');
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

</script>
<?php include(APPPATH . '/views/include/footer.php'); ?>
