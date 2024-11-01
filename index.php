<?php
/**
 * Plugin Name: Welcome Popup Box
 * Plugin URI:  https://profiles.wordpress.org/walexconcepts/
 * Description: Show welcome pop-up box on page. It is great-looking and responsive, and absolutely free!. 
 * Version:     1.0
 * Author:      Awodeyi Adewale Emmanuel
 * Author URI:  https://www.walexconcepts.com/
 * License:     GPLv2+
 */
if ( ! defined( 'ABSPATH' ) ) exit;
wp_enqueue_script('jquery'); 

 
 
function welcome_pop_up_box_install(){
define('WELCOME_POP_UP_BOX_PATH', __FILE__ . '/');
$installpath = explode('plugins', WELCOME_POP_UP_BOX_PATH); 
define('WELCOME_POP_UP_BOX_INSTALLATION_PATH', dirname($installpath[0]) . '/'); 
$path = plugin_dir_path( __FILE__ ) . 'system/welcome_pop_up_box.sql';
$sql = file_get_contents($path);
require_once( WELCOME_POP_UP_BOX_INSTALLATION_PATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

}
register_activation_hook( __FILE__, 'welcome_pop_up_box_install' );



function welcome_pop_up_box_data() {
	global $wpdb;
	$vartextpre = '<video controls="controls"  autoplay="autoplay" poster="https://izzumes.com/hotlink-ok/Promote_your_products.jpg" style="width:100%" title="Promote your products"><source src="https://izzumes.com/hotlink-ok/Promote_your_products.webm" type="video/webm" /></video>';
	$vartext=$wpdb->_real_escape($vartextpre);
	$wpdb->query( $wpdb->prepare( "INSERT INTO welcome_pop_up_box (intid, vartext) VALUES ( %d, %s)", 1, $vartext ) );
	
}
register_activation_hook( __FILE__, 'welcome_pop_up_box_data' );



function welcome_pop_up_box_uninstall() {
global $wpdb;
$wpdb->query( 'DROP TABLE IF EXISTS welcome_pop_up_box' );
}
register_uninstall_hook( __FILE__, 'welcome_pop_up_box_uninstall' );


function welcome_pop_up_box_header() {	 
?>
<script type="text/javascript">
function welcome_pop_up_box_initAd(){
jQuery(document).ready(function($) {   
		$(".modal").css("display","block");
		$('#empModalwelcome_pop_up').modal('show'); 
});   
}	
onload=welcome_pop_up_box_initAd;
</script>
<?php
}
add_action('wp_head', 'welcome_pop_up_box_header');



function welcome_pop_up_box_footer() {
global $wpdb;
$result = $wpdb->get_results($wpdb->prepare("SELECT * FROM welcome_pop_up_box"));
if($result){
foreach($result as $row){
	$vartext1 = stripslashes($row->vartext);
	}
}
require plugin_dir_path( __FILE__ ) . 'include/welcome_pop_up_box_form.php';	
}
add_action('wp_footer', 'welcome_pop_up_box_footer');



function welcome_pop_up_box_editor(){	
?>
<script type="text/javascript">
			var textarea = document.getElementById('vartext');
			sceditor.create(textarea, {
				format: 'xhtml',
				
			});

		</script>
<?php 
}



function welcome_pop_up_box_allowed_html() {
	$allowed_tags = array(
		'a' => array(
			'class' => array(),
			'href'  => array(),
			'rel'   => array(),
			'title' => array(),
		),
		'abbr' => array(
			'title' => array(),
		),
		'b' => array(),
		'blockquote' => array(
			'cite'  => array(),
		),
		'cite' => array(
			'title' => array(),
		),
		'code' => array(),
		'del' => array(
			'datetime' => array(),
			'title' => array(),
		),
		'dd' => array(),
		'div' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'dl' => array(),
		'dt' => array(),
		'em' => array(),
		'h1' => array(),
		'h2' => array(),
		'h3' => array(),
		'h4' => array(),
		'h5' => array(),
		'h6' => array(),
		'i' => array(),
		'img' => array(
			'alt'    => array(),
			'class'  => array(),
			'height' => array(),
			'src'    => array(),
			'width'  => array(),
			'style' => array(),
		),
		'li' => array(
			'class' => array(),
		),
		'ol' => array(
			'class' => array(),
		),
		'p' => array(
			'class' => array(),
		),
		'q' => array(
			'cite' => array(),
			'title' => array(),
		),
		'span' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'iframe' => array(
		'src'             => array(),
		'height'          => array(),
		'width'           => array(),
		'frameborder'     => array(),
		'allowfullscreen' => array(),
		'style' => array(),
		),
		'source' => array(
		'src'             => array(),
		'height'          => array(),
		'width'           => array(),
		'type'     => array(),
		'style' => array(),
		),
		'embed' => array(
		'src'             => array(),
		'height'          => array(),
		'width'           => array(),
		'type'     => array(),
		'name'     => array(),
		'autoplay'     => array(),
		'fullscreen' => array(),
		'style' => array(),
		),
		'video' => array(
		'controls'             => array(),
		'height'          => array(),
		'width'           => array(),
		'autoplay'     => array(),
		'poster'     => array(),
		'title' => array(),
		'style' => array(),
		),
		'table' => array(
		'bgcolor'             => array(),
		'cellpadding'          => array(),
		'width'           => array(),
		'border'     => array(),
		'align'     => array(),
		'cellspacing' => array(),
		'style' => array(),
		),
		'td' => array(
		'height'          => array(),
		'width'           => array(),
		'style' => array(),
		),
		'tr' => array(
		'height'          => array(),
		'width'           => array(),
		'style' => array(),
		),
		'th' => array(
		'height'          => array(),
		'width'           => array(),
		'style' => array(),
		),
		'input' => array(
		'class' => array(),
		'id'    => array(),
		'name'  => array(),
		'value' => array(),
		'type'  => array(),
		),
		'button' => array(
		'class' => array(),
		'id'    => array(),
		'name'  => array(),
		'value' => array(),
		'type'  => array(),
		),
		'select' => array(
		'class'  => array(),
		'id'     => array(),
		'name'   => array(),
		'value'  => array(),
		'type'   => array(),
		),
		'option' => array(
		'selected' => array(),
		),
		'strike' => array(),
		'strong' => array(),
		'ul' => array(
			'class' => array(),
		),
	);
	
	return $allowed_tags;
}




function welcome_pop_up_box_scripts(){		
wp_enqueue_style( 'welcome_pop_up_box_modal.css', plugins_url( 'css/welcome_pop_up_box_modal.css', __FILE__ ));
wp_enqueue_script('custom_pop_up_box_modal.js', plugins_url('js/custom_pop_up_box_modal.js', __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'welcome_pop_up_box_scripts' );


 



function welcome_pop_up_box_admin_menu() {
    add_menu_page( 'Welcome Popup Box', 'Welcome Popup Box', null, 'administrator_welcomebox', '', plugin_dir_url( __FILE__ ) . 'adminicon.png');
    add_submenu_page( 'administrator_welcomebox', 'Settings', 'Settings', 'manage_options', 'addnews_welcomebox', 'welcome_pop_up_box_addnews' );
	add_submenu_page( 'administrator_welcomebox', __( 'Help', 'administrator_welcomebox' ), __( 'Help', 'administrator_welcomebox' ), 'manage_options', 'help_welcomebox', 'welcome_pop_up_box_help');
	wp_enqueue_style( 'formstylewelcomebox', plugins_url( 'admin/css/welcome_pop_up_box_formstyle.css', __FILE__ ));
	wp_enqueue_script('sceditor.min.js', plugins_url('admin/js/sceditor.min.js', __FILE__ ));
	wp_enqueue_script('monocons.js', plugins_url('admin/js/monocons.js', __FILE__ ));
	wp_enqueue_script('bbcode.js', plugins_url('admin/js/bbcode.js', __FILE__ ));
	wp_enqueue_script('xhtml.js', plugins_url('admin/js/xhtml.js', __FILE__ ));
	wp_enqueue_style('default.min.css', plugins_url('admin/minified/themes/default.min.css', __FILE__ ));	

}
function welcome_pop_up_box_addnews(){
	global $wpdb;
	require plugin_dir_path( __FILE__ ) . 'admin/message/msg.inc.php';
	require plugin_dir_path( __FILE__ ) . 'admin/welcome_pop_up_box_form.php';

}
function welcome_pop_up_box_help(){
	require plugin_dir_path( __FILE__ ) . 'admin/welcome_pop_up_box_help.php';

}
add_action('admin_menu', 'welcome_pop_up_box_admin_menu');


function welcome_pop_up_box_settings_link( $links){
	$links[] = '<a href="admin.php?page=help_welcomebox">Help</a>' ;	
    $links[] = '<a target="_blank" href="https://walexconcepts.com/index.php?page=item&id=16">Go Premium!</a>' ;	
	return $links;
}
add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), 'welcome_pop_up_box_settings_link');

