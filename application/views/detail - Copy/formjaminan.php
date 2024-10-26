  <script>
  $(document).ready(function(){
   	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
     $("#list").hide();
    $("#jaminan").hide();
     $("#tanah").hide();
     $("#cash").hide();
       $("#sk").hide();
        $("#mesin").hide();
          $("#emas").hide();
            $("#piutang").hide();
            $("#tanahkosong").hide();
                           $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});
  	$("#tambah").click(function(){

          $("#list").show();
    	});

     

          	$("#kembali").click(function(){

       		                  tampil_data('<?php echo $aplikasi; ?>','updatejaminan','verifikasi','formjaminan','2');

    	});

          	$("#simpan").click(function(){
              	var id_jaminand 		= $("#id_jaminand").val();

        	var no_aplikasi 		= $("#no_aplikasi").val();
		var nm_agunan 		= $("#nm_agunan1").val();
		var harga_agunan 	= $("#harga_agunan1").val();
        	var bobot_agunan 	= $("#bobot_agunan").val();
            	var nilai_agunan 	= $("#nilai_agunan").val();

		var string = "nm_agunan="+nm_agunan+"&harga_agunan="+harga_agunan+"&bobot_agunan="+bobot_agunan+"&nilai_agunan="+nilai_agunan+"&no_aplikasi="+no_aplikasi+"&id_jaminand="+id_jaminand;


		if(nm_agunan==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Agunan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_agunan1").focus();
			return false;
		}

        if(harga_agunan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, harga Agunan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#harga_agunan1").focus();
			return false;
		}


        if(bobot_agunan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Bobot Agunan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#bobot_agunan").focus();
			return false;
		}
	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/updateagunan",
			data	: string,
			cache	: false,

			success	: function(data){
                   tampil_data('<?php echo $aplikasi; ?>','updatejaminan','detail','formjaminan','1');
	},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Maaf Untuk Penginputan Jaminan Maksimal 5 Jaminan :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});

    	$("#simpankendaraan").click(function(){
                  	var id_jaminand 		= $("#id_jaminand").val();
                 var nm_agunan = $("#nm_agunan").val();
                 var kondisi_kendaraan = $("#kondisi_kendaraan").val();
                var tujuan_kendaraan = $("#tujuan_kendaraan").val();
                var negara_kendaraan = $("#negara_kendaraan").val();
                var merk = $("#merk").val();
                var model = $("#model").val();
                var tipe = $("#tipe").val();
                var no_mesin =$("#no_mesin").val();
                var no_rangka = $("#no_rangka").val();
                var no_bpkb = $("#no_bpkb").val();
                var tgl_bpkb = $('#tgl_bpkb').val();
                var alamat_kendaraan = $("#alamat_kendaraan").val();
                var kdpos_kendaraan = $("#kdpos_kendaraan").val();
                var kelurahan_kendaraan = $("#kelurahan_kendaraan").val();
                var kecamatan_kendaraan = $("#kecamatan_kendaraan").val();
                var kotamadya_kendaraan = $("#kotamadya_kendaraan").val();
                var propinsi_kendaraan = $("#propinsi_kendaraan").val();
                 var alamat = $("#alamat").val();
                var kdpos = $("#kdpos").val();
                   var kelurahan = $("#kelurahan").val();
                var kecamatan = $("#kecamatan").val();
                var kotamadya = $("#kotamadya").val();
                var propinsi = $("#propinsi").val();

		var string ="id_jaminand="+id_jaminand+"&nm_agunan="+nm_agunan+"&kondisi_kendaraan="+kondisi_kendaraan+"&id_jaminand="+id_jaminand+"&tujuan_kendaraan="+tujuan_kendaraan+"&negara_kendaraan="+negara_kendaraan+"&merk="+merk+"&model="+model+"&tipe="+tipe+"&no_mesin="+no_mesin+"&no_rangka="+no_rangka+"&no_bpkb="+no_bpkb+"&tgl_bpkb="+tgl_bpkb+"&alamat_kendaraan="+alamat_kendaraan+"&kdpos_kendaraan="+kdpos_kendaraan+"&kelurahan_kendaraan="+kelurahan_kendaraan+"&kecamatan_kendaraan="+kecamatan_kendaraan+"&kotamadya_kendaraan="+kotamadya_kendaraan+"&propinsi_kendaraan="+propinsi_kendaraan+"&alamat="+alamat+"&kdpos="+kdpos+"&kelurahan="+kelurahan+"&kecamatan="+kecamatan+"&kotamadya="+kotamadya+"&propinsi="+propinsi;


		if(kondisi_kendaraan==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kondisi Kendaraan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kondisi_kendaraan").focus();
			return false;
		}
        if(tujuan_kendaraan==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tujuan Kendaraan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tujuan_kendaraan").focus();
			return false;
		}

           if(negara_kendaraan==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Negara Kendaraan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#negara_kendaraan").focus();
			return false;
		}

           if(merk==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Merk Kendaraan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#merk").focus();
			return false;
		}

           if(model==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Model Kendaraan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#model").focus();
			return false;
		}
           if(tipe==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tipe Kendaraan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tipe").focus();
			return false;
		}

        if(no_mesin.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor mesin Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_mesin").focus();
			return false;
		}

            if(no_mesin.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor mesin Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_rangka").focus();
			return false;
		}

                if(no_mesin.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor rangka Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_rangka").focus();
			return false;
		}
                if(no_bpkb.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor BPKB Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_bpkb").focus();
			return false;
		}
                if(tgl_bpkb.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal BPKB Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_bpkb").focus();
			return false;
		}

                if(alamat_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Alamat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#alamat_kendaraan").focus();
			return false;
		}

            if(kdpos_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kodepos Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kdpos_kendaraan").focus();
			return false;
		}

            if(kelurahan_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kelurahan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kelurahan_kendaraan").focus();
			return false;
		}

            if(kecamatan_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kecamatan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kecamatan_kendaraan").focus();
			return false;
		}
            if(kotamadya_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kotamadya Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kotamadya_kendaraan").focus();
			return false;
		}

            if(propinsi_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Propinsi Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#propinsi_kendaraan").focus();
			return false;
		}

                 if(alamat.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Alamat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#alamat").focus();
			return false;
		}

            if(kdpos.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kodepos Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kdpos").focus();
			return false;
		}

            if(kelurahan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kelurahan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kelurahan").focus();
			return false;
		}

            if(kecamatan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kecamatan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kecamatan").focus();
			return false;
		}
            if(kotamadya.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kotamadya Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kotamadya").focus();
			return false;
		}

            if(propinsi.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Propinsi Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#propinsi").focus();
			return false;
		}

	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/simpanjaminandetail",
			data	: string,
			cache	: false,

			success	: function(data){
			   $("#jaminan").hide();


			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});
    	$("#simpantanah").click(function(){
                  	var id_jaminand 		= $("#id_jaminand").val();
                var nm_agunan = $("#nm_agunan").val();
                  var jenis_bangunan = $("#jenis_bangunan").val();
                    var pemilik = $("#pemilik").val();
                      var luas_tanah = $("#luas_tanah").val();
                        var luas_bangun = $("#luas_bangun").val();
                           var umur = $("#umur").val();
                var atas_nama = $("#atas_nama").val();
                var alamat_kendaraan = $("#alamat_tanah").val();
                var kdpos_kendaraan = $("#kdpos_tanah").val();
                var kelurahan_kendaraan = $("#kelurahan_tanah").val();
                var kecamatan_kendaraan = $("#kecamatan_tanah").val();
                var kotamadya_kendaraan = $("#kotamadya_tanah").val();
                var propinsi_kendaraan = $("#propinsi_tanah").val();
                var status = $("#status").val();
                var no_sertifikat = $("#no_sertifikat").val();
                var tgl_terbit = $('#tgl_terbit').val();
                var atas_imb = $("#atas_imb").val();
                var no_imb = $("#no_imb").val();
                 var hub = $("#hub").val();

		var string ="id_jaminand="+id_jaminand+"&nm_agunan="+nm_agunan+"&atas_nama="+atas_nama+"&jenis_bangunan="+jenis_bangunan+"&pemilik="+pemilik+"&luas_tanah="+luas_tanah+"&luas_bangun="+luas_bangun+"&umur="+umur+"&alamat_kendaraan="+alamat_kendaraan+"&kdpos_kendaraan="+kdpos_kendaraan+"&kelurahan_kendaraan="+kelurahan_kendaraan+"&kecamatan_kendaraan="+kecamatan_kendaraan+"&kotamadya_kendaraan="+kotamadya_kendaraan+"&propinsi_kendaraan="+propinsi_kendaraan+"&status="+status+"&no_sertifikat="+no_sertifikat+"&tgl_terbit="+tgl_terbit+"&atas_imb="+atas_imb+"&no_imb="+no_imb+"&hub="+hub;


		if(atas_nama.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Atas Nama Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#atas_nama").focus();
			return false;
		}
          if(jenis_bangunan==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Bangunan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#jenis_bangunan").focus();
			return false;
		}
            if(pemilik==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Pemilik Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#pemilik").focus();
			return false;
		}
               if(luas_tanah.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Luas Tanah Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#luas_tanah").focus();
			return false;
		}

           if(luas_bangun.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Luas Bangun Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#luas_bangun").focus();
			return false;
		}
         if(umur==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Umur Bangunan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#umur").focus();
			return false;
		}

         if(hub==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Hubungan nasabah Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#hub").focus();
			return false;
		}
                if(alamat_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Alamat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#alamat_tanah").focus();
			return false;
		}

            if(kdpos_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kodepos Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kdpos_tanah").focus();
			return false;
		}

            if(kelurahan_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kelurahan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kelurahan_kendaraan").focus();
			return false;
		}

            if(kecamatan_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kecamatan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kecamatan_tanah").focus();
			return false;
		}
            if(kotamadya_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kotamadya Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kotamadya_tanah").focus();
			return false;
		}

            if(propinsi_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Propinsi Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#propinsi_tanah").focus();
			return false;
		}
            if(status==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Status Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#status").focus();
			return false;
		}
          if(no_sertifikat.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, No sertifikat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_sertifikat").focus();
			return false;
		}

                  if(tgl_terbit.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Terbit Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_terbit").focus();
			return false;
		}
                  if(atas_imb.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Atas nama IMb Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#atas_imb").focus();
			return false;
		}
                  if(no_imb.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, No IMB Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_imb").focus();
			return false;
		}


	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/simpanjaminandetail",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
			   $("#tanah").hide();


			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});

    	$("#simpancash").click(function(){
                  	var id_jaminand 		= $("#id_jaminand").val();
                var nm_agunan = $("#nm_agunan").val();
                var atas_nama = $("#atas_cash").val();
                var no_bilyet = $("#no_bilyet").val();
                var no_seri = $("#no_seri").val();
                var tgl_cash = $('#tgl_cash').val();

                var jumlah = $("#jumlah").val();
                var tgl_valuta = $('#tgl_valuta').val();
                var tgl_jatuhtempo = $('#tgl_jatuhtempo').val();


		var string ="id_jaminand="+id_jaminand+"&nm_agunan="+nm_agunan+"&atas_nama="+atas_nama+"&no_bilyet="+no_bilyet+"&no_seri="+no_seri+"&tgl_cash="+tgl_cash+"&jumlah="+jumlah+"&tgl_valuta="+tgl_valuta+"&tgl_jatuhtempo="+tgl_jatuhtempo;


		if(atas_nama.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Atas Nama Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#atas_cash").focus();
			return false;
		}

                if(no_bilyet.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Bilyet Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_bilyet").focus();
			return false;
		}

            if(no_seri.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Seri Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_seri").focus();
			return false;
		}

            if(tgl_cash.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_cash").focus();
			return false;
		}

            if(jumlah.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jumlah Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#jumlah").focus();
			return false;
		}
            if(tgl_valuta.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Valuta Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_valuta").focus();
			return false;
		}

            if(tgl_jatuhtempo.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal jatuh Tempo Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_jatuhtempo").focus();
			return false;
		}



	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/simpanjaminandetail",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
			   $("#cash").hide();


			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});
      	$("#simpansk").click(function(){
                  	var id_jaminand 		= $("#id_jaminand").val();
                var nm_agunan = $("#nm_agunan").val();
                var nm_sk = $("#nm_sk").val();
                var no_rekening = $("#no_rekening").val();
                var nm_bendahara = $("#nm_bendahara").val();

                var payroll = $("#payroll").val();
                var no_sk = $("#no_sk").val();
                var no_pks = $("#no_pks").val();

                var tgl_sk = $('#tgl_sk').val();

		var string ="id_jaminand="+id_jaminand+"&nm_agunan="+nm_agunan+"&nm_sk="+nm_sk+"&no_rekening="+no_rekening+"&nm_bendahara="+nm_bendahara+"&payroll="+payroll+"&no_sk="+no_sk+"&no_pks="+no_pks+"&tgl_sk="+tgl_sk;

                   if(nm_sk.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama SK Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_sk").focus();
			return false;
		}


                if(no_rekening.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Rekening  Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_rekening").focus();
			return false;
		}

            if(nm_bendahara.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Bendahara Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_bendahara").focus();
			return false;
		}

            if(payroll==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Payroll Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#payroll").focus();
			return false;
		}

            if(no_sk.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor SK Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_sk").focus();
			return false;
		}
            if(no_pks.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor PKS Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_pks").focus();
			return false;
		}

            if(tgl_sk.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Penerbit SK Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_sk").focus();
			return false;
		}



	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/simpanjaminandetail",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
			   $("#sk").hide();


			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
	  				showType:'slide'
				});
			}
		});

	});

    	$("#simpanmesin").click(function(){
                  	var id_jaminand 		= $("#id_jaminand").val();
                var nm_agunan = $("#nm_agunan").val();
                var jenis_alat = $("#jenis_alat").val();
                var atas_nama = $("#atas_mesin").val();
                var negara_mesin = $("#negara_mesin").val();

                var merk_mesin = $("#merk_mesin").val();
                var tahun = $("#tahun").val();
                var no_faktur = $("#no_faktur").val();
                var bukti_pemilik = $("#bukti_pemilik").val();
                var no_pemilik = $("#no_pemilik").val();
                var spec = $("#spec").val();
                var pemilikmesin = $("#pemilikmesin").val();
                var kondisi_mesin = $("#kondisi_mesin").val();
                var status_pakai = $("#status_pakai").val();

		var string ="id_jaminand="+id_jaminand+"&nm_agunan="+nm_agunan+"&jenis_alat="+jenis_alat+"&atas_nama="+atas_nama+"&negara_mesin="+negara_mesin+"&merk_mesin="+merk_mesin+"&tahun="+tahun+"&no_faktur="+no_faktur+"&bukti_pemilik="+bukti_pemilik+"&no_pemilik="+no_pemilik+"&spec="+spec+"&pemilikmesin="+pemilikmesin+"&kondisi_mesin="+kondisi_mesin+"&status_pakai="+status_pakai;

                   if(jenis_alat.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Alat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#jenis_alat").focus();
			return false;
		}


                if(atas_nama.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Atas Nama  Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#atas_mesin").focus();
			return false;
		}

            if(negara_mesin==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Negara Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#negara_mesin").focus();
			return false;
		}

            if(merk_mesin.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Merk Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#merk_mesin").focus();
			return false;
		}

            if(tahun.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tahun Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tahun").focus();
			return false;
		}
            if(no_faktur.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Faktur Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_faktur").focus();
			return false;
		}

            if(bukti_pemilik.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Bukti Pemilik Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#bukti_pemilik").focus();
			return false;
		}

           if(no_pemilik.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Pemilik Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_pemilik").focus();
			return false;
		}

         if(spec==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Spesifikasi Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#spec").focus();
			return false;
		}
          if(pemilikmesin==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Pemilik Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#pemilikmesin").focus();
			return false;
		}
          if(kondisi_mesin==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kondisi Mesin Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kondisi_mesin").focus();
			return false;
		}
          if(status_pakai==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Status Pemakaian Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#status_pakai").focus();
			return false;
		}


	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/simpanjaminandetail",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
			   $("#mesin").hide();


			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});

    	$("#simpanemas").click(function(){
                  	var id_jaminand 		= $("#id_jaminand").val();
                var nm_agunan = $("#nm_agunan").val();
                var karat = $("#karat").val();
                var sertifikat_perusahaan = $("#sertifikat_perusahaan").val();
                var berat = $("#berat").val();
                 var harga_emas = $("#harga_emas").val();
                   var tgl_harga = $('#tgl_harga').val();
                var no_sertifikat = $("#sertifikat").val();
                var no_faktur = $("#faktur").val();

		var string ="id_jaminand="+id_jaminand+"&nm_agunan="+nm_agunan+"&karat="+karat+"&sertifikat_perusahaan="+sertifikat_perusahaan+"&berat="+berat+"&no_sertifikat="+no_sertifikat+"&no_faktur="+no_faktur+"&harga_emas="+harga_emas+"&tgl_harga="+tgl_harga;

                   if(karat.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Karat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#karat").focus();
			return false;
		}


                if(sertifikat_perusahaan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Sertifikat Perusahaan  Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#sertifikat_perusahaan").focus();
			return false;
		}

            if(berat.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Berat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#negara_mesin").focus();
			return false;
		}

            if(no_sertifikat.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, No Sertifikat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#sertifikat").focus();
			return false;
		}


            if(no_faktur.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Faktur Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#faktur").focus();
			return false;
		}

         if(harga_emas.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Harga Emas Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#harga_emas").focus();
			return false;
		}

         if(tgl_harga.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal harga Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_harga").focus();
			return false;
		}

	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/simpanjaminandetail",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
			   $("#emas").hide();


			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});

 	$("#simpanpiutang").click(function(){
                  	var id_jaminand 		= $("#id_jaminand").val();
                var nm_agunan = $("#nm_agunan").val();
                var nm_pihak = $("#nm_pihak").val();
                var no_kontrak = $("#no_kontrak").val();
                 var tgl_piutang = $('#tgl_piutang').val();
                 var umur_piutang = $('#umur_piutang').val();
                var pihak_hutang = $("#pihak_hutang").val();


		var string ="id_jaminand="+id_jaminand+"&nm_agunan="+nm_agunan+"&nm_pihak="+nm_pihak+"&no_kontrak="+no_kontrak+"&tgl_piutang="+tgl_piutang+"&pihak_hutang="+pihak_hutang+"&umur_piutang="+umur_piutang;

                   if(nm_pihak==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Pihak Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_pihak").focus();
			return false;
		}


                if(no_kontrak.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, no Kontrak  Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_kontrak").focus();
			return false;
		}

            if(tgl_piutang.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Piutang Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_piutang").focus();
			return false;
		}

            if(pihak_hutang==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Pihak Hutang Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#pihak_hutang").focus();
			return false;
		}
         if(umur_piutang==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Umur Piutang Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#umur_piutang").focus();
			return false;
		}

	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/simpanjaminandetail",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
			   $("#piutang").hide();


			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});

   	$("#simpantanahkosong").click(function(){
                  	var id_jaminand 		= $("#id_jaminand").val();
                    	var no_aplikasi 		= $("#no_aplikasi").val();
                var nm_agunan = $("#nm_agunan").val();
                var atas_nama = $("#atas_namakosong").val();
                var alamat_kendaraan = $("#alamat_tanahkosong").val();
                var kdpos_kendaraan = $("#kdpos_tanahkosong").val();
                var kelurahan_kendaraan = $("#kelurahan_tanahkosong").val();
                var kecamatan_kendaraan = $("#kecamatan_tanahkosong").val();
                var kotamadya_kendaraan = $("#kotamadya_tanahkosong").val();
                var propinsi_kendaraan = $("#propinsi_tanahkosong").val();
                var status = $("#statuskosong").val();
                var no_sertifikat = $("#no_sertifikatkosong").val();
                var tgl_terbit = $('#tgl_terbitkosong').val();
                var hubnasabah = $("#hubnasabah").val();
                 var runtuk = $("#runtuk").val();
                   var kondisi_tanah = $("#kondisi_tanah").val();
                var pemilik = $("#pemilikkosong").val();



		var string ="id_jaminand="+id_jaminand+"&no_aplikasi="+no_aplikasi+"&nm_agunan="+nm_agunan+"&atas_nama="+atas_nama+"&nm_agunan="+nm_agunan+"&alamat_kendaraan="+alamat_kendaraan+"&kdpos_kendaraan="+kdpos_kendaraan+"&kelurahan_kendaraan="+kelurahan_kendaraan+"&kecamatan_kendaraan="+kecamatan_kendaraan+"&kotamadya_kendaraan="+kotamadya_kendaraan+"&propinsi_kendaraan="+propinsi_kendaraan+"&status="+status+"&no_sertifikat="+no_sertifikat+"&tgl_terbit="+tgl_terbit+"&hubnasabah="+hubnasabah+"&runtuk="+runtuk+"&kondisi_tanah="+kondisi_tanah+"&pemilik="+pemilik;


		if(atas_nama.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Atas Nama Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#atas_nama").focus();
			return false;
		}

                if(alamat_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Alamat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#alamat_tanah").focus();
			return false;
		}

            if(kdpos_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kodepos Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kdpos_tanahkosong").focus();
			return false;
		}

            if(kelurahan_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kelurahan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kelurahan_tanahkosong").focus();
			return false;
		}

            if(kecamatan_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kecamatan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kecamatan_tanahkosong").focus();
			return false;
		}
            if(kotamadya_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kotamadya Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kotamadya_tanahkosong").focus();
			return false;
		}

            if(propinsi_kendaraan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Propinsi Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#propinsi_tanahkosong").focus();
			return false;
		}
            if(status==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Status Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#statuskosong").focus();
			return false;
		}
          if(no_sertifikat.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, No sertifikat Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_sertifikatkosong").focus();
			return false;
		}

                  if(tgl_terbit.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Terbit Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#tgl_terbitkosong").focus();
			return false;
		}

         if(hubnasabah==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Hubungan Nasabah Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#hubnasabah").focus();
			return false;
		}

          if(runtuk==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Peruntukan Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#runtuk").focus();
			return false;
		}
          if(kondisi_tanah==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kondisi Tanah Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kondisi_tanah").focus();
			return false;
		}

          if(pemilik==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Pemilik Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#pemilikkosong").focus();
			return false;
		}

	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/simpanjaminandetail",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
			       $("#tanahkosong").hide();


			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});




	$("#kembali").click(function(){
	          tampil_data('<?php echo $aplikasi; ?>','updatejaminan','detail','formjaminan','1');
	});


});



