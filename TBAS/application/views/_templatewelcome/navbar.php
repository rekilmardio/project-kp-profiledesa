<?php $this->load->view("_templateadmin/head.php") ?>
<!-- ======= Header/ Navbar ======= -->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" style="font-size: 30px;" href="<?php echo base_url(); ?>"><?php echo $pengaturan->nama ?></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav nav nav-treeview">
          <li class="nav-item dropdown multi-level-dropdown">
            <a href="#" id="menu" data-toggle="dropdown" class="nav-link js-scroll dropdown-toggle">Menu Utama
            </a>
            <ul class="dropdown-menu" style="background-color: #80b3ff; border: none;">
              <li class="dropdown-item dropdown-submenu" style="font-weight: bold; color: white;">
                <i class="far fa-circle nav-icon"></i>
                <a data-toggle="dropdown" style="color: white;" class="dropdown-toggle" href="#">ProfilNagari</a>
                <ul class="dropdown-menu" style="background-color: #80b3ff; border: none;">
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('sejarah-tbas'); ?>">Sejarah</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('profil-wilayah'); ?>">Profil Wilayah</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('page/data-kependudukan'); ?>">Data Penduduk</a>
                  </li>
                </ul>
              </li>

              <li class="dropdown-item dropdown-submenu" style="font-weight: bold; color: white;">
                <i class="far fa-circle nav-icon"></i>
                <a data-toggle="dropdown" style="color: white;" class="dropdown-toggle" href="#">PemNagari</a>
                <ul class="dropdown-menu" style="background-color: #80b3ff; border: none;">
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('page/visi-dan-misi'); ?>">Visi dan misi</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('page/struktur-pemerintahan'); ?>">Struktur Pemerintahan</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('page/bpn'); ?>">Badan Permusyawaratan Nagari</a>
                  </li>
                </ul>
              </li>

              <li class="dropdown-item dropdown-submenu" style="font-weight: bold; color: white;">
                <i class="far fa-circle nav-icon"></i>
                <a data-toggle="dropdown" style="color: white;" href="#">LemMas</a>
                <ul class="dropdown-menu" style="background-color: #80b3ff; border: none;">
                  <li class=" dropdown-item" style="font-weight: bold; color: white; ">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('page/lpn'); ?>">LPN</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('karang-taruna'); ?>">Karang Taruna</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('pkk'); ?>">PKK</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('page/linmas-nagari'); ?>">LinMas Nagari</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link js-scroll dropdown-toggle" data-toggle="dropdown" href="#">Potensi Nagari
            </a>
            <ul class="dropdown-menu" style="background-color: #80b3ff; border: none;">
              <li class="dropdown-item dropdown-submenu" style="font-weight: bold; color: white;">
                <i class="far fa-circle nav-icon"></i>
                <a data-toggle="dropdown" style="color: white;" class="dropdown-toggle" href="#">Potensi Wisata</a>
                <ul class="dropdown-menu" style="background-color: #80b3ff; border: none;">
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('bukik-tanggaluang'); ?>">Bukik Tanggaluang</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('ngalau-katinuok'); ?>">Ngalau Katinuok</a>
                  </li>
                  <li class="dropdown-item" style="font-weight: bold; color: white;">
                    <i class="far fa-circle nav-icon"></i>
                    <a class="text-white w-100" href="<?php echo base_url('Lubuak-Lundang'); ?>">Lubuak Lundang</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown-item" style="font-weight: bold; color: white;">
                <i class="far fa-circle nav-icon"></i>
                <a style="color: white;" href="<?php echo base_url('sdm'); ?>">Potensi SDM</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url('blog'); ?>">Blog</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link js-scroll dropdown-toggle" data-toggle="dropdown" href="#">Lainnya
            </a>
            <ul class="dropdown-menu" style="background-color: #80b3ff; border: none;">
              <li class=" dropdown-item" style="font-weight: bold; color: white; ">
                <i class="far fa-circle nav-icon"></i>
                <a style="color: white;" href="<?php echo base_url('page/layanan'); ?>">Layanan</a>
              </li>
              <li class="dropdown-item" style="font-weight: bold; color: white;">
                <i class="far fa-circle nav-icon"></i>
                <a style="color: white;" href="<?php echo base_url('page/tentang-website'); ?>">Tentang</a>
              </li>
              <li class="dropdown-item" style="font-weight: bold; color: white;">
                <i class="far fa-circle nav-icon"></i>
                <a style="color: white;" href="<?php echo base_url('page/kontak-kami'); ?>">Kontak</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll scrollto" href="#footer">Hubungi Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url('login'); ?>">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>