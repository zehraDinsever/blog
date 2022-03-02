
<?php 
  
  $sayfa = intval(@$_GET["sayfa"]);
  
  if(!$sayfa){
	  
	  $sayfa =1;
	  
  }
  
  $v = $db->prepare("select * from konular inner join kategoriler on 
 
 kategoriler.kategori_id = konular.konu_kategori inner join uyeler on uyeler.uye_adi= konular.konu_ekleyen ");
  $v->execute(array());
  $v->fetchALL(PDO::FETCH_ASSOC);
  $toplam = $v->rowCount();
  $limit = 2;
  $goster = $sayfa*$limit-$limit; 
  $sayfa_sayisi =  ceil($toplam/$limit);
  $forlimit = 2;
  
  
  
 $konu = $db->prepare("select * from konular inner join kategoriler on 
 
 kategoriler.kategori_id = konular.konu_kategori inner join uyeler on uyeler.uye_adi= konular.konu_ekleyen order by konu_id desc limit $goster,$limit");
 $konu->execute(array());
$x =  $konu->fetchALL(PDO::FETCH_ASSOC);

foreach($x as $m){
	
	$yorum = $db->prepare("select * from yorumlar where yorum_konu_id=?");
	$yorum->execute(array($m["konu_id"]));
	$yorum->fetchALL(PDO::FETCH_ASSOC);
	$x = $yorum->rowCount();
	?>
	<div class="sol2"> 
	<h2><?php echo $m["konu_baslik"];?></h2>
	<div class="bilgi">kategori : <a href="?do=kategori&id=<?php echo $m["kategori_id"];?>"><?php echo $m["kategori_adi"];?></a> yazan : <a href="?do=profil&uye=<?php echo $m["uye_adi"];?>"><?php echo $m["uye_adi"];?></a> 
	okunma : <?php echo $m["konu_hit"];?> yorum : <?php echo $x;?> 
	<span style="float:right;">tarih : <?php echo $m["konu_tarih"];?></span></div>
	<div class="resim"> 
	<img src="<?php echo $m["konu_resim"];?>" alt="" />
	</div>
	<p> 

  <?php echo mb_substr($m["konu_aciklama"],0,300);?>.....
	</p>
	
	<div class="devam"> 
	<a href="?do=devam&id=<?php echo $m["konu_id"];?>">devam</a>
	</div>
	<div style="clear:both;"></div>
	</div>
	<?php
	
}
  echo '<div class="sayfalama">';
  
  for($i = $sayfa - $forlimit; $i<$sayfa + $forlimit +1; $i++ ){
	  
	  if($i>0 && $i<=$sayfa_sayisi){
		  
		  if($i == $sayfa){
			  
			  echo '<span class="aktif">'.$i.'</span>';
			  
		  }else {
			  
			 echo '<span class="sayfa"><a href="?sayfa='.$i.'">'.$i.'</a></span>'; 
			  
		  }
		  
	  }
	  
	  
  }

  if($sayfa != $sayfa_sayisi){
	  
	  
	  echo '<b style="float:right;"><a href="?sayfa='.$sayfa_sayisi.'">son</a></b>';
	  
  }
  
?>	
	
	
	  
	<div style="clear:both;"></div>
	</div>
	