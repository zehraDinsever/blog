<?php !defined("index") ? die("hacking ?") : null;?>

<?php 

  if($_SESSION){
	  
	  $uye = @$_GET["uye"];
	  if($_SESSION["uye"] == $uye){
		  
		$v = $db->prepare("select * from uyeler where uye_adi=?");
        $v->execute(array($uye));
		   $m = $v->fetch(PDO::FETCH_ASSOC);
		   $x = $v->rowcount(); 


       if($x){
		   
		   
		   if($_POST){
			   
			   $email = strip_tags (trim($_POST["email"]));
			   $sifre = strip_tags(trim($_POST["sifre"]));
			   $hakkimda = strip_tags(trim($_POST["hakkimda"]));
			   
			   if(!$email){
				   
				   echo '<div class="hata">email adresi bos bırakılamaz</div>';
				   
			   }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
			  
			  
			  echo '<div class="hata">bu mail adresi gecerli deyil baska bir tane deneyin</div>';
			  
		  }else {
			  
			  if($sifre){
				  
				  $sifre = md5($sifre);
				  
			  }else {
				  
				  $sifre = $m["uye_sifre"];
				  
			  }
			  
			  $guncelle = $db->prepare("update uyeler set 
			  
			               uye_eposta=?,
						   uye_sifre=?,
						   uye_hakkimda=? where uye_adi=?
			  
			  ");
			
           $kayit =  $guncelle->execute(array($email,$sifre,$hakkimda,$_SESSION["uye"]));

           if($kayit){
			   
			   echo '<div class="basarili2">porfiliniz basariyla guncellendi...</div>';
			   
			   header("refresh: 2; url=?do=profil&uye=$uye");
			   
		   }else {
			   
			   echo '<div class="hata">profil guncellenirken bir hata olustu</div>';
			   
		   }		   
			  
		  }
			   
		   }else {
			   
			   ?>
			   <div class="sol2">
				<h2>profil duzenle</h2>	
				<form action="" method="post">
				<ul> 
				<li>email</li>
				<li><input type="text" value="<?php echo $m["uye_eposta"];?>" name="email" /></li>
				<li>sifre</li>
				<li><input type="text"   name="sifre" placeholder="yeni sifrenizi giriniz" /></li>
				<li>hakkimda</li>
				<li><textarea name="hakkimda" id="" cols="50" rows="10"> <?php echo $m["uye_hakkimda"];?></textarea></li>
				
				<li><button type="submit">profili duzenle</button></li>
				</ul>
				</form>
				</div>
			   <?php
			   
			   
		   }
		   
		   
	   }else {
		   
		   echo '<div class="hata">uye bulunamadi</div>';
		   
	   }	   
		  
		  
		  
	  }else {
		  
		  
		  echo '<div class="hata">yanlıs bir yere girdiniz....</div>';
		  
		  die();
		  session_destroy();
		  
	  }
	  
	  
  }
 


?>