<?php

/**
 * AutoLoad
 */
class AutoLoad {

	public function load( $dir ) {

		if( empty( $dir ) ) return false;

		// Find within WP
		$dir = get_template_directory() . '/' . $dir;

		// If Dir
		if( is_dir( $dir ) ) :
			$include_files = scandir( $dir );
			$loaded = array();
			if( ! empty( $include_files ) ) :
				foreach( $include_files as $filename ) :

					// Get the location
					$file_loc = trailingslashit( $dir ) . $filename;

					// skip folders and other files that aren't .php
					if( ! $this->is_valid_file( $file_loc ) ) continue;

					// Load it
					require_once $file_loc;
					$loaded[] = $filename;

				endforeach;
			endif;

			return count( $loaded );

		elseif( is_file( $dir ) ):

			// load the file
			return $this->load_file( $dir );

		endif;

		return false;

	}

	private function load_file( $file ) {

		if( ! $this->is_valid_file( $file ) ) return false;

		require_once $file;

		return true;
	}

	private function is_valid_file( $file ) {

		// Check exists
		if( ! file_exists( $file ) ) return false;

		// Check type
		if( ! is_file( $file ) ) return false;

		// Check the extension
		if( strpos( $file, '.php' ) != strlen( $file ) - 4 ) return false;

		return true;

	}
}