function editDatajaminan(id,nm_agunan){
	var string = "id="+id+"&nm_agunan="+nm_agunan;

     	$("#list").show();
        	$("#tanah").hide();
            $("#cash").hide();
            $("#sk").hide();
              $("#emas").hide();
                $("#mesin").hide();
                $("#piutang").hide();
                 $("#tanahkosong").hide();
                 	$("#jaminan").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();

				$("#id_jaminand").val(id);
                $("#nm_agunan1").select2("val",data.nm_agunan);
                $("#harga_agunan1").val(data.harga_agunan);
                $("#bobot_agunan").val(data.bobot_agunan);
                  $("#nilai_agunan").val(data.nilai_agunan);

			  //	$("#rek_induk").val(data.level);





			}
	});
   }

function editData(id,nm_agunan){
	var string = "id="+id+"&nm_agunan="+nm_agunan;
    if(nm_agunan=="1"){
     	$("#jaminan").show();
        	$("#tanah").hide();
            $("#cash").hide();
            $("#sk").hide();
              $("#emas").hide();
                $("#mesin").hide();
                $("#piutang").hide();
                 $("#tanahkosong").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();
                  $(".modelmobil").attr('disabled','disabled');
                 $(".tipemobil").attr('disabled','disabled');
				$("#id_jaminand").val(id);
                $("#nm_agunan").val(data.nm_agunan);
                $("#kondisi_kendaraan").select2("val",data.kondisi_kendaraan);
                $("#tujuan_kendaraan").select2("val",data.tujuan_kendaraan);
                $("#negara_kendaraan").select2("val",data.negara_kendaraan);
                $("#merk").val(data.merk);
                $("#model").val(data.model);
                $("#tipe").val(data.tipe);
                $("#no_mesin").val(data.no_mesin);
                $("#no_rangka").val(data.no_rangka);
                $("#no_bpkb").val(data.no_bpkb);
                  $("#tgl_bpkb").val(data.tgl_bpkb);
              $("#alamat_kendaraan").val(data.alamat_kendaraan);
                $("#kdpos_kendaraan").val(data.kdpos_kendaraan);
                $("#kelurahan_kendaraan").val(data.kelurahan_kendaraan);
                $("#kecamatan_kendaraan").val(data.kecamatan_kendaraan);
                $("#kotamadya_kendaraan").val(data.kotamadya_kendaraan);
                $("#propinsi_kendaraan").val(data.propinsi_kendaraan);
                  $("#alamat").val(data.alamat);
                $("#kdpos").val(data.kdpos);
                $("#kelurahan").val(data.kelurahan);
                $("#kecamatan").val(data.kecamatan);
                $("#kotamadya").val(data.kotamadya);
                $("#propinsi").val(data.propinsi);

			  //	$("#rek_induk").val(data.level);





			}
	});

         $("#cancel").click(function(){

          $("#jaminan").hide();

	});

    }

  if(nm_agunan=="2"){
     	$("#tanah").show();
        	$("#jaminan").hide();
            $("#cash").hide();
            $("#sk").hide();
            $("#mesin").hide();
              $("#emas").hide();
              $("#piutang").hide();
               $("#tanahkosong").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();

				$("#id_jaminand").val(id);
                $("#nm_agunan").val(data.nm_agunan);
                   $("#jenis_bangunan").select2("val",data.jenis_bangunan);
                      $("#pemilik").select2("val",data.pemilik);
                         $("#luas_tanah").val(data.luas_tanah);
                                 $("#luas_bangun").val(data.luas_bangun);
                                   $("#umur").select2("val",data.umur);
                                            $("#hub").val(data.hubnasabah);
                      $("#atas_nama").val(data.atas_nama);
                $("#atas_nama").val(data.atas_nama);
                $("#alamat_tanah").val(data.alamat_kendaraan);
                $("#kdpos_tanah").val(data.kdpos_kendaraan);
                $("#kelurahan_tanah").val(data.kelurahan_kendaraan);
                $("#kecamatan_tanah").val(data.kecamatan_kendaraan);
                $("#kotamadya_tanah").val(data.kotamadya_kendaraan);
                $("#propinsi_tanah").val(data.propinsi_kendaraan);
                $("#status").select2("val",data.status);
                $("#no_sertifikat").val(data.no_sertifikat);
                    $("#tgl_terbit").val(data.tgl_terbit);
              $("#atas_imb").val(data.atas_imb);
                $("#no_imb").val(data.no_imb);
                  $("#hub").select2("val",data.hub_nasabah);
			  //	$("#rek_induk").val(data.level);





			}


	});

         $("#canceltanah").click(function(){

          $("#tanah").hide();

	});

    }

  if(nm_agunan=="3"){
     	$("#cash").show();
        	$("#jaminan").hide();
            $("#tanah").hide();
            $("#sk").hide();
            $("#mesin").hide();
              $("#emas").hide();
              $("#piutang").hide();
               $("#tanahkosong").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();

				$("#id_jaminand").val(id);
                $("#nm_agunan").val(data.nm_agunan);

                $("#atas_cash").val(data.atas_nama);
                $("#no_bilyet").val(data.no_bilyet);
                $("#no_seri").val(data.no_seri);
                $("#tgl_cash").val(data.tgl_cash);
                $("#jumlah").val(data.jumlah);
                $("#tgl_valuta").val(data.tgl_valuta);
                $("#tgl_jatuhtempo").val(data.tgl_jatuhtempo);

			}


	});

         $("#cancelcash").click(function(){

          $("#cash").hide();

	});

    }

    if(nm_agunan=="4"){
     	$("#sk").show();
        	$("#jaminan").hide();
            $("#tanah").hide();
            $("#cash").hide();
            $("#mesin").hide();
              $("#emas").hide();
              $("#piutang").hide();
               $("#tanahkosong").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();

				$("#id_jaminand").val(id);
                $("#nm_agunan").val(data.nm_agunan);
                $("#nm_sk").val(data.nm_sk);
                $("#no_rekening").val(data.no_rekening);
                $("#nm_bendahara").val(data.nm_bendahara);
                $("#payroll").select2("val",data.payroll);
                $("#no_sk").val(data.no_sk);
                $("#no_pks").val(data.no_pks);
                $("#tgl_sk").val(data.tgl_sk);

			}


	});

         $("#cancelsk").click(function(){

          $("#sk").hide();

	});

    }
     if(nm_agunan=="5"){
     	$("#mesin").show();
        	$("#jaminan").hide();
            $("#tanah").hide();
            $("#cash").hide();
            $("#sk").hide();
            $("#emas").hide();
            $("#piutang").hide();
             $("#tanahkosong").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();

				$("#id_jaminand").val(id);
                $("#nm_agunan").val(data.nm_agunan);
                $("#jenis_alat").val(data.jenis_alat);
                $("#atas_mesin").val(data.atas_nama);
                $("#negara_mesin").select2("val",data.negara_mesin);
                $("#merk_mesin").val(data.merk_mesin);
                $("#tahun").val(data.tahun);
                $("#no_faktur").val(data.no_faktur);
                $("#bukti_pemilik").val(data.bukti_pemilik);
                $("#no_pemilik").val(data.no_pemilik);
                 $("#spec").val(data.spec);
                  $("#pemilikmesin").val(data.pemilikmesin);
                   $("#kondisi_mesin").val(data.kondisi_mesin);
                    $("#status_pakai").val(data.status_pakai);

			}


	});

         $("#cancelmesin").click(function(){

          $("#mesin").hide();

	});

    }

   if(nm_agunan=="6"){
     	$("#emas").show();
        	$("#jaminan").hide();
            $("#tanah").hide();
            $("#cash").hide();
            $("#sk").hide();
            $("#mesin").hide();
            $("#piutang").hide();
             $("#tanahkosong").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();

				$("#id_jaminand").val(id);
                $("#nm_agunan").val(data.nm_agunan);
                $("#karat").val(data.karat);
                $("#sertifikat_perusahaan").val(data.sertifikat_perusahaan);
                $("#berat").val(data.berat);
                $("#sertifikat").val(data.no_sertifikat);
                $("#faktur").val(data.no_faktur);
                  $("#harga_emas").val(data.harga_emas);
                 $("#tgl_harga").val( data.tgl_harga);

			}


	});

         $("#cancelemas").click(function(){

          $("#emas").hide();

	});

    }
  if(nm_agunan=="7"){
     	$("#piutang").show();
        	$("#jaminan").hide();
            $("#tanah").hide();
            $("#cash").hide();
            $("#sk").hide();
            $("#mesin").hide();
            $("#emas").hide();
             $("#tanahkosong").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();

				$("#id_jaminand").val(id);
                $("#nm_agunan").val(data.nm_agunan);
                $("#nm_pihak").select2("val",data.nm_pihak);
                $("#no_kontrak").val(data.no_kontrak);
                  $("#tgl_piutang").val(data.tgl_piutang);
                    $("#umur_piutang").select2("val",data.umur_piutang);
                $("#pihak_hutang").select2("val",data.pihak_hutang);

			}


	});

         $("#cancelpiutang").click(function(){

          $("#piutang").hide();

	});

    }

      if(nm_agunan=="8"){
     	$("#tanahkosong").show();
        	$("#jaminan").hide();
            $("#tanah").hide();
            $("#cash").hide();
            $("#sk").hide();
            $("#mesin").hide();
            $("#emas").hide();
             $("#piutang").hide();
        	var string = "id="+id+ "&nm_agunan="+nm_agunan;
   	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>verifikasi/editagunandetail",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
			   $("#id_jaminand").focus();

				$("#id_jaminand").val(id);
                $("#nm_agunan").val(data.nm_agunan);

                $("#atas_namakosong").val(data.atas_nama);
                $("#alamat_tanahkosong").val(data.alamat_kendaraan);
                $("#kdpos_tanahkosong").val(data.kdpos_kendaraan);
                $("#kelurahan_tanahkosong").val(data.kelurahan_kendaraan);
                $("#kecamatan_tanahkosong").val(data.kecamatan_kendaraan);
                $("#kotamadya_tanahkosong").val(data.kotamadya_kendaraan);
                $("#propinsi_tanahkosong").val(data.propinsi_kendaraan);
                $("#statuskosong").select2("val",data.status);
                $("#no_sertifikatkosong").val(data.no_sertifikat);
                    $("#tgl_terbitkosong").val(data.tgl_terbit);
                     $("#hubnasabah").select2("val",data.hub_nasabah);
                     $("#runtuk").select2("val",data.runtukkosong);
                     $("#kondisi_tanah").select2("val",data.kondisi_tanah);
                     $("#pemilikkosong").select2("val",data.pemilik);

			}


	});

         $("#canceltanahkosong").click(function(){

          $("#tanahkosong").hide();

	});

    }


}

  </script>
    <script>
  function hapusData(id){
	var no_aplikasi = $("#no_aplikasi").val();
	var string = "no_aplikasi="+no_aplikasi+"&id_jaminand="+id;

	var pilih = confirm('Data yang akan dihapus data agunan = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/hapusDetail",
			data	: string,
			cache	: false,
			success	: function(data){
	                    tampil_data('<?php echo $aplikasi; ?>','updatejaminan','verifikasi','formjaminan','2');
               	}
		});
	}
}

  </script>
 <script>
                    $(function(){

                           $('.tgl').datepicker({
    format: 'yyyy-mm-dd',
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
                    })
            </script>

   <div class="btn-group-center">
<?php
  $no=0;
  foreach($listtabsheader->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','2')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


 <?php
  $no++;
   }


?>

<?php
  $no=0;
  foreach($listtabs->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','<?php echo $jk['level_tab'];?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


 <?php
  $no++;
   }

    $cabang = $this->app_model->CariCabang($db['kd_cabang']);
?>
 </div> <br />

     <table id="dataTable" width="100%">
         <tr></tr><tr></tr>
  <tr>
  <th>
  <b>Data Jaminan</b>
  </th>

  </tr>
  </table>  <br />
<div style="float:left; padding-bottom:5px;">
           <button type="button" name="tambah" id="tambah" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Jaminan</button>



</div>
<table class="table table bordered" width="100%">
<tr>
	<th>No</th>
    <th>Nama Agunan</th>
    <th>harga Agunan</th>
      <th>bobot Agunan</th>
        <th>nilai Agunan</th>
    <th>Aksi</th>
</tr>
<?php
   if($listdetailjaminan->num_rows() > 0){
	$no=1;
	foreach($listdetailjaminan->result() as $t){

    ?>
    	<tr>
			<td><?php echo $no; ?></td>
             <td>

        <?php echo $t->nm_jaminan;?></td>
        <td><?php echo $t->harga_agunan;?></td>
        <td width="100" align="right"><?php echo $t->bobot_agunan;?></td>
          <td width="100" align="right"><?php echo $t->nilai_agunan;?></td>
            <td width="20%" align="center">   <?php echo  "<a href='javascript:editDatajaminan(\"{$t->id_jaminand}\",\"{$t->nm_agunan}\")'>";?>
              <button type="submit" name="submit" class="btn btn-danger btn-sm" id="canceln" title="hapus jaminan"><span class="glyphicon glyphicon-pencil"></span></button></a>     <?php echo  "<a href='javascript:editData(\"{$t->id_jaminand}\",\"{$t->nm_agunan}\")'>";?>

             <?php echo "<a href='javascript:hapusData(\"{$t->id_jaminand}\")'>";?>
		    <button type="submit" name="submit" class="btn btn-danger btn-sm" id="canceln" title="hapus jaminan"><span class="glyphicon glyphicon-trash"></span></button></a>     <?php echo  "<a href='javascript:editData(\"{$t->id_jaminand}\",\"{$t->nm_agunan}\")'>";?>
             	 <button type="submit" name="submit" class="btn btn-info btn-sm" id="canceln" title="detail jaminan"><span class="glyphicon glyphicon-plus"></span></button> </a>

			</a>
		</td>
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
<div id="list">
<fieldset class="atas">

 <table class="table table-bordered" width="100%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>

    <td><div class="col-lg-5"><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $zz['no_aplikasi']; ?>" /><input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></div></td>


</tr>
<tr>
	<td width="10%">Jenis Agunan</td>
    <td width="5">:</td>
    <td> <div class="col-sm-9">
    <select name="nm_agunan" id="nm_agunan1" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listjaminan->result() as $w){

	?>
    <option value="<?php echo $w->id_jaminan;?>"><?php echo "".$w->nm_jaminan."";?></option>
    <?php } ?>
    </select></div></td>
</tr>
<tr>
	<td width="10%">Harga Pasar Agunan</td>

    <td width="5">:</td>
    <td> <div class="col-lg-5">
<input type="text" name="harga_agunan" id="harga_agunan1"  value=""  onKeyUp="kalkulator();"/>
</div>
</td></tr>
 <tr>
	<td width="10%">Bobot Agunan</td>

    <td width="5">:</td>
    <td> <div class="col-lg-5">
<input type="text" name="bobot_agunan" id="bobot_agunan"  value="" onKeyUp="kalkulator();"/>%
</div>
</td></tr>
<tr>
	<td width="10%">Nilai Agunan</td>

    <td width="5">:</td>
    <td> <div class="col-lg-5">
<input type="text" name="nilai_agunan" id="nilai_agunan"  value="" style=background-color:grey disabled />
 </div>
</td></tr>

<script type="text/javascript">
$(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#harga_agunan1").keyup(function () {
  var num = $("#harga_agunan1").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#harga_agunan1").val(numCommas);
  });


});


