
<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
            <h3>EDIT  KATEGORI</h3>
            <div class="card-tools">
              <a href="<?=site_url('kategori')?>" type="submit" class="btn btn-danger">BACK</a>
          </div>                             
          </div>

          <div class="card-body">
        <form role="form" action="<?=site_url('kategori/process')?>" id="form" method="post">
                  <div class="row">
                    <input type="hidden" value="<?=$row->kat_id?>" name="kat_id">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="nm_kat">NAMA KATEGORI</label>
                    <input type="text" class="form-control" id="nm_kat" name="nm_kat" value="<?=$row->nm_kat?>" required/>
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