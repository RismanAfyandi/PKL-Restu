<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-right">
             <h3>SERVICE CANCEL</h3>           
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
