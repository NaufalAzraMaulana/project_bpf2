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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  <style>
    .btn-submit {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      background-color: #28a745;
      /* Green color */
      color: #fff;
      /* White text */
      transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
      background-color: #218838;
      /* Darker green color on hover */
    }

    /* Add this style to enhance the dropdown menu */
    .dropdown-menu {
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
      padding: 10px 20px;
      font-size: 14px;
      color: #000;
      /* Black text */
      transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
      background-color: #f8f9fa;
      /* Light gray background on hover */
    }

    /* Add these styles to your existing CSS file or create a new one */

/* Profile Card Styles */
.profile-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

/* Profile Image Styles */
.profile-image {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 15px;
}

/* Profile Name Styles */
.profile-name {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

/* Profile Email and Skill Styles */
.profile-email,
.profile-skill {
    font-size: 16px;
    color: #666;
    margin-bottom: 8px;
}

#footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    
    padding: 20px 0; /* Adjust the padding as needed */
    text-align: center;
}


  </style>
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
          <li><a href="#">Artikel</a></li>
          <li><a href="#">Kursus</a></li>
          <li><a href="#">Lowongan Kerja</a></li>
          <li>
            <div class="dropdown">
              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent; border: none;">
                Setting
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?= base_url('pelamar/profile')?>" style="color:#000;padding: 10px 20px; font-size: 14px;">User Profile</a>
                <a class="dropdown-item" href="#" onclick="showLogoutConfirmation()" style="color:#000;padding: 10px 20px; font-size: 14px;">Logout</a>

              </div>
            </div>

          </li>
        </ul>
      </nav>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <!-- Add this in the script section of your HTML -->
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
