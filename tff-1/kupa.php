
		<?php

		if(isset($_POST["kaydet"])){

		$ad=mysql_real_escape_string($_POST["k_ad"]);
		$sezon=mysql_real_escape_string($_POST["sezon"]);
		$takim=mysql_real_escape_string($_POST["takim"]);
		$sponsor=mysql_real_escape_string($_POST["sponsor"]);

		$kaydet="INSERT INTO kupa(kupa_adi,sezon, sampiyon_takim_id, sponsor) VALUES ('$ad','$sezon','$takim','$sponsor')";
		$sonuc=mysql_query($kaydet,$connect);
		if($sonuc){

		echo '<div class="alert alert-success">';
		echo "<p>Kayıt Başarılı</p>";
		header( 'refresh: 1; url=?go=kupalar' ); 

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
    <li class="active"><a data-toggle="tab" href="#tab1">Kupalar</a></li>
    <li><a data-toggle="tab" href="#tab2">Yeni Kupa Ekle</a></li>

    </ul>
     
 <div class="tab-content">
	    <div class="tab-pane active" id="tab1">
			<table class="table">
		 <tr><th>Kupa  Adı</th><th>Sezon</th><th>Sampiyon</th><th>Sponsor</th></tr>

			<?php
			 $sorgu3="Select * from kupa";
					$sonuc3=mysql_query($sorgu3,$connect);		
			while($satir3=mysql_fetch_array($sonuc3)){
			echo'<tr><td>'.$satir3["kupa_adi"].'</td><td>'.$satir3["sezon"].'</td><td>'.takim($satir3["sampiyon_takim_id"]).'</td><td>'.$satir3["sponsor"].'</td></tr>';

			}

			?>
			</table>

 </div>
    <div class="tab-pane" id="tab2">


	
		 <table  class="table table-striped">
		 <tr><th>Kupa  Adı</th><th>Sezon</th><th>Sampiyon</th><th>Sponsor</th></tr>
		 <form action="?go=kupalar" method="post" class="form">

		 <tr>
		    <td><input type="text" name="k_ad" value="" /></td>
			<td><input type="text" name="sezon" value="" /></td>
			<td><select name="takim" >
			<?php $sorgu1="SELECT adi,takim_id FROM takimlar order by adi";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["takim_id"].'">'.$satir1["adi"].'</option>';
			}
			?>	
		</select>
			<td><input type="text" name="sponsor"  value="" /></td>
	
		  </tr> 
		  <tr>
			<td></td><td></td><td></td><td><button type="submit" name="kaydet" class="btn">Kaydet</button></td>
		</tr>
		</table>
		</form>

 </div>
 
