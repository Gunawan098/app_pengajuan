<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url();?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?=base_url()?>admin" class="d-block"><?=$this->session->userdata('nama')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url()?>admin" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>admin-user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Data Verifikasi 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin-verifikasi-KK" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran KK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin-verifikasi-EKTP-baru" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran EKTP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin-verifikasi-SPK" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran SPK</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Bukti Pendaftaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EKTP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SPK</p>
                </a>
              </li>
            </ul> -->

            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin-bukti-pendaftaran-KK" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran KK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin-bukti-pendaftaran-EKTP-baru" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran EKTP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin-bukti-pendaftaran-SPK" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran SPK</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>master/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>