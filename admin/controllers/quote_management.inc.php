<?php

/******************************************************************************
 *  
 *  PROJECT: GMO Plus Mobil - Quote Management Admin
 *  VERSION: 1.0.0
 *  LICENSE: GMO Plus Internal Use
 *  DOMAIN: mobil.gmoplus.com
 *  
 *  Admin paneli için teklif yönetim modülü
 *  
 ******************************************************************************/

// Check admin access
if (!defined('ADMIN')) {
    exit('Access denied');
}

// Base URL fix - Flynax admin panelinde base URL tanımlı değil
$base_url = 'https://mobil.gmoplus.com/';

// Debug output başlığında
// error_log("Quote management controller loaded");

// Function to generate URL slug
function generateUrlSlug($title, $id) {
    // Bu örnekte kategori yolunu sabit tutuyoruz
    // Gerçek sistemde kategori tablosundan çekilebilir
    $category_path = "hizmetler/tadilat-tamirat-boya/mantolama";
    
    // Title'ı URL-friendly hale getir
    $slug = strtolower($title);
    $slug = str_replace(' ', '-', $slug);
    $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
    $slug = preg_replace('/\-+/', '-', $slug);
    $slug = trim($slug, '-');
    
    return $category_path . '/' . $slug . '-' . $id . '.html';
}

// Function to clean multilingual title tags
function cleanTitle($title) {
    if (empty($title)) return $title;
    
    // İlk olarak Türkçe içeriği bulup çıkartalım
    if (preg_match('/\{\|tr\|\}(.*?)\{\|\/tr\|\}/', $title, $matches)) {
        return trim($matches[1]);
    }
    
    // Türkçe bulunamazsa tüm dil tag'lerini temizle
    $title = preg_replace('/\{\|[a-z]{2}\|\}/', '', $title);
    $title = preg_replace('/\{\|\/[a-z]{2}\|\}/', '', $title);
    
    // Birden fazla boşlukları tek boşluğa çevir
    $title = preg_replace('/\s+/', ' ', $title);
    
    return trim($title);
}

// Function to translate field names to Turkish
function translateFieldName($field_key) {
    $translations = array(
        // Nakliye alanları
        'room_count' => 'Oda Sayısı',
        'old_house_access' => 'Eski Ev Erişimi',
        'new_house_access' => 'Yeni Ev Erişimi',
        'packing_help' => 'Paketleme Yardımı',
        'insurance' => 'Sigorta',
        'additional_info' => 'Ek Bilgiler',
        'old_address_city' => 'Eski Adres - İl',
        'old_address_district' => 'Eski Adres - İlçe',
        'old_address_neighborhood' => 'Eski Adres - Mahalle',
        'new_address_city' => 'Yeni Adres - İl',
        'new_address_district' => 'Yeni Adres - İlçe',
        'new_address_neighborhood' => 'Yeni Adres - Mahalle',
        'moving_time' => 'Taşınma Zamanı',
        'moving_date' => 'Taşınma Tarihi',
        'moving_time_hour' => 'Taşınma Saati',
        // Temizlik alanları
        'house_size' => 'Ev Büyüklüğü',
        'bathroom_count' => 'Banyo Sayısı',
        'cleaning_hours' => 'Temizlik Saati',
        'cleaning_frequency' => 'Temizlik Sıklığı',
        'pets' => 'Evcil Hayvan',
        'special_notes' => 'Özel Notlar',
        'address_city' => 'Şehir',
        'address_district' => 'İlçe',
        'address_neighborhood' => 'Mahalle',
        'address_details' => 'Adres Detayları',
        'cleaning_date' => 'Temizlik Tarihi',
        // Uluslararası nakliye alanları
        'transport_type' => 'Nakliyat Türü',
        'from_country' => 'Hangi Ülkeden',
        'to_country' => 'Hangi Ülkeye',
        'cargo_volume' => 'Eşya Hacmi (m³)',
        'package_volume' => 'Gönderi Hacmi',
        'package_weight' => 'Ağırlık',
        'cargo_to_country' => 'Gönderilecek Ülke',
        'cargo_from_country' => 'Gönderen Ülke',
        'cargo_type' => 'Kargo Tipi',
        'cargo_notes' => 'Kargo Notları',
        'logistics_details' => 'Lojistik Detayları',
        'international_cargo_details' => 'Uluslararası Kargo Detayları',
        'service_city' => 'Hizmet Şehri',
        'service_district' => 'Hizmet İlçesi',
        'service_neighborhood' => 'Hizmet Mahallesi',
        'when_needed' => 'Ne Zaman',
        'specific_date' => 'Belirli Tarih',
        // Ortak alanlar
        'full_name' => 'Ad Soyad',
        'phone' => 'Telefon',
        'email' => 'Email',
        'whatsapp_contact' => 'WhatsApp İletişimi',
        'details' => 'Detaylar'
    );
    
    return isset($translations[$field_key]) ? $translations[$field_key] : ucfirst(str_replace('_', ' ', $field_key));
}

