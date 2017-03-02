<?php 
        $id = $_GET['id'];
        $row = mysql_fetch_array(mysql_query("SELECT * FROM  pembelian p  join suplier s on p.idsuplier = s.idsuplier where p.idpembelian = '".$id."' "));

        // simpan data barang dalam pembelian
        if (isset($_POST['simpandetailpembelian'])) {
            $hargabeli  =$_POST['hargabeli'];
            $jumlahpembelian = $_POST['jumlahpembelian'];
            $totalpembelian = $hargabeli * $jumlahpembelian;
            $querysimpandata = mysql_query("INSERT INTO detail_pembelian (iddetail_pembelian,
                                                                            idbarang,
                                                                            jumlahpembelian,
                                                                            hargabeli,
                                                                            totalpembelian)
                                                    values ('$id','$_POST[idbarang]',
                                                            '$_POST[jumlahpembelian]',
                                                            '$_POST[hargabeli]','$totalpembelian')");
            if ($querysimpandata) {
                 echo "<script> alert('Data Transaksi Pembelian Berhasil Disimpan'); location.href='index.php?hal=detail_pembelian/add&id=$id' </script>";exit; 
            }
        }
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
                <h5>Form Input Pembelian Barang (Barang Masuk)</h5>
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
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label>KODE PEMBELIAN</label>
                                            <input type="text" disabled class="form-control" name="idpembelian" value="<?php echo $id; ?>">
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label>TANGGAL PEMBELIAN / MASUK</label>
                                            <input type="text" class="form-control" name="tgl_pembelian" value="<?php echo $row['tgl_pembelian']; ?>" disabled>
                                            <!-- format d-m-Y (day-mount-Year) -->
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PETUGAS PEMBELIAN</label>
                                            <input type="hidden" name="iduser" class="form-control" value="<?php echo $_SESSION['iduser']; ?>" >
                                            <input type="text" class="form-control" value="<?php echo $_SESSION['namalengkap']; ?>" disabled> 
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label>SUPLIER</label>
                                            <input type="hidden" name="idsuplier" class="form-control" value="<?php echo $row['idsuplier']; ?>" >
                                            <input type="text" class="form-control" value="<?php echo $row['namalengkap']; ?>" disabled> 
                                        </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div> 
                    <div class="panel panel-default">
                        <div class="panel-body">
                          <form class="role" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NAMA BARANG</label>
                                            <select class="form-control select2" style="width: 100%;" name="idbarang">
                                                     <option selected="selected">PILIH NAMA BARANG</option>
                                                   <?php $querybarang = mysql_query("SELECT * FROM barang order by idbarang ASC");
                                                        while ($rowbarang  = mysql_fetch_array($querybarang)) { 
                                                            echo "<option value='$rowbarang[idbarang]'>".$rowbarang['namabarang']."</option>";
                                                         } ?>
                                               </select>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label>JUMLAH</label>
                                            <input type="text" class="form-control" name="jumlahpembelian" placeholder="ISI JUMLAH PEMBELIAN">
                                            <!-- format d-m-Y (day-mount-Year) -->
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label>HARGA BELI</label>
                                            <input type="text" class="form-control" name="hargabeli" placeholder="ISI DENGAN HARGA BELI"> 
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pull-right">
                                        <button type="submit" name="simpandetailpembelian" class="btn btn-primary btn-lg btn-block">
                                            <span class="fa fa-save"></span> SIMPAN
                                        </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div> 
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
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
                                <th>KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>HARGA BELI</th>
                                <th>JUMLAH</th>
                                <th>SUB TOTAL</th>
                                
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                        $no=1;
                                        // for select / show data barang
                                        $sql = mysql_query("SELECT * FROM detail_pembelian p join barang b on p.idbarang = b.idbarang where iddetail_pembelian = '".$id."' ORDER BY p.iddetail_pembelian DESC");
                                        while ($row = mysql_fetch_array($sql)) {
                                            echo "<tr class='gradeX'>
                                                    <td>".$no++."</td>
                                                    <td>".$row['idbarang']."</td>
                                                    <td>".$row['namabarang']."</td>
                                                    <td>".$row['hargabeli']."</td>
                                                    <td>".$row['jumlahpembelian']."</td>
                                                    <td>".$row['totalpembelian']."</td>
                                                    <td>
                                                        <a class='btn btn-xs btn-info' href=''><span class='fa fa-pencil-square-o'></span> Ubah</a>
                                                       <a class='btn btn-xs btn-danger' href=''><span class='fa fa-trash'></span> Hapus</a> 
                                                    </td>
                                                </tr>";       
                                        }
                                     ?>
                                    </tbody>
                                    </table>
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

<!-- browse tambah suplier -->
<!-- Modal -->
