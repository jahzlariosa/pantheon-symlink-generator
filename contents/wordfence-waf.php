<?php 

// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.
// This file was the current value of auto_prepend_file during the Wordfence WAF installation

if (file_exists('/includes/prepend.php')) {
	include_once '/includes/prepend.php';
}

	define('WFWAF_DB_NAME', $_ENV['DB_NAME']);
	define('WFWAF_DB_USER', $_ENV['DB_USER']);
	define('WFWAF_DB_PASSWORD', $_ENV['DB_PASSWORD']);
	define('WFWAF_DB_HOST', $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT']);
	define('WFWAF_DB_CHARSET', 'utf8mb4');
	define('WFWAF_DB_COLLATE', '');
  // Note the table prefix should reflect your WordPress application's table prefix. Update accordingly.
	define('WFWAF_TABLE_PREFIX', 'wp_');

if (file_exists('../../code/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", '../../code/wp-content/wflogs/');
	include_once '../../code/wp-content/plugins/wordfence/waf/bootstrap.php';
}