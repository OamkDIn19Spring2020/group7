<main role="main" style="height:auto;min-height:100%;">

  <!-- Main jumbotron container with image background and welcome -->
  <div class="jumbotron" style="background-image: url(<?php echo base_url('assets/helsinki.jpg'); ?>); background-attachment: inherit;  background-position:center; background-size: cover;">
    <div class="container">
      <h1 class="display-3"><b>City Card System</b></h1>


        <?php if($this->session->has_userdata('customer_id')) : ?>
      <h2 class="display-4"><i> <b>Welcome <?php echo $this->session->userdata('firstname'); ?></i></b></h2></br>
        <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('users/profile'); ?>"  role="button">View profile &raquo;</a></p>
      <?php else : ?>
        <h2 class="display-4"><b><i>Please sign in</i></b></h2></br>
        <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('users/login'); ?>"  role="button">Sign in &raquo;</a></p>
      <?php endif; ?>
    </div>
  </div>

  <div class="container">
    <!-- Row of columns -->
    <div class="row">

      <!-- Button to shop -->
      <div class="col-md-4">
        <h2>Our products</h2>
        <p>Purchase new subscriptions or extend your current subscriptions.</p>
        <p><a class="btn btn-secondary" href="<?php echo site_url('SubTypes'); ?>" role="button">View products &raquo;</a></p>
    </div>

    <?php if($this->session->has_userdata('customer_id')) : ?>
    <div class="col-md-4">
      
      <!-- if user is logged in, go to cards --> 
      
        <h2>Card information</h2>
        <p>Buy credits and review your purchases in your user profile.</p> 
      <p><a class="btn btn-secondary" href="<?php echo site_url('users/profile/' .'cards');?>" role="button" >Go to My Card &raquo;</a></p>
      </div>
      <?php endif; ?>
    

      <!-- about us page -->
      <div class="col-md-4">
        <h2>About us</h2>
        <p>Got any questions about us? Check out the about us page.</p>
        <p><a class="btn btn-secondary" href="<?php echo site_url('users/aboutus'); ?>" role="button">About us &raquo;</a></p>
      </div>
    </div>

      
    <hr>

  </div>
 <!-- /container -->

</main>
