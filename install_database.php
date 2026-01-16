<?php

/**
 * GMO Plus Mobil - Quote System Database Installation
 */

// Include Flynax config
require_once 'includes/config.inc.php';
require_once RL_INC . 'control.inc.php';

echo "<pre>";
echo "GMO Plus Mobil - Quote System Database Installation\n";
echo "===================================================\n\n";

try {
    // Read SQL file
    $sql_file = 'install_quote_system.sql';
    
    if (!file_exists($sql_file)) {
        throw new Exception("SQL file not found: $sql_file");
    }
    
    $sql_content = file_get_contents($sql_file);
    
    if (!$sql_content) {
        throw new Exception("Could not read SQL file");
    }
    
    echo "📖 Reading SQL file: $sql_file\n";
    
    // Replace database prefix
    $sql_content = str_replace('fl_', DB_PREFIX, $sql_content);
    
    // Split SQL into individual statements
    $statements = array_filter(
        array_map('trim', explode(';', $sql_content)),
        function($stmt) {
            return !empty($stmt) && !preg_match('/^--/', $stmt);
        }
    );
    
    echo "📝 Found " . count($statements) . " SQL statements\n\n";
    
    $success_count = 0;
    $error_count = 0;
    
    // Execute each statement
    foreach ($statements as $index => $statement) {
        if (empty(trim($statement))) continue;
        
        try {
            // Clean the statement
            $statement = trim($statement);
            
            // Skip comments
            if (strpos($statement, '--') === 0) continue;
            
            echo "Executing statement " . ($index + 1) . "... ";
            
            // Execute the statement
            $result = $rlDb->query($statement);
            
            if ($result) {
                echo "✅ Success\n";
                $success_count++;
            } else {
                echo "❌ Failed\n";
                $error_count++;
            }
            
        } catch (Exception $e) {
            echo "❌ Error: " . $e->getMessage() . "\n";
            $error_count++;
            
            // If it's a "table already exists" error, that's okay
            if (strpos($e->getMessage(), 'already exists') !== false) {
                echo "   (Table already exists - this is okay)\n";
                $success_count++;
                $error_count--;
            }
        }
    }
    
    echo "\n📊 Installation Summary:\n";
    echo "✅ Successful: $success_count\n";
    echo "❌ Errors: $error_count\n\n";
    
    // Verify installation
    echo "🔍 Verifying installation...\n";
    
    $tables = [
        'quote_forms' => 'Quote Forms',
        'quote_fields' => 'Quote Fields', 
        'quote_submissions' => 'Quote Submissions',
        'quote_config' => 'Quote Configuration'
    ];
    
    $all_ok = true;
    
    foreach ($tables as $table => $description) {
        try {
            $exists = $rlDb->getOne('COUNT(*)', array(), "SHOW TABLES LIKE '" . DB_PREFIX . $table . "'");
            if ($exists) {
                $count = $rlDb->getOne('COUNT(*)', array(), DB_PREFIX . $table);
                echo "✅ $description table exists ($count records)\n";
            } else {
                echo "❌ $description table missing\n";
                $all_ok = false;
            }
        } catch (Exception $e) {
            echo "❌ $description table error: " . $e->getMessage() . "\n";
            $all_ok = false;
        }
    }
    
    if ($all_ok) {
        echo "\n🎉 Installation completed successfully!\n";
        echo "\nNext steps:\n";
        echo "1. Run test_setup.php to add basic test data\n";
        echo "2. Test the quote system on listing pages\n";
        echo "\n<a href='test_setup.php'>🚀 Run Test Setup</a>\n";
    } else {
        echo "\n❌ Installation incomplete. Please check the errors above.\n";
    }
    
} catch (Exception $e) {
    echo "\n❌ Installation failed: " . $e->getMessage() . "\n";
    echo "Debug info:\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}

echo "</pre>"; 