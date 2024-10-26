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

function tampil_data(dat,kontrol,link,form,num){
        var username = $("#userid").val();
        var string = "username="+username;

        $.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>parameter/"+kontrol+"/"+dat+"/"+link+"/"+form+"/"+num,
            data	: string,
            cache	: false,
                beforeSend: function(){
            $("#dataform").show(1000).html("<img style='position:fixed; top:40%;right:40%;' src='<?php echo base_url('assets/img/loader1.gif');?>' height='70'>");
                                    },
            success	: function(data){
                $("#dataform").html(data);
                   $("#view").hide();
 			}
        });
    }

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
   <script type="text/javascript">
$(document).ready(function(){
                   $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});


       	$("#send").click(function(){
    	   var no_aplikasi=$('#no_aplikasi').val();
           	var string = "no_aplikasi="+no_aplikasi;
                           	var pilih = confirm('Anda Yakin Data Sudah Diverifikasi Kalau Sudah Lanjutkan');
    if (pilih==true) {
        $.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>verifikasi/updatesend",
            data	: string,
            cache	: false,
            success	: function(data){
             	window.location.assign('<?php echo base_url();?>verifikasi');
            }
        });
        }
    });

      $("#kembali").click(function(){
           var thp = $("#thp").val();
        window.location.assign('<?php echo base_url();?>'+thp);
    });


});
</script>

<script>
 $(document).ready(function() {

    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="x_AndaMhs"]').click(function() {
        if (!$(this).is(':checked')) {

              $('#alamat_tinggal').removeAttr('disabled','disabled');
                $('#kdpos_tinggal').removeAttr('disabled','disabled');
                 $('#kelurahan_tinggal').removeAttr('disabled','disabled');
                $('#kecamatan_tinggal').removeAttr('disabled','disabled');
                   $('#propinsi_tinggal').removeAttr('disabled','disabled');
                      $('#kotamadya_tinggal').removeAttr('disabled','disabled');
              $('#alamat_tinggal').focus();
             $('#kdpos_tinggal').focus();
              $('#kelurahan_tinggal').focus();
              $('#kecamatan_tinggal').focus();
             $('#propinsi_tinggal').focus();
              $('#kotamadya_tinggal').focus();
          } else {
            var alamat=$('#alamat').val();
            var alamat_tinggal=$('#alamat_tinggal').val(alamat);
            var kdpos_ktp=$('#kdpos_ktp').val();
            var kdpos_tinggal =$('#kdpos_tinggal').val(kdpos_ktp);
             var kelurahan=$('#kelurahan_ktp').val();
            var kelurahan_tinggal = $('#kelurahan_tinggal').val(kelurahan);
            var kecamatan=$('#kecamatan_ktp').val();
            var kecamatan_tinggal=$('#kecamatan_tinggal').val(kecamatan);
             var kotamadya=$('#kotamadya_ktp').val();
            var kotamadya_tinggal=$('#kotamadya_tinggal').val(kotamadya);
             var propinsi=$('#propinsi_ktp').val();
            var propinsi_tinggal = $('#propinsi_tinggal').val(propinsi);
            alamat_tinggal.attr('disabled','disabled');
            kdpos_tinggal.attr('disabled','disabled');
            kelurahan_tinggal.attr('disabled','disabled');
            kecamatan_tinggal.attr('disabled','disabled');
            kotamadya_tinggal.attr('disabled','disabled');
            propinsi_tinggal.attr('disabled','disabled');
               $('#alamat_tinggal').focus();
             $('#kdpos_tinggal').focus();
              $('#kelurahan_tinggal').focus();
              $('#kecamatan_tinggal').focus();
                $('#kotamadya_tinggal').focus();
             $('#propinsi_tinggal').focus();



        }
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
   function datakodepos(dat,link,form){
        $("#mymodal").modal("show");
            	var username = $("#userid").val();
        var string = "username="+username;
   	$.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>parameter/viewkodepos/"+dat+"/"+link+"/"+form,
            data	: string,
            cache	: false,
                beforeSend: function(){
            $("#datatampil").html("Loading...");
                                    },
            success	: function(data){
                $("#datatampil").html(data);


            }
        });
        }



  </script>

 <center><div id="dataform">

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
 </div>
