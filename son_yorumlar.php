<?php !defined("index") ? die("hacking ?") : null;?>
<div class="sag4"> 
	<h2>son yorumlar</h2>
	
	<?php 
	
	$v = $db->prepare("select * from yorumlar order by yorum_id desc limit 5");
	$v->execute(array());
	$y = $v->fetchALL(PDO::FETCH_ASSOC);
	
	foreach($y as $m){
		
		echo '<h3><a href="?do=devam&id='.$m["yorum_konu_id"].'">
	
	 '.$m["yorum_mesaj"].' <br/><span style="font-size:17px;">'.$m["yorum_ekleyen"].'</span></a></h3>';
		
		
	}
	
	?>
	
	
	
	</div>