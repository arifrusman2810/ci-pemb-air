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
      <h3 class="box-title">Tambah Data Pelanggan</h3>
      <div class="pull-right">
        <a href="<?= site_url('pelanggan') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
      </div>
    </div>

    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <form action="<?= site_url('pelanggan/addProcess') ?>" method="post">
            <div class="form-group">
              <label for="">ID Pelanggan *</label>
              <input type="text" name="id" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Nama Pelanggan *</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Alamat *</label>
              <textarea name="alamat" class="form-control" id="" required></textarea>
            </div>
            <div class="form-group">
              <label for="">Telephon *</label>
              <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Pilih Layanan *</label>
              <select name="layanan" class="form-control">
                <option value="">-- Pilih Layanan --</option>
                <?php
                foreach ($layanan as $layanan) { ?>
                  <option value="<?= $layanan->id_layanan ?>"><?= $layanan->layanan ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Username *</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Password *</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
              <button type="reset" class="btn btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>