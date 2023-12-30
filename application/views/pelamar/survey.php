<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EduCareer : Empowering Futures</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/'); ?>img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/'); ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/'); ?>css/main.css" rel="stylesheet">

  <style>
    .container.mt-4 {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      /* Center-align text */
    }

    .copyright,
    .credits {
      margin-top: 10px;
      /* Add some space between the elements */
    }
  </style>
</head>

<body>

  <!-- ======= Our Services Section ======= -->
  <section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>First Survey</h2>
        <h3>Apa Bakat atau bidang yang pernah kamu pelajari dan kuasai??</h3>
      </div>

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-laptop"></i>
            </div>
            <h3>Teknologi Informasi</h3>
            <!-- Form for Teknologi Informasi -->
            <form action="<?= base_url('Pelamar/save_talent') ?>" method="post">
              <input type="hidden" name="talent" value="Teknologi Informasi">
              <button type="submit" class="btn btn-primary">Select</button>
            </form>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-flower1"></i>
            </div>
            <h3>Pertanian</h3>
            <form action="<?= base_url('Pelamar/save_talent') ?>" method="post">
              <input type="hidden" name="talent" value="Pertanian">
              <button type="submit" class="btn btn-primary">Select</button>
            </form>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-cash-coin"></i>
            </div>
            <h3>Keuangan</h3>
            <form action="<?= base_url('Pelamar/save_talent') ?>" method="post">
              <input type="hidden" name="talent" value="Keuangan">
              <button type="submit" class="btn btn-primary">Select</button>
            </form>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-building-up"></i>
            </div>
            <h3>Infrastuktur atau Sipil</h3>
            <form action="<?= base_url('Pelamar/save_talent') ?>" method="post">
              <input type="hidden" name="talent" value="Infrastruktur dan Sipil">
              <button type="submit" class="btn btn-primary">Select</button>
            </form>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-shop"></i>
            </div>
            <h3>Pemasaran</h3>
            <form action="<?= base_url('Pelamar/save_talent') ?>" method="post">
              <input type="hidden" name="talent" value="Pemasaran">
              <button type="submit" class="btn btn-primary">Select</button>
            </form>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-gear-fill"></i>
            </div>
            <h3>Otomotif</h3>
            <form action="<?= base_url('Pelamar/save_talent') ?>" method="post">
              <input type="hidden" name="talent" value="Otomotif">
              <button type="submit" class="btn btn-primary">Select</button>
            </form>
          </div>
        </div><!-- End Service Item -->

      </div>
      <div class="d-flex justify-content-end mt-4">
    <a href="<?= base_url('pelamar/home')?>" class="btn btn-success btn-submit">Submit</a>
  </div>
    </div>
  </section><!-- End Our Services Section -->


  <div class="container mt-4">
    <div class="copyright">
      &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by Tasyamanda & Naufal Azra
    </div>
  </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/'); ?>js/main.js"></script>

</body>

</html>