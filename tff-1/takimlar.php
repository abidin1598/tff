<?php



if(isset($_POST["kaydet"])){
		
if(is_uploaded_file($_FILES['photo']['tmp_name']))
    {
    if(move_uploaded_file($_FILES['photo']['tmp_name'],
   "photo/".$_FILES['photo']['name']))
    {
    $url="photo/".$_FILES['photo']['name']."";
    echo "secilen ".$url."/<b></b> adli resim<br>\n";
    }
    else
    {
    echo '<div class="alert alert-error">';
echo "<p>Resim yüklenirken bir hata oluştu</p>";
echo'</div>';
    }
    }
	
$yolu[1]=trim($url);

$ad=mysql_real_escape_string($_POST["t_ad"]);
$lig=mysql_real_escape_string($_POST["lig"]);
$baskan=mysql_real_escape_string($_POST["baskan"]);
$ktarih=mysql_real_escape_string($_POST["ktarih"]);
$sponsor=mysql_real_escape_string($_POST["sponsor"]);
$teknik=mysql_real_escape_string($_POST["teknik"]);

$kaydet="INSERT INTO takimlar(adi,baskan, kurulus_tarihi, sponsor,lig_id,teknik_id,resim_yolu) VALUES ('$ad','$baskan','$ktarih','$sponsor','$lig','$teknik','$yolu[1]')";
$sonuc=mysql_query($kaydet,$connect);
if($sonuc){

echo '<div class="alert alert-success">';
echo "<p>Kayıt Başarılı</p>";
header( 'refresh: 1; url=?go=takim' ); 
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
    <li class="active"><a data-toggle="tab" href="#takim">Takımlar</a></li>
    <li><a data-toggle="tab" href="#profile">Yeni Takım Ekle</a></li>

    </ul>
    
 
    <div class="tab-content">
    <div class="tab-pane active" id="takim">
<table class="table">
<tr><th>Takım Adı</th><th>Lig(Grup)</th><th>Baskanı</th><th style="width:50px">Kuruluş Tarihi</th><th>Sponsor</th><th>İşlemler</th></tr>

<?php

 $sorgu="SELECT * FROM takimlar INNER JOIN ligler ON takimlar.lig_id = ligler.lig_id Order By adi";
		$sonuc=mysql_query($sorgu,$connect);
		
while($satir=mysql_fetch_array($sonuc)){
echo'<tr><td><a href="?go=mac_detay&ID='.$satir["takim_id"].'">'.$satir["adi"].'</a></td><td>'.$satir["lig_adi"].'</td><td>'.$satir["baskan"].'</td><td>'.$satir["kurulus_tarihi"].'</td><td>'.$satir["sponsor"].'</td><td><a href="?go=takim_duzelt&do='.$satir["takim_id"].'"><i title="Düzelt" class="icon-edit"></i></a>  <a href="?go=takim_sil&do='.$satir["takim_id"].'"><i title="Sil" class="icon-remove"></i></a></td></tr>';

}

?>
</table>

</div><!-- tab takimlar son -->
    <div class="tab-pane" id="profile">


 <table  class="table table-striped">

 <form action="?go=takim" method="post" enctype="multipart/form-data" name="upload" class="well">

 
  <tr><th>Takım Adı</th>  <td><input type="text" name="t_ad" value="" /></td></tr>
<tr><th>Lig(Grup)</th><td><select name="lig" >
		<?php $sorgu1="SELECT lig_id,lig_adi FROM ligler order by lig_adi";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["lig_id"].'">'.$satir1["lig_adi"].'</option>';
			}
			?>	
	</select></td></tr>
	<tr><th>Teknik Direktör</th><td><select name="teknik" >
		<?php $sorgu2="SELECT teknik_id,CONCAT(adi,' ',soyadi) as adsoyad FROM teknik_direktor order by adi";
				$sonuc2=mysql_query($sorgu2,$connect);
			while($satir2=mysql_fetch_array($sonuc2)){
			echo'<option value="'.$satir2["teknik_id"].'">'.$satir2["adsoyad"].'</option>';
			}
			?>	
	</select></td></tr>
 <tr><th>Baskanı</th>	<td><input type="text" name="baskan" value="" /></td></tr>
 <tr><th>Kuruluş Tarihi</th><td><input  type="text" name="ktarih" value="" /></td></tr>
 <tr><th>Logo</th><td><input  type="file" name="photo"  value="" /></td></tr>
<tr><th>Sponsor</th><td><input type="text" name="sponsor" value="" /></td></tr>
  </tr> 
  <tr><td></td><td><button type="submit" name="kaydet" class="btn">Kaydet</button></td></tr>
</form>
</table>

</div>
 </div><!-- tab yeni takimlar son -->
     
    <script>
   $(function () {
$('#myTab a:first').tab('show');
})
    </script>
