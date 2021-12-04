<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("_templatewelcome/head.php") ?>
</head>
<body id="page-top">
  <?php $this->load->view("_templatewelcome/navbar.php") ?>
    
    <!-- ======= Intro Section ======= -->
    <div id="home" class="intro intro-single route bg-image" style="background-image: url(<?php echo base_url();?>assets_frontend/assets/img/overlay-bg.jpg)">
        <div class="overlay-mf"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <h2 class="intro-title mb-4">Pencarian</h2>
            <ol class="breadcrumb d-flex justify-content-center">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>">Home</a>
              </li>
              <li class="breadcrumb-item">
								<a href="<?php echo base_url('blog'); ?>">Cari</a>
							</li>
              <li class="breadcrumb-item active"><?php echo $cari ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--/ Intro section End /-->

    <!--/ Section Blog-Single Star /-->
		<section style="background-color: #fafafa;" class="blog-wrapper sect-pt4" id="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php if(count($artikel) == 0){ ?>
							<center>
								<h3 class="mt-5">Hasil Pencarian Tidak Ditemukan.</h3>
							</center>
						<?php } ?>
							<?php foreach($artikel as $a){ ?>
							<div class="post-box">
								<div class="post-thumb">
									<?php if($a->artikel_sampul != ""){ ?>
										<img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="<?php echo $a->artikel_judul ?>" class="img-fluid">
									<?php } ?>
								</div>
								<div class="post-meta">
									<h1 class="article-title"><a href="<?php echo base_url().$a->artikel_slug ?>"><?php echo $a->artikel_judul ?></a></h1>
									<ul>
										<li>
											<span class="ion-ios-person"></span>
											<a href="#"><?php echo $a->user_nama ?></a>
										</li>
										<li>
											<span class="ion-pricetag"></span>
											<a href="#"><?php echo $a->kategori_nama ?></a>
										</li>
									</ul>
								</div>
						</div>
						<?php } ?>
						<!-- membuat tombol halaman pagination -->
						<?php echo $this->pagination->create_links(); ?>
					</div>
					<div class="col-md-4">
						<?php $this->load->view('_templatewelcome/sidebar.php'); ?>
					</div>
				</div>
			</div>
		</section>

    <?php $this->load->view("_templatewelcome/footer.php") ?>
  <?php $this->load->view("_templatewelcome/js.php") ?>
</body>
</html>