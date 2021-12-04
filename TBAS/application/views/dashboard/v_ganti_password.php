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
					Ganti Password 			
					<small class="text-muted mt-3" style="font-size: 15px"> Ubah password anda</small>
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
										Ubah Password
									</h3>
								</div>
								<form method="post" action="<?php echo base_url('dashboard/ganti_password_aksi') ?>">
									<div class="card-body">
										<?php 
										if(isset($_GET['alert'])){
											if($_GET['alert'] == "sukses"){
												echo "<div class='alert alert-success font-weight-bold text-center'> Password telah diubah!</div>";
											}else if($_GET['alert'] == "gagal"){
												echo "<div class='alert alert-danger font-weight-bold text-center'>
												Maaf, password lama yang anda masukkan salah!</div>";
											}
										}
										?>
										<div class="form-group">
											<label>Password Lama</label>
											<input type="password" name="password_lama" class="form-control" placeholder="Masukkan password lama anda..">
											<?php echo form_error('password_lama') ?>
										</div>
										<div class="form-group">
											<label>Password Baru</label>
											<input type="password" name="password_baru" class="form-control" placeholder="Masukkan password baru min 8 char..">
											<?php echo form_error('password_baru') ?>
										</div>
										<div class="form-group">
											<label>Konfirmasi Password Baru</label>
											<input type="password" name="konfirmasi_password" class="form-control" placeholder="Ulangi password baru..">
											<?php echo form_error('konfirmasi_password') ?>
										</div>
									</div>
									<div class="card-footer">
										<input type="submit" class="btn btn-primary" value="Ganti Password">
									</div>
								</form>
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