<?php


    $data = $listbiaya->num_rows();
     if($data > 0){
         
           $nm_menu = $biayadata->nm_menu;
            $link = $biayadata->link;
             $ket = $biayadata->ket;
             $id_menu = $biayadata->id_menu;
            

	  }else{

      $nm_menu = '';
            $link = '';
             $ket = '';
             $id_menu = '';

	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">






    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Menu</label>
        <div class="col-lg-5">
            <input type="text" id="nm_menu" name="nm_menu" value="<?php echo $nm_menu;?>" class="form-control">
			 <input type="hidden" name="id_menu" id="id_menu" class="form-control" value="<?php echo $id_menu;?>">
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 control-label">Link</label>
        <div class="col-lg-5">
            <input type="text" name="link" id="link" class="form-control" value="<?php echo $link;?>">
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Keterangan</label>
        <div class="col-lg-5">
            <input type="text" name="ket" id="ket" class="form-control" value="<?php echo $ket;?>">
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
    window.location.assign('<?php echo base_url();?>mnj_menu');
	});



	$("#simpan").click(function(){
     	var nm_menu 	= $("#nm_menu").val();
		     	var id_menu 	= $("#id_menu").val();
		var link = $("#link").val();
		var ket 	= $("#ket").val();
		
		var string = "nm_menu="+nm_menu+"&link="+link+"&ket="+ket+"&id_menu="+id_menu;


		if(nm_menu.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Menu Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_menu").focus();
			return false;
		}

        if(link.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Link Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#link").focus();
			return false;
		}

        if(ket.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Keterangan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#ket").focus();
			return false;
		}

        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>mnj_menu/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>mnj_menu');
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
                         