<?php
    session_start();
    
    if(empty($_SESSION['backend_user_id'])){
      header("location:login.php");
    }
    
    include "koneksi.php";
    include "controller.php";
    $status_proses=$_SESSION['status_proses'];
    date_default_timezone_set('Asia/Singapore');

    // Cek Periode Pembukuan
    $tgl=date("Y-m-d");
    $sql1="select * from periode_pembukuan where tanggal_mulai<='$tgl' and tanggal_selesai>='$tgl'";
    
    $query1=mysqli_query($koneksi,$sql1);
    $data1=mysqli_fetch_array($query1);

    $periode=$data1['kode'];
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">  
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">App Koperasi 1.0</span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['backend_user_nama']; ?></a>
        </div>        
      </div>

      <!-- SidebarSearch Form -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Periode Pembukuan : <b><?= $periode; ?></b></li>

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>            
          </li>
          
          
<?php
          $_SESSION['backend_level']=1;
          if($_SESSION['backend_level']==1){
            include "menu_admin.php";
          } else if($_SESSION['backend_level']==2){
            include "menu_petugas.php";
          }
?>          
          <li class="nav-item">
            <a href="aksi/user.php?aksi=logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <?php 
 //$konten ="konten/home.php";
 include $konten; ?>

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://backtoskull.wordpress.com">Agus Ariyanto</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!-- Plugin Sweet Alert -->
<script src="dist/js/sweetalert2.all.min.js"></script>
<!--<script src="dist/js/script-alert.js"></script> -->

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<?php //include "script-alert.php" ?>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#finditem').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    $('#noorder').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    
    // Modul Sweet Alert
    var statusProses = '<?= $status_proses; ?>';
    //alert('statusProses');
    if(statusProses==='SUKSES SIMPAN JUAL'){
        Swal.fire({
        //position: 'top-end',
        icon: 'success',
        title: 'Berhasil Memproses Transaksi',
        showConfirmButton: false,
        timer: 2000
        
        })
    }    
    if(statusProses==='SUKSES SIMPAN BELI'){
        Swal.fire({
        //position: 'top-end',
        icon: 'success',
        title: 'Berhasil Memproses Transaksi',
        showConfirmButton: false,
        timer: 2000
        
        })
    }  

    $(document).on('click','.hapuspenjualan',function(){
    //$('.infopenjualan').click(function(){
   
      var idjual = $(this).data('id');
      //alert(idjual);
      
      // AJAX request
      $.ajax({
        url: 'server-side/hapusjual.php',
        type: 'post',
        data: {idjual: idjual},
        success: function(response){ 
          // Add response in Modal body
          $('.modal-body').html(response);

          // Display Modal
          //$('#empModal').modal('show'); 
        }
      });
    });
    
    $(document).on('click','.infopenjualan',function(){
    //$('.infopenjualan').click(function(){
   
      var idjual = $(this).data('id');
      //alert(idjual);
      
      // AJAX request
      $.ajax({
        url: 'server-side/infojual.php',
        type: 'post',
        data: {idjual: idjual},
        success: function(response){ 
          // Add response in Modal body
          $('.modal-body').html(response);

          // Display Modal
          //$('#empModal').modal('show'); 
        }
      });
    });

    $(document).on('click','.infopembelian',function(){
    //$('.infopembelian').click(function(){
   
      var idbeli = $(this).data('id');
      //alert(idbeli);
      
      // AJAX request
      $.ajax({
        url: 'server-side/infobeli.php',
        type: 'post',
        data: {idbeli: idbeli},
        success: function(response){ 
          // Add response in Modal body
          $('.modal-body').html(response);

          // Display Modal
          //$('#empModal').modal('show'); 
        }
      });
    });

    $(document).on('click','.cek-konsinyasi',function(){
    //$('.infopembelian').click(function(){
   
      var id_produk = $(this).data('id');
      var aksi='ubah-status-konsinyasi';
      var konsinyasi=0;      
      //alert(id_produk);
      if (document.getElementById('cek-konsinyasi'+id_produk).checked) {
        konsinyasi=1;
      } else {
        konsinyasi=0;
      }
      
      // AJAX request
      $.ajax({
        url: 'aksi/produk.php',
        type: 'post',
        data: {id_produk: id_produk, konsinyasi:konsinyasi, aksi:aksi},
        success: function(response){ 
          // Add response in Modal body
          //$('.modal-body').html(response);
          //alert(id_produk+'-'+aksi+'-'+konsinyasi);

         
        }
      });
    });

    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    $('#id_anggota2').select2({
        dropdownParent: $('#simpanJualModal'),
        theme: 'bootstrap4'        
    });
    $('#id_anggota1').select2({
        dropdownParent: $('#simpanJualModalKas'),
        theme: 'bootstrap4'        
    });
    $('#id_anggota').select2({
        dropdownParent: $('#simpanJualModalCicil'),
        theme: 'bootstrap4'        
    });
    $('#id_pemasok').select2({
        dropdownParent: $('#simpanJualModal'),
        theme: 'bootstrap4'        
    });
    
  });
