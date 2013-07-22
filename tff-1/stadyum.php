
		<?php


		 
		if(isset($_POST["kaydet"])){

		$ad=mysql_real_escape_string($_POST["s_ad"]);
		$kapasite=mysql_real_escape_string($_POST["kapasite"]);
		$il=mysql_real_escape_string($_POST["il"]);
		$tipi=mysql_real_escape_string($_POST["tipi"]);

		$kaydet="INSERT INTO stadyumlar(stadyum_adi,kapasite, il, olimpik) VALUES ('$ad','$kapasite','$il','$tipi')";
		$sonuc=mysql_query($kaydet,$connect);
		if($sonuc){

		echo '<div class="alert alert-success">';
		echo "<p>Kayit Başarılı</p>";
		header( 'refresh: 1; url=?go=stadyum' ); 

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
    <li class="active"><a data-toggle="tab" href="#tab1">Stadyumlar</a></li>
    <li><a data-toggle="tab" href="#tab2">Yeni Stadyum Ekle</a></li>

    </ul>
     
 <div class="tab-content">
	    <div class="tab-pane active" id="tab1">

			<table class="table">
			<tr><th>Stadyum Adı</th><th>İl</th><th>Kapasite</th><th>Türü</th></tr>

			<?php
			 $sorgu="SELECT * FROM stadyumlar Order By kapasite DESC";
					$sonuc=mysql_query($sorgu,$connect);
			while($satir=mysql_fetch_array($sonuc)){
			echo'<tr><td>'.$satir["stadyum_adi"].'</td><td>'.$satir["il"].'</td><td>'.$satir["kapasite"].'</td><td>'.$satir["olimpik"].'</td></tr>';

			}

			?>
			</table>

</div>
	
<div class="tab-pane" id="tab2">

		 <table  class="table table-striped">
		 <tr><th>Stadyum  Adı</th><th>Kapasite</th><th>İl</th><th>Tipi</th></tr>
		 <form action="?go=stadyum" method="post" class="">

		 <tr>
		    <td><input type="text" name="s_ad" value="" /></td>
			<td><input type="text" name="kapasite" value="" /></td>
			<td><select name="il" >
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
</td>

			<td><select name="tipi" >
			<option>Olimpik</option>
			<option>Olimpik Değil</option>
			
			</select>
	
		  </tr> 
		  <tr>
			<td></td><td></td><td></td><td><button type="submit" name="kaydet" class="btn">Kaydet</button></td>
		</tr>
		</table>
		</form>


</div>

</div>
﻿
 



 
