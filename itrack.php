<?PHP
error_reporting (E_ALL ^ E_NOTICE); 

	require_once('filependukungitrack/libraries_dbase/AutoLoader.php');
	AutoLoader::addPath(array(
		'filependukungitrack/libraries_dbase/',
	));
	$id= $_GET['qr'];
	$db=new Database;
	$query="select * from aset where kode='$id'";
	$dataku=$db->toArray($query);
	echo $dataku[0][foto];
?>
<html>
<head>
<title>I-Track</title>
<link rel="icon" type="filependukungitrack/image/ico" href="">
<link rel="stylesheet" href="filependukungitrack/css/style.css" type="text/css" />
<style type="text/css">
</style>
</head>
<body>
<div id=headermodul><center><table id=tablemodul9>
<tr><td><img alt='No Foto' src='img/logo.bmp' height=90></td></tr>
 <tr><td>GALESONG GROUP</td></tr><tr><td>INVENTORY & ASSET TRACKER</td></tr></center></table></div>
             
         <div id=groupmodul1><center><table id=tablemodul>
               
                <tr><td class=cc>PERUSAHAAN</td>    <td class=cb><h3>:<?PHP echo $dataku[0][perusahaan];?></h3></td>
                <td rowspan=9><center><img alt='No Foto' src="upload/27.jpg" height=130 width=130 text-align: center></center></td></tr>
                <tr><td class=cc>DEPARTMENT</td class=cb><td class=cb><h3>: <?PHP echo $dataku[0][department];?></h3></td></tr>                 
                <tr><td class=cc>TAHUN PEROLEHAN</td>    <td class=cb><h3>: <?PHP echo $dataku[0][tahun];?></h3></td></tr>
                <tr><td class=cc>MEREK</td class=cb><td class=cb><h3>: <?PHP echo $dataku[0][merek];?></h3></td></tr>                 
                <tr><td class=cc>TYPE</td>    <td class=cb><h3>: <?PHP echo $dataku[0][type];?></h3></td></tr>
                <tr><td class=cc>NO ASSET</td class=cb><td class=cb><h3>: <?PHP echo $dataku[0][no_asset];?></h3></td></tr>                 
                <tr><td class=cc>PERSON IN CHARGE</td>    <td class=cb><h3>: <?PHP echo $dataku[0][pic];?></h3></td></tr>
                <tr><td class=cc>HISTORY</td class=cb><td class=cb><h3>: <?PHP echo $dataku[0][history];?></h3></td></tr>                 
                <tr><td class=cc>KETERANGAN</td>    <td class=cb><h3>: <?PHP echo $dataku[0][keterangan];?> </h3></td></tr>
                
                
              </table></center></div>
            
 </body>
 </html>
