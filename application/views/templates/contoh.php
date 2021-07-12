<script>
    // load xml file from scan qr code
    function loadDoc(url) {

        $xml = simplexml_load_file(url);
        // var xhttp = new XMLHttpRequest();
        // xhttp.open("GET", url, true);
        // xhttp.onreadystatechange = function() {
        // if (this.readyState == 4 && this.status == 200) {
        // myFunction(this);
        // }
        // };
        // xhttp.send();
    }
    // end scan jika berhasil jalankan fungsi dibawah ini langsung :
    // load tabel
    function myFunction() {
        var doc = xhttp.responseXML;
        var i;
        var table = "<thead> <tr>" +
            "<th scope='col'>kdJenisTransaksi</th>" +
            "<th scope='col'>fgPengganti</th>" +
            "<th scope='col'>nomorFaktur</th>" +
            "<th scope='col'>tanggalFaktur</th>" +
            "<th scope='col'>npwpPenjual</th>" +
            "<th scope='col'>namaPenjual</th>" +
            "<th scope='col'>alamatPenjual</th>" +
            "<th scope='col'>npwpLawanTransaksi</th>" +
            "<th scope='col'>namaLawanTransaksi</th>" +
            "<th scope='col'>alamatLawanTransaksi</th>" +
            "<th scope='col'>jumlahDpp</th>" +
            "<th scope='col'>jumlahPpn</th>" +
            "<th scope='col'>jumlahPpnBm</th>" +
            "<th scope='col'>statusApproval</th>" +
            "<th scope='col'>statusFaktur</th>" +
            "<th scope='col'>nama</th>" +
            "<th scope='col'>Harga Satuan</th>" +
            "<th scope='col'>Jumlah Barang</th>" +
            "<th scope='col'>Harga Total</th>" +
            "<th scope='col'>Disc</th>" +
            "<th scope='col'>dpp</th>" +
            "<th scope='col'>ppn</th>" +
            "<th scope='col'>Tarif Ppnbm</th>" +
            "<th scope='col'>ppnbm</th>" +
            "</tr> </thead>";
        var y = doc.getElementsByTagName("resValidateFakturPm");
        var x = doc.getElementsByTagName("detailTransaksi");

        for (i = 0; i < x.length; i++) {
            for (j = 0; j < y.length; j++) {
                table += "<tbody><tr><td>" +
                    y[j].getElementsByTagName("kdJenisTransaksi")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("fgPengganti")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("nomorFaktur")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("tanggalFaktur")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("npwpPenjual")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("namaPenjual")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("alamatPenjual")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("npwpLawanTransaksi")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("namaLawanTransaksi")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("alamatLawanTransaksi")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("jumlahDpp")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("jumlahPpn")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("jumlahPpnBm")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("statusApproval")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    y[j].getElementsByTagName("statusFaktur")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("nama")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("hargaSatuan")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("jumlahBarang")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("hargaTotal")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("diskon")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("dpp")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("ppn")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("tarifPpnbm")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("ppnbm")[0].childNodes[0].nodeValue +
                    "</td></tr></tbody>";
            }
        }
        document.getElementById("tablepajak").innerHTML = table;
        $('#tablepajak').DataTable({});
    }
    // endload tabel
</script>