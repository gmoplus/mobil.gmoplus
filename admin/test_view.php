<?php
// Test view page

echo "<h2>View Test</h2>";
echo "<p>ID: " . ($_GET['id'] ?? 'NO ID') . "</p>";

if (isset($_GET['id'])) {
    echo "<p><a href='index.php?controller=quote_management&action=view&id=" . $_GET['id'] . "'>Test View Link</a></p>";
}

echo "<p><a href='index.php?controller=quote_management'>Back to List</a></p>";
?> 