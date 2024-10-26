     <script>
                    $(function(){

	$("#tgl_akad").datepicker({
		 dateFormat: "yyyy-mm-dd",
		 autoclose: true,format: 'yyyy-mm-dd',todayHighlight:true
    }).on('changeDate', function(e){
    simpannasabah('tgl_akad','tb_akad');
});

	$("#tgl_kuasa").datepicker({
		 dateFormat: "yyyy-mm-dd",
		 autoclose: true,format: 'yyyy-mm-dd',todayHighlight:true
    }).on('changeDate', function(e){
    simpannasabah('tgl_kuasa','tb_akad');
});
	$("#tgl_sk").datepicker({
		 dateFormat: "yyyy-mm-dd",
		 autoclose: true,format: 'yyyy-mm-dd',todayHighlight:true
    }).on('changeDate', function(e){
    simpannasabah('tgl_sk','tb_akad');
});
$("#tgl_sup").datepicker({
		 dateFormat: "yyyy-mm-dd",
		 autoclose: true,format: 'yyyy-mm-dd',todayHighlight:true
    }).on('changeDate', function(e){
    simpannasabah('tgl_sup','tb_akad');
});
                    })

tinymce.init({ selector:'textarea',
                        width: 500,
                        readonly: 1 });</script>
    <form action="" method="post" id="datanasabah" class="cdatanasabah">

 <table width="962" border="0" style="background-color:#F2F2F2">

    <tr>
        <th style="background-color:#CCCCCC" scope="col">Tanggal Akad</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="tgl_akad" id="tgl_akad" class="tgl"  size="20" maxlength="50" value="<?php echo $akad['tgl_akad']; ?>" placeholder="YYYY-MM-DD" readonly></th>
    </tr>
      <tr>
        <th style="background-color:#CCCCCC" scope="col">Tanggal Surat Kuasa</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="tgl_kuasa" id="tgl_kuasa" class="tgl"  size="20" maxlength="50" value="<?php echo $akad['tgl_kuasa']; ?>" placeholder="YYYY-MM-DD" readonly></th>
    </tr>
      <tr>
        <th style="background-color:#CCCCCC" scope="col">Tanggal SK</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="tgl_sk" id="tgl_sk" class="tgl" size="20" maxlength="50" value="<?php echo $akad['tgl_sk']; ?>" placeholder="YYYY-MM-DD" readonly></th>
    </tr>
      <tr>
        <th style="background-color:#CCCCCC" scope="col">Tanggal SUP</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="tgl_sup" id="tgl_sup" class="tgl" size="20" maxlength="50" value="<?php echo $akad['tgl_sup']; ?>" placeholder="YYYY-MM-DD" readonly></th>
    </tr>
     <tr>
        <th style="background-color:#CCCCCC" scope="col">No Surat Kuasa Direksi</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="no_kuasa" id="no_kuasa"   size="20" maxlength="50" value="<?php echo $akad['no_kuasa']; ?>" onchange="javascript:simpannasabah('no_kuasa','tb_akad')"></th>
    </tr>
      <tr>
        <th style="background-color:#CCCCCC" scope="col">No SK</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="no_sk" id="no_sk" size="20" maxlength="50" value="<?php echo $akad['no_sk']; ?>" onchange="javascript:simpannasabah('no_sk','tb_akad')"></th>
    </tr>
       <tr>
        <th style="background-color:#CCCCCC" scope="col">Tanggal Angsuran</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="tgl_angsuran" id="tgl_angsuran" size="20" maxlength="50" value="<?php echo $akad['tgl_angsuran']; ?>" onchange="javascript:simpannasabah('tgl_angsuran','tb_akad')"></th>
    </tr>
       <tr>
        <th style="background-color:#CCCCCC" scope="col">Dari</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="dari" id="dari" size="20" maxlength="50" value="<?php echo $akad['dari']; ?>" onchange="javascript:simpannasabah('dari','tb_akad')"></th>
    </tr>
    <tr>
        <th style="background-color:#CCCCCC" scope="col">Penanda Tangan Akad</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><select name="pejabat" id="pejabat" class="js-example-basic-single js-states" onchange="javascript:simpannasabah('pejabat','tb_akad')">
           <option value="0">-Pilih Pejabat-</option>
    <?php foreach($listll->result() as $w){ ?>
                        <?php if($w->username == $akad['pejabat']){ ?>
                            <option value="<?php echo $w->username; ?>" selected><?php echo $w->nama_lengkap; ?> - <?php echo $w->nmjabatan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->username; ?>"><?php echo $w->nama_lengkap; ?> - <?php echo $w->nmjabatan; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></th>
    </tr>
    </table>
    <script>
     function simpannasabah(nama,tabel){
    var no_aplikasi = $("#no_aplikasi").val();
var verifikasi = $("#"+nama).val();

    var data = "no_aplikasi="+no_aplikasi+"&verifikasi="+verifikasi;

    	if(verifikasi==0){
               message('error', 'Data tidak boleh kosong');
            $("#"+nama).focus();
             $("#"+nama).val(''+inputdata);
            return false;
        }

$.ajax({
type: 'POST',
dataType:'html',
url: "<?php echo site_url(); ?>verifikasi/updatetabel/"+nama+"/"+tabel,
data: data,
beforeSend: function(){
//document.getElementById('uploadProcessDetailRincian').style.display= 'block';
//$('#datanasabah').css("opacity",".2");
                },
success: function(htmldataumum) {
   message('success', 'Data berhasil di dirubah');
}
});	//simpan


}
  </script>