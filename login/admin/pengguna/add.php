<!-- include library kode otomatis -->
<?php 
        $kodebaru = buatkode("user","U"); 
        if (isset($_POST['simpan'])) {
            if (!empty($_FILES) && $_FILES['foto']['size'] >0 && $_FILES['foto']['error'] == 0) {
                $fileName = $_FILES['foto']['name'];
                $move = move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/'.$fileName);
             if ($move) {
                  $querysimpan = mysql_query("INSERT INTO user 
                                                        (iduser,
                                                        namalengkap,
                                                        alamat,
                                                        notelp,
                                                        gender,
                                                        username,
                                                        password,
                                                        level,
                                                        foto)
                                                VALUES 
                                                        ('$kodebaru',
                                                        '$_POST[namalengkap]',
                                                        '$_POST[alamat]',
                                                        '$_POST[notelp]',
                                                        '$_POST[gender]',
                                                        '$_POST[username]',
                                                        md5('$_POST[password]'),
                                                        '$_POST[level]'),
                                                        '$fileName'");
             }
            
         }else{
            $querysimpan = mysql_query("INSERT INTO user 
                                                        (iduser,
                                                        namalengkap,
                                                        alamat,
                                                        notelp,
                                                        gender,
                                                        username,
                                                        password,
                                                        level,
                                                        foto)
                                                VALUES 
                                                        ('$kodebaru',
                                                        '$_POST[namalengkap]',
                                                        '$_POST[alamat]',
                                                        '$_POST[notelp]',
                                                        '$_POST[gender]',
                                                        '$_POST[username]',
                                                        md5('$_POST[password]'),
                                                        '$_POST[level]'),
                                                        ''");
         }  
            if ($querysimpan) {
                echo "<script> alert('Data Pengguna Berhasil Disimpan'); location.href='index.php?hal=pengguna/list' </script>";exit;
            }else{
                 echo "<script> alert('Data Pengguna Gagal Disimpan'); location.href='index.php?hal=pengguna/add' </script>";exit;
            }
        }
        $kodepengguna = buatkode("user","U");
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>Master Penguna</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a>Master</a>
        </li>
        <li class="active">
            <strong>Tambah Pengguna</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=pengguna/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
                <a  class="btn btn-success btn-xs" type="button" href="index.php?hal=pengguna/add"  ><span class="fa fa-plus"></span> Tambah</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Tambah Pengguna</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form class="role" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>KODE PENGGUNA</label>
                                        <input type="text" disabled class="form-control" name="iduser" value="<?php echo $kodepengguna; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA LENGKAP</label>
                                        <input type="text" class="form-control" name="namalengkap" placeholder="ISI DENGAN NAMA LENGKAP">
                                    </div>
                                    <div class="form-group">
                                        <label>USERNAME</label>
                                        <input type="text" class="form-control" name="username" placeholder="ISI DENGAN USERNAME">
                                    </div>
                                    <div class="form-group">
                                        <label>PASSWORD</label>
                                        <input type="password" name="password" class="form-control" placeholder="ISI DENGAN PASSWORD">
                                    </div>
                                    <div class="form-group">
                                        <label>ALAMAT</label>
                                        <textarea class="form-control" placeholder="ISI DENGAN ALAMAT" name="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>GENDER</label>
                                        <select class="form-control" name="gender">
                                            <option>PILIH GENDER</option>
                                            <option value="LAKI-LAKI">LAKI - LAKI</option>
                                            <option value="PEREMPUAN">PEREMPUAN</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>KONTAK</label>
                                        <input type="text" name="notelp" class="form-control" placeholder="ISI DENGAN KONTAK / NO.HP">
                                    </div>
                                    <div class="form-group">
                                        <label>HAK PENGGUNA</label>
                                        <select class="form-control" name="level">
                                            <option>-PILIH LEVEL PENGGUNA-</option>
                                            <option value="admin">ADMIN</option>
                                            <option value="petugas">PETUGAS</option>
                                            <option value="kasir">KASIR</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Foto</label>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="simpan" class="btn btn-flat btn-primary"><span class="fa fa-save"></span> SIMPAN </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
    </div>          
</div>