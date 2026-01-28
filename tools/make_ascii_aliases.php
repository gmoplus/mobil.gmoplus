<?php

/**
 * ASCII Alias Generator for files with encoding issues
 * Creates symlinks for files with mojibake/Turkish characters
 * Idempotent: Safe to run multiple times
 */

$dir = "/var/www/html/files";

// Check if already processed (marker file)
$markerFile = "/var/www/html/tmp/.ascii_aliases_done";
if (file_exists($markerFile)) {
    echo "ASCII aliases already generated. Skipping.\n";
    exit(0);
}

if (!is_dir($dir)) {
    echo "Files directory not found: $dir\n";
    exit(1);
}

$rii = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

function suspicious($s)
{
    return preg_match('/[ÃÄÂ�]/u', $s) || strpos($s, "\t") !== false || strpos($s, "\r") !== false;
}

function slugify($name)
{
    // Map both proper Turkish and common mojibake patterns
    $map = [
        // Proper Turkish characters
        "İ" => "i",
        "I" => "i",
        "ı" => "i",
        "Ş" => "s",
        "ş" => "s",
        "Ğ" => "g",
        "ğ" => "g",
        "Ü" => "u",
        "ü" => "u",
        "Ö" => "o",
        "ö" => "o",
        "Ç" => "c",
        "ç" => "c",
        // Mojibake patterns
        "Ä°" => "i",
        "Ä±" => "i",
        "ÅŸ" => "s",
        "ÄŸ" => "g",
        "Ã¼" => "u",
        "Ãœ" => "u",
        "Ã¶" => "o",
        "Ã–" => "o",
        "Ã§" => "c",
        "Ã‡" => "c",
        "â" => "",
        "�" => "",
        "Â" => "",
    ];
    $s = strtr($name, $map);
    $s = strtolower($s);
    $s = preg_replace('/\s+/', '-', $s);
    $s = preg_replace('/[^a-z0-9\.\-\_]/', '-', $s);
    $s = preg_replace('/-+/', '-', $s);
    $s = trim($s, '-');
    return $s ?: null;
}

$created = 0;
$skipped = 0;

foreach ($rii as $f) {
    if (!$f->isFile()) continue;
    $path = $f->getPathname();
    $base = $f->getBasename();

    if (!suspicious($base)) continue;

    $ext = pathinfo($base, PATHINFO_EXTENSION);
    $stem = pathinfo($base, PATHINFO_FILENAME);
    $slug = slugify($stem);

    if (!$slug) {
        $skipped++;
        continue;
    }

    $alias = $slug . ($ext ? "." . $ext : "");
    $aliasPath = $f->getPath() . "/" . $alias;

    // Skip if target already exists
    if (file_exists($aliasPath)) {
        $skipped++;
        continue;
    }

    // Create relative symlink
    $ok = @symlink($base, $aliasPath);
    if ($ok) {
        echo "SYMLINK: {$base} -> {$alias}\n";
        $created++;
    } else {
        echo "FAIL: {$base} -> {$alias}\n";
        $skipped++;
    }
}

// Create marker to prevent re-running
@mkdir(dirname($markerFile), 0777, true);
file_put_contents($markerFile, date('Y-m-d H:i:s') . " - Created: $created, Skipped: $skipped\n");

echo "Done. created={$created} skipped={$skipped}\n";
echo "Marker file created: $markerFile\n";
