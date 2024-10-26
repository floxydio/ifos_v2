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
      var nm_surat = $('#nm_surat').val();
      var no_aplikasi = '<?php echo $db['no_aplikasi']; ?>';
      var menu = '0';

      if (nm_surat == '0') {
        message('error', 'Data tidak boleh kosong');
      } else {
        //var data = $('.cdatanasabah').serialize();
        $.ajax({
          type: 'POST',
          dataType: 'html',
          url: "<?php echo site_url(); ?>verifikasi/updatesurat",
          data: {
            nm_surat: nm_surat,
            no_aplikasi: no_aplikasi
          },
          beforeSend: function() {},
          success: function(htmldataumum) {
            message('success', 'Data berhasil diinput');
          }
        }); //simpan
        var dat = '<?php echo $db['no_aplikasi']; ?>';
        var link = 'akad';
        var form = 'akad_review';
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
        <tr>
          <th colspan="3" style="background-color:#F2F2F2" scope="col">
            <div align="center">Nama Surat
          </th>
        </tr>
        <div align="center" id="tampildataobjek"></div>
        <br />
        <tr>
          <th style="background-color:#CCCCCC" scope="col">Nama Surat </th>
          <th style="background-color:#F2F2F2" scope="col">:</th>
          <th style="background-color:#F2F2F2" scope="col">
            <div class="btn-group"> <select name="nm_surat" id="nm_surat" class="select2" data-placeholder="Click to Choose...">
                <option value="0">-Pilih-</option>
                <?php
                $arrNamaObjek = array('Surat Permohonan Realisasi', 'Jadwal Angsuran', 'Jadwal Angsuran Gadai', 'Akad Wakalah', 'Purchase Order', 'Surat Penerimaan barang');
                $number = 0;
                foreach ($arrNamaObjek as $index => $value) {

                ?>

                  <option value="<?php echo $value; ?>"><?php echo $value; ?></option>

                <?php } ?>
              </select>
        <tr>
          <th colspan="3" style="background-color:#F2F2F2" scope="col"><button type="button" class="btn btn-sm btn-success pull-right" id="btnsimpanobjek"><span class="glyphicon glyphicon-save"></span></button></th>
        </tr>
      </table>
    </div>
  </div>
  <input type="hidden" name="txtidkodereg" id="txtidkodereg" value="<?php echo $_POST['txtidkodereg']; ?>" />
  <input type="hidden" name="txtkodeakaddetail" id="txtkodeakaddetail" value="<?php echo $_POST['txtkodeakaddetail']; ?>" />
  <input type="hidden" name="hasilganti" id="hasilganti" value="<?php echo $_POST['txtidkodereg']; ?>" />
  <input type="hidden" name="useridobjekbangunan" id="useridobjekbangunan" value="<?php echo $_POST['userid']; ?>" />
  <input type="hidden" name="kodeedit" id="kodeedit" value="" />

</form>