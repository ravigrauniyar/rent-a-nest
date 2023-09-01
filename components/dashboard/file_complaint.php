<section class="wrapper" style="margin-left: 20%;margin-top: -10%; background-color: #212529;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if (isset($message)) {
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $message . '</div>';
				}
				?>
				<h2>Complaints</h2>
				<form action="" method="post">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="apartment_info">Apartment No./Name or Room No./Name</label>
								<input type="text" class="form-control" id="apartment_info" placeholder="Full Name" name="apartment_info" required>
								<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
								<input type="hidden" name="fullname" value="<?php echo $_SESSION['fullname']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="complaint">Complaint</label>
								<textarea class="form-control" id="complaint" placeholder="Text" name="complaint" required></textarea>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary" name='file_complaint' value="file_complaint">Submit</button>
				</form>
			</div>
		</div>
	</div>
</section>
