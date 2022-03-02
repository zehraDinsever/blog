<?php 
 !defined("index") ? die("hacking ?") : null;
 if($_POST){
	 
	 $name = trim($_POST["name"]);
	 $sifre = trim(md5($_POST["sifre"]));
	 
    if(!$name || !$sifre){
		
		echo '<div class="hata">kullancı adı ve sifre bos bırakılamaz</div>';
		
		
	}else {
		
		$uye = $db->prepare("select * from uyeler where uye_adi=? and uye_sifre=?");
		$uye->execute(array($name,$sifre));
		$z = $uye->fetch(PDO::FETCH_ASSOC);
		$x = $uye->rowCount();
		
		if($x){
			
			$_SESSION["uye"] = $z["uye_adi"];
			$_SESSION["eposta"] = $z["uye_eposta"];
			$_SESSION["rutbe"] = $z["uye_rutbe"];
			$_SESSION["id"] = $z["uye_id"];
			
			header("location:index.php");
			
		}else {
			
			echo '<div class="hata">uye adı yada sifreniz yanlıs</div>';
			
		}
	}	
	
 }



?>