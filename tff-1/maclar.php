<?php



if(isset($_POST["kaydet"])){

$hafta=mysql_real_escape_string($_POST["hafta"]);
$lig=mysql_real_escape_string($_POST["lig"]);
$mtarih=mysql_real_escape_string($_POST["m_tarih"]);
$ev_takim=mysql_real_escape_string($_POST["ev_takim"]);
$m_takim=mysql_real_escape_string($_POST["m_takim"]);
$stadyum=mysql_real_escape_string($_POST["stadyum"]);
$hakem=mysql_real_escape_string($_POST["hakem"]);
$gozlemci=mysql_real_escape_string($_POST["gozlemci"]);

$kaydet="INSERT INTO fikstur(hafta,lig_id,tarih,ev_sahibi_id,misafir_id,stadyum_id,hakem_id,gozlemci_id) VALUES ('$hafta','$lig','$mtarih','$ev_takim','$m_takim','$stadyum','$hakem','$gozlemci')";
$sonuc=mysql_query($kaydet,$connect);
if($sonuc){

echo '<div class="alert alert-success">';
echo "<p>Kayıt Başarılı</p>";
header( 'refresh: 1; url=?go=mac' ); 
echo'</div>';

}
else{
	echo '<div class="alert alert-error">';
echo "<p>Bir hata oluştu : ".mysql_error()."</p>";
echo'</div>';


}

}


if(isset($_POST["update"])){

$mac_id=mysql_real_escape_string($_POST["mac_id"]);
$ev_takim=mysql_real_escape_string($_POST["ev_sahibi"]);
$m_takim=mysql_real_escape_string($_POST["misafir"]);

$kaydet="Update fikstur SET skor_ev=$ev_takim,skor_dep=$m_takim WHERE mac_id=$mac_id";
$sonuc=mysql_query($kaydet,$connect);
if($sonuc){

echo '<div class="alert alert-success">';
echo "<p>Kayıt Başarılı</p>";
header( 'refresh: 1; url=?go=mac' ); 
echo'</div>';

}
else{
	echo '<div class="alert alert-error">';
echo "<p>Bir hata oluştu : ".mysql_error()."</p>";
echo'</div>';


}

}

if(isset($_POST["gol"])){

$mac_id=mysql_real_escape_string($_POST["mac_id"]);
$futbolcu_id=mysql_real_escape_string($_POST["oyuncu"]);
$gol_sayi=mysql_real_escape_string($_POST["kac_gol"]);

$kaydet="Insert Into goller(mac_id,oyuncu_id,gol_sayisi) Values('$mac_id','$futbolcu_id','$gol_sayi')";
$sonuc=mysql_query($kaydet,$connect);
if($sonuc){

echo '<div class="alert alert-success">';
echo "<p>Kayıt Başarılı</p>";
header( 'refresh: 1; url=?go=mac' ); 
echo'</div>';

}
else{
	echo '<div class="alert alert-error">';
echo "<p>Bir hata oluştu : ".mysql_error()."</p>";
echo'</div>';


}

}
 ?>
    <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#tab1">Maçlar</a></li>
    <li><a data-toggle="tab" href="#tab2">Yeni Maç Ekle</a></li>
    <li><a data-toggle="tab" href="#tab3">Maç Sonucu Ekle</a></li>
    <li><a data-toggle="tab" href="#tab4">Goller Ekle</a></li>

    </ul>
    
 
    <div class="tab-content">
    <div class="tab-pane active" id="tab1">
<table class="table">
<tr><th>Hafta</th><th>Lig(Grup)</th><th>Ev Sahibi Takım</th><th>Skor</th><th>Misafir Takım</th><th>Traih</th></tr>

<?php




 $sorgu="SELECT * FROM fikstur INNER JOIN ligler ON fikstur.lig_id = ligler.lig_id Order By hafta ";
		$sonuc=mysql_query($sorgu,$connect);
		
while($satir=mysql_fetch_array($sonuc)){
echo'<tr><td>'.$satir["hafta"].'</td><td>'.$satir["lig_adi"].'</td><td>'.takim($satir["ev_sahibi_id"]).'</td><td>'.$satir["skor_ev"].' - '.$satir["skor_dep"].'</td><td>'.takim($satir["misafir_id"]).'</td><td>'.$satir["tarih"].'</td></tr>';

}


?>
</table>

