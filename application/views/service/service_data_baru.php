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
          <div class="card-tools">
              <a href="<?=site_url('service/add') ?>" class="btn btn-flat btn-primary"><i class="fas fa-plus"></i>ADD</a>
             
            </div>         
          </div>
          <div class="card-body">
      <table class="table table-condensed" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Service</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Masuk</th>
            <th>Kontak</th>
            <th>Tipe</th>
            <th>Kelengkapan</th>
            <th>Keluhan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;
          foreach ($row->result() as $key => $data) { ?>
          <tr>
            <td><?=$no++?>.</td>
            <td><?=$data->kd_serv?></td>
            <td><?=$data->nm_pel?></td>
            <td><?=$data->tgl_masuk?></td>
            <td><?=$data->no_telp?></td>
            <td><?=$data->tipe?></td>
            <td><?=$data->kelengkapan?></td>
            <td><?=$data->keluhan?></td>
            <td><a type="button" href="<?=site_url('service/update/'.$data->kd_serv)?>" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i><span>UPDATE</span></a><a type="button" href="<?=site_url('service/clear/'.$data->kd_serv)?>" class="btn btn-xs btn-danger"><i class="fas fa-print"></i><span>PRINT</span></a></td>
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
