<?php include('header.php');?>
<?php 
// WordFence Symlinks
function createWflogSymlink() {
    // Make sure to remove any incorrect symlinks
    system('rm -rf ../wp-content/wflogs');
    system('rm ../wordfence-waf.php');
    system('rm ../.user.ini');

    // Create the actual correct symlinks
    system('ln -s ../../files/private/wflogs ../wp-content/wflogs');
    system('ln -s ../files/private/wordfence-waf.php ../wordfence-waf.php');
    system('ln -s ../files/private/.user.ini ../.user.ini');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>WordFence Symlinks Generated</div>");
}

// Any plugin/theme that needs wp-content/cache symlink
function createCacheSymlink() {
    system('ln -s ../../files/cache ../wp-content/cache');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated wp-content/cache symlink</div>");
}

    // If empty
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === '' ){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    // WordFence
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'wordfence' ){
        createWflogSymlink();
    }

    // Cache
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'cache' ){
        createCacheSymlink();
    }


?>

<?php // WordFence
if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'wordfence' ){ ?>
<div class="card col-lg-8 mx-auto p-2">
<h5 class="text-danger">MUST DO</h5>
After generating the symlink create the file wordfence-waf.php with the following content and upload to files/private/ via SFTP
<hr>
<code><pre>
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
</pre></code>
Please read Pantheon documentation for more information if you experience any perfomance issues.
<a href="https://pantheon.io/docs/plugins-known-issues#wordfence" target="_blank">https://pantheon.io/docs/plugins-known-issues#wordfence</a>
</div>
</div>
<?php } ?>

<div class="text-center mt-4">
    <button class="btn btn-secondary" onclick="history.go(-1);">Back </button>
</div>
<?php include('footer.php');?>