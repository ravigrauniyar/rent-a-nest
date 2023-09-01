<section class="wrapper" style="margin-left: 20%;margin-top: -10%; background-color: #212529;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if (isset($errMsg)) {
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
				}
				?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Apartment/Room</th>
							<th>Complaints</th>
							<th>Full Name</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($data as $key => $value) {
								echo '<tr>
									<td>' . $value['apartment_info'] . '</td>
									<td>' . $value['complaint'] . '</td>';

								// Fetch user data for the current complaint's user_id
								$user_data = $organized_data[$value['id']];
								
								echo '<td>' . $user_data['fullname'] . '</td>
									</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
