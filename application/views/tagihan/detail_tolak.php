<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tagihan
    <small>Tagihan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Detail Tolak</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <b>Detail Penolakan</b>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td>No Tagihan</td>                                          
                  <td width="80%">: <?= $tagihan->id_pakai;?></td>
                </tr>
                <tr>
                  <td>ID | Nama Plg</td>                                          
                  <td width="80%">: <?= $tagihan->id_pelanggan;?> | <?= $tagihan->nama_pelanggan;?></td>
                </tr>
                <tr>
                  <td>Bulan | Tahun</td>
                  <td>: <?= $tagihan->nama_bulan;?> - <?= $tagihan->tahun;?></td>
                </tr>
                <tr>
                  <td>Pemakaian</td>
                  <td>: <?= $tagihan->pakai;?> M<sup>3</sup></td>
                </tr>
                <tr>
                  <td>Tagihan</td>
                  <td>: Rp. <?= number_format($tagihan->tagihan, 0, ',', '.'); ?>,-</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:
                    <span class="label label-danger">Ditolak</span>
                  </td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>: <?= $tagihan->keterangan ?></td>
                </tr>
              </tbody>
            </table>

            <a href="<?= site_url('tagihan/tolak') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
