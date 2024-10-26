<table class="table table bordered" width="30%">

<tr>
	<th>No</th>
    <th>Nama Setting</th>

    <th>Bobot</th>

     <?php
	if($data->num_rows()>0){
		$no =1;
		foreach($data->result_array() as $db){
		?>
</tr>
 	<tr>
                  <form action="<?php echo site_url('setting/simpansetting');?>" method="POST">

			<td align="center" width="20">

            <?php echo $no; ?></td>
                 <td align="center" width="150"><input type="hidden" name="id_setting" id="id_setting"  size="20" maxlength="50"  value="<?php echo  $db['id_setting']; ?>" /><input type="text" name="nm_setting" id="nm_setting"  size="20" maxlength="50"  value="<?php echo  $db['nm_setting']; ?>" /></td>
               <td align="center" width="150px"><input type="text" name="bobot" id="bobot"  size="20" maxlength="50"  value="<?php echo  $db['bobot']; ?>" /> <input type="submit" name="submit" id="simpan" value="save"></form></td><td><table id="data"width="690px">

               <tr>

                <td align="center" width="100px">
                <?
                if($db['id_setting']==''.$db['id_setting']){

 ?>
                <form action="<?php echo site_url('setting/simpan/'.$db['id_setting']);?>" method="POST">

ID Parameter:<input type="text" name="range1" id="range1"  size="20" maxlength="50"  value="" /> Nama Parameter :<input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="<?php echo $db['parameter'];?>" /><input type="text" name="range" id="range"  size="20" maxlength="50"  value="" />Nilai:<input type="text" name="range2" id="range2"  size="20" maxlength="50"  value="" /><input type="submit" name="submit" id="simpan" value="save">
               </form>
<?

}
?>
</td>
   </tr><tr>
                 <th>ID Parameter</th> <th>Nama Parameter</th><th>Nilai</th>
               </tr>
                <?
                if($db['id_setting']=='1'){


 ?>
                                                 <?php
 foreach($listpendidikan->result_array() as $didik){
 if($didik['urutan']==$db['id_setting']){

 ?>         <tr>
              <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $didik['id_pendidikan']; ?>" /></td>
	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="pendidikan" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $didik['id_pendidikan']; ?>" /><input type="text"  name="nama1[]"  size="60" maxlength="50"  value="<?php echo  $didik['nm_pendidikan']; ?>" /></td>
             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $didik['nilai']; ?>" /></td>

             <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $didik['id_pendidikan'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>

   <?php
   }
}
 ?>

 <td> </td></tr>
 <?
 }
 ?>
 <?
                if($db['id_setting']=='2'){



 ?>

                                                <?php
 foreach($listtanggungan->result_array() as $tanggungan){
 if($tanggungan['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"> <input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="tanggungan" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $tanggungan['id_tanggungan']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $tanggungan['id_tanggungan']; ?>" /></td>
             <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $tanggungan['nm_tanggungan']; ?>" /></td>
               <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $tanggungan['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $tanggungan['id_tanggungan'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>

   <?php
   }
}
 ?>


 <?
 }
 ?>
  <?
                if($db['id_setting']=='3'){


 ?>
           <form action="<?php echo site_url('setting/update');?>" method="POST">
                                                <?php
 foreach($liststatusrumah->result_array() as $statusrumah){
 if($statusrumah['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="statusrumah" /> <input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $statusrumah['id_statusrumah']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $statusrumah['id_statusrumah']; ?>" /></td>
             <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $statusrumah['nm_statusrumah']; ?>" /></td>
                 <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $statusrumah['nilai']; ?>" /></td>

             <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $statusrumah['id_statusrumah'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>

   <?php
   }
}
 ?>

 <?
 }
 ?>
 <?
                if($db['id_setting']=='4'){


 ?>
                                                <?php
 foreach($listsumber->result_array() as $sumber){
 if($sumber['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="sumber" /> <input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sumber['id_sumber']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sumber['id_sumber']; ?>" /></td>
             <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sumber['nm_sumber']; ?>" /></td>
                 <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sumber['nilai']; ?>" /></td>


    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sumber['id_sumber'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

  <?
 }
 ?>
 <?
                if($db['id_setting']=='5'){


 ?>
                                                 <?php
 foreach($listpengalaman->result_array() as $pengalaman){
 if($pengalaman['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="pengalaman" /> <input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $pengalaman['id_pengalaman']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $pengalaman['id_pengalaman']; ?>" /></td>
             <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $pengalaman['nm_pengalaman']; ?>" /></td>
                 <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $pengalaman['nilai']; ?>" /></td>

           <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $pengalaman['id_pengalaman'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>


 <?
 }
 ?>
  <?
                if($db['id_setting']=='6'){


 ?>
                                                <?php
 foreach($liststatususaha->result_array() as $statususaha){
 if($statususaha['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="statususaha" /> <input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $statususaha['id_statususaha']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $statususaha['id_statususaha']; ?>" /></td>
             <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $statususaha['nm_statususaha']; ?>" /></td>
                 <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $statususaha['nilai']; ?>" /></td>

        <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $statususaha['id_statususaha'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='7'){


 ?>
                                                 <?php
 foreach($listlokasi->result_array() as $lokasi){
 if($lokasi['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="lokasi" /> <input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $lokasi['id_lokasi']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $lokasi['id_lokasi']; ?>" /></td>
             <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $lokasi['nm_lokasi']; ?>" /></td>
                  <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $lokasi['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $lokasi['id_lokasi'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

<?
 }
 ?>
 <?
                if($db['id_setting']=='8'){


 ?>
                                               <?php
 foreach($listsektor->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="sektor" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_sektor']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_sektor']; ?>" /></td>
             <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_sektor']; ?>" /></td>
                  <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_sektor'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='9'){


 ?>
                                                <?php
 foreach($listbuku->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="buku" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_buku']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_buku']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_buku']; ?>" /></td>
                   <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_buku'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='10'){


 ?>
                                                <?php
 foreach($listkapasitas->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="kapasitas" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_kapasitas']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_kapasitas']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_kapasitas']; ?>" /></td>
                   <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>


    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_kapasitas'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
 <?
                if($db['id_setting']=='11'){


 ?>
                                                 <?php
 foreach($listbahanbaku->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="bahanbaku" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_bahanbaku']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_bahanbaku']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_bahanbaku']; ?>" /></td>
                           <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

      <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_bahanbaku'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='12'){


 ?>
                                                <?php
 foreach($listkebijakan->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="kebijakan" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_kebijakan']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_kebijakan']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_kebijakan']; ?>" /></td>
                            <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

     <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_kebijakan'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

<?
 }
 ?>
  <?
                if($db['id_setting']=='13'){


 ?>
                                                 <?php
 foreach($listjabatan->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="jabatan" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_jabatan']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_jabatan']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_jabatan']; ?>" /></td>
                           <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_jabatan'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
   <?
                if($db['id_setting']=='14'){


 ?>
                                                <?php
 foreach($listbentuk->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="bentuk" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_bentuk']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_bentuk']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_bentuk']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

     <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_bentuk'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
   <?
                if($db['id_setting']=='15'){


 ?>
                                                 <?php
 foreach($listrekening->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="rekening" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_rekening']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_rekening']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_rekening']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

     <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_rekening'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='16'){


 ?>
                                                <?php
 foreach($listagama->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="agama" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_agama']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_agama']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_agama']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_agama'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='17'){


 ?>
                                                <?php
 foreach($listskim->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="skim" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_skim']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_skim']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_skim']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_skim'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
 <?
                if($db['id_setting']=='18'){


 ?>
                                                <?php
 foreach($listpenggunaan->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="penggunaan" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_penggunaan']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_penggunaan']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_penggunaan']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_penggunaan'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='19'){


 ?>
                                               <?php
 foreach($listjnskegunaan->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="jnskegunaan" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_jnskegunaan']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_jnskegunaan']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_jnskegunaan']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_jnskegunaan'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='20'){


 ?>
                                                <?php
 foreach($listjnspekerjaan->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="jnspekerjaan" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_jnspekerjaan']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_jnspekerjaan']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_jnspekerjaan']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_jnspekerjaan'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

  <?
 }
 ?>
   <?
                if($db['id_setting']=='21'){


 ?>
                                                 <?php
 foreach($listjaminan->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="jaminan" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_jaminan']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_jaminan']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_jaminan']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_jaminan'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='22'){


 ?>
                                                <?php
 foreach($listnikah->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="nikah" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_nikah']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_nikah']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_nikah']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_nikah'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
   <?
                if($db['id_setting']=='23'){


 ?>
                                                <?php
 foreach($listlama->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="lama" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_lama']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_lama']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_lama']; ?>" /></td>
    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_lama'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
  <?
                if($db['id_setting']=='24'){


 ?>
                                                <?php
 foreach($listlamakerja->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="lamakerja" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_lamakerja']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_lamakerja']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_lamakerja']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

   <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_lamakerja'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
 <?
                if($db['id_setting']=='25'){


 ?>
                                                <?php
 foreach($listkondisi->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="kondisi" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_kondisi']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_kondisi']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_kondisi']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_kondisi'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

  <?
 }
 ?>
  <?
                if($db['id_setting']=='26'){


 ?>
                                                <?php
 foreach($listkonstanta->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="konstanta" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_konstanta']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_konstanta']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_konstanta']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_konstanta'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>


 <?
 }
 ?>
  <?
                if($db['id_setting']=='27'){


 ?>
                                                 <?php
 foreach($listscoring->result_array() as $sektor){
 if($sektor['urutan']==$db['id_setting']){

 ?>         <tr>

	        <td align="center" width="150"><input type="hidden" name="parameter" id="parameter"  size="20" maxlength="50"  value="scoring" /><input type="hidden"  name="id[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_scoring']; ?>" /><input type="text"  name="nama[]"  size="60" maxlength="50"  value="<?php echo  $sektor['id_scoring']; ?>" /></td>
              <td align="center" width="150"><input type="text"  name="nama1[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nm_scoring']; ?>" /></td>
                             <td align="center" width="10"><input type="text"  name="nama[]"   size="20" maxlength="50"  value="<?php echo  $sektor['nilai']; ?>" /></td>

    <td> <a href="<?php echo base_url();?>index.php/setting/hapus/<?php echo $db['parameter'];?>/<?php echo $sektor['id_scoring'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
		<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
     </tr>
   <?php
   }
}
 ?>

 <?
 }
 ?>
 

               </table></td>

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
        <form action="<?php echo site_url('setting/simpansetting');?>" method="POST">

<table class="table table bordered" width="30%">

<tr>
	<th>No</th>
    <th>Nama Setting</th>

    <th>Nilai</th>
	 <?php
	if($datadbr->num_rows()>0){
		$no =1;
		foreach($datadbr->result_array() as $dby){
		?>
</tr>
 	<tr>
         
			<td align="center" width="20">

            <?php echo $no; ?></td>
                 <td align="center" width="150"><input type="hidden" name="id_setting" id="id_setting"  size="20" maxlength="50"  value="<?php echo  $dby['id_setting']; ?>" /><input type="text" name="nm_setting" id="nm_setting"  size="20" maxlength="50"  value="<?php echo  $dby['nm_setting']; ?>" /></td>
               <td align="center" width="150px"><input type="text" name="bobot" id="bobot"  size="20" maxlength="50"  value="<?php echo  $dby['bobot']; ?>" /> <input type="submit" name="submit" id="simpan" value="save"></td><td><table id="data"width="690px"></table>
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
</form>

