<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="foto/<?php echo $_SESSION['foto']; ?>" width="50" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['namalengkap']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['level']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="index.php?hal=pengguna/setting">Setting</a></li>
                                <li class="divider"></li>
                                <li><a href="index.php?logout=1" onclick="return confirm('Apakah Anda Ingin Keluar Dari Aplikasi Ini ?');">Keluar</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN
                        </div>
                    </li>
                    <li>
                         <a href="index.php"><i class="fa fa-th-large fa-home"></i> <span class="nav-label"> MENU UTAMA</span> <span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">MASTER</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="index.php?hal=pengguna/list">PENGGUNA</a></li>
                            <li><a href="index.php?hal=suplier/list">SUPLIER</a></li>
                            <li><a href="index.php?hal=kategori_barang/list">KATEGORI BARANG</a></li>
                            <li><a href="index.php?hal=satuan/list">SATUAN</a></li>
                            
                            <li><a href="index.php?hal=barang/list">BARANG</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">TRANSAKSI</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="index.php?hal=pembelian/list">PEMBELIAN</a></li>
                            <li><a href="index.php?hal=penjualan/add">PENJUALAN</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">LAPORAN</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="laporan/">LAPORAN PENGGUNA</a></li>
                            <li><a href="laporan/">LAPORAN BARANG</a></li>
                            <li><a href="laporan/">LAPORAN BARANG MENIPIS</a></li>
                            <li><a href="laporan/">LAPORAN PEMBELIAN</a></li>
                            <li><a href="laporan/">LAPORAN PENJUALAN</a></li>
                            <li><a href="laporan/">LAPORAN PELANGGAN</a></li>
                        </ul>
                    </li>
                    <li class="landing_link">
                        <a  href="index.php?hal=pelanggan/list"><span class="nav-label">DATA PELANGGAN</span></a>
                    </li>
                </ul>

            </div>
        </nav>