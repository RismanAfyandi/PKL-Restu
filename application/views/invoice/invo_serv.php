<section class="content-header">
  
</section>

<section class="content">
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
            <h3>INPUT INVOICE</h3> 
            <div class="card-tools">
              <a href="<?=site_url('service')?>" type="submit" class="btn btn-danger">BACK</a>
          </div>                             
          </div>
        </div>

        <form role="form" id="form" method="post" action="<?=site_url('invoice/process')?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                  <div class="form-group">
                      <input type="hidden" name="invoice" value="<?php echo $kode ?>">
                  </div>
                </div>
              </div>
                  <div class="row"> 
                    <div class="col-6">
                      <label>KODE SERVICE</label>
                  <div class="form-group input-group">
                  <input type="text" name="kd_serv" id="kd_serv" class="form-control">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_service"><i class="fa fa-search"></i></button>
                  </div>
                  <div class="form-group">
                    <label for="tgl_transaksi">TANGGAL TRANSAKSI</label>
                    <input type="date" name="tgl_transaksi" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="biaya">BIAYA</label>
                    <input type="number" name="biaya" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>STATUS PEMBAYARAN</label>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="cash" name="status" value="CASH" checked>
                          <label for="cash" class="custom-control-label">CASH</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="piutang" value="PIUTANG" name="status" >
                          <label for="piutang" class="custom-control-label">PIUTANG</label>
                        </div>
                      </div>
                  <div class="form-group">
                    <label for="tindakan">TINDAKAN</label>
                    <input type="text" id="tindakan" name="tindakan" class="form-control">
                  </div>

                  </div>
                   </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name ="add" class="btn btn-success">SIMPAN</button>
                </div>

              </form>

    </div>
</div>     
</section>

<div class="modal fade" id="modal_service">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pilih Data Service</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-condensed table-striped " id="table1" style="width:100%">
        <thead>
          <tr>
            <th>Kode Service</th>
            <th>Nama Pelanggan</th>
            <th>Unit</th>
            <th>Keluhan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;
          foreach ($service as $key => $data) { ?>
          <tr>
            <td><?=$data->kd_serv?></td>
            <td><?=$data->nm_pel?></td>
            <td><?=$data->tipe?></td>
            <td><?=$data->keluhan?></td>
            <td>
              <button class="btn btn-success btn-xs" id="select" data-id="<?=$data->kd_serv?>"><i class="fa fa-check"></i><span>Select</span> 
              </button>
            </td>
          </tr>
          <?php
        }
        ?>
        </tbody>    
      </table>
      </div>
          
        </h4>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script>
   $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var kd_serv = $(this).data('id');
      $('#kd_serv').val(kd_serv);
    })
  })

</script>