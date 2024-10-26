<style>
 .error + .select2-container,
.error + .select2-container + .select2-container .select2-dropdown {
    border: 3px solid red !important;
}
.cek {
    border: 3px solid red !important;
}
</style>
 <script type="text/javascript">
$(document).ready(function(){
    $(':input:not([type="submit"])').each(function() {
        $(this).focus(function() {
            $(this).addClass('hilite');
        }).blur(function() {
            $(this).removeClass('hilite');});
    });



    $("#simpan").click(function(){
        //var rek_induk	= $("#rek_induk").val();
         var no_aplikasi = $("#no_aplikasi").val();

        var nm_lengkap = $("#nm_lengkap").val();
        var alamat = $("#alamat").val();
        var kdpos_ktp = $('#kdpos_ktp').val();
        var kelurahan_ktp  = $("#kelurahan_ktp").val();
        var kecamatan_ktp   = $("#kecamatan_ktp").val();
         var kotamadya_ktp   = $("#kotamadya_ktp").val();
        var propinsi_ktp   = $("#propinsi_ktp").val();
        var no_tlp   = $("#no_tlp").val();
        var no_hp1   = $("#no_hp1").val();
        var no_hp2   = $("#no_hp2").val();
              var cek_data   = $("#cek_data").val();

      	var string = "no_aplikasi="+no_aplikasi+"&nm_lengkap="+nm_lengkap+"&alamat="+alamat+"&kdpos_ktp="+kdpos_ktp+"&kelurahan_ktp="+kelurahan_ktp+"&kecamatan_ktp="+kecamatan_ktp+"&propinsi_ktp="+propinsi_ktp+"&no_tlp="+no_tlp+"&no_hp1="+no_hp1+"&no_hp2="+no_hp2+"&cek_data="+cek_data+"&kotamadya_ktp="+kotamadya_ktp;



       	if(nm_lengkap.length==0){
                $.messager.show({
                title:'Info',
                msg:'Maaf, Nama Lengkap Wajib diketik',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#nm_lengkap").focus();
            return false;
        }
         if(alamat.length==0){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, Alamat Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#alamat").focus();
            return false;
        }

        if(kdpos_ktp.length==0){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, Kode Pos Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#kdpos_ktp").focus();
            return false;
        }
        if(kelurahan_ktp.length==0){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, Kelurahan Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#kelurahan_ktp").focus();
            return false;
        }
         if(kecamatan_ktp.length==0){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, Kecamatan Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#kecamatan_ktp").focus();
            return false;
        }

        if(kotamadya_ktp.length==0){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, Kotamadya Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#kotamadya_ktp").focus();
            return false;
        }
         if(propinsi_ktp.length==0){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, Propinsi Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#propinsi_ktp").focus();
            return false;
        }

         if(no_tlp.length==0){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, No Telepon Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#no_hp1").focus();
            return false;
        }

        if(no_hp1.length==0){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, No Handphone Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#no_hp1").focus();
            return false;
        }
            if(cek_data.checked){
            //alert("Maaf, Nama Rekening tidak boleh kosong");
            $.messager.show({
                title:'Info',
                msg:'Maaf, Cek Validasi Tidak Boleh Kosong',
                timeout:2000,
                showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
            });

            $("#cek_data").focus();
            return false;
        }
         	$.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>verifikasi/updatedarurat_ver",
            data	: string,
            cache	: false,
            success	: function(data){
                       message('success', 'Data berhasil di tambah');
                         tampil_data('<?php echo $aplikasi;?>','updatekontak','verifikasi','formkontak','2');


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



      $("#kembali").click(function(){
           var thp = $("#thp").val();
        window.location.assign('<?php echo base_url();?>'+thp);
    });

});


</script>

  <div class="btn-group-center">
<?php
  $no=0;
  foreach($listtabsheader->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','2')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


 <?php
  $no++;
   }


?>

<?php
  $no=0;
  foreach($listtabs->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','<?php echo $jk['level_tab'];?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


 <?php
  $no++;
   }

    $cabang = $this->app_model->CariCabang($db['kd_cabang']);
?>
 </div> <br />

        <table id="dataTable" width="100%">
         <tr></tr><tr></tr>
   <tr>
  <th>
  <b>Data Kontak</b>
  </th>

  </tr>
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>
     <td>    <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" /></td>

     <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>
<tr>
    <td width=20%>Nama Lengkap</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="nm_lengkap" id="nm_lengkap" size="30" maxlength="50" value="<?php echo $ww['nm_lengkap_c']; ?>" class="<?php echo $nm_lengkap_c; ?>"   size="50" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Alamat Rumah (Sesuai KTP)</td>
    <td>:</td>
    <td><div class="col-lg-5"><textarea name="alamat" id="alamat" class="<?php echo $alamat_c; ?>" readonly>
    <?php echo $ww['alamat_c']; ?></textarea><br /></div> </td>
</tr>
<tr>

 	<td width=20%>Kodepos</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="search" class='autocomplete <?php echo $kdpos_c; ?>' id="kdpos_ktp" name="kdpos_ktp" maxlength="50" size="20" value="<?php echo $ww['kdpos_c']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kelurahan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete <?php echo $kelurahan_c; ?>' name="kelurahan_ktp"   id="kelurahan_ktp" size="20" maxlength="50"  value="<?php echo $ww['kelurahan_c']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kecamatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete <?php echo $kecamatan_c; ?>'  name="kecamatan_ktp" id="kecamatan_ktp" size="20" maxlength="50"  value="<?php echo $ww['kecamatan_c']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete <?php echo $kotamadya_c; ?>'  name="kotamadya_ktp" id="kotamadya_ktp" size="20" maxlength="50"  value="<?php echo $ww['kotamadya_c']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Propinsi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete <?php echo $propinsi_c; ?>' name="propinsi_ktp" id="propinsi_ktp"  size="20" maxlength="50"  value="<?php echo $ww['propinsi_c']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>No Telepon</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="no_tlp" id="no_tlp"  size="20" maxlength="50"  value="<?php echo $ww['no_tlpc']; ?>" onKeyUp="return checkInput(this);" class="<?php echo $no_tlpc; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>No Handphone 1</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="no_hp1" id="no_hp1"  size="20" maxlength="50" value="<?php echo $ww['no_hp1c']; ?>" onKeyUp="return checkInput(this);" class="<?php echo $no_hp1c; ?>" readonly/></div> No Handphone 2
    : <input type="text" name="no_hp2" id="no_hp2"  size="20" maxlength="50" value="<?php echo $ww['no_hp2c']; ?>" onKeyUp="return checkInput(this);" class="<?php echo $no_hp2c; ?>" readonly/></td>
</tr>
<tr>
    <td width=20%>Cek Data Validasi</td>
    <td>:</td>
    <?php if ($ww['cek_data']=='1'){  ?>
    <td><input type="checkbox" name="cek_data" id="cek_data" value="1"  size="20" maxlength="50"  value="<?php echo $ww['cek_data']; ?>" class="<?php echo $cek_data; ?>" checked/></td>
       <?php }else

       {  ?>

          <td>Saya menvalidasi data kontak darurat<input type="checkbox" name="cek_data" id="cek_data" value="1"  size="20" maxlength="50"  value="<?php echo $ww['cek_data']; ?>"/></td>
        <?php }

        ?>
</tr>

<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>


</table>