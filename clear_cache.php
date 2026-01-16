<?php
// Clear Smarty cache
$directories = [
    'tmp/compile',
    'tmp/aCompile',
    'tmp/cache_936129538'
];

foreach ($directories as $dir) {
    if (is_dir($dir)) {
        $files = glob($dir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
                echo "Deleted: $file\n";
            }
        }
        echo "Cleared directory: $dir\n";
    }
}

// Clear any cache files matching pattern
$cachePatterns = [
    'tmp/cache_*'
];

foreach ($cachePatterns as $pattern) {
    $files = glob($pattern);
    foreach ($files as $file) {
        if (is_dir($file)) {
            $subFiles = glob($file . '/*');
            foreach ($subFiles as $subFile) {
                if (is_file($subFile)) {
                    unlink($subFile);
                    echo "Deleted: $subFile\n";
                }
            }
            rmdir($file);
            echo "Removed directory: $file\n";
        }
    }
}

echo "Cache clearing completed!\n";
?> 