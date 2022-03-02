<?php
 $v = $db->prepare("select * from konular inner join kategoriler on kategoriler.kategori_id
 
 konular.konu_kategori order by konu_id desc");

 $v->execute(array());
 $k = $v->fetchAll(PDO::FETCH_ASSOC);
 $x = $v->rowCount();

?>


<div class="admin-icerik-sag">
   <h2>konular</h2>
   <div class="konular">
       <table cellspacing="0" cellpadding="0">
           <thead>
               <tr>
                   <th width="600">konu baslıkları</th><th width="300">kategoriler</th>
                   <th width="200">konu onayları</th><th width="250">tarih</th>
                   <th width="200">işlemler</th>
               </tr>
           </thead>
          <?php
         if($x){
             foreach($k as $m){
                 ?>
                     <tbody>
                         <tr>
                             <td><?php echo$m["konu_baslik"]; ?></td> <td><?php echo$m["konu_kategori_adi"]; ?></td>
                            <td>
                                 <?php  
                             
                             if($m["konu_durum"]==1){
                                 echo '<span style="color:green">onaylı</span>';

                             }else{

                                echo '<span style="color:red">onaylıdeğil</span>';
                             }
                             
                             ?>
                            </td>
                            <td><?php echo$m["konu_tarih"]; ?></td>
                            <td><span style="margin: left 35px;"><a href="">düzenle</a></span> <span style="margin: left 10px;"><a href=""></a>sil</span></td>
                            </tr>
                     </tbody>
                 <?php
             }

         }else{
             echo '<tr><td colspan="5"><div class="hata">Henüz hiç konu eklenmemiş..</div></td></tr>';
         }
          ?>

       </table>
   </div>
</div>