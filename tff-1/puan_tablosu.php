<?php

function puan_ev($id){	
	$sorgu="SELECT skor_ev,skor_dep FROM fikstur INNER JOIN ligler ON fikstur.lig_id = ligler.lig_id where ev_sahibi_id=$id";
		echo $sorgu;
		$sonuc=mysql_query($sorgu);
		$i=0;
while($satir=mysql_fetch_array($sonuc)){
	if($satir["skor_ev"]>$satir["skor_dep"])
	$i=$i+3;
	else if($satir["skor_ev"]==$satir["skor_dep"])
	$i++;
	else $i=$i;
	
	}
return $i;

}

function puan_misafir($id){	
	$sorgu="SELECT skor_ev,skor_dep FROM fikstur INNER JOIN ligler ON fikstur.lig_id = ligler.lig_id where misafir_id=$id";
		echo $sorgu;
		$sonuc=mysql_query($sorgu);
		$i=0;
while($satir=mysql_fetch_array($sonuc)){
	if($satir["skor_dep"]>$satir["skor_ev"])
	$i=$i+3;
	else if($satir["skor_dep"]==$satir["skor_ev"])
	$i++;
	else $i=$i;
	
	}
return $i;
}

function puan($id)
{
$s=puan_ev($id)+puan_misafir($id);

return $s;
}


	function takim($id){	
	$sorgu2="SELECT adi FROM takimlar WHERE takim_id=".$id."";
		$sonuc2=mysql_query($sorgu2);
		while($row=mysql_fetch_array($sonuc2)){
	$kayit=$row["adi"];
}
return $kayit;
}

?>



