<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $id_agama = $biayadata->id_agama;
           $nm_agama = $biayadata->nm_agama;


	  }else{

              $id_agama= '';
           $nm_agama = '';


	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Agama</label>
        <div class="col-lg-5">
                      <input type="hidden" name="id_agama" id="id_agama" class="form-control" value="<?php echo $id_agama;?>">
  
                 <input type="text" name="nm_agama" id="nm_agama" class="form-control" value="<?php echo $nm_agama;?>">
  
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
    window.location.assign('<?php echo base_url();?>agama');
	});



	$("#simpan").click(function(){
     	var id_agama 	= $("#id_agama").val();
		var nm_agama = $("#nm_agama").val();

		var string = "id_agama="+id_agama+"&nm_agama="+nm_agama;




        

         if(nm_agama==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Agama Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_agama").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>agama/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>agama');
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
 
                        