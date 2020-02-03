<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
            <h3>UPDATE SERVICE</h3>
            </div> 
            <div class="card-tools">
              <a href="<?=site_url('service')?>" type="submit" class="btn btn-danger">BACK</a>
          </div>                             
          </div>

          <div class="card-body">
        <form role="form" id="form" method="post" action="<?=site_url('service/process')?>">
                <div class="card-body">
                  <input type="hidden" name="kd_serv" value="<?=$row->kd_serv?>" >
                  <div class="form-group">
                    <label for="ket">KETERANGAN UPDATE</label>
                    <textarea name="ket" class="form-control"></textarea>
                  </div>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name ="selesai" class="btn btn-success">SELESAI</button>
                </div>
              </form>

    </div>
  </div>
</div>
        <div class="col-6">
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
            <h3>SERVICE DATA</h3>
            </div>                              
          </div>

          <div class="card-body">
            <table border="0">
              <tbody>
                <tr>
                <td>Kode Service</td>
                <td>:</td>
                <td><b><?=$row->kd_serv?></b></td>
              </tr>
              <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><b><?=$row->nm_pel?></b></td>
              </tr>
              <tr>
                <td>Tipe</td>
                <td>:</td>
                <td><b><?=$row->tipe?></b></td>
              </tr>
              <tr>
                <td>Keluhan</td>
                <td>:</td>
                <td><b><?=$row->keluhan?></b></td>
              </tr>
              </tbody>
            </table>
    </div>
  </div>
</div>        
</div>
</section>
