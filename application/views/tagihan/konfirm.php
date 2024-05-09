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
          <b>Konfirmasi Pembayaran</b>
        </div>
        <div class="panel-body">

          <div class="row">
            <div class="col-md-6">
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
              </div>
            </div>
            <div class="col-md-6">
            <img src="<?= base_url('uploads/'.$tagihan->foto) ?>" alt="" class="img-responsive">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <form action="<?= site_url('tagihan/konfirmProcess') ?>" method="POST">
                <div class="form-group">
                  <input type='hidden' class="form-control" name="id_tagihan" value="<?= $tagihan->id_tagihan; ?>" readonly/>
                </div>
                <div class="form-group">
                  <input type='hidden' class="form-control" name="tagih" id="tagih" value="<?= $tagihan->tagihan; ?>" readonly/>
                </div>
                <!-- <div class="form-group">
                  <label>Uang Pembayaran (Rp)*</label>
                  <input type='text' class="form-control" name="bayar" id="bayar" placeholder="Uang pembayaran" required>
                </div> -->
                <!-- <div class="form-group">
                  <label>Uang Kembalian (Rp)</label>
                  <input type='text' class="form-control" name="kembali" id="kembali" readonly/>
                </div> -->
                <hr>
                <div class="form-group">
                  <small class="text-danger">
                    <i>
                      <b>Warning : </b> Pastikan jumlah uang sesuai dengan tagihan! <br>
                      Ketika di klik "konfirmasi" maka status tagihan akan menjadi lunas!
                    </i>
                  </small>
                </div>
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success btn-flat"> Konfirmasi</button>
                  <a href="<?= site_url('tagihan/tungguKonfirm') ?>" class="btn btn-warning btn-flat"> Kembali</a>
                </div>
              </form>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
	$(document).ready(function() {
		$("#tagih, #bayar").keyup(function() {
			var tagih  = $("#tagih").val();
			var bayar = $("#bayar").val();
			var kembali = parseInt(bayar) - parseInt(tagih);
			$("#kembali").val(kembali);
		});
	});
</script>