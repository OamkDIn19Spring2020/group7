<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>

<div class="jumbotron jubmotron-fluid pt-5" style="background-image: url<?php if ($this->session->userdata('subtypeName') == 'Swimming Pass') {;?>(<?php echo base_url('assets/swimming.jpg');?>)<?php }elseif ($this->session->userdata('subtypeName') == 'Oulu City Gyms'){;?>(<?php echo base_url('assets/gym.jpg');?>)<?php }elseif ($this->session->userdata('subtypeName') == 'Bus Service(AB-zone)' || $this->session->userdata('subtypeName') == 'Bus Service(ABC-zone)'){;?>(<?php echo base_url('assets/bus.jpg');?>)<?php };?>;
    background-position:center; background-size: cover;"> 
    <div class="container pt-5 pb-4">
        <h1 class="display-4 justify-content-center font-weight-bold"><?php echo $this->session->userdata('subtypeName'); ?></h1>
        <h4 class="font-weight-bold"><?php echo $timeLeft; ?></h4>
    </div>
</div>
    <div class="container pt-3 pb-3">
        <h3 class="mb-5">Choose one of the following plans</h3>
        <div class="card-deck">
            <div class="card bg-light shadow-lg" style="width: 18rem;">
                <div class="card-body text-center text-primary">
                    <h5 class="card-title h2">1 week</h5>
                    <p class="card-text h5 mb-4"><?php echo (integer)$this->session->userdata('subtypeCost') / 4; ?> Credits</p>
                    <?php echo ($this->session->userdata('sub_id')) ? form_open('Orders/order') : form_open('Orders/order_new');?>
                        <input type="hidden" name="cost" value="<?php echo (integer)$this->session->userdata('subtypeCost') / 4;?>"> 
                        <input type="hidden" name="extension_period" value="7">
                        <a class="btn btn-warning btn-lg text-body" onclick="this.closest('form').submit();return false;"><?php echo $status;?></a> 
                    </form>
                </div>
            </div>
            <div class="card bg-light shadow-lg" style="width: 18rem;">
                <div class="card-body text-center text-primary">
                    <h5 class="card-title h2">30 Days</h5>
                    <p class="card-text h5 mb-4"><?php echo $this->session->userdata('subtypeCost'); ?> Credits</p>
                    <?php echo ($this->session->userdata('sub_id')) ? form_open('Orders/order') : form_open('Orders/order_new');?>
                        <input type="hidden" name="cost" value="<?php echo (integer)$this->session->userdata('subtypeCost');?>"> 
                        <input type="hidden" name="extension_period" value="30">
                        <a class="btn btn-warning btn-lg text-body" onclick="this.closest('form').submit();return false;"><?php echo $status;?></a>
                    </form>
                </div>
            </div>
            <div class="card bg-light shadow-lg" style="width: 18rem;">
                <div class="card-body text-center text-primary">
                    <h5 class="card-title h2">60 Days</h5>
                    <p class="card-text h5 mb-4"><?php echo (integer)$this->session->userdata('subtypeCost') * 2;?> Credits</p>
                    <?php echo ($this->session->userdata('sub_id')) ? form_open('Orders/order') : form_open('Orders/order_new');?> 
                        <input type="hidden" name="cost" value="<?php echo (integer)$this->session->userdata('subtypeCost') * 2;?>"> 
                        <input type="hidden" name="extension_period" value="60">
                        <a class="btn btn-warning btn-lg text-body" onclick="this.closest('form').submit();return false;"><?php echo $status;?></a> 
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- No Credit Modal -->
        <div class="modal fade" data-backdrop="static" id="no_credit" tabindex="-1" role="dialog" aria-labelledby="noEnoughCredit" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="row col-12 modal-title text-danger justify-content-center" id="no_credit_label">Sorry! You do not have enough credit!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- Modal Header -->
                    <div class="modal-body">
                        <p>We can not process your request. You will be redirected to your profile to add more credit.
                    </div><!-- Modal Body -->
                    <div class="modal-footer">
                        <div class="row col-lg-12 justify-content-around">
                            <div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div><!-- Close Modal-->
                            <button class="btn btn-primary text-center" type="submit" onclick="card_redirect()">Yes, I want to buy credit</button>
                        </div>
                    </div><!-- Modal Footer-->
                </div><!-- Modal Content --> 
            </div><!-- Modal Dialog --> 
        </div><!-- Modal -->

        <!-- Success Modal -->
        <div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="success" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="row col-12 modal-title text-success justify-content-center h2" id="success_label">Success</h5>
                    </div><!-- Modal Header -->
                    <div class="modal-body">
                        <p class="row col-12 justify-content-center">Thanks for your purchase!</p>
                        <p class="row col-12 justify-content-center text-primary">Your subscription will expire after <?php echo $timeLeft;?></p>
                    </div><!-- Modal Body -->
                    <div class="modal-footer">
                        <div class="row col-12 justify-content-center">
                            <div class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></div>
                            <p class="ml-3">You will be redirect back to browser more products, wait a moment ...</p>
                        </div>
                    </div><!-- Modal Footer-->
                </div><!-- Modal Content -->
            </div><!-- Modal Dialog -->
        </div><!-- Modal -->

<?php include(APPPATH . '/views/include/footer.php'); ?>

<script> 

    // Display success modal on success and redirect to subtype page after 3 sec
    <?php if ($hasCredit == true) { 
        echo $this->session->flashdata('success');
            if ($this->session->flashdata('success')) {;?> 
                setTimeout(function() {
                window.location.replace("<?php echo site_url('/SubTypes');?>");
                }, 5000);
            <?php };?>
        <?php };?>

    var body = document.querySelector('body');
    body.addEventListener('load', modal_nocredit());
    // Show no_credit modal if the user doesn't have enough credit
   function modal_nocredit()
   {
        <?php if ($hasCredit == false) {;?>
        $('#no_credit').modal('show');
        <?php };?>
   }

   function card_redirect()
   {
        window.location.replace("<?php echo site_url('/users/profile');?>");
   }
</script>
