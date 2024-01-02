<main id="main">
    <br>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Detail Artikel</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="<?= site_url('Pelamar/home') ?>">Beranda</a></li>
                    <li>Detail Artikel</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-8">
                    <article class="blog-details">
                        <div class="post-img">
                            <img src="<?= base_url('assets/img/blog/' . $article['gambar']) ?>" alt="<?= $article['judul'] ?>" class="img-fluid">
                        </div>
                        <h2 class="title"><?= $article['judul'] ?></h2>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2023-01-02"><?= $article['tanggal_publikasi'] ?></time></a></li>
                                <!-- Add other meta details as needed -->
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <p><?= $article['isi'] ?></p>
                        </div><!-- End post content -->
                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#"><?= $article['jenis'] ?></a></li>
                            </ul>
                        </div><!-- End meta bottom -->
                    </article><!-- End blog post -->
                    <br><br>
                    <!-- Display Comments -->
                    <div class="comments">
                        <h4 class="comments-count"><?= count($comments) ?> Comments</h4>
                        <?php foreach ($comments as $comment) : ?>
                            <div id="comment-<?= $comment['id'] ?>" class="comment">
                                <div class="comment-header">
                                    <h5><?= $comment['nama'] ?></h5>
                                    <span class="comment-date"><?= $comment['created_at'] ?></span>
                                </div>
                                <p><?= $comment['comment'] ?></p>
                            </div><!-- End comment #<?= $comment['id'] ?> -->
                        <?php endforeach; ?>

                        <!-- Comment Form -->
                        <div class="reply-form">
                            <h4>Tinggalkan Komentar</h4>
                            <p>Alamat email Anda tidak akan dipublikasikan. Bidang yang harus diisi ditandai *</p>
                            <form action="<?= site_url('Pelamar/tambah_komentar') ?>" method="post">
                                <input type="hidden" name="article_id" value="<?= $article['id'] ?>">

                                <!-- Ambil pelamar_id dari sesi -->
                                <input type="hidden" name="pelamar_id" value="<?= $this->session->userdata('pelamar_id') ?>">

                                <div class="row">
                                    <div class="col form-group">
                                        <textarea name="comment" class="form-control" placeholder="Komentar Anda*"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                            </form>
                        </div>
                    </div><!-- End blog comments -->
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Sidebar search form -->
                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Cari</h3>
                            <form action="<?= site_url('Pelamar/cari_artikel') ?>" method="post" class="mt-3">
                                <input type="text" name="keyword" placeholder="Kata kunci">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Kategori</h3>
                            <ul class="mt-3">
                                <?php foreach ($categories as $category) : ?>
                                    <li><a href="<?= site_url('Pelamar/artikel_by_category/' . urlencode($category['jenis'])) ?>"><?= $category['jenis'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <!-- Sidebar recent posts -->
                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Artikel Terbaru</h3>
                            <div class="mt-3">
                                <?php foreach ($recent_articles as $recent_article) : ?>
                                    <div class="post-item mt-3">
                                        <img src="<?= base_url('assets/') ?>img/blog/<?= $recent_article['gambar'] ?>" alt="">
                                        <div>
                                            <h4><a href="<?= site_url('Pelamar/detail_artikel/' . $recent_article['id']) ?>"><?= $recent_article['judul'] ?></a></h4>
                                            <time datetime="<?= $recent_article['tanggal_publikasi'] ?>"><?= $recent_article['tanggal_publikasi'] ?></time>
                                        </div>
                                    </div><!-- End recent post item-->
                                <?php endforeach; ?>
                            </div>
                        </div><!-- End sidebar recent posts -->
                    </div><!-- End Blog Sidebar -->
                </div>
            </div>
        </div>
    </section><!-- End Blog Details Section -->
</main><!-- End #main -->