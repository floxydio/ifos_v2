<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $id_nasabah = $biayadata->id_nasabah;
           $nm_nasabah = $biayadata->nm_nasabah;


	  }else{

              $id_nasabah = '';
           $nm_nasabah = '';


	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Hubungan Keluarga</label>
        <div class="col-lg-5">
                      <input type="hidden" name="id_nasabah" id="id_nasabah" class="form-control" value="<?php echo $id_nasabah;?>">
  
                 <input type="text" name="nm_nasabah" id="nm_nasabah" class="form-control" value="<?php echo $nm_nasabah;?>">
  
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
    window.location.assign('<?php echo base_url();?>hubkeluarga');
	});



	$("#simpan").click(function(){
     	var id_nasabah 	= $("#id_nasabah").val();
		var nm_nasabah = $("#nm_nasabah").val();

		var string = "id_nasabah="+id_nasabah+"&nm_nasabah="+nm_nasabah;




        

         if(nm_nasabah==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Hubungan Keluarga Belum Diisi',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_nasabah").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>hubkeluarga/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>hubkeluarga');
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
 
                        