<?php

if(isset($_POST["kaydet"]))
{
$l_no=mysql_real_escape_string($_POST["l_no"]);
$ad=mysql_real_escape_string($_POST["ad"]);
$soyad=mysql_real_escape_string($_POST["soyad"]);
$mevki=mysql_real_escape_string($_POST["mevki"]);
$takim=mysql_real_escape_string($_POST["takim"]);
$boy=mysql_real_escape_string($_POST["boy"]);
$kilo=mysql_real_escape_string($_POST["kilo"]);
$il=mysql_real_escape_string($_POST["il"]);
$d_tarih=mysql_real_escape_string($_POST["d_tarih"]);
$f_no=mysql_real_escape_string($_POST["f_no"]);

$kaydet="INSERT INTO futbolcular(lisans_no,adi,soyadi,mevki,takim_id,boy,kilo,dogum_yeri,dogum_tarihi,forma_no) VALUES ('$l_no','$ad','$soyad','$mevki','$takim','$boy','$kilo','$il','$d_tarih','$f_no')";
$sonuc=mysql_query($kaydet,$connect);
if($sonuc){

echo '<div class="alert alert-success">';
echo "<p>Kayıt Başarılı</p>";
header( 'refresh: 1; url=?go=futbolcu' ); 
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
    <li class="active"><a data-toggle="tab" href="#tab1">Oyuncular</a></li>
    <li><a data-toggle="tab" href="#tab2">Yeni Oyuncu Ekle</a></li>

    </ul>
 <div class="tab-content">
	    <div class="tab-pane active" id="tab1">

<table class="table">
<tr><th>Lisans No</th><th>Adı</th><th>Soyadı</th><th>Oynadığı Takım</th><th>Forma No</th></tr>

<?php
 $sorgu="SELECT * FROM futbolcular Order By adi asc";
		$sonuc=mysql_query($sorgu,$connect);
		
while($satir=mysql_fetch_array($sonuc)){
echo'<tr><td>'.$satir["lisans_no"].'</td><td>'.$satir["adi"].'</td><td>'.$satir["soyadi"].'</td><td>'.takim($satir["takim_id"]).'</td><td>'.$satir["forma_no"].'</td></tr>';

}

?>
</table>

		</div> 
<div class="tab-pane" id="tab2">
		
 <table  class="table table-striped">
 <form action="?go=futbolcu" method="post" class="">


 <tr><th>Lisans No</th><td><input type="text" name="l_no" value="" /></td></tr> 
<tr><th>Adı</th> <td><input type="text" name="ad" value="" /></td></tr> 
<tr><th>Soyadı</th> 	<td><input type="text" name="soyad" value="" /></td></tr> 
<tr><th>Mevki</th>
<td>
<select name="mevki" >
<option>Kaleci</option><option>Defans</option><option>Orta Saha</option><option>Forvet</option>
</select>
</td></tr> 
<tr><th>Takımı</th> 	<td>
<select name="takim">
<?php $sorgu1="SELECT adi,takim_id FROM takimlar order by adi";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["takim_id"].'">'.$satir1["adi"].'</option>';
			}
			?>	
</select>
</td></tr> 
<tr><th>Forma No</th> 	<td><input type="text" name="f_no" value="" /></td></tr> 
<tr><th>Boy</th> 	<td><input type="text" name="boy" value="" /></td></tr> 
<tr><th>Kilo</th> 	<td><input type="text" name="kilo" value="" /></td></tr> 
<tr><th>Doğum Yeri</th> 	<td>
<select name="il" >
<option value="Adana">Adana</option>
<option value="Adiyaman">Adiyaman</option>
<option value="Afyonkarahisar">Afyonkarahisar</option>
<option value="Agri">Agri</option>
<option value="Aksaray">Aksaray</option>
<option value="Amasya">Amasya</option>
<option value="Ankara">Ankara</option>
<option value="Antalya">Antalya</option>
<option value="Ardahan">Ardahan</option>
<option value="Artvin">Artvin</option>
<option value="Aydin">Aydin</option>
<option value="Balikesir">Balikesir</option>
<option value="Bartin">Bartin</option>
<option value="Batman">Batman</option>
<option value="Bayburt">Bayburt</option>
<option value="Bilecik">Bilecik</option>
<option value="Bingol">Bingol</option>
<option value="Bitlis">Bitlis</option>
<option value="Bolu">Bolu</option>
<option value="Burdur">Burdur</option>
<option value="Bursa">Bursa</option>
<option value="Canakkale">Canakkale</option>
<option value="Cankiri">Cankiri</option>
<option value="Corum">Corum</option>
<option value="Denizli">Denizli</option>
<option value="Diyarbakir">Diyarbakir</option>
<option value="Duzce">Duzce</option>
<option value="Edirne">Edirne</option>
<option value="Elazig">Elazig</option>
<option value="Erzincan">Erzincan</option>
<option value="Erzurum">Erzurum</option>
<option value="Eskisehir">Eskisehir</option>
<option value="Gaziantep">Gaziantep</option>
<option value="Giresun">Giresun</option>
<option value="Gumushane">Gumushane</option>
<option value="Hakkari">Hakkari</option>
<option value="Hatay">Hatay</option>
<option value="Igdir">Igdir</option>
<option value="Isparta">Isparta</option>
<option value="Istanbul">Istanbul</option>
<option value="Izmir">Izmir</option>
<option value="Kahramanmaras">Kahramanmaras</option>
<option value="Karabuk">Karabuk</option>
<option value="Karaman">Karaman</option>
<option value="Kars">Kars</option>
<option value="Kastamonu">Kastamonu</option>
<option value="Kayseri">Kayseri</option>
<option value="Kilis">Kilis</option>
<option value="Kirikkale">Kirikkale</option>
<option value="Kirklareli">Kirklareli</option>
<option value="Kirsehir">Kirsehir</option>
<option value="Kocaeli">Kocaeli</option>
<option value="Konya">Konya</option>
<option value="Kutahya">Kutahya</option>
<option value="Malatya">Malatya</option>
<option value="Manisa">Manisa</option>
<option value="Mardin">Mardin</option>
<option value="Mersin">Mersin</option>
<option value="Mugla">Mugla</option>
<option value="Mus">Mus</option>
<option value="Nevsehir">Nevsehir</option>
<option value="Nigde">Nigde</option>
<option value="Ordu">Ordu</option>
<option value="Osmaniye">Osmaniye</option>
<option value="Rize">Rize</option>
<option value="Sakarya">Sakarya</option>
<option value="Samsun">Samsun</option>
<option value="Sanliurfa">Sanliurfa</option>
<option value="Siirt">Siirt</option>
<option value="Sinop">Sinop</option>
<option value="Sirnak">Sirnak</option>
<option value="Sivas">Sivas</option>
<option value="Tekirdag">Tekirdag</option>
<option value="Tokat">Tokat</option>
<option value="Trabzon">Trabzon</option>
<option value="Tunceli">Tunceli</option>
<option value="Usak">Usak</option>
<option value="Van">Van</option>
<option value="Yalova">Yalova</option>
<option value="Yozgat">Yozgat</option>
<option value="Zonguldak">Zonguldak</option></select>
</td></tr>
<tr><th>Doğum Tarihi</th> 	<td><input type="text" name="d_tarih" value="" /></td></tr> 
  
</tr><td></td><td><button type="submit" name="kaydet" class="btn">Kaydet</button></td></tr>
</table>
</form>

</div>
