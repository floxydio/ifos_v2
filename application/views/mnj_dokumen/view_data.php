<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $id_dokumen = $biayadata->id_dokumen;
            $nm_dokumen = $biayadata->nm_dokumen;
              $grup_peg = $biayadata->grup_peg;
           $mandatory = $biayadata->mandatory;


	  }else{

        $id_dokumen ='';
            $nm_dokumen = '';
           $grup_peg = '';
            $mandatory ='';
	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Dokumen</label>
        <div class="col-lg-5">
            <input type="text" name="nm_dokumen" id="nm_dokumen" class="form-control" value="<?php echo $nm_dokumen;?>">
                     <input type="hidden" name="id_dokumen" id="id_dokumen" class="form-control" value="<?php echo $id_dokumen;?>">

        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Grup Dokumen</label>
        <div class="col-lg-5">
        <select name="grup_peg" id="grup_peg" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih Grup Dokumen ::</option>
      <?php
	foreach($listjabatan->result() as $w){

	?>
   <?php if($w->id_grupdok == $grup_peg){ ?>
       <option value="<?php echo $w->id_grupdok;?>" selected><?php echo $w->nm_grupdok;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->id_grupdok;?>"><?php echo $w->nm_grupdok;?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Mandatory</label>
        <div class="col-lg-5">
        <select name="mandatory" id="mandatory" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih mandatory ::</option>
      <?php
      $arraydata=array("true","false");
	foreach($arraydata as $index=> $value){
	    if($value == $mandatory){
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
    window.location.assign('<?php echo base_url();?>mnj_dokumen');
	});



	$("#simpan").click(function(){
     	var nm_dokumen 	= $("#nm_dokumen").val();
        	var id_dokumen 	= $("#id_dokumen").val();
		var grup_peg = $("#grup_peg").val();
			var mandatory = $("#mandatory").val();

		var string = "nm_dokumen="+nm_dokumen+"&id_dokumen="+id_dokumen+"&grup_peg="+grup_peg+"&mandatory="+mandatory;




         if(nm_dokumen==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Dokumen Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_dokumen").focus();
			return false;
		}



         if(grup_peg==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Grup Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#grup_peg").focus();
			return false;
		}
		
		if(mandatory==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Grup Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#mandatory").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>mnj_dokumen/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>mnj_dokumen');
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
    <script>
                    $(function(){

                      $('#tanggal_lahir').datepicker({
    format: 'yyyy-mm-dd',
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
                    })
            </script>
                         <script>
                         function CekDulcapil() {
           var no_identitas = $("#no_identitas").val();
        var idcs   = $("#idcs").val();
             	var stringloan = "no_identitas="+no_identitas+"&idcs="+idcs;

        if(no_identitas != ""){
           	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>pembiayaan/Dulcapil/"+no_identitas+"/"+idcs,
		     data: stringloan,
			cache	: true,
			dataType : "json",
           success	: function(data){
            $("#no_identitas").focus();
         //   $("#ibu_kandung").val(data.ibu_kandung);
            $("#nm_lengkap").val(data.nm_lengkap);
            $("#error").val(data.error);

            }
         	});
        }

   	}
                         </script>