function addCommas(nStr) {
  nStr += '';
  var comma = /,/g;
  nStr = nStr.replace(comma,'');
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}
</script>
<script>

function currencyFormatDE (num) {
    return num
       .toFixed(0) // always two decimal digits
       .replace(".", ",") // replace decimal point character with ,
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") // use . as a separator
}
 function kalkulator(){

var harga_agunan= document.getElementById('harga_agunan1').value;
var harga_agunanm = harga_agunan.replace(",","");
var harga_agunans = harga_agunanm.replace(",","");
var harga_agunank = harga_agunans.replace(",","");
var bobot_agunan= document.getElementById('bobot_agunan').value;

var total = hasil=(parseFloat(harga_agunank)*parseFloat(bobot_agunan)/100);
var bulat = total.toFixed(2);
document.getElementById('nilai_agunan').value =currencyFormatDE (total);
}


</script>





<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
            <button type="button" name="simpan" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


    </td></tr>


  </table>

</fieldset>
</div>

<div id="jaminan">
<fieldset class="atas">

 <table id="data" width="90%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>

    <td>    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $zz['no_aplikasi']; ?>" />
<input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></td>
</tr>
<tr>

    <td><input type="hidden" name="nm_agunan" id="nm_agunan" size="30" maxlength="50" /></td>
