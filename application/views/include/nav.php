<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">CCS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url(); ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url();?>/subtypes">Orders <span class="sr-only">(current)</span></a>
        </li>
            <?php if($this->session->has_userdata('customer_id')) : ?>
            <li class="nav-item ">
                               <a class="nav-link" href="<?php echo site_url('users/profile/'.'profile'); ?>">Welcome <?php echo $this->session->userdata('firstname'); ?></a>
                          </li>

                         <li class="nav-item ">
                             <a class="nav-link" href="<?php echo site_url('users/logout'); ?>">Logout</a>
                        </li>
                               <?php else : ?>

                                <li class="nav-item ">
                                       <a class="nav-link" href="<?php echo site_url('users/register'); ?>">Register</a>
                                </li>
                              <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('users/login'); ?>">Login</a>
                                </li>
                           <?php endif; ?>
    </ul>
  </div>
</nav>
