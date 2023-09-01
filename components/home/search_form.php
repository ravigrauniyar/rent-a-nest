 <header class="masthead">
    <div class="container">
    <!-- Search -->
        <section id="search">
            <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Search</h2>
                <h3 class="section-subheading text-muted">Search rooms or houses to rent.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
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
                    <h2 class='text-center' style='color:red;'>Try Some other keywords</h2>
                <?php endif; ?>

                <?php foreach ($rental_data as $key => $rental) : ?>
                    <div class="card card-inverse card-info mb-3" style="padding:1%;">					
                        <div class="card-block">

                            <?php
                            // Fetch user data for the current rental's user_id
                            $user_data = $organized_data[$rental['id']];
                            ?>
                            <div class="row">
                                <div class="col-4">
                                    <h4 class="text-center mb-3">Owner Details</h4>
                                    <p><b>Owner Name: </b><?= $user_data['fullname'] ?></p>
                                    <p><b>Mobile Number: </b><?= $user_data['mobile'] ?></p>
                                    <p><b>Email: </b><?= $user_data['email'] ?></p>
                                </div>
                                <div class="col-5">
                                    <h4 class="text-center mb-3">Room Details</h4>
                                    <p><b>Address: </b><?= $rental['address'] ?></p>
                                    <p><b>Available Rooms: </b><?= $rental['rooms'] ?></p>
                                    <p><b>Rent (Rs.): </b><?= $rental['rent'] ?></p>
                                    <p><b>Deposit (Rs.): </b><?= $rental['deposit'] ?></p>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-3">Other Details</h4>
                                    <p><b>Description: </b><?= $rental['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            </div>
        </section>
    </div>
</header>