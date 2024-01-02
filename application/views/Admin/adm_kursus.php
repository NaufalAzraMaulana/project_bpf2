<main id="main">
    <br>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Kursus</h2>
                        <p>Temukan peluang pendidikan terbaik untuk mengasah keterampilan dan meraih tujuan karir Anda. Kami menyediakan rangkaian kursus yang beragam, mulai dari keterampilan teknis hingga pengembangan kepemimpinan. Bergabunglah dengan ribuan peserta lainnya dan tingkatkan wawasan serta keterampilan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="<?= site_url('admin/home') ?>">Beranda</a></li>
                    <li>Kursus</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Kursus Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">
        <a href="<?= base_url('Admin/add_kursus') ?>" class="btn btn-sm btn-primary">Tambah</a>
        <br><br>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                <div>
                    <!-- <ul class="portfolio-flters">
                        <li data-filter="*" class="filter-active"><a href="<?= base_url('admin/kursus'); ?>"> Semua</a></li>
                        
                        <li data-filter=".filter-app"><a href="<?= base_url('Pelamar/rekomendasi_kursus/') ?>">Rekomendasi Kursus </a></li>
                        
                        <li data-filter=".filter-product">Kursus Terbaru</li>
                        <li data-filter=".filter-branding">Kursus On-Progress</li>
                        <li data-filter=".filter-books">Selesai</li>
                    </ul>End Kursus Filters -->
                </div>

                <div class="portfolio-container">
                    <?php foreach ($Kursus_list as $kursus) : ?>
                        <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <a href="<?= base_url('admin/detail_kursus/') . $kursus->id ?>" data-gallery="portfolio-gallery-app" class="glightbox">
                                    <img src="<?= base_url('assets/') ?>img/portfolio/app-<?= $kursus->id ?>.jpg" class="img-fluid" alt="">
                                </a>
                                <div class="portfolio-info">
                                    <h4><a href="<?= base_url('admin/detail_kursus/') . $kursus->id ?>" title="More Details"><?= $kursus->nama_kursus ?></a></h4>
                                    <p><?= $kursus->bakat_required ?></p>

                                    <!-- Button Edit dan Delete -->
                                    <div class="mt-3">
                                        <a href="<?= base_url('admin/edit_kursus/'. $kursus->id )?>" class="btn btn-sm btn-success">Edit</a>
                                        <button class="btn btn-sm btn-danger" onclick="showDeleteConfirmation(<?= $kursus->id ?>)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Kursus Item -->
                    <?php endforeach; ?>
                </div><!-- End Kursus Container -->


            </div>

        </div>

    </section><!-- End Kursus Section -->


</main><!-- End #main -->
<script>
    function showDeleteConfirmation(id) {
        Swal.fire({
            title: 'Yakin mau hapus?',
            text: 'Kalau iya, nanti terhapus lho :(',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Terhapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete URL if the user clicks "Yes"
                window.location.href = '<?= base_url('admin/delete_kursus/') ?>' + id;
            }
        });
    }
</script>