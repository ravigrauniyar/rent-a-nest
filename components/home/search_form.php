<!-- Search -->
<section id="search">
    <div class="container" style="margin-top:10vh;">
        <div class="row">
            <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Search</h2>
            <h3 class="section-subheading text-muted">Search rooms or apartments to rent.</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
        <form action="" method="POST" class="center" novalidate>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <input class="form-control" id="keywords" name="keywords" type="text" placeholder="Key words(Ex: 1bhk,rent..)" required data-validation-required-message="Please enter keywords">
                <p class="help-block text-danger"></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                <input class="form-control" id="location" type="text" name="location" placeholder="Location" required data-validation-required-message="Please enter location.">
                <p class="help-block text-danger"></p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                <button id="name" class="btn btn-success btn-md text-uppercase" name="search" value="search" type="submit">Search</button>
                </div>
            </div>
            </div>
        </form>

        <?php if (isset($errMsg)) : ?>
            <div style="color:#FF0000;text-align:center;font-size:17px;"><?= $errMsg ?></div>
        <?php endif; ?>

        <?php if (count($rental_data) !== 0) : ?>
            <h2 class='text-center'>List of Apartment Details</h2>
        <?php elseif(isset($_POST['search'])) : ?>
            <h2 class='text-center' style='color:red; background-color: rgba(255,255,255,0.75);'>Try Some other keywords</h2>
        <?php endif; ?>

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
                            </div>
                            <div class="col">
                                <h5 class="mb-3">Sneak peek</h5>
                                <img src="<?= $rental['image'] ?>" alt="Uploaded Image" width="375" height="225">
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
                                <h5 class="mb-3">Other Details</h5>
                                <p><b>Description: </b><?= $rental['description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    </div>
</section>
