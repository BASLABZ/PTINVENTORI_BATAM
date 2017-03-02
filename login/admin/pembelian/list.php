<?php 
        if (isset($_GET['hapus'])) {
            $queryhapuspembelian = mysql_query("DELETE from pembelian where idpembelian = '".$_GET['hapus']."'");
            $queryhapusdetailpembelian = mysql_query("DELETE from detail_pembelian where iddetail_pembelian = '".$_GET['hapus']."'");
            if ($queryhapusdetailpembelian) {
                 echo "<script> alert('Data  Berhasil Dihapus'); location.href='index.php?hal=pembelian/list' </script>";exit;
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
            <strong>Pembelian Pembelian</strong>
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
                <h5>DATA TRANSAKSI PEMBELIAN BARANG</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover datatable" >
            <thead>
            <tr>
                <th>NO</th>
                <th>KODE PEMBELIAN</th>
                <th>TANGGAL PEMBELIAN</th>
                <th>NAMA PETUGAS</th>
                <th>NAMA SUPLIER</th>
                <th>JUMLAH PEMBELIAN</th>
                <th>TOTAL PEMBELIAN</th>
                <th>AKSI</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $no=1;
                // for select / show data kategori_barang
                $sql = mysql_query("SELECT dp.iddetail_pembelian,dp.totalpembelian,dp.jumlahpembelian,p.idpembelian,p.tgl_pembelian,u.namalengkap as namauser,s.namalengkap as namasuplier FROM detail_pembelian dp join pembelian p on dp.iddetail_pembelian = p.idpembelian join user u on p.iduser = u.iduser join suplier s on p.idsuplier = s.idsuplier
                            group by dp.iddetail_pembelian order by p.idpembelian DESC");

                while ($row = mysql_fetch_array($sql)) {
                ?>
                     <tr class='gradeX'>
                                    <td><?php echo ++$no; ?></td>
                                    <td><?php echo $row['idpembelian']; ?></td>
                                    <td><?php echo $row['tgl_pembelian']; ?></td>
                                    <td><?php echo $row['namauser']; ?></td>
                                    <td><?php echo $row['namasuplier']; ?></td>
                                    <td><?php echo $row['jumlahpembelian']; ?></td>
                                    <td><?php echo $row['totalpembelian']; ?></td>  
                                    <td>
                                     <a class='btn btn-xs btn-warning' href="index.php?hal=pembelian/lihat&id=<?php echo $row['idpembelian']; ?>"><span class='fa fa-eye'></span> Lihat</a>
                                    <a class='btn btn-xs btn-info' href="index.php?hal=pembelian/edit&id=<?php echo $row['idpembelian']; ?>"><span class='fa fa-pencil-square-o'></span> Ubah</a>
                                    <a class="btn btn-xs btn-danger" href="index.php?hal=pembelian/list&hapus=<?php echo $row['idpembelian']; ?>"><span class='fa fa-trash'></span> Hapus</a> 
                                    </td>
                                </tr>
                     <?php } ?>
                    </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        </div>