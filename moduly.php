<?php
// modul VITAJTE
	if (isset($_GET["src"]) && $_GET["src"] == "domov"){	
		include "".getMySystem()."moduly/domov/domov.php";
	}
// modul KONTAKT	
	elseif (isset($_GET["src"]) && $_GET["src"] == "kontakt_akcia"){	
		include "moduly/kontakt/kontakt.php";
	}
	
	//NOVINKY
	elseif (isset($_GET["src"]) && $_GET["src"] == "clanky/".$adresa_1."/".$adresa_2.""){	
	include "moduly/clanky/zobraz.php";
	}
	
	//PORTFOLIO
	elseif (isset($_GET["src"]) && $_GET["src"] == "portfolio"){	
		include "moduly/portfolio/portfolio.php";
	}
	
	elseif (isset($_GET["src"]) && $_GET["src"] == "portfolio/".$adresa_1.""){
		include "moduly/portfolio/zobraz.php";		
	}
	
	//VYVOJ
	elseif (isset($_GET["src"]) && $_GET["src"] == "vyvoj/".$adresa_1.""){	
	}

//GALÉRIA && GALÉRIA ALBUM
	elseif (isset($_GET["src"]) && $_GET["src"] == "galeria/".$adresa_1.""){	
	include "moduly/galeria/album.php";
	}
	
	else{
		$to = 'thomas.doubek@gmail.com';
    $subject = "Pokus o nepovolený prístup";
    $message = "Pouzivatel s IP adresou ".$ip." sa pokusil dostat na adresu ".$src_cesta." dna ".$datum." o ".$cas." s operacneho systemu ".$os.".";
    $from = $server2;
    $first_name = "Nepovoleny pristup";
   
    $headers = "Nepovoleny pristup - ".$ip."";
    mail ("$to", "$subject", "$message", "$headers");	
		//header ("Location: ".$server2."");
		//header ("Location: javascript:history.back(1)");
	/*	echo "<div class='nevyplnene_pole' style='text-align: left;'> 
		Bol zaznamenaný pokus o vstup na neexistujúcu adresu, alebo adresu, ktorá bola zakázaná.
		<br/>Protokol o chybe bol zaslaný na adresu administrátora.
		<br/><br/>
				<br/>Protokol o chybe bol zaslaný na adresu administrátora.
					<tr>
				<td>Vaša IP adresa:</td>
				<td>".$ip."</td>
			</tr>
		*/
		echo "<div class='nevyplnene_pole' style='text-align: left;'> 
		Redakčný systém <span style='color: #7dba14;'>Design.dnt</span> zachytil pokus o vstup na neexistujúcu url adresu. 
		Pravdepodobne nastala chyba pri presmerovaní.
		V prípade pochybností prosím kontaktuje administrátora.
		<br/><br/>
		<table style='width: 100%;'>
			<tr>
				<td>Kód chyby</td>
				<td>404</td>
			</tr>
			<tr>
				<td>Pokus o vstup na adresu:</td>
				<td><a href='".$protokol."".$src_cesta."'>".$src_cesta."</a></td>
			</tr>
			<tr>
				<td>Dátum pokusu o prístup:</td>
				<td>".$datum."</td>
			</tr>
			<tr>
				<td>Čas pokusu o prístup:</td>
				<td>".$cas."</td>
			</tr>
			<tr>
				<td>Operačný systém:</td>
				<td>".$os."</td>
			</tr>
		</table>
		<br/><br/>
		<a href=''>Chcem ísť odtiaľto preč</a>
		</div>";
	}
?>