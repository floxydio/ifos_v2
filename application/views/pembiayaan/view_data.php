<?php
$data = $listbiaya->num_rows();
if ($data > 0) {
    $jj = $this->app_model->NilaiJangkaWaktu($biayadata->id_tipeproduk);
    $aplikasi = $biayadata->no_aplikasi;
    $produk = $biayadata->id_tipeproduk;
    $skim = $biayadata->skim;


    $kd_cab = $biayadata->kd_cab;
    $kd_buk = $biayadata->kd_buk;
    $nm_lengkap = $biayadata->nm_lengkap;
    $no_identitas = $biayadata->no_identitas;
    $tempat_lahir = $biayadata->tempat_lahir;
    $tanggal_lahir = $biayadata->tanggal_lahir;
    $ibu_kandung = $biayadata->ibu_kandung;
    $status_nikah = $biayadata->status_nikah;
    $jns_permohonan = $biayadata->jns_permohonan;
    $jenis = $biayadata->jenis;
    $tujuan_guna = $biayadata->tujuan_guna;
    $plafon = $biayadata->plafon;
    $margin = $biayadata->margin;
    $jangka_waktu = $biayadata->jangka_waktu;
    $tipe_margin = $biayadata->tipe_margin;

    $s_penghasilan = $biayadata->s_penghasilan;
    $jenisp = $biayadata->jenisp;
    $jns_pekerjaan = $biayadata->jns_pekerjaan;
    $angsuran = $biayadata->angsuran;
    $uang_muka = $biayadata->uang_muka;
    $p_umuka = $biayadata->p_umuka;
} else {

    $aplikasi = $no_aplikasi;
    $produk = '';
    $kd_cab = '';
    $kd_buk = '';
    $nm_lengkap = '';
    $no_identitas = '';
    $tempat_lahir = '';
    $tanggal_lahir = '';
    $skim = '';
    $ibu_kandung = '';
    $status_nikah = '';
    $jns_permohonan = '';
    $s_penghasilan = '';
    $jenisp = '';
    $jenis = '';
    $tujuan_guna = '';
    $plafon = '';
    $margin = '';
    $jangka_waktu = '';
    $tipe_margin = '';
    $jns_pekerjaan = '';
    $angsuran = '';
    $uang_muka = '';
    $p_umuka = '';
}
?>
<center>
    <div id="result"></div>
