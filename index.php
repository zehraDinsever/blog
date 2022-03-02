<?php define("index",true);?>
<?php include("ayar.php");?>
<?php session_start();
ob_start();

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>kolay video dersleri</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/reset.css" />
</head>
<body>
	<div class="genel"> 
	<div class="header"> 
	<h2><span style="color:skyblue;">kolay</span> video dersleri</h2>
	<span style="float: right;"><a href="/index.php/">siteyi goruntule</a></span>
	</div>
	
	<div class="menu"> 
	<ul> 
	<li><a href="index.php">anasayfa</a></li>
	<li><a href="">dersler</a></li>
	<li><a href="">video</a></li>
	<li><a href="">hakkımda</a></li>
	<?php 
	
	if(!$_SESSION){
		
	echo '<li><a href="?do=kayit">kayıt ol</a></li>';	
		
	}
	
	?>
	<li><a href="?do=iletisim">iletisim</a></li>
	</ul>
	<form action="?do=ara" method="post">
	<span><input type="text" name="ara" /><button type="submit">ara</button></span>
	</form>
	</div>
	<div style="clear:both;"></div>
	<div class="content"> 
	<div class="sol"> 
   
   <?php 
   
   $do = @$_GET["do"];
   
    switch ($do){
		
		
		case "iletisim":
		include("iletisim.php");
		break;
		
		case "kategori":
		include("kategori_liste.php");
		break;
		
		case "ara":
		include("ara.php");
		break;
		
		case "uye":
		include("uye_giris.php");
		break;
		case "konu_ekle":
		include("konu_ekle.php");
		break;
		
		case "kayit":
		
		include("kayit.php");
		
		break;
		
		case "profil":
		include("profil.php");
		break;
		
		case "mesaj":
		include("mesaj.php");
		break;
		
		case "mesaj_oku":
		include("mesaj_oku.php");
		break;
		
		case "mesaj_gonder":
		include("mesaj_gonder.php");
		break;
		
		case "mesaj_sil":
		include("mesaj_sil.php");
		break;
		
		case "profil_duzenle":
		include("profil_duzenle.php");
		break;
		
		case "cikis":
		
		session_destroy();
		
		header("refresh: 2; url=index.php");
		
		echo '<div class="basarili2">basarıyla cıkıs yaptınız yönlendiriliyorsunuz</div>';
		
		break;
		
		case "devam":
		include ("devam.php");
		break;
		
		default :
		
		include ("anasayfa.php");
		break;
		
		
	}
   
   
   
   
   ?>
	
	
	
	
	</div>
	
	
	<div class="sag"> 
	<?php include("uye.php");?>
	
	
	
	
	<?php include("kategori.php");?>
   

  <?php  include("populer_konular.php");?>   

	<?php include("son_yorumlar.php");?>
	</div>
	
	
	</div>
	<div style="clear:both;"></div>
	
	
	<div class="footer"> 
	<h2>copright 2021 kolay video dersleri ..</h2>
	</div>
	
	</div>
	
</body>
</html>