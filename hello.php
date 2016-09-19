<?php
/**
 * @package Hello_Dolly
 * @version 2.0
 */
/*
Plugin Name: Hello Dolly
Plugin URI: https://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page. This is included with initial downloads of WordPress as an example of how the core can be extended.
Author: Matt Mullenweg
Version: 2.0
Author URI: http://ma.tt/
Text domain: hello-dolly-translate
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = array(
		__( "Hello, Dolly" , "hello-dolly-translate" ),
		__( "Well, hello, Dolly" , "hello-dolly-translate" ),
		__( "It's so nice to have you back where you belong" , "hello-dolly-translate" ),
		__( "You're lookin' swell, Dolly" , "hello-dolly-translate" ),
		__( "I can tell, Dolly" , "hello-dolly-translate" ),
		__( "You're still glowin', you're still crowin" , "hello-dolly-translate" ),
		__( "You're still goin' strong" , "hello-dolly-translate" ),
		__( "We feel the room swayin" , "hello-dolly-translate" ),
		__( "While the band's playin" , "hello-dolly-translate" ),
		__( "One of your old favourite songs from way back when" , "hello-dolly-translate" ),
		__( "So, take her wrap, fellas" , "hello-dolly-translate" ),
		__( "Find her an empty lap, fellas" , "hello-dolly-translate" ),
		__( "Dolly'll never go away again" , "hello-dolly-translate" ),
		__( "Hello, Dolly" , "hello-dolly-translate" ),
		__( "Well, hello, Dolly" , "hello-dolly-translate" ),
		__( "It's so nice to have you back where you belong" , "hello-dolly-translate" ),
		__( "You're lookin' swell, Dolly" , "hello-dolly-translate" ),
		__( "I can tell, Dolly" , "hello-dolly-translate" ),
		__( "You're still glowin', you're still crowin'" , "hello-dolly-translate" ),
		__( "You're still goin' strong" , "hello-dolly-translate" ),
		__( "We feel the room swayin'" , "hello-dolly-translate" ),
		__( "While the band's playin'" , "hello-dolly-translate" ),
		__( "One of your old favourite songs from way back when" , "hello-dolly-translate" ),
		__( "Golly, gee, fellas" , "hello-dolly-translate" ),
		__( "Find her a vacant knee, fellas" , "hello-dolly-translate" ),
		__( "Dolly'll never go away" , "hello-dolly-translate" ),
		__( "Dolly'll never go away" , "hello-dolly-translate" ),
		__( "Dolly'll never go away again" , "hello-dolly-translate" ),
	);

	// Here we randomise all the lines
	shuffle($lyrics);

	return $lyrics[0];

}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	echo "<p id='dolly'>" . wptexturize ( $chosen ) . "</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

?>
