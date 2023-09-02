<section id="services">
	<div class="container">
		<div class="row text-left">
			<div class="col-md-4 mx-auto">
				<div class="alert alert-info" role="alert">
					<?php
					if (isset($errMsg)) {
						echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
					}
					?>
					<h2 class="text-center mb-3">Login</h2>
					<form action="" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Email Address/User Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="username" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
						</div>
						<button type="submit" class="btn btn-primary" name='login' value="Login">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>