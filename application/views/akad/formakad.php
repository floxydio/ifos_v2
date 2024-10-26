<?php
$data = $this->app_model->CariParameter($db['no_aplikasi'], 'no_aplikasi', 'tb_akad_nomor', 'nomor_akad');
if ($data == '') {
  $hasil = '1';
} else {
  $hasil = '2';
}


?>

<script type="text/javascript">
  $(document).ready(function() {

    $(':input:not([type="submit"])').each(function() {
      $(this).focus(function() {
        $(this).addClass('hilite');
      }).blur(function() {
        $(this).removeClass('hilite');
      });
    });
    $(".js-example-basic-single").select2({
      placeholder: "Select Data"
    });
    var tes = $("#tes").val();
    if (tes == 2) {
      $("#simpanakad").attr('disabled', 'disabled');
    } else {
      $("#simpanakad").removeAttr('enabled', 'enabled');;
    }
    $("#reason").hide();
    $('#kode').dialog('close');
    $('#kose').dialog('close');
    $('#kote').dialog('close');

    $('#ssb').dialog('close');
    var notaris = $("#notaris").val();
    if (notaris.length == '') {
      $("#cetak").attr('disabled', 'disabled');
      $("#kirim").attr('disabled', 'disabled');

    } else {
      $("#cetak").removeAttr('enabled', 'enabled');
      $("#kirim").removeAttr('enabled', 'enabled');

    }

    $("#view").show();
    $("#form").hide();
    $("#dataforward").hide();
    $("#datatolak").hide();
    $("#datasetuju").hide();


    $("#forward").click(function() {
      $("#dataforward").show();
      $("#datatolak").hide();

      $("#approved").attr('disabled', 'disabled');
      $("#print").attr('disabled', 'disabled');
      $("#tolak").attr('disabled', 'disabled');
      $("#analisa").attr('disabled', 'disabled');
    });
    $("#approved").click(function() {
      $("#datasetuju").show();
      $("#datatolak").hide();
      $("#dataforward").hide();

      $("#print").attr('disabled', 'disabled');
      $("#forward").attr('disabled', 'disabled');
      $("#tolak").attr('disabled', 'disabled');
      $("#analisa").attr('disabled', 'disabled');
    });

    $("#back").click(function() {
      var no_aplikasi = $("#no_aplikasi").val();
      window.location.assign('<?php echo base_url(); ?>index.php/approval/updatereview/' + no_aplikasi);
    });

    $("#backtolak").click(function() {
      var no_aplikasi = $("#no_aplikasi").val();
      window.location.assign('<?php echo base_url(); ?>index.php/approval/updatereview/' + no_aplikasi);
    });

    $("#backsetuju").click(function() {
      var no_aplikasi = $("#no_aplikasi").val();
      window.location.assign('<?php echo base_url(); ?>index.php/approval/updatereview/' + no_aplikasi);
    });
    $("#simpanakad").click(function() {


      var no_aplikasi = $("#no_aplikasi").val();
      var skim = $("#skim").val();

      //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
      var string = "&no_aplikasi=" + no_aplikasi + "&skim=" + skim;



      $.ajax({
        type: 'POST',
        url: "<?php echo site_url(); ?>akad/generatenoakad",
        data: string,
        cache: false,
        success: function(data) {
          message('success', 'Generate Nomor Akad Sudah Berhasil');
          $('#simpanakad').attr('disabled', 'disabled');
        },
        error: function(xhr, teksStatus, kesalahan) {
          $.messager.show({
            title: 'Info',
            msg: 'Server tidak merespon :' + kesalahan,
            timeout: 2000,
            showType: 'slide'
          });
        }
      });

    });




    $("#kirim").click(function() {


      var no_aplikasi = $("#no_aplikasi").val();

      //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
      var string = "&no_aplikasi=" + no_aplikasi;


      $.ajax({
        type: 'POST',
        url: "<?php echo site_url(); ?>akad/updatesetuju",
        data: string,
        cache: false,
        success: function(data) {
          window.location.assign('<?php echo base_url(); ?>akad');

        },
        error: function(xhr, teksStatus, kesalahan) {
          $.messager.show({
            title: 'Info',
            msg: 'Server tidak merespon :' + kesalahan,
            timeout: 2000,
            showType: 'slide'
          });
        }
      });

    });

    $("#cancelm").click(function() {

      var no_aplikasi = $("#no_aplikasi").val();
      var ket = $("#ket").val();
      var alasan = $("#alasan").val();


      var string = "&no_aplikasi=" + no_aplikasi + "&ket=" + ket + "&alasan=" + alasan;



      if (ket == 0) {
        //alert("Maaf, Nama Rekening tidak boleh kosong");
        $.messager.show({
          title: 'Info',
          msg: 'Maaf, Reason Tidak Boleh Kosong',
          timeout: 2000,
          showType: 'fade',
          style: {
            right: '',
            bottom: ''
          }
        });

        $("#ket").focus();
        return false;
      }

      if (alasan.length == 0) {
        //alert("Maaf, Nama Rekening tidak boleh kosong");
        $.messager.show({
          title: 'Info',
          msg: 'Maaf, Keterangan Tidak Boleh Kosong',
          timeout: 2000,
          showType: 'fade',
          style: {
            right: '',
            bottom: ''
          }
        });

        $("#alasan").focus();
        return false;
      }




      $.ajax({
        type: 'POST',
        url: "<?php echo site_url(); ?>cekduplikasi/updatecancel",
        data: string,
        cache: false,

        success: function(data) {
          window.location.assign('<?php echo base_url(); ?>akad');
        },
        error: function(xhr, teksStatus, kesalahan) {
          $.messager.show({
            title: 'Info',
            msg: 'Server tidak merespon :' + kesalahan,
            timeout: 2000,
            showType: 'slide'
          });
        }
      });

    });


    $("#canceln").click(function() {
      var no_aplikasi = $('#no_aplikasi').val();
      var string = "no_aplikasi=" + no_aplikasi;

      $.messager.confirm('Konfirmasi Pembatalan Nasabah', 'Anda Yakin No Aplikasi tersebut di hapus pada sistem Fas dikarenakan Nasabah Mengajukan Pembatalan Pembiayaan ?', function(r) {
        if (r) {
          $("#reason").show();
          $('#canceln').attr('disabled', 'disabled');
          $('#simpan').attr('disabled', 'disabled');



          $('#rejectm').hide();

          $('#send').attr('disabled', 'disabled');
        }
      });
    });

    $("#kembali").click(function() {
      var thp = $("#thp").val();
      window.location.assign('<?php echo base_url(); ?>' + thp);
    });


  });
