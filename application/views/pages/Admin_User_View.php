<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>GamePlay Admin</title>
	</head>
	<body class="bgGrey">
    <div id="wrapper">

		<?php
			echo $sidebar;
			echo $header;
		?>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User Table</h3>
                    </div>
                    <div class="box-body">

			<table id="myTable" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<th class="text-center">ID</th>
					<th class="text-center">Username</th>
					<th class="text-center">Password</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Email</th>
          <th class="text-center">Picture</th>
					<th class="text-center">Alamat</th>
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

							echo "<tr>";
								echo "<td class='text-center' style='vertical-align:middle;'>" . $user_id . "</td>";

								$username = "";
								$email = "";
								$alamat = "";

								for ($i=0; $i < 13; $i++) {
									if($i < 2){
										$username .= $user_username[$i];
										$email .= $user_email[$i];
										$alamat .= $user_alamat[$i];
									}
									else {
										$username .= "*";
										$email .= "*";
										$alamat .= "*";
									}
								}

								echo "<td class='text-center' style='vertical-align:middle;'>" . $username . "</td>";

                echo "<td class='text-center' style='vertical-align:middle;'>*********</td>";

								echo "<td class='text-center' style='vertical-align:middle;'>" . $user_name . "</td>";

								echo "<td class='text-center' style='vertical-align:middle;'>" . $email . "</td>";

                echo "<td align='center'><img style=\"max-width: 100px;\" src='" . $user_picture . "'></td>";

								echo "<td class='text-center' style='vertical-align:middle;'>" . $alamat . "</td>";

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
				</tfoot>
			</table>

										</div>
                </div>
            </div>
        </div>
    </div>

</body>
    <script>
        $(".menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $(function () {
            $("#myTable").DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false
			}
		);});
    </script>
</html>
