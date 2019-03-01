<?php
session_start();

if($_SESSION['auth']==true)
{
unset($_SESSION['auth']);
session_destroy();
header("location: index.php");	
}
?>