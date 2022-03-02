<?php !defined("index") ? die("hacking ?") : null;?>
<?php 
 $id = $_GET["id"];
 $konu = $db->prepare("select * from konular inner join kategoriler on 

kategoriler.kategori_id = konular.konu_kategori where konu_id=?");
 $konu->execute(array($id));
$x =  $konu->fetchALL(PDO::FETCH_ASSOC);

// konu hit bolumu
if(!@$_COOKIE["hit".$id]){
 $hit = $db->prepare("update konular set konu_hit = konu_hit +1 where konu_id=?");
 $hit->execute(array($id));

 
}
 
foreach($x as $m){
	
	$yorum = $db->prepare("select * from yorumlar where yorum_konu_id=?");
	$yorum->execute(array($m["konu_id"]));
	$yorum->fetchALL(PDO::FETCH_ASSOC);
	$x = $yorum->rowCount();
	
	?>
	<div class="sol2"> 
	<h2><?php echo $m["konu_baslik"];?></h2>
	<div class="bilgi">kategori : <?php echo $m["kategori_adi"];?> yazan : <?php echo $m["konu_ekleyen"];?> 
	okunma : <?php echo $m["konu_hit"];?> yorum : <?php echo $x;?> 
	<span style="float:right;">tarih : <?php echo $m["konu_tarih"];?></span></div>
	
	<p> 
  <img src="<?php echo $m["konu_resim"];?>" alt="" />
  <?php echo nl2br($m["konu_aciklama"]);?>.....
	</p>
	
	
	<div style="clear:both;"></div>
	</div>
	<?php
	
}


 $yorum = $db->prepare("select * from yorumlar where yorum_konu_id=?");
 $yorum->execute(array($id));
 $b = $yorum->fetchALL(PDO::FETCH_ASSOC);
 $x = $yorum->rowCount();
 
   if($x){
	   
     foreach($b as $m){
		 
		 ?>
		 <div class="yorumlar"> 
		 <h2>ekleyen : <?php echo $m["yorum_ekleyen"];?> 
		 <span style="float:right;">tarih: <?php echo $m["yorum_tarih"];?> </span></h2>
		 <p> 
		 <?php echo $m["yorum_mesaj"];?>
		 </p>
		 </div>
		 <?php
		 
		 
		 
	 }	  
	  
	   
   }else {
	   
	   echo '<div class="bilgi">henuz bu konuya hiç yorum eklenemmis</div>';
	   
   }



if($_POST){
	
	$isim  = trim($_POST["isim"]);
	$mail  = trim($_POST["mail"]);
	$mesaj = $_POST["mesaj"];
	
	if(!$mesaj || !$mail || !$isim){
		
		echo '<div class="hata">gerekli alanları doldurmanız gerekiyor</div>';
		
	}else {
		
		$yorum = $db->prepare("insert into yorumlar set 
		
		          yorum_ekleyen=?,
				  yorum_eposta=?,
				  yorum_mesaj=?,
				  yorum_konu_id=?
		
		");
		
		$ekle = $yorum->execute(array($isim,$mail,$mesaj,$id));
		
		if($ekle){
			
			
			echo '<div class="basarili2">yorumunuz basarıyla eklendi yonlendiriliyorsunuz</div>';
			
			$url = $_SERVER["HTTP_REFERER"];
			
			header("refresh: 2; url=$url");
			
			
		}else {
			
			echo '<div class="hata">yorum eklenirken bir hata olustu</div>';
			
		}
	}
	
	
}else {
	
	if($_SESSION){
		
		?>
	<div style="font-size:19px;padding:10px;">mesaj gonder</div>
<div class="sol2">
   <form action="" method="post">
	<ul> 
	
	<li><input type="hidden"  value="<?php echo $_SESSION["uye"];?>" name="isim" /></li>
	
	<li><input type="hidden"  value="<?php echo $_SESSION["eposta"];?>" name="mail" /></li>
	
	
	<li><textarea name="mesaj" id="" cols="50" rows="10"></textarea></li>
	
	<li><button type="submit">gonder</button></li>
	</ul>
	</form>
	</div>
	<?php
		
		
	}else {
		
		?>
	<div style="font-size:19px;padding:10px;">mesaj gonder</div>
<div class="sol2">
   <form action="" method="post">
	<ul> 
	<li>adınız</li>
	<li><input type="text" name="isim" /></li>
	<li>email</li>
	<li><input type="text" name="mail" /></li>
	
	
	<li><textarea name="mesaj" id="" cols="50" rows="10"></textarea></li>
	
	<li><button type="submit">gonder</button></li>
	</ul>
	</form>
	</div>
	<?php
		
		
	}
	
	
	
}

?>




	