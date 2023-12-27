<br><br><br><br>

<!-- User Profile Section -->
<section id="user-profile" class="user-profile">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>User Profile</h2>
        </div>
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="profile-card">
                    <img src="<?= base_url('assets/gambar/' . $user['gambar']); ?>" alt="User Profile Image" class="profile-image">
                    <h3 class="profile-name"><?= $user['nama']; ?></h3>
                    <p class="profile-email">Email: <?= $user['email']; ?></p>
                    <p class="profile-skill">Bakat: <?= $user['bakat']; ?></p>
                    <a href="<?= site_url('pelamar/edit_profile'); ?>" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
            <!-- Add more profile details and styling as needed -->
        </div>
    </div>
</section><!-- End User Profile Section -->
<?php
// Check if there is a success message in session flashdata
$successMessage = $this->session->flashdata('success');
if (!empty($successMessage)) {
?>
    <script>
        // Display SweetAlert success message
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '<?= $successMessage; ?>',
        });
    </script>
<?php } ?>