<br />

 <form class="form-horizontal" id="dataTable">
         <table id="dataTable" width="100%">
        <tr></tr>
  <tr>
  <th>
  <b>Data Diri Pemohon</b>
  </th>

  </tr>
  <tr></tr>




  <tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>

    <td>
        <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" /></td>

    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>

<tr>
    <td width="10%">Cabang Pemroses</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
    <select name="kd_cab" id="kd_cab" class="js-example-basic-single js-states form-control <?php echo $kd_cab; ?>" disabled>
    <option value="">-Pilih-</option>
      <?php
    foreach($listcabang->result() as $w){

    ?>
       <?php if($w->kd_cabang == $db['kd_cab']){ ?>
      <option value="<?php echo $w->kd_cabang;?>" selected><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                      <?php }else{ ?>
       <option value="<?php echo $w->kd_cabang;?>"><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                     <?php } ?>
              <?php } ?>
    </select></div>   </td>
</tr>

<tr>
    <td width="10%">Cabang Pembukuan</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
    <select name="kd_buk" id="kd_buk" class="js-example-basic-single js-states form-control <?php echo $kd_buk; ?>" disabled>
    <option value="">-Pilih-</option>
      <?php
    foreach($listcabang->result() as $w){

    ?>
   <?php if($w->kd_cabang == $db['kd_buk']){ ?>
      <option value="<?php echo $w->kd_cabang;?>" selected><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                      <?php }else{ ?>
       <option value="<?php echo $w->kd_cabang;?>"><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                     <?php } ?>
              <?php } ?>
    </select></div>
    </td>
</tr>
<tr>
    <td width=20%>Nama Lengkap</td>
    <td>:</td>
    <td> <div class="col-lg-5"><input type="text" class="form-control <?php echo $nm_lengkap; ?>" name="nm_lengkap" id="nm_lengkap" size="30" maxlength="50" value="<?php echo $db['nm_lengkap']; ?>"  size="50" style=background-color:white Placeholder="Isi Secara otomatis"  readonly/></div></td>
