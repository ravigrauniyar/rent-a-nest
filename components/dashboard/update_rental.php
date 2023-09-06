<section class="wrapper">
	<div class="col-md-6 mx-auto text-left mt-5">
		<div class="alert alert-info table-responsive" style="max-height: 75vh;" role="alert">
			<h2 class="text-center mb-4">Update Details</h2>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="row mx-0">
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="address">Address</label>
							<input type="hidden" class="form-control" id="id" name="id" required value="<?= isset($data['id']) ? $data['id'] : ''; ?>">
							<input type="text" class="form-control" id="address" placeholder="Address" name="address" required value="<?= isset($data['address']) ? $data['address'] : ''; ?>">
						</div>
						<div class="col-md-6 form-group">
							<label for="rooms">Available Rooms</label>
							<input type="text" class="form-control" id="rooms" placeholder="1BHK/2BHK/3BHK/1RK" name="rooms" required value="<?= isset($data['rooms']) ? $data['rooms'] : ''; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="rent">Rent</label>
							<input type="text" class="form-control" id="rent" placeholder="Rent" name="rent" required value="<?= isset($data['rent']) ? $data['rent'] : ''; ?>">
						</div>
						<div class="col-md-6 form-group">
							<label for="deposit">Deposit</label>
							<input type="text" class="form-control" id="deposit" placeholder="Deposit" name="deposit" required value="<?= isset($data['deposit']) ? $data['deposit'] : ''; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-12 form-group">
							<label for="image">Image</label>
							<input class="form-control" type="file" name="image" accept="image/*" required />                
						</div>
						<div class="col-12 form-group">
							<label for="description">Description</label>
							<textarea rows="4" class="form-control" id="description" placeholder="Description" name="description" required><?= isset($data['description']) ? $data['description'] : ''; ?></textarea>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" name="update_rental" value="update_rental">Submit</button>
			</form>
			<?php
				if(isset($message)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$message.'</div>';
				}
			?>
		</div>
	</div>
</section>