</tr>
 <tr>
	<td width="20%">Kondisi Kendaraan</td>
    <td width="5">:</td>
    <td>
    <select  name="kondisi_kendaraan" id="kondisi_kendaraan" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listtipe->result() as $w){

	?>
    <option value="<?php echo $w->nm_tipe;?>"><?php echo "".$w->nm_tipe."";?></option>
    <?php } ?>
    </select>
</tr>
 <tr>
	<td width="20%">Tujuan Penggunaan Kendaraan</td>
    <td width="5">:</td>
    <td>
    <select  name="tujuan_kendaraan" id="tujuan_kendaraan" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listtujuan->result() as $a){

	?>
    <option value="<?php echo $a->nm_tkendaraan;?>"><?php echo "".$a->nm_tkendaraan."";?></option>
    <?php } ?>
    </select>
</tr>
  <tr>
	<td width="20%">Negara Pembuat Kendaraan</td>
    <td width="5">:</td>
    <td>
    <select  name="negara_kendaraan" id="negara_kendaraan" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listnegara->result() as $m){

	?>
    <option value="<?php echo $m->nm_negara;?>"><?php echo "".$m->nm_negara."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
 <tr>
	<td width="20%">Merk Kendaraan</td>
    <td width="5">:</td>
    <td>
    <select  name="merk" id="merk"  class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listmerk->result() as $m){

	?>
    <option value="<?php echo $m->id_merk;?>"><?php echo "".$m->nm_merk."";?></option>
    <?php } ?>
    </select>
    </td></tr>
