<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Layanan
    <small>Layanan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Layanan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Layanan</h3>
      <div class="pull-right">
        <a href="<?= site_url('layanan') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
      </div>
    </div>

    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <form action="<?= site_url('layanan/editProcess') ?>" method="post">
            <div class="form-group">
              <label for="">Layanan *</label>
              <input type="hidden" name="id" value="<?= $layanan->id_layanan ?>" class="form-control" required>
              <input type="text" name="layanan" value="<?= $layanan->layanan ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Tarif (Rp)*</label>
              <input type="number" name="tarif" value="<?= $layanan->tarif ?>"  class="form-control" required>
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
