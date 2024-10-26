<?php
$no = 1;
if ($db['skim'] == '1') {
  $nama_akad = "Akad Pembiayaan Ujrah";
  $nama_skim = "Ijarah";
  $foldername = "print_akad_ijarah";
} else if ($db['skim'] == '2') {
  $nama_akad = "Akad Pembiayaan Murabahah";
  $nama_skim = "Murabahah";
  $foldername = "print_akad_murabahah";
} else {
  $nama_akad = "Akad Pembiayaan Qard";
  $nama_skim = "Qard";
  $foldername = "print_akad_qard";
}
?>

<script>
  $(document).ready(function() {
    $("#btntambahobjek<?php echo $no; ?>").click(function() {
      $("#mymodal").modal("show");
      var dat = "<?php echo $db['no_aplikasi']; ?>";
      var link = "akad";
      var form = "akad_form_inputobjek";
      var data = $("#btntambahobjek<?php echo $no; ?>").attr('data');
      var txtidkodereg = $("#btntambahobjek<?php echo $no; ?>").attr('kodereg');
      var txtkodeakaddetail = $("#btntambahobjek<?php echo $no; ?>").val();
      var userid = $("#useridobjekbangunan").val();
      $.ajax({
        type: "GET",
        dataType: 'html',
        url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
        data: {
          data: data,
          txtkodeakaddetail: txtkodeakaddetail,
          txtidkodereg: txtidkodereg,
          userid: userid
        },
        beforeSend: function() {
          document.getElementById('datatampil').style.display = 'none';
          $('.cfrmaddmjob').css("opacity", ".20");
        },
        success: function(html) {
          $("#datatampil").html(html);
          document.getElementById('datatampil').style.display = 'block';
          $('.cfrmaddmjob').css("opacity", "");

        }
      });

    });
  });
</script>

<table border="0" class="table table-bordered table-condensed table-striped table-hover">

  <tr>
    <th style="background-color:#CCCCCC" scope="col">
      <div align="center">No</div>
    </th>
    <th style="background-color:#CCCCCC" scope="col">
      <div align="center">Nama Akad </div>
    </th>
    <th style="background-color:#CCCCCC" scope="col">
      <div align="center">#</div>
    </th>

  </tr>
  <tr>
    <td style="background-color:#FFFFFF">
      <div align="center"><label for="exampleInputEmail1">1</label></div>
    </td>
    <td style="background-color:#FFFFFF">
      <div align="left"><label for="exampleInputEmail1"><?php echo $nama_akad; ?></label></div>
    </td>
    <td style="background-color:#FFFFFF">
      <div align="center"><label><a href="#popupobjek"><button class="btn btn-mini" value="<?php echo $db['no_apikasi']; ?>" type="button" data="input_surat" kodereg="<?php echo $db['no_apikasi']; ?>" id="btntambahobjek<?php echo $no; ?>"><span class="glyphicon glyphicon-plus"></span></button></a> </label></div>
    </td>
  </tr>
  <tr>
    <th style="background-color:#CCCCCC" scope="col">#</th>
    <th style="background-color:#CCCCCC" scope="col">Nama dan Rincian</th>
    <th style="background-color:#CCCCCC" scope="col">
      <div align="center">Satuan </div>
    </th>
    <th style="background-color:#CCCCCC" scope="col">
      <div align="center">Lokasi </div>
    </th>
    <th style="background-color:#CCCCCC" scope="col">
      <div align="center">Pemasok </div>
    </th>
    <th style="background-color:#CCCCCC" scope="col">
      <div align="center">Harga </div>
    </th>
    <th style="background-color:#CCCCCC" scope="col">
      <div align="center">Nilai Objek </div>
    </th>
  </tr>
  <?php
  $noobjek = 0;

  // $fielddataobjek=mysqli_num_rows($dataobjek);
  foreach ($listobjek->result_array() as $rowobjek) {
    $surat = str_replace(' ', '_', $rowobjek['nm_surat']);

    $noobjek++;
    if ($noobjek % 2 == 0) $warna = "#EAEAEA";
    else $warna = "#FFFFFF";
    if ($surat == 'Surat_Permohonan_Realisasi') {
      $hasilpagesurat = "print_surat_realisasi";
    } elseif ($surat == 'Surat_Permohonan_Realisasi_Musyarakah') {
      $hasilpagesurat = "print_surat_realisasi_musyarakah";
    } elseif ($surat == 'Surat_Permohonan_Realisasi_Mudharabah') {
      $hasilpagesurat = "print_surat_realisasi_mudharabah";
    } elseif ($surat == 'Purchase_Order') {
      $hasilpagesurat = "print_purchase_order";
    } elseif ($surat == 'Surat_Penerimaan_barang') {
      $hasilpagesurat = "print_surat_penerimaan_barang";
    } elseif ($surat == 'Akad_Wakalah') {
      $hasilpagesurat = "print_akad_wakalah";
    } elseif ($surat == 'Jadwal_Angsuran') {
      $hasilpagesurat = "print_jadwal_angsuran";
    }



  ?>
    <script>
      $(document).ready(function() {
        $("#btndeleteobjek<?php echo $noobjek; ?>").click(function() {
          var kdobjekakad = $('#btndeleteobjek<?php echo $noobjek; ?>').val();

          $.ajax({
            type: "POST",
            dataType: 'html',
            url: "<?php echo site_url(); ?>verifikasi/hapusobjek",
            data: 'kdobjekakad=' + kdobjekakad,
            success: function() {
              var dat = '<?php echo $db['no_aplikasi']; ?>';
              var link = 'akad';
              var form = 'formobjek';
              $.ajax({
                type: "POST",
                dataType: 'html',
                url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
                data: 'dat=' + dat,
                beforeSend: function() {
                  document.getElementById('headerDetail').style.display = 'block';
                },
                success: function(html) {
                  document.getElementById('headerDetail').style.display = 'block';
                  $(".formdetail").html(html);

                }
              });
            }
          });

        });
      });
    </script>
    <tr>
      <th style="background-color:#CCCCCC" scope="col">
        <div align="center"><button type="button" class="btn btn-mini" value="<?php echo $rowobjek['id_objek']; ?>" id="btndeleteobjek<?php echo $noobjek; ?>"><i class="glyphicon glyphicon-trash text-red"></i></button></div>
      </th>
      <th style="background-color:<?php echo $warna; ?>">
        <div align="left">
          <label for="exampleInputEmail1"><?php echo $rowobjek['namabarang'] . ' ' . $rowobjek['rincian']; ?></label>
        </div>
      </th>
      <th style="background-color:<?php echo $warna; ?>">
        <div align="center">
          <label for="exampleInputEmail1"><?php echo $rowobjek['satuan']; ?></label>
        </div>
      </th>
      <th style="background-color:<?php echo $warna; ?>">
        <div align="left">
          <label for="exampleInputEmail1"><?php echo $rowobjek['lokasi']; ?></label>
        </div>
      </th>
      <th style="background-color:<?php echo $warna; ?>">
        <div align="center">
          <label for="exampleInputEmail1"><?php echo $rowobjek['pemasok']; ?></label>
        </div>
      </th>
      <th style="background-color:<?php echo $warna; ?>">
        <div align="center">
          <label for="exampleInputEmail1"><?php echo number_format($rowobjek['harga']); ?></label>
        </div>
      </th>
      <th colspan="2" style="background-color:<?php echo $warna; ?>">
        <div align="center">
          <label for="exampleInputEmail1"><?php echo number_format($rowobjek['nilai']); ?></label>
        </div>
      </th>
    </tr>
  <?php } ?>


</table>