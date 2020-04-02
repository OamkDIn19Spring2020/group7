<?php session_start(); ?>
<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>


<div class="container">

    test for subtypes
    
    </div>

    <div>
    <?php
    foreach ($subtype as $row)
    {
        echo '<div>';
        echo '<br>Id is '.$row['subtype_id'];
        echo '<br> Name :'.$row['name'];
        echo '</div>';
        // Using the bootstrap for collapsing
        echo '<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#info">More info</button>';
        echo '<div id="info" class="collapse in">';
        echo '<br>about the company:<br>'.$row['description'];
        echo '<br> Price in credits'.$row['cost'];
        echo '<br> info'.$row['address'];
        echo '<br>';
        echo '</div>';
        // here we can put to link to buy page
        echo '<br>';

        // would echo the ID so each button has the Id wont work? 

        echo '<br> <button id="echo$row[\'subtype_id\'];"type="button" onclick="test(this.id)" class="btn btn-info">Buy</button>';
        echo '<br>';
        }

    
    ?>
    </div>



</div>

<!-- For bootstrap links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Script what could be used to get the button Id put in session variable or flastdata -->
<script>

function test(clicked_id){
    alert(clicked_id);
}
</script>

<?php include(APPPATH . '/views/include/footer.php'); ?>
