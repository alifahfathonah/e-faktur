<?php
include('config/koneksi.php');
if($_POST){
# Cek nomor npwp di database
$cek_no_bon=mysql_num_rows(mysql_query
("SELECT npwp FROM profile WHERE npwp='$_POST[npwp]'"));
# Kalau nomor faktur sudah ada
if ($cek_no_bon > 0){
  echo "<script type='text/javascript'>window.alert('NPWP Sudah di daftarkan dalam sistem ini')</script>";
}
# Kalau nomor NPWP belum ada silahkan di simpan
else{
$npwp=$_POST['npwp'];
$nama_wp=$_POST['nama_wp'];
$alamat=$_POST['alamat'];
$kota=$_POST['kota'];
$no_tel=$_POST['no_tel'];
$usaha=$_POST['usaha'];
$klu=$_POST['klu'];
$nama=$_POST['nama'];
$jabatan=$_POST['jabatan'];
$pass=md5($_POST['password']);
$level=$_POST['level'];

$simpan="INSERT INTO profile (npwp,nama_wp,alamat,kota,no_tel,usaha,klu,nama,jabatan,password,level)
values
('$npwp','$nama_wp','$alamat','$kota','$no_tel','$usaha','$klu','$nama','$jabatan','$pass','$level')";
mysql_query($simpan,$koneksi);
echo "<script type='text/javascript'>window.alert('Registrasi sukses silahkan login desan username npwp dan password yang anda buat')</script>";
}
}
?>
<html>
<head>
<title>INBOX</title>
<link href="css/ci_concept.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="images/icon.png" rel="shortcut icon">
<script src="js/tinymce.min.js"></script>
 <script language="JavaScript">
	function kirpesan() {
	
		if(document.formpesan.npwp.value=="") {
			alert("Kolom Npwp belum diisi");
			return false;
		}
		if(document.formpesan.nama_wp.value=="") {
			alert("Kolom Nama WP belum diisi");
			return false;
		}
		
		if(document.formpesan.kota.value=="") {
			alert("Kolom Kota belum diisi");
			return false;
		}
		if(document.formpesan.alamat.value=="") {
			alert("Kolom Alamat belum diisi");
			return false;
		}
		if(document.formpesan.no_tel.value=="") {
			alert("Kolom Nomor telpon belum diisi");
			return false;
		}
		if(document.formpesan.usaha.value=="") {
			alert("Kolom Usaha belum diisi");
			return false;
		}
		if(document.formpesan.klu.value=="") {
			alert("Kolom klu belum diisi");
			return false;
		}
		if(document.formpesan.nama.value=="") {
			alert("Kolom nama belum diisi");
			return false;
		}
		if(document.formpesan.jabatan.value=="") {
			alert("Kolom jabatan belum diisi");
			return false;
		}
		return true;
}
</script>
<script language="javascript" type="text/javascript"> 
function closeWindow() { 
window.open('','_parent',''); 
window.close(); 
} 
</script>

</head>
<body>
<div id="menu"><div id="isimenu"></div></div>
    <div id="content">
    <div id="isicontent">
<!-- CONTENT -->
<form action="" method="post" enctype="multipart/form-data" name='formpesan' onSubmit='return kirpesan()'>
<table width="708" border="0">
  <tr>
    <td>&nbsp;</td>
    <td height="37" colspan="3"><font class="judul">REGISTER WAJIB PAJAK</font><br></td>
    </tr>
  <tr>
    <td width="56">&nbsp;</td>
    <td width="221" height="37">Npwp</td>
    <td width="23">:</td>
    <td width="490"><input type="text" name="npwp" size="30" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="32">Nama Wajib Pajak</td>
    <td>:</td>
    <td><input type="text" name="nama_wp" size="30" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="32">Alamat</td>
    <td>:</td>
    <td><input type="text" name="alamat" size="70" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="32">Kota</td>
    <td>:</td>
    <td><input type="text" name="kota" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="32">No Telpon</td>
    <td>:</td>
    <td><input type="text" name="no_tel" size="20" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="32">Jenis Usaha</td>
    <td>:</td>
    <td><input type="text" name="usaha" size="30" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="32">Klu</td>
    <td>:</td>
    <td><input type="text" name="klu" size="30" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="32">Nama Penanda Tangak Faktur</td>
    <td>:</td>
    <td><input type="text" name="nama" size="30" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="32">Jabatan</td>
    <td>:</td>
    <td><input type="text" name="jabatan" size="30" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">Password Login</td>
    <td>:</td>
    <td><input type="password" value="" name="password" class="b1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40"><input type="hidden" value="wp" name="level"></td>
    <td>&nbsp;</td>
    <td><input type="submit" value="Simpan" class="btn btn-sm btn-warning">&nbsp;<a href="javascript:closeWindow();"><input type="button" value="Tutup" class="btn btn-sm btn-danger"></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
<p>
    </div>
    	</div>
        </div>

</body>
</html>