<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
            <h3>EDIT BARANG</h3>
            <div class="card-tools">
              <a href="<?=site_url('barang')?>" type="submit" class="btn btn-danger">BACK</a>
          </div>                             
          </div>

          <div class="card-body">
        <form role="form" action="<?=site_url('barang/process')?>" id="form" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                    <input type="hidden" name="kd_bar" value="<?=$row->kd_bar?>">
                    <label for="nm_bar">NAMA BARANG</label>
                    <input type="text" class="form-control" id="nm_bar" name="nm_bar" value="<?=$row->nm_bar?>" >
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="kategori">KATEGORI</label>
                    
                    <select class="form-control" name="kat_id">
                      <option value="<?=$row->kat_id?>"><?=$row->nm_kat?></option>
                    </select>
                    
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="stok">STOK</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="<?=$row->stok?>" required/>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="hjual">HARGA JUAL</label>
                    <input type="text" class="form-control" id="hjual" name="hjual" value="<?=$row->hjual?>">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="beli">HARGA BELI</label>
                    <input type="text" class="form-control" id="hbeli" name="hbeli" value="<?=$row->hbeli?>">
                  </div>
                </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name ="edit" class="btn btn-success">SIMPAN</button>
                <button type="reset" name ="reset" class="btn btn-warning">RESET</button>
                </div>
              </form>

    </div>
  </div>
</div>
</div>
