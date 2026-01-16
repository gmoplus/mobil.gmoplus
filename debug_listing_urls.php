<?php
// Debug - Liste view'da listing URL'leri kontrol et

require_once 'includes/config.inc.php';

// Database connection
require_once RL_INC . 'classes/rlDb.class.php';
$rlDb = rlDb::getInstance();

// URL oluşturma fonksiyonları
function generateUrlSlug($title, $id) {
    $category_path = "hizmetler/tadilat-tamirat-boya/mantolama";
    
    $slug = strtolower($title);
    $slug = str_replace(' ', '-', $slug);
    $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
    $slug = preg_replace('/\-+/', '-', $slug);
    $slug = trim($slug, '-');
    
    return $category_path . '/' . $slug . '-' . $id . '.html';
}

function cleanTitle($title) {
    if (empty($title)) return $title;
    
    if (preg_match('/\{\|tr\|\}(.*?)\{\|\/tr\|\}/', $title, $matches)) {
        return trim($matches[1]);
    }
    
    $title = preg_replace('/\{\|[a-z]{2}\|\}/', '', $title);
    $title = preg_replace('/\{\|\/[a-z]{2}\|\}/', '', $title);
    $title = preg_replace('/\s+/', ' ', $title);
    
    return trim($title);
}

echo "<h2>Listing URLs Debug</h2>\n";

// İlk 5 submission'ı al
$submissions = $rlDb->fetch('*', array(), "ORDER BY `created_date` DESC LIMIT 5", null, 'quote_submissions');

echo "<p>Found " . count($submissions) . " submissions</p>\n";

foreach ($submissions as $submission) {
    echo "<hr>\n";
    echo "<h3>Submission ID: " . $submission['id'] . "</h3>\n";
    echo "<p>Listing ID: " . $submission['listing_id'] . "</p>\n";
    
    if ($submission['listing_id']) {
        // Listing bilgisini al
        $listing = $rlDb->fetch(array('title'), array('ID' => $submission['listing_id']), null, 1, 'listings');
        
        if ($listing) {
            echo "<p>Raw Listing Title: " . htmlspecialchars($listing['title']) . "</p>\n";
            
            $clean_title = cleanTitle($listing['title']);
            echo "<p>Clean Title: " . htmlspecialchars($clean_title) . "</p>\n";
            
            $url_slug = generateUrlSlug($clean_title, $submission['listing_id']);
            $full_url = 'https://mobil.gmoplus.com/' . $url_slug;
            
            echo "<p>Generated URL: <a href='" . $full_url . "' target='_blank'>" . $full_url . "</a></p>\n";
            
            // Controller'da nasıl atanacağını göster
            echo "<p><strong>Controller'da atanan değerler:</strong></p>\n";
            echo "<ul>\n";
            echo "<li>listing_title: " . htmlspecialchars($clean_title) . "</li>\n";
            echo "<li>listing_url: " . htmlspecialchars($full_url) . "</li>\n";
            echo "</ul>\n";
            
        } else {
            echo "<p>❌ Listing bulunamadı!</p>\n";
        }
    } else {
        echo "<p>❌ Listing ID yok!</p>\n";
    }
}

echo "<hr>\n";
echo "<p><strong>Template'te kullanılması gereken kod:</strong></p>\n";
echo "<pre>";
echo htmlspecialchars('{if $submission.listing_title}
    <a href="{$submission.listing_url}" target="_blank">
        {$submission.listing_title}
    </a>
{else}
    <a href="https://mobil.gmoplus.com/listing.php?id={$submission.listing_id}" target="_blank">
        İlan #{$submission.listing_id}
    </a>
{/if}');
echo "</pre>\n";

?> 