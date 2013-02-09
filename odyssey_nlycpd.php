<?php
/**
 * @package Odyssey nlyctpd
 */
/*
Plugin Name: Odyssey: never let YAPB change the publication date
Plugin URI: http://rataki.eu
Description: YAPB has the change publication with exif if possible boolean enabled by default. This plugin overwrites this value and sets it to false, no matter what.
Version: 0.1
Author: Pierre Bodilis
Author URI: http://rataki.eu
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

function odyssey_never_let_yapb_change_the_publication_date($image) {
    if(array_key_exists('exifdate', $_POST)) {
    	unset($_POST['exifdate']);
    }
}
add_action( 'yapb_image_upload', 'odyssey_never_let_yapb_change_the_publication_date' );

