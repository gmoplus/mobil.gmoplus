<?php

define('AREA_ADMIN', 1);
$config = array();

// Simple test without complex includes
echo "<h1>Quote System Test</h1>";

// Check if file exists
$controller_file = 'controllers/quote_management.inc.php';
if (file_exists($controller_file)) {
    echo "<p>✓ Controller file exists</p>";
} else {
    echo "<p>✗ Controller file missing</p>";
    exit;
}

// Check if class file exists
$class_file = '../includes/classes/rlQuoteSystem.class.php';
if (file_exists($class_file)) {
    echo "<p>✓ Quote system class exists</p>";
} else {
    echo "<p>✗ Quote system class missing</p>";
    exit;
}

// Check if template exists
$template_file = 'tpl/controllers/quote_management.tpl';
if (file_exists($template_file)) {
    echo "<p>✓ Template file exists</p>";
} else {
    echo "<p>✗ Template file missing</p>";
}

echo "<p>All files present. Controller might have PHP errors.</p>";
echo "<a href='index.php?controller=quote_management'>Try Quote Management</a>";

?> 