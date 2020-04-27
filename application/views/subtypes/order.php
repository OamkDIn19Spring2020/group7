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

        <!-- Modal -->
        <div class="modal fade" id="no_credit" tabindex="-1" role="dialog" aria-labelledby="noEnoughCredit" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="row col-12 modal-title text-danger justify-content-center" id="no_credit_title">Sorry! You do not have enough credit!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>We can not process your request. You will be redirected to your profile to add more credit.
                    </div>
                </div>
            </div>
        </div>

</div>

<?php include(APPPATH . '/views/include/footer.php'); ?>

<script>
    var body = document.querySelector('body');
    body.addEventListener('load', load_modal());
   function load_modal()
   {
        <?php if ($hasCredit == false) {;?>
        $('#no_credit').modal('show');
        <?php };?>
   }
</script>
