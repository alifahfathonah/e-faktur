<?PHP
if($_POST){
$edit=mysql_query("UPDATE faktur SET  id_lw='$_POST[id_lw]',
									  kode='$_POST[kode]',
									  no_fak='$_POST[no_fak]',
									  tanggal='$_POST[tanggal]',
									  keterangan='$_POST[keterangan]',
									  nominal='$_POST[nominal]',
									  divisi='$_POST[divisi]',
									  status='$_POST[status]',
									  npwp='$_POST[npwp]'
                                      WHERE id_faktur='$_POST[id_faktur]'");
mysql_query($edit,$koneksi);
echo"<meta http-equiv='refresh' content='0;url=?r=faktur_show&halaman=".$_GET['halaman']."'>";
}
?>
<html>
<html>
<head>
<title>EDIT FAKTUR</title>
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
		if(document.formpesan.status.value=="") {
		alert("Kolom status belum diisi");
		return false;
		}
		return true;
}
</script>
</head>
<body>
<div id="menu"><div id="isimenu"></div></div>
    <div id="content">
    <div id="isicontent">EDIT FAKTUR PAJAK KELUARAN<br>
<br>
<?php
$tampil =mysql_query("SELECT faktur.id_lw,faktur.tanggal,faktur.kode,faktur.no_fak,faktur.nominal,faktur.divisi,faktur.npwp,faktur.keterangan,faktur.id_faktur,faktur.status,
profile_lw.nama_lw,profile_lw.alamat_lw,
profile.nama_wp,profile.alamat,profile.npwp,profile.kota,profile.nama,profile.jabatan
FROM faktur,profile_lw,profile
WHERE faktur.id_lw=profile_lw.id_lw AND profile.npwp=faktur.npwp AND id_faktur='$_GET[id_faktur]'");	
$data=mysql_fetch_array($tampil);
?>
<form action="" method="post" enctype="multipart/form-data" name='formpesan' onSubmit='return kirpesan()'>
<table width="100%" border="0">
  <tr>
    <td width="114" height="37">Lawan Transaksi</td>
    <td width="14">:<input type="hidden" name="id_faktur" value="<?=$data['id_faktur']?>"></td>
    <td width="588">
    <select name="id_lw" class="b1">
    		<option value="<?=$data['id_lw']?>"><?=$data['nama_lw']?></option>
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
    <option value="<?=$data['kode']?>"><?=$data['kode']?></option>
    <option value="010">010</option>
    <option value="020">020</option>
    <option value="030">030</option>
    <option value="030">040</option>
    <option value="060">060</option>
    <option value="070">070</option>
    <option value="080">080</option>
    <option value="090">090</option>
    </select>&nbsp;<input type="text" name="no_fak" value="<?=$data['no_fak']?>" placeholder="000-00.00000000" class="b1">
    </td>
  </tr>
  <tr>
    <td height="32">Tanggal</td>
    <td>:</td>
    <td><input type="text" name="tanggal" size="20" value="<?=$data['tanggal']?>" class="b1" id="datepicker"></td>
  </tr>
  <tr>
    <td height="32">Keterangan</td>
    <td>:</td>
    <td><textarea name="keterangan" cols="3" rows="3" class="ckeditor"><?=$data['keterangan']?></textarea></td>
  </tr>
  <tr>
    <td height="32">Nominal</td>
    <td>:</td>
    <td><input type="text" name="nominal" size="30" value="<?=$data['nominal']?>" class="b1"></td>
  </tr>
  <tr>
    <td height="32">Divisi</td>
    <td>:</td>
    <td><input type="text" name="divisi" size="30" value="<?=$data['divisi']?>" class="b1"><input type="hidden" name="npwp" value="<?=$data['npwp']?>"></td>
  </tr>
    <tr>
    <td height="32">Status</td>
    <td>:</td>
    <td>
	<select name="status" class="b1">
    <option value="<?=$data['status']?>"><?=$data['status']?></option>
    <option value="PROSES">PROSES</option>
    <option value="SELESAI">SELESAI</option>
	<option value="SEMENTARA">SEMENTARA</option>
	</select>
	</td>
  </tr>
  <tr>
    <td height="40"></td>
    <td>&nbsp;</td>
    <td><input type="submit" value="Update" class="btn btn-sm btn-warning">&nbsp;<input type="reset" value="Batal" class="btn btn-sm btn-danger" onClick="history.back()"></td>
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