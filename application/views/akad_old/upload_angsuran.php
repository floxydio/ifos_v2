<!DOCTYPE html>
<?php
 $aplikasi = $db['no_aplikasi'];
  $angsuran = $dbangsuran['no_aplikasi'];

  ?>
<html>

<head>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>

 <div class="container">

  <h3 align="center">Upload Data Angsuran</h3>

  <form method="post" id="import_form" enctype="multipart/form-data">

     <p><label>Pilih File Excel</label>

     <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
      <input type="hidden" name="angsuran" id="angsuran" value="<?php echo $angsuran; ?>" />
     <br />

     <input type="submit" id="import" name="import" value="Import" class="btn btn-info" />
       <input type="submit" id="delete" name="delete" value="Delete" class="btn btn-danger" />
  </form>

  <br />

  <div class="table-responsive" id="customer_data">

  </div>

 </div>

</body>

</html>



<script>

$(document).ready(function(){
     var angsuran = $("#angsuran").val();
   function load_data(){
    $.ajax({
      url:"<?php echo site_url(); ?>verifikasi/fetch/<?php echo $aplikasi; ?>",
      method:"POST",
     success:function(data){
        $('#customer_data').html(data);
      }
   })
  }

    if(angsuran!=""){
    load_data();
      $("#import").attr('disabled','disabled');
      }else{
       load_data();
           $("#import").removeAttr('enabled','enabled');


    }

  $('#import_form').on('submit', function(event){

    event.preventDefault();

    $.ajax({
       url:"<?php echo site_url(); ?>verifikasi/import_excel/<?php echo $aplikasi; ?>",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
       dataType: "JSON",
      success:function(data){
     if(data.tanda=='success'){
      message(''+data.tanda, ''+data.msg);
        $("#import").attr('disabled','disabled');
        load_data();
        }else{
           message(''+data.tanda, ''+data.msg);
        }
      }

    })

  });

    $('#delete').click(function(event){

    event.preventDefault();

    var kode = "<?php echo $db['no_aplikasi']; ?>";

   	var string = "kode="+kode;

	var pilih = confirm('Data yang akan dihapus username = '+kode+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/hapusangsuran",
			data	: string,
			cache	: false,
			success	: function(data){
		   			   message('success', 'Data berhasil di hapus');
                           $("#import").removeAttr('disabled');
               load_data();
			}
		});
	}

  });


});

</script>