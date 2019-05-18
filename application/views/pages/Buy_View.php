<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title><?php echo "Checkout"; ?></title>
	</head>
	<body class="bgGrey2">
		<?php echo $header; ?>

		<?php
			$grand_total = 0;

			foreach ($product as $row) {
				$product_qty = $row['qty'];
				$product_price = $row['price'];

				$total = $product_qty * $product_price;

				$grand_total += $total;
			}
		?>

		<div class="container-fluid wrapper">
			<div class="card">
				<div class="col-md-4">
					<form class="form-group" action="<?php echo base_url() . "Buy/checkout"; ?>" method="POST">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label" style="vertical-align:middle;" for="checkout_nama">Nama Penerima</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="checkout_nama" value="<?php echo $user[0]['nama']?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" style="vertical-align:middle;" for="checkout_HP">Nomor Handphone</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="checkout_HP" value="<?php echo $user[0]['nomor_handphone']?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" style="vertical-align:middle;" for="checkout_alamat">Alamat Pengiriman</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="checkout_alamat" rows="3" required><?php echo $user[0]['alamat']?></textarea>
							</div>
						</div>

						<div class="form-group row">
						<label class="col-sm-4 col-form-label" style="vertical-align:middle;" for="checkout_kirim" >Jenis Pengiriman</label>
							<div class="col-sm-8">
								<select id="select_kirim" class="form-control" name="checkout_kirim" onchange="update_total()" required>
							<option value="10000" selected>Reguler - Rp. 10.000,00</option>
							<option value="20000">Express - Rp. 20.000,00</option>
							</select>
							</div>
						</div>

						<div class="form-group row">
						<label class="col-sm-4 col-form-label" style="vertical-align:middle;" for="checkout_bayar">Jenis Pembayaran</label>
							<div class="col-sm-8">
								<select class="form-control" name="checkout_bayar" required>
							<option value="BCA" selected>Bank BCA - 1234567890</option>
							<option value="BRI">Bank BRI - 0987654321</option>
							<option value="BNI">Bank BNI - 1234509876</option>
							<option value="Mandiri">Bank Mandiri - 6789054321</option>
							</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" style="vertical-align:middle;" for="checkout_total_bayar">Total Pembayaran</label>
						<div class="col-sm-8">
							<input id="total_bayar" class="form-control" type="text" name="checkout_total_bayar" value="" readonly>
								<input class="form-control" type="hidden" name="checkout_total" value="<?php echo $grand_total; ?>">
							</div>
						</div>

						<div class="form-group row" style="margin:0px;">
						<input class="col-sm-12 form-control btn btn-success" type="submit" name="Buy" value="Buy">
						</div>
						<br>
					</form>
				</div>
                <div class="col-md-8">
					<table id="myTable" class="table table-striped table-bordered" style="width:100%">
						<thead>	
							<th class="text-center" style="vertical-align:middle;">Picture</th>
							<th class="text-center" style="vertical-align:middle;">Product Name</th>
							<th class="text-center" style="vertical-align:middle;">Quantity</th>
							<th class="text-center" style="vertical-align:middle;">Price</th>
							<th class="text-center" style="vertical-align:middle;">Total</th>
						</thead>
						<tbody>
							<?php
							foreach ($product as $row) {
								$product_id = $row['ID'];
								$product_name = $row['productName'];
								$product_pict = base_url('assets/pict_product/') . $row['picture'];
								$product_qty = $row['qty'];
								$product_price = $row['price'];

								echo "<tr>";
												echo "<td class='text-center' style='vertical-align:middle;'><img style=\"max-width: 100px;\" src='" . $product_pict . "'></td>";
								echo "<td class='text-center' style='vertical-align:middle;'>" . $product_name . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>" . $product_qty . "</td>";
												echo "<td class='text-center' style='vertical-align:middle;'>Rp. " . number_format($product_price,2) . "</td>";
								echo "<td class='text-center' style='vertical-align:middle;'>Rp. " . number_format($total,2) . "</td>";

								echo "</tr>";
							}
							?>
						</tbody>
						<tfoot>
							<th class="text-center" style="vertical-align:middle;">Picture</th>
							<th class="text-center" style="vertical-align:middle;">Product Name</th>
							<th class="text-center" style="vertical-align:middle;">Quantity</th>
							<th class="text-center" style="vertical-align:middle;">Price</th>
							<th class="text-center" style="vertical-align:middle;">Total: Rp. <?php echo number_format($grand_total,2) ?></th>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#myTable').DataTable();

				var temp = parseInt(<?php echo $grand_total; ?>) + parseInt($('#select_kirim').val());
				temp = addCommas(temp);
				$('#total_bayar').val("Rp. " + temp);
			});

			function addCommas(nStr)
			{
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
			}

			function update_total(){
				//alert($('#select_kirim').val());
				var temp = parseInt(<?php echo $grand_total; ?>) + parseInt($('#select_kirim').val());
				temp = addCommas(temp);
				$('#total_bayar').val("Rp. " + temp);
			}
		</script>
		<style>
			.wrapper{
				min-height: 90%; 
				min-height: 90vh; 
				display: flex;
				align-items: center;
			}
			.card {
				float: auto;
				margin: 5% auto 5%;
				padding: 3%;
				background: #EEEEEE;
				box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
				border-radius: 5px;
			} 
		</style>
	</body>
</html>
