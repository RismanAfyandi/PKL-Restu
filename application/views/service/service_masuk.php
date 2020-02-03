<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
            <h3>TAMBAH SUPPLIER</h3>
            <div class="card-tools">
              <a href="<?=site_url('service')?>" type="submit" class="btn btn-danger">BACK</a>
          </div>                             
          </div>

          <div class="card-body">
        <form role="form" action="<?=site_url('service/process')?>" id="form" method="post">
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" name="kd_serv" value="<?= $row->kode?>">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="nm_pel">NAMA PELANGGAN</label>
                    <input type="text" class="form-control" id="nm_pel" name="nm_pel" placeholder="Nama Pelanggan" required/>
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="no_telp">KONTAK</label>
                    <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Kontak Pelanggan" required/>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="tgl_masuk">TANGGAL</label>
                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?=date('Y-m-d')?>" placeholder="tgl_masuk Masuk">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="tipe">MERK / TIPE</label>
                    <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Merk / Tipe" >
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="kelengkapan">KELENGKAPAN</label>
                    <input type="text" class="form-control" id="kelengkapan" name="kelengkapan" placeholder="kelengkapan">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="keluhan">KELUHAN</label>
                    <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Keluhan" >
                  </div>
                </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" name ="add" class="btn btn-success" value="SIMPAN" />
                <button type="reset" name ="reset" class="btn btn-warning">RESET</button>
                </div>
              </form>

    </div>
  </div>
</div>
</div>
<script type="text/javascript">
$('#datepicker').datepicker({
    format: 'yyyy/mm/dd'

});
</script>