<?php !defined("index") ? die("hacking ?") : null;?>
<?php

  
  if($_SESSION){
	  
	  $id = (int) $_GET["id"];
	  
	  $v = $db->prepare("select * from mesajlar where mesaj_id=? and mesaj_kime=?");
	  $v->execute(array($id,$_SESSION["id"]));
	 $m =  $v->fetch(PDO::FETCH_ASSOC);
	 $x = $v->rowCount();
	  
	  if($x){
		 
		 $v = $db->prepare("update mesajlar set mesaj_okunma=? where mesaj_id=? and mesaj_kime=?");
		 $v->execute(array(1,$id,$_SESSION["id"]));
		 
		 
        ?>
      <div class="mesaj_oku"> 
	  <h2><span style="font-weight:bold">baslık :</span> <?php echo mb_substr($m["mesaj_baslik"],0,45);?>
	  <span style="float:right;"><?php echo $m["mesaj_tarih"];?></span></h2>
	  <p> 
	  <span style="font-weight:bold"><?php echo $m["mesaj_gonderen"];?></span> <br /> <br /> 
	  <?php echo nl2br($m["mesaj_aciklama"]);?>
	  </p>
	  
	  </div>
        <?php		
		  
		  
	  }else {
		  
		  echo '<div class="hata">bu mesaj silinmis olabilir...</div>';
		  
	  }
	  
  }



?>