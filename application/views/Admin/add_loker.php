<main id="main">
    <br>
    <!-- Breadcrumbs Section -->
    <!-- ... Breadcrumbs code ... -->

    <!-- Form Section -->
    <section id="add-loker" class="add-loker">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Lowongan Kerja</h4>
                        </div>
                        <div class="card-body">
                            <!-- Form Open -->
                            <?php echo form_open_multipart('Admin/add_loker'); ?>

                            <!-- Posisi -->
                            <div class="form-group">
                                <label for="posisi">Posisi</label>
                                <input type="text" name="posisi" class="form-control" required>
                            </div>

                            <!-- Perusahaan -->
                            <div class="form-group">
                                <label for="perusahaan">Perusahaan</label>
                                <input type="text" name="perusahaan" class="form-control" required>
                            </div>

                            <!-- Kriteria -->
                            <div class="form-group">
                                <label for="kriteria">Kriteria</label>
                                <textarea name="kriteria" class="form-control" rows="8" required></textarea>
                            </div>

                            <!-- Deskripsi Pekerjaan -->
                            <div class="form-group">
                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <textarea name="deskripsi_pekerjaan" class="form-control" rows="8" required></textarea>
                            </div>

                            <!-- Bakat yang Dibutuhkan -->
                            <div class="form-group">
                                <label for="bakat_required">Bakat yang Dibutuhkan</label>
                                <input type="text" name="bakat_required" class="form-control" required>
                            </div>

                            <!-- Pendidikan yang Dibutuhkan -->
                            <div class="form-group">
                                <label for="pendidikan_required">Pendidikan yang Dibutuhkan</label>
                                <input type="text" name="pendidikan_required" class="form-control" required>
                            </div>

                            <!-- Foto -->
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" class="form-control" required>
                            </div>

                            <!-- Deskripsi Perusahaan -->
                            <div class="form-group">
                                <label for="deskripsi_perusahaan">Deskripsi Perusahaan</label>
                                <textarea name="deskripsi_perusahaan" class="form-control" rows="8" required></textarea>
                            </div>

                            <!-- Lokasi Kerja -->
                            <div class="form-group">
                                <label for="lokasi_kerja">Lokasi Kerja</label>
                                <input type="text" name="lokasi_kerja" class="form-control" required>
                            </div>

                            <!-- Kategori -->
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" required>
                            </div>

                            <!-- Jam Kerja -->
                            <div class="form-group">
                                <label for="jam_kerja">Jam Kerja</label>
                                <input type="number" name="jam_kerja" class="form-control" required>
                            </div>

                            <!-- Gaji -->
                            <div class="form-group">
                                <label for="gaji">Gaji</label>
                                <input type="text" name="gaji" class="form-control" required>
                            </div>

                            <!-- Link -->
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" required>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="btn btn-primary">Tambah Lowongan Kerja</button>
                            </div>
                            

                            <!-- Form Close -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Form Section -->
</main><!-- End Content Section -->