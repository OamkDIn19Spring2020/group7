<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>
<!-- Should save post action in array in session what can be called -->
<?php $_SESSION['postdata'] = $_POST;?>

<div class="container">
    <div class="container p-1">
        <div class="card-columns">
            <?php foreach ($subtype as $row)
            {
                ?>
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <!-- Tile -->
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <!-- Here we have bit fader text -->
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo 'Id is '.$row['subtype_id'].' Price is : '.$row['cost'].' per month'; ?></h6>
                        <!-- Description -->
                        <p class="card-text-center"> <?php echo '<b>Description</b>: '.$row['description'] ?></p>
                        <p class="card-text"><?php echo '<b>Info</b> '.$row['address']; ?></p>
                        <!-- Form start to catch users chosen sub's Id -->
                        <form action="BuyPages" method="post">
                            <input type="hidden" name="Id_Button" value="<?php echo $row['subtype_id'] ?>">
                            <input class="btn btn-primary" type="submit">
                        </form>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>

<?php include(APPPATH . '/views/include/footer.php'); ?>
