<?php !defined("index") ? die("hacking ?") : null;?>	
<?php 
 $id = $_GET["id"];
 $konu = $db->prepare("select * from konular inner join kategoriler on 
 
 kategoriler.kategori_id = konular.konu_kategori where konu_kategori=?");
 $konu->execute(array($id));
$x =  $konu->fetchALL(PDO::FETCH_ASSOC);
$v = $konu->rowCount();


   if($v){
	   
	   foreach($x as $m){
	
	?>
	<div class="sol2"> 
	<h2><?php echo $m["konu_baslik"];?></h2>
	<div class="bilgi">kategori : <?php echo $m["kategori_adi"];?> yazan : <?php echo $m["konu_ekleyen"];?> 
	okunma : <?php echo $m["konu_hit"];?> yorum : 2 
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

	   
	   
   }else {
	   
	   
	   echo '<div class="hata">bu kategoriye ait hic konu bulunmuyor</div>';
	   
   }

?>	
	