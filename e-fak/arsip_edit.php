<?PHP
if($_POST){
$edit=mysql_query("UPDATE arsip SET   ssp='$_POST[ssp]',
									  bupot='$_POST[bupot]',
									  invoice='$_POST[invoice]',
									  description='$_POST[description]'
                                      WHERE id_faktur='$_POST[id_faktur]'");
mysql_query($edit,$koneksi);
echo"<meta http-equiv='refresh' content='0;url=?r=arsip_show'>";
}
?>

<html>
<head>
<title>ARSIP</title>
 <script language="JavaScript">
	function kirpesan() {
	
		if(document.formpesan.ssp.value=="") {
			alert("Kolom SSP belum diisi");
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
    <div id="isicontent">EDIT POSTING ARSIP<br>
<br>
<?php
$tampil =mysql_query("SELECT * FROM arsip WHERE id_faktur='$_GET[id_faktur]'");	
$data=mysql_fetch_array($tampil);
?>
<form action="" method="post" enctype="multipart/form-data" name='formpesan' onSubmit='return kirpesan()'>
<table width="80%" border="0">
  <tr>
    <td width="70" height="37">Nomor Faktur</td>
    <td width="14">:</td>
    <td width="588"><input type="text" value="<?=$data['id_faktur']?>" class="b1" disabled><input type="hidden" name="id_faktur" value="<?=$data['id_faktur']?>" class="b1"></td>
  </tr>
  <tr>
    <td height="32">Bukti Setor (SSP)</td>
    <td>:</td>
    <td>
    <select name="ssp" class="b1">
    <option value="<?=$data['ssp']?>"><?=$data['ssp']?></option>
    <option value="BATAL">BATAL</option>
    <option value="SELESAI">SELESAI</option>
    <option value="PROSES">PROSES</option>
    </select>
    </td>
  </tr>
  <tr>
    <td height="32">Bukti Potong PPH Ps 23</td>
    <td>:</td>
    <td>    
    <select name="bupot" class="b1">
    <option value="<?=$data['bupot']?>"><?=$data['bupot']?></option>
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
    <option value="<?=$data['invoice']?>"><?=$data['invoice']?></option>
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
    <input type="text" name="description" value="<?=$data['description']?>" class="b1" size="30">
    <input type="hidden" name="npwp" value="<?=$data['npwp']?>"></td>
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