<?php


    $data = $listbiaya->num_rows();
     if($data > 0){
          $level = $biayadata->level;
           $id_menu = $biayadata->id_menu;
			  $id_muser = $biayadata->id_muser;

	  }else{

        $level = '';
           $id_menu = '';
			  $id_muser = '';

	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">






   
    <div class="form-group">
			 <input type="hidden" name="id_muser" id="id_muser" class="form-control" value="<?php echo $id_muser;?>">
    
        <label class="col-lg-2 control-label">Nama Menu</label>
        <div class="col-lg-5">
        <select name="id_menu" id="id_menu" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="">:: Pilih Menu Utama ::</option>
      <?php
	foreach($listlevel->result() as $w){

	?>
   <?php if($w->id_menu == $id_menu){ ?>
       <option value="<?php echo $w->id_menu;?>" selected><?php echo $w->nm_menu;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->id_menu;?>"><?php echo $w->nm_menu;?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Level Akses</label>
        <div class="col-lg-5">
        <select name="level" id="level" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="">:: Pilih Level ::</option>
      <?php
	foreach($listjabatan->result() as $w){

	?>
   <?php if($w->id_level == $level){ ?>
       <option value="<?php echo $w->id_level;?>" selected><?php echo $w->nm_level;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->id_level;?>"><?php echo $w->nm_level;?></option>
                        <?php } ?>
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
    window.location.assign('<?php echo base_url();?>mnj_akses');
	});



	$("#simpan").click(function(){
     
			var id_menu 	= $("#id_menu").val();
		var level = $("#level").val();
		var id_muser = $("#id_muser").val();
		
		var string = "id_menu="+id_menu+"&level="+level+"&id_muser="+id_muser;


		
         if(id_menu==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Menu Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#id_menu").focus();
			return false;
		}

        if(level==''){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Level Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#level").focus();
			return false;
		}

       

        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>mnj_akses/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>mnj_akses');
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
