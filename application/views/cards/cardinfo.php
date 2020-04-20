
<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="card text-center col-md-12 bg-light shadow-lg mt-5">
            <div class="card-header bg-light">
                <h4 class="card-title">Card info</h4>
            </div>
            <div class="card-body row tab-content p-2" id="personal-info-content">
                <ul class="nav nav-pills col-lg-3 flex-column p-3" id="personal-info" role="tablist" aria-orientation="vertical">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" onclick=" <php? redirect('users/profile'); ?> " role="tab" aria-controls="profile" aria-selected="true">Back to Cards</a>
                    </li>
                </ul>
                </div>
                
                <!-- Profile tab -->
                <div class="col-lg-9 p-3 mt-3 tab-pane fade show active" id="cardinfo" role="tabpanel" aria-labelledby="cardinfo-tab">

               
                        <!-- Output card info -->
                        <div class="form-group row col-lg-12">
               
                        </div><!-- Output ends-->
                          
                 
                </div>
