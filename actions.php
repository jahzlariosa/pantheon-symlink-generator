<?php include('header.php');?>
<?php 
// WordFence Symlinks
function createWordfenceSymlink() {
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

function createEtCacheSymlink() {
    system('ln -s ../../files/et-cache ../wp-content/et-cache');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated Divi et-cache Symlink</div>");
}

function createWpRocketSymlink() {
    system('rm -rf ../wp-content/cache');
    system('mkdir ../wp-content/cache');
    system('ln -s ../../../files/cache/wp-rocket ../wp-content/cache/wp-rocket');
    system('ln -s ../../../files/cache/busting ../wp-content/cache/busting');
    system('cp ./contents/advanced-cache.php ../wp-content/advanced-cache.php');
    system('mkdir ../../files/cache/wp-rocket');
    system('mkdir ../../files/cache/busting');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated WP Rocket Symlink</div>");
}

function createWebpExpressSymlink() {
    system('rm -rf ../wp-content/webp-expres');
    system('ln -s ../../files/webp-express ../wp-content/webp-express');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated WebP Express Symlink</div>");
}



    // If empty
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === '' ){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    // WordFence
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'wordfence' ){
        createWordfenceSymlink();
    }

    // Cache
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'cache' ){
        createCacheSymlink();
    }

    // Et-Cache
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'etcache' ){
        createEtCacheSymlink();
    }

    // WP Rocket
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'wprocket' ){
        createWpRocketSymlink();
    }

    // WebP Express
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'webpexpress' ){
        createWebpExpressSymlink();
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

<?php // WP Rocket
if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'wprocket' ){ ?>
    <div class="card col-lg-8 mx-auto p-2">
    <h5 class="text-danger">Note</h5>
        WP Rocket still requires some lines added to wp-config.php you can do it manually and push it back to dev and deploy to test and live.
    </div>
<?php } ?>


<div class="text-center mt-4">
    <button class="btn btn-secondary" onclick="history.go(-1);">Back </button>
</div>
<?php include('footer.php');?>