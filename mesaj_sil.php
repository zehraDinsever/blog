<?php !defined("index") ? die("hacking ?") : null;?>
<?php

   
   if($_SESSION){
	   
	   
	   $id = $_GET["id"];
	   
	   $v = $db->prepare("delete from mesajlar where mesaj_id=? and mesaj_kime=?");
	  $sil =  $v->execute(array($id,$_SESSION["id"]));
	  $x =  $v->rowCount();
	  
	  if($x){
		  
		if($sil){
			
			echo '<div class="basarili2">mesajınız basarıyla silindi...</div>';
			
			header("refresh: 2; url=?do=mesaj");
			
		}  else {
			
			echo '<div class="hata">mesajı silerken bir hata olustu</div>';
			
		}
		  
	  }else {
		  
		  
		  echo '<div class="hata">yanlıs bir mesajı silmeye calıstınız..</div>';
		  
	  }
	   
   }


?>