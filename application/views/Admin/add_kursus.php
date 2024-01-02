<br><br><br>

<!-- Create Course Form -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Kursus</h4>
                </div>
                <div class="card-body">
                    <!-- Form Open -->
                    <?php echo form_open('Admin/add_kursus'); ?>

                    <!-- Nama Kursus --> 
                    <div class="form-group">
                        <label for="nama_kursus">Nama Kursus</label>
                        <input type="text" name="nama_kursus" class="form-control" required>
                    </div>

                    <!-- Deskripsi Kursus -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Kursus</label>
                        <textarea name="deskripsi" class="form-control" rows="8" required></textarea>
                    </div>

                    <!-- Bakat yang Dibutuhkan -->
                    <div class="form-group">
                        <label for="bakat_required">Bakat yang Dibutuhkan</label>
                        <input type="text" name="bakat_required" class="form-control" required>
                    </div>

                    <!-- Pendidikan yang Dibutuhkan -->
                    <!-- <div class="form-group">
                        <label for="pendidikan_required">Pendidikan yang Dibutuhkan</label>
                        <input type="text" name="pendidikan_required" class="form-control" required>
                    </div> -->

                    <div class="form-group">
                        <label for="gambar">Gambar Artikel</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Tambah Kursus</button>

                    <!-- Form Close -->
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
