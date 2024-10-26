<script type="text/javascript">
  $(document).ready(function() {
    $("#btnsimpanobjek").click(function() {
      var txtreal = $('#txtreal').val();
      var no_aplikasi = '<?php echo $db['no_aplikasi']; ?>';
      var menu = '0';

      if (txtreal == '') {
        message('error', 'Data tidak boleh kosong');
      } else {
        //var data = $('.cdatanasabah').serialize();
        $.ajax({
          type: 'POST',
          dataType: 'html',
          url: "<?php echo site_url(); ?>verifikasi/updatesyarat",
          data: {
            txtreal: txtreal,
            no_aplikasi: no_aplikasi,
            menu: menu
          },
          beforeSend: function() {},
          success: function(htmldataumum) {
            message('success', 'Data berhasil diinput');
          }
        }); //simpan
        var dat = '<?php echo $db['no_aplikasi']; ?>';
        var link = 'akad';
        var form = 'formsyarat';
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
      <table width="692" border="0" style="background-color:#F2F2F2">
        <tr>
          <th width="255" style="background-color:#CCCCCC" scope="col">Syarat Realisasi Pembiayaan </th>
          <th width="5" style="background-color:#F2F2F2" scope="col">:</th>
          <th width="418" style="background-color:#F2F2F2" scope="col"> <label class="pull-left"><textarea name="txtreal" id="txtreal" style="height: 100px; width: 400px;"></textarea></label>
            <br>
            <button type="button" id="btnsimpanobjek" class="input input-small form-control">Simpan Proses</button>

            <input name="kdakadedit" id="kdakadedit" type="hidden" />
          </th>
        </tr>
      </table>
    </div>
  </div>
  <input type="hidden" name="txtidkodereg" id="txtidkodereg" value="<?php echo $db['no_aplikasi']; ?>" />
</form>