<link rel="icon" href="images/logo.png">
<?php
session_start();
session_destroy();
echo'<script>alert("logout successfull!");</script>';
?>

