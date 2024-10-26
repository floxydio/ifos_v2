<?php


    $data = $listbiaya->num_rows();
     if($data > 0){
           $nm_submenu = $biayadata->nm_submenu;
            $linksub = $biayadata->linksub;
             $ket = $biayadata->ket;
             $id_submenu = $biayadata->id_submenu;
			  $id_menuutama = $biayadata->id_menuutama;

	  }else{

      $nm_submenu = $biayadata->nm_submenu;
            $linksub = $biayadata->linksub;
             $ket = $biayadata->ket;
             $id_submenu = $biayadata->id_submenu;
			  $id_menuutama = $biayadata->id_menuutama;

	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">






   <div class="form-group">
        <label class="col-lg-2 control-label">Nama Menu</label>
        <div class="col-lg-5">
            <input type="text" id="nm_submenu" name="nm_submenu" value="<?php echo $nm_submenu;?>" class="form-control">
			 <input type="hidden" name="id_submenu" id="id_submenu" class="form-control" value="<?php echo $id_submenu;?>">
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 control-label">Link</label>
        <div class="col-lg-5">
            <input type="text" name="linksub" id="linksub" class="form-control" value="<?php echo $link;?>">
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Keterangan</label>
        <div class="col-lg-5">
            <input type="text" name="ket" id="ket" class="form-control" value="<?php echo $ket;?>">
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Menu Utama</label>
        <div class="col-lg-5">
        <select name="id_menuutama" id="id_menuutama" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih Menu Utama ::</option>
      <?php
	foreach($listcabang->result() as $w){

	?>
   <?php if($w->id_menu == $id_menuutama){ ?>
       <option value="<?php echo $w->id_menu;?>" selected><?php echo $w->nm_menu;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->id_menu;?>"><?php echo $w->nm_menu;?></option>
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
    window.location.assign('<?php echo base_url();?>mnj_submenu');
	});



	$("#simpan").click(function(){
     	var nm_submenu 	= $("#nm_submenu").val();
			var id_submenu 	= $("#id_submenu").val();
		var linksub = $("#linksub").val();
		var ket 	= $("#ket").val();
		var id_menuutama 	= $("#id_menuutama").val();
		
		var string = "nm_submenu="+nm_submenu+"&linksub="+linksub+"&ket="+ket+"&id_menuutama="+id_menuutama+"id_submenu="+id_submenu;


		if(nm_submenu.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Menu Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_submenu").focus();
			return false;
		}

        if(linksub.length==0){
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

         if(id_menuutama==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Menu Utama Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#id_menuutama").focus();
			return false;
		}

        

         


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>mnj_submenu/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>mnj_submenu');
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
