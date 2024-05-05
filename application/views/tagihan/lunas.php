<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tagihan
    <small>Tagihan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Tagihan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><span class="label label-primary">Tagihan Lunas</span></h3>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>ID | Nama Pelanggan</th>
            <th>Bulan - tahun</th>
            <th>Pemakaian (M<sup>3</sup>)</th>
            <th>Tagihan (Rp)</th>
            <th>Tgl Bayar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($tagihan as $data):
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data->id_pelanggan ?> | <?= $data->nama_pelanggan ?></td>
            <td><?= $data->nama_bulan ?> - <?= $data->tahun ?></td>
            <td><?= $data->pakai ?></td>
            <td><?= number_format($data->tagihan, 0, ',', '.') ?></td>
            <td><?= date('d-m-Y', strtotime($data->tgl_bayar)) ?></td>
            <td>
              <a href="<?= site_url('laporan/cetak/'.$data->id_tagihan) ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-print"></i> Cetak</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

</section>