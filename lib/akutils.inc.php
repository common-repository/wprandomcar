<?php

/*
-------------------------------------------------------------------------------

    Copyright 2009 Arzberger&Krueger GbR  (email : wpplugins@arzberger-krueger.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

-------------------------------------------------------------------------------
 */

function getCar($ak_contentinserate = false, $ak_bilderanzeigen = false, $isWidget = false)
{
	// Option lesen
	$wpRandomCarOptions = get_option( 'ak_wpRandomCar_options' );
	//Variablen aus der Datenbank lesen
	$mobileNr = $wpRandomCarOptions['ak_kundennummer'];
	if(!$ak_contentinserate) $ak_contentinserate = $wpRandomCarOptions['ak_inserate_content'];
	$ak_footerinserate = $wpRandomCarOptions['ak_inserate_footer'];
	if(!$ak_bilderanzeigen) $ak_bilderanzeigen = $wpRandomCarOptions['ak_image_content'];

	$ak_url = "http://home.mobile.de/home/homepageAllVehiclesSearch.html?scopeId=AV&sortOption.sortBy=makeModelDescriptionSortField&sortOption.sortOrder=ASCENDING&makeModelVariant1.searchInFreetext=false&makeModelVariant2.searchInFreetext=false&makeModelVariant3.searchInFreetext=false&siteId=GERMANY&damageUnrepaired=ALSO_DAMAGE_UNREPAIRED&export=ALSO_EXPORT&grossPrice=true&customerIdsAsString=$mobileNr&lang=de&partnerHead=false&showZip=false&showModels=false&hideVehicleType=false&pageNumber=1";
	// nur ausführen wenn $mobileNr nicht 0
	if($wpRandomCarOptions['ak_kundennummer']) {
		$data = file_get_contents($ak_url);
	
		// Listenelemente herausfiltern
		$regex = '~<li class=\"clearfix\">(.*)</li>~siU';
		preg_match_all($regex, $data, $elements);
	
		// zufälligen Inhalt ausgeben
		$rand_keys = array_rand($elements['1'], $ak_contentinserate);
	
		// $rand_keys in array umwandeln wenn nur ein inserat angezeigt wird
		if (is_scalar($rand_keys)) $rand_keys = array(0 => $rand_keys);
	
		$rand = "\r\n<!-- Plugin: wpRandomCar Plugin URI:: http://arzberger-krueger.de/wprandomCar -->\r\n";
		$rand .= "<style type=\"text/css\">\r\n";
		$rand .= "<!--\r\n";
		$rand .= "@import \"wp-content/plugins/wprandomcar/css/randomcar.css\";\r\n";
		$rand .= "-->\r\n";
		$rand .= "</style>\r\n";
		$rand .= "<!-- Plugin: Random Car -->\r\n";
		$rand .= "<div id='randomCar'>\r\n";
		
		if(!$isWidget) {
			$rand .= "<h3><a href='http://arzberger-krueger.de/wpRandomCar' title='wpRandomCar - mobile.de Plugin f&uuml;r Wordpress' class='author'>RC</a>".$wpRandomCarOptions['ak_titel']."</h3>\r\n";
		}
		$rand .= "<ul class=\"random_car\">\r\n";
		
		for ($i = 0; $i < $ak_contentinserate; $i++) {
			$rand .= "<li>\r\n";
				
			$str = str_replace("Details", "", $elements['1'][$rand_keys[$i]]);
			$str = str_replace("\n", "", $str);
			$str = chop($str);
			
			if ($ak_bilderanzeigen == 1)
			{
				$rand .= strip_tags($str, '<div><h4><br><br /><h5><img>');
			} else {
				$rand .= strip_tags($str, '<div><h4><br><br /><h5>');
			}
			
			$rand .= "\r\n";
			$rand .= "</li>\r\n";
		}
	
		$rand .= "</ul>\r\n";
		$rand .= "<br style=\"clear:both;\" />\r\n";
		$rand .= "<a href='$ak_url' target='$mobileredirecttarget'>F&uuml;r weitere Angebote hier klicken.</a>\r\n";
		$rand .= "</div>\r\n";
		$rand .= "\r\n<!-- /Plugin: wpRandomCar Plugin URI:: http://arzberger-krueger.de/wprandomCar -->\r\n";
	}else {
		$rand = "<p style=\"color: red;\">wprandomCar Error: Bitte geben Sie Ihre Kundennummer in den Einstellungen an.</p>";
	}
	
	return $rand;
}

/**
 * Wrapper for getCarFooter
 * @deprecated
 * @return unknown_type
 */
function getCarFooter(){
    // Option lesen
	$wpRandomCarOptions = get_option( 'ak_wpRandomCar_options' );
	echo getCar($wpRandomCarOptions['ak_inserate_footer'], $wpRandomCarOptions['ak_image_footer']);
}

?>