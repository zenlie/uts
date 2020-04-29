<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Barang</a>
        </li>
        <li class="breadcrumb-item active">Data Barang</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-list"></i>Barang
            <?php echo anchor('Barang/tambah','Tambah Barang',array('class'=>'btn btn-primary')) ?>
        </div>
        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Barang</th>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="tbodyBarang">
                    </tbody>                    
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID Barang</th>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="myModalBarang" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>

    window.onload = function() {
      getDataBarang();
    };

    function getDataBarang(){
    $.ajax({ 
        type: 'GET', 
        url: 'http://localhost/abs/api/ApiBarang', 
        data: {}, 
        dataType: 'json',
        success: function (data) { 
            if(data != '') {
                html_val = '';
                no = 1;
                jQuery.each(data, function(i, val) {
                    html_val += '<tr>';
                    html_val += '<td align="center">'+no+'</td>';
                    html_val += '<td>'+val.nm_barang+'</td>';
                    html_val += '<td>'+val.nm_barang+'</td>';
                    html_val += '<td>'+val.nm_barang+'</td>';
                    html_val += '<td>'+val.nm_barang+'</td>';
                    html_val += 
                        '<td></td>'
                    ;
                    html_val += '</tr>';
                    no++;
                });
                $('.tbodyBarang').html(html_val);  
            }else{      
                $('.tbodyBarang').html('<tr><td colspan="24" align="center">Tidak ada data ditahun '+ta+'</td></tr>'); 
            }              

        }
    });
}
</script>