// Function to translate field values to Turkish
function translateFieldValue($value) {
    $translations = array(
        // Nakliye değerleri
        '1+1' => '1+1', '2+1' => '2+1', '3+1' => '3+1', '4+1' => '4+1', '5+1' => '5+1',
        'bigger' => 'Daha büyük', 'few_items' => 'Sadece birkaç eşya',
        'ground_floor' => 'Giriş katında', 'basement' => 'Zemin altında',
        'stairs_1_3' => 'Merdiven 1-3 kat', 'stairs_4_plus' => 'Merdiven 4+ kat',
        'building_elevator' => 'Bina asansörü', 'cargo_elevator' => 'Yük asansörü',
        'modular_elevator' => 'Modüler asansör', 'all_packing' => 'Tüm paketleme',
        'furniture_only' => 'Sadece mobilya', 'no_packing' => 'Paketleme yok',
        '20k' => '20.000 TL', '50k' => '50.000 TL', '100k' => '100.000 TL',
        'within_3_weeks' => '3 hafta içinde', 'within_2_months' => '2 ay içinde',
        'within_6_months' => '6 ay içinde', 'just_checking' => 'Sadece fiyat bakıyorum',
        // Temizlik değerleri
        '1+0' => '1+0', '1' => '1', '2' => '2', '3' => '3', '4' => '4+',
        'weekly' => 'Haftalık', 'biweekly' => '2 Haftada 1', 'once' => 'Tek Sefer',
        'none' => 'Hayır', 'dog' => 'Köpek var', 'cat' => 'Kedi var', 'both' => 'Köpek ve kedi var',
        // Uluslararası nakliye değerleri
        'house_to_house' => 'Uluslararası evden eve nakliyat', 'cargo' => 'Yurtdışı kargo',
        'vehicle_transport' => 'Uluslararası araç taşıma', 'logistics' => 'Uluslararası lojistik',
        'turkey' => 'Türkiye', 'germany' => 'Almanya', 'netherlands' => 'Hollanda',
        'france' => 'Fransa', 'belgium' => 'Belçika', 'usa' => 'A.B.D.',
        'uk' => 'İngiltere', 'austria' => 'Avusturya', 'switzerland' => 'İsviçre',
        'kktc' => 'K.K.T.C.', 'uae' => 'Birleşik Arap Emirlikleri', 'russia' => 'Rusya',
        'italy' => 'İtalya', 'canada' => 'Kanada', 'montenegro' => 'Karadağ',
        'sweden' => 'İsveç', 'azerbaijan' => 'Azerbaycan',
        '5_or_less' => '5 veya daha az', '80_or_more' => '80 veya daha fazla',
        'very_small' => '20 x 10 x 5 cm veya daha az', 'small' => '30 x 20 x 10 cm',
        'medium' => '40 x 25 x 10 cm', 'large' => '50 x 27 x 27 cm',
        'xl' => '50 x 40 x 40 cm', 'xxl' => '70 x 40 x 40 cm',
        'xxxl' => '80 x 60 x 60 cm', 'huge' => '100 x 80 x 80 cm',
        '1m3' => '1 m³', '2m3' => '2 m³', '3m3' => '3 m³', '4m3' => '4 m³', '5m3_plus' => '5 m³ veya daha fazla',
        '0_1kg' => '0.1 kg', '0_5kg' => '0.5 kg', '1kg' => '1 kg', '5kg' => '5 kg',
        '10kg' => '10 kg', '20kg' => '20 kg', '50kg' => '50 kg', '100kg' => '100 kg',
        '150kg_plus' => '150 kg veya daha fazla',
        'personal' => 'Özel kargo', 'commercial' => 'Ticari kargo', 'other' => 'Diğer',
        // Ortak değerler
        'no' => 'Hayır', 'yes' => 'Evet'
    );
    
    return isset($translations[$value]) ? $translations[$value] : $value;
}

