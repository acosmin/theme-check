<?php
class ImageLicenseCheck implements themecheck {
	protected $error = array();

	function check( $php_files, $css_files, $other_files ) {
		$ret = true;
		global $data;

		$txt_files = array_filter( $other_files, function( $txt_file ) {
			$txt_file = strtolower( $txt_file );
			return ( '.txt' === substr( $txt_file, -4 ) || '.md' === substr( $txt_file, -3 ) );
		}, ARRAY_FILTER_USE_KEY );

		$txt_files = array_filter( $other_files, function( $txt_content, $txt_path ) use ( $txt_files ) {
			return array_key_exists( $txt_path, $txt_files );
		}, ARRAY_FILTER_USE_BOTH );

		$check_files = array_merge( $txt_files, $php_files );

		return $ret;
	}

	function getError() { return $this->error; }
}

$themechecks[] = new ImageLicenseCheck;