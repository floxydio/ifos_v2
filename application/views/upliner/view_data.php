<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

           $userid = $biayadata->userid;
            $id_upliner = $biayadata->id_upliner;
           $nm_upliner = $biayadata->nm_upliner;


	  }else{

       $userid ='';
        $id_upliner ='';
           $nm_upliner ='';

	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

     <div class="form-group">
        <label class="col-lg-2 control-label">Userid</label>
        <div class="col-lg-5">

        <select name="userid" id="userid" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih Userid ::</option>
      <?php
	foreach($listupline->result() as $w){

	?>
   <?php if($w->username == $userid){ ?>
       <option value="<?php echo $w->username;?>" selected><?php echo $w->nama_lengkap;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->username;?>"><?php echo $w->nama_lengkap;?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Upliner</label>
        <div class="col-lg-5">
        <select name="nm_upliner" id="nm_upliner" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih Userid ::</option>
      <?php
	foreach($listusersss->result() as $w){

	?>
   <?php if($w->username == $nm_upliner){ ?>
       <option value="<?php echo $w->username;?>" selected><?php echo $w->nama_lengkap;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->username;?>"><?php echo $w->nama_lengkap;?></option>
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
    window.location.assign('<?php echo base_url();?>upliner');
	});



	$("#simpan").click(function(){
     	var userid 	= $("#userid").val();
		var nm_upliner = $("#nm_upliner").val();

		var string = "userid="+userid+"&nm_upliner="+nm_upliner;




         if(userid==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, User Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#userid").focus();
			return false;
		}



         if(nm_upliner==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Upliner Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_upliner").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>upliner/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>upliner');
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
