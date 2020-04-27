
<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="card text-center col-md-12 bg-light shadow-lg mt-5">
            <div class="card-header bg-light">
                <h4 class="card-title">User Profile</h4>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('fail'); ?>
            </div>
            <div class="card-body row tab-content p-2" id="personal-info-content">
                
                <ul class="nav nav-pills col-lg-3 flex-column p-3" id="personal-info" role="tablist" aria-orientation="vertical">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" onclick="delete_account_style()" role="tab" aria-controls="profile" aria-selected="true"><b>Profile</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" onclick="delete_account_style()" role="tab" aria-controls="account" aria-selected="false"><b>Account</b></a>
                    </li>

                    <li class="nav-item">
                    <hr class="mb-3">
                        <a class="nav-link" id="cards-tab" data-toggle="pill" href="#cards" onclick="delete_account_style()" role="tab" aria-controls="cards" aria-selected="false"><b>Cards</b></a>
                    </li>

                    <li class="nav-item">
                    <hr class="mb-3">
                        <a class="nav-link text-danger" id="delete-account-tab" data-toggle="pill" href="#delete-account" onclick="delete_account_style()" role="tab" aria-controls="delete account" aria-selected="false"><b>Delete account</b></a>
                    </li>
                </ul>
                <!-- Profile tab -->
                <div class="col-lg-9 p-3 mt-3 tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!--Tab title-->
                    <h5>Personal Settings</h5>
                    <hr class="mb-3">
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
                        <div class="row justify-content-end col-lg-12">
                            <input class="btn btn-primary text-center" type="submit" value="Update profile">
                        </div><!-- Submit -->
                   </form>
                </div>
                
                <?php
                    // this is used for debugging the userdata. 
                    // print_r($this->session->userdata() ) 
                ?>

                <!-- cards tab -->
                <div class="col-lg-9 mt-3 p-3 tab-pane fade" id="cards" role="tabpanel" aria-labelledby="cards-tab">
                <!-- tab title -->
                   
                        <h5>Card information</h5>
                   
                <hr class="mb-3">

                    <!-- Card number-->
                    <div class="form-group row col-lg-12">
                    <div class="input-group col-lg-9">
                        <label class="form-control-label col-lg-5" for="cardnumber">Card number:</label>
                        <input class="form-control col-lg-6" readonly type="text" id="cardnumber" name="cardnumber" value="<?php echo $this->session->userdata('cardnumber'); ?>">
                        <div class="input-group-append">
                        <input class="btn btn-danger text-center" type="button" data-toggle="modal" data-target="#rep_card"  value="Replace card">
                        </div>
                        </div>
                    </div>
                    <!-- Form Group -->

                     <hr class="mb-4">

                    <!-- button for cardinfo -->
                    <!-- Form start -->
                    <?php echo form_open('Cards/card_info', 'class="form-row" id="cards-info-form" onsubmit="card_info(this); return false;"'); ?>
                        <div class="form-group row col-lg-12">
                            <div class="input-group col-lg-9">
                                <label class="form-control-label col-lg-5" for="card_info">View subscriptions:</label>
                                <!-- Submit -->  
                                <input class="btn btn-primary text-center col-lg-5" type="submit" value="Card information">
                            </div>
                        </div>
                        <!-- Form Group -->
                    <!-- Form end -->
                    </form> 
                    

                     <hr class="mb-4">
                    
                        <!-- Credits -->
                    <div class="form-group row col-lg-12">
                        <div class="input-group col-lg-9">
                            <label class="form-control-label col-lg-5" for="credit">Credits:</label>
                            <input class="form-control col-lg-5 <?php echo (form_error('credit')) ? "is-invalid" : ""; ?>" readonly type="text" id="credit" name="credit" value="<?php echo $this->session->userdata('credit'); ?>">
                            <!-- CI Form Validation -->
                            <?php echo form_error('credit', '<span class="invalid-feedback">', '</span>'); ?>
                        </div>
                    </div>

                    <hr class="mb-3">

                    <!-- Form Start -->
                    <?php echo form_open('Cards/update_cards', 'class="form-row" id="cards-form" onsubmit="update_cards(this); return false;"'); ?>

                        <label class="form-control-label justify-content-end row col-lg-7" for="CreditsAmount">Select an amount of credits:</label>
                        <div class="form-group row col-lg-12">
                            <div class="input-group col-lg-9">
                                <label class="form-control-label col-lg-5" for="CreditsAmount">Credits to add:</label>
                                <select Class="form-control col-lg-7  <?php echo (form_error('Amount')) ? "is-invalid" : ""; ?>" id="Amount" name="Amount">
                                    <option value="50">50 credits</option>
                                    <option value="100">100 Credits</option>
                                    <option value="1000">1000 Credits</option>
                                </select>
                                <div class="input-group-append">
                                    <input class="btn btn-primary text-center"  type="submit" value="Buy credit">
                                </div>
                            </div>
                        </div>
                        <!-- Form Group -->

                  <!-- Form End -->
                  </form>
                  <!-- Tab end -->
                </div>


                <!-- modal of replace_cards -->
                <div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="rep_card" >
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <div class="row col-lg-12 justify-content-center">
                                            <h5 class="modal-title text-danger" id="cnf_rep_card">Replace Card</h5>
                                        </div>
                                    </div>
                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <p class="modal-title">Are you sure you want to replace the card?</p>
                                        <p class="modal-body">The subscriptions will be kept, but credits will be lost.</p>
                                        <p>You can pickup your new card at your closest kioski.</p>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row col-lg-12 justify-content-around">
                                            
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                            <!-- Close Modal-->
                                            <!-- Form Start -->
                                            <?php echo form_open('Cards/replace_cards', 'class="form-row" id="replace-form" onsubmit="replace_cards(this); return false;" '); ?>
                                                <input class="btn btn-danger text-center" type="submit" value="Yes, I am sure"><!-- Submit -->
                                           </form>  <!--Form End -->
                                        </div>
                                    </div><!-- Modal Footer-->
                                </div><!-- Modal Content -->
                            </div><!-- Modal Dialog -->
                        </div><!-- Modal -->


                        <!-- Modal of card info -->
                        <div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="card_infos" >
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!-- Modal header -->
                                    <div class="modal-header">
                                        <div class="row col-lg-12 justify-content-center">
                                            <h5 class="modal-title" id="card_info_label">Card info</h5>
                                        </div>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <p class="modal-title">Card info of card: <?php print_r($this->session->userdata('cardnumber'));  ?></p>
                                         
                                        <!-- Start Table for printout  -->

                                        <table class = table>
                                        <tr>
                                        <th>SUB TYPE ID</th>
                                        <th>START DATE</th>
                                        <th>EXPIRATION DATE</th>
                                        <th>SUBSCRIPTION NAME</th>
                                        <th>DESCRIPTION</th>
                                        <th>SUBSCRIPTION ID</th>
                                        </tr>

                                        <?php
                                        
                                       // Prints out the data from the join query array

                                        foreach ($this->session->userdata('card_info') as $info) { ?>
                                        <tr>
                                        <td><?php echo $info['sub_id']; ?></td>
                                        <td><?php echo $info['startdate'] ?></td>
                                        <td><?php echo $info['expirydate']?></td>
                                        <td><?php echo $info['name'] ?></td>
                                        <td><?php echo $info['description'] ?></td>
                                        <td><?php echo $info['subtype_id']?></td>
                                        <?php } ?>
                                        </tr>
                                        </table>
                                        <!-- End Table for printout  -->
                                    </div>
                                    <!-- Modal footer/ /back button -->
                                    <div class="modal-footer">
                                        <div class="row col-lg-12 justify-content-around">
                                            <div class="">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
                                            </div><!-- Close Modal-->
                                        </div><!-- button -->
                                    </div><!-- Modal Footer-->
                                </div><!-- Modal Content -->
                            </div><!-- Modal Dialog -->
                        </div><!-- Modal -->
                                        
                                        
                <!-- Account tab -->
                <div class="col-lg-9 tab-pane fade p-3 mt-3" id="account" role="tabpanel" aria-labelledby="account-tab">
                <!-- Card title -->
                <h5>Account settings</h5>
                <hr class="mb-3">

                    <!-- Form Start -->
                    <?php echo form_open('Users/update_email', 'class="form-row" id="email-form" onsubmit="update_email(this); return false;"'); ?>

                        <!-- Email -->
                        <div class="form-group row col-lg-12 mb-2">
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
                        <div class="row justify-content-end col-12">
                            <input class="btn btn-primary text-center" type="submit" value="Change password">
                        </div><!-- Submit -->
                    </form>
                </div>

                <!-- Delete account tab -->
                <div class="col-lg-9 tab-pane fade p-3 mt-3" id="delete-account" role="tabpanel" aria-labelledby="delete-account-tab">

                    <!-- Delete account -->
                    <div class="row pl-4">
                        <div class="row col-lg-12 text-danger mb-3">
                            <h5 > Delete Account</h5>
                        </div>
                        <div class="row col-lg-12 mb-3">
                            <p>Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                        <!-- Button trigger modal -->
                        <div class="row justify-content-end col-lg-12">
                            <button class="btn btn-danger text-center" type="button" data-toggle="modal" data-target="#cnf_del">Delete account</button>
                        </div>
                        <div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="cnf_del" >
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="row col-lg-12 justify-content-center">
                                            <h5 class="modal-title text-danger" id="cnf_del_label">Delete Account</h5>
                                        </div>
                                    </div><!-- Modal Header -->
                                    <div class="modal-body">
                                        <p class="modal-title">Are you sure you want to delete your account?</p>
                                    </div><!-- Modal Body -->
                                    <div class="modal-footer">
                                        <div class="row col-lg-12 justify-content-around">
                                            <div class="">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                            </div><!-- Close Modal-->
                                            <!-- Form Start -->
                                            <?php echo form_open('Users/delete_account', 'class="form-row" id="delete-form"'); ?>
                                                <?php echo form_hidden('id', $this->session->userdata('customer_id')); ?>
                                                <input class="btn btn-danger text-center" type="submit" value="Yes, I am sure"><!-- Submit -->
                                            </form><!-- Form End -->
                                        </div>
                                    </div><!-- Modal Footer-->
                                </div><!-- Modal Content -->
                            </div><!-- Modal Dialog -->
                        </div><!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(APPPATH . '/views/include/footer.php'); ?>
<?php include(APPPATH . '../assets/js/profile.php'); ?>
