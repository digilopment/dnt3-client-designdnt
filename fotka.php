<!-- 
Design.dnt, gallery (admin and user interface) by Tomáš Doubek, Janury 2014
php, MySQL, html5 (drag and drop upload), xhtml, JavaScript, Facebook SDK
 
-->			
<?php
//include "../design.dnt/statistika/statistika_script.php";
include "db.php";
	function mobile() {
    return preg_match("/(android|iPhone|iPod|iPad|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
//include "top.php";

//GET-y pre fotku a album
$get = $_GET["src"];

list($url_album, $url_fotka) = explode("/", $get);

if(isset($_GET['src']) && ($_GET['src'] !== "".$url_album."/".$url_fotka."")){
		header("Location: index.php?src=galeria/".$url_album."");
	}
elseif ($_GET['src'] == ""){
	header("Location: index.php?src=galeria");
}

//echo "$get";


//$url_album = $_GET["album"];
//$url_fotka = $adresa_2;
//$url_album = $adresa_1;

//pocet fotiek pre dany vyber
$fotiek_celkovo_result = mysql_query ("SELECT * FROM galeria_media WHERE url_album = '$url_album'");
$fotiek_celkovo = mysql_num_rows($fotiek_celkovo_result);

//aktualna fotka (pre pocet)
//$aktualna_fotka = "0"; //docasne
$aktualna_fotka_query = mysql_query("SELECT COUNT(DISTINCT id) AS id FROM galeria_media WHERE url_album = '$url_album'");
if (mysql_num_rows($aktualna_fotka_query ) > 0) {
while ($aktualna_fotka_row  = mysql_fetch_array($aktualna_fotka_query )) {
	$aktualna_fotka = $aktualna_fotka_row['id'];
	}
}

//vseobecne query pre fotku
$query = mysql_query("SELECT * FROM galeria_media WHERE url_fotka='".$url_fotka."' AND url_album='".$url_album."'") or die(mysql_error());
if (mysql_num_rows($query) > 0) {
while ($row = mysql_fetch_array($query)) {
	
// prva fotka
$prva_fotka_result = mysql_query("SELECT url_fotka FROM galeria_media WHERE url_album='".$url_album."'");
$prva_fotka = mysql_result ($prva_fotka_result, 0,'url_fotka');

// dalsia fotka
$dalsia_fotka_result = mysql_query("SELECT url_fotka FROM galeria_media WHERE url_album='".$url_album."' AND id>'".$row['id']."'LIMIT 0,1");
if (!$dalsia_fotka_result || !mysql_num_rows($dalsia_fotka_result)) {
$dalsia_fotka  = $prva_fotka;
}
while ($dalsia_fotka_row = mysql_fetch_array($dalsia_fotka_result)) {
	$dalsia_fotka = $dalsia_fotka_row['url_fotka'];
}

//posledna fotka
$zisti_poslednu_fotku_result = mysql_query ("SELECT MAX(id) FROM galeria_media WHERE url_album = '".$url_album."'");
while($row_2 = mysql_fetch_array($zisti_poslednu_fotku_result)){
	$zisti_poslednu_fotku = $row_2['MAX(id)'];
}
$posledna_fotka_result = mysql_query("SELECT url_fotka FROM galeria_media WHERE url_album='".$url_album."' AND id = '".$zisti_poslednu_fotku."'");
$posledna_fotka = mysql_result ($posledna_fotka_result, 0,'url_fotka');

//predosla fotka
$predosla_fotka_result = mysql_query("SELECT `url_fotka` FROM `galeria_media` WHERE `url_album`='".$url_album."' AND `id`<'".$row['id']."'");
if (!$predosla_fotka_result || !mysql_num_rows($predosla_fotka_result)) {
$predosla_fotka  = $posledna_fotka; 
}
while ($predosla_fotka_row = mysql_fetch_array($predosla_fotka_result)) {
	$predosla_fotka = $predosla_fotka_row['url_fotka'];
}
?>
<!-- nacita top fotky-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lte IE 7]>     <html xmlns="http://www.w3.org/1999/xhtml" lang="sk" xml:lang="sk"> <![endif]-->
<!--[if IE 8]>         <html xmlns="http://www.w3.org/1999/xhtml" lang="sk" xml:lang="sk"> <![endif]-->
<!--[if IE 9]>         <html xmlns="http://www.w3.org/1999/xhtml" lang="sk" xml:lang="sk"> <![endif]-->
<!--[if gt IE 9]><!--> <html xmlns="http://www.w3.org/1999/xhtml" lang="sk" xml:lang="sk"> <!--<![endif]-->

  <head>
  	<title>Fotogaleria | <?php echo "".$url_album."";?></title>
  	<meta http-equiv="content-type" content="text/html; charset=windows-1250" />
  	<?php
  
  	?>
  	<style type="text/css">
  		body{
  			background-color: #000000; 
  			margin: 10px 0 0 0;
  			}
  			
  			a{
  				color: #ffffff;
  				text-decoration: none;
  				font-family: "Arial Black";
  				font-size: 11pt;
  			}
  			
  			a:hover{
  				text-decoration: underline;
  			}
  			img{
  				border: none;
  				}
   	 </style>
<!-- funkcie pre prezerenie pomocou sipiek --> 
  	 <script type="text/javascript">   
				function exit(evt){
				if(evt.keyCode == 27){
				window.location.href="<?php echo "album.php?src=$url_album" ?>";			
					}
				}
				
				function predosla_fotka(evt){
				if(evt.keyCode == 37){
				window.location.href="<?php echo "fotka.php?src=$url_album/$predosla_fotka" ?>";				
					}
				}
				
				function dalsia_fotka(evt){
				if(evt.keyCode == 39){
				window.location.href="<?php echo "fotka.php?src=$url_album/$dalsia_fotka" ?>";				
					}
				}
		</script>
<!-- END off --> 
  		
  </head>
<body onkeypress="exit(event)" onkeyup="dalsia_fotka(event)" onkeydown="predosla_fotka(event)">
<!-- nacita top fotky END off-->
<div class="fotka">
<table align="center" width="" border="0">
	<tr>
		<td colspan="5" align="center" >
			<?php
			echo "<div style='color: #ffffff; font-weight: bold;'>";
			echo "".$row['poradie']."";
			echo " / ";
			echo "".$fotiek_celkovo."";
			echo "</div>";
			  ?>
		</td>
	</tr>
	<tr>
		<td colspan="5" align="center" width="670px" >
			<div class="obrazok">				
					<a href="fotka.php?src=<?php echo $url_album; ?>/<?php echo $predosla_fotka; ?>" 
						title="Predchádzajúca fotka - na prezeranie je možné použiť aj šípky">
						<?php
						if(!mobile())
							echo "<span style='position: absolute; height: 500px; width: 50%;'></span>";
						else 
							echo "<span style='position: absolute; height: 700px; width: 50%;'></span>";
						?>
					</a>
					
					<a href="fotka.php?src=<?php echo $url_album; ?>/<?php echo $dalsia_fotka;?>" 
						title="Ďalšia fotka - na prezeranie je možné použiť aj šípky">
							<?php
						if(!mobile())
						echo "<span style='position: absolute; right: 0px; height: 500px; width: 50%;'></span>";
						else 
						echo "<span style='position: absolute; right: 0px; height: 700px; width: 50%;'></span>";
						?>
					</a>

			<?php 
				echo "<a href='data/galeria/".$row['url_album']."/".$row['url_fotka'].".".$row['fotka_pripona']."' target='_blank'>";
				echo "<img  src='data/galeria/".$row['url_album']."/".$row['url_fotka'].".".$row['fotka_pripona']."' alt='".$row['url_album']."' ";
				if(!mobile()){
				echo "height='500px' />";
				}
				else {
				echo "height='700px' />";
				}
				echo "</a>";
			?>
			</div>			
		</td>
	</tr>
	<?php if(!mobile()){ ?>
	<tr>
		<td style="text-align: right; height: 50px;">
				<a href="fotka.php?src=<?php echo $url_album; ?>/<?php echo $prva_fotka;?>"><img src="img/ikony/first.png" title="Skok na prvú fotku" alt='' /></a>
		</td>
			<td style="text-align: right; width: 60px;">
				<a href="fotka.php?src=<?php echo $url_album; ?>/<?php echo $predosla_fotka;?>"><img src="img/ikony/back.png" title="Predchádzajúca fotka - na prezeranie je možné použiť aj šípky" alt='' /></a>
		</td>
		<td style="text-align: right;">
			<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2F<?php echo $server_src;?>%2Ffotka.php%3Fsrc%3D<?php echo $url_album; ?>/<?php echo $url_fotka;?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" ></iframe>
		<!--<?php
			 echo "<a href=\"http://www.facebook.com/sharer.php?u=".$server2."data/galeria/".$row['url_album']."/".$row['url_fotka']."\" target=\"_blank\">
			 <img src='img/ikony/share.png' alt='' height='30px' title='Zdielať na Facebooku' />
			 </a>";
			 ?> -->
		</td>
		<td style="text-align: left; width: 60px;">
      <a href="fotka.php?src=<?php echo $url_album; ?>/<?php echo $dalsia_fotka; ?>">
      	<img src='img/ikony/next.png' title='Ďalšia fotka - na prezeranie je možné použiť aj šípky' alt='Ďalšia fotka' />
       </a>
		</td>
		<td style="text-align: left;">
			<div class="fotka_sipky">
				<a href="fotka.php?src=<?php echo $url_album; ?>/<?php echo $posledna_fotka;?>">
					<img src="img/ikony/last.png" title="Posledná fotka" alt='' />
				</a>
			</div>		
		</td>
	</tr>
	<tr>
		<td colspan="5" style="text-align: center;">
			<a href="<?php echo $server2; ?>galeria/<?php echo $url_album; ?>" title="Späť na <?php echo $url_album; ?>">
			<!--	<img src="img/ikony/nahlad.png" /> -->
			Späť na tento album
			</a>	
				<?php 
				for($i = 0; $i<=40; $i++){
				 echo "&nbsp;"; 
				 }
				?>
			<a href="<?php echo $server2; ?>galeria" title="Späť na albumy">
			<!--	<img src="img/ikony/nahlad.png" /> -->
			Späť na albumy
			</a>	
			</td>
		</tr>
	<?php } ?>
</table>
<?php
if(mobile()){
?>
<a href="<?php echo $server2; ?>galeria/<?php echo $url_album; ?>" title="Späť na <?php $url_album; ?>">
				<img src="img/ikony/tento_album.png" width="45%" alt="Späť na <?php echo $url_album; ?>"/>
			</a>		
			<?php 
				for($i = 0; $i<=10; $i++){
				 echo "&nbsp;"; 
				 }
			?>
				<a href="<?php echo $server2; ?>galeria" title="Späť na albumy">
				<img src="img/ikony/vsetky_albumy.png" width="45%" alt="Späť na albumy" />
			</a>	
			<div style="color: #ffffff; text-align: center; margin: 200px 0 0 0; font-size: 22pt;">
	Kliknutím na pravú stranu fotky prezeráte album vpred.
	<br/>Kliknutím na ľavú stranu fotky prezeráte album spätne.
</div>
<?php
}
?>
</div>

 <?php
	  }
	}
//include "bottom.php";
?>
<!-- nacita bottom fotky -->
</body>
</html>