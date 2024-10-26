<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $id_channel = $biayadata->id_channel;
           $nm_channel = $biayadata->nm_channel;


	  }else{

             $id_channel = '';
           $nm_channel = '';


	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Channel</label>
        <div class="col-lg-5">
                      <input type="hidden" name="id_channel" id="id_channel" class="form-control" value="<?php echo $id_channel;?>">
  
                 <input type="text" name="nm_channel" id="nm_channel" class="form-control" value="<?php echo $nm_channel;?>">
  
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
    window.location.assign('<?php echo base_url();?>channel');
	});



	$("#simpan").click(function(){
     	var id_channel 	= $("#id_channel").val();
		var nm_channel = $("#nm_channel").val();

		var string = "id_channel="+id_channel+"&nm_channel="+nm_channel;




        

         if(nm_channel==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Program Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_channel").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>program/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>program');
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
 
                        