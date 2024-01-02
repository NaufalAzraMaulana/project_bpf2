<br><br><br><br>

<!-- User Profile Section -->
<section id="user-profile" class="user-profile">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>User Profiles</h2>
        </div>
        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Bakat</th>
                                <!-- <th>Gambar</th> -->
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $users) : ?>
                                <tr>
                                    <td><?= $users->nama; ?></td>
                                    <td><?= $users->email; ?></td>
                                    <td><?= $users->bakat; ?></td>
                                    <!-- <td><img src="<?= base_url('assets/gambar/' . $users->gambar); ?>" alt="User Profile Image" class="profile-image" style="width: 50px; height: 50px;"></td> -->
                                    <!-- <td>
                                        
                                        <a href="<?= site_url('pelamar/delete_profile/' . $users->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus profile ini?')">Delete</a>
                                    </td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>