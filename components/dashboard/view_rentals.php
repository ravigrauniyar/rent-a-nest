<section class="wrapper" style="margin-left: 20%;margin-top: -10%;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (isset($errMsg)): ?>
                    <div style="color:#FF0000;text-align:center;font-size:17px;"><?= $errMsg ?></div>
                <?php endif; ?>
                <h2>List of Apartment Details</h2>
                <?php if (empty($rental_data)): ?>
                    <div style="text-align:center;font-size:17px;">No entries yet! Click on Register tab to add new apartments.</div>
                <?php else: ?>
                    <?php foreach ($rental_data as $key => $rental): ?>
                        <div class="card card-inverse card-info mb-3" style="padding:1%;">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-3">
                                        <h4 class="text-center mb-3">Owner Details</h4>
                                        <p><b>Owner Name: </b><?= $organized_data[$rental['id']]['fullname'] ?></p>
                                        <p><b>Mobile Number: </b><?= $organized_data[$rental['id']]['mobile'] ?></p>
                                        <p><b>Email: </b><?= $organized_data[$rental['id']]['email'] ?></p>
                                    </div>
                                    <div class="col-3">
                                        <h4 class="text-center mb-3">Room Details</h4>
                                        <p><b>Address: </b><?= $rental['address'] ?></p>
                                        <p><b>Available Rooms: </b><?= $rental['rooms'] ?></p>
                                        <p><b>Rent (Rs.): </b><?= $rental['rent'] ?></p>
                                        <p><b>Deposit (Rs.): </b><?= $rental['deposit'] ?></p>
                                    </div>
                                    <div>
                                        <h4 class="mb-3">Other Details</h4>
                                        <p><b>Description: </b><?= $rental['description'] ?></p>
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
