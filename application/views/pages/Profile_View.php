<!DOCTYPE html>
<html>
	<head>
		<?php
			date_default_timezone_set("Asia/Jakarta");
			echo $js;
			echo $css;
		?>

		<title><?php echo $user[0]['nama']; ?></title>
	</head>
	<body class="bgGrey2">
		<?php echo $header; ?>
		<?php $profile_pict = base_url('assets/pict_user/') . $user[0]['picture'];?>

		<div class="container-fluid wrapper">
			<div class="card row">
				<div class="col-md-4">
					<div class="row text-center">
						<img src="<?php echo $profile_pict; ?>" style="width:22%;">
					</div>
					<br>
					<div class="row text-center" style="margin-bottom:5px;">
						<label class="col-form-label" style="vertical-align:middle;">Nama</label>
						<div class="">
							<p class="col-form-label" style="vertical-align:middle;"><?php echo $user[0]['nama']?></p>
						</div>
					</div>
					<div class="row text-center" style="margin-bottom:5px;">
						<label class="col-form-label" style="vertical-align:middle;">Username</label>
						<div class="">
							<p class="col-form-label" style="vertical-align:middle;"><?php echo $user[0]['username']?></p>
						</div>
					</div>
					<div class="row text-center" style="margin-bottom:5px;">
						<label class="col-form-label" style="vertical-align:middle;">Email</label>
						<div class="">
							<p class="col-form-label" style="vertical-align:middle;"><?php echo $user[0]['email']?></p>
						</div>
					</div>
					<div class="row text-center" style="margin-bottom:5px;">
						<label class="col-form-label" style="vertical-align:middle;">No. Handphone</label>
						<div class="">
							<p class="col-form-label" style="vertical-align:middle;"><?php echo $user[0]['nomor_handphone']?></p>
						</div>
					</div>
					<div class="row text-center" style="margin-bottom:15px;">
						<label class="col-form-label" style="vertical-align:middle;">Alamat</label>
						<div class="">
							<p class="col-form-label" style="vertical-align:middle;"><?php echo $user[0]['alamat']?></p>
						</div>
					</div>
					<div class="row text-center">
						<a href="<?php echo base_url() . "User_Profile/edit_profile" ?>"><button style="width:75%;" class="btn btn-success">Edit Profile</button></a>
					</div>
				</div>

				<div class="col-md-8">
					<table id="myTable" align="center" class="table table-striped table-bordered">
						<thead>
							<th class="text-center">Nomor Transaksi</th>
							<th class="text-center">Tanggal Transaksi</th>
							<th class="text-center">Jenis Pengiriman</th>
							<th class="text-center">Jenis Pembayaran</th>
							<th class="text-center">Total Pembayaran (dalam Rupiah)</th>
							<th class="text-center">Detil Transaksi</th>
						</thead>
						<tbody>
							<?php
								$total = 0;
								$ctr = 1;
								$ctr_sama = 0;
								$temp = -999;
								$product = array();
								foreach ($transaction as $row) {
									if($temp == $row['ID_trans']){
										continue;
									}

									$trans_id = $row['ID_trans'];
									$temp = $trans_id;
									$trans_cust = $row['ID_cust'];
									$trans_total = $row['total'];
									$trans_biaya_kirim = $row['biaya_kirim'];
									$trans_jenis_kirim = $row['jenis_kirim'];
									$trans_jenis_pembayaran = $row['jenis_pembayaran'];
									$trans_grand_total = $row['grand_total'];

									echo "<tr>";
										echo "<td class='text-center' style='vertical-align:middle;'>" . $ctr . "</td>";
										echo "<td class='text-center' style='vertical-align:middle;'>" . date("F d, h:i A", $row['tanggalTransaksi']) . "</td>";
										echo "<td class='text-center'  style='vertical-align:middle;'>" . $trans_jenis_kirim . "</td>";
										echo "<td class='text-center'  style='vertical-align:middle;'>" . $trans_jenis_pembayaran . "</td>";
										echo "<td class='text-center' style='vertical-align:middle;'> " . number_format($trans_grand_total,2) . "</td>";
										echo "<td class='text-center' style='vertical-align:middle;'><a href=\"" . base_url() . "User_Profile/trans_detail?id=" . $trans_id . "\"><button style=\"margin:2px;\" class=\"btn btn-primary\">Detail</button></a></td>";
									echo "</tr>";
									$ctr += 1;
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#myTable').DataTable();
			});
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
				margin: 3% auto 3%;
				margin-top: 1%;
				padding: 1%;
				width: 80%;
				min-width: 300px;
				background: #EEEEEE;
				box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
				border-radius: 5px;
			}
		</style>
	</body>
</html>
