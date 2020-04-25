<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>

<h2>Date Field</h2>

<div>
 <!-- Has active sub for picked subtype id? -->
<?php
if ($hasActiveSub == FALSE)
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
    <form action=buypages/updateSub method="post">
    <input type="radio" id="30days" name="Extension"value="1">
    <label for="30days">30 days</label><br>
    <input type="radio" id="60days" name="Extension"value="2">
    <label for="60days">60days</label><br>
    <input type="submit" value="Submit">
    </form>
    </div>

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
