<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Laporan
    <small>Laporan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Laporan Pemasukan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-8 col-sm-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <b>Laporan Pemasukan</b>
        </div>
        <div class="panel-body">
          <form action="<?= site_url('laporan/cetakLapMasuk') ?>" method="POST" target="_blank">
            <div class="form-group">
              <label>Tanggal Awal</label>
              <input type="date" class="form-control" name="tgl1" required/>
            </div>
            <div class="form-group">
              <label>Tanggal Akhir</label>
              <input type="date" class="form-control" name="tgl2" required/>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-info btn-flat"><i class="fa fa-print"></i> Cetak</button>
              <button type="reset" class="btn btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>