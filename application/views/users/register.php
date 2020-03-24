<div class="container"><!-- Container Start -->
    <div class="row mt-3 justify-content-center">
        <div class="card card-body col-md-8 bg-light shadow-lg  mt-5"><!-- Card Start -->
            <form class="form-row" action="" method=""><!-- Form Start -->

                <h2 class="form-text col-12 text-center mb-5">Create an account</h2>
                <p class="form-text col-12 text-danger font-italic">
                    <small>Required fields are marked by
                        <strong><abbr title="required"> (*) </abbr></strong>
                    </small>
                </p>

                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="fname">First name</label>
                    <div class="input-group">
                        <input class="form-control" type="text" id="fname" placeholder="First name"
                                name="firstname" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="lname">Last name</label>
                    <div class="input-group">
                        <input class="form-control" type="text" id="lname" placeholder="Last name"
                                name="lastname" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="email">Email</label>
                    <div class="input-group">
                        <input class="form-control" type="email" id="email" placeholder="Email"
                                name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="cnfm_email">Confirm email</label>
                    <div class="input-group">
                        <input class="form-control" type="email" id="cnfm_email" placeholder="Confirm email"
                                name="" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="pwd">Password</label>
                    <div class="input-group">
                        <input class="form-control" type="password" id="pwd" placeholder="Password"
                                name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="cnfm_pwd">Confirm password</label>
                    <div class="input-group">
                        <input class="form-control" type="password" id="cnfm_pwd" placeholder="Confirm password"
                                name="" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-white text-danger">*</div>
                        </div>
                    </div><!-- Input Group -->
                </div><!-- Form Group -->

                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="bday">Birthday</label>
                    <input class="form-control" type="text" id="bday" placeholder="Birthday"
                            name="birthday" onfocus="(this.type='date')" onblur="(this.type='text')">
                </div><!-- Form Group -->

                <div class="form-group col-lg-6">
                    <label class="form-control-label sr-only" for="phone">Phone number</label>
                    <input class="form-control" type="text" id="phone" placeholder="Phone number"
                            name="phone">
                </div><!-- Form Group -->

                <div class="form-group col-12 mb-5">
                    <label class="form-control-label sr-only" for="address">Address</label>
                    <input class="form-control" type="text" id="address" placeholder="Address"
                            name="address">
                </div><!-- Form Group -->

                <div class="col-12 mb-3">
                    <input class="btn btn-primary btn-block text-center" type="submit" value="Register">
                </div><!-- Submit -->

                <div class="col-12 text-center">
                    <span>Have an account? </span><a class="text-decoration-none" href="#">Login</a>
                </div>

            </form><!-- Form End -->
        </div><!-- Card End -->
    </div>
</div><!-- Container End -->
