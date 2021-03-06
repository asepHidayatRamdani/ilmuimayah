<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view('partials/head.php') ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('partials/sidebar.php') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('partials/navbar.php') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tabel Foto</h1>
          <p class="mb-4">Isi Foto yang akan ditampilkan</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Foto</h6>
            </div>
            <div class="card-body">
              <form action="<?= base_url('foto/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control" name="idFoto" value="<?= $max ?>" id="" placeholder="id Foto">
                </div>
                <div class="form-group">
                  <label for="" class="label">File Foto : <?= $foto->fileFoto ?></label>
                  <input type="file" class="form-control-file" name="fileFoto" id="" placeholder="File Foto">
                  <input type="hidden" name="old_file" value="<?= $foto->fileFoto ?>">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="tanggalFoto" id="" value="<?= $foto->tanggalFoto ?>" placeholder="Keterangan">
                </div>

                <input type="submit" class="form-control btn btn-primary" value="EDIT">

              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('partials/footer.php') ?>
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
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('partials/js.php') ?>

</body>

</html>