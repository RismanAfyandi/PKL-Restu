<section class="content-header">
  
</section>

<section class="content">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="pull-right">
             <h3>DATA SUPPLIERI</h3>           
          </div>
          <div class="card-tools">
              <a href="<?=site_url('supplier/add') ?>" class="btn btn-flat btn-primary"><i class="fas fa-plus"></i>ADD</a>
             
            </div>         
          </div>
          <div class="card-body">
      <table class="table table-condensed" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>Supplier ID</th>
            <th>Nama supplier</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;
          foreach ($row->result() as $key => $data) { ?>
          <tr>
            <td><?=$no++?>.</td>
            <td><?=$data->sup_id?></td>
            <td><?=$data->nm_sup?></td>
            <td><?=$data->alamat?></td>
            <td><a type="button" href="<?=site_url('supplier/edit/'.$data->sup_id)?>" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i><span>EDIT</span></a>   <a type="button" href="<?=site_url('supplier/del/'.$data->sup_id)?>" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i><span>HAPUS</span></a></td>
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