</div><!-- tab takimlar son -->
    <div class="tab-pane" id="tab2">


 <table  class="table table-striped">

 <form action="?go=mac" method="post" class="well">


	    <tr><th>Lig</th><td><select name="lig" >
			<?php $sorgu1="SELECT lig_id,lig_adi FROM ligler order by lig_adi";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["lig_id"].'">'.$satir1["lig_adi"].'</option>';
			}
			?>	
		</select></tr> 
<tr><th>Hafta</th><td><select name="hafta" >
			<?php
			for($i=1;$i<=34;$i++){
			echo'<option value="'.$i.'">'.$i.'</option>';
			}
			?>	
		</select></tr> 
<tr><th>Maç Tarihi</th><td><input type="text" name="m_tarih" value="" /></td></tr>
 	    <tr><th>Ev Sahibi Takım</th><td><select name="ev_takim" >
			<?php $sorgu1="SELECT adi,takim_id FROM takimlar order by adi";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["takim_id"].'">'.$satir1["adi"].'</option>';
			}
			?>	
		</select></td></tr> 
 <tr><th>Misafir Takım</th><td><select name="m_takim" >
			<?php $sorgu1="SELECT adi,takim_id FROM takimlar order by adi";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["takim_id"].'">'.$satir1["adi"].'</option>';
			}
			?>	
		</select></tr> 

 <tr><th>Stadyum</th><td><select name="stadyum" >
			<?php $sorgu1="SELECT stadyum_adi,stadyum_id FROM stadyumlar order by stadyum_adi";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["stadyum_id"].'">'.$satir1["stadyum_adi"].'</option>';
			}
			?>	
		</select></tr> 

 <tr><th>Hakem</th><td><select name="hakem" >
			<?php $sorgu1="SELECT CONCAT(adi,' ',ucase(soyadi)) as adsoyad,hakem_id FROM hakemler order by adsoyad";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["hakem_id"].'">'.$satir1["adsoyad"].'</option>';
			}
			?>	
		</select></td></tr> 

 <tr><th>Gözlemci</th><td><select name="gozlemci" >
			<?php $sorgu1="SELECT CONCAT(adi,' ',ucase(soyadi)) as adsoyad,gozlemci_id FROM gozlemci order by adsoyad";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["gozlemci_id"].'">'.$satir1["adsoyad"].'</option>';
			}
			?>	
		</select></tr> 


  
	<tr><td></td><td><button type="submit" name="kaydet" class="btn">Kaydet</button></td>
</tr></form>
</table>

</div>
   <div class="tab-pane" id="tab3">
<table  class="table table-striped">
 <tr><th>Maç</th><th >Ev Sahibi Gol</th><th>Misafir Gol</th></tr>

<form action="?go=mac" method="post" class="well">

<tr><td><select name="mac_id" >
			<?php 

$sorgu1="SELECT ev_sahibi_id,misafir_id,mac_id FROM fikstur";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["mac_id"].'">'.takim($satir1["ev_sahibi_id"]).' - '.takim($satir1["misafir_id"]).'</option>';
			}
			?>	
		</select>
</td>
<td><input type="number" name="ev_sahibi" style="width:40px" value="" /></td>
<td><input type="number" name="misafir" style="width:40px" value="" /></td>
</tr>
<tr><td></td><td></td><td><button type="submit" name="update" class="btn">Kaydet</button></td>
</tr> 
</form>
</table>
</div>

 <div class="tab-pane" id="tab4">
<table  class="table table-striped">
 <tr><th>Maç</th><th >Gol Atan</th><th >Gol Sayısı</th></tr>

<form action="?go=mac" method="post" class="well">

<tr><td><select name="mac_id" >
			<?php 

$sorgu1="SELECT ev_sahibi_id,misafir_id,mac_id FROM fikstur";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["mac_id"].'">'.takim($satir1["ev_sahibi_id"]).' - '.takim($satir1["misafir_id"]).'</option>';
			}
			?>	
		</select>
</td>
		<td><select name="oyuncu" >
			<?php $sorgu1="SELECT CONCAT(adi,' ',ucase(soyadi)) as adsoyad,lisans_no FROM futbolcular  order by adsoyad";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir2=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir2["lisans_no"].'">'.$satir2["adsoyad"].'</option>';
			}
			?>	
		</select>
</td>
<td><input type="number" name="kac_gol" style="width:40px" value="" /></td>
</tr>
<tr><td></td><td></td><td><button type="submit" name="gol" class="btn">Kaydet</button></td>
</tr> 
</form>
</table>
</div>
 </div><!-- tab yeni takimlar son -->
     
    <script>
   $(function () {
$('#myTab a:first').tab('show');
})
    </script>


