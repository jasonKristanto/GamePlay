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
							<h3 class="box-title">Transaction Table</h3>
						</div>
						<div class="box-body">

							<table id="myTable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<th class="text-center">ID Transaction</th>
									<th class="text-center">ID Customer</th>
									<th class="text-center">Total Belanja</th>
									<th class="text-center">Jenis Pengiriman</th>
									<th class="text-center">Biaya Pengiriman</th>
									<th class="text-center">Jenis Pembayaran</th>
									<th class="text-center">Total Pembayaran</th>
									<th class="text-center">Action</th>
								</thead>
								<tbody>
									<?php
										$total = 0;
										foreach ($transaction as $row) {
											$trans_id = $row['ID_trans'];
											$trans_cust = $row['ID_cust'];
											$trans_total = $row['total'];
											$trans_biaya_kirim = $row['biaya_kirim'];
											$trans_jenis_kirim = $row['jenis_kirim'];
											$trans_jenis_pembayaran = $row['jenis_pembayaran'];
											$trans_grand_total = $row['grand_total'];

											$total += $trans_grand_total;

											echo "<tr>";
												echo "<td class='text-center' style='vertical-align:middle;'>" . $trans_id . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>" . $trans_cust . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>Rp. " . number_format($trans_total,2) . "</td>";
												echo "<td class='text-center'  style='vertical-align:middle;'>" . $trans_jenis_kirim . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>Rp. " . number_format($trans_biaya_kirim,2) . "</td>";
												echo "<td class='text-center'  style='vertical-align:middle;'>" . $trans_jenis_pembayaran . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>Rp. " . number_format($trans_grand_total,2) . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'><a href=\"" . base_url() . "Admin_Transaction/trans_detail?id=" . $trans_id . "\"><button style=\"margin:2px;\" class=\"btn btn-primary\">Detail</button></a></td>";
											echo "</tr>";
										}
									?>
								</tbody>
								<tfoot>
									<th class="text-center">ID Transaction</th>
									<th class="text-center">ID Customer</th>
									<th class="text-center">Total Belanja</th>
									<th class="text-center">Jenis Pengiriman</th>
									<th class="text-center">Biaya Pengiriman</th>
									<th class="text-center">Jenis Pembayaran</th>
									<th class="text-center">Rp. <?php echo number_format($total, 2); ?></th>
									<th class="text-center">Action</th>
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
