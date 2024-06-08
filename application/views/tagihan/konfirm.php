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
                  <label for="">Status</label>
                  <select name="status" id="" class="form-control" required>
                    <option value="">Pilih Status</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Tolak">Tolak</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Keterangan</label>
                  <textarea name="keterangan" id="" class="form-control" row="4" col="3" placeholder="Keterangan..."></textarea>
                </div>
                <div class="form-group">
                  <label for="">Refund</label>
                  <input type="number" class="form-control" name="refund" placeholder="Refund...">
                  <small class="text-danger"><i>Isi hanya jika ada kelebihan bayar!</i></small>
                </div>

                <div class="form-group">
                  <small class="text-danger">
                    <i>
                      <b>Warning : </b> Pastikan jumlah uang sesuai dengan tagihan!
                    </i>
                  </small>
                </div>
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success btn-flat"> Proses</button>
                  <a href="<?= site_url('tagihan/tungguKonfirm') ?>" class="btn btn-warning btn-flat"> Kembali</a>
                </div>
              </form>


              </div>
            </div>
            <div class="col-md-6">
            <?php 
            $id_tagihan = $tagihan->id_tagihan;
            $query = $this->db->query("SELECT * FROM tb_foto WHERE id_tagihan = '$id_tagihan'");
            $result = $query->result();
            foreach($result as $result):
            ?>
              <img src="<?= base_url('uploads/'.$result->foto) ?>" alt="" class="img-responsive">
            <?php endforeach; ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
