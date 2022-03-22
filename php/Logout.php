<?php
session_start();
session_unset();
session_destroy();
header('location:trafficlogin.php');
exit();
?>