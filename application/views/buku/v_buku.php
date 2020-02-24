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
          <h1 class="h3 mb-2 text-gray-800">Tabel Buku</h1>
          <p class="mb-4">Isi Buku yang akan ditampilkan</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Buku</h6>
                </div>
                <div class="col-md-6">
                  <a href="<?= base_url('buku/add') ?>" class="btn btn-primary btn-sm float-right">TAMBAH</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id Buku</th>
                      <th>Nama Buku</th>
                      <th>Pengarang</th>
                      <th>Tahun Terbit</th>
                      <th>File Buku</th>
                      <th>Gambar Buku</th>
                      <th>Opsi</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id Buku</th>
                      <th>Nama Buku</th>
                      <th>Pengarang</th>
                      <th>Tahun Terbit</th>
                      <th>File Buku</th>
                      <th>Gambar Buku</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($buku as $b) : ?>
                      <tr>
                        <td><?= $b->idBuku; ?></td>
                        <td><?= $b->namaBuku; ?></td>
                        <td><?= $b->pengarang; ?></td>
                        <td><?= $b->tahunTerbit; ?></td>
                        <td><a href="<?= base_url() . 'img/' . $b->fileBuku; ?>"><?= $b->namaBuku; ?></a></td>
                        <td><img src="<?= base_url() . 'img/' . $b->gambar; ?>" alt="" width="100px"></td>

                        <th><a href="<?= base_url('buku/edit/' . $b->idBuku) ?>"><button class="btn btn-sm btn-warning mr-2">Edit</button></a>
                          <a onclick="deleteConfirm('<?php echo base_url('buku/hapus/' . $b->idBuku) ?>')" href="#!" class="btn btn-sm btn-danger "> Hapus</a></td>
                      </tr>

                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('partials/footer.php') ?>
      <?php $this->load->view('partials/modal.php') ?>
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

  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script>
</body>

</html>