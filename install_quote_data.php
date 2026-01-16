<?php

/**
 * Install Quote System Data
 * Bu script quote tablolarını örnek verilerle doldurur
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<pre>";
echo "Quote System Data Installation\n";
echo "=============================\n\n";

try {
    require_once 'includes/config.inc.php';
    require_once RL_INC . 'control.inc.php';
    
    echo "🔧 Installing Quote System data...\n\n";
    
    // 1. Config verileri
    echo "📝 Installing config data...\n";
    $configs = [
        ['quote_system_enabled', '1', 'boolean', 'Quote system enabled/disabled'],
        ['max_submissions_per_day', '10', 'number', 'Maximum submissions per day per email'],
        ['send_auto_reply', '1', 'boolean', 'Send auto-reply to requesters'],
        ['admin_notification_email', '', 'text', 'Admin email for notifications'],
        ['default_email_subject', 'Yeni Teklif Talebi - {service_name}', 'text', 'Default email subject']
    ];
    
    foreach ($configs as $config) {
        $exists = $rlDb->getOne('config_key', ['config_key' => $config[0]], RL_DBPREFIX . 'quote_config');
        if (!$exists) {
            $rlDb->insertOne([
                'config_key' => $config[0],
                'config_value' => $config[1],
                'config_type' => $config[2],
                'description' => $config[3]
            ], RL_DBPREFIX . 'quote_config');
            echo "   ✅ {$config[0]}\n";
        } else {
            echo "   ⚠️  {$config[0]} (already exists)\n";
        }
    }
    
    // 2. Quote formları
    echo "\n📋 Installing quote forms...\n";
    $forms = [
        [
            'category_key' => 'nakliye',
            'form_name' => 'Nakliye Teklif Formu',
            'form_title' => 'Nakliye İçin Teklif Alın',
            'form_description' => 'Nakliye hizmetiniz için detaylı teklif almak için formu doldurun.',
            'auto_reply_subject' => 'Nakliye Teklif Talebiniz Alındı',
            'auto_reply_message' => 'Nakliye teklif talebiniz başarıyla alındı. En kısa sürede size dönüş yapılacaktır.'
        ],
        [
            'category_key' => 'temizlik',
            'form_name' => 'Temizlik Teklif Formu',
            'form_title' => 'Temizlik İçin Teklif Alın',
            'form_description' => 'Temizlik hizmetiniz için detaylı teklif almak için formu doldurun.',
            'auto_reply_subject' => 'Temizlik Teklif Talebiniz Alındı',
            'auto_reply_message' => 'Temizlik teklif talebiniz başarıyla alındı. En kısa sürede size dönüş yapılacaktır.'
        ],
        [
            'category_key' => 'tadilat',
            'form_name' => 'Tadilat Teklif Formu',
            'form_title' => 'Tadilat İçin Teklif Alın',
            'form_description' => 'Tadilat hizmetiniz için detaylı teklif almak için formu doldurun.',
            'auto_reply_subject' => 'Tadilat Teklif Talebiniz Alındı',
            'auto_reply_message' => 'Tadilat teklif talebiniz başarıyla alındı. En kısa sürede size dönüş yapılacaktır.'
        ],
        [
            'category_key' => 'hizmet',
            'form_name' => 'Genel Hizmet Teklif Formu',
            'form_title' => 'Hizmet İçin Teklif Alın',
            'form_description' => 'Hizmetiniz için detaylı teklif almak için formu doldurun.',
            'auto_reply_subject' => 'Hizmet Teklif Talebiniz Alındı',
            'auto_reply_message' => 'Hizmet teklif talebiniz başarıyla alındı. En kısa sürede size dönüş yapılacaktır.'
        ],
        [
            'category_key' => 'insaat',
            'form_name' => 'İnşaat Teklif Formu',
            'form_title' => 'İnşaat İçin Teklif Alın',
            'form_description' => 'İnşaat hizmetiniz için detaylı teklif almak için formu doldurun.',
            'auto_reply_subject' => 'İnşaat Teklif Talebiniz Alındı',
            'auto_reply_message' => 'İnşaat teklif talebiniz başarıyla alındı. En kısa sürede size dönüş yapılacaktır.'
        ]
    ];
    
    foreach ($forms as $form_data) {
        $exists = $rlDb->getOne('id', ['category_key' => $form_data['category_key']], RL_DBPREFIX . 'quote_forms');
        if (!$exists) {
            $form_data['status'] = 'active';
            $form_data['created_date'] = date('Y-m-d H:i:s');
            $form_data['updated_date'] = date('Y-m-d H:i:s');
            
            $form_id = $rlDb->insertOne($form_data, RL_DBPREFIX . 'quote_forms');
            echo "   ✅ {$form_data['category_key']} (ID: $form_id)\n";
            
            // Bu form için field'ları ekle
            $fields = [];
            
            switch ($form_data['category_key']) {
                case 'nakliye':
                    $fields = [
                        ['field_key' => 'from_address', 'field_name' => 'Yükün Bulunduğu Adres', 'field_type' => 'textarea', 'is_required' => 1, 'order_position' => 1],
                        ['field_key' => 'to_address', 'field_name' => 'Yükün Gideceği Adres', 'field_type' => 'textarea', 'is_required' => 1, 'order_position' => 2],
                        ['field_key' => 'transport_date', 'field_name' => 'Taşıma Tarihi', 'field_type' => 'date', 'is_required' => 1, 'order_position' => 3],
                        ['field_key' => 'cargo_type', 'field_name' => 'Yük Türü', 'field_type' => 'text', 'is_required' => 1, 'order_position' => 4],
                        ['field_key' => 'weight', 'field_name' => 'Ağırlık (kg)', 'field_type' => 'number', 'is_required' => 0, 'order_position' => 5],
                        ['field_key' => 'special_notes', 'field_name' => 'Özel Notlar', 'field_type' => 'textarea', 'is_required' => 0, 'order_position' => 6]
                    ];
                    break;
                    
                case 'temizlik':
                    $fields = [
                        ['field_key' => 'area_size', 'field_name' => 'Temizlenecek Alan (m²)', 'field_type' => 'number', 'is_required' => 1, 'order_position' => 1],
                        ['field_key' => 'cleaning_type', 'field_name' => 'Temizlik Türü', 'field_type' => 'select', 'field_options' => '["Genel Temizlik","Derin Temizlik","Taşınma Temizliği","Ofis Temizliği"]', 'is_required' => 1, 'order_position' => 2],
                        ['field_key' => 'preferred_date', 'field_name' => 'Tercih Edilen Tarih', 'field_type' => 'date', 'is_required' => 1, 'order_position' => 3],
                        ['field_key' => 'frequency', 'field_name' => 'Sıklık', 'field_type' => 'select', 'field_options' => '["Tek Seferlik","Haftalık","Aylık"]', 'is_required' => 1, 'order_position' => 4],
                        ['field_key' => 'additional_services', 'field_name' => 'Ek Hizmetler', 'field_type' => 'textarea', 'is_required' => 0, 'order_position' => 5]
                    ];
                    break;
                    
                case 'tadilat':
                    $fields = [
                        ['field_key' => 'project_type', 'field_name' => 'Proje Türü', 'field_type' => 'select', 'field_options' => '["Banyo Tadilatı","Mutfak Tadilatı","Boyama","Döşeme","Komple Tadilat"]', 'is_required' => 1, 'order_position' => 1],
                        ['field_key' => 'area_size', 'field_name' => 'Alan Büyüklüğü (m²)', 'field_type' => 'number', 'is_required' => 1, 'order_position' => 2],
                        ['field_key' => 'budget', 'field_name' => 'Bütçe Aralığı', 'field_type' => 'select', 'field_options' => '["5.000-10.000 TL","10.000-25.000 TL","25.000-50.000 TL","50.000+ TL"]', 'is_required' => 0, 'order_position' => 3],
                        ['field_key' => 'timeline', 'field_name' => 'Tamamlanma Süresi', 'field_type' => 'text', 'is_required' => 0, 'order_position' => 4],
                        ['field_key' => 'project_details', 'field_name' => 'Proje Detayları', 'field_type' => 'textarea', 'is_required' => 1, 'order_position' => 5]
                    ];
                    break;
                    
                case 'insaat':
                    $fields = [
                        ['field_key' => 'construction_type', 'field_name' => 'İnşaat Türü', 'field_type' => 'select', 'field_options' => '["Konut","Ticari","Endüstriyel","Tadilat"]', 'is_required' => 1, 'order_position' => 1],
                        ['field_key' => 'project_size', 'field_name' => 'Proje Büyüklüğü (m²)', 'field_type' => 'number', 'is_required' => 1, 'order_position' => 2],
                        ['field_key' => 'location', 'field_name' => 'Proje Lokasyonu', 'field_type' => 'text', 'is_required' => 1, 'order_position' => 3],
                        ['field_key' => 'start_date', 'field_name' => 'Başlama Tarihi', 'field_type' => 'date', 'is_required' => 0, 'order_position' => 4],
                        ['field_key' => 'budget_range', 'field_name' => 'Bütçe Aralığı', 'field_type' => 'text', 'is_required' => 0, 'order_position' => 5],
                        ['field_key' => 'project_description', 'field_name' => 'Proje Açıklaması', 'field_type' => 'textarea', 'is_required' => 1, 'order_position' => 6]
                    ];
                    break;
                    
                default: // hizmet
                    $fields = [
                        ['field_key' => 'service_type', 'field_name' => 'Hizmet Türü', 'field_type' => 'text', 'is_required' => 1, 'order_position' => 1],
                        ['field_key' => 'service_date', 'field_name' => 'Hizmet Tarihi', 'field_type' => 'date', 'is_required' => 1, 'order_position' => 2],
                        ['field_key' => 'duration', 'field_name' => 'Tahmini Süre', 'field_type' => 'text', 'is_required' => 0, 'order_position' => 3],
                        ['field_key' => 'description', 'field_name' => 'Hizmet Açıklaması', 'field_type' => 'textarea', 'is_required' => 1, 'order_position' => 4]
                    ];
            }
            
            foreach ($fields as $field) {
                $field['form_id'] = $form_id;
                $field['status'] = 'active';
                $rlDb->insertOne($field, RL_DBPREFIX . 'quote_fields');
            }
            echo "     └─ " . count($fields) . " fields added\n";
            
        } else {
            echo "   ⚠️  {$form_data['category_key']} (already exists)\n";
        }
    }
    
    echo "\n🎉 Quote System data installation completed!\n";
    echo "\n📊 Summary:\n";
    
    $config_count = $rlDb->getOne('COUNT(*)', [], RL_DBPREFIX . 'quote_config');
    $forms_count = $rlDb->getOne('COUNT(*)', [], RL_DBPREFIX . 'quote_forms');
    $fields_count = $rlDb->getOne('COUNT(*)', [], RL_DBPREFIX . 'quote_fields');
    
    echo "   - Configs: $config_count\n";
    echo "   - Forms: $forms_count\n";
    echo "   - Fields: $fields_count\n";
    
    echo "\n✅ Ready to test! Try: http://mobil.gmoplus.com/test_setup_fixed.php\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}

echo "</pre>"; 