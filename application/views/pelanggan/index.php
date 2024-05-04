<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pelanggan
    <small>Pelanggan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Pelanggan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pelanggan</h3>
      <div class="pull-right">
        <a href="<?= site_url('pelanggan/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Pelanggan</a>
      </div>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Pelanggan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Status</th>
            <th>Layanan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($pelanggan as $data):
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data->id_pelanggan ?></td>
            <td><?= $data->nama_pelanggan ?></td>
            <td><?= $data->alamat ?></td>
            <td><?= $data->no_hp ?></td>

            <td>
              <?php if($data->status == 'Aktif'){ ?>
                <span class="label label-primary">Aktif</span>
                <a href="<?= site_url('pelanggan/set_nonAktif/'.$data->id_pelanggan); ?>"  title="Non aktifkan!" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-remove"></i></a>
                <?php }
              else{ ?>
                <span class="label label-danger">Tidak Aktif</span>
                <a href="<?= site_url('pelanggan/set_Aktif/'.$data->id_pelanggan); ?>" title="Non aktifkan!" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-ok"></i></a>
              <?php } ?>
            </td>

            <td><?= $data->layanan ?></td>
            <td>
              <a href="<?= site_url('pelanggan/edit/'.$data->id_pelanggan); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
              <a href="<?= site_url('pelanggan/delete/'.$data->id_pelanggan); ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

</section>