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
					Komentar 			
					<small class="text-muted mt-3" style="font-size: 15px"> Kritik dan Saran dari pengunjung website</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="card card-primary card-outline">
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<tr align="center">
												<th width="1%">NO</th>
												<th>Tanggal</th>
												<th>Nama</th>
												<th>Alamat Email</th>
												<th>Isi Komentar</th>
												<th>Status Komentar</th>
												<th width="12%">OPSI</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach($komentar as $k){
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo date('d/m/Y H:i', strtotime($k->komentar_tanggal)); ?></td>
												<td><?php echo $k->komentar_nama; ?></td>
												<td><?php echo $k->komentar_email; ?></td>
												<td><?php echo $k->komentar_isi; ?></td>
												<td style="text-align: center;">
													<b><?php 
													if($k->komentar_status == 1){
														echo "<p>Telah dibaca</p>";
													}else{
														echo "<p>Belum dibaca</p>";
													} ?></b>
													<form method="post" action="<?php echo base_url('dashboard/komentar_update') ?>">
														<div class="form-group">
															<input type="hidden" name="id" value="<?php echo $k->komentar_id; ?>">
															<select class="form-control" name="status">
																<option>-Ubah Status-</option>
																<option <?php if($k->komentar_status == "1"){ echo "selected='selected'";} ?> value="1">Telah dibaca</option>
																<option <?php if($k->komentar_status == "0"){ echo "selected='selected'";} ?> value="0">Belum dibaca</option>
															</select>
															<?php echo form_error('status'); ?>

															<button type="submit" class="btn btn-block btn-outline-secondary btn-sm"><i class="fas fa-edit"></i>Ubah</button>
														</div>
													</form>
												</td>
												<td align="center">
													<a onclick="deleteConfirm('<?php echo base_url().'dashboard/komentar_hapus/'.$k->komentar_id; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view("_templateadmin/modal.php") ?>				
			</section>
		</div>
	</div>
	<?php $this->load->view("_templateadmin/footer.php") ?>
	<?php $this->load->view("_templateadmin/controlsidebar.php") ?>
	<?php $this->load->view("_templateadmin/js.php") ?>
</body>
</html>