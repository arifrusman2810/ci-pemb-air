<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pemakaian
    <small>Pemakaian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Pemakaian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tambah Data Pemakaian</h3>
      <div class="pull-right">
        <a href="<?= site_url('pemakaian') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
      </div>
    </div>

    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <form action="<?= site_url('pemakaian/addProcess') ?>" method="post">
            <div class="form-group">
              <label for="">Nama Pelanggan *</label>
              <select name="pelanggan" id="pelanggan" class="form-control">
                <option value="">-- Pilih Pelanggan --</option>
                <?php
                foreach($pelanggan as $data): ?>
                  <option value="<?= $data->id_pelanggan ?>"><?= $data->id_pelanggan ?> | <?= $data->nama_pelanggan ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Bulan *</label>
              <select name="bulan" id="" class="form-control">
                <option value="">-- Pilih Bulan --</option>
                <?php
                foreach($bulan as $data): ?>
                  <option value="<?= $data->id_bulan ?>"><?= $data->nama_bulan ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Tahun</label>
              <input type="text" name="tahun" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Meteran Bulan Lalu (M<sup>3</sup>)</label>
              <input type="text" name="awal" id="awal" class="form-control" required readonly>
            </div>
            <div class="form-group">
              <label for="">Meteran Bulan Ini (M<sup>3</sup>)*</label>
              <input type="text" name="akhir" id="akhir" class="form-control" required>
              <small class="text-danger"><i>Inputan harus lebih besar dari meteran bulan lalu!</i></small>
            </div>
            <div class="form-group">
              <label for="">Pemakaian (Bulan ini - Bulan lalu) (M<sup>3</sup>)</label>
              <input type="text" name="total" id="total" class="form-control" required readonly>
            </div>

            <div class="form-group">
              <input type="hidden" class="form-control" name="tarif" id="tarif" value="" readonly>
            </div>
            
            <div class="form-group">
              <input type="hidden" class="form-control" name="harga" id="harga" value="" readonly>
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

<script>
  // Mencari meteran bulan lalu
  $(document).ready(function(){
		$('#pelanggan').change(function(){
			var pelanggan = $(this).val();
      // alert(id_pelanggan);
			$.ajax({  
				url: '<?= site_url('pemakaian/getAwal') ?>',
				type: "POST",
				data:{'id_pelanggan':pelanggan},
				success:function(data){
					$('#awal').val(data);
				}  
			});

      // Mencari tarif layanan
      $.ajax({
        url: '<?= site_url('pemakaian/getTarif') ?>',
        type: 'POST',
        data: {'id_pelanggan':pelanggan},
        success: function(data){
          $('#tarif').val(data);
        }
		});  
	});

  $(document).ready(function() {
    // Menghitung pemakaian
		$("#akhir, #awal").keyup(function() {
      var awal  = $("#awal").val();
			var akhir = $("#akhir").val();
			var total = parseInt(akhir) - parseInt(awal);
			$("#total").val(total);

      // Menghitung tarif pemakaian
			var tarif = $("#tarif").val();
			var harga = parseInt(total) * parseInt(tarif);
			$("#harga").val(harga);
      });
		});
	});

  // 


</script>

