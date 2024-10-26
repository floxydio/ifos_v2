<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $id_parameter = $biayadata->id_parameter;
               $id_program = $biayadata->id_program;
         
            $nm_parameter = $biayadata->nm_parameter;
              $range_min = $biayadata->range_min;
           $range_max = $biayadata->range_max;


	  }else{

        $id_parameter ='';
               $id_program = '';
         
            $nm_parameter = '';
              $range_min = '';
           $range_max = '';

	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Program</label>
        <div class="col-lg-5">
        <select name="id_program" id="id_program" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih Program ::</option>
      <?php
	foreach($listjabatan->result() as $w){

	?>
   <?php if($w->id_channel == $id_program){ ?>
       <option value="<?php echo $w->id_channel;?>" selected><?php echo $w->nm_channel;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->id_channel;?>"><?php echo $w->nm_channel;?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Nama Parameter</label>
        <div class="col-lg-5">
        <select name="nm_parameter" id="nm_parameter" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih Parameter ::</option>
      <?php
      $arraydata=array("plafon","margin");
	foreach($arraydata as $index=> $value){
	    if($value == $nm_parameter){
	        $cek="selected";
	    }else{
	        $cek=""; 
	    }
	 
	?>
                  <option value="<?php echo $value;?>" <?php echo $cek;?>><?php echo $value;?></option>
                      
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Range MIn</label>
        <div class="col-lg-5">
            <input type="text" name="range_min" id="range_min" class="form-control" value="<?php echo $range_min;?>">
                     <input type="hidden" name="id_parameter" id="id_parameter" class="form-control" value="<?php echo $id_parameter;?>">

        </div>
    </div>
       <div class="form-group">
        <label class="col-lg-2 control-label">Range Max</label>
        <div class="col-lg-5">
            <input type="text" name="range_max" id="range_max" class="form-control" value="<?php echo $range_max;?>">
                    

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

                 $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});

        $("#kembali").click(function(){
    window.location.assign('<?php echo base_url();?>paramprogram');
	});



	$("#simpan").click(function(){
     	var nm_parameter 	= $("#nm_parameter").val();
        var id_parameter 	= $("#id_parameter").val();
		var id_program = $("#id_program").val();
		var range_min = $("#range_min").val();
		var range_max = $("#range_max").val();

		var string = "id_parameter="+id_parameter+"&nm_parameter="+nm_parameter+"&id_program="+id_program+"&range_min="+range_min+"&range_max="+range_max;




         if(nm_parameter==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Parameter Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_parameter").focus();
			return false;
		}



         if(id_program==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Program Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#id_program").focus();
			return false;
		}
		
		if(range_min==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Range Min Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#range_min").focus();
			return false;
		}
		
		if(range_max==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Range Max Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#range_max").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>paramprogram/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>paramprogram');
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
   
