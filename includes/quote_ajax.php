<?php

/******************************************************************************
 *  
 *  PROJECT: GMO Plus Mobil - Quote System AJAX Handler
 *  VERSION: 1.0.0
 *  LICENSE: GMO Plus Internal Use
 *  DOMAIN: mobil.gmoplus.com
 *  FILE: quote_ajax.php
 *  
 *  AJAX istekleri için handler
 *  
 ******************************************************************************/

// Security check
if (!defined('RL_DB_HOST')) {
    // Include Flynax configuration
    require_once dirname(__FILE__) . '/includes/config.inc.php';
    require_once RL_INC . 'control.inc.php';
}

// Load quote system
require_once RL_INC . 'classes/rlQuoteSystem.class.php';

header('Content-Type: application/json');

// CORS headers for development
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Initialize quote system
$quoteSystem = rlQuoteSystem::getInstance();

// Check if system is enabled
if (!$quoteSystem->isEnabled()) {
    echo json_encode(array(
        'success' => false,
        'error' => 'Teklif sistemi şu anda aktif değil'
    ));
    exit;
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

try {
    switch ($action) {
        
        case 'get_form':
            handleGetForm();
            break;
            
        case 'submit_quote':
            handleSubmitQuote();
            break;
            
        case 'check_availability':
            handleCheckAvailability();
            break;
            
        default:
            throw new Exception('Geçersiz işlem');
    }
    
} catch (Exception $e) {
    echo json_encode(array(
        'success' => false,
        'error' => $e->getMessage()
    ));
}

/**
 * Get quote form for listing
 */
function handleGetForm()
{
    global $quoteSystem;
    
    $listing_id = (int) ($_POST['listing_id'] ?? $_GET['listing_id'] ?? 0);
    
    if (!$listing_id) {
        throw new Exception('İlan ID gerekli');
    }
    
    // Get listing category
    $category = $quoteSystem->getListingCategory($listing_id);
    
    if (!$category) {
        throw new Exception('İlan bulunamadı');
    }
    
    // Get form for this category
    $form = $quoteSystem->getFormByCategory($category['category_key']);
    
    if (!$form) {
        echo json_encode(array(
            'success' => false,
            'error' => 'Bu kategori için teklif formu bulunmuyor'
        ));
        return;
    }
    
    // Return form data
    echo json_encode(array(
        'success' => true,
        'form' => array(
            'id' => $form['id'],
            'title' => $form['form_title'],
            'description' => $form['form_description'],
            'fields' => $form['fields']
        ),
        'category' => $category
    ));
}

/**
 * Submit quote request
 */
function handleSubmitQuote()
{
    global $quoteSystem;
    
    // Validate required data
    $required_fields = array('form_id', 'listing_id', 'requester_name', 'requester_email');
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("'{$field}' alanı zorunludur");
        }
    }
    
    // Prepare submission data
    $submission_data = array(
        'form_id' => (int) $_POST['form_id'],
        'listing_id' => (int) $_POST['listing_id'],
        'category_id' => (int) $_POST['category_id'],
        'requester_name' => trim($_POST['requester_name']),
        'requester_email' => trim($_POST['requester_email']),
        'requester_phone' => trim($_POST['requester_phone'] ?? ''),
        'form_data' => $_POST['form_data'] ?? array()
    );
    
    // Basic validation
    if (!filter_var($submission_data['requester_email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Geçerli bir email adresi girin');
    }
    
    // Check captcha if enabled
    if ($quoteSystem->getConfig('captcha_enabled', true)) {
        if (empty($_POST['captcha']) || $_POST['captcha'] !== $_SESSION['quote_captcha']) {
            throw new Exception('Güvenlik kodu yanlış');
        }
    }
    
    // Submit quote
    $result = $quoteSystem->submitQuote($submission_data);
    
    // Clear captcha
    unset($_SESSION['quote_captcha']);
    
    echo json_encode($result);
}

/**
 * Check if quote form is available for listing
 */
function handleCheckAvailability()
{
    global $quoteSystem;
    
    $listing_id = (int) ($_POST['listing_id'] ?? $_GET['listing_id'] ?? 0);
    
    if (!$listing_id) {
        throw new Exception('İlan ID gerekli');
    }
    
    $has_form = $quoteSystem->hasQuoteForm($listing_id);
    
    echo json_encode(array(
        'success' => true,
        'available' => $has_form
    ));
}

/**
 * Generate simple captcha
 */
function generateCaptcha()
{
    session_start();
    
    $code = rand(1000, 9999);
    $_SESSION['quote_captcha'] = $code;
    
    // Create simple image
    $image = imagecreate(80, 30);
    $background = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    
    imagestring($image, 5, 20, 8, $code, $text_color);
    
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
}

// Handle captcha generation
if (isset($_GET['captcha'])) {
    generateCaptcha();
    exit;
} 