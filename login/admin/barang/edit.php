<!-- include library kode otomatis -->
<?php 
        // ambil dari kode yang dipilih untuk dirumah datanya
        $id = $_GET['id'];
        $row = mysql_fetch_array(mysql_query("SELECT * FROM barang where idbarang = '".$id."'"));

        if (isset($_POST['ubah'])) {
            $querysimpan = mysql_query("UPDATE barang 
                                              set 
                                              namabarang = '$_POST[namabarang]',
                                              jumlah='$_POST[jumlah]',
                                              hargajual='$_POST[hargajual]',
                                              hargabeli = '$_POST[hargabeli]',
                                              idkategori = '$_POST[idkategori]',
                                              idsatuan = '$_POST[idsatuan]'
                                              where idbarang = '".$id."' ");
            // konfirmasi data tersimpan
            if ($querysimpan) {
                echo "<script> alert('Data  Berhasil Disimpan'); location.href='index.php?hal=barang/list' </script>";exit;
            }else{
                 echo "<script> alert('Data  Gagal Disimpan'); location.href='index.php?hal=barang/add' </script>";exit;
            }
        }
       
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
            <strong>Ubah  Barang</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=barang/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
                <a  class="btn btn-success btn-xs" type="button" href="index.php?hal=barang/add"  ><span class="fa fa-plus"></span> Ubah</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Ubah  Barang</h5>
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
                                        <input type="text" disabled class="form-control" name="id" value="<?php echo $row['idbarang']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA BARANG</label>
                                        <input type="text" class="form-control" name="namabarang" placeholder="ISI DENGAN NAMA BARANG" value="<?php echo $row['namabarang']; ?>">
                                    </div>
                                   
                                   <div class="form-group">
                                       <label>JUMLAH</label>
                                       <input type="number" class="form-control" placeholder="ISI DENGAN JUMLAH" name="jumlah" value="<?php echo $row['jumlah']; ?>">
                                   </div>
                                   <div class="form-group">
                                       <label>HARGA JUAL</label>
                                       <input type="text" class="form-control" placeholder="ISI DENGAN HARGA JUAL" name="hargajual" value="<?php echo $row['hargajual']; ?>">
                                   </div>
                                   <div class="form-group">
                                       <label>HARGA BELI</label>
                                       <input type="text" class="form-control" placeholder="ISI DENGAN HYARGA BELI" name="hargabeli" value="<?php echo $row['hargabeli']; ?>">
                                   </div>
                                   <div class="form-group">
                                       <label>KATEGORI BARANG</label>
                                         <select class="form-control select2" style="width: 100%;" name="idkategori">
                                            <option value="null">-Pilih Kategori-</option>
                                           <?php
                                            $sqlquery = "SELECT * FROM kategori_barang ORDER BY idkategori";
                                            $bacaQry = mysql_query($sqlquery);
                                            while ($rowkategori = mysql_fetch_array($bacaQry)) {
                                            if ($rowkategori['idkategori'] == $row['idkategori']) {
                                              $cek = " selected";
                                            } else { $cek=""; }
                                            echo "<option value='$rowkategori[idkategori]' $cek>$rowkategori[kategori]</option>";
                                            }
                                            ?>
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label>SATUAN BARANG</label>
                                       <select class="form-control select2" style="width: 100%" name="idsatuan">
                                         
                                             <option value="null">-Pilih Satuan-</option>
                                           <?php
                                            $querysatuan = "SELECT * FROM satuan ORDER BY idsatuan";
                                            $bacaquerysatuan = mysql_query($querysatuan);
                                            while ($rowsatuan = mysql_fetch_array($bacaquerysatuan)) {
                                            if ($rowsatuan['idsatuan'] == $row['idsatuan']) {
                                              $cek = " selected";
                                            } else { $cek=""; }
                                            echo "<option value='$rowsatuan[idsatuan]' $cek>$rowsatuan[satuan]</option>";
                                            }
                                            ?>
                                       </select>
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