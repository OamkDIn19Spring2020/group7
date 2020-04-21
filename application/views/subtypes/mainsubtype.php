<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>
<!-- Should save post action in array in session what can be called -->
<?php $_SESSION['post-data'] = $_POST;?>

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
        // Some animation timings?
        echo '<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#info">More info</button>';
        echo '<div id="info" class="collapse in">';
        echo '<br>about the company:<br>'.$row['description'];
        echo '<br> Price in credits '.$row['cost'];
        echo '<br> info'.$row['address'];
        echo '<br>';
        echo '</div>';
        echo '<br>';
        //form starts. submits the picked id for the contoller what then is used in buy view.
        echo'<form action="../SubTypes/subtypesRedirect" method="post">';
        // the value doesnt work with the id
        echo'<input type="hidden" name="Id_Button" value="<?php echo $row[\'subtype_id\'];?>">';
        echo'<input type="submit">';     
        echo '</form>';
        
    } 

    
    ?>
    </div>



</div>

<?php include(APPPATH . '/views/include/footer.php'); ?>
