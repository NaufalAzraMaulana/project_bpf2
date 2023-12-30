<br><br><br>

<!-- Create Article Form -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Artikel</h4>
                </div>
                <div class="card-body">
                    <!-- Form Open -->
                    <?php echo form_open('Admin/add_article'); ?>

                    <!-- Judul Artikel -->
                    <div class="form-group">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <!-- Jenis Artikel -->
                    <div class="form-group">
                        <label for="jenis">Jenis Artikel</label>
                        <input type="text" name="jenis" class="form-control" required>
                    </div>

                    <!-- Isi Artikel -->
                    <div class="form-group">
                        <label for="isi">Isi Artikel</label>
                        <textarea name="isi" class="form-control" rows="8" required></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="gambar">Gambar Artikel</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>


                    <!-- Hari Publikasi -->
                    <div class="form-group">
                        <label for="hari">Hari Publikasi</label>
                        <input type="text" name="hari" class="form-control" required>
                    </div>

                    <!-- Tanggal Publikasi -->
                    <div class="form-group">
                        <label for="tanggal_publikasi">Tanggal Publikasi</label>
                        <input type="date" name="tanggal_publikasi" class="form-control" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Tambah Artikel</button>

                    <!-- Form Close -->
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>