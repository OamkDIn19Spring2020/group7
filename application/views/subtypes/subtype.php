<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>

<div class="container mt-4">
        <div class="card-columns">
            <?php foreach ($subtype as $row)
            {
                ?>
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <!-- Tile -->
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <!-- Here we have bit fader text -->
                        <h6 class="card-subtitle mb-2"><?php echo '<b>Price</b>: '. $row['cost'] .' credits per month'; ?></h6>
                        <!-- Description -->
                        <p class="card-text-center"> <?php echo '<b>Description</b>: ' . $row['description'] ?></p>
                        <p class="card-text"><?php echo '<b>Info</b> ' . $row['address']; ?></p>
                        <!-- Form start to catch users chosen sub's Id -->
                        <?php echo form_open('Orders/index', 'method="get"'); ?>
                            <input type="hidden" name="subtype_id" value="<?php echo $row['subtype_id'] ?> ">
                            <input type="hidden" name="name" value="<?php echo $row['name'] ?> ">
                            <input type="hidden" name="cost" value="<?php echo $row['cost'] ?> ">
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
