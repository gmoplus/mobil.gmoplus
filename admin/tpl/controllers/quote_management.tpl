<!-- quote management -->

{if $smarty.get.action == 'edit'}
    {* Enhanced Edit template content *}
    <div id="nav_bar">
        <a href="index.php?controller=quote_management&action=view&id={$submission.id}" class="button_bar">
            <span class="left"></span>
            <span class="center_back">Teklif Detayına Dön</span>
            <span class="right"></span>
        </a>
    </div>

    <div class="content-padding">
        {if $success_message}
        <div class="success" style="background:#e6ffe6;border:1px solid #99cc99;padding:15px;margin:15px 0;color:#006600;border-radius:5px;">
            <strong>✓ Başarılı:</strong> {$success_message}
        </div>
        {/if}
        
        {if $error_message}
        <div class="error" style="background:#ffe6e6;border:1px solid #ff9999;padding:15px;margin:15px 0;color:#cc0000;border-radius:5px;">
            <strong>✗ Hata:</strong> {$error_message}
        </div>
        {else}
        <div class="table">
            <div class="header">
                <div class="left">
                    <span style="color: #000; font-size: 16px; font-weight: bold;">📝 Teklif Düzenle - #{$submission.id}</span>
                </div>
            </div>
            
            <div style="padding: 25px; background: #f9f9f9;">
                <form method="POST" action="" style="max-width: 1000px;">
                    
                    {* Genel Bilgiler Bölümü *}
                    <div style="background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                            👤 Genel Bilgiler
                        </h3>
                        
                        <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Teklif ID:</label>
                                <input type="text" value="{$submission.id}" disabled style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; background: #f5f5f5;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Form Türü:</label>
                                <input type="text" value="{$form.form_name|default:'Bilinmiyor'}" disabled style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; background: #f5f5f5;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Talep Eden:</label>
                                <input type="text" name="requester_name" value="{$submission.requester_name}" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Email:</label>
                                <input type="email" name="requester_email" value="{$submission.requester_email}" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Telefon:</label>
                                <input type="text" name="requester_phone" value="{$submission.requester_phone}" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Durum:</label>
                                <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                    <option value="new" {if $submission.status == 'new'}selected{/if}>🟡 Yeni</option>
                                    <option value="read" {if $submission.status == 'read'}selected{/if}>🔵 Okundu</option>
                                    <option value="replied" {if $submission.status == 'replied'}selected{/if}>🟢 Yanıtlandı</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">İlan:</label>
                            <div style="padding: 10px; background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 4px;">
                                {if $submission.listing_title}
                                    <a href="{$submission.listing_url}" target="_blank" style="color: #007cba; font-weight: bold; text-decoration: none;">
                                        🏠 {$submission.listing_title}
                                    </a>
                                    <small style="color: #666; display: block; margin-top: 5px;">İlana gitmek için tıklayın</small>
                                {else}
                                    İlan #{$submission.listing_id}
                                {/if}
                            </div>
                        </div>
                    </div>
                    
                    {* Teklif Detayları Bölümü *}
                    {if $form_data}
                    <div style="background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                            📋 Teklif Detayları
                        </h3>
                        
                        <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            {foreach from=$form_data key=field_key item=field_value}
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333; text-transform: capitalize;">
                                    {$field_key|replace:'_':' '}:
                                </label>
                                {if $field_key == 'additional_notes'}
                                    <textarea name="form_data[{$field_key}]" rows="3" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; resize: vertical;">{$field_value}</textarea>
                                {else}
                                    <input type="text" name="form_data[{$field_key}]" value="{$field_value}" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                {/if}
                            </div>
                            {/foreach}
                        </div>
                    </div>
                    {/if}
                    
                    {* Admin Notları Bölümü *}
                    <div style="background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                            📝 Admin Notları
                        </h3>
                        
                        <textarea name="admin_notes" rows="4" placeholder="Teklif ile ilgili admin notlarınızı buraya yazabilirsiniz..." style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; resize: vertical; font-family: Arial, sans-serif;">{$submission.admin_notes}</textarea>
                    </div>
                    
                    {* Butonlar *}
                    <div style="text-align: center; padding-top: 20px; border-top: 2px solid #eee;">
                        <button type="submit" style="background: #28a745; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer; margin-right: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                            ✓ Güncelle
                        </button>
                        <a href="index.php?controller=quote_management&action=view&id={$submission.id}" style="background: #6c757d; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-size: 16px; font-weight: bold; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                            ✗ İptal
                        </a>
                    </div>
                </form>
            </div>
        </div>
        {/if}
    </div>

