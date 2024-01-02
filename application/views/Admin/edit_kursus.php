<br><br><br>

<!-- Edit Course Form -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Kursus</h4>
                </div>
                <div class="card-body">
                    <!-- Form Open -->
                    <form action="<?= base_url('Admin/edit_kursus/' .  $Kursus_list['id']) ?>" method="post">
                    <!-- Nama Kursus -->
                    <div class="form-group">
                        <label for="nama_kursus">Nama Kursus</label>
                        <input type="text" name="nama_kursus" class="form-control" value="<?php echo  $Kursus_list['nama_kursus']; ?>" required>
                    </div>

                    <!-- Deskripsi Kursus -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Kursus</label>
                        <textarea name="deskripsi" class="form-control" rows="8" required><?php echo  $Kursus_list['deskripsi']; ?></textarea>
                    </div>

                    <!-- Bakat yang Dibutuhkan --> 
                    <div class="form-group">
                        <label for="bakat_required">Bakat yang Dibutuhkan</label>
                        <input type="text" name="bakat_required" class="form-control" value="<?php echo  $Kursus_list['bakat_required']; ?>" required>
                    </div>

                    <!-- Gambar Kursus -->
                    <!-- <div class="form-group">
                        <label for="gambar">Gambar Kursus</label>
                        <input type="file" name="gambar" class="form-control">
                        <img src="<?php echo base_url('assets/img/kursus/') .  $Kursus_list['gambar']; ?>" alt="Gambar Kursus" class="img-fluid mt-2">
                    </div> -->

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Kursus</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
