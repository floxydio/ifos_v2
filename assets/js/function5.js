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
var jangka_waktu =document.getElementById('jangka_waktu').value;
var margin =document.getElementById('margin').value;
 var baru= document.getElementById('jj').value;


 var hasil = plafonb * ((marginb/100)/12) * (Math.pow(1+((marginb/100)/baru),jangka_waktu)/(Math.pow(1+((marginb/100)/baru),jangka_waktu)-1));
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




function currencyFormatDE1(num) {
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

function kalkulatorKeuangan(){
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
document.getElementById('penghasilan_bersih').value = currencyFormatDE1(bersih);

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
document.getElementById('total_penghasilan2').value = currencyFormatDE1(total);

var total_penghasilan2 =document.getElementById('total_penghasilan2').value;
var  total_penghasilan2m = total_penghasilan2.replace(".","");
var total_penghasilan2b = total_penghasilan2m.replace(".","");

var biaya_hidup1 =document.getElementById('biaya_hidup1').value;
var  biaya_hidup1m = biaya_hidup1.replace(",","");
var biaya_hidup1b = biaya_hidup1m.replace(",","");

//var biaya_lain1 =document.getElementById('biaya_lain1').value;
//var  biaya_lain1m = biaya_lain1.replace(",","");
//var biaya_lain1b = biaya_lain1m.replace(",","");

var angsuran_pemohon1 =document.getElementById('angsuran_pemohon1').value;
var  angsuran_pemohon1m = angsuran_pemohon1.replace(",","");
var angsuran_pemohon1b = angsuran_pemohon1m.replace(",","");

var angsuran_bsm1 =document.getElementById('angsuran_bsm1').value;
var  angsuran_bsm1m = angsuran_bsm1.replace(",","");
var angsuran_bsm1b = angsuran_bsm1m.replace(",","");

var angsuran_pasangan1 =document.getElementById('angsuran_pasangan1').value;
var  angsuran_pasangan1m = angsuran_pasangan1.replace(",","");
var angsuran_pasangan1b = angsuran_pasangan1m.replace(",","");

var sisa1 = hasil7=((((parseFloat(total_penghasilan2b)-parseFloat(biaya_hidup1b))-parseFloat(angsuran_pemohon1b))-parseFloat(angsuran_bsm1b))-parseFloat(angsuran_pasangan1b));
var bulat = total.toFixed(2);
document.getElementById('sisa_penghasilan1').value =currencyFormatKeuangan1(sisa1);

}

function currencyFormatDE(num) {
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
 function kalkulatorTambahKeuangan(){

var x_AndaMhs= document.getElementById('s_penghasilan').value;
var gaji_bulan= document.getElementById('gaji_bulan').value;
var gaji = gaji_bulan.replace(",","");
var gajim = gaji.replace(",","");
var peng_tambahan =document.getElementById('peng_tambahan').value;
var tambahan = peng_tambahan.replace(",","");
var tambahanm = tambahan.replace(",","");
 if(x_AndaMhs=='join'){
var peng_utamapasangan =document.getElementById('peng_utamapasangan').value;
var utamapasangan = peng_utamapasangan.replace(",","");
var utamapasanganm = utamapasangan.replace(",","");
var peng_tambahanpasangan =document.getElementById('peng_tambahanpasangan').value;
var tambahanpasangan = peng_tambahanpasangan.replace(",","");
var tambahanpasanganm = tambahanpasangan.replace(",","");
}else{
var utamapasanganm = '0';
var tambahanpasanganm ='0';
}
var total = hasil=(((parseFloat(gajim)+parseFloat(tambahanm))+parseFloat(utamapasanganm))+parseFloat(tambahanpasanganm));
var bulat = total.toFixed(2);
document.getElementById('total_penghasilan').value =currencyFormatDE(total);

var total_penghasilan =document.getElementById('total_penghasilan').value;
var  total_penghasilanm = total_penghasilan.replace(".","");
var total_penghasilanb = total_penghasilanm.replace(".","");

var biaya_hidup =document.getElementById('biaya_hidup').value;
var  biaya_hidupm = biaya_hidup.replace(",","");
var biaya_hidupb = biaya_hidupm.replace(",","");

/*var biaya_lain =document.getElementById('biaya_lain').value;
var  biaya_lainm = biaya_lain.replace(",","");
var biaya_lainb = biaya_lainm.replace(",","");*/

var angsuran_pemohon =document.getElementById('angsuran_pemohon').value;
var  angsuran_pemohonm = angsuran_pemohon.replace(",","");
var angsuran_pemohonb = angsuran_pemohonm.replace(",","");

var angsuran_bsm =document.getElementById('angsuran_bsm').value;
var  angsuran_bsmm = angsuran_bsm.replace(",","");
var angsuran_bsmb = angsuran_bsmm.replace(",","");

var angsuran_pasangan =document.getElementById('angsuran_pasangan').value;
var  angsuran_pasanganm = angsuran_pasangan.replace(",","");
var angsuran_pasanganb = angsuran_pasanganm.replace(",","");

var sisa = hasil5=((((parseFloat(total_penghasilanb)-parseFloat(biaya_hidupb))-parseFloat(angsuran_pemohonb))-parseFloat(angsuran_bsmb))-parseFloat(angsuran_pasanganb));
var bulat = total.toFixed(2);
document.getElementById('sisa_penghasilan').value =currencyFormatDEKeuangan(sisa);

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

