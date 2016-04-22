<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FAKTUR PAJAK</title>
<link href="images/icon.png" rel="shortcut icon">
<style>
body	{
	margin: 0px 0px 0px 0px;}
#isi_2	{
	width: 950px;
	padding: 5px;
	height: auto;
	border: #000 solid 0px;
	float: left;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	}
#isi	{
	width: 950px;
	padding: 5px;
	height: auto;
	border: #000 solid 1px;
	float: left;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	margin-left: 10px;}
.table1
{
border-collapse:collapse;
}
.table1
td {
padding-left: 4px;
padding-right: 4px;
padding-top: 1px;
padding-bottom: 1px;
border: 0px solid #000000;
color:#000000;
}
.table2
{
border-collapse:collapse;
}
.table2
td {
padding-left: 4px;
padding-right: 4px;
padding-top: 1px;
padding-bottom: 1px;
border: 1px solid #000000;
color:#000000;
}
.garis	{
	border: #000 1px solid;
	height: 1px;
}
</style>
</head>
<body>

<div id="isi_2">
<?php
include"config/koneksi.php";
$tampil =mysql_query("SELECT faktur.id_lw,faktur.tanggal,faktur.kode,faktur.no_fak,faktur.nominal,faktur.divisi,faktur.npwp,faktur.id_faktur,faktur.keterangan,
profile_lw.nama_lw,profile_lw.alamat_lw,profile_lw.npwp_lw,
profile.nama_wp,profile.alamat,profile.npwp,profile.kota,profile.nama,profile.jabatan
FROM faktur,profile_lw,profile
WHERE faktur.id_lw=profile_lw.id_lw AND profile.npwp=faktur.npwp AND id_faktur='$_GET[id_faktur]'");	
$data=mysql_fetch_array($tampil);
$dpp=$data['nominal']*0.909090909;
$dpp2=$data['nominal']*0.909090909;
$dpp3=$data['nominal']*0.909090909;
$ppn=$dpp*0.1;
$nominal=number_format($data[nominal],0,",",",");
$tanggal=($data[tanggal]);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="16%">&nbsp;</td>
    <td width="46%" align="right" valign="top">Lembar ke 1</td>
    <td width="1%" valign="top">:</td>
    <td width="37%">Untuk pembeli BKP/Penerima JKP sebagai bukti pajak masukan </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" valign="top">Lembar ke 2</td>
    <td valign="top">:</td>
    <td>Untuk penjual BKP/Penerima JKP sebagai bukti pajak keluaran</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" valign="top">Lembar ke 3</td>
    <td valign="top">:</td>
    <td>Arsip</td>
  </tr>
  <tr>
    <td colspan="4"><h2 align="center">FAKTUR PAJAK</h2></td>
    </tr>
</table></div>
<div id="isi">
Kode dan Nomor Seri Faktur Pajak  : <?=$data['kode']?>.<?=$data['no_fak']?>
<hr class="garis" />
Pengusaha Kena Pajak
<hr class="garis" />
<table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" height="22">Nama</td>
    <td width="3%">:</td>
    <td width="74%"><?=$data['nama_wp']?></td>
  </tr>
  <tr>
    <td height="24">Alamat</td>
    <td>:</td>
    <td><?=$data['alamat']?></td>
  </tr>
  <tr>
    <td height="24">N.P.W.P</td>
    <td>:</td>
    <td><?=$data['npwp']?></td>
  </tr>
  </table>
<hr class="garis" />
Pembeli Barang Kena Pajak / Penerima Jasa kena pajak
<hr class="garis" />
<table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" height="22">Nama</td>
    <td width="3%">:</td>
    <td width="74%"><?=$data['nama_lw']?></td>
  </tr>
  <tr>
    <td height="24">Alamat</td>
    <td>:</td>
    <td><?=$data['alamat_lw']?></td>
  </tr>
  <tr>
    <td height="24">N.P.W.P</td>
    <td>:</td>
    <td><?=$data['npwp_lw']?></td>
  </tr>
  </table>
<hr class="garis" />
<table class="table2" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="7%" height="89" align="center">Nomor Urut</td>
    <td width="59%" align="center">Nama barang kena pajak / Jasa kena Pajak</td>
    <td width="34%" align="center">Harga Jual/ Penggantian/Uang Muka / Termin <br />(Rp.)</td>
  </tr>
  <tr>
    <td height="233" valign="top" align="center"><p><br>1</td>
    <td valign="top"><p><?=$data['keterangan']?></td>
    <td align="right" valign="top"><p><br><?php $dpp=number_format($dpp,0,",",",");?><? echo $dpp ?></td>
  </tr>
  <tr>
    <td colspan="2">Harga Jual / Penggantian/uang muka / termin **)</td>
    <td align="right"><?php $dpp2=number_format($dpp2,0,",",",");?><? echo $dpp2 ?></td>
  </tr>
  <tr>
    <td colspan="2">Dikurangi Potongan Harga</td>
    <td align="right">-</td>
  </tr>
  <tr>
    <td colspan="2">Dikurangi uang muka yang telah diterima</td>
    <td align="right">-</td>
  </tr>
  <tr>
    <td colspan="2">Dasar Pengenaan Pajak</td>
    <td align="right"><?php $dpp3=number_format($dpp3,0,",",",");?><? echo $dpp3 ?></td>
  </tr>
  <tr>
    <td colspan="2">PPN = 10% Dasar Pengenaan Pajak</td>
    <td align="right"><?php $ppn=number_format($ppn,0,",",",");?><? echo $ppn ?></td>
  </tr>
</table>
Pajak penjualan atas barang mewah
<p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="147"><table width="70%" class="table2" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>Tarif</td>
    <td>DPP</td>
    <td>PPN BM</td>
  </tr>
  <tr>
    <td height="74">......... %<br />......... %<br />......... %<br />......... %<br /></td>
    <td>Rp..............<br />Rp..............<br />Rp..............<br />Rp..............<br /></td>
    <td>Rp..............<br />Rp..............<br />Rp..............<br />Rp..............<br /></td>
  </tr>
  <tr>
    <td colspan="2">Jumlah</td>
    <td>Rp..............</td>
  </tr>
</table></td>
    <td align="center"><?=$data['kota']?>,&nbsp; 
	<?php
    $tanggal =$tanggal;
    $pecah = explode("-", $tanggal);
    $dollar = chr(36);
    ?>
	<?php echo"$pecah[2]";?>-<?php echo"$pecah[1]";?>-<?php echo"$pecah[0]";?>
	<br /><br /><br /><br /><br /><br />
    <strong><?=$data['nama']?></strong><br />
    <?=$data['jabatan']?></td>
  </tr>
</table>
*)Coret yang tidak perlu

</div>
</body>
</html>