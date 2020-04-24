<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>

<h2>Date Field</h2>

<div>
 <!-- Has active sub for picked subtype id? -->
<?php
if ($$hasActiveSub === FALSE)
{
    //Doesnt have active sub So will create new one
    ?>
    <form action="buypages/orderSub" method="post">
    <label for="startdate">Startdate:</label>
    <input type="date" id="startdate" name="startdate">
    <label for="startdate">Enddate:</label>
    <input type="date" id="enddate" name="enddate"> 
    <input type="submit" value="Submit">
    </form>

    
    <?php
}
else
{
    echo 'You have active sub for this type. It will end at:'.$hasActiveSub.'<br>';
    echo 'Would you like to Extend the sub by 30 days or 60 days?';
    ?>
    <div>
    <form action=buypages/orderSub method="post">
    <input type="radio" id="30days" name="30 days">
    <input type="radio" id="60days" name="60 days">
    <input type="submit" value="Submit">
    </form>
    </div>

    <!-- maybe should have cost somewhere? And you have credits it will cost this much? -->
    <?php
}

?>


</div>





<?php
print_r($this->session->userdata('SubTypePicked'));

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

?>

<?php include(APPPATH . '/views/include/footer.php'); ?>
