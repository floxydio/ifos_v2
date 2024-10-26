     <script>
                    $(function(){

                         $('.tgl').datepicker({
    format: 'yyyy-mm-dd',
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
                    })

tinymce.init({ selector:'textarea',
                        width: 500,
                        readonly: 1 });</script>
    <form action="" method="post" id="datanasabah" class="cdatanasabah">

 <table width="962" border="0" style="background-color:#F2F2F2">

    <tr>
        <th style="background-color:#CCCCCC" scope="col">Tanggal Akad</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><input  type="text" name="tgl_akad" id="tgl_akad" class="tgl"  size="20" maxlength="50" value="<?php echo $akad['tgl_akad']; ?>" placeholder="YYYY-MM-DD" readonly></th>
    </tr>
    <tr>
        <th style="background-color:#CCCCCC" scope="col">Penanda Tangan Akad</th>
        <th  style="background-color:#F2F2F2" scope="col">:</th>
        <th style="background-color:#F2F2F2" scope="col"><select name="pejabat" id="pejabat" class="js-example-basic-single js-states">
    <option value="0">-Pilih-</option>
    <?php foreach($listll->result() as $w){ ?>
                        <?php if($w->username == $akad['pejabat']){ ?>
                            <option value="<?php echo $w->username; ?>" selected><?php echo $w->nama_lengkap; ?> - <?php echo $w->nmjabatan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->username; ?>"><?php echo $w->nama_lengkap; ?> - <?php echo $w->nmjabatan; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></th>
    </tr>
    </table>