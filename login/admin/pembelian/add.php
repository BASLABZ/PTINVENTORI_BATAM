<?php 
        // input data pembelian
        $kodebaru_pembelian = buatkode('pembelian' , 'PE');
        if (isset($_POST['simpanpembelian'])) {
            $querysimpanpembelian = mysql_query("INSERT INTO pembelian (idpembelian,
                                                                        tgl_pembelian,
                                                                        idsuplier,
                                                                        iduser)
                                                    values ('$kodebaru_pembelian',NOW(),
                                                            '$_POST[idsuplier]',
                                                            '$_POST[iduser]') ");
                                                            
            if ($querysimpanpembelian) {
                echo "<script> alert('Data transaksi Berhasil Disimpan'); location.href='index.php?hal=detail_pembelian/add&id=$kodebaru_pembelian' </script>";exit; 
            }
        }
 ?>
 <?php 
           // input data suplier

             $kodebarusuplier = buatkode('suplier','S');
              if (isset($_POST['simpansuplier'])) {
                $querysimpan = mysql_query("INSERT INTO suplier 
                                                        (idsuplier,
                                                        namalengkap,
                                                        alamat,
                                                        kontak)
                                                VALUES 
                                                        ('$kodebarusuplier',
                                                        '$_POST[namalengkap]',
                                                        '$_POST[alamat]',
                                                        '$_POST[kontak]' )");
            // konfirmasi data tersimpan
            if ($querysimpan) {
                echo "<script> alert('Data suplier Berhasil Disimpan'); location.href='index.php?hal=pembelian/add&id=$kodebaru_pembelian' </script>";exit;
            }else{
                 echo "<script> alert('Data suplier Gagal Disimpan'); location.href='index.php?hal=pembelian/add' </script>";exit;
            }
        }
             $kodesuplier = buatkode('suplier','S');
             $tanggal_pembelian = date('d-m-Y');
             $kodepembelian = buatkode('pembelian','PE');
  ?>
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>TRANSAKSI PEMBELIAN BARANG</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a>Transaksi</a>
        </li>
        <li class="active">
            <strong>Pembelian Tambah Pembelian</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=pembelian/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
                <a  class="btn btn-success btn-xs" type="button" href="index.php?hal=pembelian/add"  ><span class="fa fa-plus"></span> Tambah </a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Pembelian Barang (Barang Masuk)</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                    <div class="panel panel-default">
                        <div class="panel-body">
                          <form class="role" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>KODE PEMBELIAN</label>
                                            <input type="text" disabled class="form-control" name="idpembelian" value="<?php echo $kodepembelian; ?>">
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>TANGGAL PEMBELIAN / MASUK</label>
                                            <input type="text" class="form-control" name="tgl_pembelian" value="<?php echo $tanggal_pembelian; ?>" disabled>
                                            <!-- format d-m-Y (day-mount-Year) -->
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>PETUGAS PEMBELIAN</label>
                                            <input type="hidden" name="iduser" class="form-control" value="<?php echo $_SESSION['iduser']; ?>" >
                                            <input type="text" class="form-control" value="<?php echo $_SESSION['namalengkap']; ?>" disabled> 
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                <label>Cari Suplier</label>
                                                <select class="form-control select2" style="width: 100%;" name="idsuplier">
                                                     <option selected="selected">PILIH NAMA SUPLIER</option>
                                                   <?php $querysuplier = mysql_query("SELECT * FROM suplier order by idsuplier ASC");
                                                        while ($rowsuplier  = mysql_fetch_array($querysuplier)) { 
                                                            echo "<option value='$rowsuplier[idsuplier]'>".$rowsuplier['namalengkap']."</option>";
                                                         } ?>
                                               </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group"><br>
                                                    <button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#tambahsuplier" ><span class="fa fa-search"></span> TAMBAH SUPLIER</button>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <div class="jumbotron">
                                        <button type="submit" name="simpanpembelian" class="btn btn-lg btn-primary btn-block">
                                            <span class="fa fa-save"></span> SIMPAN
                                        </button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
    </div>          
</div>
<!-- browse tambah suplier -->
<!-- Modal -->
<div id="tambahsuplier" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal tambah suplier-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Suplier</h4>
      </div>
      <div class="modal-body">
        <form class="role" method="POST">
            <div class="form-group">
                <label>KODE SUPLIER</label>
                <input type="text" disabled class="form-control" name="idsuplier" 
                value="<?php echo $kodesuplier; ?>">
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
                <button type="submit" name="simpansuplier" class="btn btn-flat btn-primary"><span class="fa fa-save"></span> SIMPAN </button>
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
    $('tambahsuplier').modal();
</script>