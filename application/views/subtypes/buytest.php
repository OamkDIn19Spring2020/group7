<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>

<h2>Date Field</h2>

<div>

<form action="buypages/orderSub" method="post">
<label for="startdate">Startdate:</label>
<input type="date" id="startdate" name="startdate">
<label for="startdate">Enddate:</label>
<input type="date" id="enddate" name="enddate"> 
<input type="submit" value="Submit">
</form>

</div>





<?php
print_r($this->session->userdata('SubTypePicked'));

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

?>

<?php include(APPPATH . '/views/include/footer.php'); ?>
