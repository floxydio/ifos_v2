<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $id_outlet = $biayadata->id_outlet;
           $nm_outlet = $biayadata->nm_outlet;


	  }else{

             $id_outlet = '';
           $nm_outlet = '';


	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Channel</label>
        <div class="col-lg-5">
                      <input type="hidden" name="id_outlet" id="id_outlet" class="form-control" value="<?php echo $id_outlet;?>">
  
                 <input type="text" name="nm_outlet" id="nm_outlet" class="form-control" value="<?php echo $nm_outlet;?>">
  
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
     	var id_outlet 	= $("#id_outlet").val();
		var nm_outlet = $("#nm_outlet").val();

		var string = "id_outlet="+id_outlet+"&nm_outlet="+nm_outlet;




        

         if(nm_outlet==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama channel Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_outlet").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>channel/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>channel');
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
 
                        