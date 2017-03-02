<?php 
        if (isset($_GET['hapus'])) {
            $queryhapus = mysql_query("DELETE FROM barang where idbarang='".$_GET['hapus']."'");
            if ($queryhapus) {
                echo "<script> alert('Data barang Berhasil Dihapus'); location.href='index.php?hal=barang/list' </script>";exit;
            }else{
                echo "<script> alert('Data Gagal Dihapus'); location.href='index.php?hal=barang/list' </script>";exit;
            }
        }
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>Master Penguna</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a>Master</a>
        </li>
        <li class="active">
            <strong>Master Kategori Barang</strong>
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
                <h5>Master Kategori Barang</h5>
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
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                    <?php 
                        $no=1;
                        // for select / show data barang
                        $sql = mysql_query("SELECT * from barang b 
                                                    JOIN kategori_barang k
                                                    ON b.idkategori = k.idkategori
                                                    JOIN satuan s 
                                                    on b.idsatuan = s.idsatuan");
                        while ($row = mysql_fetch_array($sql)) {
                            echo "<tr class='gradeX'>
                                    <td>".$no++."</td>
                                    <td>".$row['idbarang']."</td>
                                    <td>".$row['namabarang']."</td>
                                    <td>".$row['jumlah']."</td>
                                    <td>".$row['hargabeli']."</td>
                                    <td>".$row['hargajual']."</td>
                                    <td>".$row['kategori']."</td>
                                    <td>".$row['satuan']."</td>
                                    <td>
                                        <a class='btn btn-xs btn-info' href='index.php?hal=barang/edit&id=".$row['idbarang']."'><span class='fa fa-pencil-square-o'></span> Ubah</a>
                                       <a class='btn btn-xs btn-danger' href='index.php?hal=barang/list&hapus=".$row['idbarang']."'><span class='fa fa-trash'></span> Hapus</a> 
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