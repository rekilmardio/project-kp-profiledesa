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
					<small class="text-muted mt-3" style="font-size: 15px"> Konfirmasi Hapus Pengguna</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<a href="<?php echo base_url().'dashboard/pengguna'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a><br>
							<div class="card-body">
								<p><b><?php echo $user_hapus->user_nama; ?></b> akan dihapus. dan semua artikel yang ditulis oleh <b><?php echo $user_hapus->user_nama; ?></b> akan dipindahkan ke ?</p>

								<form method="post" action="<?php echo base_url('dashboard/pengguna_hapus_aksi') ?>">
									<div class="card card-primary card-outline">
										<div class="card-body">
											<div class="form-group">
												<label>Nama Pengguna</label>
												<input type="hidden" name="user_hapus" value="<?php echo $user_hapus->user_id; ?>">
												<select class="form-control" name="user_tujuan" required="required">
													<option value="">-Pilih Level-</option>
													<?php foreach($user_lain as $ul){ ?>
													<option value="<?php echo $ul->user_id ?>"><?php echo $ul->user_nama; ?></option>
												<?php } ?>
												</select>
											</div>
										</div>
										<div class="card-footer">
											<input type="submit" class="btn btn-success" value="Hapus Pengguna dan Pindahkan Artikel">
										</div>
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