<?php
    $id = $_GET['id'];
    $row   = mysql_fetch_array(mysql_query("SELECT * from penjualan p 
                                                  join pelanggan pe 
                                                  on p.idpelanggan = pe.idpelanggan
                                              where p.idpenjualan = '".$id."'"));

    if (isset($_POST['simpanpenjualanbarang'])) {
      $sqlsimpanpenjualanbarang  = mysql_query("INSERT INTO detail_penjualan 
                                                            (iddetail_penjualan,idbarang,jumlahdibeli) VALUES
                                                            ('$id','$_POST[idbarang]','$_POST[jumlahdibeli]')"); 
        if ($sqlsimpanpenjualanbarang) {
            echo "<script> alert('Data Penjualan Barang Disimpan'); location.href='index.php?hal=penjualan/detail_penjualan&id=$id' </script>";exit;
        }
    }
    if (isset($_GET['hapus'])) {
        $sqlhapusdetailpenjualan = mysql_query("DELETE from detail_penjualan where iddetail_penjualan ='".$_GET['hapus']."'");
         echo "<script> alert('Data Penjualan Barang Dihapus'); location.href='index.php?hal=penjualan/detail_penjualan&id=$id' </script>";exit;
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
                                    <input type="text" name="iddetail_penjualan" class="form-control" disabled value="<?php echo $row['idpenjualan']; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>TANGGAL TRANSAKSI</label>
                                    <input type="text" class="form-control" name="tgl_penjualan" disabled value="<?php echo $row['tgl_penjualan']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>PETUGAS</label>
                                    <input type="hidden" name="iduser" value="<?php echo $_SESSION['iduser']; ?>" >
                                    <input type="text" disabled class="form-control" value="<?php echo $_SESSION['namalengkap']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                  <label>PELANGGAN</label>
                                  <input type="text" class="form-control" name="idpelanggan" disabled value="<?php echo $row['namalengkap']; ?>">
                              </div>
                          </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row animated fadeInRight">
        <div class="col-lg-12">
          <div class="ibox-content">
            <div class="row">
                      <form class="role" method="POST">
                          <div class="col-md-6">
                                <div class="form-group">
                                    <label>NAMA BARANG</label>
                                    <select class="form-control select2" style="width: 100%;" name="idbarang">
                                        <option selected="selected">PILIH NAMA BARANG</option>
                                            <?php $querybarang = mysql_query("SELECT * FROM barang order by idbarang ASC");
                                            while ($rowbarang  = mysql_fetch_array($querybarang)) { 
                                                echo "<option value='$rowbarang[idbarang]'>".$rowbarang['idbarang']."-".$rowbarang['namabarang']."</option>";
                                            } ?>
                                    </select>
                                </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="number" class="form-control" name="jumlahdibeli">
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <br>
                                  <button type="submit" class="btn btn-primary btn-flat btn-lg" name="simpanpenjualanbarang"> <span class="fa fa-save"></span> SIMPAN</button>
                              </div>
                          </div>
                          </form>
                    </div>
        </div>
        </div>
       <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>DATA BARANG MASUK</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                    <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover datatable" >
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA BARANG</th>
                                    <th>JUMLAH</th>
                                    <th>HARGA JUAL</th>
                                    <th>SUB TOTAL</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $querypenjualan = mysql_query("SELECT * FROM detail_penjualan dp join penjualan p on dp.iddetail_penjualan = p.idpenjualan join barang b on dp.idbarang = b.idbarang 
                                          where dp.iddetail_penjualan = '".$id."'

                                         ORDER BY p.idpenjualan DESC");
                                        while ($rowdetail = mysql_fetch_array($querypenjualan)) { 
                                                $jumlah = $rowdetail['jumlahdibeli'];
                                                $harga = $rowdetail['hargajual'];
                                                $subtotal = $jumlah * $harga;
                                    ?>
                                        <tr>
                                            <td><?php echo ++$no; ?></td>
                                            <td><?php echo $rowdetail['idbarang']; ?></td>
                                            <td><?php echo $jumlah; ?></td>
                                            <td><?php echo $harga; ?></td>
                                            <td><?php echo $subtotal; ?></td>
                                            <td>
                                                <a class="btn btn-xs btn-danger" href="index.php?hal=penjualan/detail_penjualan&hapus=<?php echo $rowdetail['iddetail_penjualan']; ?>&id=<?php echo $id; ?>"><span class="fa fa-trash"></span> Hapus</a> 
                                            </td>
                                        </tr>
                                     <?php } ?>
                                     <tfoot>
                                         <tr>
                                             <td colspan="5"><h2 align="right">JUMLAH</h2></td>
                                             <td><h2>Rp. 100</h2></td>
                                         </tr>
                                         <tr>
                                             <td colspan="5"><h2 align="right">TOTAL JUAL</h2></td>
                                             <td><h2>Rp. 10000</h2></td>
                                         </tr>
                                     </tfoot>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>  
            </div>
        </div>
    </div>
    </div>