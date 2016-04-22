<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>

</style>

</head>

<body> 
<?php
include('cari.php');
?>
    <div id="content">
    <div id="isicontent">
<!-- CONTENT -->

		<div class="panel panel-default">
  
        <div class="panel-heading">HASIL PENCARIAN</div>
        <div class="panel-body">

      
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover">
  <tr>
    <td width="4%" align="center"><strong>NO</strong></td>
    <td width="27%" align="center"><strong>PEMBELI BARANG/JASA KENA PAJAK</strong></td>
    <td width="15%" align="center"><strong>NO FAKTUR</strong></td>
    <td width="11%" align="center"><strong>TANGGAL</strong></td>
    <td width="6%" align="center"><strong>NOMINAL</strong></td>
    <td width="7%" align="center"><strong>DPP</strong></td>
	<td width="12%" align="center"><strong>PPN 10%</strong></td>
	<td width="9%" align="center"><strong>DIVISI</strong></td>
    <td width="9%" align="center"><strong>ACT</strong></td>
    </tr>
	<?PHP
	$cari = trim($_POST['cari']);
	$tampil =mysql_query("SELECT faktur.id_lw,faktur.tanggal,faktur.kode,faktur.keterangan,faktur.no_fak,faktur.nominal,faktur.divisi,faktur.npwp,faktur.id_faktur,
	profile_lw.nama_lw,profile_lw.id_lw,
	profile.npwp
	FROM faktur,profile_lw,profile
	WHERE faktur.id_lw=profile_lw.id_lw AND profile.npwp=faktur.npwp AND faktur.keterangan LIKE '%$cari%' AND profile.npwp='".$_SESSION['npwp']."' ORDER BY tanggal,no_fak ASC");	
	while($data = mysql_fetch_array($tampil))
	{
	$dpp=$data['nominal']*0.909090909;
	$ppn=$dpp*0.1;
	$nominal=number_format($data[nominal],0,",",",");
	?>
<tr>
    <td align="center"><?php echo $no=$no+1;?></td>
    
    <td><?=$data['nama_lw']?></td>
    <td><?=$data['kode']?>.<?=$data['no_fak']?></td>
    <td align="left"><?=$data['tanggal']?></td>
    <td align="right"><? echo $nominal?></td>
	<td width="7%" align="right"><?php $dpp=number_format($dpp,0,",",",");?><? echo $dpp ?></td>
	<td width="12%" align="right"><?php $ppn=number_format($ppn,0,",",",");?><? echo $ppn ?></td>
    <td align="center"><?=$data['divisi']?></td>
    <td align="left">
    <a href="?r=faktur_edit&id_faktur=<?=$data['id_faktur']?>"><img src="images/b_edit.png" width="16" height="16" title="Edit data" /></a>&nbsp;
    <a href="?r=arsip_entry&id_faktur=<?=$data['id_faktur']?>"><img src="images/b_home.png" width="16" height="16" title="Arsipkan" />&nbsp;</a>
    <a href="faktur_print.php?id_faktur=<?=$data['id_faktur']?>" target="_blank"><img src="images/b_print.png" width="16" height="16" title="Cetak" /></a>
	</td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="9" align="center">
  </td>
    </tr>
	
</table>
<!--div content -->
 </div>
 </div>
 
 <!--div panel-->
       </div>
       </div>
</body>
</html>