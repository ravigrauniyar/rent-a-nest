<section class="wrapper" style="margin-left: 16%;margin-top: -11%;">
    <div class="col-md-6 col-sm-12 mx-auto">
        <div class="alert alert-info" role="alert">
            <?php if (isset($message)) : ?>
                <div style="color:#FF0000;text-align:center;font-size:17px;"><?= $message ?></div>
            <?php endif; ?>
            <h2 class="text-center mb-4">Register Apartment</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rooms">Available Rooms</label>
                            <input type="text" class="form-control" id="rooms" placeholder="1BHK/2BHK/3BHK" name="rooms" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rent">Rent</label>
                            <input type="text" class="form-control" id="rent" placeholder="Rent" name="rent" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="deposit">Deposit</label>
                            <input type="text" class="form-control" id="deposit" placeholder="Deposit" name="deposit" required>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" placeholder="Description" name="description" required></textarea>
                </div>
                <div class="row form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" accept="image/*" required />                
                </div>
                <button type="submit" class="btn btn-primary" name="register_apartment" value="register_apartment">Submit</button>
            </form>
        </div>
    </div>
</section>
