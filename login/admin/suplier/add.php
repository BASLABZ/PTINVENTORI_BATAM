<!-- include library kode otomatis -->
<?php 
        $kodebaru = buatkode("suplier","S"); 
        if (isset($_POST['simpan'])) {
            $querysimpan = mysql_query("INSERT INTO suplier 
                                                        (idsuplier,
                                                        namalengkap,
                                                        alamat,
                                                        kontak)
                                                VALUES 
                                                        ('$kodebaru',
                                                        '$_POST[namalengkap]',
                                                        '$_POST[alamat]',
                                                        '$_POST[kontak]' )");
            // konfirmasi data tersimpan
            if ($querysimpan) {
                echo "<script> alert('Data suplier Berhasil Disimpan'); location.href='index.php?hal=suplier/list' </script>";exit;
            }else{
                 echo "<script> alert('Data suplier Gagal Disimpan'); location.href='index.php?hal=suplier/add' </script>";exit;
            }
        }
        $kodesuplier = buatkode("suplier","S");
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>Master Suplier</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a>Master</a>
        </li>
        <li class="active">
            <strong>Tambah Suplier</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=suplier/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
                <a  class="btn btn-success btn-xs" type="button" href="index.php?hal=suplier/add"  ><span class="fa fa-plus"></span> Tambah</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Tambah suplier</h5>
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
                                        <label>KODE SUPLIER</label>
                                        <input type="text" disabled class="form-control" name="idsuplier" value="<?php echo $kodesuplier; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA LENGKAP</label>
                                        <input type="text" class="form-control" name="namalengkap" placeholder="ISI DENGAN NAMA LENGKAP">
                                    </div>
                                    <div class="form-group">
                                        <label>ALAMAT</label>
                                        <textarea class="form-control" placeholder="ISI DENGAN ALAMAT" name="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>KONTAK</label>
                                        <input type="text" name="kontak" class="form-control" placeholder="ISI DENGAN KONTAK / NO.HP">
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