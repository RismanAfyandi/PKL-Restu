<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-right">
             <h3>DATA BARANG</h3>           
          </div>
          <div class="card-tools">
              <a href="<?=site_url('barang/add') ?>" class="btn btn-flat btn-primary"><i class="fas fa-plus"></i>ADD</a>
             
            </div>         
          </div>
          <div class="card-body">
      <table class="table table-condensed" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;
          foreach ($row->result() as $key => $data) { ?>
          <tr>
            <td><?=$no++?>.</td>
            <td><?=$data->kd_bar?></td>
            <td><?=$data->nm_bar?></td>
            <td><?=$data->stok?></td>
            <td><?=$data->nm_kat?></td>
            <td><?=$data->hjual?></td>
            <td><?=$data->hbeli?></td>
            <td><a type="button" href="<?=site_url('barang/edit/'.$data->kd_bar)?>" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i><span>EDIT</span></a>   <a type="button" href="<?=site_url('barang/del/'.$data->kd_bar)?>" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i><span>HAPUS</span></a></td>
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
