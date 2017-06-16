<?php
session_start();

if(isset($_SESSION["uAcc"])){
	unset($_SESSION["uAcc"]);
}
if(isset($_SESSION["authority"])){
	unset($_SESSION["authority"]);
}	
header('refresh:0; url="index.php"');
?>