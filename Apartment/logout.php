<?php
session_start() ;
if(isset($_SESSION["doorno"]) && !empty($_SESSION["doorno"]))
{
	session_destroy();
	unset($_SESSION);
	header("Location: http://localhost/society1/login.php");
}
?>