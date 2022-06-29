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

    // Create Wordfence Symlink Targets
    system('mkdir ../../files/private');
    system('mkdir ../../files/private/wflogs');
    system('cp ./contents/wordfence-waf.php ../../../files/private/');
    system('cp ./contents/.user.ini ../../../files/private/');
}

// Any plugin/theme that needs wp-content/cache symlink
function createCacheSymlink() {
    system('mkdir ../wp-content/cache');
    system('ln -s ../../files/cache ../wp-content/cache');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated wp-content/cache symlink</div>");
}

// et-cache
function createEtCacheSymlink() {
    system('rm -rf ../wp-content/et-cache');
    system('ln -s ../../files/et-cache ../wp-content/et-cache');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated wp-content/et-cache Symlink</div>");
}

function createWpRocketSymlink() {
    system('rm -rf ../wp-content/cache');
    system('rm ../wp-content/advanced-cache.php');
    system('rm -rf ../wp-content/wp-rocket-config');

    // WP Rocket Create Symlinks
    system('ln -s ../../../files/cache ../wp-content/cache');
    system('ln -s ../../files/wp-rocket/wp-rocket-config ../wp-content/wp-rocket-config');
    system('ln -s ../../files/wp-rocket/advanced-cache.php ../wp-content/advanced-cache.php');


    // WP Rocket Targets
    system('mkdir ../../files/cache');
    system('mkdir ../../files/wp-rocket');
    system('mkdir ../../files/wp-rocket/wp-rocket-config');
    system('mkdir ../../files/cache/wp-rocket');
    system('mkdir ../../files/cache/busting');

    // WP Rocket wp-config.php insert
    $wp_rocket_config = "define( 'WP_CACHE', true );\n";    
    $file = file('../wp-config.php');
    $first_line = array_shift($file);
    array_unshift($file, $wp_rocket_config);
    array_unshift($file, $first_line);   
    $fp = fopen('../wp-config.php', 'w');
    fwrite($fp, implode($file));     
    fclose($fp);

    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated WP Rocket Symlink</div>");
}

function createWebpExpressSymlink() {
    system('rm -rf ../wp-content/webp-expres');
    system('mkdir ../../files/webp-express');
    system('ln -s ../../files/webp-express ../wp-content/webp-express');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated wp-content/webp-express Symlink</div>");
}

// languages
function createLanguagesSymlink() {
    system('rm -rf ../wp-content/languages');
    system('ln -s ../../files/languages ../wp-content/languages');
    echo ("<div class='mt-5 mx-auto text-center col-lg-8 alert alert-success' role='alert'>Generated wp-content/languages Symlink</div>");
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

    // Languages
    if (isset($_GET['generate_symlink']) && $_GET['generate_symlink'] === 'languages' ){
        createLanguagesSymlink();
    }
