<?php 
        $id = $_SESSION['iduser'];
        $row = mysql_fetch_array(mysql_query("SELECT * FROM user where iduser = '".$id."'"));
 ?>
 <?php 
        // ini function untuk ubah password
        if (isset($_POST['gantipassword'])) {
            $queryubahpassword = mysql_query("UPDATE user set 
                                                                username='$_POST[username]',
                                                                password =  md5('$_POST[password]')
                                                        where  iduser = '".$id."' ");
            if ($queryubahpassword) {
                echo "<script> alert('Data Pengguna Berhasil Diubah'); location.href='index.php?hal=pengguna/setting' </script>";exit;
            } else{
                echo "<script> alert('Data  Gagal  Diubah'); location.href='index.php?hal=pengguna/setting' </script>";exit;
            }                                                       
        }
  ?>
  <?php 
    // ini untuk ubah profil user
     if (isset($_POST['ubahprofil'])) {
        $querubah = mysql_query("UPDATE user set namalengkap = '$_POST[namalengkap]',
                                                 alamat = '$_POST[alamat]',
                                                 notelp = '$_POST[notelp]',
                                                 gender = '$_POST[gender]',
                                                 username = '$_POST[username]',
                                                 level = '$_POST[level]'
                                            where iduser = '".$id."'");
        if ($querubah) {
             echo "<script> alert('Data Pengguna Berhasil Diubah'); location.href='index.php?hal=pengguna/setting' </script>";exit;
        }
         echo "<script> alert('Data Pengguna Gagal Diubah'); location.href='index.php?hal=pengguna/setting' </script>";exit;
    }
   ?>


<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>SETTING PENGGUNA</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a>Setting</a>
        </li>
        <li class="active">
            <strong>Setting Pengguna</strong>
        </li>
    </ol>
</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Setting Data Pengguna Sistem</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#profilpengguna"><span class="fa fa-user"></span> PROFIL PENGGUNA</a></li>
                              <li><a data-toggle="tab" href="#gantipassword"><span class="fa fa-key"></span> GANTI PASSWORD</a></li>
                              <li><a data-toggle="tab" href="#ubahprofil"><span class="fa fa-edit"></span> UBAH PROFIL</a></li>
                            </ul>

                            <div class="tab-content">
                              <div id="profilpengguna" class="tab-pane fade in active">
                               <div class="col-md-6">
                               <br>
                                <form class="role" method="POST">
                                    <div class="form-group">
                                        <label>KODE PENGGUNA</label>
                                        <input type="text" disabled class="form-control" name="iduser"  value="<?php echo $row['iduser']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA LENGKAP</label>
                                        <input type="text" class="form-control" name="namalengkap" placeholder="ISI DENGAN NAMA LENGKAP" value="<?php echo $row['namalengkap']; ?>"  disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>USERNAME</label>
                                        <input type="text" class="form-control" name="username" placeholder="ISI DENGAN USERNAME" value="<?php echo $row['username']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>ALAMAT</label>
                                        <textarea class="form-control" placeholder="ISI DENGAN ALAMAT" name="alamat" disabled>
                                            <?php echo $row['alamat']; ?>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>GENDER</label>
                                       <input type="text" class="form-control" value="<?php echo $row['gender']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>KONTAK</label>
                                        <input type="text" name="notelp" class="form-control" placeholder="ISI DENGAN KONTAK / NO.HP" value="<?php echo $row['notelp']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>HAK PENGGUNA</label>
                                        <input type="text" class="form-control" value="<?php echo $row['level']; ?>" disabled>
                                    </div>
                                </form>
                            </div>
                              </div>
                              <div id="gantipassword" class="tab-pane fade">
                              <br>
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <form class="role" method="POST">
                                        <div class="form-group">
                                            <label>USERNAME</label>
                                            <input type="text"  class="form-control" name="username" value="<?php echo $row['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>PASSWORD</label>
                                            <input type="text" name="password" class="form-control" placeholder="ISI DENGAN PASSWORD BARU">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="gantipassword" class="btn btn-flat btn-success pull-right"> <span class="fa fa-edit"></span> UBAH</button>
                                        </div>
                                    </form>
                                </div>
                              </div>
                              <div id="ubahprofil" class="tab-pane fade">
                                <br>
                                <div class="col-md-6">
                                    <form class="role" method="POST">
                                    <div class="form-group">
                                        <label>KODE PENGGUNA</label>
                                        <input type="text" disabled class="form-control" name="iduser" value="<?php echo $row['iduser']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA LENGKAP</label>
                                        <input type="text" class="form-control" name="namalengkap" placeholder="ISI DENGAN NAMA LENGKAP" value="<?php echo $row['namalengkap'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>USERNAME</label>
                                        <input type="text" class="form-control" name="username" placeholder="ISI DENGAN USERNAME" value="<?php echo $row['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>ALAMAT</label>
                                        <textarea class="form-control" placeholder="ISI DENGAN ALAMAT" name="alamat"><?php echo $row['alamat']; ?></textarea>
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
                                        <input type="text" name="notelp" class="form-control" placeholder="ISI DENGAN KONTAK / NO.HP" value="<?php echo $row['notelp']; ?>">
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
                                        <button type="submit" name="ubahprofil" class="btn btn-flat btn-primary"><span class="fa fa-edit"></span> UBAH </button>
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
    </div>          
</div>