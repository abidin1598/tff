
		<?php

		if(isset($_POST["kaydet"])){

		$oyuncu=mysql_real_escape_string($_POST["oyuncu"]);
		
		$kart_tipi=mysql_real_escape_string($_POST["kart_tipi"]);
		$mac=mysql_real_escape_string($_POST["mac"]);

		$kaydet="INSERT INTO cezalar(futbolcu_id,kart_tipi, mac_id) VALUES ('$oyuncu','$kart_tipi','$mac')";
		$sonuc=mysql_query($kaydet,$connect);
		if($sonuc){

		echo '<div class="alert alert-success">';
		echo "<p>Kayıt Başarılı</p>";
		header( 'refresh: 1; url=?go=ceza' ); 

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
    <li class="active"><a data-toggle="tab" href="#tab1">Cezalar</a></li>
    <li><a data-toggle="tab" href="#tab2">Ceza Alan Oyuncu Ekle</a></li>

    </ul>
     
 <div class="tab-content">
	    <div class="tab-pane active" id="tab1">
			<table class="table">
			<tr><th>Adı-Soyadı</th><th>Kart Tipi</th><th>Mac</th></tr>

			<?php
			 $sorgu="SELECT * from cezalar";
					$sonuc=mysql_query($sorgu,$connect);
		
			while($satir=mysql_fetch_array($sonuc)){
			echo'<tr><td>'.$satir["futbolcu_id"].'</td><td>'.$satir["kart_tipi"].'</td><td>'.$satir["mac_id"].'</td><td></td></tr>';

			}

			?>
			</table>

 </div>
    <div class="tab-pane" id="tab2">


	
		 <table  class="table table-striped">
		 <tr><th>Kart Gördüğü Maç</th><th>Futbolcu Adı Soyadı</th><th>Kart Tipi</th></tr>
		 <form action="?go=ceza" method="post" class="form">

		 <tr>
			 	<td><select name="mac" >
			<?php 
$sorgu1="SELECT ev_sahibi_id,misafir_id,mac_id FROM fikstur";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["mac_id"].'">'.takim($satir1["ev_sahibi_id"]).' - '.takim($satir1["misafir_id"]).' </option>';
			}
			?>	
		</select></td>
			<td><select name="oyuncu" >
			<?php $sorgu1="SELECT CONCAT(adi,' ',ucase(soyadi)) as adsoyad,lisans_no FROM futbolcular  order by adsoyad";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir2=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir2["lisans_no"].'">'.$satir2["adsoyad"].'</option>';
			}
			?>	
		</select>
</td>
		    <td>
			<select name="kart_tipi" >
			<option value="s">Sarı</option>
			<option value="k">Kırmızı</option>
			<option value="ssk">Sarı + Sarı</option>
			</select>
			</td>
	
		  </tr> 
		  <tr>
			<td></td><td></td><td></td><td><button type="submit" name="kaydet" class="btn">Kaydet</button></td>
		</tr>
		</table>
		</form>

 </div>
 