// Load quote system
require_once RL_INC . 'classes/rlQuoteSystem.class.php';
$quoteSystem = rlQuoteSystem::getInstance();

$page_info['name'] = 'quote_management';
$page_info['title'] = 'Teklif Talepleri Yönetimi';

// Handle actions
$action = $_GET['action'] ?? '';

// Process POST request for editing
if ($_POST && isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    try {
        // Update basic submission data
        $update_data = array();
        if (isset($_POST['requester_name'])) $update_data['requester_name'] = $_POST['requester_name'];
        if (isset($_POST['requester_email'])) $update_data['requester_email'] = $_POST['requester_email'];
        if (isset($_POST['requester_phone'])) $update_data['requester_phone'] = $_POST['requester_phone'];
        if (isset($_POST['status'])) $update_data['status'] = $_POST['status'];
        if (isset($_POST['admin_notes'])) $update_data['admin_notes'] = $_POST['admin_notes'];
        
        if (!empty($update_data)) {
            // SQL query ile güncelleme - PHP addslashes
            $set_parts = array();
            foreach ($update_data as $field => $value) {
                $set_parts[] = "`" . $field . "` = '" . addslashes($value) . "'";
            }
            $set_clause = implode(', ', $set_parts);
            $rlDb->query("UPDATE `" . RL_DBPREFIX . "quote_submissions` SET " . $set_clause . " WHERE `id` = " . $id);
        }
        
        // Update form data if provided
        if (isset($_POST['form_data']) && is_array($_POST['form_data'])) {
            // Filter out empty values and preserve existing structure
            $filtered_form_data = array();
            foreach ($_POST['form_data'] as $key => $value) {
                if ($value !== '') {
                    $filtered_form_data[$key] = $value;
                }
            }
            
            if (!empty($filtered_form_data)) {
                $form_data_json = json_encode($filtered_form_data, JSON_UNESCAPED_UNICODE);
                $escaped_json = addslashes($form_data_json);
                $rlDb->query("UPDATE `" . RL_DBPREFIX . "quote_submissions` SET `form_data` = '" . $escaped_json . "' WHERE `id` = " . $id);
            }
        }
        
        $rlSmarty->assign('success_message', 'Teklif başarıyla güncellendi!');
        
    } catch (Exception $e) {
        error_log("Quote update error: " . $e->getMessage());
        $rlSmarty->assign('error_message', 'Güncelleme hatası: ' . $e->getMessage());
    }
}

