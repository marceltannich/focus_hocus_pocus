<?php
/**
 * @package focus_hocus_pocus
 * @version 1.0
 */
/*
Plugin Name: Focus - Hocus Pocus
Plugin URI: https://wordpress.org/plugins/focus-hocus-pocus
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Thijs van Leer from Focus: Hocus Pocus. When activated you will randomly see a lyric from <cite>Hocus Pocus</cite> in the upper right of your admin screen on every page.
Author: Tannich Marcel
Version: 1.0
Author URI: http://tannich.com
*/

function focus_hocus_pocus() {
	/** These are the lyrics to Focus - Hocus Pocus */
	$lyrics = "Yodeadodoyodeadodoyodeadodoyodeadodo
yodeadodoyodeadodoyo-bab-baaaaa
Ahhhhhh-aaahhhh-aaaaaa-aaaaAAA!
Ohhhhhh-ooohhh-oooooo-oooOOO!

Yodeadodoyodeadodoyodeadodoyodeadodo
yodeadodoyodeadodoyo-bab-baaaaa
Ahhhhhh-aaahhhh-aaaaaa-aaaaAAA!
Ohhhhhh-ooohhh-oooooo-oooOOO!

umdub-adaoh-segel-ungucur-ungetu-hungetur-hupreyu
undubea-unpedurl-humpelilly-luptodoro-licktetor-ulumpadero
umbader-lickatine-lupator-lackatera
batickatheplalera
theblumpalumpadera
ho?
ho ho ha haaaa!

Yodeadodoyodeadodoyodeadodoyodeadodo
yodeadodoyodeadodoyo-bab-baaaaa
Ahhhhhh-aaahhhh-aaaaaa-aaaaAAA!
Ohhhhhh-ooohhh-oooooo-oooOOO!

Bom bom bom bom
Bom bom bom
Bom bom bom bom bom bom bom
Bom bom bom
Bom bom bom
Bom bom bom bom bom bom
Bac bac bac bac bac backaaaaa!
Yeeeeha!

ba um um um um um
ba um um um um um
ba oooohhboooobooboboboooo!

Yodeadodoyodeadodoyodeadodoyodeadodo
yodeadodoyodeadodoyo-bab-baaaaa
Ahhhhhh-aaahhhh-aaaaaa-aaaaAAA!
Ohhhhhh-ooohhh-oooooo-oooOOO!
Yeaah! Whoooo!";

	// Split the lyrics into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function focus() {
	$chosen = focus_hocus_pocus();
	echo "<p id='focus'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'focus' );

// We need some CSS to position the paragraph
function focus_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#focus {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'focus_css' );

?>
