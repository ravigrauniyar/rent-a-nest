<section class="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12 mt-5 mx-5 px-3 pt-3 table-responsive table-bordered text-left" style="background-color: rgba(0,0,0,0.5); max-height: 75vh;">
				
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
							if($complaints_data){
								$index = 1;
								foreach ($complaints_data as $key => $value) {
									echo '<tr>
										<td>'. $index. '</td>
										<td>' . $value['apartment_info'] . '</td>
										<td>' . $value['complaint'] . '</td>';

									// Fetch user complaints_data for the current complaint's user_id
									$user_data = $organized_data[$value['id']];
									
									echo '<td>' . $user_data['fullname'] . '</td>
										</tr>';
									$index++;
								}
							}
							else{
								echo '<tr>
                                    <td colspan="4" style="text-align:center;">No Complaints</td>
                                </tr>';
							}
						?>
					</tbody>
				</table>
				<?php
					if (isset($errMsg)) {
						echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
					}
				?>
			</div>
		</div>
	</div>
</section>