<tr>
	<td width="10%">Model</td>
    <td width="5">:</td>
    <td>

     <div class="model">
   <select name="model" id="model"  class="js-example-basic-single js-states form-control" >
    <option value="0">-Pilih-</option>
      <?php
	foreach($listmodel->result() as $w){

	?>
    <option value="<?php echo $w->id_model;?>"><?php echo "".$w->nm_model."";?></option>
    <?php } ?>
    </select>

     </div>
     </td>
</tr>
<tr>
	<td width="10%">Type</td>
    <td width="5">:</td>
    <td>

    <div class="tipe">
      <select name="tipe" id="tipe"  class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listtipemobil->result() as $w){

	?>
    <option value="<?php echo $w->id_tipemobil;?>"><?php echo "".$w->nm_tipemobil."";?></option>
    <?php } ?>
    </select>
    </div>
     </td>
</tr>



  <tr>
	<td>No.Mesin</td>
    <td>:</td>
    <td><input type="text" name="no_mesin" id="no_mesin"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td>No.Rangka</td>
    <td>:</td>
    <td><input type="text" name="no_rangka" id="no_rangka"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>No.BPKB</td>
    <td>:</td>
    <td><input type="text" name="no_bpkb" id="no_bpkb"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>Tanggal PenerbitaN BPKB</td>
    <td>:</td>
    <td><input type="text" name="tgl_bpkb" id="tgl_bpkb" class="tgl"   size="20" maxlength="50"/></td>
