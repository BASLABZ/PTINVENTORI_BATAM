<?php
          session_start();
          include '../../koneksi/koneksi.php';
          include '../../koneksi/library.php';
         if (isset($_GET['logout'])) { 
          session_destroy();
          echo "<script> alert('Anda Berhasil Keluar Aplikasi'); location.href='index.php' </script>";exit;
        }
        if (isset($_SESSION['level']))
        {
        if ($_SESSION['level'] == "admin")
           {
            ?>
<!DOCTYPE html>
<html ng-app="inspinia" class="ng-scope">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APLIKASI INVENTORI PT SINAR JAYA PRATAMA</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="../assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="../assets/css/plugins/select2/select2.min.css" rel="stylesheet">

</head>
<body ng-controller="MainCtrl as main" class="md-skin fixed-sidebar fixed-navbar  pace-done" landing-scrollspy="" id="page-top">
    <div id="wrapper">
        <?php include 'menukiri.php'; ?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <?php include 'menuatas.php'; ?>
          <?php 
             if(empty( $_GET['hal']) ||  $_GET['hal'] ==""){ 
             $_GET['hal'] = "kontentengah.php";
              }
             if(file_exists( $_GET['hal'].".php")){
              include  $_GET['hal'].".php";
             }else {
             include"kontentengah.php";
             }   
               ?>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="../assets/js/jquery-2.1.1.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Flot -->
    <script src="../assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="../assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <!-- Peity -->
    <script src="../assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../assets/js/demo/peity-demo.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="../assets/js/inspinia.js"></script>
    <script src="../assets/js/plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="../assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- GITTER -->
    <script src="../assets/js/plugins/gritter/jquery.gritter.min.js"></script>
    <!-- Sparkline -->
    <script src="../assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sparkline demo data  -->
    <script src="../assets/js/demo/sparkline-demo.js"></script>
    <!-- ChartJS-->
    <script src="../assets/js/plugins/chartJs/Chart.min.js"></script>
    <!-- Toastr -->
    <script src="../assets/js/plugins/toastr/toastr.min.js"></script>
    <script src="../assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="../assets/js/plugins/select2/select2.full.min.js"></script>
</body>
</html>
<script type="text/javascript">
  $(function(){
  $('.datatable').DataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                buttons: []});
  $(".select2").select2();
})
</script>

<?php
}else if ($_SESSION['level'] == "kasir")
   {
       header('location:kasir.php');
   }
}
if (!isset($_SESSION['level']))
{
  header('location:../../index.php');
}
?>
