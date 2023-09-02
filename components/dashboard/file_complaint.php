<section class="wrapper">
	<div class="container">
		<div class="row text-left">
			<div class="col-sm-12 col-md-5 mx-auto mt-5 p-3 alert alert-info table-responsive" role="alert" style="max-height: 75vh;">
				<?php
				if (isset($message)) {
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $message . '</div>';
				}
				?>
				<h2>Complaints</h2>
				<form action="" method="post">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="apartment_info">Apartment No./Name or Room No./Name</label>
								<input type="text" class="form-control" id="apartment_info" placeholder="Full Name" name="apartment_info" required>
								<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
								<input type="hidden" name="fullname" value="<?php echo $_SESSION['fullname']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="complaint">Complaint</label>
								<textarea class="form-control" rows="5" id="complaint" placeholder="Text" name="complaint" required></textarea>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary" name='file_complaint' value="file_complaint">Submit</button>
				</form>
			</div>
		</div>
	</div>
</section>
