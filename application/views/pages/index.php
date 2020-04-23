<div id="slides" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1520105072000-f44fc083e508?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60O" alt="First slide">
            <div class="carousel-caption">
            <h1 class="display-2">Smartie Card</h1>
            <h3>All in one card, bus, gym, and swim hall</h3>
            <button type="button" class="btn btn-outline-light btn-lg">View demo</button>
            <button type="button" class="btn btn-primary btn-lg">View demo</button>


            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/img/background.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img src="assets/img/background.png" alt="Third slide">
        </div>
    </div>
    <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> -->
</div>
<!-- Jumbotron -->
<div class="ontainer-fluid">
    <div class="row jumbotron">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
        <p class="lead">Enter card number</p></div>
        <div>
    <input class= "form-control col-lg-9" type="text" id="phone" name="phone" value="<?php echo $this->session->userdata('phone'); ?>">

    </div>
    </div>
    
    
</div>

<!-- <h1><?php echo $this->session->userdata('credit'); ?></h1> -->