<?php !defined("index") ? die("hacking ?") : null;?>
<?php 


  if($_SESSION){
	  
	  $v = $db->prepare("select * from mesajlar where mesaj_kime=? order by  mesaj_id desc");
	  $v->execute(array($_SESSION["id"]));
	 $c = $v->fetchAll(PDO::FETCH_ASSOC);
	 $x =  $v->rowcount();
	 
	 echo '<div class="mesaj"> 
	      <h2>mesajlarım <span style="float:right;"><a href="?do=mesaj_gonder">mesaj gonder</a></span></h2>
		  </div>';
	 
	 if($x){
		

       foreach($c as $m){
		   
		   if($m["mesaj_kime"] == $_SESSION["id"]){
			   
			
			if($m["mesaj_okunma"] == 1){
				
				 ?>
			 <div class="mesajlar2"> 
			 <ul> 
			 <li>
			 <a href="?do=mesaj_oku&id=<?php echo $m["mesaj_id"];?>">
			 <span style="font-weight:bold;">gonderen : </span> <?php echo $m["mesaj_gonderen"];?> 
			   <span style="font-weight:bold;">baslık :  </span> <?php echo mb_substr($m["mesaj_baslik"],0,25);?></a> 
			   <span style="float:right;"><?php echo $m["mesaj_tarih"];?> 
			   <span style="font-weight:bold;margin-left:3px;"><a href="?do=mesaj_sil&id=<?php echo $m["mesaj_id"];?>">sil</a></span></span>
			 </li>
			 </ul>
			 </div>
			 <?php
				
			}else {
				
				 ?>
			 <div class="mesajlar"> 
			 <ul> 
			 <li>
			 <a href="?do=mesaj_oku&id=<?php echo $m["mesaj_id"];?>">
			 <span style="font-weight:bold;">gonderen : </span> <?php echo $m["mesaj_gonderen"];?> 
			   <span style="font-weight:bold;">baslık :  </span> <?php echo mb_substr($m["mesaj_baslik"],0,25);?></a> 
			   <span style="float:right;"><?php echo $m["mesaj_tarih"];?> 
			   <span style="font-weight:bold;margin-left:3px;"><a href="?do=mesaj_sil&id=<?php echo $m["mesaj_id"];?>">sil</a></span></span>
			 </li>
			 </ul>
			 </div>
			 <?php
				
				
			}
           
			 
			   
		   }else {
			   
			   echo '<div class="hata">yanlıs biyere girdiniz..</div>';
			   
		   }
		   
		   
	   }		
		 
		 
		 
	 }else {
		 
		 echo '<div class="hata">hic mesajınız bulunmuyor..</div>';
		 
	 }
	  
	  
	  
  }



?>