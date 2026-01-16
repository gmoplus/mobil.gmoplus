<?php
// Debug Categories
include_once('includes/config.inc.php');
include_once('includes/control.inc.php');

echo "<h2>Categories Debug</h2>";

global $rlDb;

// Get all categories
$categories = $rlDb->fetch('*', null, 'ORDER BY `Level`, `Position`', null, 'categories');

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Key</th><th>Path</th><th>Level</th><th>Parent_ID</th><th>Type</th></tr>";

if ($categories) {
    foreach ($categories as $category) {
        echo "<tr>";
        echo "<td>{$category['ID']}</td>";
        echo "<td>{$category['Key']}</td>";
        echo "<td>{$category['Path']}</td>";
        echo "<td>{$category['Level']}</td>";
        echo "<td>{$category['Parent_ID']}</td>";
        echo "<td>{$category['Type']}</td>";
        echo "</tr>";
    }
}

echo "</table>";

echo "<h3>Lang Keys for Categories</h3>";

// Get category names from lang table
$lang_keys = $rlDb->fetch('*', array('Module' => 'common', 'Key' => 'LIKE %categories+name%'), null, null, 'lang_keys');

echo "<table border='1'>";
echo "<tr><th>Code</th><th>Key</th><th>Value</th></tr>";

if ($lang_keys) {
    foreach ($lang_keys as $key) {
        echo "<tr>";
        echo "<td>{$key['Code']}</td>";
        echo "<td>{$key['Key']}</td>";
        echo "<td>{$key['Value']}</td>";
        echo "</tr>";
    }
}

echo "</table>";
?> 