<main id="main">
    <br>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Detail Kursus</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?= site_url('Pelamar/home') ?>">Beranda</a></li>
            <li>Detail Lowongan Kerja</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Loker Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-center mt-4">
          <img src="<?= base_url('assets/img/' . $job['foto']); ?>" alt="" style="height: 500px;">
        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
            <h2><?= $job['posisi']; ?></h2>
              <h5>Deskripsi Pekerjaan :</h5>
              <p><?= $job['deskripsi_pekerjaan']; ?></p>
              <h5>Kriteria Pelamar :</h5>
              <p><?= $job['kriteria']; ?></p>

              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <?= $job['deskripsi_perusahaan']; ?>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Informasi Pekerjaan</h3>
              <ul>
                <li><strong>Perusahaan</strong> <span><?= $job['perusahaan']; ?></span></li>
                <li><strong>Posisi</strong> <span><?= $job['posisi']; ?></span></li>
                <li><strong>Lokasi</strong> <span><?= $job['lokasi_kerja']; ?></span></li>
                <li><strong>Kategori</strong> <span><?= $job['kategori']; ?></span></li>
                <li><strong>Jam Kerja/Hari</strong> <span><?= $job['jam_kerja']; ?> Jam</span></li>
                <li><strong>Gaji</strong> <span>Rp.<?= $job['gaji']; ?></span></li>
                <li><strong>Tipe Pekerjaan</strong> <span><?= $job['tipe_kerja']; ?></span></li>
                <li><a href="<?= $job['link']; ?>" class="btn-visit align-self-start" target="_blank">Lihat Pekerjaan</a></li>

              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->