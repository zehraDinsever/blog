<?php !defined("index") ? die("hacking ?") : null;?>
<?php 

  
  if($_SESSION){
	  
	  if($_POST){
		
         $baslik = strip_tags(trim($_POST["baslik"]));
         $resim =  strip_tags(trim($_POST["resim"]));
         $kategori = $_POST["kategori"];
         $aciklama = strip_tags($_POST["aciklama"]);
		 
		 if(!$baslik || !$resim || !$aciklama){
			 
			 
			 echo '<div class="hata">gerekli alanları doldurmanız gerekiyor</div>';
			 
		 }else {
			 
			 $v = $db->prepare("select * from konular where konu_baslik=?");
			 $v->execute(array($baslik));
			$x = $v->fetch(PDO::FETCH_ASSOC);
			$z = $v->rowCount();
			 
			 if($z){
				 
				 echo '<div class="hata"> bole bir konu daha once acılmıs baska bir konu deneyin</div>';
				 
			 }else {
				 
				
              $x = $db->prepare("insert into konular set 
			             
						 konu_baslik=?,
						 konu_resim=?,
						 konu_kategori=?,
						 konu_aciklama=?,
						 konu_ekleyen=?
			  
			  
			  ");				
				
            $kayit = $x->execute(array($baslik,$resim,$kategori,$aciklama,$_SESSION["uye"]));				
				
              if($kayit){
				  
				  
				  echo '<div class="basarili2">konu basariyla eklendi </div>';
				  
				  
			  }else {
				  
				  echo'<div class="hata">konu eklerken bir hata olustu</div>';
				  
			  }
				
			 }
			 
		 }
		  
		  
	  }else {
		  
		 ?>
<div class="sol2">
    <h2>konu ekle</h2>
<form action="" method="post">	
	<ul>  
	<li>baslik</li>
	<li><input type="text" name="baslik" /></li>
	<li>konu resim</li>
	<li><input type="text" name="resim" placeholder="resim kodunu girdin" /></li>
	<li>kategori</li>
	<li>  
	<select name="kategori" id="">
	<?php 
	 $v = $db->prepare("select * from kategoriler");
	 $v->execute(array());
	 $x = $v->fetchALL(PDO::FETCH_ASSOC);
	 
	 foreach($x as $m){
		 
		 
		echo '<option value="'.$m["kategori_id"].'">'.$m["kategori_adi"].'</option>'; 
		 
	 }
	
	?>
	
	</select>
	
	</li>
	<li>konu acıklaması</li>
	<li><textarea name="aciklama" id="" cols="50" rows="10"></textarea></li>
	
	<li><button type="submit">gonder</button></li>
	</ul>
	</form>
	</div>
         <?php		 
		  
	  }
	  
	  
  }else {
	  
	  echo '<div class="hata">uye olmadan konu ekleyemessiniz</div>';
	  
  }
  


?>