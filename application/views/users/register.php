<?php include (APPPATH . '/views/include/header.php'); ?>
<?php include (APPPATH . '/views/include/nav.php'); ?>
<!-- Container Start -->
<div class="container">
    <div class="row mt-3 justify-content-center">
        <!-- Card Start -->
        <div class="card card-body col-md-8 bg-light shadow-lg  mt-5">

            <!-- CI form helper -->
            <?php echo form_open('Users/register', 'class="form-row"'); ?><!-- Form Start -->

                <h2 class="form-text col-12 text-center mb-5">Create an account</h2>
                <p class="form-text col-12 text-danger font-italic">
                    <small>Required fields are marked by
                        <strong><abbr title="required"> (*) </abbr></strong>
                    </small>
                </p>

                <!-- First Name -->
                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="fname">First name</label>
                    <div class="input-group">
                        <input class="form-control <?php echo (!empty(form_error('firstname'))) ? "is-invalid" : ""; ?>"
                                type="text" id="fname" placeholder="First name"
                                name="firstname" value="<?php echo set_value('firstname'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                        <!-- CI Form Validation -->
                        <?php echo form_error('firstname', '<span class="invalid-feedback">', '</span>'); ?>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <!--Last Name -->
                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="lname">Last name</label>
                    <div class="input-group">
                        <input class="form-control <?php echo (!empty(form_error('lastname'))) ? "is-invalid" : ""; ?>"
                                type="text" id="lname" placeholder="Last name"
                                name="lastname" value="<?php echo set_value('lastname'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                        <!-- CI Form Validation -->
                        <?php echo form_error('lastname', '<span class="invalid-feedback">', '</span>'); ?>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <!-- Email -->
                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="email">Email</label>
                    <div class="input-group">
                        <input class="form-control <?php echo (!empty(form_error('email'))) ? "is-invalid" : ""; ?>"
                                type="email" id="email" placeholder="Email"
                                name="email" value="<?php echo set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                        <!-- CI Form Validation -->
                        <?php echo form_error('email', '<span class="invalid-feedback">', '</span>'); ?>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <!-- Confirm Email -->
                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="cnfm_email">Confirm email</label>
                    <div class="input-group">
                        <input class="form-control <?php echo (!empty(form_error('cnfm_email'))) ? "is-invalid" : ""; ?>"
                                type="email" id="cnfm_email" placeholder="Confirm email"
                                name="cnfm_email" value="<?php echo set_value('cnfm_email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                        <!-- CI Form Validation -->
                        <?php echo form_error('cnfm_email', '<span class="invalid-feedback">', '</span>'); ?>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <!-- Password -->
                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="pwd">Password</label>
                    <div class="input-group">
                        <input class="form-control <?php echo (!empty(form_error('password'))) ? "is-invalid" : ""; ?>" 
                                type="password" id="pwd" placeholder="Password" 
                                name="password" value=""> 
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                        <!-- CI Form Validation -->
                        <?php echo form_error('password', '<span class="invalid-feedback">', '</span>'); ?>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <!-- Confirm Password -->
                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="cnfm_pwd">Confirm password</label>
                    <div class="input-group">
                        <input class="form-control <?php echo (!empty(form_error('cnfm_password'))) ? "is-invalid" : ""; ?>" type="password" id="cnfm_pwd"
                                placeholder="Confirm password" name="cnfm_password"
                                value="">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                        <!-- CI Form Validation -->
                        <?php echo form_error('cnfm_password', '<span class="invalid-feedback">', '</span>'); ?>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <!-- Birthday -->
                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="bday">Birthday</label>
                    <input class="form-control" type="text" id="bday" placeholder="Birthday"
                            name="birthday" value="<?php echo set_value('birthday'); ?>"
                            onfocus="(this.type='date')" onblur="(this.type='text')">
                </div><!-- Form Group -->

                <!-- Phone Number -->
                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="phone">Phone number</label>
                    <input class="form-control" type="text" id="phone" placeholder="Phone number"
                            name="phone" value="<?php echo set_value('phone'); ?>">
                </div><!-- Form Group -->


                <!-- Address -->
                <div class="form-group col-12 mb-5">
                    <label class="form-control-label sr-only" for="address">Address</label>
                    <input class="form-control" type="text" id="address" placeholder="Address"
                            name="address" value="<?php echo set_value('address'); ?>">
                </div><!-- Form Group -->

                <!-- Submit -->
                <div class="col-12 mb-3">
                    <input class="btn btn-primary btn-block text-center" type="submit" value="Register">
                </div><!-- Submit -->

                <!-- Have an account? -->
                <div class="col-12 text-center">
                    <span>Have an account? </span><a class="text-decoration-none" href="#">Login</a>
                </div>

            </form><!-- Form End -->
        </div><!-- Card End -->
    </div>
</div><!-- Container End -->
<?php include (APPPATH . '/views/include/footer.php'); ?>
