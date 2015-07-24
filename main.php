<?php

global $actions;

$actions = array();

function add_action( $action_name, $function_name ) {
	if ( empty( $actions[$action_name] ) ) {
		$actions[$action_name] = array();
	}

	$actions[$action_name][] = $function_name;
}

function do_action( $action_name, $args  ) {
	if ( ! empty( $actions[$action_name] ) ) {
		foreach ( $actions[$action_name] as $function ) {
			call_user_func_array( $function, $args )
		}
	}
}

function main() {
	do_action( 'init' );
	do_action( 'wp_header' );
	do_action( 'wp_footer' );
}