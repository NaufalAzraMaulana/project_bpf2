<main id="main">
    <br>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Lowongan Kerja</h2>
                        <p>Jelajahi ratusan peluang pekerjaan dari berbagai industri dan tingkat pengalaman. Kami menyajikan informasi terkini tentang pasar kerja, memungkinkan Anda untuk menemukan pekerjaan yang sesuai dengan keahlian dan aspirasi Anda. Temukan pekerjaan impian Anda dan buat langkah pertama menuju kesuksesan bersama EduCareer!</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="<?= site_url('Pelamar/home') ?>">Beranda</a></li>
                    <li>Lowongan Kerja</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Lowongan Kerja Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                <div>
                    <ul class="portfolio-flters">
                    <li data-filter="*" class="filter-active"><a href="<?= base_url('pelamar/loker');?>"> Semua</a></li>
                        
                        <li data-filter=".filter-app"><a href="<?= base_url('Pelamar/rekomendasi_jobs/') ?>">Rekomendasi Job</a></li>
                        
                    </ul><!-- End Kursus Filters -->
                </div>

                <div class="row gy-4 portfolio-container">
                    <?php foreach ($jobs as $job) : ?>
                        <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <a href="<?= base_url('assets/img/' . $job['foto']); ?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="<?= base_url('assets/img/' . $job['foto']); ?>" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="<?= base_url('pelamar/detail_loker/' . $job['id']); ?>" title="More Details"><?= $job['posisi']; ?></a></h4>
                                    <p class="job-description"><?= $job['deskripsi_pekerjaan']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div><!-- End Kursus Container -->
            </div>
        </div>
    </section><!-- End Kursus Section -->
</main><!-- End #main -->