{elseif $smarty.get.action == 'view'}
    {* Enhanced View template content *}
    <div id="nav_bar">
        <a href="index.php?controller=quote_management" class="button_bar">
            <span class="left"></span>
            <span class="center_back">Teklif Listesine Dön</span>
            <span class="right"></span>
        </a>
        <a href="index.php?controller=quote_management&action=edit&id={$submission.id}" class="button_bar">
            <span class="left"></span>
            <span class="center_edit">Düzenle</span>
            <span class="right"></span>
        </a>
    </div>

    <div class="content-padding">
        {if $error_message}
        <div class="error" style="background:#ffe6e6;border:1px solid #ff9999;padding:15px;margin:15px 0;color:#cc0000;border-radius:5px;">
            <strong>✗ Hata:</strong> {$error_message}
        </div>
        {else}
        <div class="table">
            <div class="header">
                <div class="left">
                    <span style="color: #000; font-size: 16px; font-weight: bold;">📄 Teklif Detayları - #{$submission.id}</span>
                </div>
            </div>
            
            <div style="padding: 25px; background: #f9f9f9;">
                
                {* Genel Bilgiler Kartı *}
                <div style="background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                        👤 Genel Bilgiler
                    </h3>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px;">
                        <div class="info-item">
                            <strong style="color: #555;">📊 Teklif ID:</strong>
                            <span style="color: #333; margin-left: 10px;">{$submission.id}</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📋 Form Türü:</strong>
                            <span style="color: #333; margin-left: 10px;">{$form.form_name|default:'Bilinmiyor'}</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">👤 Talep Eden:</strong>
                            <span style="color: #333; margin-left: 10px;">{$submission.requester_name}</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📧 Email:</strong>
                            <a href="mailto:{$submission.requester_email}" style="color: #007cba; margin-left: 10px; text-decoration: none;">{$submission.requester_email}</a>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📞 Telefon:</strong>
                            <span style="color: #333; margin-left: 10px;">{$submission.requester_phone}</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📅 Tarih:</strong>
                            <span style="color: #333; margin-left: 10px;">{$submission.created_date|date_format:"%d.%m.%Y %H:%M"}</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📈 Durum:</strong>
                            <span class="status-badge status-{$submission.status}" style="margin-left: 10px;">
                                {if $submission.status == 'new'}🟡 Yeni{/if}
                                {if $submission.status == 'read'}🔵 Okundu{/if}
                                {if $submission.status == 'replied'}🟢 Yanıtlandı{/if}
                            </span>
                        </div>
                    </div>
                    
                    {* İlan Bilgisi - Özel Görünüm *}
                    <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 6px;">
                        <strong style="color: #555;">🏠 İlan:</strong>
                        <div style="margin-top: 8px;">
                            {if $submission.listing_title}
                                <a href="{$submission.listing_url}" target="_blank" style="color: #007cba; font-weight: bold; font-size: 16px; text-decoration: none; display: inline-block; padding: 8px 12px; background: white; border: 1px solid #007cba; border-radius: 4px; transition: all 0.3s;">
                                    🏠 {$submission.listing_title}
                                </a>
                                <small style="color: #666; display: block; margin-top: 5px;">İlana gitmek için tıklayın</small>
                            {else}
                                <span style="color: #999;">İlan #{$submission.listing_id}</span>
                            {/if}
                        </div>
                    </div>
                    
                    {if $submission.admin_notes}
                    <div style="margin-top: 20px; padding: 15px; background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 6px;">
                        <strong style="color: #856404;">📝 Admin Notları:</strong>
                        <div style="margin-top: 8px; color: #856404;">{$submission.admin_notes}</div>
                    </div>
                    {/if}
                </div>
                
                {* Teklif Detayları Kartı *}
                {if $form_data}
                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                        📋 Teklif Detayları
                    </h3>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px;">
                        {foreach from=$form_data key=field_key item=field_value}
                        <div class="detail-item" style="padding: 12px; background: #f8f9fa; border-radius: 6px; border-left: 4px solid #007cba;">
                            <strong style="color: #555; display: block; margin-bottom: 5px;">
                                {$field_key}:
                            </strong>
                            <span style="color: #333; font-size: 15px;">{$field_value}</span>
                        </div>
                        {/foreach}
                    </div>
                </div>
                {/if}
                
            </div>
        </div>
        {/if}
    </div>

