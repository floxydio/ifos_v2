<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $id_doktanah = $biayadata->id_doktanah;
           $nm_doktanah = $biayadata->nm_doktanah;


	  }else{

              $id_doktanah = '';
           $nm_doktanah = '';


	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Dokumen Tanah</label>
        <div class="col-lg-5">
                      <input type="hidden" name="id_doktanah" id="id_doktanah" class="form-control" value="<?php echo $id_doktanah;?>">
  
                 <input type="text" name="nm_doktanah" id="nm_doktanah" class="form-control" value="<?php echo $nm_doktanah;?>">
  
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
    window.location.assign('<?php echo base_url();?>doktanah');
	});



	$("#simpan").click(function(){
     	var id_doktanah 	= $("#id_doktanah").val();
		var nm_doktanah = $("#nm_doktanah").val();

		var string = "id_doktanah="+id_doktanah+"&nm_doktanah="+nm_doktanah;




        

         if(nm_doktanah==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Dokumen Tanah Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_doktanah").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>doktanah/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>doktanah');
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
 
                        