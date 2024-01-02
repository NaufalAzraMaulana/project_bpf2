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
                    <li>Detail Kursus</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-8">
                    <article class="blog-details">
                        <!-- <div class="post-img">
                            <img src="<?= base_url('assets/img/blog/' . $kursus['gambar']) ?>" alt="<?= $kursus['judul'] ?>" class="img-fluid">
                        </div> -->
                        <h2 class="title text-center"><?= $kursus['nama_kursus'] ?></h2>
                        <div class="meta-top text-center">
                            <ul>
                                <!-- <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2023-01-02"><?= $kursus['tanggal_publikasi'] ?></time></a></li> -->
                                <!-- Add other meta details as needed -->
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <p class="text-justify"><?= $kursus['deskripsi'] ?></p>
                        </div><!-- End post content -->
                        <div class="meta-bottom text-center">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#"><?= $kursus['bakat_required'] ?></a></li>
                            </ul>
                        </div><!-- End meta bottom -->
                    </article><!-- End blog post -->
                    <br><br>
                    <!-- Display Comments -->
                    
                </div>
            </div>
        </div>
    </section><!-- End Blog Details Section -->
</main><!-- End #main -->
