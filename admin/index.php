
<?php session_start(); ?>
<?php include("ayar.php"); ?>
<html>

<head>
     <meta charset="UTF-8">
     <title>ADMİN PANELİ..</title>
     <link rel="stylesheet" href="../css/styles.css" />
     <link rel="stylesheet" href="../css/reset.css" />
     <link rel="stylesheet" href="../css/admin.css" />
</head>

<body>
     <?php
     if ($_SESSION) {

          if ($_SESSION["rutbe"] == 1) {

     ?>
               <div class="admin-genel">
                    <div class="admin-header">
                         <h2><a href="/blog/admin/">kolay video dersleri <span style="color:red;">admin paneli</span></a>
                              <span style="float:right; margin-right:20px;"><a href="/blog/index.php/">siteyi görüntüle</a></span>
                         </h2>
                         <div class="uye">Admin paneline hoş geldiz :<?php  echo $_SESSION["uye"]; ?></div>
                    </div>
                    <div class="admin-icerik">
                         <div class="admin-menu">
                              <ul>
                                   <li><a href="/blog/admin/?do=konular">konular</a></li>
                                   <li><a href="">uyeler</a></li>
                                   <li><a href="">yorumlar</a></li>
                                   <li><a href="">kategoriler</a></li>
                                   <li><a href="">cıkıs</a></li>
                              </ul>
                         </div>
                         <?php
                               $do = @$_GET["do"];
                               if(file_exists("($do).php")){
                                  
                                   include ("($do).php");

                               }else{
                                    include ("anasayfa.php");
                               }
                         ?>
                    </div>
               </div>
     <?php

          } else {
               echo '<div class="hata">Admin panelinde yetkiniz bulunmuyor </div>';
          }
     } else {

          echo '<div class="hata">Aadmin paneline girmek için uye girişi yapan gerekiyor </div>';
     }


     ?>

</body>

</html>