</script>

<script>
  $(function() {

    $('.tgl').datepicker({
      format: 'yyyy-mm-dd',
    }).on('changeDate', function(e) {
      $(this).datepicker('hide');
    });
  })

  tinymce.init({
    selector: 'textarea',
    width: 500,
    readonly: 1
  });
</script>
<script>
  function printContent(el) {

    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;

  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var textbox = '#ThousandSeperator_commas';
    var hidden = '#ThousandSeperator_num';
    $("#biaya_administrasi").keyup(function() {
      var num = $("#biaya_administrasi").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#biaya_administrasi").val(numCommas);
    });
    $("#biaya_notaris").keyup(function() {
      var num = $("#biaya_notaris").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#biaya_notaris").val(numCommas);
    });
    $("#biaya_appraisal").keyup(function() {
      var num = $("#biaya_appraisal").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#biaya_appraisal").val(numCommas);
    });

    $("#biaya_blokir").keyup(function() {
      var num = $("#biaya_blokir").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#biaya_blokir").val(numCommas);
    });

    $("#biaya_materai").keyup(function() {
      var num = $("#biaya_materai").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#biaya_materai").val(numCommas);
    });
    $("#biaya_cadangan").keyup(function() {
      var num = $("#biaya_cadangan").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#biaya_cadangan").val(numCommas);
    });
    $("#nilai_tanggungjiwa").keyup(function() {
      var num = $("#nilai_tanggungjiwa").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#nilai_tanggungjiwa").val(numCommas);
    });
    $("#nilai_tanggungjamin").keyup(function() {
      var num = $("#nilai_tanggungjamin").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#nilai_tanggungjamin").val(numCommas);
    });
    $("#premijiwa").keyup(function() {
      var num = $("#premijiwa").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#premijiwa").val(numCommas);
    });
    $("#premijamin").keyup(function() {
      var num = $("#premijamin").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#premijamin").val(numCommas);
    });
    $("#nilai_tanggungbakar").keyup(function() {
      var num = $("#nilai_tanggungbakar").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#nilai_tanggungbakar").val(numCommas);
    });

    $("#premibakar").keyup(function() {
      var num = $("#premibakar").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#premibakar").val(numCommas);
    });
    $("#peng_tambahanpasangan2").keyup(function() {
      var num = $("#peng_tambahanpasangan2").val();
      var comma = /,/g;
      num = num.replace(comma, '');
      $(hidden).val(num);
      var numCommas = addCommas(num);
      $("#peng_tambahanpasangan2").val(numCommas);
    });

  });


  function addCommas(nStr) {
    nStr += '';
    var comma = /,/g;
    nStr = nStr.replace(comma, '');
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }
</script>
<script type="text/javascript">
  function tampil_data(dat, kontrol, link, form, num) {
    var username = $("#userid").val();
    var string = "username=" + username;

    $.ajax({
      type: 'POST',
      url: "<?php echo site_url(); ?>parameter/" + kontrol + "/" + dat + "/" + link + "/" + form + "/" + num,
      data: string,
      cache: false,
      beforeSend: function() {
        $("#dataform").show(1000).html("<img style='position:fixed; top:40%;right:40%;' src='<?php echo base_url('assets/img/loader1.gif'); ?>' height='70'>");
      },
      success: function(data) {
        $("#dataform").html(data);
        $("#view").hide();


      }
    });
  }
