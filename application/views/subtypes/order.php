<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>


<div class="container">
    <h3><?php echo $this->session->userdata('subtypeName'); ?></h3>

    <?php if ($this->session->userdata('sub_id')) {?>
        <p><?php echo $timeLeft; ?></p> 
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">30 Days</h5>
                <p class="card-text">Extend your subscription</p>
                <?php echo form_open('Orders/order'); ?>
                    <input type="hidden" name="extension_period" value="30">
                    <input class="btn-success" type="submit" value="Buy">
                </form>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">60 Days</h5>
                <p class="card-text">Extend your subscription.</p>
                <?php echo form_open('Orders/order'); ?>
                    <input type="hidden" name="extension_period" value="60">
                    <input class="btn-success" type="submit" value="Buy">
                </form>
            </div>
        </div>

    
        // the user doesn't a pervious have a subscription
        <?php }else{?>
        <p> no sub</p>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">30 Days</h5>
                <p class="card-text">Extend your subscription</p>
                <?php echo form_open('Orders/order_new'); ?>
                    <input type="hidden" name="extension_period" value="30">
                    <input class="btn-success" type="submit" value="Buy">
                </form>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">60 Days</h5>
                <p class="card-text">Extend your subscription.</p>
                <?php echo form_open('Orders/order_new'); ?>
                    <input type="hidden" name="extension_period" value="60">
                    <input class="btn-success" type="submit" value="Buy">
                </form>
            </div>
        </div>
        <?php }?>

    <?php var_dump($_SESSION); ?>
</div>


<?php include(APPPATH . '/views/include/footer.php'); ?>
