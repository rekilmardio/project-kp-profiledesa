<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <!-- <img src="<?php //echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <?php $pengaturan = $this->m_data->get_data('pengaturan')->result(); 
        foreach($pengaturan as $p) {
      ?>

        <img src="<?php echo base_url().'/gambar/website/'.$p->logo; ?>" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light"><small>Profile</small><b>TBAS</b></span> -->
        <span class="brand-text font-weight-light"><?php echo $p->nama ?></span>

      <?php } ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          <img class="img-circle img-bordered-sm" style="height: 50px; min-width: 50px; object-fit: cover; border-radius: 50%;" src="<?php echo base_url(); ?>gambar/profil/<?php echo $this->session->userdata('foto') ?>"  alt="User Image">
        </div>
        <div class="info">
            <?php
              $id_user = $this->session->userdata('id');
              $user = $this->db->query("select * from user where user_id='$id_user'")->row();
            ?>
            <p class="d-block" style="color: white;"><?php echo $user->user_nama; ?></p>
          </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard' ?>"> 
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>DASHBOARD</p>
            </a>
          </li>

          <!-- Cek jika yang login adalah admin -->
        <?php if($this->session->userdata('level') == "admin"){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard/kategori'?>">
              <i class="nav-icon fas fa-th"></i>
              <p>KATEGORI</p>
            </a>
          </li>
        <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard/artikel' ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>ARTIKEL</p>
            </a>
          </li>

          <!-- Cek jika yang login adalah admin -->
        <?php if($this->session->userdata('level') == "admin"){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard/pages' ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>PAGES</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard/komentar' ?>">
              <i class="nav-icon fas fa-comment"></i>
              <span class="badge badge-danger navbar-badge">
                <!-- <?php 
                  // $query = $this->db->query("select count(komentar_id) as jumlah_komentar from komentar")->result();
                  // $hasil = mysqli_fetch_array($query);
                  // echo json_encode(array($hasil['jumlah_komentar']));
                  // }      
                //echo base_url().'dashboard/notif'

                ?> -->
                <?php echo isset($jumlah_komentar) ? $jumlah_komentar : 0 ; ?>
              </span>
              <p>KOMENTAR</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard/pengguna'?>">
              <i class="nav-icon fas fa-users"></i>
              <p>PENGGUNA & HAK AKSES</p>
            </a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard/pengaturan'?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>PENGATURAN WEBSITE</p>
            </a>
          </li>
        <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard/profil' ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>PROFIL</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard/ganti_password' ?>">
              <i class="nav-icon fas fa-lock"></i>
              <p>GANTI PASSWORD</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-sidebar" data-toggle="modal" data-target="#modal-success" onclick="logoutConfirm('<?php echo base_url().'dashboard/keluar' ?>')">
              <i class="nav-icon fas fa-share"></i>
              <p>KELUAR</p>
            </a>
          </li>
        </ul>
      </nav>
    </div> 
  </aside>
  <?php $this->load->view("_templateadmin/modal.php") ?>
 