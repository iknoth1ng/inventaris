<?php 
include '../config.php'; 
$blacklist = array("kepaladinas");
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

  <title>Sistem Informasi Inventaris dan Barang Dinas Komunikasi dan Informatika || Tambah Peminjaman</title>

  <!-- Logo -->
  <link rel="icon" type="image/png" href="img/logo.png"/>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

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
      <li class="nav-item">
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
      <li class="nav-item active">
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
      <li class="nav-item active">
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
          <h1 class="h3 mb-4 text-gray-900">Tambah Peminjaman :</h1>
          <div class="row">

          <!-- Tambah Kartu Inventaris A-->
          <div class="shadow-lg p-3 mb-5 col-sm-12 bg-white rounded">
          <form action="../modal/m.tambahPeminjaman1.php" method="POST" data-parsley-validate class="form-horizontal form-label text-gray-900">
          <div class="form-group row">
                <label for="colFormLabel" class="control-label col-sm-2 col-form-label">ID Peminjaman:</label>
                <div class="col-sm-10 col-md-6">
                  <input type="text" class="form-control  text-gray-900" id="colFormLabel" name="id_peminjam" value="<?php echo $peminjaman->generateRandomString() ;?>" placeholder="Nama Peminjam" readonly>
                </div>
              </div>
            <div class="form-group row">
                <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Nama Peminjam:</label>
                <div class="col-sm-10 col-md-6">
                  <input type="text" class="form-control  text-gray-900" id="colFormLabel" name="nama_peminjam" value="<?php echo $user->tampil_user("fullname", $_SESSION['iduser']) ;?>" placeholder="Nama Peminjam" readonly>
                </div>
              </div>
              <div class="form-group row">
              <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Nama Barang :</label>
                    <select class="custom-select col-sm-10 col-md-6  text-gray-900" id="nama_barang" name="nama_barang" value="" required>
                            <option value="">--Nama Barang---</option>
                            <?php echo $peminjaman->tampil_barang()?>
                    </select>
              </div>
              <!-- <div class="form-group row">
              <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Merk :</label>
                    <select class="custom-select col-sm-10 col-md-6  text-gray-900" id="merk" name="merk" value="">
                            <option value="">--Merk---</option>
                            <?php echo $peminjaman->tampil_merk()?>
                    </select>
              </div> -->
              <div class="form-group row">
              <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Ruangan :</label>
                    <select class="custom-select col-sm-10 col-md-6  text-gray-900" id="inputGroupSelect01" name="ruangan" required>
                            <option value="">Ruangan</option>
                             <option value="KEPALA DINAS KOMUNIKASI DAN INFORMATIKA">KEPALA DINAS KOMUNIKASI DAN INFORMATIKA</option>
                             <option value="SEKRETARIS DINAS KOMUNIKASI DAN INFORMATIKA">SEKRETARIS DINAS KOMUNIKASI DAN INFORMATIKA</option>
                             <option value="EVALUASI DAN PERENCANAAN">EVALUASI DAN PERENCANAAN</option>
                             <option value="KEUANGAN">KEUANGAN</option>
                             <option value="SEKRETARIAT">SEKRETARIAT</option>
                             <option value="KABID PENYELENGGARAAN E-GOVERNMENT">KABID PENYELENGGARAAN E-GOVERNMENT</option>
                             <option value="BIDANG PENYELENGGARAAN E-GOVERNMENT">BIDANG PENYELENGGARAAN E-GOVERNMENT</option>
                             <option value="KABID STATISTIK">KABID STATISTIK</option>
                             <option value="BIDANG  STATISTIK">BIDANG  STATISTIK</option>
                             <option value="KABID PERSANDIAN">KABID PERSANDIAN</option>
                             <option value="BIDANG PERSANDIAN">BIDANG PERSANDIAN</option>
                             <option value="TENAGA AHLI">TENAGA AHLI</option>
                             <option value="RUANGAN LAB / RAPAT">RUANGAN LAB / RAPAT</option>
                             <option value="DATA CENTRE">DATA CENTRE</option>
                             <option value="TUNGGU / TAMU">TUNGGU / TAMU</option>
                             <option value="PANTRY">PANTRY</option>
                             <option value="KASI LAYANAN KOMUNIKASI DAN INFORMASI PUBLIK">KASI LAYANAN KOMUNIKASI DAN INFORMASI PUBLIK</option>
                             <option value="KONTROL CCTV">KONTROL CCTV</option>
                             <option value="DESAIN">DESAIN</option>
                             <option value="CALL CENTRE">CALL CENTRE</option>
                             <option value="KABID KOMUNIKASI DAN INFORMASI PUBLIK">KABID KOMUNIKASI DAN INFORMASI PUBLIK</option>
                             <option value="BIDANG KOMUNIKASI DAN INFORMASI PUBLIK">BIDANG KOMUNIKASI DAN INFORMASI PUBLIK</option>
                             <option value="MEDIA CENTER">MEDIA CENTER</option>
                             <option value="PENGELOLA DATA">PENGELOLA DATA</option>
                             <option value="GUDANG">GUDANG</option>
                             <option value="LUAR RUANGAN">LUAR RUANGAN</option>
                             <option value="NON RUANGAN">NON RUANGAN</option>
                    </select>
              </div>
              <div class="form-group row">
                <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Tanggal Peminjaman :</label>
                <div class="col-sm-10 col-md-6">
                  <input type="date" class="form-control text-gray-900" id="colFormLabel" name="tanggal_peminjaman" value="" required placeholder="Tanggal Peminjaman" required>
                </div>
              </div>
              <div class="form-group row">
              <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Kondisi Awal :</label>
                    <select class="custom-select col-sm-10 col-md-6 text-gray-900" id="kondisi_awal" name="kondisi_awal" value="">
                        <option disable value="">--Kondisi--</option>
                        <option value="Baik">Baik</option>
                        <option value="Kurang Baik">Kurang Baik</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
              </div>
              <div class="form-group row">
                <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Tanggal Pengembalian :</label>
                <div class="col-sm-10 col-md-6">
                  <input type="date" class="form-control  text-gray-900" id="colFormLabel" name="tanggal_pengembalian" value="" placeholder="Tanggal Pengembalian" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Jumlah Yang Dipinjam :</label>
                <div class="col-sm-10 col-md-6">
                  <input type="number" class="form-control  text-gray-900" id="colFormLabel" name="jumlah" value="" placeholder="Jumlah Yang Dipinjam" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabel" class="control-label col-sm-2 col-form-label">Keterangan :</label>
                <div class="col-sm-10 col-md-6">
                  <input type="text" class="form-control  text-gray-900" id="colFormLabel" name="keterangan" value="" placeholder="Keterangan">
                </div>
              </div>
             <button class="btn btn-success" type="submit" value="submit">Simpan</button>
            <input class="btn btn-primary" type="reset" value="Reset">
            <a class="btn btn-danger" href="dashboard.php" role="button">Cancel</a>
            </form>

        <!-- /.container-fluid -->



      <!-- End of Main Content -->
      </div>
    </div>
    </div>

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
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar ? </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout Apabila Anda Ingin Keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
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

  <script type="text/javascript">
    $("#nama_barang option[value='<?php echo $peminjaman->tampil_barang('nama_barang')?>']").prop('selected',true);
    </script>

</body>

</html>
