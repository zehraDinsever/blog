<?php !defined("index") ? die("hacking ?") : null;?>

<div class="sag3"> 
	<h2>kategoriler</h2>
	<ul> 
<?php 

  $kategori = $db->prepare("select * from kategoriler");
  $kategori->execute(array());
 $v = $kategori->fetchALL(PDO::FETCH_ASSOC);
 $x = $kategori->rowCount();
   
   if($x){
	   
	   foreach($v as $m){
		   
		   echo '<li><a href="?do=kategori&id='.$m["kategori_id"].'">'.$m["kategori_adi"].'</a></li>';
		   
		   
	   }
	   
   }else {
	   
	 
echo '<div class="hata">suan hic kategori bulunmuyor</div>';	 
	   
	   
   }

?>


	
	
	</ul>
	</div>