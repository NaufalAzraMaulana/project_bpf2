<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EduCareer : Empowering Futures</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/') ?>img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/') ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/') ?>css/main.css" rel="stylesheet">
  <!-- Add this in the head section of your HTML -->
</head>

<body>
  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <h1>EduCareer<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= base_url('pelamar/home')?>">Beranda</a></li>
          <li><a href="<?= base_url('pelamar/artikel')?>">Artikel</a></li>
          <li><a href="<?= base_url('pelamar/kursus')?>">Kursus</a></li>
          <li><a href="<?= base_url('pelamar/loker')?>">Lowongan Kerja</a></li>
          <li class="dropdown"><a href="#"><span>Setting</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?= base_url('pelamar/profile')?>">User Profile</a></li>
              <li><a href="#" onclick="showLogoutConfirmation()">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <script>
  function showLogoutConfirmation() {
    Swal.fire({
      title: 'yakinn mau Logout??',
      text: 'Kalau iya kamu bakal logout deh:(',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, logout!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect to logout URL if the user clicks "Yes"
        window.location.href = '<?= base_url('auth/logout') ?>';
      }
    });
  }
</script>