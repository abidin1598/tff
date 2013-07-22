<?php
if(isset($_POST["kaydet"])){
$ad=mysql_real_escape_string($_POST["ad"]);
$soyad=mysql_real_escape_string($_POST["soyad"]);
$maas=mysql_real_escape_string($_POST["maas"]);
$soz_bas=mysql_real_escape_string($_POST["soz_bas"]);
$soz_bit=mysql_real_escape_string($_POST["soz_bit"]);

$kaydet="INSERT INTO teknik_direktor(adi,soyadi,maas,sozlesme_bas,sozlesme_bit) VALUES ('$ad','$soyad','$maas','$soz_bas','$soz_bit')";
$sonuc=mysql_query($kaydet,$connect);
if($sonuc){

echo '<div class="alert alert-success">';
echo "<p>Kayıt Başarılı</p>";
//header( 'refresh: 1; url=?go=takim' ); 
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
    <li class="active"><a data-toggle="tab" href="#tab1">Teknik Adamlar</a></li>
    <li><a data-toggle="tab" href="#tab2">Teknik Ekip Ekle</a></li>

    </ul>
     
 <div class="tab-content">
	    <div class="tab-pane active" id="tab1">
			
			<table class="table">
			<tr><th>Adı - Soyadı</th><th>Maas</th><th>Sözleşme Başlama Tarih</th><th>Sözleşme Bitiş Tarih</th></tr>

			<?php
			 $sorgu="SELECT CONCAT(adi,' ',soyadi) as adsoyad,maas,sozlesme_bas,sozlesme_bit FROM teknik_direktor Order By adsoyad DESC";
					$sonuc=mysql_query($sorgu,$connect);
			while($satir=mysql_fetch_array($sonuc)){
			echo'<tr><td>'.$satir["adsoyad"].'</td><td>'.$satir["maas"].'</td><td>'.$satir["sozlesme_bas"].'</td><td>'.$satir["sozlesme_bit"].'</td></tr>';

			}

			?>
</table>
	</div>

	<div class="tab-pane" id="tab2">
	<table  class="table table-striped">
		 <tr><th>Teknik Direktör Adı</th><th>Soyadı</th><th>Maaş</th><th>Sözleşme Başlangıcı</th><th>Sözleşme Bitişi</th></tr>
		 <form action="?go=teknik" method="post" >
		 <tr>
			<td>
				<input type="text" name="ad">
			</td>
			<td>
				<input type="text" name="soyad">
			</td>
			<td>
				<input type="text" name="maas">
			</td>
			<td>
				<input type="text" name="soz_bas">
			</td>
			<td>
				<input type="text" name="soz_bit">
			</td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td><td><button type="submit" name="kaydet" class="btn">Kaydet</button></td>
		</tr>
		</form>
	</table>	
	</div>
	
	</div>
   <script>
   $(function () {
$('#myTab a:first').tab('show');
})
    </script>