</tr>

<tr>
	<td width=20%>Alamat Rumah (Sesuai KTP)</td>
    <td>:</td>
    <td><textarea name="alamat_kendaraan" id="alamat_kendaraan">
   </textarea><br /> </td>
</tr>
<tr>

 	<td width=20%>Kodepos </td>
    <td>:</td>
    <td> <input type="search" class='autocomplete nama' id="kdpos_kendaraan" name="kdpos_kendaraan" maxlength="50" size="20" /></td>
</tr>
<tr>
	<td width=20%>Kelurahan</td>
    <td>:</td>
    <td><input type="text" class='autocomplete' name="kelurahan_kendaraan"   id="kelurahan_kendaraan" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Kecamatan</td>
    <td>:</td>
    <td><input type="text" class='autocomplete'  name="kecamatan_kendaraan" id="kecamatan_kendaraan" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><input type="text" class='autocomplete'  name="kotamadya_kendaraan" id="kotamadya_kendaraan" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Propinsi</td>
    <td>:</td>
    <td><input type="text" class='autocomplete' name="propinsi_kendaraan" id="propinsi_kendaraan"  size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Alamat Lokasi Fisik Kendaraan</td>
    <td>:</td>
    <td><textarea name="alamat" id="alamat"  onkeyup="displayText1()">
   </textarea><br /> </td>
</tr>
<tr>

 	<td width=20%>Kodepos </td>
    <td>:</td>
    <td> <input type="search" class='autocomplete nama' id="kdpos" name="kdpos" maxlength="50" size="20" /></td>
</tr>
<tr>
	<td width=20%>Kelurahan</td>
    <td>:</td>
    <td><input type="text" class='autocomplete' name="kelurahan"   id="kelurahan" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Kecamatan</td>
    <td>:</td>
    <td><input type="text" class='autocomplete'  name="kecamatan" id="kecamatan" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><input type="text" class='autocomplete'  name="kotamadya" id="kotamadya" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Propinsi</td>
    <td>:</td>
    <td><input type="text" class='autocomplete' name="propinsi" id="propinsi"  size="20" maxlength="50"  /></td>
</tr>
<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
       <button type="button" name="simpankendaraan" id="simpankendaraan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan Kendaraan</button>
         <button type="button" name="cancel" id="cancel" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


    </td></tr>




  </table>

</fieldset>
</div>
<div id="tanah">
<fieldset class="atas">

 <table  width="90%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr><tH>
  <legend>Detail Tanah dan Bangunan</legend><br /></tH>
  </tr>
  <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $zz['no_aplikasi']; ?>" /><input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></td>
</tr>
 <tr>

    <td><input type="hidden" name="nm_agunan" id="nm_agunan" size="30" maxlength="50" /></td>
