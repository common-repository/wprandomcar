<?php
/*
 Plugin Name: wpRandomCar
 Plugin URI: http://www.arzberger-krueger.de/wpRandomCar
 Description: Zeigt zufaellige Inserate von mobile.de
 Version: 1.0.1
 Author: Tom Hohlefeld
 CoAuthor: Matthias Mann
 Author URI: http://arzberger-krueger.de/
 
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

require_once ('lib/RCW.class.php');
require_once ('lib/akutils.inc.php');

add_action('widgets_init', create_function('', 'return register_widget("RCW");'));
add_action('admin_menu', 'ak_add_pages');
add_shortcode('randomcar','shortcode_randomcar');

// Option lesen
$wpRandomCarOptions = get_option( 'ak_wpRandomCar_options' );
if ($wpRandomCarOptions['ak_footer'] == 1) {
	add_action('wp_footer', 'getCarFooter');
}

// action function for options page
function ak_add_pages() {
	// Add a new submenu under Options:
	add_options_page('Random Car', 'Random Car', 'administrator',
                                    'RandomCar', 'ak_options_page');
}

// mt_options_page() displays the page content for the Options submenu
function ak_options_page() {
	echo "<h2>Random Car Konfiguration</h2>";
	include("lib/options.inc.php");
}

function shortcode_randomcar( $atts = array()) {
	return getCar();
}

	// Funktion die beim aktivieren des Plugins aufgerufen werden soll
function ak_wpRandomCar_plugin_aktivieren() {
	// Option hinzufügen
	add_option( 
		'ak_wpRandomCar_options', // Key der Option
			array( // Ein Array um mehrere Werte zu speichern
				'ak_kundennummer' 		=> '',
				'ak_footer' 			=> '0',
				'ak_image_content' 		=> '1',
				'ak_inserate_content' 	=> '2',
				'ak_image_footer' 		=> '1',
				'ak_inserate_footer' 	=> '2',
				'ak_widget_bilder' 		=> '1',
				'ak_widget_inserate' 	=> '1',
				'ak_titel' 				=> 'Unsere Angebote'
    		)
  	);
}
	
// Die aktivieren/deaktivieren Funktionen registrieren
add_action( 'activate_'.plugin_basename(__FILE__),   'ak_wpRandomCar_plugin_aktivieren' );

// wird noch integriert
// add_action( 'deactivate_'.plugin_basename(__FILE__), 'ak_wpRandomCar_plugin_deaktivieren' );
?>
