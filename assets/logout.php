<?php
// session start and unset varible and destory it.
session_start();
session_unset();
session_destroy();

// redirect it to the login.php after click on logout
header("location: ../login.php");

// exit php 
exit();
?>