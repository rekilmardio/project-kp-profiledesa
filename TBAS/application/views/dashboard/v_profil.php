<!DOCTYPE html>
<html>
<head>
 	<?php $this->load->view("_templateadmin/head.php") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
 		<?php $this->load->view("_templateadmin/navbar.php") ?>
		<?php $this->load->view("_templateadmin/sidebar.php") ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Profil 			
					<small class="text-muted mt-3" style="font-size: 15px"> Update Profil Pengguna</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h3 class="card-title">
										Update Profile
									</h3>
								</div>
								<div class="card-body">
									<?php 
									if (isset($_GET['alert'])) {
									 	if ($_GET['alert'] == "sukses") {
									 		echo "<div class='alert alert-success'>Profil Telah di Update!</div>";
									 	}
									 } ?>

									 <?php foreach ($profil as $p){ ?>
									<form method="post" action="<?php echo base_url('dashboard/profil_update') ?>" enctype="multipart/form-data">
										<div class="card-body">
											<div class="form-group">
												<label>Nama</label>
												<input type="text" name="nama" class="form-control" placeholder="Masukkan nama.." value="<?php echo $p->user_nama; ?>">
												<?php echo form_error('nama'); ?>
											</div>
											<div class="form-group">
												<label>Email</label>
												<input type="text" name="email" class="form-control" placeholder="Masukkan email.." value="<?php echo $p->user_email; ?>">
												<?php echo form_error('email'); ?>
											</div>
											<div class="form-group">
												<label>Foto Profil</label>
												<input type="hidden" name="foto_old" value="<?php echo $p->user_foto ?>">
												<input type="file" name="user_foto" class="form-control">
												<?php 
													if(isset($gambar_error)){
														echo $gambar_error;
													} ?>
												<?php echo form_error('user_foto'); ?>			
											</div>
										</div>
										<div class="card-footer">
											<input type="submit" class="btn btn-success" value="Update">
										</div>									
									</form>
									<?php } ?>
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