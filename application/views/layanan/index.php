<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Layanan Air
    <small>Layanan Air</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Layanan Air</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Layanan Air</h3>
      <div class="pull-right">
        <a href="<?= site_url('layanan/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Layanan Air</a>
      </div>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Layanan</th>
            <th>Tarif</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($layanan as $data):
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data->layanan ?></td>
            <td><?= $data->tarif ?></td>
            <td>
              <a href="<?= site_url('layanan/edit/'.$data->id_layanan); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
              <a href="<?= site_url('layanan/delete/'.$data->id_layanan); ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

</section>