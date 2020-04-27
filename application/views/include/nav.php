<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">CCS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav col-lg-4 mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url(); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('SubTypes');?>">Orders </a>
                </li>
            </ul>
                <?php if($this->session->has_userdata('customer_id')) : ?>
            <ul class="navbar-nav col-lg-4 mr-auto justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active">Your credit <?php echo $this->session->userdata('credit'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">Card number <?php echo $this->session->userdata('cardnumber'); ?></a>
                </li>
            </ul>
            <ul class="navbar-nav col-lg-4 mr-auto justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('users/profile'); ?>">Welcome <?php echo $this->session->userdata('firstname'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('users/logout'); ?>">Logout</a>
                </li>
            </ul>
            <ul class="navbar-nav col-lg-2 mr-auto justify-content-end">
            </ul>
                <?php else : ?>
            <ul class="navbar-nav col-lg-8 mr-auto justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('users/register'); ?>">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('users/login'); ?>">Login</a>
                </li>
            </ul>
                <?php endif; ?>
        </div>
    </div>
</nav>