{else}
    {* List template content *}
<div id="nav_bar">
    {if $aRights.$smarty.const.RL_LANG_DIR.quote_management.add}
        <a href="{$rlBaseC}action=forms" class="button_bar">
            <span class="left"></span>
            <span class="center_add">Teklif Formları Yönet</span>
            <span class="right"></span>
        </a>
    {/if}
    <a href="{$rlBaseC}action=settings" class="button_bar">
        <span class="left"></span>
        <span class="center_settings">Sistem Ayarları</span>
        <span class="right"></span>
    </a>
</div>
<!-- navigation bar end -->

<div class="content-padding">
    <div class="table">
        <div class="header">
            <div class="left">Teklif Talepleri</div>
            <div class="right">
                <form method="GET" style="display:inline;">
                    <input type="hidden" name="controller" value="quote_management" />
                    <select name="status" onchange="this.form.submit()">
                        <option value="">Tüm Durumlar</option>
                        <option value="new" {if $status_filter == 'new'}selected{/if}>Yeni</option>
                        <option value="read" {if $status_filter == 'read'}selected{/if}>Okundu</option>
                        <option value="replied" {if $status_filter == 'replied'}selected{/if}>Yanıtlandı</option>
                    </select>
                </form>
            </div>
        </div>
        
        {if $error_message}
        <div class="error" style="background:#ffe6e6;border:1px solid #ff9999;padding:10px;margin:10px 0;color:#cc0000;">
            <strong>Hata:</strong> {$error_message}
        </div>
        {elseif $submissions}
        <table class="sTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Form</th>
                    <th>Talep Eden</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>İlan</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$submissions item='submission'}
                <tr>
                    <td>{$submission.id}</td>
                    <td>{$submission.form_name|default:'Bilinmiyor'}</td>
                    <td>{$submission.requester_name}</td>
                    <td><a href="mailto:{$submission.requester_email}">{$submission.requester_email}</a></td>
                    <td>{$submission.requester_phone}</td>
                    <td>
                        {if $submission.listing_title}
                            <a href="{$submission.listing_url}" target="_blank" style="color: #007cba; font-weight: bold; text-decoration: none;">
                                {$submission.listing_title}
                            </a>
                        {else}
                            <a href="https://mobil.gmoplus.com/listing.php?id={$submission.listing_id}" target="_blank" style="color: #007cba; text-decoration: none;">
                                İlan #{$submission.listing_id}
                            </a>
                        {/if}
                    </td>
                    <td>{$submission.created_date|date_format:"%d.%m.%Y %H:%M"}</td>
                    <td>
                        <span class="status-{$submission.status}">
                            {if $submission.status == 'new'}Yeni{/if}
                            {if $submission.status == 'read'}Okundu{/if}
                            {if $submission.status == 'replied'}Yanıtlandı{/if}
                        </span>
                    </td>
                    <td>
                        <a href="{$rlBaseC}action=view&id={$submission.id}" class="button">Görüntüle</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        
        <!-- pagination -->
        {if $pages > 1}
        <div class="pagination">
            {for $page=1 to $pages}
                {if $page == $current_page}
                    <span class="current">{$page}</span>
                {else}
                    <a href="{$rlBaseC}pg={$page}{if $status_filter}&status={$status_filter}{/if}">{$page}</a>
                {/if}
            {/for}
        </div>
        {/if}
        
        {else}
        <div class="no-data">
            <p>Henüz teklif talebi bulunmuyor.</p>
        </div>
        {/if}
    </div>
</div>

<style>
/* Enhanced Quote Management Styles */
.info-item, .detail-item {
    transition: all 0.3s ease;
}

.info-item:hover, .detail-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15) !important;
}

.form-grid input:focus, .form-grid select:focus, .form-grid textarea:focus {
    border-color: #007cba !important;
    box-shadow: 0 0 0 2px rgba(0, 124, 186, 0.2) !important;
    outline: none !important;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 13px;
    font-weight: bold;
}

.status-new { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
.status-read { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
.status-replied { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }

button:hover, .button:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.3) !important;
    transition: all 0.3s ease;
}

.table .header {
    background: linear-gradient(135deg, #007cba 0%, #005a87 100%);
}

/* Responsive design */
@media (max-width: 768px) {
    .form-grid, .info-grid {
        grid-template-columns: 1fr !important;
    }
    
    .button, button {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>

{/if}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 