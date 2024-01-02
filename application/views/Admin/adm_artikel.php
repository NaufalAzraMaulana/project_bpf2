<main id="main">
    <br>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Artikel</h2>
                        <p>Temukan wawasan mendalam tentang tren industri, panduan karir, dan tips sukses. Dari pembelajaran keterampilan kunci hingga pemahaman mendalam tentang perubahan pasar kerja. Teruslah membaca, teruslah berkembang, dan temukan inspirasi untuk memajukan pendidikan dan karir Anda.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="<?= site_url('Admin/home') ?>">Beranda</a></li>
                    <li>Artikel</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <a href="<?= base_url('Admin/add_article') ?>" class="btn btn-sm btn-primary">Tambah</a>
            <br><br>

            <div class="row gy-4 posts-list">
                <?php foreach ($articles as $article) : ?>
                    <div class="col-xl-4 col-md-6">

                        <article>

                            <div class="post-img">
                                <img src="<?= base_url('assets/img/blog/' . $article['gambar']) ?>" alt="<?= $article['judul'] ?>" class="img-fluid">
                            </div>

                            <p class="post-category"><?= $article['jenis'] ?></p>

                            <h2 class="title">
                                <a href="<?= base_url('Admin/detail_artikel/' . $article['id']) ?>">
                                    <?= $article['judul'] ?>
                                </a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <div class="post-meta">
                                    <p><?= $article['Hari'] ?></p>
                                    <p class="post-date">
                                        <time datetime="<?= date('Y-m-d', strtotime($article['tanggal_publikasi'])) ?>">
                                            <?= date('d M Y', strtotime($article['tanggal_publikasi'])) ?>
                                        </time>
                                    </p>
                                </div>
                                <!-- Tombol Edit dan Delete -->

                            </div>
                            <div class="ml-auto">
                                <!-- <a href="<?= base_url('Admin/add_article/' . $article['id']) ?>" class="btn btn-sm btn-primary">Tambah</a> -->
                                <a href="<?= base_url('Admin/edit_artikel/' . $article['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger" onclick="showDeleteConfirmation(<?= $article['id'] ?>)">Delete</a>
                            </div>
                        </article>
                    </div><!-- End post list item -->
                <?php endforeach; ?>
            </div><!-- End blog posts list -->

            <div class="blog-pagination">
                <ul class="justify-content-center">
                    <li><a href="#">
                            < </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">></a></li>
                </ul>
            </div><!-- End blog pagination -->

        </div>
    </section><!-- End Blog Section -->
</main><!-- End #main -->

<script>
    function showDeleteConfirmation(articleId) {
        Swal.fire({
            title: 'Yakin mau hapus?',
            text: 'Kalau iya, nanti data akan terhapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete article URL if the user clicks "Yes"
                window.location.href = '<?= base_url("Admin/delete_article/") ?>' + articleId;
            }
        });
    }
</script>