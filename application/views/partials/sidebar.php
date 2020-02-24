<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
              <div class="sidebar-brand-icon ml-0">
                <img src="<?= base_url().'img/logo.png'?>" alt="" width="40" class="float-left">
              </div>
              <div class="sidebar-brand-text mx-3" style="font-size: 10pt">Admin</div>
            </a>
      
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Biografi -->
            <?php $uri=ucfirst($this->uri->segment(1));
                if ($uri=="Biografi") {
                ?>
                <li class="nav-item active">
                <?php
                }else{
                  ?>
                   <li class="nav-item">
                  <?php
                }
              ?>
              <a class="nav-link" href="<?= base_url('biografi') ?>">
                <i class="fa fa-address-book"></i>
                <span>Biografi</span></a>
            </li>
      
            <!-- Nav Item - Buku -->
            <?php $uri=ucfirst($this->uri->segment(1));
                if ($uri=="Buku") {
                ?>
                <li class="nav-item active">
                <?php
                }else{
                  ?>
                   <li class="nav-item">
                  <?php
                }
              ?>
              <a class="nav-link" href="<?= base_url('buku') ?>">
                <i class="fa fa-book"></i>
                <span>Buku</span></a>
            </li>
      
            <!-- Nav Item - Biografi -->
            <?php $uri=ucfirst($this->uri->segment(1));
                if ($uri=="Publikasi") {
                ?>
                <li class="nav-item active">
                <?php
                }else{
                  ?>
                   <li class="nav-item">
                  <?php
                }
              ?>
              <a class="nav-link" href="<?= base_url('publikasi') ?>">
                <i class="fa fa-calendar"></i>
                <span>Publikasi Acara</span></a>
            </li>
            <?php $uri=ucfirst($this->uri->segment(1));
                if ($uri=="Foto") {
                ?>
                <li class="nav-item active">
                <?php
                }else{
                  ?>
                   <li class="nav-item">
                  <?php
                }
              ?>
              <a class="nav-link" href="<?= base_url('foto') ?>">
                <i class="fas fa-file-image"></i>
                <span>Foto</span></a>
            </li>
      
            <!-- Nav Item - Buku -->
            <?php $uri=ucfirst($this->uri->segment(1));
                if ($uri=="Video") {
                ?>
                <li class="nav-item active">
                <?php
                }else{
                  ?>
                   <li class="nav-item">
                  <?php
                }
              ?>
              <a class="nav-link" href="<?= base_url('video') ?>">
                <i class="fas fa-film"></i>
                <span>Video</span></a>
            </li>
            

            <?php $uri=ucfirst($this->uri->segment(1));
                if ($uri=="User") {
                ?>
                <li class="nav-item active">
                <?php
                }else{
                  ?>
                   <li class="nav-item">
                  <?php
                }
              ?>
              <a class="nav-link" href="<?= base_url('User') ?>">
                <i class="fas fa-user-alt"></i>
                <span>User</span></a>
            </li>
      
      
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
      
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
      
</ul>