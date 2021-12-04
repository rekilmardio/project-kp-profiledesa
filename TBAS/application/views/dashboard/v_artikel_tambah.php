<!DOCTYPE html>
<html>
<head>
 	<?php $this->load->view("_templateadmin/head_editor.php") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
 		<?php $this->load->view("_templateadmin/navbar.php") ?>
		<?php $this->load->view("_templateadmin/sidebar.php") ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Artikel 			
					<small class="text-muted mt-3" style="font-size: 15px"> Tulis Artikel Baru</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<a href="<?php echo base_url().'dashboard/artikel'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a><br><br/>
					
					<form method="post" action="<?php echo base_url('dashboard/artikel_aksi') ?>" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-9">
								<div class="card card-primary card-outline">
									<div class="card-body">
										<div class="form-group">
											<label>Judul</label>
											<input type="text" name="judul" class="form-control" placeholder="masukkan judul artikel.." value="<?php echo set_value('judul'); ?>"><br>
											<?php echo form_error('judul'); ?>
										</div>
										<div class="form-group">
											<label>Konten</label>
											<?php echo form_error('konten'); ?>
											<br>
											<textarea class="form-control" id="summernote" name="konten" ><?php echo set_value('konten'); ?></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="card card-primary card-outline">
									<div class="card-body">
										<div class="form-group">
											<label>Kategori</label>
											<select class="form-control" name="kategori">
												<option value="">- Pilih kategori</option>
												<?php foreach ($kategori as $k) {?>
													<option <?php if(set_value('kategori')==$k->kategori_id){echo "selected='selected'";} ?> value="<?php echo $k->kategori_id ?>"><?php echo $k->kategori_nama; ?></option>
												<?php } ?>
											</select>
											<?php echo form_error('kategori') ?>
										</div>
										<br>
										<div class="form-group">
											<label>Gambar Sampul</label>
											<input type="file" name="sampul"><br>
											<?php 
											if(isset($gambar_error)){
												echo $gambar_error;
											} ?>
											<?php echo form_error('sampul'); ?>
										</div>
										<br>
										<input type="submit" name="status" value="Draft" class="btn btn-warning btn-block">
										<input type="submit" name="status" value="Publish" class="btn btn-success btn-block">
									</div>
								</div>
							</div>
						</div>								
					</form>
				</div>
			</section>
		</div>
	</div>
	<?php $this->load->view("_templateadmin/footer.php") ?>
	<?php $this->load->view("_templateadmin/controlsidebar.php") ?>
	<?php $this->load->view("_templateadmin/js_editor.php") ?>
</body>
</html>