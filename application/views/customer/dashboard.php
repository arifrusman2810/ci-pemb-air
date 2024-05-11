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
  <hr>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->

  <h2>Selamat Datang</h2>
  <h3>
    <?= $this->session->userdata('user_id') ?> | 
    <b><?= $this->session->userdata('nama') ?></b> (Pelanggan),
    di aplikasi Pembayaran Tagihan Air.
  </h3>
  <br>

  <div class="row">
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <!-- <div class="small-box bg-yellow">
        <div class="inner">
          <h3>123</h3>
          <p>Data Tagihan (Lunas)</p>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div> -->
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <!-- <div class="small-box bg-red">
        <div class="inner">
          <h3>123</h3>
          <p>Data Tagihan (Belum Bayar)</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div> -->
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