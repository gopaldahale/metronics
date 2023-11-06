<?php
session_start();
session_reset();
session_destroy();
header("location: http://localhost/demo2/dist/authentication/flows/basic/sign-in.php");
?>