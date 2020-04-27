<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron" style="background-image: url('assets/helsinki.jpg'); background-attachment: inherit;  background-position:center; background-size: cover;">

    <div class="container" style="color:black;">
      <h1 class="display-3">City Card System</h1>
      <?php if($this->session->has_userdata('customer_id')) : ?>
          <h2 class="display-4"><b> Welcome <?php echo $this->session->userdata('firstname'); ?></b></a></p>
      </h2>
      <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('users/profile'); ?>"  role="button">View profile&raquo;</a></p>
      <?php else : ?>
        <h2 class="display-4">Please sign in</h2>
        <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('users/login'); ?>"  role="button">Sign in&raquo;</a></p>
      <?php endif; ?>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Our products</h2>
        <p>Browse our extended range of subscriptions. </p>
        <p><a class="btn btn-secondary" href="<?php echo site_url('/subtypes'); ?>" role="button">View products &raquo;</a></p>
      </div>
      <div class="col-md-4">

      <?php if($this->session->has_userdata('customer_id')) : ?>
        <h2>Card information</h2>
        <p>Card number: <?php echo $this->session->userdata('cardnumber'); ?> </p>
        <p>Check your card balance and review your purchases in your user profile.</p> 
      <p><a class="btn btn-secondary" href="<?php echo site_url('users/profile/' .'cards');?>" role="button" >Go to my Cards &raquo;</a></p>
      <?php else : ?>
        <h2>Card information</h2>
        <p><?php echo ('please sign in to view card informtion'); ?></p>
      <?php endif; ?>
      </div>
      <div class="col-md-4">
        <h2>About us</h2>
        <p>Got any questions about us? We're no slim shady. Check out the about us page.</p>
        <p><a class="btn btn-secondary" href="<?php echo site_url('users/aboutus'); ?>" role="button">About us &raquo;</a></p>
      </div>
    </div>

      
    <hr>
    <div class="col-md-4">
  </div> <!-- /container -->

</main>
