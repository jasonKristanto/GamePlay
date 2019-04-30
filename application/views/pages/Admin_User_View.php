<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>GamePlay Admin</title>
	</head>
	<body>
		<?php echo $header; ?>

		<h1 class="text-center"> GamePlay <br> Content Management System </h1>

		<div class="container-fluid" >
			<table id="myTable" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<th class="text-center">ID</th>
					<th class="text-center">Username</th>
					<th class="text-center">Password</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Email</th>
          <th class="text-center">Picture</th>
					<th class="text-center">Alamat</th>
					<th class="text-center">Kota</th>
				</thead>
				<tbody>
					<?php
						foreach ($users as $row) {
							$user_id = $row['id'];
							$user_username = $row['username'];
              $user_password = $row['password'];
							$user_picture = base_url('assets/pict_user/') . $row['picture'];
							$user_name = $row['nama'];
							$user_email = $row['email'];
							$user_alamat = $row['alamat'];
							$user_kota = $row['kota'];

							echo "<tr>";
								echo "<td class='text-center' style='vertical-align:middle;'>" . $user_id . "</td>";

								$username = "";

								for ($i=0; $i < strlen($user_username); $i++) {
									if($i < 2){
										$username .= $user_username[$i];
									}
									else {
										$username .= "*";
									}
								}

								echo "<td class='text-center' style='vertical-align:middle;'>" . $username . "</td>";

                echo "<td class='text-center' style='vertical-align:middle;'>*********</td>";

								echo "<td class='text-center' style='vertical-align:middle;'>" . $user_name . "</td>";

								echo "<td class='text-center' style='vertical-align:middle;'>" . $user_email . "</td>";

                echo "<td align='center'><img style=\"max-width: 100px;\" src='" . $user_picture . "'></td>";

								echo "<td class='text-center' style='vertical-align:middle;'>" . $user_alamat . "</td>";

                echo "<td class='text-center' style='vertical-align:middle;'>" . $user_kota . "</td>";

							echo "</tr>";
						}
					?>
				</tbody>
				<tfoot>
          <th class="text-center">ID</th>
					<th class="text-center">Username</th>
					<th class="text-center">Password</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Email</th>
          <th class="text-center">Picture</th>
					<th class="text-center">Alamat</th>
					<th class="text-center">Kota</th>
				</tfoot>
			</table>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#myTable').DataTable();
			});
		</script>
	</body>
</html>
