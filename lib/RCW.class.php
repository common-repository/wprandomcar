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

class RCW extends WP_Widget {
	/** constructor */
	function RCW() {
		parent::WP_Widget(false, $name = 'RandomCar Widget');
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		// Option lesen
		$wpRandomCarOptions = get_option( 'ak_wpRandomCar_options' );
			
		$output = "\r\n<!--START Widget of wpRandomCar Plugin: http://arzberger-krueger.de/wpRandomCar -->\r\n";
		$output .= "$before_widget\n";
		
		if ( $title ) 
            $output .= "$before_title ".'<a href="http://arzberger-krueger.de/wpRandomCar" title="wpRandomCar - mobile.de Plugin f&uuml;r Wordpress" class="author" style="color:fff;">RC</a>'." $title $after_title\n";
            
		$output .= getCar($wpRandomCarOptions['ak_widget_inserate'], $wpRandomCarOptions['ak_widget_bilder'], true);
		$output .= "\n$after_widget\n\n";
		$output .= "\r\n<!--END Widget of wpRandomCar Plugin: http://arzberger-krueger.de/wpRandomCar -->\r\n";
		echo $output;
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		$title = esc_attr($instance['title']);
		$fieldId = $this->get_field_id('title');
		
		$output = "<p>\n";
		$output .= "<label for='$fieldId'>Titel:</label>\n";
        $output .= "<input class='widefat' id='$fieldId' name='$fieldId' type='text' ";
        $output .= "value='$title'/>\n";
        $output .= "</p>\n\n";
		
        echo $output;
	}
}
?>