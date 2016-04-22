<?php
if($_POST){
# Cek nomor faktur di database
$cek_no_bon=mysql_num_rows(mysql_query
("SELECT id_faktur FROM arsip WHERE id_faktur='$_POST[id_faktur]'"));
# Kalau nomor faktur sudah ada
if ($cek_no_bon > 0){
  echo "<script type='text/javascript'>window.alert('Faktur Pajak Sudah Diarsipkan')</script>";
}
# Kalau nomor faktur belum ada silahkan di simpan
else{
$id_faktur=$_POST['id_faktur'];
$ssp=$_POST['ssp'];
$bupot=$_POST['bupot'];
$invoice=$_POST['invoice'];
$description=$_POST['description'];
$simpan="INSERT INTO arsip (id_faktur,ssp,bupot,invoice,description)
values
('$id_faktur','$ssp','$bupot','$invoice','$description')";
mysql_query($simpan,$koneksi);
echo"<meta http-equiv='refresh' content='0;url=?r=faktur_show'>";
exit;
}
}
?>
<html>
<head>
<title>INBOX</title>
 <script language="JavaScript">
	function kirpesan() {
	
		if(document.formpesan.ssp.value=="") {
			alert("KOLOM SSP BELUM DIISI *PERHATIAN DATA FAKTUR PAJAK HARUS SUDAH FIKS DAN SUDAH DILAPORKAN SEBELUM DILAKUKAN POSTING DATA UNTUK PROSES ARSIP*");
			return false;
		}
		if(document.formpesan.bupot.value=="") {
			alert("Kolom Bukti Potong belum diisi");
			return false;
		}
		if(document.formpesan.invoice.value=="") {
			alert("Kolom Invoice belum diisi");
			return false;
		}
		if(document.formpesan.description.value=="") {
			alert("Kolom Keterangan belum diisi");
			return false;
		}
		return true;
}
</script>
</head>
<body>
<div id="menu"><div id="isimenu"></div></div>
    <div id="content">
    <div id="isicontent">POSTING ARSIP<br>
<br>
<?php
$tampil =mysql_query("SELECT * FROM faktur WHERE id_faktur='$_GET[id_faktur]'");	
$data=mysql_fetch_array($tampil);
?>
<form action="" method="post" enctype="multipart/form-data" name='formpesan' onSubmit='return kirpesan()'>
<table width="100%" border="0">
  <tr>
    <td width="114" height="37">Nomor Faktur</td>
    <td width="14">:</td>
    <td width="588"><input type="text" value="<?=$data['id_faktur']?>" class="b1" disabled><input type="hidden" name="id_faktur" value="<?=$data['id_faktur']?>" class="b1"></td>
  </tr>
  <tr>
    <td height="32">Bukti Setor (SSP)</td>
    <td>:</td>
    <td>
    <select name="ssp" class="b1">
    <option value="">PILIH</option>
    <option value="BATAL">BATAL</option>
    <option value="SELESAI">SELESAI</option>
    <option value="PROSES">PROSES</option>
    </select>
    </td>
  </tr>
  <tr>
    <td height="32">Bukti Potong PPh 23</td>
    <td>:</td>
    <td>    
    <select name="bupot" class="b1">
    <option value="">PILIH</option>
    <option value="BATAL">BATAL</option>
    <option value="SELESAI">SELESAI</option>
    <option value="PROSES">PROSES</option>
    </select>
    </td>
  </tr>
  <tr>
    <td height="32">Invoice</td>
    <td>:</td>
    <td>    
    <select name="invoice" class="b1">
    <option value="">PILIH</option>
    <option value="BATAL">BATAL</option>
    <option value="SELESAI">SELESAI</option>
    <option value="PROSES">PROSES</option>
    </select>
    </td>
  </tr>
  <tr>
    <td height="32">Keterangan</td>
    <td>:</td>
    <td>
    <input type="text" name="description" class="b1" size="30">
    <input type="hidden" name="npwp" value="<?=$data['npwp']?>"></td>
  </tr>
  <tr>
    <td height="40"></td>
    <td>&nbsp;</td>
    <td><input type="submit" value="Simpan" class="btn btn-sm btn-warning">&nbsp;<input type="reset" value="Batal" class="btn btn-sm btn-danger" onClick="history.back()"></td>
  </tr>
  <tr>
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