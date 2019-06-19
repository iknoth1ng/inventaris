<?php 
include '../config.php';
$blacklist = array("kepaladinas, pegawai");
$login->level_tolak($blacklist,'login');
$login->login_status();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi Inventaris dan Barang Dinas Komunikasi dan Informatika || Aset Tak Berwujud </title>

  <!-- Logo -->
  <link rel="icon" type="image/png" href="img/logo.png"/>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<style>
    th {
      text-align: center;
    }
  </style>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand --><p></p>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-list-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-1"><p></p>Sistem Informasi inventaris dan Barang</div>
      </a>
      <p><p></p></p>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fa fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <?php if($_SESSION['level'] == 'pengurusbarang'){ ?>
       <!-- Nav Item - Dashboard -->
       <li class="nav-item">
        <a class="nav-link" href="master_data.php">
         <i class="fas fa-th-list"></i>
          <span>Master Data</span></a>
      </li>


      <!-- Nav Item - Kartu Inventaris Barang -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <i class="fa fa-table"></i>
          <span>Kartu Inventaris Barang</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Kartu Inventaris Barang</h6>
            <a class="collapse-item" href="kibA.php?data=">KIB A</a>
            <a class="collapse-item" href="kibB.php?data=">KIB B</a>
            <a class="collapse-item" href="kibC.php?data=">KIB C</a>
            <a class="collapse-item" href="kibD.php?data=">KIB D</a>
            <a class="collapse-item" href="kibE.php">KIB E</a>
            <a class="collapse-item" href="kibF.php">KIB F</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - List Rekapitulasi -->
      <li class="nav-item">
        <a class="nav-link" href="rekapitulasi.php?data=">
          <i class="fa fa-book"></i>
          <span>List Rekapitulasi</span></a>
      </li>

      <!-- Nav Item - Ekstrakom -->
      <li class="nav-item">
        <a class="nav-link" href="ekstrakom.php">
          <i class="fa fa-file"></i>
          <span>Ekstrakom</span></a>
      </li>

      <!-- Nav Item - Barang Pakai habis -->
      <li class="nav-item">
        <a class="nav-link" href="barang_pakai_habis.php">
          <i class="fas fa-file-alt"></i>
          <span>Barang Pakai Habis</span></a>
      </li>

      <!-- Nav Item -Aset -->
      <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="far fa-file-archive"></i>
            <span>Aset</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Aset</h6>
              <a class="collapse-item" href="aset_lain.php">Aset Lain</a>
              <a class="collapse-item" href="aset_tak_berwujud.php">Aset Tak Berwujud</a>
            </div>
          </div>
        </li>

      <!-- Nav Item - Tambah Pengguna -->
      <li class="nav-item">
          <a class="nav-link" href="tambah_user.php">
          <i class="fas fa-user-plus"></i>
            <span>Tambah Pengguna</span></a>
      </li>

      <!-- Nav Item - List Peminjaman -->
      <li class="nav-item">
          <a class="nav-link" href="list_peminjaman.php">
            <i class="fa fa fa-list"></i>
            <span>List Peminjaman</span></a>
      </li>

      <!-- Nav Item - List Peminjaman -->
      <li class="nav-item">
          <a class="nav-link" href="stok_barang.php">
          <i class="fa fas fa-store"></i>
            <span>Stok Barang</span></a>
      </li>

      <?php } else if($_SESSION['level'] == 'kepaladinas'){?>
       <!-- Nav Item - Kartu Inventaris Barang -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <i class="fa fa-table"></i>
          <span>Kartu Inventaris Barang</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Kartu Inventaris Barang</h6>
            <a class="collapse-item" href="kibA1.php?data=">KIB A</a>
            <a class="collapse-item" href="kibB1.php?data=">KIB B</a>
            <a class="collapse-item" href="kibC1.php?data=">KIB C</a>
            <a class="collapse-item" href="kibD1.php?data=">KIB D</a>
            <a class="collapse-item" href="kibE1.php">KIB E</a>
            <a class="collapse-item" href="kibF1.php">KIB F</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - List Rekapitulasi -->
      <li class="nav-item">
        <a class="nav-link" href="rekapitulasi1.php?data=">
          <i class="fa fa-book"></i>
          <span>List Rekapitulasi</span></a>
      </li>

      <!-- Nav Item -Aset -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="far fa-file-archive"></i>
            <span>Aset</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Aset</h6>
              <a class="collapse-item" href="aset_lain1.php">Aset Lain</a>
              <a class="collapse-item" href="aset_tak_berwujud1.php">Aset Tak Berwujud</a>
            </div>
          </div>
        </li>

      <!-- Nav Item - List Peminjaman -->
      <li class="nav-item">
          <a class="nav-link" href="list_peminjaman2.php">
            <i class="fa fa fa-list"></i>
            <span>List Peminjaman</span></a>
      </li>

      <?php } else if($_SESSION['level'] == 'pegawai'){?>
      <!-- Nav Item - List Rekapitulasi -->
      <li class="nav-item">
        <a class="nav-link" href="rekapitulasi1.php?data=">
          <i class="fa fa-book"></i>
          <span>List Rekapitulasi</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="list_peminjaman1.php">
            <i class="fa fa fa-list"></i>
            <span>List Peminjaman</span></a>
      </li>

      

      <?php }?>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
     

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-800 medium"><?php echo $user->tampil_user("fullname", $_SESSION['iduser']) ;?></span>
                <img class="img-profile rounded-circle" src="./img/gambar/<?php echo $user->tampil_user("foto", $_SESSION['iduser']) ;?>" width="300" height="200">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="pengaturan.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../modal/m.logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Aset Tak Berwujud</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="text-gray-900"><center>PEMERINTAH KOTA BATAM</h3></center>
                <h3 class="text-gray-900"><center>BADAN KOMUNIKASI DAN INFORMASIKA</h3></center>
                <h3 class="text-gray-900"><center>ASET TAK BERWUJUD</h3></center>
                <h3 class="text-gray-900"><center>PER DESEMBER 2016</h3></center>
            <div class="my-1"></div>
                <a href="tambah_asettakberwujud.php" class="btn btn-success">
                    <span class="icon text-black-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                  </a> 

                <a href="dashboard.php" class="btn btn-success">
                    <span class="icon text-black-50">
                      <i class="fas fa-home"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>

                <a href="./pdf/document/cetak_Aset.php" class="btn btn-success">
                    <span class="icon text-black-50">
                      <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                  </a>
                  <p>	

              <div class="table-responsive text-gray-900">
                <table class="table table-bordered text-gray-900" id="dataTable">
                <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang / Jenis Barang</th>
                          <th>Tahun Pembeliaan</th>
                          <th>Asal Usul / Cara Perolehan</th>
                          <th>Harga</th>
                          <th>Amortisasi / Tahun</th>
                          <th>Akm. Amortisasi s.d 2016</th>
                          <th>Beban Amortisasi 2017</th>
                          <th>Akm. Amortisasi s.d 2017</th>
                          <th>Nilai Buku</th>
                          <th>Ket</th>
                          <th colspan="2">Edit</th>
                        </tr>
                      
                        <tr>
                           <th>1</th>
                           <th>2</th>
                           <th>3</th>
                           <th>4</th>
                           <th>5</th>
                           <th>6</th>
                           <th>7=(6:4tahun)</th>
                           <th>8</th>
                           <th>9</th>
                           <th>10=8+9</th>
                           <th>11=6-10</th>
                           <th>12</th>
                           <th></th>
                           <th></th>
                         
                        </tr>
                      </thead>
            <tbody>
                <?php echo $aset-> tampil_asettakberwujud(); ?>
            </tbody>    


            <tfoot>
                <tr> 
                     <td colspan="5" align="center">Total </td>
                     <td>Rp. <?php echo $aset->harga();?> </td>
                     <td>Rp. <?php echo $aset->amortisasi();?> </td>
                     <td>Rp. <?php echo $aset->amortisasi_2016();?> </td>
                     <td>Rp. <?php echo $aset->beban_amortisasi();?> </td>
                     <td>Rp. <?php echo $aset->amortisasi_2017();?> </td>
                     <td>Rp. <?php echo $aset->nilai_buku();?> </td>
                     <td></td>
                     <td colspan="2"></td>
                </tr>
            </tfoot>
            
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ayu Wulandari</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-gray-900" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout Apabila Anda Ingin Keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../modal/m.logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script type="text/javascript">
  function myhapus(link){
    var retVal = confirm("Apakah anda Yakin untuk menghapus ?");
    if( retVal == true ) {
      window.location = link
      // document.write ("User wants to continue!");
      return true;
    } else {
      alert("data batal di hapus");
      return false;
    }
  }
  </script> 

</body>

</html>
