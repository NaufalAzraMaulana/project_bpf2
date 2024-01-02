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
              <h2 class="text-center">Edit Artikel</h2>
              <!-- Form untuk mengedit artikel -->
              <form action="<?= base_url('Admin/update_artikel/' . $article['id']) ?>" method="post">
                <!-- Tambahkan input untuk kolom yang ingin diubah -->
                <div class="form-group">
                  <label for="judul">Judul Artikel</label>
                  <input type="text" class="form-control" id="judul" name="judul" value="<?= $article['judul'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="jenis">Jenis Artikel</label>
                  <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $article['jenis'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="isi">Isi Artikel</label>
                  <textarea class="form-control" id="isi" name="isi" required><?= $article['isi'] ?></textarea>
                </div>
                <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $article['gambar'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="hari">Hari</label>
                  <input type="text" class="form-control" id="Hari" name="Hari" value="<?= $article['Hari'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="tanggal_publikasi">Tanggal publikasi</label>
                  <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="<?= $article['tanggal_publikasi'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Artikel</button>
              </form>
            </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>