<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<pre>";
echo "Table Structure Check\n";
echo "====================\n\n";

try {
    require_once 'includes/config.inc.php';
    require_once RL_INC . 'control.inc.php';
    
    echo "Database: " . RL_DBNAME . "\n";
    echo "Prefix: " . RL_DBPREFIX . "\n\n";
    
    // Get all tables with prefix
    echo "🔍 Tables with prefix 'fl_':\n";
    $tables = $rlDb->getAll("SHOW TABLES LIKE 'fl_%'");
    
    foreach ($tables as $table) {
        $table_name = array_values($table)[0];
        echo "   - $table_name\n";
    }
    
    // Check if listings table exists (maybe different name)
    echo "\n🔍 Looking for listing-related tables:\n";
    $listing_tables = $rlDb->getAll("SHOW TABLES LIKE '%listing%'");
    foreach ($listing_tables as $table) {
        $table_name = array_values($table)[0];
        echo "   - $table_name\n";
    }
    
    // Check if categories table exists
    echo "\n🔍 Looking for category-related tables:\n";
    $category_tables = $rlDb->getAll("SHOW TABLES LIKE '%categor%'");
    foreach ($category_tables as $table) {
        $table_name = array_values($table)[0];
        echo "   - $table_name\n";
    }
    
    // If listings table exists, show its structure
    $listings_table = RL_DBPREFIX . 'listings';
    $table_exists = $rlDb->getOne('COUNT(*)', array(), "SHOW TABLES LIKE '$listings_table'");
    
    if ($table_exists) {
        echo "\n📋 Structure of '$listings_table':\n";
        $columns = $rlDb->getAll("SHOW COLUMNS FROM `$listings_table`");
        foreach ($columns as $column) {
            echo "   - {$column['Field']} ({$column['Type']})\n";
        }
        
        // Sample data
        echo "\n📝 Sample data from '$listings_table':\n";
        $sample = $rlDb->getRow("SELECT * FROM `$listings_table` LIMIT 1");
        if ($sample) {
            foreach ($sample as $key => $value) {
                $display_value = strlen($value) > 50 ? substr($value, 0, 50) . '...' : $value;
                echo "   - $key: $display_value\n";
            }
        } else {
            echo "   (No data found)\n";
        }
    }
    
    // Check categories table
    $categories_table = RL_DBPREFIX . 'categories';
    $table_exists = $rlDb->getOne('COUNT(*)', array(), "SHOW TABLES LIKE '$categories_table'");
    
    if ($table_exists) {
        echo "\n📋 Structure of '$categories_table':\n";
        $columns = $rlDb->getAll("SHOW COLUMNS FROM `$categories_table`");
        foreach ($columns as $column) {
            echo "   - {$column['Field']} ({$column['Type']})\n";
        }
        
        // Sample data
        echo "\n📝 Sample data from '$categories_table':\n";
        $sample = $rlDb->getRow("SELECT * FROM `$categories_table` LIMIT 1");
        if ($sample) {
            foreach ($sample as $key => $value) {
                $display_value = strlen($value) > 50 ? substr($value, 0, 50) . '...' : $value;
                echo "   - $key: $display_value\n";
            }
        } else {
            echo "   (No data found)\n";
        }
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "</pre>"; 