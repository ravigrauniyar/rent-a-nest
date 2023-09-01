<section class="wrapper" style="margin-left: 16%;margin-top: -10%;">
	<div class="col-md-6 mx-auto">
		<div class="alert alert-info" role="alert">
			<?php
			if(isset($message)){
				echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$message.'</div>';
			}
			?>
			<h2 class="text-center mb-4">Update Details</h2>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Address</label>
								<input type="hidden" class="form-control" id="id" name="id" required value="<?= isset($data['id']) ? $data['id'] : ''; ?>">
								<input type="text" class="form-control" id="address" placeholder="Address" name="address" required value="<?= isset($data['address']) ? $data['address'] : ''; ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="rooms">Available Rooms</label>
								<input type="text" class="form-control" id="rooms" placeholder="1BHK/2BHK/3BHK/1RK" name="rooms" required value="<?= isset($data['rooms']) ? $data['rooms'] : ''; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="rent">Rent</label>
								<input type="text" class="form-control" id="rent" placeholder="Rent" name="rent" required value="<?= isset($data['rent']) ? $data['rent'] : ''; ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="deposit">Deposit</label>
								<input type="text" class="form-control" id="deposit" placeholder="Deposit" name="deposit" required value="<?= isset($data['deposit']) ? $data['deposit'] : ''; ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" placeholder="Description" name="description" required><?= isset($data['description']) ? $data['description'] : ''; ?></textarea>
				</div>
				<button type="submit" class="btn btn-primary" name="update_rental" value="update_rental">Submit</button>
			</form>
		</div>
	</div>
</section>