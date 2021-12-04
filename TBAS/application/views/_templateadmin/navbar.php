
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a target="_blank" href="<?php echo base_url() ?>" class="nav-link">Home</a>
      </li>
    </ul>
    
    <ul class="navbar-nav ml-auto">

      <!-- hak akses start -->
      <li class="nav-item dropdown">
        <a href="#" class="nav-link" data-toggle="dropdown">
          <img class="img-circle img-bordered-sm" style="height: 30px; width: 30px; object-fit: cover; border-radius: 50%;" src="<?php echo base_url(); ?>gambar/profil/<?php echo $this->session->userdata('foto') ?>"  alt="User Image">
          <span class="hakakses">HAK AKSES : <b><?php echo $this->session->userdata('level') ?></b></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header">Akun</span> -->
          <div class="dropdown-divider"></div><center>
            <a style="height: 100%; width: 100%; visibility: visible;" href="<?php echo base_url(); ?>gambar/profil/<?php echo $this->session->userdata('foto') ?>" class="dropdown-item">
              <img class="profile-user-img img-fluid" style="height: 200px; min-width: 200px; object-fit: cover; border-radius: 50%;" src="<?php echo base_url(); ?>gambar/profil/<?php echo $this->session->userdata('foto') ?>"  alt="User Image">
              
              <h5 style="padding: 10px; align-items: center;">
                <?php echo $this->session->userdata('username') ?><br>
                  <small>Hak akses : <?php echo $this->session->userdata('level') ?></small>
              </h5>
            </a></center>
          <div class="row">
            <div class="col-6">
              <button class="btn btn-default btn-block tombol">
                <a style="color: black;" href="<?php echo base_url().'dashboard/profil' ?>" >
                  <i class="fas fa-image"> Profil</i>
                </a>
              </button>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <button class="btn btn-default btn-block tombol" data-toggle="modal" data-target="#modal-success" style="color: black;" onclick="logoutConfirm('<?php echo base_url().'dashboard/keluar' ?>')" ><i class="fas fa-share"> Keluar</i></button>
            </div>
            <!-- /.col -->
          </div>
        </div>
      </li>     
    </ul>
  </nav>
  