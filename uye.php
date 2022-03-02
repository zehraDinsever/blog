<?php
!defined("index") ? die("hacking ?") : null;
if ($_SESSION) {

?>
	<div class="sag3">
		<h2>uye profili</h2>
		<div style="border:1px solid #ddd;padding:7px;font-size:19px;font-weight:bold;">
			hosgeldiniz : <?php echo $_SESSION["uye"]; ?></div>
		<ul>

			<?php
			if ($_SESSION["rutbe"] == 1) {

				echo '<li><a href="/blog/admin/">admin paneli</a></li>';
			} ?>
			<li><a href="?do=profil&uye=<?php echo $_SESSION["uye"]; ?>">profil</a></li>
			<li><a href="?do=mesaj">mesajlarım</a>
				<?php

				$v = $db->prepare("select * from mesajlar where mesaj_kime=? and mesaj_okunma=?");
				$v->execute(array($_SESSION["id"], 0));
				$v->fetchALL(PDO::FETCH_ASSOC);
				$x = $v->rowCount();

				echo $x;

				$v = $db->prepare("select * from mesajlar where mesaj_kime=? and mesaj_okunma=?");
				$v->execute(array($_SESSION["id"], 1));
				$v->fetchALL(PDO::FETCH_ASSOC);
				$x = $v->rowCount();

				echo '<span style="margin-left:5px;">' . $x . '</span>';

				?>

			</li>
			<li><a href="?do=konu_ekle">konu ekle</a></li>
			<li><a href="?do=cikis">cıkıs</a></li>
		</ul>
	</div>
<?php

} else {

?>
	<div class="sag2">
		<h2>uye girisi</h2>
		<ul>
			<form action="?do=uye" method="post">
				<li>uye adı</li>
				<li><input type="text" name="name" /></li>
				<li>sifreniz</li>
				<li><input type="password" name="sifre" /></li>
				<li><button type="submit">giris yap</button></li>
			</form>
		</ul>
	</div>
<?php

}

?>