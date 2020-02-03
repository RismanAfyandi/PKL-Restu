
<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
            <h3>TAMBAH  SUPPLIER</h3>
            <div class="card-tools">
              <a href="<?=site_url('supplier')?>" type="submit" class="btn btn-danger">BACK</a>
          </div>                             
          </div>

          <div class="card-body">
        <form role="form" action="<?=site_url('supplier/process')?>" id="form" method="post">
                  <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="nm_sup">NAMA SUPPLIER</label>
                    <input type="text" class="form-control" id="nm_sup" name="nm_sup" placeholder="Nama Supplier" required/>
                  </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <TEXTAREA class="form-control" id="alamat" name="alamat" placeholder="Alamat" required/></TEXTAREA>
                  </div>
                  </div>
                </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name ="add" class="btn btn-success">SIMPAN</button>
                <button type="reset" name ="reset" class="btn btn-warning">RESET</button>
                </div>
              </form>

    </div>
  </div>
</div>
</div>
</section>