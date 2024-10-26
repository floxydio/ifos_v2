 function createGrid(){
    $("#list").trigger("reloadGrid");

}

function tampil_dataparameter(dat,kontrol,link,form,num){
		var username = $("#userid").val();
		var string = "username="+username;

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>parameter/"+kontrol+"/"+dat+"/"+link+"/"+form+"/"+num,
			data	: string,
			cache	: false,
                beforeSend: function(){
            $("#dataform").html("Loading...");
                                    },
			success	: function(data){
				$("#dataform").html(data);
                   $("#view").hide();

			}
		});
	}

function checkInput(obj)
{
    var pola = "^";
    pola += "[0-9,]*";
    pola += "$";
    rx = new RegExp(pola);

    if (!obj.value.match(rx))
    {
        if (obj.lastMatched)
        {
            obj.value = obj.lastMatched;
        }
        else
        {
            obj.value = "";
        }
    }
    else
    {
        obj.lastMatched = obj.value;
    }
}

function checkUser(obj)
{
    var pola = "^";
    pola += "[0-9,A-Za-z]*";
    pola += "$";
    rx = new RegExp(pola);

    if (!obj.value.match(rx))
    {
        if (obj.lastMatched)
        {
            obj.value = obj.lastMatched;
        }
        else
        {
            obj.value = "";
        }
    }
    else
    {
        obj.lastMatched = obj.value;
    }
}




function displayText(){
  var text = document.getElementById('nm_depan').value;
  text += " ";
  text += document.getElementById('nm_tengah').value;
   text += " ";
   text += document.getElementById('nm_belakang').value;
  document.getElementById('nm_lengkap').value = text;
}


$("#nm_depan , #nm_tengah, #nm_belakang").on('input', function(evt) {
     var input = $(this);
     var start = input[0].selectionStart;
     $(this).val(function (_, val) {
       return val.toUpperCase();
     });
     input[0].selectionStart = input[0].selectionEnd = start;
   });



function currencyFormatDE (num) {
    return num
       .toFixed(2) // always two decimal digits
       .replace(".", ",") // replace decimal point character with ,
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") // use . as a separator
}

function kalkulatorTambah(){


  var margin= document.getElementById('margin').value;
var marginm = margin.replace(",","");
var marginb = marginm.replace(",","");
 var plafon= document.getElementById('plafon').value;
var plafonm = plafon.replace(",","");
var plafonb = plafonm.replace(",","");
var uang_muka =document.getElementById('uang_muka').value;
var uang_mukam = uang_muka.replace(",","");
var uang_mukab = uang_mukam.replace(",","");
var jangka_waktu =document.getElementById('jangka_waktu').value;
var margin =document.getElementById('margin').value;
 var total = (parseFloat(uang_mukab) / parseFloat(plafonb))* 100;;
 var bulat = total.toFixed(2)
document.getElementById('p_umuka').value = currencyFormatDE(total);

 var hasil = plafonb * ((marginb/100)/12) * (Math.pow(1+((marginb/100)/12),jangka_waktu)/(Math.pow(1+((marginb/100)/12),jangka_waktu)-1));
 //var total = (uang_muka / plafon)* 100;;

document.getElementById('angsuran').value = currencyFormatDE (hasil);

}

function currencyFormatDE1 (num) {
    return num
       .toFixed(0) // always two decimal digits
       .replace(".", ",") // replace decimal point character with ,
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") // use . as a separator
}

function currencyFormatKeuangan1(num) {
    return num
       .toFixed(0) // always two decimal digits
       .replace(".", ",") // replace decimal point character with ,
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") // use . as a separator
}


