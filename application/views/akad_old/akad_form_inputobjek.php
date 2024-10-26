<script>
  $(document).ready(function() {
    $("#btncloseobjek").click(function() {
      var dat = '<?php echo $db['no_aplikasi']; ?>';
      var link = 'akad';
      var form = 'formobjek';
      $.ajax({
        type: "POST",
        dataType: 'html',
        url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
        data: 'kodeakad=' + kodeakad,
        beforeSend: function() {
          document.getElementById('formjaminan').style.display = 'none';
        },
        success: function(html) {
          $("#formjaminan").html(html);
          document.getElementById('formjaminan').style.display = 'block';
        }
      });

      $("#popupobjek").style.display = 'none';
    });
  });
</script>
<style>
  #uploadProcessSub {
    z-index: 100;
    visibility: hidden;
    position: absolute;
    text-align: center;
    width: 400px;
  }

  #myscrolltable tbody {
    clear: both;
    height: 400px;
    overflow: auto;
    float: left;
    width: 730px;
  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $("#btnsimpanobjek").click(function() {
      var nm_objek = $('#nm_objek').val();
      var txtrincian = $('#txtrincian').val();
      var satuan = $('#satuan').val();
      var txtlokasi = $('#txtlokasi').val();
      var txtpemasok = $('#txtpemasok').val();
      var txtharga = $('#txtharga').val();
      var txtnilai = $('#txtnilai').val();

      var no_aplikasi = '<?php echo $db['no_aplikasi']; ?>';
      var menu = '0';

      if (nm_objek == '0') {
        alertify.warning('Nama Objek tidak Boleh Kosong');
      } else if (txtrincian == '') {
        alertify.warning('Nama Rincian tidak Boleh Kosong');
      } else if (satuan == '0') {
        alertify.warning('Nama Satuan tidak Boleh Kosong');
      } else if (txtlokasi == '') {
        alertify.warning('Nama Lokasi tidak Boleh Kosong');
      } else if (txtpemasok == '') {
        alertify.warning('Nama Pemasok tidak Boleh Kosong');
      } else if (txtharga == '') {
        alertify.warning('Nama Harga tidak Boleh Kosong');
      } else if (txtnilai == '') {
        alertify.warning('Nama Nilai tidak Boleh Kosong');

      } else {
        //var data = $('.cdatanasabah').serialize();
        $.ajax({
          type: 'POST',
          dataType: 'html',
          url: "<?php echo site_url(); ?>verifikasi/updateobjek",
          data: {
            nm_objek: nm_objek,
            txtrincian: txtrincian,
            satuan: satuan,
            txtlokasi: txtlokasi,
            txtpemasok: txtpemasok,
            txtharga: txtharga,
            txtnilai: txtnilai,
            no_aplikasi: no_aplikasi
          },
          beforeSend: function() {},
          success: function(htmldataumum) {
            message('success', 'Data berhasil diinput');
          }
        }); //simpan
        var dat = '<?php echo $db['no_aplikasi']; ?>';
        var link = 'akad';
        var form = 'formobjek';
        $.ajax({
          type: "POST",
          dataType: 'html',
          url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
          data: 'dat=' + dat,
          beforeSend: function() {
            document.getElementById('tampilformdetail').style.display = 'none';
            //$('#frmaddmjob').css("opacity",".5");
            $("#headerDetail").html("");
          },
          success: function(html) {
            //$('#frmaddmjob').css("opacity",'');
            document.getElementById('tampilformdetail').style.display = 'block';
            $(".formdetail").html(html);
            $("#mymodal").modal("hide");
          }
        });
      } //else
    });
  });
</script>

