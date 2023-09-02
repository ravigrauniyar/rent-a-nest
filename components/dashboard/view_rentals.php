<section class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-5 mt-5 table-responsive table-bordered" style="max-height: 75vh; background-color: rgba(0,0,0,0.25)">
                <?php if (isset($errMsg)): ?>
                    <div style="color:#FF0000;text-align:center;font-size:17px;"><?= $errMsg ?></div>
                <?php endif; ?>
                <h2 class="my-3">List of Apartment Details</h2>
                <?php if (empty($rental_data)): ?>
                    <div style="text-align:center;font-size:17px;">No entries yet! Click on Register tab to add new apartments.</div>
                <?php else: ?>
                    <?php foreach ($rental_data as $key => $rental): ?>
                        <div class="card card-inverse card-info mb-3" style="padding:1%;">
                            <div class="card-block">
                                <h3 class="col mb-3 text-left">Apartment No. <?= $key + 1 ?></h3>
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <div class="col">
                                            <h5 class="mb-3">Owner Details</h5>
                                            <p><b>Owner Name: </b><?= $organized_data[$rental['id']]['fullname'] ?></p>
                                            <p><b>Mobile Number: </b><?= $organized_data[$rental['id']]['mobile'] ?></p>
                                            <p><b>Email: </b><?= $organized_data[$rental['id']]['email'] ?></p>
                                            <p><b>Username: </b><?= $organized_data[$rental['id']]['username'] ?></p>
                                            <p><b>Address: </b><?= $organized_data[$rental['id']]['address'] ?></p>
                                        </div>
                                        <div class="col">
                                            <h5 class="mb-3">Other Details</h5>
                                            <p><b>Description: </b><?= $rental['description'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <div class="col">
                                            <h5 class="mb-3">Room Details</h5>
                                            <p><b>Address: </b><?= $rental['address'] ?></p>
                                            <p><b>Available Rooms: </b><?= $rental['rooms'] ?></p>
                                            <p><b>Rent (Rs.): </b><?= $rental['rent'] ?></p>
                                            <p><b>Deposit (Rs.): </b><?= $rental['deposit'] ?></p>
                                            <p><b>Listed on: </b><?= $organized_data[$rental['id']]['created_at'] ?></p>
                                        </div>
                                        <div class="col">
                                            <h5 class="mb-3">Sneak peek</h5>
                                            <img src="<?= $rental['image'] ?>" alt="Uploaded Image" width="375" height="225">
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row mt-4">
                                    <div class="col">
                                        <a class="btn btn-danger mx-lg-1 mt-sm-3 mt-lg-0" href="index.php?q=<?= serialize_url('dashboard', 'delete_rental', $rental['id']) ?>" >Delete</a>
                                        <a class="btn btn-warning mx-lg-1 mt-sm-3 mt-lg-0" href="index.php?q=<?= serialize_url('dashboard', 'update_rental', $rental['id']) ?>" >Edit</a>
                                        <a class="btn btn-warning mx-lg-1 mt-sm-3 mt-lg-0" href="index.php?q=<?= serialize_url('dashboard', 'file_complaint') ?>" >Complaint</a><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
