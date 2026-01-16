<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<pre>";
echo "Find Active Listing for Testing\n";
echo "==============================\n\n";

try {
    require_once 'includes/config.inc.php';
    require_once RL_INC . 'control.inc.php';
    require_once RL_INC . 'classes/rlQuoteSystem.class.php';
    
    echo "🔍 Looking for active listings...\n\n";
    
    // Find active listings
    $listings = $rlDb->getAll("
        SELECT l.ID, l.title, l.Category_ID, l.Status, c.Key as category_key 
        FROM fl_listings l 
        LEFT JOIN fl_categories c ON l.Category_ID = c.ID 
        WHERE l.Status = 'active' AND l.title != '' 
        LIMIT 10
    ");
    
    if ($listings) {
        echo "✅ Found " . count($listings) . " active listings:\n\n";
        
        $quoteSystem = rlQuoteSystem::getInstance();
        
        foreach ($listings as $listing) {
            echo "📋 Listing ID: {$listing['ID']}\n";
            echo "   Title: {$listing['title']}\n";
            echo "   Category: {$listing['category_key']} (ID: {$listing['Category_ID']})\n";
            echo "   Status: {$listing['Status']}\n";
            
            // Test quote availability
            if ($quoteSystem->hasQuoteForm($listing['ID'])) {
                echo "   ✅ Has quote form available\n";
                
                // Get category info
                $category = $quoteSystem->getListingCategory($listing['ID']);
                if ($category) {
                    echo "   📝 Category Key: {$category['category_key']}\n";
                }
            } else {
                echo "   ❌ No quote form available\n";
            }
            
            echo "   🔗 Test URL: http://mobil.gmoplus.com/quote_ajax.php?action=check_availability&listing_id={$listing['ID']}\n";
            echo "\n";
        }
        
        // Test the first listing
        if (!empty($listings)) {
            $first_listing = $listings[0];
            echo "🧪 Testing first listing (ID: {$first_listing['ID']}):\n";
            
            $category = $quoteSystem->getListingCategory($first_listing['ID']);
            if ($category) {
                echo "✅ Category lookup successful:\n";
                foreach ($category as $key => $value) {
                    echo "   $key: $value\n";
                }
                
                $form = $quoteSystem->getFormByCategory($category['category_key']);
                if ($form) {
                    echo "✅ Quote form found: {$form['form_name']}\n";
                    echo "   Fields: " . count($form['fields']) . "\n";
                } else {
                    echo "❌ No quote form found for category: {$category['category_key']}\n";
                    
                    // Try fallback
                    $fallback_form = $quoteSystem->getFormByCategory('hizmet');
                    if ($fallback_form) {
                        echo "✅ Fallback form available: {$fallback_form['form_name']}\n";
                    }
                }
            } else {
                echo "❌ Category lookup failed\n";
            }
        }
        
    } else {
        echo "❌ No active listings found\n";
        echo "Trying to find any listings...\n";
        
        $any_listings = $rlDb->getAll("
            SELECT l.ID, l.title, l.Category_ID, l.Status, c.Key as category_key 
            FROM fl_listings l 
            LEFT JOIN fl_categories c ON l.Category_ID = c.ID 
            LIMIT 5
        ");
        
        if ($any_listings) {
            echo "Found " . count($any_listings) . " listings (any status):\n";
            foreach ($any_listings as $listing) {
                echo "   ID: {$listing['ID']}, Status: {$listing['Status']}, Title: " . substr($listing['title'], 0, 50) . "\n";
            }
        }
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}

echo "</pre>"; 