<form action="" method="post" id="datanasabah" class="cdatanasabah">
  <div class="box box-default box-solid">
    <div class="box-body" style="background-color:#F2F2F2;min-height:200px">
      <table width="750px" border="0" style="background-color:#F2F2F2">
        <<tr>
          <th colspan="3" style="background-color:#F2F2F2" scope="col">
            <div align="center">Nama Objek Akad
          </th>
          </tr>
          <div align="center" id="tampildataobjek"></div>
          <br />
          <tr>
            <th style="background-color:#CCCCCC" scope="col">Nama Objek </th>
            <th style="background-color:#F2F2F2" scope="col">:</th>
            <th style="background-color:#F2F2F2" scope="col">
              <div class="btn-group"> <select name="nm_objek" id="nm_objek" class="select2" data-placeholder="Click to Choose...">
                  <option value="0">-Pilih-</option>
                  <?php
                  $arrNamaObjek = array('Tanah dan Bangunan', 'Tanah', 'Bangunan', 'Piutang dagang', 'Persediaan barang', 'Mesin-mesin', 'Kendaraan', 'Kapal', 'Pesawat terbang', 'Alat Berat', 'Deposito', 'Tabungan', 'Giro', 'standby L/C', 'Logam Mulia', 'Resi Gudang
', 'Surat Berharga yang diterbitkan oleh Pemerintah Indonesia', 'Saham', 'Corporate Guarantee', 'Personal Guarantee', 'Surat Jaminan Pemerintah', 'Negative Pledge', 'Clean Basis');
                  $number = 0;
                  foreach ($arrNamaObjek as $index => $value) {

                  ?>

                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>

                  <?php } ?>
                </select>
          </tr>
          <tr>
            <th width="275" style="background-color:#CCCCCC" scope="col">Rincian Dokumen Objek </th>
            <th width="5" style="background-color:#F2F2F2" scope="col">:</th>
            <th width="456" style="background-color:#F2F2F2" scope="col"><input name="txtrincian" placeHolder="Input Nomor atau informasi lainnya atau kosongin" type="text" id="txtrincian" value="" class="input input-xxlarge form-control" /></th>
          </tr>
          <tr>
            <th style="background-color:#CCCCCC" scope="col">Satuan </th>
            <th style="background-color:#F2F2F2" scope="col">:</th>
            <th style="background-color:#F2F2F2" scope="col">
              <div class="btn-group"> <select name="satuan" id="satuan" class="select2" data-placeholder="Click to Choose...">
                  <option value="0">-Pilih-</option>
                  <?php
                  $arrSat = array('1 Lembar', '1 Lembar Berikut Lampirannya', '1 Buah', '1 Paket', 'Terlampir');
                  $number = 0;
                  foreach ($arrSat as $index => $value) {

                  ?>

                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>

                  <?php } ?>
                </select>
          </tr>
          <tr>
            <th scope="col" style="background-color:#CCCCCC">Lokasi</th>
            <th scope="col" style="background-color:#F2F2F2">:</th>
            <th scope="col" style="background-color:#F2F2F2"><input name="txtlokasi" style="background-color:#FFFF99" type="text" id="txtlokasi" value="" class="input input-xxlarge form-control" /></th>
          </tr>
          <tr>
            <th scope="col" style="background-color:#CCCCCC">Pemasok</th>
            <th scope="col" style="background-color:#F2F2F2">:</th>
            <th scope="col" style="background-color:#F2F2F2"><input name="txtpemasok" style="background-color:#FFFF99" type="text" id="txtpemasok" value="" class="input input-large form-control" /></th>
          </tr>
          <tr>
            <th scope="col" style="background-color:#CCCCCC">Harga Objek (SPR) </th>
            <th scope="col" style="background-color:#F2F2F2">:</th>
            <th scope="col" style="background-color:#F2F2F2">
              <input name="txtharga" type="text" id="txtharga" value="0" class="input input-medium form-control" />
            </th>
          </tr>
          <tr>
            <th scope="col" style="background-color:#CCCCCC">Nilai Objek (Appraisal) <span class="form-group"></span></th>
            <th scope="col" style="background-color:#F2F2F2">:</th>
            <th scope="col" style="background-color:#F2F2F2">
              <input name="txtnilai" type="text" id="txtnilai" value="0" class="input input-medium form-control" />
            </th>
          </tr>
          <tr>
            <th colspan="3" style="background-color:#F2F2F2" scope="col"><button type="button" class="btn btn-sm btn-success pull-right" id="btnsimpanobjek"><span class="glyphicon glyphicon-save"></span></button></th>
          </tr>
      </table>
    </div>
  </div>

</form>