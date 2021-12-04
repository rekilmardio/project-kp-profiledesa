<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("_templatewelcome/head.php") ?>
</head>
<body id="page-top">
  <?php $this->load->view("_templatewelcome/navbar.php") ?>
    <?php $this->load->view("_templatewelcome/intro.php") ?>
      <main id="main">
        <br>

        <!-- ======= Blog Section ======= -->
        <section style="background-color: #fafafa;" id="blog" class="blog-mf sect-pt4 route">
          <div class="container">
            <div class="row">
              <?php foreach($artikel as $a) { ?>
              <div class="col-md-4">
                <div class="card card-blog">
                  <div class="card-img">
                    <a href="<?php echo base_url().$a->artikel_slug ?>">
                      <?php if($a->artikel_sampul != ""){ ?><center>
                        <img style="height: 300px; min-width: 150px; visibility: visible; " src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="" class="img-fluid"></center>
                      <?php } ?>
                    </a>
                  </div>
                  <div class="card-body" style="height: 100px;">
                    <div class="card-category-box">
                      <div class="card-category">
                        <h6 class="category"><?php echo $a->kategori_nama ?></h6>
                      </div>
                    </div>
                    <h3 class="card-title"><a href="<?php echo base_url().$a->artikel_slug ?>"><?php 

                    $string = $a->artikel_judul;
                    $str_length = 6; 
                    $string = explode(" ", trim($string));
                    $string = array_slice($string, 0, $str_length);
                    if (count($string) > $str_length) {
                      array_push($string, " ...");
                    }
                    
                    $string = implode(" ", $string);

                    echo $string;


                     ?></a></h3>
                    
                  </div>
                  <div class="card-footer">
                    <div class="post-author">
                      <a href="#">
                        <span class="author"><?php echo $a->user_nama; ?></span>
                      </a>
                    </div>
                    <div class="post-date">
                      <span class="ion-ios-clock-outline"></span> <?php echo date('d-M-Y', strtotime($a->artikel_tanggal)); ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="title-box text-center">
                  <p style="font-weight: 400; font-size: 30px">Artikel terbaru</p>
                  <div class="line-mf"></div>
                </div>
              </div>
            </div>
          </div>
        </section><!-- End Blog Section -->

        <br>
        <section style="background-color: #fafafa;" class="content">
          <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="text-center">
                    <div class="line-mf"></div>
                    <p style="font-weight: 400; font-size: 25px">Peta Desa</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d232912.12726316758!2d100.75378257743996!3d-0.5658102643770924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stanjung%20bonai%20aur%20selatan!5e1!3m2!1sen!2sid!4v1623209593774!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
                </div>
                       
                <div class="col-md-6" style="padding-right: 50px"><br><br>
                  <div class="text-center">
                    <p style="font-weight: 1000;">Batas Nagari Tanjung Bonai Aur Selatan adalah sebagai berikut :</p>
                    <div class="line-mf"></div><br>
                  </div>
                  <p>
                    1. Sebelah Utara berbatasan dengan Nagari Tanjung Bonai Aur dan Nagari Tanjung Labuah Kecamatan Sumpur Kudus.<br><br>
                    2.  Sebelah Selatan berbatasan dengan Nagari Guguk dan Nagari Padang Lawas Kecamatan Koto VII.<br><br>
                    3.  Sebelah Barat berbatasan dengan Nagari Kumanis Kecamatan Sumpur Kudus.<br><br>
                    4.  Sebelah Timur berbatasan dengan Nagari Sisawah dan Tamparungo Kecamatan Sumpur Kudus.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
      
      </main>
    <?php $this->load->view("_templatewelcome/footer.php") ?>
  <?php $this->load->view("_templatewelcome/js.php") ?>
</body>
</html>