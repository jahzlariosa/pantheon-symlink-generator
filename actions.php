<?php include('header.php'); ?>
<?php include('src/functions.php'); ?>

<?php // WordFence
if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'wordfence') { ?>
    <div class="card col-lg-8 mx-auto p-2 bg-dark">
        <h5 class="text-danger">Must Do</h5>
        <span class="text-white">After generating the symlink create the file wordfence-waf.php with the following content and upload to files/private/ via SFTP</span>

        <code class="bg-black p-3 mt-2 mb-2">
            <pre>
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
</pre>
        </code>
   
        <span class="text-white">Please consider visting the Pantheon documentation about Wordfence for more accurate informations</span>
        <a href="https://pantheon.io/docs/plugins-known-issues#wordfence" target="_blank">https://pantheon.io/docs/plugins-known-issues#wordfence</a>
    </div>
    </div>
<?php } ?>

<?php // WP Rocket
if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'wprocket') { ?>
    <div class="card col-lg-8 mx-auto p-2 bg-dark text-white">
        <h5 class="text-danger">Note</h5>
        <h6>We've edited wp-config.php and added as requried by WP-Rocket Plugin</h6>
        define( 'WP_CACHE', true );
    </div>
<?php } ?>

<?php // WP Rocket
if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'etcache') { ?>
    <div class="card col-lg-8 mx-auto p-2 bg-dark text-white">
        <h5 class="text-danger">Note</h5>
        <p>Please do not forget to SFTP into the dev/test/live environments navigate to files/ and make sure <span class="text-warning fw-bold">et-cache</span> directory exists. Please consider reading the Pantheon documentation regarding <a href="https://pantheon.io/docs/plugins-known-issues#divi-wordpress-theme--visual-page-builder" target="_blank" class="text-white underlined fw-bold">et-cache</a>.</p>
    </div>
<?php } ?>

<?php // WebP-express
if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'webpexpress') { ?>
    <div class="card col-lg-8 mx-auto p-2 bg-dark text-white">
        <h5 class="text-danger">Note</h5>
        <p>Please do not forget to SFTP into the dev/test/live environments navigate to files/ and make sure <span class="text-warning fw-bold">webp-express</span> directory exists. Please consider reading the Pantheon documentation regarding <a href="https://pantheon.io/docs/plugins-known-issues#webp-express" target="_blank" class="text-white underlined fw-bold">Webp Express</a>.</p>
    </div>
<?php } ?>

<?php // Cache
if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'cache') { ?>
    <div class="card col-lg-8 mx-auto p-2 bg-dark text-white">
        <h5 class="text-danger">Note</h5>
        <p>Please do not forget to SFTP into the dev/test/live environments navigate to files/ and make sure <span class="text-warning fw-bold">cache</span> directory exists.</p>
    </div>
<?php } ?>

<?php // WPML Languages
if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'languages') { ?>
    <div class="card col-lg-8 mx-auto p-2 bg-dark text-white">
        <h5 class="text-danger">Note</h5>
        <p>Please do not forget to SFTP into the dev/test/live environments navigate to files/ and make sure <span class="text-warning fw-bold">languages</span> directory exists. Please consider reading the Pantheon documentation regarding <a href="https://pantheon.io/docs/plugins-known-issues#wpml---the-wordpress-multilingual-plugin" target="_blank" class="text-white underlined fw-bold">WPML</a>.</p>
    </div>
<?php } ?>



<div class="text-center mt-4">
    <form action="/pantheon-symlink-generator">
        <button class="btn btn-secondary" type="submit">Back </button>
    </form>

</div>
<?php include('footer.php'); ?>