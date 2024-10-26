    <table id="ta">
     <tr>
    <td width="10%">Penanda Tangan:</td>
    <td><div class="col-sm-12">
    <select name="pejabat" id="pejabat" class="js-example-basic-single js-states">
    <option value="0">-Pilih-</option>
    <?php foreach($listll->result() as $w){ ?>
                        <?php if($w->username == $akad['pejabat']){ ?>
                            <option value="<?php echo $w->username; ?>" selected><?php echo $w->nama_lengkap; ?> - <?php echo $w->nmjabatan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->username; ?>"><?php echo $w->nama_lengkap; ?> - <?php echo $w->nmjabatan; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></div>
    <a onclick="window.open('<?php echo site_url(); ?>pdfview/index','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=850,height=8500,left=50,top=50,titlebar=yes');" alt="Print Cover" target="_blank" title="Download">Download</a></td>
</tr>
    <tr>


     <td width='100px'>Hasil Generate :</td><td  width='600px'><?php
      	foreach($listemptyakad->result_array() as $mm){
      if($mm['notaris']!=''){
      $no_aplikasi = $db['no_aplikasi'];
       echo anchor('akad/cetakakad/'.$no_aplikasi,'Export akad pembiayaan.doc',array('class' => 'btn btn-primary','data-toggle'=>"tooltip",'data-placement'=>"top",'title'=>"Export sp3 pembiayaan.doc" ));
       ?>
        <br /><a href="<?php echo base_url();?>folder/akad 12  Surat Permohonan Realisasi Pembiayaan.doc" class="btn btn-primary">Surat Permohonan Realisasi Pembiayaan.doc</a>
        <br /><a href="<?php echo base_url();?>folder/FRP Mikro Ind.doc" class="btn btn-primary">FRP Mikro Ind.doc</a>
         <br /><a href="<?php echo base_url();?>folder/Lampiran 3. Surat Kuasa Mendebet Rekening.doc" class="btn btn-primary">Lampiran 3. Surat Kuasa Mendebet Rekening.doc</a>
          <br /><a href="<?php echo base_url();?>folder/Lampiran 4. Surat Kuasa Potong Gaji.doc" class="btn btn-primary">Lampiran 4. Surat Kuasa Potong Gaji.doc</a>
           <br /><a href="<?php echo base_url();?>folder/Lampiran 5. Surat Pernyataan Bendaharawan Pemotong Gaji.doc" class="btn btn-primary">Lampiran 5. Surat Pernyataan Bendaharawan Pemotong Gaji.doc</a>
           <br /><a href="<?php echo base_url();?>folder/Lampiran 6.Surat Pernyataan Belum Menikah.doc" class="btn btn-primary">Lampiran 6.Surat Pernyataan Belum Menikah.doc</a>
            <br /><a href="<?php echo base_url();?>folder/Lampiran 7. Surat Kuasa Menjual.doc" class="btn btn-primary">Lampiran 7. Surat Kuasa Menjual.doc</a>
             <br /><a href="<?php echo base_url();?>folder/SUP Mikro 240815.pdf" class="btn btn-primary">SUP Mikro 240815.pdf</a>


       <?php

       }else{
         echo"";
       }
      }
       ?>
       </td>
    </tr>
    </table>