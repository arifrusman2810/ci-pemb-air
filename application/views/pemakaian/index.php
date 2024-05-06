<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pemakaian
    <small>Pemakaian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Pemakaian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pemakaian</h3>
      <div class="pull-right">
        <a href="<?= site_url('pemakaian/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Pemakaian</a>
      </div>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>ID | Nama Pelanggan</th>
            <th>Bulan - Tahun</th>
            <th>Meter Awal</th>
            <th>Meter Akhir</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach($pemakaian as $data):
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data->id_pelanggan.' | '.$data->nama_pelanggan ?></td>
            <td><?= $data->nama_bulan.' - '.$data->tahun ?></td>
            <td><?= $data->awal ?> M<sup>3</sup></td>
            <td><?= $data->akhir ?> M<sup>3</sup></td>
            <td><?= $data->status == 'Lunas' ? "<span class='label label-primary'>Lunas</span>" : "<span class='label label-danger'>Belum Bayar</span>"?></td>
            <td>
              <a href="<?= site_url('pemakaian/delete/'.$data->id_pakai) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

</section>