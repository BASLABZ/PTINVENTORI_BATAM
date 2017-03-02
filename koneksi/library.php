<?php  
		#atur tanggal komputer versi indonesia
		date_default_timezone_set("Asia/Jakarta");
		function buatkode($tabel,$inisial){
				$struktur = mysql_query("SELECT * from $tabel");
				$field = mysql_field_name($struktur,0);
				$panjang = mysql_field_len($struktur,0);
				$qry	= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
 				$row	= mysql_fetch_array($qry); 
				if ($row[0]=="") {
					$angka = 0;
				}else{
					$angka = substr($row[0],strlen($inisial));
				}
				$angka++;
				$angka = strval($angka);
				$tmp = "";
				for ($i=1; $i <= ($panjang-strlen($inisial)-strlen($angka)) ; $i++) { 
					$tmp = $tmp."0";
				}return $inisial.$tmp.$angka;
		}
		
 ?>