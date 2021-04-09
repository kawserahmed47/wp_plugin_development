<?php 

/*
Plugin Name:KawserBlog Social Links
Plugin URI: http://kawser-ahmed.xyz
Description: Social link simple wp plugin development learning.
Author: Kawser Ahmed
Version: 1.0
Author URI: http://kawser-ahmed.xyz
*/


function kawserblog_social_links($atts, $content=null){

    ob_start();
    $attr =extract( shortcode_atts(array(
        'href' => '#',
        'sname' =>'facebook',
        'target'=> '_blank'
    ),$atts));

    return '<a  href="'.$href.'" target="'.$target.'" >'.$sname.'</a>'

    ?>

  
    
    <?php
    return ob_get_clean();
}

function kawserblog_social_init(){
    add_shortcode('social-links', 'kawserblog_social_links');

}

add_action( 'init', 'kawserblog_social_init');


?>

