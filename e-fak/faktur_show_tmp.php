<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body> 
<!-- CONTENT FOR SEARCHING -->
<div id="menu"><div id="isimenu">
</div></div>
<!-- CONTENT END SEARCHING-->
    <div id="content">
    <div id="isicontent">
<!-- CONTENT -->
		<div class="panel panel-default">
        <div class="panel-heading">FAKTUR PAJAK KELUARAN&nbsp;&nbsp;<a class="paging" href="?r=faktur_entry">NEW</a></div>
        <div class="panel-body">
      
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover">
  <tr>
    <td width="2%" align="center"><strong>NO</strong></td>
    <td width="24%" align="center"><strong>PEMBELI BARANG/JASA KENA PAJAK</strong></td>
    <td width="16%" align="center"><strong>NO FAKTUR</strong></td>
    <td width="8%" align="center"><strong>TANGGAL</strong></td>
    <td width="8%" align="center"><strong>NOMINAL</strong></td>
    <td width="4%" align="center"><strong>DPP</strong></td>
	<td width="8%" align="center"><strong>PPN 10%</strong></td>
	<td width="8%" align="center"><strong>DIVISI</strong></td>
	<td width="13%" align="center"><strong>STATUS</strong></td>
    <td width="9%" align="center"><strong>ACT</strong></td>
    </tr>
	<?php
	$batas=15;
	$halaman=$_GET['halaman'];
	if (empty($halaman))
	{
	$posisi=0;
	$halaman=1;
	}
	else
	{
	$posisi=($halaman-1)*$batas;
	}
	session_start();
	$tampil =mysql_query("SELECT faktur.id_lw,faktur.tanggal,faktur.kode,faktur.no_fak,faktur.nominal,faktur.divisi,faktur.npwp,faktur.id_faktur,faktur.status,
	profile_lw.nama_lw,profile_lw.id_lw,
	profile.npwp
	FROM faktur,profile_lw,profile
	WHERE faktur.id_lw=profile_lw.id_lw AND profile.npwp=faktur.npwp AND profile.npwp='".$_SESSION['npwp']."' AND faktur.status='SEMENTARA'  ORDER BY tanggal, no_fak ASC LIMIT $posisi,$batas");	
	while($data = mysql_fetch_array($tampil))
	{
	$dpp=$data['nominal']*0.909090909;
	$ppn=$dpp*0.1;
	$nominal=number_format($data[nominal],0,",",",");
	$nama_lw=($data[nama_lw]);
	?>
	<tr>
    <td align="center"><?php echo $no=$no+1;?></td>
    <td>
    <?php
    $nama_lw =$nama_lw;
    $pecah = explode(" ", $nama_lw);
    $dollar = chr(36);
    ?>
	<?php echo"$pecah[0]";?>&nbsp;<?php echo"$pecah[1]";?>&nbsp;<?php echo"$pecah[2]";?>
    </td>
    <td><?=$data['kode']?>.<?=$data['no_fak']?></td>
    <td align="left"><?=$data['tanggal']?></td>
    <td align="right"><? echo $nominal?></td>
	<td width="4%" align="right"><?php $dpp=number_format($dpp,0,",",",");?><? echo $dpp ?></td>
	<td width="8%" align="right"><?php $ppn=number_format($ppn,0,",",",");?><? echo $ppn ?></td>
    <td align="center"><?=$data['divisi']?></td>
	<td align="center">
    <?php if ($data['status']==SELESAI){
	//pembuatan status atau ketrangan 
	echo '<font color="green"> '.$data ['status'].'</font>';
	}
	else {
	echo '<font color="blue"> '.$data ['status'].'</font>';
	}
	?>
    </td>
    <td align="left">
    <a href="?r=faktur_edit&id_faktur=<?=$data['id_faktur']?>"><img src="images/b_edit.png" width="16" height="16" title="Edit data" /></a>
    <a href="?r=arsip_entry&id_faktur=<?=$data['id_faktur']?>"><img src="images/b_home.png" width="16" height="16" title="Arsipkan" /></a>
    <a href="faktur_print.php?id_faktur=<?=$data['id_faktur']?>" target="_blank"><img src="images/b_print.png" width="16" height="16" title="Cetak" /></a>
	</td>
  </tr>
    <?php }?>
  <tr>
    <td colspan="9" align="center">
    <?PHP
	echo "Halaman :&nbsp;";
	$tampil2="select*from faktur WHERE npwp='".$_SESSION['npwp']."'";
	$hasil2=mysql_query ($tampil2);
	$jmldata=mysql_num_rows($hasil2);
	$jumhal=ceil($jmldata/$batas);
	for ($i=1;$i<=$jumhal;$i++)
	if ($i!=$halaman)
	{
	echo"<a class='paging' href=?r=faktur_show&halaman=$i>$i</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
	}
	else
	{
	echo"<b>$i</b>&nbsp;&nbsp;|&nbsp;&nbsp;";
	}
	?></td>
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