<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $jml_pelanggan ?></h3>
          <p>pelanggan</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="<?= site_url('pelanggan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $jml_tagihan ?></h3>
          <p>Data Tagihan</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $jml_lunas ?></h3>
          <p>Data Tagihan (Lunas)</p>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="<?= site_url('tagihan/lunas') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $jml_belumBayar ?></h3>
          <p>Data Tagihan (Belum Bayar)</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?= site_url('tagihan/belumBayar') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
  </div>
  <!-- /.row (main row) -->

</section>
<!-- /.content -->


  