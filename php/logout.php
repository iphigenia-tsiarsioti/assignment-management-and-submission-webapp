<?php
// Log-out page pou aposindeei kapoion xristi kai ton epanaferei sti selida tou login
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('location: ../login.php');
die;
?>