<?php
if ($_POST){
session_start();
include'config/koneksi.php';
$npwp=$_POST['npwp'];
$pass=md5($_POST['password']);
$op = $_GET['op'];
if($op=="in"){
    $cek = mysql_query("SELECT * FROM profile WHERE npwp='$npwp' AND password='$pass' LIMIT 1");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);
        $_SESSION['npwp'] = $c['npwp'];
        $_SESSION['level'] = $c['level'];
        if($c['level']=="wp"){
            header("location:index.php");
        }
    }else{
        echo "<script type='text/javascript'>window.alert('NPWP dan password salah ! ')</script>";
    }
}else if($op=="out"){
    unset($_SESSION['npwp']);
    unset($_SESSION['level']);
    header("location:index.php");
}
}
?>

<html>
<head>
<title>E-faktur Login</title>
<link href="css/ci_concept.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="images/icon.png" rel="shortcut icon">
<style>

</style>
<SCRIPT LANGUAGE="JavaScript">

	function showDetails(bookURL){
	   window.open(bookURL,"bookDetails","width=650,height=500");
	}

</SCRIPT>
<script language="JavaScript">
	function kirpesan() {
	
		if(document.formpesan.npwp.value=="") {
			alert("Kolom Npwp belum diisi");
			return false;
		}
		if(document.formpesan.password.value=="") {
			alert("Kolom Password belum diisi");
			return false;
		}
		
		return true;
}
</script>
</head>

<body>
<div id="header-wrap">
<div id="header1"><div id="isiheader1">
</div></div>
</div>

<div id="header2"><div id="isiheader2">e-faktur</div></div>
</div></div>
<div id="menu"><div id="isimenu"></div></div>
    <div id="content">
    <div id="isicontent">
   <font class="judul">Login Account</font>
<br>
<br>
<form action="?op=in" method="post" enctype="multipart/form-data" name='formpesan' onSubmit='return kirpesan()'>
<table width="500" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="93">NPWP</td>
    <td width="19">:</td>
    <td width="202"><select name="npwp" class="b1">
    		<option value="">PILIH PROFILE WP</option>
       		<?php
			include'config/koneksi.php';
            $query = "select * from profile ";
            $hasil = mysql_query($query);
            while ($qtabel = mysql_fetch_assoc($hasil))
            {
                echo '<option value="'.$qtabel['npwp'].'">'.$qtabel['nama_wp'].'-'.$qtabel['kota'].'</option>';               
            }
            ?>
      </select></td>
  </tr>
  <tr>
    <td height="40">PASSWORD</td>
    <td>:</td>
    <td><input type="password" class="b1" name="password" size="30"></td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td>&nbsp;</td>
    <td><A class="paging" NAME="Dunia_Adin_Link" HREF=""
   onclick="return showDetails('register.php')">
      Belum punya akun ? Register
</A>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" class="btn btn-sm btn-warning" name="log" value="Login"></td>
  </tr>
</table>
</form>


    </div>
    	</div>
        </div>
       
        
    <div id="footer"><div id="isifooter"><div id="login"><a href="login"></a></div>
    &copy;hendri-dev 2013-<?php echo date('Y'); ?>&nbsp;All Right Reserved</div></div>
</body>
</html>