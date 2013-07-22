<h3>GOL KRALLIĞI</h3>
<table class="table ">
	<tr><th>Futbolcu</th><th>Gol Sayisi</th></tr>
<?php $sorgu1="SELECT CONCAT(adi,' ',ucase(soyadi)) as adsoyad,oyuncu_id,SUM(gol_sayisi) as gol FROM futbolcular INNER JOIN goller ON futbolcular.lisans_no = goller.oyuncu_id group by oyuncu_id order by gol desc LIMIT 10 ";
				$sonuc1=mysql_query($sorgu1,$connect);
			while($satir2=mysql_fetch_array($sonuc1)){
			echo '<tr><td>'.$satir2["adsoyad"].'</td><td>'.$satir2["gol"].'</td></tr>';
			
			}
			?>
</table>

