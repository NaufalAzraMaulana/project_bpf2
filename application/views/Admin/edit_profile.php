<br><br><br><br>
<!-- User Profile Section -->
<section id="user-profile" class="user-profile mb-5">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Edit Profile</h2>
        </div>
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="profile-card">
                    <img src="<?= base_url('assets/gambar/' . $user['gambar']); ?>" alt="User Profile Image" class="profile-image">
                    <form action="<?= site_url('pelamar/update_profile'); ?>" method="post" enctype="multipart/form-data">
                        <!-- Include form fields for editing name, skill, and image -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" id="nama" name="nama" value="<?= $user['nama']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="bakat" class="form-label">Bakat:</label>
                            <input type="text" id="bakat" name="bakat" value="<?= $user['bakat']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar:</label>
                            <input type="file" id="gambar" name="gambar" class="form-control">
                        </div>

                        <!-- Display the current profile image -->
                        <div class="mb-3">
                            <label for="current-gambar" class="form-label">Current Gambar:</label>
                            <img src="<?= base_url('assets/gambar/' . $user['gambar']); ?>" alt="Current Gambar" class="img-fluid" style="max-width: 200px;">
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- End User Profile Section -->
<br><br><br><br>
