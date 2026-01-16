<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $pdo = new PDO("mysql:host=localhost;dbname=gmoplus_mobil", 'gmoplus_mobiluser', 'gmoplus_mobiluser1234');
    
    echo "<h1>Aktif İlanlar ve Kategoriler</h1>";
    
    // Aktif ilanları listele
    $stmt = $pdo->query("
        SELECT l.ID, l.Category_ID, c.Key as category_key, c.Type, l.Status 
        FROM fl_listings l 
        LEFT JOIN fl_categories c ON l.Category_ID = c.ID 
        WHERE l.Status = 'active' 
        ORDER BY l.ID DESC 
        LIMIT 10
    ");
    
    $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h2>Son 10 Aktif İlan:</h2>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>Listing ID</th><th>Category ID</th><th>Category Key</th><th>Category Type</th><th>Status</th></tr>";
    
    foreach ($listings as $listing) {
        echo "<tr>";
        echo "<td>{$listing['ID']}</td>";
        echo "<td>{$listing['Category_ID']}</td>";
        echo "<td>{$listing['category_key']}</td>";
        echo "<td>{$listing['Type']}</td>";
        echo "<td>{$listing['Status']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    // Kategorileri listele
    echo "<h2>Mevcut Kategoriler:</h2>";
    $stmt = $pdo->query("SELECT ID, `Key`, Type, Status FROM fl_categories WHERE Status = 'active' ORDER BY ID");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>Category ID</th><th>Key</th><th>Type</th><th>Status</th></tr>";
    
    foreach ($categories as $category) {
        echo "<tr>";
        echo "<td>{$category['ID']}</td>";
        echo "<td>{$category['Key']}</td>";
        echo "<td>{$category['Type']}</td>";
        echo "<td>{$category['Status']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 