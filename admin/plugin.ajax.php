<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL38HVY4OFS3 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: 
 *  DOMAIN: gmowinmobil.com
 *  FILE: INDEX.PHP
 *  
 *  The software is a commercial product delivered under single, non-exclusive,
 *  non-transferable license for one domain or IP address. Therefore distribution,
 *  sale or transfer of the file in whole or in part without permission of Flynax
 *  respective owners is considered to be illegal and breach of Flynax License End
 *  User Agreement.
 *  
 *  You are not allowed to remove this information from the file without permission
 *  of Flynax respective owners.
 *  
 *  Flynax Classifieds Software 2024 | All copyrights reserved.
 *  
 *  https://www.flynax.com
 ******************************************************************************/

define('SKIP_HOOKS', true);

require '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'config.inc.php';
require 'controllers' . RL_DS . 'ext_header.inc.php';

$reefless->loadClass('Plugin', 'admin');
$reefless->loadClass('Actions');

set_time_limit(0);

$languages = $rlLang->getLanguagesList();
$item = $_REQUEST['item'];
$mode = $_REQUEST['mode'] ?? '';

switch ($item) {
    case 'install':
        $out = $rlPlugin->ajaxInstall($_REQUEST['key'], $_REQUEST['remote']);
        break;

    case 'update':
        $out = $rlPlugin->ajaxUpdate($_REQUEST['key'], $_REQUEST['remote']);
        break;

    case 'remoteInstall':
        $out = $rlPlugin->ajaxRemoteInstall($_REQUEST['key']);
        break;

    case 'remoteUpdate':
        $out = $rlPlugin->ajaxRemoteUpdate($_REQUEST['key']);
        break;
}

// Teklif yönetimi AJAX işlemleri
if ($mode) {
    switch ($mode) {
        case 'updateQuoteStatus':
            $submission_id = intval($_POST['submission_id']);
            $new_status = addslashes($_POST['status']);
            
            if ($submission_id && $new_status) {
                // Eski durumu al
                $old_submission = $rlDb->fetch('status', array('id' => $submission_id), null, null, 'quote_submissions');
                $old_status = $old_submission ? $old_submission[0]['status'] : '';
                
                // Durumu güncelle
                $updated = $rlDb->updateOne(array('status' => $new_status), array('id' => $submission_id), 'quote_submissions');
                
                if ($updated) {
                    $out = array(
                        'success' => true,
                        'message' => 'Durum başarıyla güncellendi',
                        'old_status' => $old_status,
                        'new_status' => $new_status
                    );
                } else {
                    $out = array('success' => false, 'message' => 'Durum güncellenirken hata oluştu');
                }
            } else {
                $out = array('success' => false, 'message' => 'Geçersiz parametreler');
            }
            break;
            
        case 'saveQuoteNotes':
            $submission_id = intval($_POST['submission_id']);
            $notes = addslashes($_POST['notes']);
            
            if ($submission_id) {
                $updated = $rlDb->updateOne(array('admin_notes' => $notes), array('id' => $submission_id), 'quote_submissions');
                
                if ($updated !== false) {
                    $out = array('success' => true, 'message' => 'Notlar başarıyla kaydedildi');
                } else {
                    $out = array('success' => false, 'message' => 'Notlar kaydedilirken hata oluştu');
                }
            } else {
                $out = array('success' => false, 'message' => 'Geçersiz ID');
            }
            break;
            
        case 'deleteQuoteSubmission':
            $submission_id = intval($_POST['submission_id']);
            
            if ($submission_id) {
                $deleted = $rlDb->query("DELETE FROM `" . RL_DBPREFIX . "quote_submissions` WHERE `id` = " . $submission_id);
                
                if ($deleted) {
                    $out = array('success' => true, 'message' => 'Teklif başarıyla silindi');
                } else {
                    $out = array('success' => false, 'message' => 'Teklif silinirken hata oluştu');
                }
            } else {
                $out = array('success' => false, 'message' => 'Geçersiz ID');
            }
            break;
            
        default:
            $out = array('success' => false, 'message' => 'Geçersiz işlem');
            break;
    }
}

$rlDb->connectionClose();

echo json_encode($out);
