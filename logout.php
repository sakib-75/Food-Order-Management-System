<?php

session_start();
setcookie("u_name",$u_name,time()-8*24*60*60);
session_destroy();
header("Location: index.php");
?>
