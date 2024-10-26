<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

            $kd_cabang = $biayadata->kd_cabang;
           $nm_cabang = $biayadata->nm_cabang;
           $kanwil = $biayadata->kanwil;


	  }else{

            $kd_cabang ='';
           $nm_cabang = '';
           $kanwil = '';

	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Cabang</label>
        <div class="col-lg-5">
              
                 <input type="text" name="kd_cabang" id="kd_cabang" class="form-control" value="<?php echo $kd_cabang;?>">
  
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Nama Cabang</label>
        <div class="col-lg-5">
               <input type="text" name="nm_cabang" id="nm_cabang" class="form-control" value="<?php echo $nm_cabang;?>">
  
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Kanwil</label>
        <div class="col-lg-5">
            
                 <input type="text" name="kanwil" id="kanwil" class="form-control" value="<?php echo $kanwil;?>">
  
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
    window.location.assign('<?php echo base_url();?>cabang');
	});



	$("#simpan").click(function(){
     	var kd_cabang 	= $("#kd_cabang").val();
		var nm_cabang = $("#nm_cabang").val();
			var kanwil = $("#kanwil").val();

		var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang+"&kanwil="+kanwil;




        

         if(kd_cabang==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Cabang Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#kd_cabang").focus();
			return false;
		}
		
		
         if(nm_cabang==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Cabang Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_cabang").focus();
			return false;
		}
		
		
         if(kanwil==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Kanwil Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#kanwil").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>cabang/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>cabang');
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
 
                        