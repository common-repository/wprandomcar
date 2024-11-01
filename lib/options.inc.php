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

// Option Array aktuallisieren
if( $_POST['ak-wprandomCar-submit'] ) {
	$akOptions['ak_kundennummer'] = stripslashes( $_POST['ak_kundennummer'] );
   	$akOptions['ak_footer'] = stripslashes( $_POST['ak_footer'] );
   	$akOptions['ak_image_content'] = stripslashes( $_POST['ak_image_content'] );
   	$akOptions['ak_inserate_content'] = stripslashes( $_POST['ak_inserate_content'] );
   	$akOptions['ak_image_footer'] = stripslashes( $_POST['ak_image_footer'] );
   	$akOptions['ak_inserate_footer'] = stripslashes( $_POST['ak_inserate_footer'] );
   	$akOptions['ak_widget_bilder'] = stripslashes( $_POST['ak_widget_bilder'] );
   	$akOptions['ak_widget_inserate'] = stripslashes( $_POST['ak_widget_inserate'] );
   	$akOptions['ak_titel'] = stripslashes( $_POST['ak_titel'] );
	update_option( 'ak_wpRandomCar_options', $akOptions ); // Option in der Datenbank updaten
}

// Option lesen
$wpRandomCarOptions = get_option( 'ak_wpRandomCar_options' );

?>
Um die Werbung anzuzeigen einfach an gew&uuml;nschter Stelle im Blog
[randomcar] eingeben.
<div class="wrap">
<h2>Allgemeine Einstellungen</h2>

<form name="formak" method="post" action="<?=$location ?>">
<input type="hidden" name="action" value="update" />
<table class="form-table">
	<tr valign="top">
		<td scope="row">Kundennummer</td>
		<td><input type="text" name="ak_kundennummer"
			value="<?php echo $wpRandomCarOptions['ak_kundennummer']; ?>" /></td>
	</tr>
	<tr valign="top">
		<td scope="row">Überschrift</td>
		<td><input type="text" name="ak_titel"
			value="<?php echo $wpRandomCarOptions['ak_titel']; ?>" /></td>
	</tr>
	<tr valign="top">
		<td scope="row">Im Footer anzeigen</td>
		<td><select name="ak_footer" style="width: 150px;">
			<option
			<?php if ($wpRandomCarOptions['ak_footer'] == 1) { echo "selected"; } ?>
				value="1">Ja</option>
			<option
			<?php if ($wpRandomCarOptions['ak_footer'] == 0) { echo "selected"; } ?>
				value="0">Nein</option>
		</select></td>
	</tr>
</table>

<h2>Content-Einstellungen</h2>
<table class="form-table">
	<tr valign="top">
		<td scope="row">Bilder anzeigen</td>
		<td><select name="ak_image_content" style="width: 150px;">
			<option
			<?php if ($wpRandomCarOptions['ak_image_content'] == 1) { echo "selected"; } ?>
				value="1">Ja</option>
			<option
			<?php if ($wpRandomCarOptions['ak_image_content'] == 0) { echo "selected"; } ?>
				value="0">Nein</option>
		</select></td>
	</tr>
	<tr valign="top">
		<td scope="row">Anzahl der Inserate f&uuml;r [randomcar]</td>
		<td><select name="ak_inserate_content" style="width: 150px;">
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 1) { echo "selected"; } ?>
				value="1">1</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 2) { echo "selected"; } ?>
				value="2">2</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 3) { echo "selected"; } ?>
				value="3">3</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 4) { echo "selected"; } ?>
				value="4">4</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 5) { echo "selected"; } ?>
				value="5">5</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 6) { echo "selected"; } ?>
				value="6">6</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 7) { echo "selected"; } ?>
				value="7">7</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 8) { echo "selected"; } ?>
				value="8">8</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 9) { echo "selected"; } ?>
				value="9">9</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_content'] == 10) { echo "selected"; } ?>
				value="10">10</option>
		</select></td>
	</tr>
</table>

<h2>Footereinstellungen</h2>
<table class="form-table">
	<tr valign="top">
		<td scope="row">Bilder anzeigen</td>
		<td><select name="ak_image_footer" style="width: 150px;">
			<option
			<?php if ($wpRandomCarOptions['ak_image_footer'] == 1) { echo "selected"; } ?>
				value="1">Ja</option>
			<option
			<?php if ($wpRandomCarOptions['ak_image_footer'] == 0) { echo "selected"; } ?>
				value="0">Nein</option>
		</select></td>
	</tr>
	<tr valign="top">
		<td scope="row">Anzahl der Inserate f&uuml;r den Footer</td>
		<td><select name="ak_inserate_footer" style="width: 150px;">
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 1) { echo "selected"; } ?>
				value="1">1</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 2) { echo "selected"; } ?>
				value="2">2</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 3) { echo "selected"; } ?>
				value="3">3</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 4) { echo "selected"; } ?>
				value="4">4</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 5) { echo "selected"; } ?>
				value="5">5</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 6) { echo "selected"; } ?>
				value="6">6</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 7) { echo "selected"; } ?>
				value="7">7</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 8) { echo "selected"; } ?>
				value="8">8</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 9) { echo "selected"; } ?>
				value="9">9</option>
			<option
			<?php if ($wpRandomCarOptions['ak_inserate_footer'] == 10) { echo "selected"; } ?>
				value="10">10</option>
		</select></td>
	</tr>
</table>

<h2>Widgeteinstellungen</h2>
<table class="form-table">
	<tr valign="top">
		<td scope="row">Bilder anzeigen</td>
		<td><select name="ak_widget_bilder" style="width: 150px;">
			<option
			<?php if ($wpRandomCarOptions['ak_widget_bilder'] == 1) { echo "selected"; } ?>
				value="1">Ja</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_bilder'] == 0) { echo "selected"; } ?>
				value="0">Nein</option>
		</select></td>
	</tr>

	<tr valign="top">
		<td scope="row">Anzahl der Inserate f&uuml;r den Footer</td>
		<td><select name="ak_widget_inserate" style="width: 150px;">
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 1) { echo "selected"; } ?>
				value="1">1</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 2) { echo "selected"; } ?>
				value="2">2</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 3) { echo "selected"; } ?>
				value="3">3</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 4) { echo "selected"; } ?>
				value="4">4</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 5) { echo "selected"; } ?>
				value="5">5</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 6) { echo "selected"; } ?>
				value="6">6</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 7) { echo "selected"; } ?>
				value="7">7</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 8) { echo "selected"; } ?>
				value="8">8</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 9) { echo "selected"; } ?>
				value="9">9</option>
			<option
			<?php if ($wpRandomCarOptions['ak_widget_inserate'] == 10) { echo "selected"; } ?>
				value="10">10</option>
		</select></td>
	</tr>
</table>
<input type="hidden" name="ak-wprandomCar-submit" id="ak-wprandomCar-submit" value="1" />
<p class="submit"><input type="submit" class="button-primary"
	value="<?php _e('Save Changes') ?>" /></p>
</form>
</div>