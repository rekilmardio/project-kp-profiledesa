<!-- ======= Contact Section ======= -->
<section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(<?php echo base_url(); ?>assets_frontend/assets/img/overlay-bg.jpg); padding: 1rem 0 0 0;" >
  <div class="overlay-mf"></div>

  <div class="content" style="padding-left: 2.5rem">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4" style="color: white;">
          <?php 
            if (isset($_GET['alert'])) {
              if ($_GET['alert'] == "sukses") {
                echo "<div class='alert alert-success'>Terima Kasih telah memberikan kritik dan saran</div>";
              }
              else{
                echo "<div class='alert alert-danger'>Pastikan semua telah di isi!</div>";
              }
             } 
          ?>
          <p style="font-weight: 300;"><i>Silahkan tulis kritik dan saran. Gunakan bahasa yang santun yang mencerminkan prilaku berpendidikan.</i>
            <div class="line-mf" style="background-color: black; margin: 0px; width: 80px;"></div></p>

          <form method="post" action="<?php echo base_url('dashboard/komentar_aksi') ?>" enctype="multipart/form-data">
            <table border="0" cellpadding="7px">
              <tr>
                <td><b>Nama</b></td>
                <td>:</td>
                <td>
                  <input type="text" name="nama" class="form-control" placeholder="masukkan nama anda.." required="required">
                  <?php echo form_error('nama'); ?>
                </td>
              </tr>
              <tr>
                <td><b>Alamat Email</b></td>
                <td>:</td>
                <td>
                  <input type="text" name="email" class="form-control" placeholder="masukkan email anda.." required="required">
                  <?php echo form_error('email'); ?>
                </td>
              </tr>
              <tr>
                <td><b>Tulis Komentar</b></td>
                <td>:</td>
                <td>
                  <textarea class="form-control" name="komentar" required="required"></textarea>
                  <?php echo form_error('komentar'); ?>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><button type="submit" class="btn btn-primary btn-block">Kirim Komentar  <i class="fas fa-send"></i></button></td>
              </tr>
            </table>
          </form>
        </div>
        <div class="col-sm-4" style="color: white;"><br>
          <p style="font-weight: 600; size: 50px">HUBUNGI KAMI</p>
          <div class="line-mf" style="background-color: black; margin: 0px; width: 80px;"></div>
          <br>
          <table cellpadding="7px">
            <tr>
              <td><b>Nagari</b></td>
              <td>:</td>
              <td>Tanjung Bonai Aur Selatan</td>
            </tr>
            <tr>
              <td><b>Kecamatan</b></td>
              <td>:</td>
              <td>Sumpur Kudus</td>
            </tr>
            <tr>
              <td><b>Alamat</b></td>
              <td>:</td>
              <td>Jl Tugu Monumen Hari Jadi Kab. Sijunjung</td>
            </tr>
            <tr>
              <td><b>Phone</b></td>
              <td>:</td>
              <td>082170514612</td>
            </tr>
          </table>
        </div>
        <div class="col-sm-4" style="color: white;"><br>
          <p style="font-weight: 600; size: 50px;">WALI NAGARI/ KEPALA DESA</p>
          <div class="line-mf" style="background-color: black; margin: 0px; width: 80px;"></div>
          
          <table cellpadding="7px" align="center">
            <tr>
              <td>
                <center><img style="height: 200px; max-width: 200px; border-style: solid;" src="<?php echo base_url("gambar/foto_wali.jpg") ?>"></center>
              </td>
            </tr>
            <tr>
              <td>ABD.RAHMAN PETOSORI</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" style="padding: 10px 0;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="copyright-box" >
            <div class="socials">
              <ul>
                <li><a href="<?php echo $pengaturan->link_facebook ?>"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                <li><a href="<?php echo $pengaturan->link_instagram ?>"><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                <li><a href="<?php echo $pengaturan->link_twitter ?>"><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
              </ul>
            </div>
              <p class="copyright">&copy; Copyright <strong><?php echo $pengaturan->nama ?></strong>. Tanjung Bonai Aur Selatan 2021</p>
            <div class="credits">
              By RMP
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
</section>
