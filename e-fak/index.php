<?php include'session.php';?>
<?php $r=htmlentities($_GET['r']); ?>
<?php include 'config/koneksi.php';?>
<?php
session_start();
$tampil=mysql_query("select * from profile where npwp='".$_SESSION['npwp']."'");	
$data=mysql_fetch_array($tampil);
?>
<html>
<head>
<title>e-Faktur Information Sistem</title>
<link href="css/ci_concept.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="images/icon.png" rel="shortcut icon">
<script src="ckeditor/ckeditor.js"></script>
<!--DATE PICTER -->
<link rel="stylesheet" href="jquery_ui/jquery-ui.css">
  <script src="jquery_ui/jquery-1.10.2.js"></script>
  <script src="jquery_ui/jquery-ui.js"></script>
   <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
<!--END DATE PICTER -->


<style>

</style>
</head>

<body>
<div id="header-wrap">
<div id="header1"><div id="isiheader1">
<ul>
<li><a class="menu" href="?r=welcome">Beranda</a></li>
<li><a class="menu" href="?r=faktur_show#footer">Pajak Keluaran</a></li>
<li><a class="menu" href="?r=faktur_show_tmp">Tmp Faktur</a></li>
<li><a class="menu" href="?r=arsip_show#footer">Arsip</a></li>
<li><a class="menu" href="?r=refrensi/profile_lw_show">Ref Lawan Trans</a></li>
<li><a class="menu" href="?r=refrensi/no_show">Ref No Faktur</a></li>
<li><a class="menu" href="?r=profile/profile_show">Profile</a></li>
<li><a class="menu" href="?r=cari">Cari</a></li>
<li><a class="menu" href="logout.php">Logout</a></li>
<div align="right" class="font_profile"><?=$data['nama_wp']?></div>
</ul>
</div></div>
</div>

<div id="header2"><div id="isiheader2">e-faktur
</div></div>


</div></div>
<!--CONTENT ADADI DALAM -->
    <?php
		$file="$r.php";
		$cek=strlen($r);
		if($cek>50 || !file_exists($file) || empty($r)){
		include ("welcome.php");
		}else{
		include ($file);
		}
		?>
       
        
    <div id="footer"><div id="isifooter"><div id="login"><a href="login"></a></div>
    &copy;hendri-dev 2013-<?php echo date('Y'); ?>&nbsp;All Right Reserved</div></div>
</body>
</html>