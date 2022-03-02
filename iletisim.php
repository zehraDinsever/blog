<?php  

  if($_POST){
	  
	  $isim     = strip_tags(trim($_POST["isim"]));
	  $baslik   = strip_tags(trim($_POST["baslik"]));
	  $kime     = $_POST["kime"];
	  $aciklama = strip_tags(trim($_POST["aciklama"]));
	  
	  if(!$isim || !$baslik || !$aciklama){
		  
		 echo '<div class="hata">gerekli alanları doldurmanız gerekiyor..</div>'; 
		  
	  }else {
		 
          $kayit = $db->prepare("insert into mesajlar set 
		  
		              mesaj_gonderen=?,
					  mesaj_baslik=?,
					  mesaj_kime=?,
					  mesaj_aciklama=?
		  
		  ");		 
		  
		  $k = $kayit->execute(array($isim,$baslik,$kime,$aciklama));
		  
		  if($k){
			  
			 echo '<div class="basarili2">mesajınız alınmıstır tesekkurler :)</div>'; 
			  
		  }else {
			  
			  echo '<div class="hata">mysql hatası..</div>';
			  
		  }
		  
	  }
	  
  }else {
	  
	  if($_SESSION){
		  
		   ?>
		  <div class="sol2">
		<h2>iletisim formu</h2>
        <form action="" method="post">		
		<ul> 
		
		<li><input type="hidden" value="<?php echo $_SESSION["uye"];?>" name="isim" /></li>
		<li>baslık</li>
		<li><input type="text" name="baslik" placeholder="konu baslıgını girin" /></li>
		<li>kime</li>
		<li> 
		<select name="kime">
		<?php 
		
		$v = $db->prepare("select * from uyeler where uye_rutbe=?");
		$v->execute(array(1));
		$c = $v->fetchALL(PDO::FETCH_ASSOC);
		
		foreach($c as $m){
			
			echo '<option value="'.$m["uye_id"].'">'.$m["uye_adi"].'</option>';
			
		}
		
		?>
		
		</select>
		</li>
		<li>acıklama</li>
		<li><textarea name="aciklama" id="" cols="50" rows="10"></textarea></li>
		<li><button type="submit">gonder</button></li>
		</ul>
		</form>
		</div>
		  <?php
		  
	  }else {
		  
		  ?>
		  <div class="sol2">
		<h2>iletisim formu</h2>
        <form action="" method="post">		
		<ul> 
		<li>adınız</li>
		<li><input type="text" name="isim" /></li>
		<li>baslık</li>
		<li><input type="text" name="baslik" placeholder="konu baslıgını girin" /></li>
		<li>kime</li>
		<li> 
		<select name="kime">
		<?php 
		
		$v = $db->prepare("select * from uyeler where uye_rutbe=?");
		$v->execute(array(1));
		$c = $v->fetchALL(PDO::FETCH_ASSOC);
		
		foreach($c as $m){
			
			echo '<option value="'.$m["uye_id"].'">'.$m["uye_adi"].'</option>';
			
		}
		
		?>
		
		</select>
		</li>
		<li>aciklama</li>
		<li><textarea name="aciklama" id="" cols="50" rows="10"></textarea></li>
		<li><button type="submit">gonder</button></li>
		</ul>
		</form>
		</div>
		  <?php
		  
	  }
	  
	  
  }



?>