<?php
if($_POST){
# Cek nomor faktur di database
$cek_no_bon=mysql_num_rows(mysql_query
("SELECT no_fak FROM faktur WHERE no_fak='$_POST[no_fak]'"));
# Kalau nomor faktur sudah ada
if ($cek_no_bon > 0){
  echo "<script type='text/javascript'>window.alert('Faktur Pajak Sudah Pernah di gunakan')</script>";
}
# Kalau nomor faktur belum ada silahkan di simpan
else{
$id_lw=$_POST['id_lw'];
$kode=$_POST['kode'];
$no_fak=$_POST['no_fak'];
$tanggal=$_POST['tanggal'];
$keterangan=$_POST['keterangan'];
$nominal=$_POST['nominal'];
$divisi=$_POST['divisi'];
$npwp=$_POST['npwp'];
$simpan="INSERT INTO faktur (id_lw,kode,no_fak,tanggal,keterangan,nominal,divisi,npwp)
values
('$id_lw','$kode','$no_fak','$tanggal','$keterangan','$nominal','$divisi','$npwp')";
mysql_query($simpan,$koneksi);
echo"<meta http-equiv='refresh' content='0;url=?r=faktur_show&halaman=".$_GET['halaman']."'>";
exit;
}
}
?>
<html>
<head>
<title>FAKTUR ENTRY</title>
 <script language="JavaScript">
	function kirpesan() {
	
		if(document.formpesan.id_lw.value=="") {
			alert("Lawan Transaksi belum dipilih");
			return false;
		}
		if(document.formpesan.kode.value=="") {
			alert("Kolom Kode Faktur belum diisi");
			return false;
		}
		if(document.formpesan.no_fak.value=="") {
			alert("Kolom Nomor Faktur belum diisi");
			return false;
		}
		if(document.formpesan.tanggal.value=="") {
			alert("Kolom Tanggal belum diisi");
			return false;
		}
		if(document.formpesan.nominal.value=="") {
			alert("Kolom Nominal belum diisi");
			return false;
		}
		if(document.formpesan.divisi.value=="") {
			alert("Kolom divisi belum diisi");
			return false;
		}
		return true;
}
</script>

</head>
<body>
<div id="menu"><div id="isimenu"></div></div>
    <div id="content">
    <div id="isicontent">FAKTUR PAJAK KELUARAN<br>
<br> 
<form action="" method="post" enctype="multipart/form-data" name='formpesan' onSubmit='return kirpesan()'>
<table width="100%" border="0">
  <tr>
    <td width="114" height="37">Lawan Transaksi</td>
    <td width="14">:</td>
    <td width="588">
    <select name="id_lw" class="b1">
    		<option value="">PILIH LAWAN TRANSAKSI</option>
       		<?php
            $query = "select * from profile_lw where npwp='".$_SESSION['npwp']."'";
            $hasil = mysql_query($query);
            while ($qtabel = mysql_fetch_assoc($hasil))
            {
                echo '<option value="'.$qtabel['id_lw'].'">'.$qtabel['nama_lw'].'</option>';               
            }
            ?>
      </select>
    
    </td>
  </tr>
  <tr>
    <td height="32">Kode</td>
    <td>:</td>
    <td>
    <select name="kode" class="b1">
    <option value="">KODE</option>
    <option value="010">010</option>
    <option value="020">020</option>
    <option value="030">030</option>
    <option value="030">040</option>
    <option value="060">060</option>
    <option value="070">070</option>
    <option value="080">080</option>
    <option value="090">090</option>
    </select>&nbsp;<input type="text" name="no_fak" placeholder="000-00.00000000" class="b1">
    </td>
  </tr>
  <tr>
    <td height="32">Tanggal</td>
    <td>:</td>
    <td><input type="text" name="tanggal" size="20" class="b1" id="datepicker"></td>
  </tr>
  <tr>
    <td height="32" valign="top">Keterangan</td>
    <td valign="top">:</td>
    <td valign="top"><textarea name="keterangan" class="ckeditor" cols="3" rows="2"></textarea></td>
  </tr>
  <tr>
    <td height="32">Nominal</td>
    <td>:</td>
    <td><input type="text" name="nominal" size="30" class="b1"></td>
  </tr>
  <tr>
    <td height="32">Divisi</td>
    <td>:</td>
    <td><input type="text" name="divisi" size="30" class="b1"><input type="hidden" name="npwp" value="<?=$data['npwp']?>"></td>
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