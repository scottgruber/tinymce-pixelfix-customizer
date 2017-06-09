<?php
   /*
   Plugin Name: TinyMCE Customizer by pixelfix
   Plugin URI: https://github.com/scottgruber/tinymce-pixelfix-customizer
   Description: A plugin to customize tinymce and add support for custom css, semantic html tags and css selectors. 
   Version: 1.0.0
   Author: Scott Gruber
   Author URI: https://scottgruber.me
   License: GPL2
   License URI: https://www.gnu.org/licenses/gpl-2.0.html
   */


/**
 * Apply styles to the visual editor
 */ 
add_filter('mce_css', 'pixelfix_mcekit_editor_style');
function pixelfix_mcekit_editor_style($url) {
 
    if ( !empty($url) )
        $url .= ',';
 
    // Retrieves the plugin directory URL
    // Change the path here if using different directories
    $url .= trailingslashit( plugin_dir_url(__FILE__) ) . 'tinymce-pixelfix-customizer.css';
 
    return $url;
}
 
/**
 * Add "Styles" drop-down
 */
add_filter( 'mce_buttons_2', 'pixelfix_mce_editor_buttons' );
 
function pixelfix_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
 
/**
 * Add styles/classes to the "Styles" drop-down
 */
add_filter( 'tiny_mce_before_init', 'pixelfix_mce_before_init' );
 
function pixelfix_mce_before_init( $settings ) {
 
    $style_formats = array(
        array(
            'title' => 'section', 
            'block' => 'section', 
            'classes' => 'section',
            'wrapper' => true
        ),
        array(
            'title' => 'figure', 
            'block' => 'figure',
            'wrapper' => true
        ),   
        array(
            'title' => 'figcaption', 
            'block' => 'figcaption',
            'wrapper' => true
        ),     
        array(
            'title' => 'Testimonial',
            'selector' => 'p',
            'classes' => 'testimonial',
        ),
        array(
            'title' => 'Warning Box',
            'block' => 'div',
            'classes' => 'warning box',
            'wrapper' => true
        ),
        array(
            'title' => 'Yellow Button',
            'block' => 'button',
            'classes' => 'btn btn-yellow',
            'exact' => true,
            'attributes' => array(
                'role' => 'button',
                'name' => 'button'
            )
        ),
        array(
            'title' => 'Blue Button',
            'block' => 'button',
            'classes' => 'btn btn-blue',
            'exact' => true,
            'attributes' => array(
                'role' => 'button',
                'name' => 'button'
            )
        ),
        array(
            'title' => 'Plain Button',
            'block' => 'button',
            'attributes' => array(
                'role' => 'button',
                'name' => 'button'
            )
        ),
        array(
            'title' => 'Red Uppercase Text',
            'inline' => 'span',
            'styles' => array(
                'color' => '#ff0000',
                'fontWeight' => 'bold',
                'textTransform' => 'uppercase'
            )
        )
    );
 
    $settings['style_formats'] = json_encode( $style_formats );
 
    return $settings;
 
}
 
/* Learn TinyMCE style format options at http://www.tinymce.com/wiki.php/Configuration:formats */
 

?>