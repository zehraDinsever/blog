
<?php 

$host   = "localhost";
$dbname = "blog";
$kadi   = "root";
$sifre  = "";

try {
	
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$kadi","$sifre");
	
}catch (PDOException $mesaj){
	
	
	echo $mesaj->getmessage();
	
}

?>