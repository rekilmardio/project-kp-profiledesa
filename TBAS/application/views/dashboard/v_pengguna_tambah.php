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
					Pengguna 			
					<small class="text-muted mt-3" style="font-size: 15px"> Tambah Pengguna</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<a href="<?php echo base_url().'dashboard/pengguna'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a><br><br/>
							<div class="card card-primary card-outline">
								<form method="post" action="<?php echo base_url('dashboard/pengguna_aksi') ?>" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group">
											<label>Nama</label>
											<input type="text" name="nama" class="form-control" placeholder="masukkan nama pengguna..">
											<?php echo form_error('nama'); ?>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="text" name="email" class="form-control" placeholder="masukkan email pengguna..">
											<?php echo form_error('email'); ?>
										</div>
										<div class="form-group">
											<label>Username</label>
											<input type="text" name="username" class="form-control" placeholder="masukkan username pengguna..">
											<?php echo form_error('username'); ?>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control" placeholder="masukkan password pengguna..">
											<?php echo form_error('password'); ?>
										</div>
										<div class="form-group">
											<label>Level</label>
											<select class="form-control" name="level">
												<option value="">-Pilih Level-</option>
												<option value="admin">Admin</option>
												<option value="penulis">Penulis</option>
											</select>
											<?php echo form_error('level'); ?>
										</div>
										<div class="form-group">
											<label>Status</label>
											<select class="form-control" name="status">
												<option value="">-Pilih Level-</option>
												<option value="1">Aktif</option>
												<option value="0">Non-Aktif</option>
											</select>
											<?php echo form_error('status'); ?>
										</div>
									</div>
									<div class="card-footer">
											<input type="submit" class="btn btn-success" value="Simpan">
									</div>
								</form>
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