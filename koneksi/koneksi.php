<!-- ini untuk koneksi kedatabase -->
<?php  
		mysql_connect("localhost","root","") or die("SERVER MASIH OFF");
		mysql_select_db("db_ochie") or die("DATABASE NOT FOUND");
 ?>