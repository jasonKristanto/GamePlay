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

				$total = 0;
				foreach ($trans_detail as $row) {
					$trans_harga = $row['harga'];
					$trans_qty = $row['qty'];
					$trans_total = $trans_harga * $trans_qty;

					$total += $trans_total;
				}
			?>

			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Transaction Table</h3>
						</div>
						<div class="box-body">
							<div class="col-md-12">
								<div class="row" style="margin-bottom:5px;">
									<label class="col-md-3 col-form-label" style="vertical-align:middle;">Tanggal Transaksi</label>
									<label class="col-md-3 col-form-label" style="vertical-align:middle;">Nama Penerima</label>
									<label class="col-md-3 col-form-label" style="vertical-align:middle;">Nomor Handphone Penerima</label>
									<label class="col-md-3 col-form-label" style="vertical-align:middle;">Alamat Penerima</label>
									<div class="">
										<p class="col-md-3 col-form-label" style="vertical-align:middle;"><?php echo date("F d, h:i A", $trans_detail[0]['tanggalTransaksi']); ?></p>
									</div>
									<div class="">
										<p class="col-md-3 col-form-label" style="vertical-align:middle;"><?php echo $trans_detail[0]['nama_penerima']; ?></p>
									</div>
									<div class="">
										<p class="col-md-3 col-form-label" style="vertical-align:middle;"><?php echo $trans_detail[0]['noHP_penerima']; ?></p>
									</div>
									<div class="">
										<p class="col-md-3 col-form-label" style="vertical-align:middle;"><?php echo $trans_detail[0]['alamat_penerima']; ?></p>
									</div>
								</div>
								<div class="row" style="margin-bottom:5px;">
									<label class="col-md-3 col-form-label" style="vertical-align:middle;">Jenis Pengiriman</label>
									<label class="col-md-9 col-form-label" style="vertical-align:middle;">Biaya Pengiriman</label>
									<div class="">
										<p class="col-md-3 col-form-label" style="vertical-align:middle;"><?php echo $trans_detail[0]['jenis_kirim']; ?></p>
									</div>
									<div class="">
										<p class="col-md-9 col-form-label" style="vertical-align:middle;">Rp. <?php echo number_format($trans_detail[0]['biaya_kirim'], 2); ?></p>
									</div>
								</div>
								<div class="row" style="margin-bottom:5px;">
									<label class="col-md-3 col-form-label" style="vertical-align:middle;">Jenis Pembayaran</label>
									<label class="col-md-9 col-form-label" style="vertical-align:middle;">Total Pembayaran  (dalam Rupiah)</label>
									<div class="">
										<p class="col-md-3 col-form-label" style="vertical-align:middle;"><?php echo $trans_detail[0]['jenis_pembayaran']; ?></p>
									</div>
									<div class="">
										<p class="col-md-9 col-form-label" style="vertical-align:middle;">Rp. <?php echo number_format($total+$trans_detail[0]['biaya_kirim'], 2); ?></p>
									</div>
								</div>
							</div>
							<table id="myTable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<th class="text-center">ID Transaction</th>
									<th class="text-center">Nama Customer</th>
									<th class="text-center">Nama Product</th>
									<th class="text-center">Harga Product (dalam Rupiah)</th>
									<th class="text-center">Kuantitas</th>
									<th class="text-center">Total Harga (dalam Rupiah)</th>
								</thead>
								<tbody>
									<?php
										$total = 0;
										foreach ($trans_detail as $row) {
											$trans_id = $row['ID_trans'];
											$trans_product = $row['productName'];
											$trans_customer = $row['nama'];
											$trans_harga = $row['harga'];
											$trans_qty = $row['qty'];
											$trans_total = $trans_harga * $trans_qty;

											$total += $trans_total;

											echo "<tr>";
												echo "<td class='text-center' style='vertical-align:middle;'>" . $trans_id . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>" . $trans_customer . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>" . $trans_product . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>" . number_format($trans_harga,2) . "</td>";
												echo "<td class='text-center'  style='vertical-align:middle;'>" . $trans_qty . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>" . number_format($trans_total,2) . "</td>";
											echo "</tr>";
										}
									?>
								</tbody>
							<tfoot>
								<th class="text-center">ID Transaction</th>
									<th class="text-center">Nama Customer</th>
									<th class="text-center">Nama Product</th>
									<th class="text-center">Harga Product</th>
									<th class="text-center">Kuantitas</th>
									<th class="text-center">Rp. <?php echo number_format($total, 2); ?></th>
								</tfoot>
							</table>
							<div align="right">
								<a href="<?php echo base_url() . "Admin_Transaction" ?>"><button class="btn btn-primary" >Back</button></a>
							</div>

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
