<!DOCTYPE html>
<html lang="en">

<head>
	<title>STRUK PEMBAYARAN</title>
</head>

<body>
	<center>
		<h3>*** STRUK PEMBAYARAN TAGIHAN AIR ***</h3>
	</center>
	<table>
		<tbody>
			<tr>
				<td>ID Pelanggan</td>
				<td>:</td>
				<td>
					<?= $data->id_pelanggan; ?>
				</td>
				<td>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<td>Pemakaian </td>
					<td>:</td>
					<td>
						<?= $data->pakai; ?>M
						<sup> 3</sup>
					</td>
			</tr>

			<tr>
				<td>Nama Pelanggan</td>
				<td>:</td>
				<td>
					<?= $data->nama_pelanggan; ?>
				</td>
				<td>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<td>Tagihan</td>
					<td>:</td>
					<td>
						<?= $data->tagihan; ?>
					</td>
					<td>
			</tr>

			<tr>
				<td>Bln/Th</td>
				<td>:</td>
				<td>
					<?= $data->nama_bulan; ?>/
					<?= $data->tahun; ?>
				</td>
				<td>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<td>Pembayaran</td>
					<td>:</td>
					<td>
						<?= $data->status; ?>
					</td>
					<td>
			</tr>
		</tbody>
	</table>
	_______________________________________________________________________________________
	<table>
		<tbody>
			<tr>
				<td>Tgl Pembayaran</td>
				<td>:</td>
				<td>
					<?=  $data->tgl_bayar; ?>
				</td>
			</tr>
			<tr>
				<td>Uang Bayar</td>
				<td>:</td>
				<td>
					<?= $data->uang_bayar; ?>
				</td>
				<td>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Struk Ini Adalah Bukti Pembayaran Yang Sah.
				</td>
			</tr>
			<tr>
			</tr>
			<td>Uang Kembali</td>
			<td>:</td>
			<td>
				<?= $data->kembali; ?>
			</td>

		</tbody>
	</table>
	<br> ----------------------------------------------------------Potong di sini--------------------------------------------------------


	<script>
		window.print();
	</script>
</body>

</html>