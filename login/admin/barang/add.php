<!-- include library kode otomatis -->
<?php 
        $kodebaru = buatkode("barang","B"); 
        if (isset($_POST['simpan'])) {
            $querysimpan = mysql_query("INSERT INTO barang 
                                                    (
                                                    idbarang,
                                                    namabarang,
                                                    jumlah,
                                                    hargajual,
                                                    hargabeli,
                                                    idkategori,
                                                    idsatuan) 
                                            values  (
                                                     '$kodebaru',
                                                     '$_POST[namabarang]',
                                                     '$_POST[jumlah]',
                                                     '$_POST[hargajual]',
                                                     '$_POST[hargabeli]',
                                                     '$_POST[idkategori]',
                                                     '$_POST[idsatuan]'
                                                    )");
            // konfirmasi data tersimpan
            if ($querysimpan) {
                echo "<script> alert('Data  Berhasil Disimpan'); location.href='index.php?hal=barang/list' </script>";exit;
            }else{
                 echo "<script> alert('Data  Gagal Disimpan'); location.href='index.php?hal=barang/add' </script>";exit;
            }
        }
        $kodebarang = buatkode("barang","B");
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>Master  Barang</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a>Master</a>
        </li>
        <li class="active">
            <strong>Tambah  Barang</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=barang/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
                <a  class="btn btn-success btn-xs" type="button" href="index.php?hal=barang/add"  ><span class="fa fa-plus"></span> Tambah</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Tambah  Barang</h5>
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
                                        <label>KODE BARANG</label>
                                        <input type="text" disabled class="form-control" name="id" value="<?php echo $kodebarang; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA BARANG</label>
                                        <input type="text" class="form-control" name="namabarang" placeholder="ISI DENGAN NAMA BARANG">
                                    </div>
                                   
                                   <div class="form-group">
                                       <label>JUMLAH</label>
                                       <input type="number" class="form-control" placeholder="ISI DENGAN JUMLAH" name="jumlah">
                                   </div>
                                   <div class="form-group">
                                       <label>HARGA JUAL</label>
                                       <input type="text" class="form-control" placeholder="ISI DENGAN HARGA JUAL" name="hargajual">
                                   </div>
                                   <div class="form-group">
                                       <label>HARGA BELI</label>
                                       <input type="text" class="form-control" placeholder="ISI DENGAN HYARGA BELI" name="hargabeli">
                                   </div>
                                   <div class="form-group">
                                       <label>KATEGORI BARANG</label>
                                         <select class="form-control select2" style="width: 100%;" name="idkategori">
                                             <option selected="selected">PILIH KATEGORI BARANG</option>
                                           <?php $querykategori = mysql_query("SELECT * FROM kategori_barang order by idkategori ASC");
                                                while ($rowkategori  = mysql_fetch_array($querykategori)) { 
                                                    echo "<option value='$rowkategori[idkategori]'>".$rowkategori['kategori']."</option>";
                                                 } ?>
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label>SATUAN BARANG</label>
                                       <select class="form-control select2" style="width: 100%" name="idsatuan">
                                           <option selected="selected">PILIH SATUAN BARANG</option>
                                           <?php 
                                            $querysatuan = mysql_query("SELECT * FROM satuan order by idsatuan ASC");
                                            while ($rowsatuan = mysql_fetch_array($querysatuan) ) {
                                                echo "<option value='$rowsatuan[idsatuan]'>".$rowsatuan['satuan']."</option>";
                                            }
                                            ?>
                                       </select>
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