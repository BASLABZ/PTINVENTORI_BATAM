<?php 
        $id = $_GET['id'];
        $row = mysql_fetch_array(mysql_query("SELECT * FROM  pembelian p  join suplier s on p.idsuplier = s.idsuplier where p.idpembelian = '".$id."' "));
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
            <strong> Lihat Data Pembelian</strong>
        </li>
    </ol>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div align="right">
            <div class="btn-group">
                <a class="btn btn-info btn-xs" type="button" href="index.php?hal=pembelian/list" ><span class="glyphicon glyphicon-th-list"></span> Daftar</a>                    
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>LIHAT DATA PEMBELIAN</h5>
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
                            </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                        $no=1;
                                        // for select / show data barang
                                        $sql = mysql_query("SELECT * FROM detail_pembelian p join barang b on p.idbarang = b.idbarang where iddetail_pembelian = '".$id."' ORDER BY p.iddetail_pembelian DESC");

                                        while ($row = mysql_fetch_array($sql)) {
                                            $totalbarang = count($row['jumlahpembelian']);
                                            $totalpembelian = count($row['totalpembelian']);
                                            echo "<tr class='gradeX'>
                                                    <td>".$no++."</td>
                                                    <td>".$row['idbarang']."</td>
                                                    <td>".$row['namabarang']."</td>
                                                    <td>".$row['hargabeli']."</td>
                                                    <td>".$row['jumlahpembelian']."</td>
                                                    <td>".$row['totalpembelian']."</td>
                                                </tr>";       
                                        }
                                     ?>
                                    </tbody>
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
