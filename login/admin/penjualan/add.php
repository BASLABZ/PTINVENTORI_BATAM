<?php 
        $kodePenjualan = buatKode('penjualan','PEN');
        if (isset($_POST['simpanpenjualan'])) {
            $querysimpanpenjualan = mysql_query("INSERT INTO penjualan 
                                                            (idpenjualan,tgl_penjualan,
                                                            idpelanggan,iduser,total_penjualan) 
                                                    values ('$kodePenjualan',NOW(),'$_POST[idpelanggan]','$_POST[iduser]','')");
            if ($querysimpanpenjualan) {
                echo "<script> alert('Data penjualan Berhasil Disimpan'); location.href='index.php?hal=penjualan/detail_penjualan&id=$kodePenjualan' </script>";exit;
            }
        }
        $tanggal_penjualan = date('d-m-Y');
        $kodePelanggan = buatKode('pelanggan',"P");
        // ini untuk isi data pelanggan
        if (isset($_POST['simpanpelanggan'])) {
          $querysimpanpelanggan = mysql_query("INSERT INTO pelanggan 
                                                        (idpelanggan,namalengkap,alamat,kontak) 
                                                VALUES ('$kodePelanggan','$_POST[namalengkap]','$_POST[alamat]','$_POST[kontak]')");
          if ($querysimpanpelanggan) {
             echo "<script> alert('Data Pelangan Berhasil Disimpan'); location.href='index.php?hal=penjualan/add' </script>";exit;
          }
        }
 ?>

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>TRANSAKSI PENJUALAN BARANG</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a>Transaksi</a>
        </li>
        <li class="active">
            <strong>Data Penjualan</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=penjualan/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
                <a  class="btn btn-success btn-xs" type="button" href="index.php?hal=penjualan/add"  ><span class="fa fa-plus"></span> Tambah </a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>DATA TRANSAKSI PENJUALAN</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
                <div class="ibox-content">
                    <form class="role" method="POST">
                    <div class="row">
                       
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>KODE PENJUALAN</label>
                                    <input type="text" class="form-control" disabled value="<?php echo $kodePenjualan; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>TANGGAL TRANSAKSI</label>
                                    <input type="text" class="form-control" name="tgl_penjualan" disabled value="<?php echo $tanggal_penjualan; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>PETUGAS</label>
                                    <input type="hidden" name="iduser" value="<?php echo $_SESSION['iduser']; ?>" >
                                    <input type="text" disabled class="form-control" value="<?php echo $_SESSION['namalengkap']; ?>">
                                </div>
                            </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                              <div class="form-group">
                                  <label>PELANGGAN</label>
                                   <select class="form-control select2" style="width: 100%;" name="idpelanggan">
                                        <option selected="selected">PELANGGAN</option>
                                            <?php $querypelanggan = mysql_query("SELECT * FROM pelanggan order by idpelanggan ASC");
                                            while ($rowpelanggan  = mysql_fetch_array($querypelanggan)) { 
                                                echo "<option value='$rowpelanggan[idpelanggan]'>".$rowpelanggan['namalengkap']."</option>";
                                            } ?>
                                    </select>
                              </div>
                          </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                  <br>
                                  <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#tambahpelanggan"> <span class="fa fa-search"></span> Cari</button>
                              </div>
                          </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                              <div class="form-group">
                                  <br>
                                  <button type="submit" class="btn btn-primary btn-flat btn-lg" name="simpanpenjualan"> <span class="fa fa-save"></span> SIMPAN</button>
                              </div>
                          </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal tambah pelanggan -->
  <div id="tambahpelanggan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal tambah suplier-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form class="role" method="POST">
            <div class="form-group">
                <label>KODE PELANGGAN</label>
                <input type="text" disabled class="form-control" name="idpelanggan" 
                value="<?php echo $kodePelanggan; ?>">
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
                <button type="submit" name="simpanpelanggan" class="btn btn-flat btn-primary"><span class="fa fa-save"></span> SIMPAN </button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
    $('tambahpelanggan').modal();
</script>