switch ($action) {
    case 'view':
        $page_info['name'] = 'quote_view_submission';
        $page_info['title'] = 'Teklif Detayları';
        
        $submission_id = (int) $_GET['id'];
        
        if ($submission_id) {
            $submission = $rlDb->getRow("SELECT * FROM `" . RL_DBPREFIX . "quote_submissions` WHERE `id` = " . $submission_id);
            
            if ($submission) {
                // Get form
                if ($submission['form_id']) {
                    $form = $rlDb->getRow("SELECT * FROM `" . RL_DBPREFIX . "quote_forms` WHERE `id` = " . $submission['form_id']);
                    $rlSmarty->assign('form', $form);
                }
                
                // Get listing with more details
                if ($submission['listing_id']) {
                    $listing = $rlDb->getRow("SELECT `ID`, `title`, `Category_ID` FROM `" . RL_DBPREFIX . "listings` WHERE `ID` = " . $submission['listing_id']);
                    if ($listing) {
                        $submission['listing_title'] = cleanTitle($listing['title']);
                        
                        // URL'yi dinamik olarak oluştur
                        $clean_title = cleanTitle($listing['title']);
                        $url_slug = generateUrlSlug($clean_title, $listing['ID']);
                        $submission['listing_url'] = 'https://mobil.gmoplus.com/' . $url_slug;
                    }
                }
                
                // Decode form data
                if ($submission['form_data']) {
                    $form_data = json_decode($submission['form_data'], true);
                    if ($form_data) {
                        // Translate form data for admin display
                        $translated_form_data = array();
                        foreach ($form_data as $field_key => $field_value) {
                            $translated_key = translateFieldName($field_key);
                            $translated_value = translateFieldValue($field_value);
                            $translated_form_data[$translated_key] = $translated_value;
                        }
                        $rlSmarty->assign('form_data', $translated_form_data);
                    }
                }
                
                // Mark as read if not already
                if ($submission['status'] != 'read' && $submission['status'] != 'replied') {
                    $rlDb->query("UPDATE `" . RL_DBPREFIX . "quote_submissions` SET `status` = 'read' WHERE `id` = " . $submission_id);
                    $submission['status'] = 'read';
                }
                
                $rlSmarty->assign('submission', $submission);
            } else {
                $rlSmarty->assign('error_message', 'Teklif bulunamadı');
            }
        } else {
            $rlSmarty->assign('error_message', 'Geçersiz ID');
            }
        
            break;
            
    case 'edit':
        $page_info['name'] = 'quote_edit_submission';
        $page_info['title'] = 'Teklif Düzenle';
        
        $submission_id = (int) $_GET['id'];
        
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = $_POST['status'] ?? '';
            $notes = $_POST['admin_notes'] ?? '';
            
            if (in_array($status, ['new', 'read', 'replied'])) {
                $update_data = array(
                    'status' => $status,
                    'admin_notes' => $notes
                );
                
                // SQL query ile güncelleme
                $rlDb->query("UPDATE `" . RL_DBPREFIX . "quote_submissions` SET `status` = '" . addslashes($status) . "', `admin_notes` = '" . addslashes($notes) . "' WHERE `id` = " . $submission_id);
                $rlSmarty->assign('success_message', 'Teklif güncellendi');
                
                // Redirect back to view - Doğru admin URL
                header("Location: index.php?controller=quote_management&action=view&id=" . $submission_id);
                exit;
            }
        }
        
        // Load submission for editing
        if ($submission_id) {
            $submission = $rlDb->getRow("SELECT * FROM `" . RL_DBPREFIX . "quote_submissions` WHERE `id` = " . $submission_id);
            
            if ($submission) {
                // Get form
                if ($submission['form_id']) {
                    $form = $rlDb->getRow("SELECT * FROM `" . RL_DBPREFIX . "quote_forms` WHERE `id` = " . $submission['form_id']);
                    $rlSmarty->assign('form', $form);
}

                // Get listing info
                if ($submission['listing_id']) {
                    $listing = $rlDb->fetch(array('ID', 'title', 'Category_ID'), array('ID' => $submission['listing_id']), null, 1, 'listings', 'row');
                    if ($listing) {
                        $submission['listing_title'] = cleanTitle($listing['title']);
                        
                        // URL'yi dinamik olarak oluştur
                        $clean_title = cleanTitle($listing['title']);
                        $url_slug = generateUrlSlug($clean_title, $listing['ID']);
                        $submission['listing_url'] = 'https://mobil.gmoplus.com/' . $url_slug;
                    }
                }
                
                // Decode form data
                if ($submission['form_data']) {
                    $form_data = json_decode($submission['form_data'], true);
                    if ($form_data) {
                        // Translate form data for admin display
                        $translated_form_data = array();
                        foreach ($form_data as $field_key => $field_value) {
                            $translated_key = translateFieldName($field_key);
                            $translated_value = translateFieldValue($field_value);
                            $translated_form_data[$translated_key] = $translated_value;
                        }
                        $rlSmarty->assign('form_data', $translated_form_data);
                        // Also assign original for editing purposes
                        $rlSmarty->assign('original_form_data', $form_data);
                    }
                }
                
                $rlSmarty->assign('submission', $submission);
            } else {
                $rlSmarty->assign('error_message', 'Teklif bulunamadı');
            }
        } else {
            $rlSmarty->assign('error_message', 'Geçersiz ID');
        }
        
        break;
        
    case 'forms':
        include RL_ADMIN . 'controllers' . RL_DS . 'quote_forms_manager.inc.php';
        break;
        
    case 'settings':
        include RL_ADMIN . 'controllers' . RL_DS . 'quote_settings.inc.php';
        break;
        
    default:
        // List submissions
        $limit = 20;
        $start = ((int) $_GET['pg'] - 1) * $limit;
        $start = $start < 0 ? 0 : $start;
        
        // Get submissions with filters
        $status_filter = $_GET['status'] ?? '';
        $form_filter = $_GET['form_id'] ?? '';
        
        try {
            // Flynax fetch metodunu kullanarak basit sorgu (prefix olmadan)
            $submissions = $rlDb->fetch('*', array(), "ORDER BY `created_date` DESC LIMIT $start, $limit", null, 'quote_submissions');
            
            // Debug - log submission count
            error_log("Quote Management Debug: Found " . count($submissions) . " submissions with fetch method");
            
            // Her submission için form ve listing bilgilerini al
            foreach ($submissions as &$submission) {
                // Form adını al
                $form = $rlDb->fetch(array('form_name'), array('id' => $submission['form_id']), null, 1, 'quote_forms');
                $submission['form_name'] = $form ? $form['form_name'] : 'Bilinmiyor';
                
                // Listing başlığını ve URL'ini al
                if ($submission['listing_id']) {
                    // Flynax fetch yerine doğrudan SQL kullan
                    $listing = $rlDb->getRow("SELECT `title` FROM `" . RL_DBPREFIX . "listings` WHERE `ID` = " . $submission['listing_id']);
                    
                    if ($listing && $listing['title']) {
                        $submission['listing_title'] = cleanTitle($listing['title']);
                        
                        // URL'yi dinamik olarak oluştur
                        $clean_title = cleanTitle($listing['title']);
                        $url_slug = generateUrlSlug($clean_title, $submission['listing_id']);
                        $submission['listing_url'] = 'https://mobil.gmoplus.com/' . $url_slug;
                        
                        // Debug - log successful URL creation
                        error_log("Debug: Created URL for listing " . $submission['listing_id'] . ": " . $submission['listing_url']);
                    } else {
                        $submission['listing_title'] = 'İlan #' . $submission['listing_id'];
                        $submission['listing_url'] = 'https://mobil.gmoplus.com/listing.php?id=' . $submission['listing_id'];
                        
                        // Debug - log fallback URL creation
                        error_log("Debug: No listing found for ID " . $submission['listing_id'] . ", using fallback URL");
                    }
                }
            }
            
            $total_result = $rlDb->getRow("SELECT COUNT(*) as total FROM `" . RL_DBPREFIX . "quote_submissions`");
            $total = $total_result ? $total_result['total'] : 0;
            
            // Debug - log total count  
            error_log("Quote Management Debug: Total submissions in DB: " . $total);
            
            // Get forms for filter
            $forms = $rlDb->fetch('*', array(), 'ORDER BY `created_date` DESC', null, 'quote_forms');
            
            $rlSmarty->assign('submissions', $submissions);
            $rlSmarty->assign('forms', $forms);
            $rlSmarty->assign('total', $total);
            $rlSmarty->assign('status_filter', $status_filter);
            $rlSmarty->assign('form_filter', $form_filter);
            
            // Pagination
            $pages = $total > 0 ? ceil($total / $limit) : 1;
            $rlSmarty->assign('pages', $pages);
            $rlSmarty->assign('current_page', (int) $_GET['pg'] ?: 1);
            
        } catch (Exception $e) {
            error_log("Quote management error: " . $e->getMessage());
            $rlSmarty->assign('error_message', 'Veriler yüklenirken hata oluştu: ' . $e->getMessage());
            $rlSmarty->assign('submissions', array());
            $rlSmarty->assign('forms', array());
            $rlSmarty->assign('total', 0);
        }
        
        break;
} 

/* EOF */ 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 