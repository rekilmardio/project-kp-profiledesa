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
					Pengaturan 			
					<small class="text-muted mt-3" style="font-size: 15px"> Update Pengaturan Website</small>
				</h1>
			</section>

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<?php foreach ($pengaturan as $p){ ?>
							<form method="post" action="<?php echo base_url('dashboard/pengaturan_update') ?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6">
										<div class="card card-primary card-outline">
											<div class="card-header" style="color: red;">
												<h5>
													<b>Warning !!</b>
												</h5>
												<p >Harap lebih diperhatikan jika ingin mengubah pengaturan website.</p>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>Nama Website</label>
													<input type="text" name="nama" class="form-control" placeholder="Masukkan nama website.." value="<?php echo $p->nama; ?>">
													<?php echo form_error('nama'); ?>
												</div>
												<div class="form-group">
													<label>Deskripsi Website</label>
													<input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi.." value="<?php echo $p->deskripsi; ?>">
													<?php echo form_error('deskripsi'); ?>
												</div>
												<hr>
												<div class="form-group">
													<label>Logo Website</label>
													<input type="hidden" name="logo_old" value="<?php echo $p->logo ?>">
													<input type="file" name="logo" ><br>
													<small>kosongkan jika tidak ingin mengubah logo</small>
												</div>
												<hr>
												<small>kosongkan jika tidak ingin mengubah Gambar</small>
												<div class="form-group">
													<label>Gambar Carousel 0</label>
													<input type="hidden" name="carousel_0_old" value="<?php echo $p->carousel_0 ?>">
													<input type="file" name="carousel_0" ><br>
												</div>
												<hr>
												<div class="form-group">
													<label>Gambar Carousel 1</label>
													<input type="hidden" name="carousel_1_old" value="<?php echo $p->carousel_1 ?>">
													<input type="file" name="carousel_1" ><br>
												</div>
												<hr>
												<div class="form-group">
													<label>Gambar Carousel 2</label>
													<input type="hidden" name="carousel_2_old" value="<?php echo $p->carousel_2 ?>">
													<input type="file" name="carousel_2" ><br>
												</div>
												<hr>
												<div class="form-group">
													<label>Link Facebook</label>
													<input type="text" name="link_facebook" class="form-control" placeholder="Masukkan link facebook.." value="<?php echo $p->link_facebook; ?>">
													<?php echo form_error('link_facebook'); ?>
												</div>
												<div class="form-group">
													<label>Link Instagram</label>
													<input type="text" name="link_instagram" class="form-control" placeholder="Masukkan link instagram.." value="<?php echo $p->link_instagram; ?>">
													<?php echo form_error('link_instagram'); ?>
												</div>
												<div class="form-group">
													<label>Link Twitter</label>
													<input type="text" name="link_twitter" class="form-control" placeholder="Masukkan link instagram.." value="<?php echo $p->link_twitter; ?>">
													<?php echo form_error('link_twitter'); ?>
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" placeholder="Masukkan email.." value="<?php echo $p->email; ?>">
													<?php echo form_error('email'); ?>
												</div>
											</div>
											<div class="card-footer">
												<input type="submit" class="btn btn-success" value="Simpan">
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="card card-primary card-outline">
											<div class="card-body">
												<table class="table" border="0">
													
														<tr align="center">
															<th>Logo Sekarang</th>
														</tr>
														<tr>
															<td align="center">
																<img align="center" width="70%" class="img-responsive" src="<?php echo base_url('/gambar/website/'.$p->logo) ?>">
															</td>
														</tr>
														<tr align="center">
															<th>Gambar Carousel 0</th>
														</tr>
														<tr>
															<td align="center">
																<img width="100%" class="img-responsive" src="<?php echo base_url('/gambar/website/'.$p->carousel_0) ?>">
															</td>
														</tr>
														<tr align="center">
															<th>Gambar Carousel 1</th>
														</tr>
														<tr>
															<td align="center">
																<img width="100%" class="img-responsive" src="<?php echo base_url('/gambar/website/'.$p->carousel_1) ?>">
															</td>
														</tr>
														<tr align="center">
															<th>Gambar Carousel 2</th>
														</tr>
														<tr>
															<td align="center">
																<img width="100%" class="img-responsive" src="<?php echo base_url('/gambar/website/'.$p->carousel_2) ?>">
															</td>
														</tr>
												</table>
											</div>
										</div>
									</div>
								</div>								
							</form>
							<?php } ?>
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