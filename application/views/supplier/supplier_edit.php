
<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
            <h3>EDIT  SUPPLIER</h3>
            <div class="card-tools">
              <a href="<?=site_url('supplier')?>" type="submit" class="btn btn-danger">BACK</a>
          </div>                             
          </div>

          <div class="card-body">
        <form role="form" action="<?=site_url('supplier/process')?>" id="form" method="post">
                  <div class="row">
                    <input type="hidden" name="sup_id" value="<?=$row->sup_id?>">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="nm_sup">NAMA SUPPLIER</label>
                    <input type="text" class="form-control" id="nm_sup" name="nm_sup" value="<?= $row->nm_sup?>" required/>
                  </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <TEXTAREA class="form-control" id="alamat" name="alamat" required/><?= $row->alamat?></TEXTAREA>
                  </div>
                  </div>
                </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name ="edit" class="btn btn-success">EDIT</button>
                <button type="reset" name ="reset" class="btn btn-warning">RESET</button>
                </div>
              </form>

    </div>
  </div>
</div>
</div>
</section>