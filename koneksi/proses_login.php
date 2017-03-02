<?php 
	include 'koneksi.php';
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$password = md5($password);

	$query = "SELECT * FROM user WHERE username = '$username'";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);

	if ($password == $data['password'])
	{
	echo "<script> alert('Login Sukses');</script>";
	    // menyimpan username dan level ke dalam session
	    $_SESSION['level'] = $data['level'];
	    $_SESSION['username'] = $data['username'];
	    $_SESSION['iduser'] = $data['iduser'];
	    $_SESSION['namalengkap'] = $data['namalengkap'];
	    $_SESSION['foto'] = $data['foto'];
	    //Penggunaan Meta Header HTTP
	    if ($data['level']=='admin'){
	        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login/admin/index.php">';    
	    }else if($data['level']=='kasir'){
	        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login/kasir/index.php">';    
	    }else if($data['level']=='petugas'){
	        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login/petugas/index.php">';    
	    }
	    exit;
	}
	else 
	echo "<script> alert('username atau Password Salah !');</script>"; 
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';    
	    exit;

 ?>