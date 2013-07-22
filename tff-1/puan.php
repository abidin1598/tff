<?php
	function liste($id,$lig){
	$sorgu="SELECT skor_ev,skor_dep FROM fikstur INNER JOIN ligler ON fikstur.lig_id = ligler.lig_id where ev_sahibi_id=$id";
		
		$sonuc=mysql_query($sorgu);
		$i=0;
		$g=0;
		$m=0;
		$b=0;
		$o=0;
		$a=0;
		$y=0;
while($satir=mysql_fetch_array($sonuc)){
	if($satir["skor_ev"]>$satir["skor_dep"]){
	$i=$i+3;$g++;}
	else if($satir["skor_ev"]==$satir["skor_dep"]){
	if(empty($satir2["skor_dep"])||empty($satir2["skor_ev"]))
	$o--;
	else{
	$i++;$b++;}
	}
	else {$i=$i;$m++;
}
$o++;
$a=$a+$satir["skor_ev"];
$y=$y+$satir["skor_dep"];
}

	$sorgu2="SELECT skor_ev,skor_dep FROM fikstur INNER JOIN ligler ON fikstur.lig_id = ligler.lig_id where misafir_id=$id";
	
		$sonuc2=mysql_query($sorgu2);
		
while($satir2=mysql_fetch_array($sonuc2)){
	if($satir2["skor_dep"]>$satir2["skor_ev"]){
	$i=$i+3;$g++;}
	else if($satir2["skor_dep"]==$satir2["skor_ev"]){
	if(empty($satir2["skor_dep"])||empty($satir2["skor_ev"]))
		$o--;
	else{
	$i++;$b++;}
	}
	else {$i=$i;$m++;	
	}
	$o++;
	$a=$a+$satir2["skor_dep"];
	$y=$y+$satir2["skor_ev"];
}

$kaydet="Update takimlar SET puan=$i WHERE takim_id=$id";
$sonuc=mysql_query($kaydet);

 $sor="SELECT * FROM takimlar where lig_id =$lig and takim_id=$id  ";
		
		$son=mysql_query($sor);
	
while($satir=mysql_fetch_array($son)){
echo'<td>'.$satir["adi"].'</td><td>'.$o.'</td><td>'.$g.'</td><td>'.$b.'</td><td>'.$m.'</td><td>'.$a.'</td><td>'.$y.'</td><td>'.($a-$y).'</td><td>'.$i.'</td></tr>';

}

}
?> 


 <div class="row-fluid">
    
<table style="width:150px" class="table ">
	<tr>
<form action="index.php" method="post">
<td>Lig(Grup)</td><td><select name="lig" >
		<?php $sorgu1="SELECT lig_id,lig_adi FROM ligler order by lig_adi desc";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir1=mysql_fetch_array($sonuc1)){
			echo'<option value="'.$satir1["lig_id"].'">'.$satir1["lig_adi"].'</option>';
			}
			?>	
	</select></td>
<td><button type="submit" name="sec" class="btn">Seç</button></form></td></tr></table>

<div class="span6">
		<h4>PUAN TABLOSU</h4>
<table class="table table-bordered">
<tr><th>Sıra</th><th>Takım Adı</th><th>O</th><th>G</th><th>B</th><th>M</th><th>A</th><th>Y</th><th>Av.</th><th>Puan</th></tr>


<?php
if(isset($_POST["sec"]))
$l_id=$_POST["lig"];
else
$l_id=1;

 $sor="SELECT * FROM puan_tablo  where lig_id =$l_id";
		
		$son=mysql_query($sor,$connect);
	$j=1;
while($satir=mysql_fetch_array($son)){

echo '<tr><td>'.$j.'</td>';liste($satir["takim_id"],$l_id);
$j++;
}

?>

</table>

</div>

<div class="span4">
	<h4>GOL KRALLIĞI</h4>
<table class="table ">
	<tr><th>Futbolcu</th><th>Gol Sayisi</th></tr>
<?php $sorgu1="SELECT * FROM gol_kral where takim_id IN(select takim_id from takimlar where lig_id=$l_id) ";
			
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir2=mysql_fetch_array($sonuc1)){
			echo '<tr><td>'.$satir2["adsoyad"].'</td><td>'.$satir2["gol"].'</td></tr>';
			
			}
			?>
</table>
	</div>
</div>