</tr>
<tr>
	<td width="10%">Jenis bangunan</td>
    <td width="5">:</td>
    <td>
    <select name="jenis_bangunan" id="jenis_bangunan" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listbangunan->result() as $w){

	?>
    <option value="<?php echo $w->nm_jnsbngn;?>"><?php echo "".$w->nm_jnsbngn."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
<tr>
	<td width="10%">Kepemilikan</td>
    <td width="5">:</td>
    <td>
    <select name="pemilik" id="pemilik" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listpemilik->result() as $w){

	?>
    <option value="<?php echo $w->nm_pemilik;?>"><?php echo "".$w->nm_pemilik."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>

  <tr>
	<td>Atas nama</td>
    <td>:</td>
    <td><input type="text" name="atas_nama" id="atas_nama"  size="30" maxlength="30" /></td>
</tr>

<tr>
	<td width=20%>Alamat </td>
    <td>:</td>
    <td><textarea name="alamat_kendaraan" id="alamat_tanah"  >
   </textarea><br /> </td>
</tr>
<tr>
<tr>
	<td>Luas Tanah</td>
    <td>:</td>
    <td><input type="text" name="luas_tanah" id="luas_tanah"  size="50" maxlength="50" onKeyUp="return checkInput(this);" />M2</td>
</tr>
<tr>
	<td>Luas Bangunan</td>
    <td>:</td>
    <td><input type="text" name="luas_bangun" id="luas_bangun"  size="50" maxlength="50" onKeyUp="return checkInput(this);" />M2</td>
</tr>
<tr>
	<td width="10%">Umur Bangunan</td>
    <td width="5">:</td>
    <td>
    <select name="umur" id="umur" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listumurbangunan->result() as $w){

	?>
    <option value="<?php echo $w->nm_umur;?>"><?php echo "".$w->nm_umur."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>

 	<td width=20%>Kodepos </td>
    <td>:</td>
    <td> <input type="search" class='autocomplete nama' id="kdpos_tanah" name="kdpos_kendaraan" maxlength="50" size="20" /></td>
</tr>
<tr>
	<td width=20%>Kelurahan</td>
    <td>:</td>
    <td><input type="text" class='autocomplete' name="kelurahan_kendaraan"   id="kelurahan_tanah" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Kecamatan</td>
    <td>:</td>
    <td><input type="text" class='autocomplete'  name="kecamatan_kendaraan" id="kecamatan_tanah" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><input type="text" class='autocomplete'  name="kotamadya_kendaraan" id="kotamadya_tanah" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Propinsi</td>
    <td>:</td>
    <td><input type="text" class='autocomplete' name="propinsi_kendaraan" id="propinsi_tanah"  size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width="10%">Status/Bukti Kepemilikan</td>
    <td width="5">:</td>
    <td>
    <select name="status" id="status" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listdoktanah->result() as $w){

	?>
    <option value="<?php echo $w->nm_doktanah;?>"><?php echo "".$w->nm_doktanah."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
 <tr>
	<td>No.Sertifikat/Girik/Petuk/Letter C</td>
    <td>:</td>
    <td><input type="text" name="no_sertifikat" id="no_sertifikat"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>Tanggal Terbit</td>
    <td>:</td>
    <td><input type="text" name="tgl_terbit" id="tgl_terbit" class="tgl"  class="tgl"  size="20" maxlength="50"/></td>
</tr>
 <tr>
	<td>Atas nama</td>
    <td>:</td>
    <td><input type="text" name="atas_imb" id="atas_imb"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td>No.IMB</td>
    <td>:</td>
    <td><input type="text" name="no_imb" id="no_imb"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td width="10%">Hubungan Nasabah</td>
    <td width="5">:</td>
    <td>
    <select name="hubnasabah" id="hub" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listnasabah->result() as $w){

	?>
    <option value="<?php echo $w->nm_nasabah;?>"><?php echo "".$w->nm_nasabah."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
       <button type="button" name="simpan" id="simpantanah" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="cancel" id="canceltanah" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>



    </td></tr>




  </table>

</fieldset>
</div>

<div id="cash">
<fieldset class="atas">

 <table id="data" width="90%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr><tH>
  <legend>Detail Cash Collateral</legend><br /></tH>
  </tr>
  <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $zz['no_aplikasi']; ?>" />    <input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></td>
</tr>
 <tr>

    <td><input type="hidden" name="nm_agunan" id="nm_agunan" size="30" maxlength="50" /></td>
</tr>

  <tr>
	<td>Atas nama</td>
    <td>:</td>
    <td><input type="text" name="atas_nama" id="atas_cash"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td>No Bilyet</td>
    <td>:</td>
    <td><input type="text" name="no_bilyet" id="no_bilyet"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td>No Seri</td>
    <td>:</td>
    <td><input type="text" name="no_seri" id="no_seri"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>Tanggal</td>
    <td>:</td>
    <td><input type="text" name="tgl_cash" id="tgl_cash" class="tgl"   size="20" maxlength="50"/></td>
</tr>
<tr>
	<td>Jumlah</td>
    <td>:</td>
    <td><input type="text" name="jumlah" id="jumlah"  size="20" maxlength="50"/></td>
</tr>
 <tr>
	<td>Pada Valuta Tangaal</td>
    <td>:</td>
    <td><input type="text" name="tgl_valuta" id="tgl_valuta" class="tgl"  size="20" maxlength="50"/></td>
</tr>
<tr>
	<td>Jatuh Tempo Tanggal</td>
    <td>:</td>
    <td><input type="text" name="tgl_jatuhtempo" id="tgl_jatuhtempo" class="tgl"  size="20" maxlength="50"/></td>
</tr>


<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
   <button type="button" name="simpan" id="simpancash" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="cancel" id="cancelcash" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


    </td></tr>




  </table>

</fieldset>
</div>
<div id="sk">
<fieldset class="atas">

 <table id="data" width="90%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
   <tr><tH>
  <legend>Detail SK</legend><br /></tH>
  </tr>
   <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $zz['no_aplikasi']; ?>" />    <input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></td>
</tr>
 <tr>

    <td><input type="hidden" name="nm_agunan" id="nm_agunan" size="30" maxlength="50" /></td>
</tr>

  <tr>
	<td>Nama Institusi Penerbit SK</td>
    <td>:</td>
    <td><input type="text" name="nm_sk" id="nm_sk"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td>No Rekening Bendahara</td>
    <td>:</td>
    <td><input type="text" name="no_rekening" id="no_rekening"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>Nama Bendahara</td>
    <td>:</td>
    <td><input type="text" name="nm_bendahara" id="nm_bendahara"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td width="20%">Payroll DiBSM</td>
    <td width="5">:</td>
    <td>
    <select name="payroll" id="payroll" class="js-example-basic-single js-states form-control">
     <option value="0">-Pilih-</option>
    <option value="ya">Ya</option>
    <option value="tidak">Tidak</option>

     </select>
    </td>
</tr>
<tr>
	<td>No SK</td>
    <td>:</td>
    <td><input type="text" name="no_sk" id="no_sk"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>No PKS</td>
    <td>:</td>
    <td><input type="text" name="no_pks" id="no_pks"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>Tanggal Penerbit SK</td>
    <td>:</td>
    <td><input  class="easyui-datebox" type="text" name="tgl_sk" id="tgl_sk" class="tgl"   size="20" maxlength="50"/></td>
</tr>


<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
  <button type="button" name="simpan" id="simpansk" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="cancel" id="cancelsk" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


    </td></tr>




  </table>

</fieldset>
</div>
<div id="mesin">
<fieldset class="atas">

 <table id="data" width="90%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
   <tr><tH>
  <legend>Detail Mesin</legend><br /></tH>
  </tr>
  <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $zz['no_aplikasi']; ?>" />    <input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></td>
</tr>
<tr>

    <td><input type="hidden" name="nm_agunan" id="nm_agunan" size="30" maxlength="50" /></td>
</tr>
  <tr>
	<td>Jenis Alat</td>
    <td>:</td>
    <td><input type="text" name="jenis_alat" id="jenis_alat"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td>Atas Nama</td>
    <td>:</td>
    <td><input type="text" name="atas_nama" id="atas_mesin"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td width="20%">Negara Pembuat </td>
    <td width="5">:</td>
    <td>
    <select  name="negara_mesin" id="negara_mesin" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listnegara->result() as $m){

	?>
    <option value="<?php echo $m->nm_negara;?>"><?php echo "".$m->nm_negara."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>

<tr>
	<td>merk</td>
    <td>:</td>
    <td><input type="text" name="merk_mesin" id="merk_mesin"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>Tahun</td>
    <td>:</td>
    <td><input type="text" name="tahun" id="tahun"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>No Faktur</td>
    <td>:</td>
    <td><input type="text" name="no_faktur" id="no_faktur"  size="20" maxlength="50"/></td>
</tr>
<tr>
	<td>Bukti Kepemilikan</td>
    <td>:</td>
    <td><input type="text" name="bukti_pemilik" id="bukti_pemilik"  size="20" maxlength="50"/></td>
</tr>
<tr>
	<td>Nomor Surat Kepemilikan</td>
    <td>:</td>
    <td><input type="text" name="no_pemilik" id="no_pemilik"  size="20" maxlength="50"/></td>
</tr>
<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
  <button type="button" name="simpan" id="simpanmesin" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="cancel" id="cancelmesin" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


    </td></tr>




  </table>

</fieldset>
</div>
 <div id="emas">
<fieldset class="atas">

 <table id="data" width="90%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>

    <td><input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></td>
</tr>
  <tr>

    <td><input type="hidden" name="nm_agunan" id="nm_agunan" size="30" maxlength="50" /></td>
</tr>
  <tr>
	<td>Karat</td>
    <td>:</td>
    <td><input type="text" name="karat" id="karat"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td>Sertifikat Perusahaan</td>
    <td>:</td>
    <td><input type="text" name="sertifikat_perusahaan" id="sertifikat_perusahaan"  size="30" maxlength="30" /></td>
</tr>


<tr>
	<td>Berat</td>
    <td>:</td>
    <td><input type="text" name="berat" id="berat"  size="10" maxlength="10" />(dalam bentuk gram)</td>
</tr>

<tr>
	<td>No sertifikat</td>
    <td>:</td>
    <td><input type="text" name="no_sertifikat" id="sertifikat"  size="20" maxlength="50"/></td>
</tr>
<tr>
	<td>Faktur</td>
    <td>:</td>
    <td><input type="text" name="no_faktur" id="faktur"  size="20" maxlength="50"/></td>
</tr>
 <tr>
	<td>Harga Emas per Gram</td>
    <td>:</td>
    <td><input type="text" name="harga_emas" id="harga_emas"  size="50" maxlength="50"  /></td>
</tr>


<script type="text/javascript">
$(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#harga_emas").keyup(function () {
  var num = $("#harga_emas").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#harga_emas").val(numCommas);
  });


});


