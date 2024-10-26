<?php


    $data = $listbiaya->num_rows();
     if($data > 0){
           $aplikasi = $biayadata->no_aplikasi;
           $program = $biayadata->kd_program;
            $kd_cab = $biayadata->kd_cab;
             $kd_buk = $biayadata->kd_buk;
             $nm_lengkap = $biayadata->nm_lengkap;
              $no_identitas = $biayadata->no_identitas;
              $tgl_pemohon = $biayadata->tgl_pemohon;
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
                  $skim = $biayadata->skim;
                  $s_penghasilan = $biayadata->s_penghasilan;
                  $jenisp = $biayadata->jenisp;
                  $jns_pekerjaan= $biayadata->jns_pekerjaan;
                   $angsuran= $biayadata->angsuran;
                    $channel= $biayadata->channel;
                    $uang_muka= $biayadata->uang_muka;
                    $p_umuka= $biayadata->p_umuka;
	  }else{

        $aplikasi = $no_aplikasi;
        $program = '';
              $kd_cab = '';
             $kd_buk = '';
             $nm_lengkap ='';
              $no_identitas = '';
               $tgl_pemohon = '';
                $tempat_lahir = '';
               $tanggal_lahir = '';
               $ibu_kandung = '';
               $status_nikah = '';
               $jns_permohonan = '';
               $jenis = '';
                $tujuan_guna = '';
                  $plafon = '';
                  $margin = '';
                  $jangka_waktu = '';
                  $tipe_margin = '';
                  $skim = '';
                   $jns_pekerjaan='';
                     $angsuran='';
                      $channel='';
                        $uang_muka='';
                    $p_umuka='';

	  }

         	$hasil = strtotime($tgl_pemohon);
            $tambah = $hasil * 2;
         $durasidok = $this->app_model->CariTanggal($aplikasi,"1");
         $durasi = $this->app_model->CariTanggal($aplikasi,"2");
          $durasidataentry = $this->app_model->CariTanggal($aplikasi,"3");
           $durasiverifikasi = $this->app_model->CariTanggal( $aplikasi,"4");
            $durasianalisa = $this->app_model->CariTanggal($aplikasi,"5");
            $durasiapproval = $this->app_model->CariTanggal($aplikasi,"9");
              $durasisp3 = $this->app_model->CariTanggal($aplikasi,"6");
                $durasiakad = $this->app_model->CariTanggal($aplikasi,"7");
                  $durasicair = $this->app_model->CariTanggal($aplikasi,"8");
                  $totalhari =$durasidok['harian'] + $durasi['harian'] + $durasidataentry['harian'] + $durasiverifikasi['harian'] + $durasianalisa['harian'] + $durasiapproval['harian'] + $durasisp3['harian'] + $durasiakad['harian'] + $durasicair['harian'];
             $totaljam = $durasidok['jaman'] + $durasi['jaman'] + $durasidataentry['jaman'] + $durasiverifikasi['jaman'] + $durasianalisa['jaman'] + $durasiapproval['jaman'] + $durasisp3['jaman'] + $durasiakad['jaman'] + $durasicair['jaman'];

             $h = floor($totaljam/24);
             for($i=0;$i<$h;$i++){
              if($totaljam > 24){
              $totalhari = $totalhari +1 ;
              $totaljam = $totaljam - 24;
              }else{
                 $totalhari = $totalhari;
              $totaljam = $totaljam;
              }
            }
              $haritambah = $totalhari;
              $jamtambah = $totaljam;



  ?>
  <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title" >Detail Pembiayaan :</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" id="dataTable">

                                        <div class="form-group">
                                                <label for="FirstName" class="col-sm-2 control-label">No Aplikasi : </label>
                                                <div class="col-lg-5">
                                                     <input type="text" id="nm_submenu" name="nm_submenu" value="<?php echo $aplikasi;?>" class="form-control" readonly>

                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="FirstName" class="col-sm-2 control-label">Nama Lengkap : </label>
                                                <div class="col-lg-5">
                                                     <input type="text" id="nm_lengkap" name="nm_lengkap" value="<?php echo $nm_lengkap;?>" class="form-control" readonly>

                                                </div>
                                        </div>
                                          <div class="form-group">
                                                <label for="FirstName" class="col-sm-2 control-label">Plafon : </label>
                                                <div class="col-lg-5">
                                                     <input type="text" id="nm_lengkap" name="nm_lengkap" value="<?php echo $plafon;?>" class="form-control" readonly>

                                                </div>
                                        </div>
                                         </form>
                                          </div>
                                         <div class="panel-heading">
                                <h3 class="panel-title" >SLA Pembiayaan :</h3>
                                     </div>
                                     <div class="panel-body">
                                          <form class="form-horizontal" id="dataTable">

                                     
                                        <div class="form-group">
                                                <label for="FirstName" class="col-sm-2 control-label">Durasi SLA</label>
                                                <div class="col-lg-5">
                                                     <input type="text" id="nm_lengkap" name="nm_lengkap" value="<?php echo "".$haritambah." hari ". $jamtambah." jam"; ?>" class="form-control" readonly>

                                                </div>
                                        </div>
                                         <div class="form-group">
                                                <label for="LastName" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-4">
                                                        <button type="button" id="kembali" class="btn btn-primary">Kembali</button>
                                                </div>
                                        </div>
                                         </form>
                                         </div>
                        </div>


                  <script type="text/javascript">
$(document).ready(function(){
        $("#kembali").click(function(){
    window.location.assign('<?php echo base_url();?>viewstatus');
	});

});
      </script>
