
<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="card text-center col-md-12 bg-light shadow-lg mt-5">
            <div class="card-header bg-light">
                <h5 class="card-title">Personal Settings</h5>
            </div>
            <div class="card-body row tab-content p-3" id="personal-info-content">
                <ul class="nav nav-pills col-lg-3 flex-column p-3" id="personal-info" role="tablist" aria-orientation="vertical">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">Account</a>
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
                <div class="col-lg-9 tab-pane fade mt-4 p-3" id="account" role="tabpanel" aria-labelledby="account-tab">
                
                    <!-- Form Start -->
                    <!-- <?php echo form_open('Users/register', 'class="form-row"'); ?>-->

                        <!-- Email -->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-lg-3" for="email">Email</label>
                            <input class="form-control col-lg-9 <?php echo (form_error('email')) ? "is-invalid" : ""; ?>" type="email" id="email"  name="email" value="<?php echo $this->session->userdata('email'); ?>">
                            <!-- CI Form Validation -->
                             <?php echo form_error('email', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->

                        <!-- Old Password -->
                        <div class="form-group row col-lg-12">
                            <label class="form-control-label col-3" for="pwd">Old password</label>
                            <input class="form-control col-9 <?php echo (form_error('old_password')) ? "is-invalid" : ""; ?>" type="password" id="old_pwd" name="old_password" value="">
                             <!-- CI Form Validation -->
                             <?php echo form_error('new_password', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->

                        <!-- New Password -->
                        <div class="form-group row col-lg-12 mb-4">
                            <label class="form-control-label col-3" for="cnfm_pwd">New password</label>
                            <input class="form-control col-9 <?php echo (form_error('new_password')) ? "is-invalid" : ""; ?>" type="password" id="new_pwd"  name="new_password" value="">
                             <!-- CI Form Validation -->
                             <?php echo form_error('old_password', '<span class="invalid-feedback">', '</span>'); ?>
                        </div><!-- Form Group -->
                        <!-- Submit -->
                        <div class="d-flex justify-content-end col-12">
                            <input class="btn btn-primary text-center" type="submit" value="Update account">
                        </div><!-- Submit -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function update_profile(form) {

        var html = document.querySelector('html');
        var inputs = []; 
        var xhttp = new XMLHttpRequest();
        for (element of form.elements)
        {
            if (element.hasAttribute("name"))
            {
                inputs.push(element);
            }

        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                html.innerHTML  = this.responseText;
            }
        };
        xhttp.open(form.method , form.action, true);
        xhttp.setRequestHeader('Content-Type', form.enctype);
        xhttp.send('<?php echo "id=" . $this->session->userdata('customer_id'); ?>' + '&' + 'firstname=' + inputs[0].value + '&' + 'lastname=' + inputs[1].value);
    }
</script>
<?php include(APPPATH . '/views/include/footer.php'); ?>