</script>

<script> 
    // Modul Kembalian Pembayaran Kas
    function hitung_kembalian(evt){
      var total=document.getElementById("grandtotal").value;
      var bayar=document.getElementById("bayar").value;
      var kembali=bayar-total;
      document.getElementById("kembali").innerHTML="Rp. "+kembali;
    }
    
    document.getElementById('bayar').addEventListener("mouseup", function (evt) {
      hitung_kembalian();      
    }, false);
    document.getElementById('bayar').addEventListener("keyup", function (evt) {
      hitung_kembalian();      
    }, false);

    // Modul Pembayaran Cicilan
    
    function tampilkan_cicilan(evt){
      var jumlahCicil=document.getElementById("jumlah_cicil").value; 
      var total=document.getElementById("grandtotal").value;

      var tanggalTransaksi=document.getElementById("tanggal_transaksi").value;
      var tahunTransaksi=tanggalTransaksi.substring(0,4);
      var bulanTransaksi=tanggalTransaksi.substring(5,7);
      var hariTransaksi=tanggalTransaksi.substring(8,10);
      var tanggalCicilan=["Tanggal1","Tanggal2","Tanggal3","Tanggal4","Tanggal5"];

      tanggalCicilan[0]=tanggalTransaksi;
      
      // Set Tanggal Cicilan Ke 2
      var thn=Number(tahunTransaksi);
      var bln=Number(bulanTransaksi)+1;
      if (bln>12){
        thn=thn+1;
        bln=bln-12;
        
      }
      bln=''+bln
      if(bln.length==1){
        bln="0"+bln;
      } else {
        bln=bln;
      }
     tanggalCicilan[1]=thn+"-"+bln+"-"+hariTransaksi;

      // Set Tanggal Cicilan Ke 3
      var thn=Number(tahunTransaksi);
      var bln=Number(bulanTransaksi)+2;
      if (bln>12){
        thn=thn+1;
        bln=bln-12;
        
      }
      bln=''+bln
      if(bln.length==1){
        bln="0"+bln;
      } else {
        bln=bln;
      }
      tanggalCicilan[2]=thn+"-"+bln+"-"+hariTransaksi;

      // Set Tanggal Cicilan Ke 4
      var thn=Number(tahunTransaksi);
      var bln=Number(bulanTransaksi)+3;
      if (bln>12){
        thn=thn+1;
        bln=bln-12;
        
      }
      bln=''+bln
      if(bln.length==1){
        bln="0"+bln;
      } else {
        bln=bln;
      }
      tanggalCicilan[3]=thn+"-"+bln+"-"+hariTransaksi;

      // Set Tanggal Cicilan Ke 5
      var thn=Number(tahunTransaksi);
      var bln=Number(bulanTransaksi)+4;
      if (bln>12){
        thn=thn+1;
        bln=bln-12;
        
      }
      bln=''+bln
      if(bln.length==1){
        bln="0"+bln;
      } else {
        bln=bln;
      }
      tanggalCicilan[4]=thn+"-"+bln+"-"+hariTransaksi;
      
      var cicilan=Math.round(total/jumlahCicil);
      var elemenTanggal="";
      var elemenJumlah="";
      
      for (i = 1; i < 6; i++) {
        elemenTanggal="tanggal_bayar"+i;
        elemenJumlah="jumlah_bayar"+i;
        document.getElementById(elemenJumlah).value=0;
        document.getElementById(elemenTanggal).innerHTML="Pembayaran ke - "+i+"(Lunas)";
        document.getElementById(elemenJumlah).readOnly = true;
      }
      for (i = 0; i < jumlahCicil; i++) {
        elemenJumlah="jumlah_bayar"+(i+1);
        elemenTanggal="tanggal_bayar"+(i+1);
        var inputElemenTanggal="tanggal_jatuh_tempo["+i+"]";
        document.getElementById(elemenJumlah).value=cicilan;
        var curtgl=tanggalCicilan[i];
        document.getElementById(elemenTanggal).innerHTML="Pembayaran ke - "+(i+1)+"("+curtgl+")";
        //document.getElementById(elemenTanggal).innerHTML=inputElemenTanggal;
        document.getElementById(elemenJumlah).readOnly = false;
        document.getElementById(inputElemenTanggal).value=curtgl;
      }
      
      
    }
    
    document.getElementById('tanggal_transaksi').addEventListener("mouseup", function (evt) {
      tampilkan_cicilan();      
    }, false);
    document.getElementById('tanggal_transaksi').addEventListener("keyup", function (evt) {
      tampilkan_cicilan();      
    }, false);
    document.getElementById('jumlah_cicil').addEventListener("mouseup", function (evt) {
      tampilkan_cicilan();      
    }, false);
    document.getElementById('jumlah_cicil').addEventListener("keyup", function (evt) {
      tampilkan_cicilan();      
    }, false);
        
</script>

<?php
   $_SESSION['status_proses']='';
?>

</body>
</html>

