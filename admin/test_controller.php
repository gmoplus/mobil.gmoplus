<?php
// Simple Controller Test

// Include Flynax admin environment
define('AREA_ADMIN', 1);
define('ADMIN', 1);

// Include config
require_once '../includes/config.inc.php';

// Basic database test
echo "<h2>Admin Controller Debug</h2>";
echo "<p>DB Prefix: " . RL_DBPREFIX . "</p>";

try {
    // Test database connection using PDO
    $pdo = new PDO(
        "mysql:host=" . RL_DBHOST . ";port=" . RL_DBPORT . ";dbname=" . RL_DBNAME . ";charset=utf8",
        RL_DBUSER,
        RL_DBPASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p>✅ Database connection OK</p>";
    
    // Test quote submissions table
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM " . RL_DBPREFIX . "quote_submissions");
    $total = $stmt->fetch()['total'];
    echo "<p><strong>Total quote submissions:</strong> $total</p>";
    
    if ($total > 0) {
        // Get recent submissions
        $sql = "SELECT s.*, f.form_name 
                FROM " . RL_DBPREFIX . "quote_submissions s
                LEFT JOIN " . RL_DBPREFIX . "quote_forms f ON s.form_id = f.id
                ORDER BY s.created_date DESC 
                LIMIT 5";
        
        $stmt = $pdo->query($sql);
        $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<h3>Recent Submissions:</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Form Name</th><th>Requester</th><th>Email</th><th>Created</th></tr>";
        
        foreach ($submissions as $sub) {
            echo "<tr>";
            echo "<td>{$sub['id']}</td>";
            echo "<td>" . ($sub['form_name'] ?: 'Unknown') . "</td>";
            echo "<td>{$sub['requester_name']}</td>";
            echo "<td>{$sub['requester_email']}</td>";
            echo "<td>{$sub['created_date']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    // Test quote forms table  
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM " . RL_DBPREFIX . "quote_forms");
    $form_total = $stmt->fetch()['total'];
    echo "<p><strong>Total quote forms:</strong> $form_total</p>";
    
} catch (PDOException $e) {
    echo "<p>❌ Database Error: " . $e->getMessage() . "</p>";
}
?> 