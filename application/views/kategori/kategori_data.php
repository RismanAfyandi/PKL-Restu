<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-right">
             <h3>DATA KATEGORI</h3>           
          </div>
          <div class="card-tools">
              <a href="<?=site_url('kategori/add') ?>" class="btn btn-flat btn-primary"><i class="fas fa-plus"></i>ADD</a>
             
            </div>         
          </div>
          <div class="card-body">
      <table class="table table-condensed" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>Kategori ID</th>
            <th>Nama Kategori</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;
          foreach ($row->result() as $key => $data) { ?>
          <tr>
            <td><?=$no++?>.</td>
            <td><?=$data->kat_id?></td>
            <td><?=$data->nm_kat?></td>
            <td><a type="button" href="<?=site_url('kategori/edit/'.$data->kat_id)?>" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i><span>EDIT</span></a>   <a type="button" href="<?=site_url('kategori/del/'.$data->kat_id)?>" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i><span>HAPUS</span></a></td>
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