</center>
<div class="box-body" style="background-color:#F2F2F2">
    <ul id="tabs" class="nav nav-tabs">
        <li id="datakuasa" class="active">
            <h3>Pre Data Entry</h3>
        </li>
    </ul>
    <div class="tab-content" style="background-color:#F2F2F2">
        <div class="tab-pane active" id="tampildetail"><span class="pull-right" id="headerDetail" style="display:none"></span>
            <form class="form-horizontal" id="dataTable" method="post">
                <div class="form-group">
                    <label class="col-lg-2 control-label">No Aplikasi</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="no_aplikasi" id="no_aplikasi" aria-describedby="Noaplikasi" value="<?php echo $aplikasi; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nama Produk</label>
                    <div class="col-lg-7">
                        <input type="hidden" name="jj" id="jj" value="<?php echo $jj; ?>">

                        <select name="id_produk" id="id_produk" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>
                            <?php
                            foreach ($list->result() as $t) {
                            ?>
                                <?php if ($t->id_produk == $produk) { ?>
                                    <option value="<?php echo $t->id_produk; ?>" selected><?php echo $t->nm_produk; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $t->id_produk; ?>"><?php echo $t->nm_produk; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Cabang Pemroses</label>
                    <div class="col-lg-5">
                        <select name="kd_cab" id="kd_cab" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>
                            <?php
                            foreach ($listcabang->result() as $w) {
                            ?>
                                <?php if ($w->kd_cabang == $kd_cab) { ?>
                                    <option value="<?php echo $w->kd_cabang; ?>" selected><?php echo "" . $w->kd_cabang . " - " . $w->nm_cabang . ""; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $w->kd_cabang; ?>"><?php echo "" . $w->kd_cabang . " - " . $w->nm_cabang . ""; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Cabang Pembukuan</label>
                    <div class="col-lg-5">
                        <select name="kd_buk" id="kd_buk" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>
                            <?php
                            foreach ($listcabang->result() as $w) {
                            ?>
                                <?php if ($w->kd_cabang == $kd_cab) { ?>
                                    <option value="<?php echo $w->kd_cabang; ?>" selected><?php echo "" . $w->kd_cabang . " - " . $w->nm_cabang . ""; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $w->kd_cabang; ?>"><?php echo "" . $w->kd_cabang . " - " . $w->nm_cabang . ""; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nama Lengkap</label>
                    <div class="col-lg-5">
                        <input type="nm_lengkap" id="nm_lengkap" name="nm_lengkap" class="form-control" value="<?php echo $nm_lengkap; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">No.KTP</label>
                    <div class="col-lg-5">
                        <input type="text" name="no_identitas" id="no_identitas" class="form-control" value="<?php echo $no_identitas; ?>">
                        <input type="hidden" name="idcs" id="idcs" size="50" maxlength="50" value="admin" /><input type="button" name="cek_ektp" onClick="CekDulcapil();" id="cek_ektp" value="Cek E-KTP">

                    </div>
                </div>
                <div class="row">
                    <label class=" col-md-2 control-label">Tempat Lahir</label>
                    <div class=" col-md-3">
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>">
                    </div>
                    <label class="col-md-2 control-label">Tanggal Lahir</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" id="tanggal_lahir">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Nama Gadis Ibu Kandung</label>
                    <div class="col-lg-5">
                        <input type="text" name="ibu_kandung" id="ibu_kandung" class="form-control" value="<?php echo $ibu_kandung; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Status Pernikahan</label>
                    <div class="col-lg-5">
                        <select name="status_nikah" id="status_nikah" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>
                            <?php foreach ($listnikah->result() as $r) { ?>

                                <?php if ($r->id_nikah == $status_nikah) { ?>
                                    <option value="<?php echo $r->id_nikah; ?>" selected><?php echo $r->nm_nikah; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $r->id_nikah; ?>"><?php echo $r->nm_nikah; ?></option>
                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Jenis Permohonan</label>
                    <div class="col-lg-5">
                        <select name="jns_permohonan" id="jns_permohonan" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>
                            <?php
                            foreach ($listjnspermohonan->result() as $w) {

                            ?>
                                <?php if ($w->id_jnspermohonan == $jns_permohonan) { ?>
                                    <option value="<?php echo $w->id_jnspermohonan; ?>" selected><?php echo "" . $w->nm_jnspermohonan . ""; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $w->id_jnspermohonan; ?>"><?php echo "" . $w->nm_jnspermohonan . ""; ?></option>

                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Skim Pembiayaan</label>
                    <div class="col-lg-5">
                        <select name="skim" id="skim" class="select2" data-placeholder="Click to Choose...">

                            <?php
                            foreach ($listskim->result() as $w) {

                            ?>
                                <?php if ($w->id_skim == $skim) { ?>
                                    <option value="<?php echo $w->id_skim; ?>" selected><?php echo "" . $w->nm_skim . ""; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $w->id_skim; ?>"><?php echo "" . $w->nm_skim . ""; ?></option>

                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Jenis Penghasilan</label>
                    <div class="col-lg-5">
                        <select name="jenisp" id="jenisp" class="select2" data-placeholder="Click to Choose...">
                            <?php if ($jenisp == "tetap") {
                                $c = "selected=selected";
                            ?>
                                <option value="tetap" <?= $c; ?>>Penghasilan Tetap</option>
                                <option value="nontetap">Penghasilan Non tetap</option>
                                <option value="0">-Pilih-</option>
                            <?php
                            } else if ($jenisp == "nontetap") {
                                $d = "selected=selected";
                            ?>
                                <option value="nontetap" <?= $d; ?>>Penghasilan Non tetap</option>
                                <option value="tetap">Penghasilan Tetap</option>
                                <option value="0">-Pilih-</option>
                            <?php
                            } else {
                            ?>
                                <option value="0">-Pilih-</option>
                                <option value="tetap">Penghasilan Tetap</option>
                                <option value="nontetap">Penghasilan Non tetap</option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Sumber Penghasilan</label>
                    <div class="col-lg-5">
                        <select name="s_penghasilan" id="s_penghasilan" class="select2" data-placeholder="Click to Choose...">
                            <?php if ($s_penghasilan == "join") {
                                $a = "selected=selected";
                            ?>
                                <option value="join" <?= $a; ?>>Join Income</option>
                                <option value="single">Single Income</option>
                                <option value="0">-Pilih-</option>
                            <?php
                            } else if ($s_penghasilan == "single") {
                                $b = "selected=selected";
                            ?>
                                <option value="single" <?= $b; ?>>Single Income</option>
                                <option value="join">Join Income</option>
                                <option value="0">-Pilih-</option>
                            <?php
                            } else {
                            ?>
                                <option value="0">-Pilih-</option>
                                <option value="join">Join Income</option>
                                <option value="single">Single Income</option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Jenis Pembiayaan</label>
                    <div class="col-lg-5">
                        <select name="jenis" id="jenis" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>

                            <?php
                            foreach ($listjenis->result() as $w) {

                            ?>
                                <?php if ($w->id_jnskegunaan == $jenis) { ?>
                                    <option value="<?php echo $w->id_jnskegunaan; ?>" selected><?php echo "" . $w->nm_jnskegunaan . ""; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $w->id_jnskegunaan; ?>"><?php echo "" . $w->nm_jnskegunaan . ""; ?></option>

                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tujuan Penggunaan</label>
                    <div class="col-lg-5">
                        <select name="tujuan_guna" id="tujuan_guna" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>
                            <?php
                            foreach ($listguna->result() as $w) {

                            ?>
                                <?php if ($w->id_penggunaan == $tujuan_guna) { ?>
                                    <option value="<?php echo $w->id_penggunaan; ?>" selected><?php echo "" . $w->nm_penggunaan . ""; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $w->id_penggunaan; ?>"><?php echo "" . $w->nm_penggunaan . ""; ?></option>

                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Jenis Pekerjaan</label>
                    <div class="col-lg-5">
                        <select name="jns_pekerjaan" id="jns_pekerjaan" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>
                            <?php
                            foreach ($listjns->result() as $w) {

                            ?>
                                <?php if ($w->id_jnspekerjaan == $jns_pekerjaan) { ?>
                                    <option value="<?php echo $w->id_jnspekerjaan; ?>" selected><?php echo "" . $w->nm_jnspekerjaan . ""; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $w->id_jnspekerjaan; ?>"><?php echo "" . $w->nm_jnspekerjaan . ""; ?></option>

                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Plafon</label>
                    <div class="col-lg-5">

                        <input type="text" name="plafon" id="plafon" class="form-control" value="<?php echo $plafon; ?>" onKeyUp="kalkulatorTambah();">
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-lg-2 control-label">Margin</label>
                    <div class="col-lg-5">
                        <input type="text" name="margin" id="margin" value="<?php echo $margin; ?>" onKeyUp="kalkulatorTambah();">%
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Jangka Waktu</label>
                    <div class="col-lg-5">
                        <input type="text" name="jangka_waktu" id="jangka_waktu" value="<?php echo $jangka_waktu; ?>" onKeyUp="kalkulatorTambah('4');">
                        <input type="text" name="dalam" id="dalam" size="20" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Angsuran</label>
                    <div class="col-lg-5">
                        <input type="text" name="angsuran" id="angsuran" class="form-control" value="<?php echo $angsuran; ?>">
                        <font color="red">sudah auto generate tidak perlu diisi</font>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tipe margin</label>
                    <div class="col-lg-5">
                        <select name="tipe_margin" id="tipe_margin" class="select2" data-placeholder="Click to Choose...">
                            <option value="0">-Pilih-</option>
                            <?php
                            foreach ($listmargin->result() as $w) {

                            ?>
                                <?php if ($w->id_tipemargin == $tipe_margin) { ?>
                                    <option value="<?php echo $w->id_tipemargin; ?>" selected><?php echo "" . $w->nm_tipemargin . ""; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $w->id_tipemargin; ?>"><?php echo "" . $w->nm_tipemargin . ""; ?></option>

                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <div class="form-group well">
        <center>
            <div id="result"></div>
        </center>

        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <button id="kembali" class="btn btn-warning"><i class="glyphicon glyphicon-ok"></i> Kembali</button>
    </div>

</div>
</div>





<script>
    $(document).ready(function() {
        var textbox = '#ThousandSeperator_commas';
        var hidden = '#ThousandSeperator_num';
        $("#plafon").keyup(function() {
            var num = $("#plafon").val();
            var comma = /,/g;
            num = num.replace(comma, '');
            $(hidden).val(num);
            var numCommas = addCommas(num);
            $("#plafon").val(numCommas);
        });
        $("#angsuran").keyup(function() {
            var num = $("#angsuran").val();
            var comma = /,/g;
            num = num.replace(comma, '');
            $(hidden).val(num);
            var numCommas = addCommas(num);
            $("#angsuran").val(numCommas);
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

    function datasimpan(string) {
        var no_aplikasi = $("#no_aplikasi").val();
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url(); ?>pembiayaan/simpan",
            data: string,
            cache: false,
            beforeSend: function() {

                alert("Data berhasil disimpan, Nomor Aplikasi adalah " + no_aplikasi);
            },
            success: function(data) {

                window.location.assign('<?php echo base_url(); ?>pembiayaan');

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
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(':input:not([type="submit"])').each(function() {
            $(this).focus(function() {
                $(this).addClass('hilite');
            }).blur(function() {
                $(this).removeClass('hilite');
            });
        });

        $("#view").show();

        $(".select2").css('width', '200px').select2({
            placeholder: "Select Data"
        });

        $("#kembali").click(function() {
            window.location.assign('<?php echo base_url(); ?>pembiayaan');
        });

        $("#id_produk").change(function() {
            var id = $("#id_produk").val();

            var string = "id=" + id;
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url(); ?>parameter/parameterjangkawaktu",
                data: string,
                cache: true,
                dataType: "json",
                success: function(data) {
                    $("#jj").attr('disabled', 'disabled');
                    $("#plafon").val('');
                    $("#margin").val('');
                    $("#jangka_waktu").val('');
                    $("#jj").val('' + data.jangka_waktu);
                    $("#dalam").val('' + data.dalam);
                    kalkulatorTambah();
                }
            });

        });

        $("#plafon").on("keyup change", function(e) {
            var id = $("#id_produk").val();
            var plafon = $("#plafon").val();
            if (id == "0") {
                message('error', 'Produk diisi dulu');
                $("#plafon").val("");

            } else if (id == "9") {
                $("#angsuran").val("" + plafon);
                $("#angsuran").attr("disabled", "disabled");
                $("#margin").attr("disabled", "disabled");
                $("#margin").val("0");
            } else if (id == "8") {
                $("#angsuran").val("0");
                $("#margin").attr("disabled", "disabled");
                $("#margin").val("0");
                $("#angsuran").removeAttr('disabled');
            } else {
                kalkulatorTambah();
                $("#margin").removeAttr('disabled');
                $("#angsuran").attr("disabled", "disabled");
            }
        })

        $("#jangka_waktu").on("keyup change", function(e) {
            var id = $("#id_produk").val();
            var plafon = $("#plafon").val();
            if (id == "0") {
                message('error', 'Produk diisi dulu');
                $("#jangka_waktu").val("");

            } else if (id == "9") {
                $("#angsuran").val("" + plafon);
                $("#angsuran").attr("disabled", "disabled");
                $("#margin").attr("disabled", "disabled");
                $("#margin").val("0");
            } else if (id == "8") {
                $("#angsuran").val("0");
                $("#margin").attr("disabled", "disabled");
                $("#margin").val("0");
                $("#angsuran").removeAttr('disabled');
            } else {
                kalkulatorTambah();
                $("#margin").removeAttr('disabled');
                $("#angsuran").attr("disabled", "disabled");
            }
        })



        $("#simpan").click(function() {

            var no_aplikasi = $("#no_aplikasi").val();
            var id_produk = $("#id_produk").val();

            var nm_lengkap = $("#nm_lengkap").val();
            var no_identitas = $("#no_identitas").val();
            var kd_cab = $("#kd_cab").val();
            var kd_buk = $("#kd_buk").val();
            var tanggal_lahir = $('#tanggal_lahir').val();
            var tempat_lahir = $("#tempat_lahir").val();
            var ibu_kandung = $("#ibu_kandung").val();
            var status_nikah = $("#status_nikah").val();
            var jns_pekerjaan = $("#jns_pekerjaan").val();

            var jns_permohonan = $("#jns_permohonan").val();
            var skim = $("#skim").val();

            var s_penghasilan = $("#s_penghasilan").val();
            var jenisp = $("#jenisp").val();
            var jenis = $("#jenis").val();
            var jenisdetail = $("#jenisdetail").val();
            var tujuan_guna = $("#tujuan_guna").val();
            var plafon = $("#plafon").val();
            var tipe_margin = $("#tipe_margin").val();
            var jangka_waktu = $("#jangka_waktu").val();
            var margin = $("#margin").val();
            var angsuran = $("#angsuran").val();
            //	var string = "kd_program="+kd_program+"&channel="+channel;

            var string = "no_aplikasi=" + no_aplikasi + "&id_produk=" + id_produk + "&kd_cab=" + kd_cab + "&kd_buk=" + kd_buk + "&nm_lengkap=" + nm_lengkap + "&no_identitas=" + no_identitas + "&tempat_lahir=" + tempat_lahir + "&tanggal_lahir=" + tanggal_lahir + "&ibu_kandung=" + ibu_kandung + "&status_nikah=" + status_nikah + "&jns_pekerjaan=" + jns_pekerjaan + "&jns_permohonan=" + jns_permohonan + "&jenisp=" + jenisp + "&s_penghasilan=" + s_penghasilan + "&jenis=" + jenis + "&tujuan_guna=" + tujuan_guna + "&plafon=" + plafon + "&tipe_margin=" + tipe_margin + "&jangka_waktu=" + jangka_waktu + "&skim=" + skim + "&margin=" + margin + "&angsuran=" + angsuran;


            if (id_produk == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Field Kode Produk Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: '',
                        top: '300px'
                    }
                });

                $("#id_produk").focus();
                return false;
            }



            if (kd_cab == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Field Kode Cabang Pemroses Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#kd_cab").focus();
                return false;
            }

            if (skim == 0) {

                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Skim Pembiayaan Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#skim").focus();
                return false;
            }


            if (kd_buk == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Field Kode Cabang Pembukuan Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#kd_buk").focus();
                return false;
            }

            if (nm_lengkap.length == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Untuk Penginputan Nama Depan , Tengah dan Belakang Diketik supaya kebentuk nama lengkap',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#nm_lengkap").focus();
                return false;
            }

            if (no_identitas.length == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Nomor Identitas  Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#no_identitas").focus();
                return false;
            }

            if (tempat_lahir.length == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Tempat Lahir Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#tempat_lahir").focus();
                return false;
            }

            if (tanggal_lahir == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Tanggal Lahir Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#tanggal_lahir").focus();
                return false;
            }
            if (ibu_kandung.length == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Nama Ibu Kandung Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#ibu_kandung").focus();
                return false;
            }



            if (status_nikah == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Nama Status_nikah Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#status_nikah").focus();
                return false;
            }

            if (jns_pekerjaan == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Jenis Pekerjaan Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#jns_pekerjaan").focus();
                return false;
            }


            if (jenisp == 0) {

                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Jenis Penghasilan Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#jenisp").focus();
                return false;
            }

            if (s_penghasilan == 0) {

                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Sumber Penghasilan Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#s_penghasilan").focus();
                return false;
            }

            if (jenis == 0) {

                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Jenis Pembiayaan Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#jenis").focus();
                return false;
            }

            if (jns_permohonan == 0) {

                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Jenis Permohonan Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#jns_permohonan").focus();
                return false;
            }

            if (plafon.length == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Plafon Pembiayaan Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#plafon").focus();
                return false;
            }

            if (margin.length == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Bunga Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#margin").focus();
                return false;
            }

            if (jangka_waktu.length == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Jangka Waktu Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#jangka_waktu").focus();
                return false;
            }





            if (angsuran.length == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Angsuran Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#angsuran").focus();
                return false;
            }

            if (tipe_margin == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Field Tipe Margin Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#tipe_margin").focus();
                return false;
            }

            if (tujuan_guna == 0) {
                //alert("Maaf, Nama Rekening tidak boleh kosong");
                $.messager.show({
                    title: 'Info',
                    msg: 'Maaf, Field Tujuan guna Tidak Boleh Kosong',
                    timeout: 2000,
                    showType: 'fade',
                    style: {
                        right: '',
                        bottom: ''
                    }
                });

                $("#tujuan_guna").focus();
                return false;
            }
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url(); ?>parameter/parameterProduk",
                data: "id_produk=" + id_produk + "&margin=" + margin + "&plafon=" + plafon + "&jangka_waktu=" + jangka_waktu,
                cache: true,
                dataType: "json",
                success: function(data) {
                    if (data.id_produk == '0') {
                        $("#result").html('<div class="alert alert-danger"><button type="button" class="close">�</button>Parameter Produk Tidak Sesuai</div>');
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                $(this).remove();
                            });
                        }, 5000);
                        $('.alert .close').on("click", function(e) {
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });
                    } else {
                        datasimpan(string);
                    }
                }
            });
        });

    });
</script>
<script>
    $(function() {

        $('#tanggal_lahir').datepicker({
            format: 'yyyy-mm-dd',
        }).on('changeDate', function(e) {
            $(this).datepicker('hide');
        });
    })
</script>
<script>
    function CekDulcapil() {
        var no_identitas = $("#no_identitas").val();
        var idcs = $("#idcs").val();
        var stringloan = "no_identitas=" + no_identitas + "&idcs=" + idcs;

        if (no_identitas != "") {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url(); ?>pembiayaan/Dulcapil/" + no_identitas + "/" + idcs,
                data: stringloan,
                cache: true,
                dataType: "json",
                success: function(data) {
                    $("#no_identitas").focus();
                    //   $("#ibu_kandung").val(data.ibu_kandung);
                    $("#nm_lengkap").val(data.nm_lengkap);
                    $("#error").val(data.error);

                }
            });
        }

    }
</script>