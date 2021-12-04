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
					<small class="text-muted mt-3" style="font-size: 15px"> Update Pengguna</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<a href="<?php echo base_url().'dashboard/kategori'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a><br><br/>
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h3 class="card-title">
										Pengguna
									</h3>
								</div>
								<div class="card-body">
									<?php foreach ($pengguna as $p){ ?>
									<form method="post" action="<?php echo base_url('dashboard/pengguna_update') ?>">
										<div class="card-body">
											<div class="form-group">
												<label>Nama Pengguna</label>
												<input type="hidden" name="id" value="<?php echo $p->user_id; ?>">
												<input type="text" name="nama" class="form-control" placeholder="Masukkan nama pengguna.." value="<?php echo $p->user_nama; ?>">
												<?php echo form_error('nama'); ?>
											</div>
											<div class="form-group">
												<label>Email pengguna</label>
												<input type="text" name="email" class="form-control" placeholder="Masukkan email pengguna.." value="<?php echo $p->user_email; ?>">
												<?php echo form_error('email'); ?>
											</div>
											<div class="form-group">
												<label>Username Pengguna</label>
												<input type="text" name="username" class="form-control" placeholder="Masukkan username pengguna.." value="<?php echo $p->user_username; ?>">
												<?php echo form_error('username'); ?>
											</div>
											<div class="form-group">
												<label>Password Pengguna</label>
												<input type="password" name="password" class="form-control" placeholder="Masukkan password pengguna..">
												<?php echo form_error('password'); ?>
												<small>kosongkan jika tidak ingin mengganti pasword!</small>
											</div>
											<div class="form-group">
												<label>Level Pengguna</label>
												<select class="form-control" name="level">
													<option value="">-Pilih Level-</option>
													<option <?php if($p->user_level == "admin"){ echo "selected='selected'";} ?> value="admin">Admin</option>
													<option <?php if($p->user_level == "penulis"){ echo "selected='selected'";} ?> value="penulis">Penulis</option>
												</select>
												<?php echo form_error('level'); ?>
											</div>
											<div class="form-group">
												<label>Status pengguna</label>
												<select class="form-control" name="status">
													<option value="">-Pilih Status-</option>
													<option <?php if($p->user_status == "1"){ echo "selected='selected'";} ?> value="1">Aktif</option>
													<option <?php if($p->user_status == "0"){ echo "selected='selected'";} ?> value="0">Non-Aktif</option>
												</select>
												<?php echo form_error('status'); ?>
											</div>
										</div>
										<div class="card-footer">
											<input type="submit" class="btn btn-success" value="Simpan">
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