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
 <script type="text/javascript">
$(document).ready(function(){
    $(':input:not([type="submit"])').each(function() {
        $(this).focus(function() {
            $(this).addClass('hilite');
        }).blur(function() {
            $(this).removeClass('hilite');});
    });

                                   $(".js-example-basic-single").select2({
  placeholder: "Select Data"
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

              $('#alamat_tinggal').removeAttr('disabled');
                $('#kdpos_tinggal').removeAttr('disabled');
                 $('#kelurahan_tinggal').removeAttr('disabled');
                $('#kecamatan_tinggal').removeAttr('disabled');
                   $('#propinsi_tinggal').removeAttr('disabled');
              $('#alamat_tinggal').focus();
             $('#kdpos_tinggal').focus();
              $('#kelurahan_tinggal').focus();
              $('#kecamatan_tinggal').focus();
             $('#propinsi_tinggal').focus();
          } else {
            var alamat=$('#alamat').val();
            var alamat_tinggal=$('#alamat_tinggal').val(alamat);
            var kdpos_ktp=$('#kdpos_ktp').val();
            var kdpos_tinggal =$('#kdpos_tinggal').val(kdpos_ktp);
             var kelurahan=$('#kelurahan_ktp').val();
            var kelurahan_tinggal = $('#kelurahan_tinggal').val(kelurahan);
            var kecamatan=$('#kecamatan_ktp').val();
            var kecamatan_tinggal=$('#kecamatan_tinggal').val(kecamatan);
             var propinsi=$('#propinsi_ktp').val();
            var propinsi_tinggal = $('#propinsi_tinggal').val(propinsi);
            alamat_tinggal.attr('readonly','readonly');
            kdpos_tinggal.attr('readonly','readonly');
            kelurahan_tinggal.attr('readonly','readonly');
            kecamatan_tinggal.attr('readonly','readonly');
            propinsi_tinggal.attr('readonly','readonly');


        }
    });
});

</script>

<script>
   function datatambahanpekerjaan(dat,link,form){
      $("#mymodal").modal("show");
            	var username = $("#userid").val();
        var string = "username="+username;
   	$.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>parameter/updatetambahfasilitas/"+dat+"/"+link+"/"+form,
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

        function hapustambahan(id){
    var no_aplikasi = $("#no_aplikasi").val();
    var string = "no_aplikasi="+no_aplikasi+"&id_tambahan="+id;

    var pilih = confirm('Data yang akan dihapus data tambahan = '+id+ '?');
    if (pilih==true) {
        $.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>detail/hapustambahan",
            data	: string,
            cache	: false,
            success	: function(data){
             tampil_data('<?php echo $aplikasi; ?>','updatepekerjaan','verifikasi','formpekerjaan','1');
            }
        });
    }
}

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
 </div><br>
   <table id="dataTable" width="100%">
         <tr></tr><tr></tr>
   <tr>
  <th>
  <b>Data Pekerjaan</b>
  </th>

  </tr>
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
   <tr>

    <td>
        <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" /></td>

    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>

