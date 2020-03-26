<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>
<!-- Container Start -->
<div class="container">
    <div class="row mt-3 justify-content-center">
        <!-- Card Start -->
        <div class="card card-body col-md-7 bg-light shadow-lg  mt-5">

            <!-- CI form helper -->
            <?php echo form_open('Users/login', 'class="form-row"'); ?>
            <!-- Form Start -->

            <h2 class="form-text col-12 text-center mb-5">Log in</h2>

            <!-- Email -->
            <div class="form-group col-xl-12">
                <label class="form-control-label sr-only" for="email">Email</label>
                <input class="form-control <?php echo (!empty(form_error('email'))) ? "is-invalid" : ""; ?>" type="email" id="email" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
                <!-- CI Form Validation -->
                <?php echo form_error('email', '<span class="invalid-feedback">', '</span>'); ?>
            </div><!-- Form Group -->

            <!-- Password -->
            <div class="form-group col-xl-12">
                <label class="form-control-label sr-only" for="pwd">Password</label>
                <input class="form-control <?php echo (!empty(form_error('password'))) ? "is-invalid" : ""; ?>" type="password" id="pwd" placeholder="Password" name="password" value="">
                <!-- CI Form Validation -->
                <?php echo form_error('password', '<span class="invalid-feedback">', '</span>'); ?>
            </div><!-- Form Group -->

            <!-- Submit -->
            <div class="col-12 mb-3">
                <input class="btn btn-primary btn-block text-center" type="submit" value="Login">
            </div><!-- Submit -->

            <!-- Have an account? -->
            <div class="col-12 text-center">
                <span>No account? </span><a class="text-decoration-none" href="<?php echo site_url('users/register'); ?>">Register</a>
            </div>

            </form><!-- Form End -->
        </div><!-- Card End -->
    </div>
</div><!-- Container End -->
<?php include(APPPATH . '/views/include/footer.php'); ?>