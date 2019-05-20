<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>Transaction</title>
	</head>
	<body class="bgGrey">
			<?php
				echo $header;
				$total = 0;
				foreach ($transaction as $row) {
					$trans_harga = $row['harga'];
					$trans_qty = $row['qty'];
					$trans_total = $trans_harga * $trans_qty;

					$total += $trans_total;
				}
			?>
			<div class="container-fluid wrapper">
				<div class="card">
					<div class="col-md-12">
						<div class="row" style="margin-bottom:5px;">
							<label class="col-md-12 col-form-label" style="vertical-align:middle;">Tanggal Transaksi</label>
							<div class="">
								<p class="col-md-12 col-form-label" style="vertical-align:middle;"><?php echo date("F d, h:i A", $transaction[0]['tanggalTransaksi']); ?></p>
							</div>
						</div>
						<div class="row" style="margin-bottom:5px;">
							<label class="col-md-3 col-form-label" style="vertical-align:middle;">Jenis Pengiriman</label>
							<label class="col-md-9 col-form-label" style="vertical-align:middle;">Biaya Pengiriman</label>
							<div class="">
								<p class="col-md-3 col-form-label" style="vertical-align:middle;"><?php echo $transaction[0]['jenis_kirim']; ?></p>
							</div>
							<div class="">
								<p class="col-md-9 col-form-label" style="vertical-align:middle;">Rp. <?php echo number_format($transaction[0]['biaya_kirim'], 2); ?></p>
							</div>
						</div>
						<div class="row" style="margin-bottom:5px;">
							<label class="col-md-3 col-form-label" style="vertical-align:middle;">Jenis Pembayaran</label>
							<label class="col-md-9 col-form-label" style="vertical-align:middle;">Total Pembayaran</label>
							<div class="">
								<p class="col-md-3 col-form-label" style="vertical-align:middle;"><?php echo $transaction[0]['jenis_pembayaran']; ?></p>
							</div>
							<div class="">
								<p class="col-md-9 col-form-label" style="vertical-align:middle;">Rp. <?php echo number_format($total+$transaction[0]['biaya_kirim'], 2); ?></p>
							</div>
						</div>
					</div>
					<div>
					<div class="col-md-12">
						<table id="myTable" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<th class="text-center">Nama Product</th>
								<th class="text-center"></th>
								<th class="text-center">Harga Product (dalam Rupiah)</th>
								<th class="text-center">Kuantitas</th>
								<th class="text-center">Total Harga (dalam Rupiah)</th>
							</thead>
							<tbody>
								<?php
									$total = 0;
									$ctr = 0;
									foreach ($transaction as $row) {
										$trans_product = $row['productName'];
										$trans_harga = $row['harga'];
										$trans_pict = base_url('assets/pict_product/') . $transaction[$ctr]['picture'];
										$trans_qty = $row['qty'];
										$trans_total = $trans_harga * $trans_qty;

										$total += $trans_total;

										echo "<tr>";
											echo "<td class='text-center' style='vertical-align:middle;'>" . $trans_product . "</td>";
											echo "<td class='text-center' style='vertical-align:middle;'><img style=\"max-width: 100px;\" src='" . $trans_pict . "'></td>";
											echo "<td class='text-center' style='vertical-align:middle;'>" . number_format($trans_harga,2) . "</td>";
											echo "<td class='text-center'  style='vertical-align:middle;'>" . $trans_qty . "</td>";
											echo "<td class='text-center' style='vertical-align:middle;'>" . number_format($trans_total,2) . "</td>";
										echo "</tr>";
										$ctr += 1;
									}
								?>
							</tbody>
							<tfoot>
								<th class="text-center">Nama Product</th>
								<th class="text-center"></th>
								<th class="text-center">Harga Product (dalam Rupiah)</th>
								<th class="text-center">Kuantitas</th>
								<th class="text-center">Total Harga (dalam Rupiah)</th>
							</tfoot>
						</table>
					</div>
					<div class="col-md-12" align="right">
						<a href="<?php echo base_url() . "User_Profile" ?>"><button class="btn btn-primary" >Back</button></a>
					</div>
				</div>
			</div>
		</div>
	</body>
	<style>
		.wrapper{
			min-height: 90%;
			min-height: 90vh;
			display: flex;
			align-items: center;
		}
		.card {
			float: auto;
			margin: auto;
			margin-top: 1%;
			padding: 1%;
			background: #EEEEEE;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
			border-radius: 5px;
		}
	</style>
  <script>
      $(function () {
          $("#myTable").DataTable();
			});
  </script>
</html>
