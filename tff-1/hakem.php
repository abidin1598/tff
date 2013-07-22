
		<?php

		if(isset($_POST["kaydet"])){

		$ad=mysql_real_escape_string($_POST["h_ad"]);
		$soyad=mysql_real_escape_string($_POST["h_soyad"]);
		$klasman=mysql_real_escape_string($_POST["klasman"]);
		$dtarih=mysql_real_escape_string($_POST["h_dtarih"]);

		$kaydet="INSERT INTO hakemler(adi,soyadi, klasman, dogum_tarihi) VALUES ('$ad','$soyad','$klasman','$dtarih')";
		$sonuc=mysql_query($kaydet,$connect);
		if($sonuc){

		echo '<div class="alert alert-success">';
		echo "<p>Kayıt Başarılı</p>";
		header( 'refresh: 1; url=?go=hakem' ); 

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
    <li class="active"><a data-toggle="tab" href="#tab1">Hakemler</a></li>
    <li><a data-toggle="tab" href="#tab2">Yeni Hakem Ekle</a></li>

    </ul>
     
 <div class="tab-content">
	    <div class="tab-pane active" id="tab1">
			<table class="table">
			<tr><th>Hakem Adı</th><th>Soyadı</th><th>Klasman</th><th style="width:50px">Doğum Tarihi</th></tr>

			<?php
			 $sorgu3="Select * from hakemler";
					$sonuc3=mysql_query($sorgu3,$connect);		
			while($satir3=mysql_fetch_array($sonuc3)){
			echo'<tr><td>'.$satir3["adi"].'</td><td>'.$satir3["soyadi"].'</td><td>'.$satir3["klasman"].'</td><td>'.$satir3["dogum_tarihi"].'</td></tr>';

			}

			?>
			</table>

 </div>
    <div class="tab-pane" id="tab2">


	
		 <table  class="table table-striped">
		 <tr><th>Hakem  Adı</th><th>Soyadı</th><th>Klasman</th><th>Doğum Tarihi</th></tr>
		 <form action="?go=hakem" method="post" class="form">

		 <tr>
		    <td><input type="text" name="h_ad" value="" /></td>
			<td><input type="text" name="h_soyad" value="" /></td>
			<td><select name="klasman" >
			<option>FIFA Hakemi</option>
			<option>Üst Klasman Hakemi</option>
			<option>Ulusal Hakem</option>
			<option>Bölgesel Hakem</option>
			</select>
			<td><input type="text" name="h_dtarih" id="datepicker" value="" /></td>
	
		  </tr> 
		  <tr>
			<td></td><td></td><td></td><td><button type="submit" name="kaydet" class="btn">Kaydet</button></td>
		</tr>
		</table>
		</form>

 </div>
 