function kalkulator(){
var penjualan_bulan= document.getElementById('penjualan_bulan').value;
var penjualan = penjualan_bulan.replace(",","");
var penjualanm = penjualan.replace(",","");
var penjualann = penjualanm.replace(",","");
var hpp =document.getElementById('hpp').value;
var hpp1 = hpp.replace(",","");
var hppm = hpp1.replace(",","");
var hppn= hppm.replace(",","");
var total_biaya =document.getElementById('total_biaya').value;
var total = total_biaya.replace(",","");
var totalm = total.replace(",","");
var totaln = totalm.replace(",","");

var bersih = hasil=((parseFloat(penjualann)-parseFloat(hppn))-parseFloat(totaln));
document.getElementById('penghasilan_bersih').value = currencyFormatDE1 (bersih);

var penghasilan_bersih= document.getElementById('penghasilan_bersih').value;
var penghasilan_bersihm =penghasilan_bersih.replace(".","");
var penghasilan_bersihb = penghasilan_bersihm.replace(".","");
var peng_tambahan2= document.getElementById('peng_tambahan2').value;
var peng_tambahan2m =peng_tambahan2.replace(",","");
var peng_tambahan2b = peng_tambahan2m.replace(",","");
var peng_utamapasangan2= document.getElementById('peng_utamapasangan2').value;
var peng_utamapasangan2m =peng_utamapasangan2.replace(",","");
var peng_utamapasangan2b = peng_utamapasangan2m.replace(",","");
var peng_tambahanpasangan2= document.getElementById('peng_tambahanpasangan2').value;
var peng_tambahanpasangan2m =peng_tambahanpasangan2.replace(",","");
var peng_tambahanpasangan2b = peng_tambahanpasangan2m.replace(",","");

var total = hasil=(((parseFloat(penghasilan_bersihb)+parseFloat(peng_tambahan2b))+parseFloat(peng_utamapasangan2b))+parseFloat(peng_tambahanpasangan2b));
document.getElementById('total_penghasilan2').value = currencyFormatDE1 (total);

}

function currencyFormatDE (num) {
    return num
       .toFixed(0) // always two decimal digits
       .replace(".", ",") // replace decimal point character with ,
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") // use . as a separator
}
function currencyFormatDEKeuangan(num) {
    return num
       .toFixed(0) // always two decimal digits
       .replace(".", ",") // replace decimal point character with ,
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") // use . as a separator
}
 function kalkulatorTambahData(){


var gaji_bulan= document.getElementById('gaji_bulan').value;
var gaji = gaji_bulan.replace(",","");
var gajim = gaji.replace(",","");
var peng_tambahan =document.getElementById('peng_tambahan').value;
var tambahan = peng_tambahan.replace(",","");
var tambahanm = tambahan.replace(",","");

var peng_utamapasangan =document.getElementById('peng_utamapasangan').value;
var utamapasangan = peng_utamapasangan.replace(",","");
var utamapasanganm = utamapasangan.replace(",","");
var peng_tambahanpasangan =document.getElementById('peng_tambahanpasangan').value;
var tambahanpasangan = peng_tambahanpasangan.replace(",","");
var tambahanpasanganm = tambahanpasangan.replace(",","");

var total = hasil=(((parseFloat(gajim)+parseFloat(tambahanm))+parseFloat(utamapasanganm))+parseFloat(tambahanpasanganm));

var bulat = total.toFixed(2);
document.getElementById('total_penghasilan').value =currencyFormatDE (total);


}



function newfasilitasupliner(){
	      $('#ssb').dialog('open');
		var username = $("#username").val();
		var string = "username="+username;

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/mnj_user/Detailupliner",
			data	: string,
			cache	: false,
			success	: function(data){
				$("#kodepos").html(data);
			}
		});
	}


    function reset_data(namauser){
	  	var string = "namauser="+namauser;

		$.ajax({
			type	: 'POST',
			url		: "mnj_user/Detailreset",
			data	: string,
			cache	: true,
			success	: function(data){
			  	$("#view").hide();
				$("#reset_data").html(data);
			}
		});
	}

     function kosonguser(){
       $("#nama_lengkap").val('');
                 $("#no_account").val('');
                       $("#password").val(''); 
                $('#nm_cabang').combobox('setValue', '');
                    $("#level").val('');
                    $("#status").val('');
          $("#id_jabatanpeg").val('');
                     $('#limit').hide();
          $('#sklimit').hide();
          $('#tgllimit').hide();


	}

