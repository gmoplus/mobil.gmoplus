<?php

/**
 * GMO Plus Mobil - Quote System Quick Install
 */

// Database credentials
$host = 'localhost';
$username = 'gmoplus_mobiluser';
$password = 'gmoplus_mobiluser1234';
$database = 'gmoplus_mobil';

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Database connected successfully!\n";
    
    // Read SQL file
    $sql = file_get_contents('install_quote_system.sql');
    
    if (!$sql) {
        throw new Exception('SQL file not found!');
    }
    
    // Split SQL into individual statements
    $statements = array_filter(array_map('trim', explode(';', $sql)));
    
    $success_count = 0;
    $total_statements = count($statements);
    
    // Execute each statement
    foreach ($statements as $statement) {
        if (!empty($statement)) {
            try {
                $pdo->exec($statement);
                $success_count++;
                echo ".";
            } catch (PDOException $e) {
                // Ignore "table already exists" errors
                if (strpos($e->getMessage(), 'already exists') === false) {
                    echo "\nError executing statement: " . $e->getMessage() . "\n";
                    echo "Statement: " . substr($statement, 0, 100) . "...\n";
                }
            }
        }
    }
    
    echo "\n\nInstallation completed!\n";
    echo "Successfully executed: $success_count/$total_statements statements\n";
    
    // Test if tables exist
    $tables = ['fl_quote_forms', 'fl_quote_fields', 'fl_quote_submissions', 'fl_quote_config'];
    
    echo "\nVerifying tables:\n";
    foreach ($tables as $table) {
        $stmt = $pdo->query("SHOW TABLES LIKE '$table'");
        if ($stmt->rowCount() > 0) {
            echo "✓ $table - EXISTS\n";
        } else {
            echo "✗ $table - MISSING\n";
        }
    }
    
    // Check sample data
    echo "\nChecking sample data:\n";
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM fl_quote_forms");
    $count = $stmt->fetch()['count'];
    echo "Quote forms: $count\n";
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM fl_quote_fields");
    $count = $stmt->fetch()['count'];
    echo "Quote fields: $count\n";
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM fl_quote_config");
    $count = $stmt->fetch()['count'];
    echo "Quote config: $count\n";
    
    echo "\n✅ Quote system installation completed successfully!\n";
    echo "You can now test the system on your website.\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
} 