<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Detail Artikel</h2>
                        <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
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
                            <img src="<?= base_url('assets/') ?>img/blog/blog1.jpg" alt="" class="img-fluid">
                        </div>
                        <?php foreach ($articles as $article) : ?>
                        <h2 class="title"><?= $article['judul'] ?></h2>
                        
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2023-01-02"><?= $article['tanggal_publikasi'] ?></time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
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

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Artificial Intelligence</a></li>
                                <li><a href="#">Maps</a></li>
                                <li><a href="#">Location</a></li>
                            </ul>
                        </div><!-- End meta bottom -->
                    </article><!-- End blog post -->
                    <?php endforeach; ?>
                    <br><br>
                    <div class="comments">
                        <h4 class="comments-count">1 Comments</h4>
                        <div id="comment-1" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="<?= base_url('assets/') ?>img/blog/comments-1.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">01 Jan,2022</time>
                                    <p>
                                        Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                                        Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                                    </p>
                                </div>
                            </div>
                        </div><!-- End comment #1 -->

                        <div class="reply-form">
                            <h4>Tinggalkan Komentar</h4>
                            <p>Alamat email Anda tidak akan dipublikasikan. Bidang yang harus diisi ditandai *</p>
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Nama Anda*">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="email" type="text" class="form-control" placeholder="Email Anda*">
                                    </div>
                                </div>
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

                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Cari</h3>
                            <form action="" class="mt-3">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Kategori</h3>
                            <ul class="mt-3">
                                <li><a href="#">Umum <span>(1)</span></a></li>
                                <li><a href="#">Teknologi <span>(1)</span></a></li>
                                <li><a href="#">Marketing <span>(1)</span></a></li>
                                <li><a href="#">Desain <span>(1)</span></a></li>
                                <li><a href="#">Bisnis <span>(1)</span></a></li>
                                <li><a href="#">Pendidikan <span>(1)</span></a></li>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Artikel Terbaru</h3>

                            <div class="mt-3">

                                <div class="post-item mt-3">
                                    <img src="<?= base_url('assets/') ?>img/blog/blog-recent-1.jpg" alt="">
                                    <div>
                                        <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="<?= base_url('assets/') ?>img/blog/blog-recent-2.jpg" alt="">
                                    <div>
                                        <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="<?= base_url('assets/') ?>img/blog/blog-recent-3.jpg" alt="">
                                    <div>
                                        <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="<?= base_url('assets/') ?>img/blog/blog-recent-4.jpg" alt="">
                                    <div>
                                        <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="<?= base_url('assets/') ?>img/blog/blog-recent-5.jpg" alt="">
                                    <div>
                                        <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                            </div>

                        </div><!-- End sidebar recent posts-->

                        <div class="sidebar-item tags">
                            <h3 class="sidebar-title">Tag</h3>
                            <ul class="mt-3">
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div><!-- End sidebar tags-->

                    </div><!-- End Blog Sidebar -->

                </div>
            </div>

        </div>
    </section><!-- End Blog Details Section -->

</main><!-- End #main -->