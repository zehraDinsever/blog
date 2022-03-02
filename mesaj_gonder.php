<?php !defined("index") ? die("hacking ?") : null;?>
<?php 

  if($_SESSION){
	  
	  if($_POST){
		 
        $isim     = strip_tags(trim($_POST["isim"]));		 
        $gonderen = strip_tags(trim($_POST["gonderen"]));		 
        $baslik   = strip_tags(trim($_POST["baslik"]));		 
        $aciklama = strip_tags(trim($_POST["aciklama"]),"<img>");		

       if(!$isim || !$baslik || !$aciklama){
		   
		  echo '<div class="hata">gerekli alanları doldurmanız gerekiyor...</div>'; 
		   
	   }else {
		   
		  $v = $db->prepare("select * from uyeler where uye_adi=?");
          $v->execute(array($isim));		  
		 $m =  $v->fetch(PDO::FETCH_ASSOC);
          $x = $v->rowCount();	

          if($x){
			
            $kayit = $db->prepare("insert into mesajlar set 
			
			            mesaj_kime=?,
						mesaj_gonderen=?,
						mesaj_baslik=?,
			            mesaj_aciklama=?
			");			
			 
           $k = $kayit->execute(array($m["uye_id"],$gonderen,$baslik,$aciklama));

           if($k){
			   
			 echo '<div class="basarili2">mesajınız basarıyla gonderildi...</div>';  
			  
               header("refresh: 2; url=?do=mesaj");
			  
		   }else {
			   
			   echo '<div class="hata">mesaj gonderirken bir hata olustu </div>';
			   
		   }		   
			  
		  }else {
			  
			  
			echo '<div class="hata"><span style="color:red;">'.$isim.'</span> adlı uye sistemde kayıtlı gozukmuyor..</div>';  
			  
		  }  
		   
	   }		
		  
		  
	  }else {
		  
		  
		  ?>
		  <div class="sol2">
		<h2>mesaj gonder</h2>
         <form action="" method="post">		
		<ul> 
		<li>adınız</li>
		<li><input type="text" name="isim" /></li>
		<li><input type="hidden" value="<?php echo $_SESSION["uye"];?>" name="gonderen" /></li>
		<li>baslık</li>
		<li><input type="text" name="baslik" placeholder="mesaj baslıgı" /></li>
		<li>mesajınız</li>
		<li><textarea name="aciklama" id="" cols="50" rows="10"></textarea></li>
		<li><button type="submit">gonder</button></li>
		</ul>
		</form>
		</div>
		  <?php
		  
	  }
	  
	  
  }else {
	  
	  echo '<div class="hata">mesaj gondermek için uyeliğinizle giris yapmanız gerekiyor... </div>';
	  
  }


?>