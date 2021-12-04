<!DOCTYPE html>
<html>
<head>
 	<?php $this->load->view("_templateadmin/head.php") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
			
		<!-- Preloader -->
		<?php $pengaturan = $this->m_data->get_data('pengaturan')->result(); 
        	foreach($pengaturan as $p) {
      	?>
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="<?php echo base_url().'/gambar/website/'.$p->logo; ?>" alt="" height="60" width="60">
		</div>
		<?php } ?>
		<!-- Prelorder end -->

 		<?php $this->load->view("_templateadmin/navbar.php") ?>
		<?php $this->load->view("_templateadmin/sidebar.php") ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Dashboard 			
					<small class="text-muted mt-3" style="font-size: 15px"> Kontrol Panel</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-6">
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo $jumlah_artikel ?></h3>
									<p>Jumlah Artikel</p>
								</div>
								<div class="icon">
									<i class="fas fa-list"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-green">
								<div class="inner">
									<h3><?php echo $jumlah_halaman ?></h3>
									<p>Jumlah Halaman/Page</p>
								</div>
								<div class="icon">
									<i class="fas fa-file"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-red">
								<div class="inner">
									<h3><?php echo $jumlah_kategori ?></h3>
										<p>Jumlah Kategori</p>
								</div>
								<div class="icon">
									<i class="fas fa-chart-pie"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-yellow">
								<div class="inner">
									<h3><?php echo $jumlah_pengguna ?></h3>
									<p>Jumlah Pengguna</p>
								</div>
								<div class="icon">
									<i class="fas fa-user-friends"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h3 class="card-title">
										Dashboard
									</h3>
								</div>
								<div class="card-body">
									<h3 align="center">Selamat Datang!</h3>
									<div class="table-responsive">
										<table class="table table-bordered table-hover">
											<tr>
												<th width="%">Nama</th>
												<th width="1px">:</th>
												<td>
													<?php
													$id_user = $this->session->userdata('id');
													$user = $this->db->query("select * from user where user_id='$id_user'")->row();
													?>
													<p><?php echo $user->user_nama; ?></p>
												</td>
											</tr>
											<tr>
												<th width="20%">Username</th>
												<th width="1px">:</th>
												<td>
													<?php echo $this->session->userdata('username') ?>
												</td>
											</tr>
											<tr>
												<th width="20%">Level</th>
												<th width="1px">:</th>
												<td>
													<?php echo $this->session->userdata('level') ?>
												</td>
											</tr>
											<tr>
												<th width="20%">Status</th>
												<th width="1px">:</th>
												<td>Aktif</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php $this->load->view("_templateadmin/footer.php") ?>
	<?php $this->load->view("_templateadmin/controlsidebar.php") ?>
	<?php $this->load->view("_templateadmin/js.php") ?>
</body>
</html>