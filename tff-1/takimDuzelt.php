	
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
$id=mysql_real_escape_string($_POST["id"]);
$ad=mysql_real_escape_string($_POST["t_ad"]);
$lig=mysql_real_escape_string($_POST["lig"]);
$baskan=mysql_real_escape_string($_POST["baskan"]);
$ktarih=mysql_real_escape_string($_POST["ktarih"]);
$sponsor=mysql_real_escape_string($_POST["sponsor"]);
$teknik=mysql_real_escape_string($_POST["teknik"]);

$kaydet="Update takimlar SET adi='$ad',baskan='$baskan', kurulus_tarihi='$ktarih', sponsor='$sponsor',lig_id='$lig',teknik_id='$teknik',resim_yolu='$yolu[1]' where takim_id='$id'";

$sonuc=mysql_query($kaydet,$connect);
if($sonuc){

echo '<div class="alert alert-success">';
echo "<p>Güncelleme Başarılı</p>";
header( 'refresh: 1; url=?go=takim' ); 
echo'</div>';

}
else{
	echo '<div class="alert alert-error">';
echo "<p>Bir hata oluştu : ".mysql_error()."</p>";
echo'</div>';


}

}
else {

 ?>


<?php
$id=@$_GET["do"];
$sor="SELECT * FROM takimlar WHERE takim_id=$id";
			$son=mysql_query($sor,$connect);
	$row=mysql_fetch_array($son);
?>
<div class="tab-content">
	<H3>Takım Düzeltme Formu</H3>
<table class="table">
	 <form action="?go=takim_duzelt" method="post" enctype="multipart/form-data" name="upload" class="well">

 <input type="hidden" name="id" value="<?=$row["takim_id"]?>"/>
  <tr><th>Takım Adı</th>  <td><input type="text" name="t_ad" value="<?=$row["adi"]?>" /></td></tr>
<tr><th>Lig(Grup)</th><td><select name="lig" >
		<?php $sorgu1="SELECT lig_id,lig_adi FROM ligler order by lig_adi desc";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["lig_id"].'">'.$satir1["lig_adi"].'</option>';
			}
			?>	
	</select></td></tr>
	<tr><th>Teknik Direktör</th><td><select name="teknik" >
		<?php $sorgu2="SELECT teknik_id,CONCAT(adi,' ',soyadi) as adsoyad FROM teknik_direktor  order by adi";
				$sonuc2=mysql_query($sorgu2,$connect);
			while($satir2=mysql_fetch_array($sonuc2)){
			echo'<option value="'.$satir2["teknik_id"].'">'.$satir2["adsoyad"].'</option>';
			}
			?>	
	</select></td></tr>
 <tr><th>Baskanı</th>	<td><input type="text" name="baskan" value="<?=$row["baskan"]?>" /></td></tr>
 <tr><th>Kuruluş Tarihi</th><td><input  type="text" name="ktarih" value="<?=$row["kurulus_tarihi"]?>" /></td></tr>
 <tr><th>Logo</th><td><input  type="file" name="photo"  value="<?=$row["resim_yolu"]?>" /></td></tr>
<tr><th>Sponsor</th><td><input type="text" name="sponsor" value="<?=$row["sponsor"]?>" /></td></tr>
  </tr> 
  <tr><td></td><td><button type="submit" name="kaydet" class="btn">Düzelt</button></td></tr>
</form>
</table>
</div>
<?php }
?>