<tr>
    <td width=20%>Jenis Pekerjaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="jns" id="jns" class="js-example-basic-single js-states form-control <?php echo $jns_pekerjaan; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listjnspekerjaan->result() as $m){ ?>
                        <?php if($m->id_jnspekerjaan == $db['jns_pekerjaan']){ ?>
                            <option value="<?php echo $m->id_jnspekerjaan; ?>" selected><?php echo $m->nm_jnspekerjaan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $m->id_jnspekerjaan; ?>"><?php echo $m->nm_jnspekerjaan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>Nama Perusahaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="nm_perusahaan" id="nm_perusahaan" size="30" maxlength="50" onkeyup="displayText()" value="<?php echo $dd['nm_perusahaan']; ?>" class="<?php echo $nm_perusahaan; ?>" readonly/></div></td>
</tr>
 <tr>
    <td width=20%>Bentuk Perusahaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="bentuk" id="bentuk" class="js-example-basic-single js-states form-control <?php echo $bentuk; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listbentuk->result() as $w){ ?>
                        <?php if($w->id_bentuk == $dd['bentuk']){ ?>
                            <option value="<?php echo $w->id_bentuk; ?>" selected><?php echo $w->nm_bentuk; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_bentuk; ?>"><?php echo $w->nm_bentuk; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>Alamat Perusahaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><textarea name="alamat" id="alamat"  onkeyup="displayText1()" class="<?php echo $alamat_perusahaan; ?>" readonly>
    <?php echo $dd['alamat_perusahaan']; ?></textarea></div><br /> </td>
</tr>
<tr>

 	<td width=20%>Kodepos</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="search" class='autocomplete nama <?php echo $kdpos_perusahaan; ?>' id="kdpos_perusahaan" name="kdpos_perusahaan" maxlength="50" size="20" value="<?php echo $dd['kdpos_perusahaan']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kelurahan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete <?php echo $kelurahan_perusahaan; ?>' name="kelurahan_perusahaan"   id="kelurahan_perusahaan" size="20" maxlength="50"  value="<?php echo $dd['kelurahan_perusahaan']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kecamatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete <?php echo $kecamatan_perusahaan; ?>'  name="kecamatan_perusahaan" id="kecamatan_perusahaan" size="20" maxlength="50"  value="<?php echo $dd['kecamatan_perusahaan']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete <?php echo $kotamadya_perusahaan; ?>'  name="kotamadya_perusahaan" id="kotamadya_perusahaan" size="20" maxlength="50"  value="<?php echo $dd['kotamadya_perusahaan']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Propinsi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete <?php echo $propinsi_perusahaan; ?>' name="propinsi_perusahaan" id="propinsi_perusahaan"  size="20" maxlength="50"  value="<?php echo $dd['propinsi_perusahaan']; ?>" readonly/></div></td>
</tr>
<tr>
    <td width=20%>Nomor Telepon</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="no_tlpperusahaan" id="no_tlpperusahaan" class="<?php echo $no_tlpperusahaan; ?>"  size="20" maxlength="50" value="<?php echo $dd['no_tlpperusahaan']; ?>" onKeyUp="return checkInput(this);" readonly/></div> Ext
    : <input type="text" name="no_ext" id="no_ext"  size="20" maxlength="50" class="<?php echo $no_ext; ?>" value="<?php echo $dd['no_ext']; ?>" onKeyUp="return checkInput(this);" readonly/></td>
</tr>
<tr>
    <td width=20%>Jabatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="jabatan" id="jabatan" class="js-example-basic-single js-states form-control <?php echo $jabatan; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listjabatan->result() as $w){ ?>
                        <?php if($w->id_jabatan == $dd['jabatan']){ ?>
                            <option value="<?php echo $w->id_jabatan; ?>" selected><?php echo $w->nm_jabatan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_jabatan; ?>"><?php echo $w->nm_jabatan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>Sektor Ekonomi</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="sektor_ekonomi" id="sektor_ekonomi" class="js-example-basic-single js-states form-control <?php echo $sektor_ekonomi; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listsektor->result() as $xx){ ?>
                        <?php if($xx->id_sektor == $dd['sektor_ekonomi']){ ?>
                            <option value="<?php echo $xx->id_sektor; ?>" selected><?php echo $xx->nm_sektor; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $xx->id_sektor; ?>"><?php echo $xx->nm_sektor; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>Sektor Unggulan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="sektor_unggulan" id="sektor_unggulan" class="js-example-basic-single js-states form-control <?php echo $sektor_unggulan; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listunggulan->result() as $xx){ ?>
                        <?php if($xx->id_unggulan == $dd['sektor_unggulan']){ ?>
                            <option value="<?php echo $xx->id_unggulan; ?>" selected><?php echo $xx->nm_unggulan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $xx->id_unggulan; ?>"><?php echo $xx->nm_unggulan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div>
      </td>

</tr>
<tr>
    <td width=20%>Lama Kerja</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="lama_kerja" id="lama_kerja"  size="8" maxlength="50" class="<?php echo $lama_kerja; ?>" value="<?php echo $dd['lama_kerja']; ?>"  onKeyUp="return checkInput(this);" readonly/><font color=red>Untuk pengisian lama usaha dibulatkan misalnya 4.5 menjadi 5 </font>(Dalam Tahun)</div></td>
</tr>
<tr>
    <td width=20%>Jumlah karyawan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="jml_karyawan" id="jml_karyawan" class="<?php echo $jml_karyawan; ?>"  size="8" maxlength="50" value="<?php echo $dd['jml_karyawan']; ?>"  onKeyUp="return checkInput(this);" readonly/>(Banyak Orang)</div></td>
</tr>
<tr></tr><tr></tr><tr></tr>

<tr>
    <td width=20%>Status Tempat Usaha</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="status_usaha" id="status_usaha" class="js-example-basic-single js-states form-control <?php echo $status_usaha; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($liststatususaha->result() as $ll){ ?>
                        <?php if($ll->id_statususaha == $dd['status_usaha']){ ?>
                            <option value="<?php echo $ll->id_statususaha; ?>" selected><?php echo $ll->nm_statususaha; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $ll->id_statususaha; ?>"><?php echo $ll->nm_statususaha; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>Kondisi Tempat Usaha</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="kondisi_usaha" id="kondisi_usaha" class="js-example-basic-single js-states form-control <?php echo $kondisi_usaha; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listkondisi->result() as $ww){ ?>
                        <?php if($ww->id_kondisi == $dd['kondisi_usaha']){ ?>
                            <option value="<?php echo $ww->id_kondisi; ?>" selected><?php echo $ww->nm_kondisi; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $ww->id_kondisi; ?>"><?php echo $ww->nm_kondisi; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width=20%>Lokasi Tempat Usaha</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="lokasi_usaha" id="lokasi_usaha" class="js-example-basic-single js-states form-control <?php echo $lokasi_usaha; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listlokasi->result() as $pp){ ?>
                        <?php if($pp->id_lokasi == $dd['lokasi_usaha']){ ?>
                            <option value="<?php echo $pp->id_lokasi; ?>" selected><?php echo $pp->nm_lokasi; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $pp->id_lokasi; ?>"><?php echo $pp->nm_lokasi; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width="10%">Pembukuan</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
     <select name="pembukuan" id="pembukuan" class="js-example-basic-single js-states form-control <?php echo $pembukuan; ?>" disabled>
   <option value="0">-Pilih-</option>
     <?php foreach($listbuku->result() as $buku){ ?>
                        <?php if($buku->id_buku == $dd['pembukuan']){ ?>
                            <option value="<?php echo $buku->id_buku; ?>" selected><?php echo $buku->nm_buku; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $buku->id_buku; ?>"><?php echo $buku->nm_buku; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select>
    </div></td>
</tr>
<tr>
    <td width="10%">Kapasitas Usaha</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
     <select name="kapasitas" id="kapasitas" class="js-example-basic-single js-states form-control <?php echo $kapasitas; ?>" disabled>
      <option value="0">-Pilih-</option>
      <?php foreach($listkapasitas->result() as $buku){ ?>
                        <?php if($buku->id_kapasitas == $dd['kapasitas']){ ?>
                            <option value="<?php echo $buku->id_kapasitas; ?>" selected><?php echo $buku->nm_kapasitas; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $buku->id_kapasitas; ?>"><?php echo $buku->nm_kapasitas; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></div>
    </td>
</tr>
<tr>
    <td width=20%>Pengadaan Bahan Baku</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="bahan_baku" id="bahan_baku" class="js-example-basic-single js-states form-control <?php echo $bahan_baku; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listbahanbaku->result() as $hh){ ?>
                        <?php if($hh->id_bahanbaku == $dd['bahan_baku']){ ?>
                            <option value="<?php echo $hh->id_bahanbaku; ?>" selected><?php echo $hh->nm_bahanbaku; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $hh->id_bahanbaku; ?>"><?php echo $hh->nm_bahanbaku; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width="20%">Pengaruh Kebijakan Pemerintah terhadap Usaha Yang Dijalani
</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
     <select name="kebijakan" id="kebijakan" class="js-example-basic-single js-states form-control <?php echo $kebijakan; ?>" disabled>
      <option value="0">-Pilih-</option>
     <?php foreach($listkebijakan->result() as $hh){ ?>
                        <?php if($hh->id_kebijakan == $dd['kebijakan']){ ?>
                            <option value="<?php echo $hh->id_kebijakan; ?>" selected><?php echo $hh->nm_kebijakan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $hh->id_kebijakan; ?>"><?php echo $hh->nm_kebijakan; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></div>
    </td>
</tr>

</table>

       <br /><br />
    <th>Data Pekerjaan Pemohon (Tambahan)</th><br /><br />




    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
<tr>
    <th>Nama Perusahaan / Nama Usaha</th>
    <th>Alamat Perusahaan / Usaha</th>
    <th>No. Tlp</th>
    <th>No. Ext</th>
    <th>Jabatan</th>
     <th>Aksi</th>
</tr>
<?php
if($listtambahkerja->num_rows() > 0){
    $no=1;
    foreach($listtambahkerja->result() as $nn){

    ?>
    	<tr>
             <td align="center" width="150" ><?php echo $nn->nm_tambahan; ?></td>
             <td align="center" width="150" ><?php echo $nn->alamat_tambahan; ?></td>
             <td align="center" width="150" ><?php echo $nn->no_tlptambahan; ?></td>
             <td align="center" width="150" ><?php echo $nn->no_exttambahan; ?></td>
               <td align="center" width="150" ><?php echo $nn->jabatan_tambahan; ?></td>



                             <td width="2" align="center">

             <?php echo "<a href='javascript:hapustambahan(\"{$nn->id_tambahan}\")'>";?>
               Hapus
            </a>
        </td>
     </tr>
    <?php
        $no++;
        }
    }else{
    ?>
    	<tr>
        	<td colspan="6" align="center" >Tidak Ada Data</td>
        </tr>
    <?php
    }
?>


</table>

