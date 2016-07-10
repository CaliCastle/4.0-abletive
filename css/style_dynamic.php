<?php

$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));

if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} else {
    $root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
    if ( file_exists( $root.'/wp-load.php' ) ) {
        require_once( $root.'/wp-load.php' );
    }
}

header("Content-type: text/css; charset=utf-8");

include get_template_directory().'/css/style_dynamic.inc';
?>