function addCommas(nStr) {
  nStr += '';
  var comma = /,/g;
  nStr = nStr.replace(comma,'');
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}
</script>
<tr>
	<td>harga per Tanggal</td>
    <td>:</td>
    <td><input type="text" name="tgl_harga" id="tgl_harga" class="tgl"  size="20" maxlength="50"/></td>
</tr>
<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
  <button type="button" name="simpan" id="simpanemas" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="cancel" id="cancelemas" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


    </td></tr>




  </table>

</fieldset>
</div>
  <div id="piutang">
<fieldset class="atas">

  <table id="data" width="90%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>

    <td><input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></td>
</tr>
  <tr>

    <td><input type="hidden" name="nm_agunan" id="nm_agunan" size="30" maxlength="50" /></td>
</tr>
 <tr>
	<td width="20%">Transaksi Berdasarkan </td>
    <td width="5">:</td>
    <td>
    <select  name="nm_pihak" id="nm_pihak" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listpks->result() as $m){

	?>
    <option value="<?php echo $m->nm_pks;?>"><?php echo "".$m->nm_pks."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
 <tr>
	<td>No Kontrak</td>
    <td>:</td>
    <td><input type="text" name="no_kontrak" id="no_kontrak"  size="30" maxlength="30" /></td>
</tr>
 <tr>
	<td>Tanggal</td>
    <td>:</td>
    <td><input type="text" name="tgl_piutang" id="tgl_piutang" class="tgl"  size="20" maxlength="50"/></td>
</tr>

<tr>
	<td width="20%">Pihak Yang Berhutang</td>
    <td width="5">:</td>
    <td>
    <select  name="pihak_hutang" id="pihak_hutang" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listpihak->result() as $wa){

	?>
    <option value="<?php echo $wa->nm_pihak;?>"><?php echo "".$wa->nm_pihak."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>

<tr>
	<td width="20%">Umur Piutang</td>
    <td width="5">:</td>
    <td>
    <select  name="umur_piutang" id="umur_piutang" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listumurpiutang->result() as $wa){

	?>
    <option value="<?php echo $wa->nm_umurpiutang;?>"><?php echo "".$wa->nm_umurpiutang."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
   <button type="button" name="simpan" id="simpanpiutang" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="cancel" id="cancelpiutang" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>

    </td></tr>




  </table>


</fieldset>
</div>

<div id="tanahkosong">
<fieldset class="atas">

 <table id="data" width="90%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $ww['no_aplikasi']; ?>" /><input type="hidden" name="id_jaminand" id="id_jaminand" size="30" maxlength="50" /></td>
</tr>
 <tr>

    <td><input type="hidden" name="nm_agunan" id="nm_agunan" size="30" maxlength="50" /></td>
</tr>
  <tr>
	<td>Atas nama</td>
    <td>:</td>
    <td><input type="text" name="atas_nama" id="atas_namakosong"  size="30" maxlength="30" /></td>
</tr>

<tr>
	<td width=20%>Alamat </td>
    <td>:</td>
    <td><textarea name="alamat_kendaraan" id="alamat_tanahkosong" >
   </textarea><br /> </td>
</tr>
<tr>

 	<td width=20%>Kodepos </td>
    <td>:</td>
    <td> <input type="search" id="kdpos_tanahkosong" name="kdpos_kendaraan" maxlength="50" size="20" /></td>
</tr>
<tr>
	<td width=20%>Kelurahan</td>
    <td>:</td>
    <td><input type="text"  name="kelurahan_kendaraan"   id="kelurahan_tanahkosong" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Kecamatan</td>
    <td>:</td>
    <td><input type="text" name="kecamatan_kendaraan" id="kecamatan_tanahkosong" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><input type="text" name="kotamadya_kendaraan" id="kotamadya_tanahkosong" size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width=20%>Propinsi</td>
    <td>:</td>
    <td><input type="text" name="propinsi_kendaraan" id="propinsi_tanahkosong"  size="20" maxlength="50"  /></td>
</tr>
<tr>
	<td width="10%">Status/Bukti Kepemilikan</td>
    <td width="5">:</td>
    <td>
    <select name="status" id="statuskosong" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listdoktanah->result() as $w){

	?>
    <option value="<?php echo $w->nm_doktanah;?>"><?php echo "".$w->nm_doktanah."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
 <tr>
	<td>No.Sertifikat/Girik/Petuk/Letter C</td>
    <td>:</td>
    <td><input type="text" name="no_sertifikat" id="no_sertifikatkosong"  size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>Tanggal Terbit</td>
    <td>:</td>
    <td><input  type="text" name="tgl_terbit" id="tgl_terbitkosong" class="tgl"  size="20" maxlength="50"/></td>
</tr>
<tr>
	<td width="10%">Hubungan dengan Calon Nasabah</td>
    <td width="5">:</td>
    <td>
    <select name="hubnasabah" id="hubnasabah" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listnasabah->result() as $w){

	?>
    <option value="<?php echo $w->nm_nasabah;?>"><?php echo "".$w->nm_nasabah."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
<tr>
	<td width="10%">Peruntukan</td>
    <td width="5">:</td>
    <td>
    <select name="runtuk" id="runtuk" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listruntuk->result() as $w){

	?>
    <option value="<?php echo $w->nm_runtuk;?>"><?php echo "".$w->nm_runtuk."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
<tr>
	<td width="10%">Kondisi Tanah</td>
    <td width="5">:</td>
    <td>
    <select name="kondisi_tanah" id="kondisi_tanah" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listkondisitanah->result() as $w){

	?>
    <option value="<?php echo $w->nm_kondisitanah;?>"><?php echo "".$w->nm_kondisitanah."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
<tr>
	<td width="10%">Kepemilikan</td>
    <td width="5">:</td>
    <td>
    <select name="pemilik" id="pemilikkosong" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php
	foreach($listpemilik->result() as $w){

	?>
    <option value="<?php echo $w->nm_pemilik;?>"><?php echo "".$w->nm_pemilik."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
  <button type="button" name="simpan" id="simpantanahkosong" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="cancel" id="canceltanahkosong" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


    </td></tr>




  </table>

</fieldset>
</div>


