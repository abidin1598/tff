<?php
$id=$_GET["do"];

$sonuc=mysql_query("CALL takim_sil($id)");

if($sonuc){

echo '<div class="alert alert-success">';
echo "<p>Silme İşlemi Başarılı</p>";
header( 'refresh: 1; url=?go=takim' ); 
echo'</div>';

}
else{
	echo '<div class="alert alert-error">';
echo "<p>Bir hata oluştu : ".mysql_error()."</p>";
echo'</div>';


}


?>
