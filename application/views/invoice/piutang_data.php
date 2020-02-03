<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-right">
             <h3>SERVICE BARU</h3>           
          </div>         
          </div>
          <div class="card-body">
      <table class="table table-condensed" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>INVOICE</th>
            <th>TANGGAL TRANSAKSI</th>
            <th>KODE SERVICE</th>
            <th>NAMA PELANGGAN</th>
            <th>TIPE</th>
            <th>TINDAKAN</th>
            <th>BIAYA</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($row->result() as $key => $data) { ?>
          <tr>
            <td><?=$no++?>.</td>
            <td><?=$data->invoice?></td>
            <td><?=$data->tgl_transaksi?></td>
            <td><?=$data->kd_serv?></td>
            <td><?=$data->nm_pel?></td>
            <td><?=$data->tipe?></td>
            <td><?=$data->tindakan?></td>
            <td><?=$data->biaya?></td>
            <td><a type="button" href="<?=site_url('service/clear/'.$data->kd_serv)?>" class="btn btn-xs btn-danger"><i class="fas fa-print"></i><span>PRINT</span></a></td>
          </tr>
          <?php
          }
          ?>
        </tbody>    
      </table>

    </div>
  </div>
</div>
</div>
</section>
