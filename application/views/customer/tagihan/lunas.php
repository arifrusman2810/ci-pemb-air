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
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <b>Tagihan Lunas</b>
        </div>
          <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Bulan - tahun</th>
                  <th>Meter Awal (M<sup>3</sup>)</th>
                  <th>Meter Akhir (M<sup>3</sup>)</th>
                  <th>Pemakaian (M<sup>3</sup>)</th>
                  <th>Tagihan (Rp)</th>
                  <th>Tgl. Pembayaran</th>
                  <th>Refund (Rp)</th>
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
                  <td><?= $data->nama_bulan ?> - <?= $data->tahun ?></td>
                  <td><?= $data->awal ?></td>
                  <td><?= $data->akhir ?></td>
                  <td><?= $data->pakai ?></td>
                  <td><?= number_format($data->tagihan, 0, ',', '.') ?></td>
                  <td><?= date('d-M-Y', strtotime($data->tgl_bayar)) ?></td>
                  <td><?= number_format($data->refund, 0, ',', '.') ?></td>
                  <td>
                  <a href="<?= site_url('customer/tagihan/cetak/'.$data->id_tagihan); ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</section>