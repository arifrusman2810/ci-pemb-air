<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tagihan
    <small>Tagihan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Bayar Tagihan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <b>Pembayaran tagihan</b>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
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
                    <span class="label label-danger"><?= $tagihan->status ?></span>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr>

            <h5 class="mt-3">Silahkan melakukan tranfer ke rekening</h5>
            <h4>MANDIRI - 108 000 XXXX XXX </h4> 
            <h5>a/n</h5> 
            <h4 style="margin-bottom:0 !important;">PT TIRTA SEMESTA</h4> 
            <small class="text-danger"><i>Jangan lupa upload bukti transfernya!</i></small>
            <hr>

            <form action="<?= site_url('customer/tagihan/bayarProcess') ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <input type='hidden' class="form-control" name="id_tagihan" value="<?= $tagihan->id_tagihan; ?>" readonly/>
              </div>
              <div class="form-group">
                <input type='hidden' class="form-control" name="tagih" id="tagih" value="<?= $tagihan->tagihan; ?>" readonly/>
              </div>
              <div class="form-group">
                <label>Upload bukti bayar*</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Upload bukti bayar!" required>
                <small class="text-danger"><i>Format file harus jpg|jpeg|png dan tidak max 2MB</i></small>
              </div>
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-flat"> Bayar</button>
                <a href="<?= site_url('customer/tagihan/tolak') ?>" class="btn btn-warning btn-flat"> Kembali</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 