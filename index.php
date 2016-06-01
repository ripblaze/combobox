<html>
<head><title>Select Chain</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
    $.ajax({
        url: "ambilkota.php",
        data: "propinsi="+propinsi,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kota").html(msg);
        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
        url: "ambilkecamatan.php",
        data: "kota="+kota,
        cache: false,
        success: function(msg){
            $("#kec").html(msg);
        }
    });
  });
});

</script>
</head>
<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("provkabkotkec");
?>
Pilih Provinsi :<br>
<select name="propinsi" id="propinsi">
<option>--Pilih Provinsi--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
}
?>
</select>
<br>Pilih Kabupaten/Kota :<br>
<select name="kota" id="kota">
<option>--Pilih Kabupaten/Kota--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$kota = mysql_query("SELECT * FROM kabkot ORDER BY nama_kabkot");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
}
?>
</select>

<br>Pilih Kecamatan :<br>
<select name="kec" id="kec">
<option>--Pilih Kecamatan--</option>
</select>
</body>
</html>
