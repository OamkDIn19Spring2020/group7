<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 class="display-4">Our offered services.</h1>
    <p class="lead">Here you can find our offered products for our card. All are servises 30 days if not otherways informed.</p>
  </div>
</div>



<div class="container mt-4">
        <div class="card-deck row row-cols-1 row-cols-md-3">
            <?php foreach ($subtype as $row)
            {?>
              <div class=" col mb-3 mh-100" >
                    <div class="card bg-light border-primary h-100 ">
                        <!-- Body Start -->
                          <div class="card-body text-dark h-90 " >
                                <!-- Tile -->
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <!-- Here we have bit fader text -->
                                <h6 class="card-subtitle mb-2"><?php echo '<b>Price</b>: '. $row['cost'] .' credits per month'; ?></h6>
                                <!-- Description -->
                                <p class="card-text-center"> <?php echo '<b>Description</b>: ' . $row['description'] ?></p>
                            </div>
                        <!-- footer start -->
                        <div class="card-footer row h-10 mx-0 ">
                          <div class="col-sm-8">
                              <?php echo '<b></b> ' . $row['address']; ?>
                            </div>
                          <div class="col-sm-2">
                            <!-- Form start to catch users chosen sub's Id -->
                            <?php echo form_open('Orders/index', 'method="get"'); ?>
                              <input type="hidden" name="subtype_id" value="<?php echo $row['subtype_id'] ?> ">
                              <input type="hidden" name="name" value="<?php echo $row['name'] ?> ">
                              <input type="hidden" name="cost" value="<?php echo $row['cost'] ?> ">
                              <div class =""><input class="btn  btn-primary " type="submit" Value="Order"></div>
                            </form>
                        </div>
                    </div>    
                    </div>
              </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 class="display-4"></h1>
    Some product missing? Need some help? Want to have your product on our card family? </p>
    <p class="lead">Contact Us at: CityCard(att)System.com for all problems. We are happy to help anyway we can.</p>
  </div>
</div>


<?php include(APPPATH . '/views/include/footer.php'); ?>
