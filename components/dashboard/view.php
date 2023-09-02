<section class="wrapper">
    <div class="col-md-12 mt-5" style="min-height: 75vh;">
        <h1>Dash board</h1>
        <div class="row">
            <?php if ($role == 'admin') { ?>
                <div class="col-md-4">
                    <a href="index.php?q=<?= serialize_url('dashboard', 'view_users') ?>" >
                        <div class="alert alert-warning" role="alert">
                            <b>Registered Users: <span class="badge badge-pill badge-success"><?= $users_count['register_user'] ?></span></b>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="col-md-4">
                <a href="index.php?q=<?= serialize_url('dashboard', 'view_rentals') ?>" >
                    <div class="alert alert-warning" role="alert">
                        <b>Rooms for Rent: <span class="badge badge-pill badge-success"><?= intval($total_rental['total_rentals']) ?></span></b>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="index.php?q=<?= serialize_url('dashboard', 'view_complaints') ?>" >
                    <div class="alert alert-warning" role="alert">
                        <b>Complaints: <span class="badge badge-pill badge-success"><?= $complaints_count['complaints'] ?></span></b>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>