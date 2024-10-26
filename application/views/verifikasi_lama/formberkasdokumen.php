  <?php

		foreach($list->result_array() as $db){
		?>
 <?php echo form_open_multipart('upload/do_uploaddok'); ?>
      <table id="dataTable" width="80%">
   <tr>
   <th> Update Dokumen
   </th>
   </tr>
    <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $aplikasi; ?>" /></td></tr>

<tr>
	<td width=20%>Nama Dokumen</td>
    <td>:</td>
    <td><input type="hidden" name="id_dok" id="id_dok" size="30" maxlength="50"><input type="text" name="nm_dok" id="nm_dok" size="30" maxlength="50" disabled/></td>
</tr>
<tr>
	<td>Nama FIle</td>
    <td>:</td>
    <td><input type="text" name="file_gambar" id="file_gambar"   size="20" maxlength="50" disabled/>

</td>
</tr>
<tr>
	<td>Update Gambar</td>
    <td>:</td>
    <td><font color=red>Maksimal Ukuran 300 Kb</font><br /><font color=red>Gambar diupload harus pdf dan jpg</font><br /><input type="file" name="namafile" id="namafile" size="40" />

</td>
</tr>
<tr>
	<td width="10%">Pilihan</td>
    <td width="5">:</td>
    <td>
     <select name="ada" id="ada">
      <option value="0">-Pilih-</option>
     <option value="ada">Ada</option>
     <option value="tidak ada">Tidak Ada</option>

    </select>
    </td>
</tr>
<tr>
	<td>Keterangan</td>
    <td>:</td>
    <td><textarea id="ket" name="ket"></textarea>

</td>
</tr>

         <tr>	<td colspan="3" align="center">
  <input type="submit" name="submit" id="simpanupdate" value="save">
   </td></tr>
</table>
 <?php echo form_close(); ?>

   <?

    }
    ?>