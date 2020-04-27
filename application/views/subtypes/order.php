<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>

<div class="container mt-4">
    <h1><?php echo $this->session->userdata('subtypeName'); ?></h1>
    <?php if ($this->session->userdata('sub_id')) {?>
        <p><?php echo $timeLeft; ?></p> 
        <h3 class="mb-3">Extend Your subscription</h3>
        <div class="card-deck">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">1 week</h5>
                <p class="card-text"><?php echo (integer)$this->session->userdata('subtypeCost') / 4; ?> Credits</p>
                <?php echo form_open('Orders/order'); ?>
                    <input type="hidden" name="extension_period" value="7">
                    <input class="btn btn-success" type="submit" value="Extend">
                </form>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url('/assests/30days.png'); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">30 Days</h5>
                <p class="card-text"><?php echo $this->session->userdata('subtypeCost'); ?> Credits</p>
                <?php echo form_open('Orders/order'); ?>
                    <input type="hidden" name="extension_period" value="30">
                    <input class="btn btn-success" type="submit" value="Extend">
                </form>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url('/assests/60days.jpg'); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">60 Days</h5>
                <p class="card-text"><?php echo (integer)$this->session->userdata('subtypeCost') * 2;?> Credits</p>
                <?php echo form_open('Orders/order'); ?>
                    <input type="hidden" name="extension_period" value="60">
                    <input class="btn btn-success" type="submit" value="Extend">
                </form>
            </div>
        </div>
        </div>

    
        <?php }else{?>
        <p>You are not subscribed yet!</p>
        <h3 class="mb-3">Buy a scubscription</h3>
        <div class="card-deck">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">30 Days</h5>
                <p class="card-text"><?php echo (integer)$this->session->userdata('subtypeCost');?></p>
                <?php echo form_open('Orders/order_new'); ?>
                    <input type="hidden" name="extension_period" value="30">
                    <input class="btn btn-success" type="submit" value="Buy">
                </form>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">60 Days</h5>
                <p class="card-text"><?php echo (integer)$this->session->userdata('subtypeCost') * 2;?></p>
                <?php echo form_open('Orders/order_new'); ?>
                    <input type="hidden" name="extension_period" value="60">
                    <input class="btn btn-success" type="submit" value="Buy">
                </form>
            </div>
        </div>
        </div>
        <?php }?>

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
                            <button class="btn btn-primary text-center" onclick="card_redirect()">Yes, I want to buy credit</button>
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
                        <h5 class="row col-12 modal-title text-success justify-content-center" id="success_label">Success</h5>
                    </div><!-- Modal Header -->
                    <div class="modal-body">
                        <p class="row col-12 justify-content-center">Your subscription will expire in <?php echo $this->session->userdata('expirydate');?></p>
                    </div><!-- Modal Body -->
                </div><!-- Modal Content -->
            </div><!-- Modal Dialog -->
        </div><!-- Modal -->
</div>

<?php include(APPPATH . '/views/include/footer.php'); ?>

<script> 

    // Display success modal on success and redirect to subtype page after 3 sec
    <?php if ($hasCredit == true) { 
        echo $this->session->flashdata('success');
            if ($this->session->flashdata('success')) {;?> 
                setTimeout(function() {
                window.location.replace("<?php echo base_url('/SubTypes');?>");
                }, 3000);
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
        <?php $this->session->set_userdata('card_tab', true); ?>
        window.location.replace("<?php echo base_url('/users/profile');?>");
   }
</script>
