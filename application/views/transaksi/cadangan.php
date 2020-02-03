<section class="content-header">
  
</section>
    
<section class="content">
  <!-- KOLOM DATA BARANG -->
  <div class="row">
   <div class="col-4">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <div class="row">
              <div class="col-3">
                <label>KODE</label>
              </div>
              <div class="col-9">
                <input type="text" class="form-control" id="kode">
              </div>
            </div>
          </div>
        <div class="form-group">
          <div class="row">
              <div class="col-3">
              <label>BARANG</label>
              </div>
              <div class="col-9">
              <input type="text" id="barang" class="form-control" disabled>
              </div>
            </div>
          </div>
          <div class="form-group">
          <div class="row">
              <div class="col-9">
                <button class="btn btn-success btn-sm" id="cari" data-toggle="modal" data-target="#modal_barang"><i class="fas fa-search" ></i>Cari</button>
              </div>
              <div class="col-3">
                
              <button class="btn btn-primary btn-sm" id="add"><i class="fas fa-cart-plus"></i><span> Add</span></button>
              
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
         <!-- KOLOM DATA PELANGGAN -->
      <div class="col-4">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <div class="row">
                <div class="col-3">
                <label>HARGA</label>
                </div>
                <div class="col-9">
                <input type="text" class="form-control" id="harga" disabled>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-3">
                <label>QTY</label>
                </div>
                <div class="col-9">
                <input type="text" id="qty" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col-3">
                <label>POT</label>
                </div>
                <div class="col-9">
                <input type="text" id="pot" class="form-control">
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      <!-- KOLOM INVOICE -->
      <div class="col-4">
        <div class="card">
          <div class="card-body">
            <div class="float-right">
               <h3><b><?php echo $kode; ?></b></h3>
              </div>
              <br/>
              <br/>
              <br/>
              <br/>
            
            <div class="float-right">
              <label><?php echo date('d M Y'); ?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabel -->
    <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped" id="table-jual">
              <thead>
                <tr>
                  <th>#</th>
                  <th>KODE BARANG</th>
                  <th>NAMA BARANG</th>
                  <th>HARGA</th>
                  <th>QTY</th>
                  <th>POTONGAN</th>
                  <th>JUMLAH</th>
                </tr>
              </thead>
              <tbody id="target">
            
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- INFO PEMBAYARAN -->
    <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <div class="row">
              <div class="col-3">
              <label>Sub Total</label>
              </div>
              <div class="col-9">
              <input type="text" id="sub" name="sub" class="form-control" disabled>
              </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-3">
              <label>Potongan</label>
              </div>
              <div class="col-9">
              <input type="text" id="totpot" name="totpot" class="form-control" disabled/>
              </div>
            </div>
          </div>
          <div class="form-group">
          <div class="row">
              <div class="col-3">
              <label>Total</label>
              </div>
              <div class="col-9">
              <input type="text" id="tot" name="tot" class="form-control" disabled>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>

      <div class="col-4">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <div class="row">
              <div class="col-3">
              <label>User</label>
              </div>
              <div class="col-9">
              <input type="text" name="user_id" class="form-control" disabled>
              </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-3">
              <label>Customer</label>
              </div>
              <div class="col-9">
              <input type="text" name="nm_pel" class="form-control" >
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>

      <div class="col-4">
        <button type="button" class="btn btn-warning"><i class="fas fa-sync"></i><span>  Cancel</span></button><br/><br/>
        <button type="button" class="btn btn-success"><i class="fas fa-paper-plane"></i><span>  Proses Pembayaran</span></button>
      </div>

    </div>
</section>
<div class="modal fade" id="modal_barang">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pilih Data Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-condensed table-striped " id="table1" style="width:100%">
        <thead>
          <tr>
            <th width="10px">Kode Barang</th>
            <th width="150px;">Nama Barang</th>
            <th width="10px;">Stok</th>
            <th width="20px">Harga Jual</th>
            <th width="5px">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($barang as $key => $data) { ?>
          <tr style="font-size: 10pt;">
            <td><?=$data->kd_bar?></td>
            <td><?=$data->nm_bar?></td>
            <td><?=$data->stok?></td>
            <td><?=$data->hjual?></td>
            <td>
              <button class="btn btn-success btn-xs" id="select" 
              data-id="<?=$data->kd_bar?>"
              data-nmbar="<?=$data->nm_bar?>"
              data-hjual="<?=$data->hjual?>"><i class="fa fa-check"></i><span>Select</span> 
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

<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script>
   $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var id = $(this).data('id');
      var nmbar = $(this).data('nmbar');
      var hjual = $(this).data('hjual');
      $('#kode').val(id);
      $('#barang').val(nmbar);
      $('#harga').val(hjual);
    })
  })

   $(function() {




    // var set_number = function() {
    //   var table_len = $('#table_jual tbody tr').length+1;
    //   $('#no').val(table_len);
    // }

    // set_number();
    $(document).on('click', '#add', function() {



      
      var kd_bar = [];
      var nm_bar = [];
      var hjual = [];
      var qty = [];
      var pot = [];
      var jum = [];
       var sub = 0;
       var totpot = 0;
       var tot = 0;
      
      
      var mytable = $('#target tr').length;
      var i = mytable + 1;
      var x = mytable;
      


      kd_bar[x] = $('#kode').val();
      nm_bar[x] = $('#barang').val();
      hjual[x] = $('#harga').val();
      qty[x] = $('#qty').val();
      pot[x] = $('#pot').val();
      jum[x] = (hjual[x] - pot[x]) * qty[x];
      
      
      

      var addtr = '<tr><td>'+i+'</td>  <td>'+kd_bar[x]+'</td>  <td>'+nm_bar[x]+'</td>  <td>'+hjual[x]+'</td>  <td>'+qty[x]+'</td>  <td>'+pot[x]+'</td>  <td>'+jum[x]+'</td></tr>';


      $('#target').append(addtr);
     
     
      
      for (var a = 0; a < mytable+1; a++) {
      sub = parseInt(hjual[x])+sub;
      totpot = parseInt(pot[x])+totpot;
      tot = parseInt(jum[x])+tot;
      
      }
      $('#sub').val(sub);
      $('#totpot').val(totpot);
      $('#tot').val(tot);
      
      

    })

    

   })


   
    
   // }

</script>