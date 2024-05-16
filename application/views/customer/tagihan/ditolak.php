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
      <div class="panel panel-warning">
        <div class="panel-heading">
          <b>Pembayaran Ditolak</b>
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
                  <th>Keterangan</th>
                  <th>Status</th>
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
                  <td><?= $data->keterangan; ?></td>
                  <td>
                    <span class="label label-danger">Ditolak</span>
                  </td>
                  <td>
                    <a href="<?= site_url('customer/tagihan/bayar2/'.$data->id_tagihan); ?>" class="btn btn-primary btn-xs"><i class="fa fa-send"></i> Bayar</a>
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