</script>
<div id="dataform">
  <table align='center' width="180px">
    <tr>

      <?php

      $no = 0;
      foreach ($listtabs->result_array() as $jk) {

        if (($no % 9) == 0) {
          echo "<br><br>";
        }
      ?>
        <td> <a href="javascript:tampil_data('<?php echo $aplikasi; ?>','<?php echo $jk['kontrol']; ?>','<?php echo $jk['link']; ?>','<?php echo $jk['form']; ?>','<?php echo $jk['level_tab']; ?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon']; ?>"></i> <?php echo $jk['nm_tab']; ?> </a> </td>


      <?php
        $no++;
      }

      ?>
    </tr>
  </table>
  <form class="form-horizontal" id="dataTable">


    <table align=center class="table table-sm">
      <tr></tr>
      <tr>
        <td align="center" width="60%">
          <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-user"></i> Data Diri Pemohon</button><input type="hidden" name="tes" class="form-control" id="tes" value="<?php echo $hasil; ?>">

        </td>

      </tr>

    </table>
    <table class="table table-xs">
      <tr>
        <td width=100px>No Cabang </td>
        <td>:</td>
        <td width=150px><input type="hidden" name="plafon_biaya" id="plafon_biaya" value="<?php echo $plafon; ?>" /><input type="hidden" name="hasil" id="hasil" value="<?php echo $db['pic_pemutus']; ?>" /><input type="hidden" name="scoring" id="scoring" value="<?php echo $db['scoring']; ?>" /><input type="hidden" name="no_aplikasi" id="no_aplikasi" value="<?php echo $db['no_aplikasi']; ?>" /> <input type="hidden" name="skim" id="skim" value="<?php echo $db['skim']; ?>" /> <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab; ?>" /></td>

        <?php echo $cabang; ?></td>
        <td width=100px>Alamat Rumah </td>
        <td>:</td>
        <td width=150px> <?php echo $db['alamat_tinggal']; ?> </td>
        <td width=100px>Jenis Kelamin </td>
        <td>:</td>
        <?php

        foreach ($listjk->result_array() as $jk) {
        ?>
          <td width=150px> <?php echo $jk['nm_jk']; ?> </td>
        <?php
        }
        ?>
        <td width=100px>Nama Perusahaan </td>
        <td>:</td>
        <?php

        foreach ($listperusahaan->result_array() as $usaha) {
        ?>
          <td width=150px> <?php echo $usaha['nm_perusahaan']; ?> </td>
        <?php
        }
        ?>
      </tr>
      <tr>
        <td width=100px>Nama </td>
        <td>:</td>
        <td width=150px>: <?php echo $db['nm_lengkap']; ?></td>
        <td width=100px>Kelurahan </td>
        <td>:</td>
        <td width=150px><?php echo $db['kelurahan_tinggal']; ?> </td>
        <td width=100px>Status Nikah </td>
        <?php

        foreach ($listnikah->result_array() as $nikah) {
        ?>
          <td>:</td>
          <td width=150px> <?php echo $nikah['nm_nikah']; ?> </td>
        <?php
        }
        ?>
        <td width=100px>Jabatan Pekerjaan </td>
        <?php

        foreach ($listjabatan->result_array() as $jabatan) {
        ?>
          <td>:</td>
          <td width=150px> <?php echo $jabatan['nm_jabatan']; ?> </td>
        <?php
        }
        ?>
      </tr>
      <tr>
        <td width=100px>Tanggal Lahir </td>
        <td>:</td>
        <td width=150px> <?php echo $db['tanggal_lahir']; ?></td>
        <td width=100px>Kecamatan</td>
        <td>:</td>
        <td width=150px> <?php echo $db['kecamatan_tinggal']; ?> </td>
        <td width=100px>Jumlah Tanggungan </td>

        <td>:</td>
        <td width=150px> <?php echo $db['jt']; ?> </td>

        <td width=100px>Alamat Kerja/Usaha </td>
        <td>:</td>
        <?php

        foreach ($listperusahaan->result_array() as $usaha) {
        ?>
          <td width=150px> <?php echo $usaha['alamat']; ?> </td>
        <?php
        }
        ?>
      </tr>
      <tr>
        <td width=100px>Umur </td>
        <td>:</td>
        <td width=150px> <?php
                          $upload = $this->app_model->get_umur($db['tanggal_lahir']);
                          echo $upload; ?> Tahun</td>
        <td width=100px></td>
        <td></td>
        <td width=150px></td>
        <td width=100px>Kontak Darurat </td>

        <td></td>
        <td width=150px></td>

        <td width=100px>No Tlp</td>
        <td>:</td>
        <?php

        foreach ($listperusahaan->result_array() as $usaha) {
        ?>
          <td width=150px> <?php echo $usaha['no_tlp']; ?> </td>
        <?php
        }
        ?>
      </tr>
      <tr>
        <td width=100px>No Identitas</td>
        <td>:</td>
        <td width=150px> <?php echo $db['no_identitas']; ?></td>
        <td width=100px>Kota</td>
        <td>:</td>
        <td width=150px><?php echo $db['kotamadya_tinggal']; ?></td>
        <td width=100px>Nama</td>
        <?php

        foreach ($listkontak->result_array() as $kontak) {
        ?>
          <td>:</td>
          <td width=150px> <?php echo $kontak['nm_lengkap']; ?> </td>
        <?php
        }
        ?>
        <td width=100px>Lama Kerja / Usaha</td>
        <td>:</td>
        <?php

        foreach ($listperusahaan->result_array() as $usaha) {
        ?>
          <td width=150px> <?php echo $usaha['lama_kerja']; ?> </td>
        <?php
        }
        ?>
      </tr>
      <tr>
        <td width=100px>Nama Pasangan </td>
        <td>:</td>

        <?php

        foreach ($listpasangan->result_array() as $pasangan) {
        ?>
          <td width=150px> <?php echo $pasangan['nm_lengkap']; ?> </td>
        <?php
        }
        ?> <td width=100px>Propinsi</td>
        <td>:</td>
        <td width=150px><?php echo $db['propinsi_tinggal']; ?></td>
        <td width=100px>No.Tlp </td>
        <?php

        foreach ($listkontak->result_array() as $kontak) {
        ?>
          <td>:</td>
          <td width=150px> <?php echo $kontak['no_tlp']; ?> </td>
        <?php
        }
        ?>
        <td width=100px>Sektor Ekonomi</td>
        <td>:</td>
        <?php

        foreach ($listsektor->result_array() as $sektor) {
        ?>
          <td width=150px> <?php echo $sektor['nm_sektor']; ?> </td>
        <?php
        }
        ?>
      </tr>
      <tr>
        <td width=100px>No Telp rumah </td>
        <td>:</td>

        <td width=150px> <?php echo $db['no_tlp']; ?> </td>
        <td width=100px>Kodepos</td>
        <td>:</td>
        <td width=150px><?php echo $db['kdpos_tinggal']; ?></td>
        <td width=100px>Hubungan </td>
        <?php

        foreach ($listkontak->result_array() as $kontak) {
        ?>
          <td>:</td>
          <td width=150px> </td>
        <?php
        }
        ?>
        <td width=100px>Pendidikan Terakhir</td>
        <td>:</td>
        <?php

        foreach ($listpendidikan->result_array() as $pendidikan) {
        ?>
          <td width=150px><?php echo $pendidikan['nm_pendidikan']; ?> </td>
        <?php
        }
        ?>

      </tr>
    </table>

    <table class="table table-sm" align=center>

      <tr>
        <td align="center" width="60%">
          <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-usd"></i> Struktur Pembiayaan</button>

        </td>

      </tr>

    </table>

    <table class="table table-xs">
      <tr>
        <td width=100px>Skim Pembiayaan </td>
        <td>:</td>
        <?php

        foreach ($listskim->result_array() as $skim) {
        ?>
          <td width=150px> <?php echo $skim['nm_skim']; ?> </td>
        <?php
        }
        ?>
        <td width=100px>Tujuan </td>
        <td>:</td>
        <?php

        foreach ($listtujuan->result_array() as $tujuan) {
        ?>
          <td width=150px> <?php echo $tujuan['nm_penggunaan']; ?> </td>
        <?php
        }
        ?>
        <td width=100px>Uang Muka</td>
        <td>:</td>
        <td width=150px>: <?php echo $db['uang_muka']; ?></td>
        <td width=100px>Jangka Waktu</td>
        <td>:</td>
        <td width=150px><?php echo $db['jangka_waktu']; ?>

        </td>

      </tr>
      <tr>
        <td width=100px>Jenis Pembiayaan </td>
        <td>:</td>
        <?php

        foreach ($listtuju->result_array() as $tuju) {
        ?>
          <td width=150px> <?php echo $tuju['nm_jnskegunaan']; ?> </td>
        <?php
        }
        ?>
        <td width=100px>Plafon yang diajukan
        </td>
        <td>:</td>

        <td width=150px> <?php echo $db['plafon']; ?> </td>

        <td width=100px>Margin</td>
        <td>:</td>
        <td width=150px>: <?php echo $db['margin']; ?>%</td>
        <td width=100px>Tipe Margin</td>
        <td>:</td>
        <?php

        foreach ($listmargin->result_array() as $margin) {
        ?>
          <td width=150px> <?php echo $margin['nm_tipemargin']; ?> </td>
        <?php
        }
        ?>

      </tr>
      <tr>
        <td width=100px>No Rekening Pencairan</td>
        <td>:</td>
        <td width=150px> <input type="text" name="rek_nasabah" id="rek_nasabah" value="<?php echo $db['rek_nasabah']; ?>" onchange="javascript:simpannasabah('rek_nasabah','tb_pembiayaan')" /></td>
        <td width=100px>Nama Notaris</td>
        <td>:</td>
        <td width=150px><input type="text" name="notaris" class="form-control" id="notaris" value="<?php echo $akad['notaris']; ?>" onchange="javascript:simpannasabah('notaris','tb_akad')" /> </td>
        <td width=100px>Angsuran</td>
        <td>:</td>
        <td width=150px><?php echo $db['angsuran']; ?> </td>

      </tr>

    </table>
    <br />
    <br>
    <div class="box-body" style="background-color:#F2F2F2">
      <!-- row -->


      <ul id="tabs" class="nav nav-tabs">
        <li id="datakuasa" class="active"> <a href="#tampildetail" onclick="javascript:tampil_nav('<?php echo $db['no_aplikasi']; ?>','akad','akadbar')" data-toggle="tab"> Kuasa Tandatangan</a></li>
        <li id="datarealisasi"> <a href="#tampildetail" onclick="javascript:tampil_nav('<?php echo $db['no_aplikasi']; ?>','akad','formagunan')" data-toggle="tab">Data Agunan</a></li>
        <li id="datarealisasi"> <a href="#tampildetail" onclick="javascript:tampil_nav('<?php echo $db['no_aplikasi']; ?>','akad','formobjek')" data-toggle="tab">Objek Akad</a></li>
        <li id="datarealisasi"> <a href="#tampildetail" onclick="javascript:tampil_nav('<?php echo $db['no_aplikasi']; ?>','akad','formbiaya')" data-toggle="tab">Biaya Dan Asuransi</a></li>
        <li id="datarealisasi"> <a href="#tampildetail" onclick="javascript:tampil_nav('<?php echo $db['no_aplikasi']; ?>','akad','formsyarat')" data-toggle="tab"> Syarat Realisasi Pembiayaan</a></li>
        <li id="dataupload"> <a href="#tampildetail" onclick="javascript:tampil_nav('<?php echo $db['no_aplikasi']; ?>','akad','upload_angsuran')" data-toggle="tab"> Upload Data Angsuran</a></li>
        <li id="previewakad"> <a href="#tampildetail" onclick="javascript:tampil_nav('<?php echo $db['no_aplikasi']; ?>','akad','akad_review')" data-toggle="tab"> Preview</a></li>
      </ul>
      <div class="tab-content" style="background-color:#F2F2F2">
        <div class="tab-pane active" id="tampildetail"><span class="pull-right" id="headerDetail" style="display:none"></span>
          <div class="formdetail" id="tampilformdetail"></div>
        </div>
      </div>
    </div> <br />


    <br />
    <table id="Data" align="center">
      <tr>
        <td>
          <button type="button" name="simpanakad" id="simpanakad" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Generate Nomor Akad</button>

        </td>
        <td> <button type="button" name="canceln" id="canceln" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Pembatalan aplikasi</button>

        </td>
        <td>
          <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>

        </td>
        <td>
          <button type="button" name="kirim" id="kirim" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-envelope"></i> Kirim Proses</button>

        </td>
      </tr>
    </table>
  </form>
