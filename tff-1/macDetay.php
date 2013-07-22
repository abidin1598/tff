
<?php
$id=@$_GET['ID'];
 $sorgu="SELECT * FROM takimlar INNER JOIN ligler ON takimlar.lig_id = ligler.lig_id where takim_id=$id Order By adi asc";
		$sonuc=mysql_query($sorgu,$connect);
		
$satir=mysql_fetch_array($sonuc);


?>
 
    <div class="row-fluid">
    <div class="span8"><h2><?=$satir["adi"]?></h2><br>
Teknik Direktör:
<?php
$sorgu1="SELECT CONCAT(adi,' ', soyadi) as adsoyad FROM teknik_direktor where teknik_id=$satir[teknik_id]";
		$sonuc1=mysql_query($sorgu1,$connect);

$satir1=@mysql_fetch_array($sonuc1);
echo ''.$satir1["adsoyad"].'';

?>
</div>
    <div class="span4"><img src="<?=$satir['resim_yolu']?>" style="width:auto;height:120px;"></div>
    
<div class="span12">
<h4>Oyuncular</h4>
<table class="table ">
<tr><th>Lisans No</th><th>Adı</th><th>Soyadı</th><th>Mevki</th><th>Forma No</th></tr>
		
<?php
$sorgu="SELECT * FROM futbolcular where takim_id=$id Order By adi asc";
		$sonuc=mysql_query($sorgu,$connect);

while($satir=mysql_fetch_array($sonuc)){
echo'<tr><td>'.$satir["lisans_no"].'</td><td>'.$satir["adi"].'</td><td>'.$satir["soyadi"].'</td><td>'.$satir["mevki"].'</td><td>'.$satir["forma_no"].'</td></tr>';

}
?>
</table>
<br><br>
<h4>Maçlar</h4>

<table class="table table-bordered">
<tr><th>Hafta</th><th>Lig(Grup)</th><th>Ev Sahibi Takım</th><th>Skor</th><th>Misafir Takım</th><th>Traih</th></tr>

<?php




 $sorgu2="SELECT * FROM fikstur INNER JOIN ligler ON fikstur.lig_id = ligler.lig_id where ev_sahibi_id=$id OR misafir_id=$id Order By hafta ";
		$sonuc2=mysql_query($sorgu2,$connect);
		
while($satir=mysql_fetch_array($sonuc2)){
echo'<tr><td>'.$satir["hafta"].'</td><td>'.$satir["lig_adi"].'</td><td>'.takim($satir["ev_sahibi_id"]).'</td><td>'.$satir["skor_ev"].' - '.$satir["skor_dep"].'</td><td>'.takim($satir["misafir_id"]).'</td><td>'.$satir["tarih"].'</td></tr>';

}


?>
</table>

</div>

    </div>


