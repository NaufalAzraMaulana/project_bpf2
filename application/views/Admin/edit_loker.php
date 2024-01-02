<main id="main">
    <br>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <!-- ... Breadcrumbs code ... -->
    </div><!-- End Breadcrumbs -->

    <!-- ======= Edit Lowongan Kerja Section ======= -->
    <section id="edit-loker" class="edit-loker">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Lowongan Kerja</h4>
                        </div>
                        <div class="card-body">
                            <!-- Form Open -->
                            <?php echo form_open_multipart('Admin/update_loker/' . $job['id']); ?>

                            <!-- Posisi -->
                            <div class="form-group">
                                <label for="posisi">Posisi</label>
                                <input type="text" name="posisi" class="form-control" value="<?= $job['posisi']; ?>" required>
                            </div>

                            <!-- Perusahaan -->
                            <div class="form-group">
                                <label for="perusahaan">Perusahaan</label>
                                <input type="text" name="perusahaan" class="form-control" value="<?= $job['perusahaan']; ?>" required>
                            </div>

                            <!-- Kriteria -->
                            <div class="form-group">
                                <label for="kriteria">Kriteria</label>
                                <textarea name="kriteria" class="form-control" rows="8" required><?= $job['kriteria']; ?></textarea>
                            </div>

                            <!-- Deskripsi Pekerjaan -->
                            <div class="form-group">
                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <textarea name="deskripsi_pekerjaan" class="form-control" rows="8" required><?= $job['deskripsi_pekerjaan']; ?></textarea>
                            </div>

                            <!-- Bakat yang Dibutuhkan -->
                            <div class="form-group">
                                <label for="bakat_required">Bakat yang Dibutuhkan</label>
                                <input type="text" name="bakat_required" class="form-control" value="<?= $job['bakat_required']; ?>" required>
                            </div>

                            <!-- Pendidikan yang Dibutuhkan -->
                            <div class="form-group">
                                <label for="pendidikan_required">Pendidikan yang Dibutuhkan</label>
                                <input type="text" name="pendidikan_required" class="form-control" value="<?= $job['pendidikan_required']; ?>" required>
                            </div>

                            <!-- Foto -->
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" class="form-control">
                                <small>Leave blank if you don't want to change the current photo.</small>
                            </div>

                            <!-- Deskripsi Perusahaan -->
                            <div class="form-group">
                                <label for="deskripsi_perusahaan">Deskripsi Perusahaan</label>
                                <textarea name="deskripsi_perusahaan" class="form-control" rows="8" required><?= $job['deskripsi_perusahaan']; ?></textarea>
                            </div>

                            <!-- Lokasi Kerja -->
                            <div class="form-group">
                                <label for="lokasi_kerja">Lokasi Kerja</label>
                                <input type="text" name="lokasi_kerja" class="form-control" value="<?= $job['lokasi_kerja']; ?>" required>
                            </div>

                            <!-- Kategori -->
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" value="<?= $job['kategori']; ?>" required>
                            </div>

                            <!-- Jam Kerja -->
                            <div class="form-group">
                                <label for="jam_kerja">Jam Kerja</label>
                                <input type="number" name="jam_kerja" class="form-control" value="<?= $job['jam_kerja']; ?>" required>
                            </div>

                            <!-- Gaji -->
                            <div class="form-group">
                                <label for="gaji">Gaji</label>
                                <input type="text" name="gaji" class="form-control" value="<?= $job['gaji']; ?>" required>
                            </div>

                            <!-- Link -->
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" value="<?= $job['link']; ?>" required>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="btn btn-primary">Update Lowongan Kerja</button>
                            </div>

                            <!-- Form Close -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Edit Lowongan Kerja Section -->
</main><!-- End #main -->