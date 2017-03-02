<!-- include library kode otomatis -->
<?php 
    $id = $_GET['id'];
    $row = mysql_fetch_array(mysql_query("SELECT * from user where iduser='".$id."'"));
    $foto = $row['foto'];
    // proses ubah data pengguna
    if (isset($_POST['ubah'])) {
        
        if (!empty($_FILES) && $_FILES['foto']['size'] >0 && $_FILES['foto']['error'] == 0) {
                $fileName = $_FILES['foto']['name'];
                $move = move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.$fileName);
             if ($move) {
                  $querubah = mysql_query("UPDATE user set namalengkap = '$_POST[namalengkap]',
                                                 alamat = '$_POST[alamat]',
                                                 notelp = '$_POST[notelp]',
                                                 gender = '$_POST[gender]',
                                                 username = '$_POST[username]',
                                                 level = '$_POST[level]',
                                                 foto = '$fileName'
                                            where iduser = '".$id."' ");
             }
            
         }else{
             $querubah = mysql_query("UPDATE user set namalengkap = '$_POST[namalengkap]',
                                                 alamat = '$_POST[alamat]',
                                                 notelp = '$_POST[notelp]',
                                                 gender = '$_POST[gender]',
                                                 username = '$_POST[username]',
                                                 level = '$_POST[level]'
                                            where iduser = '".$id."'");
         }

       
        if ($querubah) {
             echo "<script> alert('Data Pengguna Berhasil Diubah'); location.href='index.php?hal=pengguna/list' </script>";exit;
        }
         echo "<script> alert('Data Pengguna Gagal Diubah'); location.href='index.php?hal=pengguna/edit&id=$id' </script>";exit;
    }

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
            <strong>Ubah Pengguna</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=pengguna/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
                <a  class="btn btn-success btn-xs" type="button" href="index.php?hal=pengguna/add"  ><span class="fa fa-plus"></span> Ubah</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Ubah Pengguna</h5>
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
                                            <option value="LAKI-LAKI"
                                             <?php if($row['gender']=='LAKI-LAKI'){echo "selected=selected";}?>>
                                                LAKI-LAKI
                                             </option>
                                             <option value="PEREMPUAN"
                                             <?php if($row['gender']=='PEREMPUAN'){echo "selected=selected";}?>>
                                                PEREMPUAN
                                             </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>KONTAK</label>
                                        <input type="text" name="notelp" class="form-control" placeholder="ISI DENGAN KONTAK / NO.HP" value="<?php echo $row['notelp']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>HAK PENGGUNA</label>
                                        <select class="form-control" name="level">
                                           <option value="admin"
                                             <?php if($row['level']=='admin'){echo "selected=selected";}?>>
                                                ADMIN
                                             </option>
                                             <option value="petugas"
                                             <?php if($row['level']=='petugas'){echo "selected=selected";}?>>
                                                PETUGAS
                                             </option>
                                             <option value="kasir"
                                             <?php if($row['level']=='kasir'){echo "selected=selected";}?>>
                                                KASIR
                                             </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Foto</label>
                                        <input type="file" name="foto">
                                        <br>
                                        <img src="../foto/<?php echo $foto; ?>" class='img-thumbnail'>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="ubah" class="btn btn-flat btn-primary"><span class="fa fa-save"></span> UBAH </button>
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