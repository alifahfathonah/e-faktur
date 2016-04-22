<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>

</style>

</head>

<body> 
<div id="menu"><div id="isimenu"></div></div>
    <div id="content">
    <div id="isicontent">
<!-- CONTENT -->

		<div class="panel panel-default">
  
        <div class="panel-heading">ARSIP KELENGKAPAN KONTRAK</div>
        <div class="panel-body">
      
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
  <tr>
    <td width="3%" align="center"><strong>NO</strong></td>
    <td width="15%" align="center"><strong>NOMOR FAKTUR</strong></td>
    <td width="10%" align="center"><strong>TANGGAL</strong></td>
	<td width="10%" align="center"><strong>PENJUAL JASA</strong></td>
    <td width="6%" align="center"><strong>SSP</strong></td>
    <td width="10%" align="center"><strong>BUKTI POTONG</strong></td>
    <td width="12%" align="center"><strong>INVOICE</strong></td>
    <td width="12%" align="center"><strong>NOMINAL</strong></td>
	<td width="12%" align="center"><strong>DPP</strong></td>
	<td width="12%" align="center"><strong>PPN</strong></td>
	<td width="15%" align="center"><strong>DESCRIPTIPON</strong></td>
	<td width="10%" align="center"><strong>DIVISI</strong></td>
    <td width="20%" align="left"><strong>ACT</strong></td>
    </tr>

<?php
session_start();
	$tampil =mysql_query("
	SELECT faktur.id_lw,faktur.tanggal,faktur.kode,faktur.no_fak,faktur.keterangan,faktur.nominal,faktur.divisi,faktur.npwp,faktur.id_faktur,faktur.status,
	arsip.id_faktur,arsip.ssp,arsip.bupot,arsip.invoice,arsip.description,
	profile_lw.nama_lw,profile_lw.id_lw,
	profile.npwp 
	FROM profile,profile_lw,
	faktur LEFT JOIN arsip
	ON faktur.id_faktur=arsip.id_faktur WHERE profile.npwp=faktur.npwp AND faktur.id_lw=profile_lw.id_lw
	AND faktur.status!='SEMENTARA' AND profile.npwp='".$_SESSION['npwp']."' ORDER BY tanggal");	
	while($data = mysql_fetch_array($tampil))
	{
	$dpp=$data['nominal']*0.909090909;
	$ppn=$dpp*0.1;
	$pphpasal4=$dpp*0.02;
	$nominal=number_format($data[nominal],0,",",",");
	$nama_lw=($data[nama_lw]);
	?>
  <tr>
    <td align="center"><?php echo $no=$no+1;?></td>
    
    <td><?=$data['kode']?>.<?=$data['no_fak']?></td>
    <td align="center"><?=$data['tanggal']?></td>
	<td align="left">
	 <?php
    $nama_lw =$nama_lw;
    $pecah = explode(" ", $nama_lw);
    $dollar = chr(36);
    ?>
	<?php echo"$pecah[0]";?>&nbsp;<?php echo"$pecah[1]";?>&nbsp;<?php echo"$pecah[2]";?>
	</td>
    <td align="center">
     <?PHP if ($data['ssp']==SELESAI){
	echo '<font color="green"> '.$data ['ssp'].'</font>';
	}
	else if($data['ssp']==PROSES){
	echo '<font color="blue"> '.$data ['ssp'].'</font>';
	}
	else if($data['ssp']==BATAL){
	echo '<font color="red"> '.$data ['ssp'].'</font>';
	}
	else {
	echo '<font color="black"> '.$data ['ssp'].'</font>';
	}
	?> 
            
    </td>
    <td align="center">
    <?PHP if ($data['bupot']==SELESAI){
	echo '<font color="green"> '.$data ['bupot'].'</font>';
	}
	else if($data['bupot']==PROSES){
	echo '<font color="blue"> '.$data ['bupot'].'</font>';
	}
	else if($data['bupot']==BATAL){
	echo '<font color="red"> '.$data ['bupot'].'</font>';
	}
	else {
	echo '<font color="black"> '.$data ['bupot'].'</font>';
	}
	?> 
    </td>
    <td align="center">
    <?PHP if ($data['invoice']==SELESAI){
	echo '<font color="green"> '.$data ['invoice'].'</font>';
	}
	else if($data['invoice']==PROSES){
	echo '<font color="blue"> '.$data ['invoice'].'</font>';
	}
	else if($data['invoice']==BATAL){
	echo '<font color="red"> '.$data ['invoice'].'</font>';
	}
	else {
	echo '<font color="black"> '.$data ['invoice'].'</font>';
	}
	?>
    </td>
	<td width="12%" align="right"><? echo $nominal?></td>
	<td width="4%" align="right"><?php $dpp=number_format($dpp,0,",",",");?><? echo $dpp ?></td>
	<td width="8%" align="right"><?php $ppn=number_format($ppn,0,",",",");?><? echo $ppn ?></td>
	<td width="18%"><?=$data['description']?></td>
    <td align="center"><?=$data['divisi']?></td>
    <td>
    <a href="?r=arsip_edit&id_faktur=<?=$data['id_faktur']?>"><img src="images/b_edit.png" width="16" height="16" title="Edit data" /></a>&nbsp;<a href="faktur_print.php?id_faktur=<?=$data['id_faktur']?>" target="_blank"><img src="images/b_print.png" width="16" height="16" title="Cetak" /></a>
	</td>
  </tr>
    <?php }?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
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