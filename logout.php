<?php
session_start();
session_destroy();
unset($_SESSION);
session_regenerate_id(true);
header('LOCATION: login.php');

?>