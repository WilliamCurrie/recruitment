<?php

function formatNames($firstName, $surname) {
	$full_name = $firstName .= ' ';
	$full_name .= $surname;



	return $full_name;
}

function view($template, $data = null, $template_path = '', $output_buffer = false) {
	if ( $data && is_array( $data ) ) {
		extract( $data );
	}

	$template = __DIR__.'/resources/views/'.$template.'.php';
	if(!file_exists($template)){
		die('The view template could not be found');
	}
	if($output_buffer) {
		ob_start();
	}
	include_once $template;
	if($output_buffer) {
		$output = ob_get_contents(); // end output buffering
		ob_end_clean();
		return $output;
	}

	exit;

}

function get_config() {
	return require __DIR__ . '/../src/config/app.config.php';
}