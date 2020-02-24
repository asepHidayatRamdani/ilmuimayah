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
        <div class="container-fluid ">
          <h1 class="h3 mb-1 text-gray-800">Biografi</h1>
          <p><i>Isi Biografi yang akan ditampilkan</i> </p>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark">Biografi</h6>
            </div>
            <div class="card-body">
              <form action="<?= base_url() . "biografi/aksi_edit/1" ?>" method="POST">
                <div class="row">
                  <div class="col-md-12">

                    <?php foreach ($bio as $b) : ?>
                      <input type="hidden" name="idBiografi" value="<?= $b->idBiografi ?>">
                      <div>
                        <textarea class="form-control" name="isiBiografi" id="" cols="30" rows="10"><?= $b->isiBiografi ?></textarea>
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
                <div class="row float-right mr-1">
                  <div class="col-s-6 ml-3">
                    <div>
                      <input class="btn btn-primary mt-4" type="submit" value="SIMPAN">
                    </div>
                  </div>

              </form>

            </div>
          </div>

          <!-- Page Heading -->


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