</div>
<br />
<div id="reason">
  <table id="data" width="70%">
    <tr></tr>
    <tr></tr>
    <tr>

    </tr>

    <tr>
      <td width=20%>Reason</td>
      <td>:</td>
      <td>
        <?php if ($listreason->num_rows() > 0) {  ?>
          <select name="ket" id="ket">
            <option value="0">-Pilih-</option>
            <?php foreach ($listreason->result() as $w) {
            ?>

              <option value="<?php echo $w->id_reason; ?>"><?php echo $w->id_reason; ?>-<?php echo $w->nm_reason; ?></option>

            <?php } ?>

          </select>
        <?php } else { ?>
          <font color=red> Data Upliner Belum ada </font>
        <?php } ?>
      </td>

    </tr>
    <tr>
      <td width=20%></td>
      <td>:</td>
      <td><textarea name="alasan" id="alasan"></textarea></td>
    </tr>
    <tr>
      <td> <input type="button" name="cancelm" id="cancelm" value="Kirim">
        <input type="button" name="cancelm" id="rejectm" value="Kembali">


      </td>
    </tr>
  </table>

</div><br />

<div style=" height:auto"></div>
<script type="text/javascript">
  function tampil_nav(dat, link, form) {
    var no_aplikasi = '<?php echo $db['no_aplikasi']; ?>';
    var string = "no_aplikasi=" + no_aplikasi;

    $.ajax({
      type: 'POST',
      url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
      data: string,
      cache: false,
      beforeSend: function() {
        document.getElementById('tampilformdetail').style.display = 'none';
        //$('#frmaddmjob').css("opacity",".5");
        $("#headerDetail").html("");

      },
      success: function(html) {
        document.getElementById('tampilformdetail').style.display = 'block';
        $(".formdetail").html(html);
      }
    });
  }
</script>

<script>
  function simpannasabah(nama, tabel) {
    var no_aplikasi = $("#no_aplikasi").val();
    var verifikasi = $("#" + nama).val();

    var data = "no_aplikasi=" + no_aplikasi + "&verifikasi=" + verifikasi;

    if (verifikasi == 0) {
      message('error', 'Data tidak boleh kosong');
      $("#" + nama).focus();
      $("#" + nama).val('' + inputdata);
      return false;
    }

    $.ajax({
      type: 'POST',
      dataType: 'html',
      url: "<?php echo site_url(); ?>verifikasi/updatetabel/" + nama + "/" + tabel,
      data: data,
      beforeSend: function() {
        //document.getElementById('uploadProcessDetailRincian').style.display= 'block';
        //$('#datanasabah').css("opacity",".2");
      },
      success: function(htmldataumum) {
        message('success', 'Data berhasil di dirubah');
      }
    }); //simpan


  }
</script>