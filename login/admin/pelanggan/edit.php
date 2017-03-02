<?php 
        // ambil kode yang dipilih untuk di ubah
        $id = $_GET['id'];
        // query database untuk select / menampilkan data berdasarkan kode yang dipilih
        $row =mysql_fetch_array(mysql_query("SELECT * FROM pelanggan where idpelanggan = '".$id."'"));

        // proses edit data
        if (isset($_POST['ubah'])) {
            $querubah = mysql_query("UPDATE pelanggan set 
                                                        namalengkap='$_POST[namalengkap]',
                                                        alamat='$_POST[alamat]',
                                                        kontak = '$_POST[kontak]'
                                                    where idpelanggan = '".$id."'
                                                        ");
            if ($querubah) {
                echo "<script> alert('Data pelanggan Berhasil Diubah'); location.href='index.php?hal=pelanggan/list' </script>";exit;
            }else{
                echo "<script> alert('Data pelanggan Berhasil Diubah'); location.href='index.php?hal=pelanggan/edit&id=$id' </script>";exit;
            }
        }
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>Master pelanggan</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a>Master</a>
        </li>
        <li class="active">
            <strong>Ubah pelanggan</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=pelanggan/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
                <a  class="btn btn-success btn-xs" type="button" href="index.php?hal=pelanggan/add"  ><span class="fa fa-plus"></span> Ubah</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Ubah Pelanggan</h5>
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
                                <form class="role" method="POST">
                                    <div class="form-group">
                                        <label>KODE PELANGGAN</label>
                                        <input type="text" disabled class="form-control" name="idpelanggan" value="<?php echo $row['idpelanggan']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA LENGKAP</label>
                                        <input type="text" class="form-control" name="namalengkap" placeholder="ISI DENGAN NAMA LENGKAP" value="<?php echo $row['namalengkap']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>ALAMAT</label>
                                        <textarea class="form-control" placeholder="ISI DENGAN ALAMAT" name="alamat">
                                            <?php echo $row['alamat']; ?>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>KONTAK</label>
                                        <input type="text" name="kontak" class="form-control" placeholder="ISI DENGAN KONTAK / NO.HP" value="<?php echo $row['kontak']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="ubah" class="btn btn-flat btn-primary"><span class="fa fa-save"></span> SIMPAN </button>
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