<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable{

      width:600px;
      border-radius: 5px;
    }
    .short{
      width: 10px;
    }
    .normal{
      width: 150px;
    }
    table{
      border-collapse: collapse;
      font-family: opensans;
      color:#5E5B5C;
      width: 600px;
    }
    thead th{
      text-align: left;
      padding: 2px;
      font-size: 10pt;
    }
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 2px;
      font-size: 10pt;
    }
    tbody tr:nth-child(even){
      background: #F6F5FA;
      font-size: 10pt;
    }
    tbody tr:hover{
      background: #EAE9F5
      font-size: 10pt;
    }
  </style>
</head>
<body>
  <h3>LAPORAN INVOICE LUNAS</h3>
  <!-- In production server. If you choose this, then comment the local server and uncomment this one-->
  <!-- <img src="<?php // echo $_SERVER['DOCUMENT_ROOT']."/media/dist/img/no-signal.png"; ?>" alt=""> -->
  <!-- In your local server -->
  <div id="outtable">
    <h4>TOTAL : <?php echo $sum; ?></h4>
    <table>
      <thead>
        <tr>
          <th class="short">#</th>
          <th class="short">INVOICE</th>
          <th class="short">TANGGAL TRANSAKSI</th>
          <th class="short">KODE SERVICE</th>
          <th class="short">NAMA PELANGGAN</th>
          <th class="short">TIPE</th>
          <th class="short">TINDAKAN</th>
          <th class="short">BIAYA</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1;
        $sum = 0;
        ?>
        <?php foreach($row->result() as $key => $data) { ?>
          <tr>
          <td><?=$no++?></td>
          <td><?=$data->invoice?></td>
          <td><?=$data->tgl_transaksi?></td>
          <td><?=$data->kd_serv?></td>
          <td><?=$data->nm_pel?></td>
          <td><?=$data->tipe?></td>
          <td><?=$data->tindakan?></td>
          <td><?=$data->biaya?></td>
          </tr>
          
          <?php

        }
          ?>
          

      </tbody>
      
    </table>
   </div>
</body>
</html>
<script type="text/javascript">
  function convertToRupiah(angka)
  {
  var rupiah = '';    
  var angkarev = angka.toString().split('').reverse().join('');
  for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
  return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
</script>