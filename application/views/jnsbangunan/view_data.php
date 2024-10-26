<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $id_jnsbngn = $biayadata->id_jnsbngn;
           $nm_jnsbngn = $biayadata->nm_jnsbngn;


	  }else{

          $id_jnsbngn = '';
           $nm_jnsbngn ='';


	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Jenis Bangunan</label>
        <div class="col-lg-5">
                      <input type="hidden" name="id_jnsbngn" id="id_jnsbngn" class="form-control" value="<?php echo $id_jnsbngn;?>">
  
                 <input type="text" name="nm_jnsbngn" id="nm_jnsbngn" class="form-control" value="<?php echo $nm_jnsbngn;?>">
  
        </div>
    </div>

    </form>
    <div class="form-group well">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <button id="kembali" class="btn btn-warning"><i class="glyphicon glyphicon-ok"></i> Kembali</button>
    </div>

       <script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});

    	$("#view").show();

  

        $("#kembali").click(function(){
    window.location.assign('<?php echo base_url();?>jnsbangunan');
	});



	$("#simpan").click(function(){
     	var id_jnsbngn 	= $("#id_jnsbngn").val();
		var nm_jnsbngn = $("#nm_jnsbngn").val();

		var string = "id_jnsbngn="+id_jnsbngn+"&nm_jnsbngn="+nm_jnsbngn;




        

         if(nm_jnsbngn==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Jenis Bangunan Belum Diisi',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_jnsbngn").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>jnsbangunan/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>jnsbangunan');
			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});

});

 </script>
 
                        