</tr>
<tr>
    <td width=20%>Jenis Kelamin</td>
    <td>:</td>
    <td> <div class="col-lg-5"><select name="jk" id="jk" class="js-example-basic-single js-states form-control <?php echo $jk; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listjk->result() as $m){ ?>
                        <?php if($m->id_jk == $db['jk']){ ?>
                            <option value="<?php echo $m->id_jk; ?>" selected><?php echo $m->nm_jk; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $m->id_jk; ?>"><?php echo $m->nm_jk; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>No.KTP/SIM</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $no_identitas; ?>" name="no_identitas" id="no_identitas"  size="50" maxlength="50" value="<?php echo $db['no_identitas']; ?>"  onKeyUp="return checkInput(this);" readonly/></div></td>
</tr>
<tr>
    <td width=20%>No.NPWP</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $no_npwp; ?>" name="no_npwp" id="no_npwp"  size="50" maxlength="50" value="<?php echo $db['no_npwp']; ?>"  onKeyUp="return checkInput(this);" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Jenis ID Card</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="id_card" class="js-example-basic-single js-states form-control <?php echo $id_card; ?>" id="id_card" disabled>
    <option value="0">-Pilih-</option>
        <?php
    foreach($listdata->result() as $w){

    ?>
      <?php if($w->id_card == $db['id_card']){ ?>
                            <option value="<?php echo $w->id_card; ?>" selected><?php echo $w->nm_card; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_card; ?>"><?php echo $w->nm_card; ?></option>
                        <?php } ?>
                    <?php } ?>

     </select></div></td>

</tr>

<tr>
    <td width=20%>Tempat Lahir</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="tempat_lahir" id="tempat_lahir"  size="30" value="<?php echo $db['tempat_lahir']; ?>" maxlength="50" class="<?php echo $tempat_lahir; ?>" readonly/></div> Tanggal Lahir (yyyy-mm-dd)
    : <input  class="<?php echo $tanggal_lahir; ?>" type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $db['tanggal_lahir']; ?>" size="20" maxlength="50" readonly/>
</tr>
<tr>
    <td width=20%>Ibu Kandung</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $ibu_kandung; ?>" name="ibu_kandung" id="ibu_kandung" size="30" maxlength="50" onkeyup="displayText()" value="<?php echo $db['ibu_kandung']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Jenis Kegunaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="guna" id="guna" class="js-example-basic-single js-states form-control <?php echo $tujuan_guna; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listguna->result() as $w){ ?>
                        <?php if($w->id_penggunaan == $db['tujuan_guna']){ ?>
                            <option value="<?php echo $w->id_penggunaan; ?>" selected><?php echo $w->nm_penggunaan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_penggunaan; ?>"><?php echo $w->nm_penggunaan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>Alamat Rumah (Sesuai KTP)</td>
    <td>:</td>
    <td><div class="col-lg-5"><textarea name="alamat" id="alamat" class="<?php echo $alamat; ?>"  onkeyup="displayText1()" readonly>
    <?php echo $db['alamat']; ?></textarea><br /></div> </td>
</tr>
<tr>
<tr>
    <td width=20%>Jenis Permohonan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="jns_permohonan" id="jns_permohonan" class="js-example-basic-single js-states form-control <?php echo $jns_permohonan; ?>" disabled>
    <option value="0">-Pilih-</option>
        <?php
    foreach($listjnspermohonan->result() as $w){

    ?>
      <?php if($w->id_jnspermohonan == $db['jns_permohonan']){ ?>
                            <option value="<?php echo $w->id_jnspermohonan; ?>" selected><?php echo $w->nm_jnspermohonan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_jnspermohonan; ?>"><?php echo $w->nm_jnspermohonan; ?></option>
                        <?php } ?>
                    <?php } ?>

     </select></div></td>

</tr>
 	<td width=20%>Kodepos </td>
    <td>:</td>
    <td><div class="col-lg-5"> <input type="search" class="form-control <?php echo $kdpos_ktp; ?>" id="kdpos_ktp" name="kdpos_ktp" maxlength="50" size="20" value="<?php echo $db['kdpos_ktp']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kelurahan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $kelurahan_ktp; ?>" name="kelurahan_ktp"   id="kelurahan_ktp" size="20" maxlength="50"  value="<?php echo $db['kelurahan_ktp']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kecamatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $keamatan_ktp; ?>"  name="kecamatan_ktp" id="kecamatan_ktp" size="20" maxlength="50"  value="<?php echo $db['kecamatan_ktp']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $kotamadya_ktp; ?>"  name="kotamadya_ktp" id="kotamadya_ktp" size="20" maxlength="50"  value="<?php echo $db['kotamadya_ktp']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Propinsi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $propinsi_ktp; ?>" name="propinsi_ktp" id="propinsi_ktp"  size="20" maxlength="50"  value="<?php echo $db['propinsi_ktp']; ?>" readonly/></div></td>
</tr>

<tr>
    <td width=20%>Alamat Rumah Tinggal</td>
    <td>:</td>
    <td><div class="col-lg-5"><textarea name="alamat_tinggal" id="alamat_tinggal" class="<?php echo $alamat_tinggal; ?>" readonly>
    <?php echo $db['alamat_tinggal']; ?></textarea> </td>
</tr>
<tr>
    <td width=20%>Kodepos</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="search" class="form-control <?php echo $kdpos_tinggal; ?>" id="kdpos_tinggal" name="kdpos_tinggal" maxlength="50" size="20" value="<?php echo $db['kdpos_tinggal']; ?>" readonly/> </div> </td>
</tr>
<tr>
    <td width=20%>Kelurahan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $kelurahan_tinggal; ?>" name="kelurahan_tinggal"   id="kelurahan_tinggal" size="20" maxlength="50"  value="<?php echo $db['kelurahan_tinggal']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kecamatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $kecamatan_tinggal; ?>"  name="kecamatan_tinggal" id="kecamatan_tinggal" size="20" maxlength="50"  value="<?php echo $db['kecamatan_tinggal']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $kotamadya_tinggal; ?>"  name="kotamadya_tinggal" id="kotamadya_tinggal" size="20" maxlength="50"  value="<?php echo $db['kotamadya_tinggal']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Propinsi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $propinsi_tinggal; ?>" name="propinsi_tinggal" id="propinsi_tinggal"  size="20" maxlength="50"  value="<?php echo $db['propinsi_tinggal']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>No Telepon Yang Bisa Dihubungi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $no_tlp; ?>" name="no_tlp" id="no_tlp"  size="20" maxlength="50" value="<?php echo $db['no_tlp']; ?>" onKeyUp="return checkInput(this);" readonly/></div></td>
</tr>
<tr>
    <td width=20%>No Handphone 1</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="no_hp1" class="<?php echo $no_hp1; ?>" id="no_hp1"  size="20" maxlength="50" value="<?php echo $db['no_hp1']; ?>" onKeyUp="return checkInput(this);" readonly/> </div>(pilih salah satu) No Handphone 2
    : <input type="text" name="no_hp2" id="no_hp2" class="<?php echo $no_hp2; ?>"  size="20" maxlength="50" value="<?php echo $db['no_hp2']; ?>" onKeyUp="return checkInput(this);" readonly/> (pilih salah satu)
</tr>
<tr>
    <td width=20%>Agama</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="agama" id="agama" class="js-example-basic-single js-states form-control <?php echo $agama; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listagama->result() as $w){ ?>
                        <?php if($w->id_agama == $db['agama']){ ?>
                            <option value="<?php echo $w->id_agama; ?>" selected><?php echo $w->nm_agama; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_agama; ?>"><?php echo $w->nm_agama; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>Status Pernikahan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="status_nikah" id="status_nikah" class="js-example-basic-single js-states form-control <?php echo $status_nikah; ?>" disabled>
    <option value="0">-Pilih-</option>
    <?php foreach($listnikah->result() as $r){ ?>
                        <?php if($r->id_nikah == $db['status_nikah']){ ?>
                            <option value="<?php echo $r->id_nikah; ?>" selected><?php echo $r->nm_nikah; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $r->id_nikah; ?>"><?php echo $r->nm_nikah; ?></option>
                        <?php } ?>
                    <?php } ?>
     </select></div></td>

</tr>
  <tr>
    <td width=20%>Status Rumah</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="status_rumah" id="status_rumah" class="js-example-basic-single js-states form-control <?php echo $status_rumah; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($liststatusrumah->result() as $m){ ?>
                        <?php if($m->id_statusrumah == $db['status_rumah']){ ?>
                            <option value="<?php echo $m->id_statusrumah; ?>" selected><?php echo $m->nm_statusrumah; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $m->id_statusrumah; ?>"><?php echo $m->nm_statusrumah; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select> </div>Radius (Jarak ke Tempat Nasabah) : <input type="text" name="radius" id="radius" class="<?php echo $radius; ?>"  size="10" maxlength="10" value="<?php echo $db['radius']; ?>"  onKeyUp="return checkInput(this);" /> KM</td>

</tr>
<tr>
    <td width=20%>Lama</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class="form-control <?php echo $lama; ?>" name="lama" id="lama"  size="8" maxlength="50" value="<?php echo $db['lama']; ?>"  onKeyUp="return checkInput(this);" readonly/><font color=red>Untuk pengisian lama usaha dibulatkan misalnya 4.5 menjadi 5 </font>(Dalam Tahun)</div></td>
</tr>
  <tr>
    <td width=20%>Pendidikan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="pendidikan" id="pendidikan" class="js-example-basic-single js-states form-control <?php echo $pendidikan; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listpendidikan->result() as $bb){ ?>
                        <?php if($bb->id_pendidikan == $db['pendidikan']){ ?>
                            <option value="<?php echo $bb->id_pendidikan; ?>" selected><?php echo $bb->nm_pendidikan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $bb->id_pendidikan; ?>"><?php echo $bb->nm_pendidikan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
  <tr>
    <td width=20%>Jumlah Tanggungan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="jt" id="jt" class="js-example-basic-single js-states form-control <?php echo $jt; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listtanggungan->result() as $cc){ ?>
                        <?php if($cc->id_tanggungan == $db['jt']){ ?>
                            <option value="<?php echo $cc->id_tanggungan; ?>" selected><?php echo $cc->nm_tanggungan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $cc->id_tanggungan; ?>"><?php echo $cc->nm_tanggungan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>


</table></form>
         <tr>  </tr>
   </div>
   </center>



