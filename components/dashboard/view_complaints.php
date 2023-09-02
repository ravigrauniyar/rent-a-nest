<section class="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12 mt-5 mx-5 px-3 pt-3 table-responsive table-bordered text-left" style="background-color: rgba(0,0,0,0.5); max-height: 75vh;">
				<?php
				if (isset($errMsg)) {
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
				}
				?>
				<table class="table" style="background-color: #FFF; color: #000;">
					<thead class="text-center">
						<tr>
							<th>#</th>
							<th>Apartment/Room</th>
							<th>Complaints</th>
							<th>Full Name</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$index = 1;
							foreach ($data as $key => $value) {
								echo '<tr>
									<td>'. $index. '</td>
									<td>' . $value['apartment_info'] . '</td>
									<td>' . $value['complaint'] . '</td>';

								// Fetch user data for the current complaint's user_id
								$user_data = $organized_data[$value['id']];
								
								echo '<td>' . $user_data['fullname'] . '</td>
									</tr>';
								$index++;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
