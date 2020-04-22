<?php include(APPPATH . '/views/include/header.php'); ?>
<?php include(APPPATH . '/views/include/nav.php'); ?>

<?php

echo 'Here Be the money making page<br>';

print_r($this->session->userdata('SubTypePicked'));

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';


?>

<?php include(APPPATH . '/views/include/footer.php'); ?>
