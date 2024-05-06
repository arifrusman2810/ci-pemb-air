<!DOCTYPE html>
<html lang="en">

<head>
	<title>Laporan Pemasukan</title>
</head>

<body>
	<center>
		<h2>Laporan Pemasukan</h2>
		<h3>Aplikasi Pembayaran Tagihan Air</h3>
		<p>________________________________________________________________________</p>

		<table border="1" cellspacing="0">
			<thead>
				<tr>
					<th>No.</th>
					<th>ID | Nama Pelanggan</th>
					<th>Bulan - Tahun</th>
					<th>Tagihan</th>
					<th>Tgl bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php
          $no=1;
          foreach($lap_masuk as $data):
        ?>
				<tr>
					<td><?= $no++; ?></td>
					<td>
						<?= $data->id_pelanggan; ?>-
						<?= $data->nama_pelanggan; ?>
					</td>
					<td>
						<?= $data->nama_bulan; ?>-
						<?= $data->tahun; ?>
					</td>
					<td>Rp. <?= number_format($data->tagihan, 0, ',', '.'); ?>,-</td>
					<td><?= date('d-M-Y', strtotime($data->tgl_bayar)) ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

    <?php 
      $query = $this->db->query("SELECT SUM(t.tagihan) as total FROM tb_tagihan t join tb_pembayaran p on t.id_tagihan=p.id_tagihan
      where t.status='Lunas' and p.tgl_bayar BETWEEN '$dt1' AND '$dt2'");
      $data = $query->row();
    ?>

		<h3>Total Pemasukan :
			Rp. <?= number_format($data->total, 0, ',', '.'); ?>,-
		</h3>

	</center>

	<script>
		window.print();
	</script>
</body>

</html>