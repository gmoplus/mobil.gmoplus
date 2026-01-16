<?php /* Smarty version 2.6.31, created on 2025-07-28 22:26:56
         compiled from controllers/quote_management.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'controllers/quote_management.tpl', 49, false),array('modifier', 'replace', 'controllers/quote_management.tpl', 103, false),array('modifier', 'date_format', 'controllers/quote_management.tpl', 204, false),)), $this); ?>
<!-- quote management -->

<?php if ($_GET['action'] == 'edit'): ?>
        <div id="nav_bar">
        <a href="index.php?controller=quote_management&action=view&id=<?php echo $this->_tpl_vars['submission']['id']; ?>
" class="button_bar">
            <span class="left"></span>
            <span class="center_back">Teklif Detayına Dön</span>
            <span class="right"></span>
        </a>
    </div>

    <div class="content-padding">
        <?php if ($this->_tpl_vars['success_message']): ?>
        <div class="success" style="background:#e6ffe6;border:1px solid #99cc99;padding:15px;margin:15px 0;color:#006600;border-radius:5px;">
            <strong>✓ Başarılı:</strong> <?php echo $this->_tpl_vars['success_message']; ?>

        </div>
        <?php endif; ?>
        
        <?php if ($this->_tpl_vars['error_message']): ?>
        <div class="error" style="background:#ffe6e6;border:1px solid #ff9999;padding:15px;margin:15px 0;color:#cc0000;border-radius:5px;">
            <strong>✗ Hata:</strong> <?php echo $this->_tpl_vars['error_message']; ?>

        </div>
        <?php else: ?>
        <div class="table">
            <div class="header">
                <div class="left">
                    <span style="color: #000; font-size: 16px; font-weight: bold;">📝 Teklif Düzenle - #<?php echo $this->_tpl_vars['submission']['id']; ?>
</span>
                </div>
            </div>
            
            <div style="padding: 25px; background: #f9f9f9;">
                <form method="POST" action="" style="max-width: 1000px;">
                    
                                        <div style="background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                            👤 Genel Bilgiler
                        </h3>
                        
                        <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Teklif ID:</label>
                                <input type="text" value="<?php echo $this->_tpl_vars['submission']['id']; ?>
" disabled style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; background: #f5f5f5;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Form Türü:</label>
                                <input type="text" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['form']['form_name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Bilinmiyor') : smarty_modifier_default($_tmp, 'Bilinmiyor')); ?>
" disabled style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; background: #f5f5f5;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Talep Eden:</label>
                                <input type="text" name="requester_name" value="<?php echo $this->_tpl_vars['submission']['requester_name']; ?>
" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Email:</label>
                                <input type="email" name="requester_email" value="<?php echo $this->_tpl_vars['submission']['requester_email']; ?>
" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Telefon:</label>
                                <input type="text" name="requester_phone" value="<?php echo $this->_tpl_vars['submission']['requester_phone']; ?>
" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                            </div>
                            
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">Durum:</label>
                                <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                    <option value="new" <?php if ($this->_tpl_vars['submission']['status'] == 'new'): ?>selected<?php endif; ?>>🟡 Yeni</option>
                                    <option value="read" <?php if ($this->_tpl_vars['submission']['status'] == 'read'): ?>selected<?php endif; ?>>🔵 Okundu</option>
                                    <option value="replied" <?php if ($this->_tpl_vars['submission']['status'] == 'replied'): ?>selected<?php endif; ?>>🟢 Yanıtlandı</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333;">İlan:</label>
                            <div style="padding: 10px; background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 4px;">
                                <?php if ($this->_tpl_vars['submission']['listing_title']): ?>
                                    <a href="<?php echo $this->_tpl_vars['submission']['listing_url']; ?>
" target="_blank" style="color: #007cba; font-weight: bold; text-decoration: none;">
                                        🏠 <?php echo $this->_tpl_vars['submission']['listing_title']; ?>

                                    </a>
                                    <small style="color: #666; display: block; margin-top: 5px;">İlana gitmek için tıklayın</small>
                                <?php else: ?>
                                    İlan #<?php echo $this->_tpl_vars['submission']['listing_id']; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                                        <?php if ($this->_tpl_vars['form_data']): ?>
                    <div style="background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                            📋 Teklif Detayları
                        </h3>
                        
                        <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <?php $_from = $this->_tpl_vars['form_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_key'] => $this->_tpl_vars['field_value']):
?>
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #333; text-transform: capitalize;">
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['field_key'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', ' ') : smarty_modifier_replace($_tmp, '_', ' ')); ?>
:
                                </label>
                                <?php if ($this->_tpl_vars['field_key'] == 'additional_notes'): ?>
                                    <textarea name="form_data[<?php echo $this->_tpl_vars['field_key']; ?>
]" rows="3" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; resize: vertical;"><?php echo $this->_tpl_vars['field_value']; ?>
</textarea>
                                <?php else: ?>
                                    <input type="text" name="form_data[<?php echo $this->_tpl_vars['field_key']; ?>
]" value="<?php echo $this->_tpl_vars['field_value']; ?>
" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                <?php endif; ?>
                            </div>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                                        <div style="background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                            📝 Admin Notları
                        </h3>
                        
                        <textarea name="admin_notes" rows="4" placeholder="Teklif ile ilgili admin notlarınızı buraya yazabilirsiniz..." style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; resize: vertical; font-family: Arial, sans-serif;"><?php echo $this->_tpl_vars['submission']['admin_notes']; ?>
</textarea>
                    </div>
                    
                                        <div style="text-align: center; padding-top: 20px; border-top: 2px solid #eee;">
                        <button type="submit" style="background: #28a745; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer; margin-right: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                            ✓ Güncelle
                        </button>
                        <a href="index.php?controller=quote_management&action=view&id=<?php echo $this->_tpl_vars['submission']['id']; ?>
" style="background: #6c757d; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-size: 16px; font-weight: bold; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                            ✗ İptal
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>

<?php elseif ($_GET['action'] == 'view'): ?>
        <div id="nav_bar">
        <a href="index.php?controller=quote_management" class="button_bar">
            <span class="left"></span>
            <span class="center_back">Teklif Listesine Dön</span>
            <span class="right"></span>
        </a>
        <a href="index.php?controller=quote_management&action=edit&id=<?php echo $this->_tpl_vars['submission']['id']; ?>
" class="button_bar">
            <span class="left"></span>
            <span class="center_edit">Düzenle</span>
            <span class="right"></span>
        </a>
    </div>

    <div class="content-padding">
        <?php if ($this->_tpl_vars['error_message']): ?>
        <div class="error" style="background:#ffe6e6;border:1px solid #ff9999;padding:15px;margin:15px 0;color:#cc0000;border-radius:5px;">
            <strong>✗ Hata:</strong> <?php echo $this->_tpl_vars['error_message']; ?>

        </div>
        <?php else: ?>
        <div class="table">
            <div class="header">
                <div class="left">
                    <span style="color: #000; font-size: 16px; font-weight: bold;">📄 Teklif Detayları - #<?php echo $this->_tpl_vars['submission']['id']; ?>
</span>
                </div>
            </div>
            
            <div style="padding: 25px; background: #f9f9f9;">
                
                                <div style="background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                        👤 Genel Bilgiler
                    </h3>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px;">
                        <div class="info-item">
                            <strong style="color: #555;">📊 Teklif ID:</strong>
                            <span style="color: #333; margin-left: 10px;"><?php echo $this->_tpl_vars['submission']['id']; ?>
</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📋 Form Türü:</strong>
                            <span style="color: #333; margin-left: 10px;"><?php echo ((is_array($_tmp=@$this->_tpl_vars['form']['form_name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Bilinmiyor') : smarty_modifier_default($_tmp, 'Bilinmiyor')); ?>
</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">👤 Talep Eden:</strong>
                            <span style="color: #333; margin-left: 10px;"><?php echo $this->_tpl_vars['submission']['requester_name']; ?>
</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📧 Email:</strong>
                            <a href="mailto:<?php echo $this->_tpl_vars['submission']['requester_email']; ?>
" style="color: #007cba; margin-left: 10px; text-decoration: none;"><?php echo $this->_tpl_vars['submission']['requester_email']; ?>
</a>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📞 Telefon:</strong>
                            <span style="color: #333; margin-left: 10px;"><?php echo $this->_tpl_vars['submission']['requester_phone']; ?>
</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📅 Tarih:</strong>
                            <span style="color: #333; margin-left: 10px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']['created_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</span>
                        </div>
                        
                        <div class="info-item">
                            <strong style="color: #555;">📈 Durum:</strong>
                            <span class="status-badge status-<?php echo $this->_tpl_vars['submission']['status']; ?>
" style="margin-left: 10px;">
                                <?php if ($this->_tpl_vars['submission']['status'] == 'new'): ?>🟡 Yeni<?php endif; ?>
                                <?php if ($this->_tpl_vars['submission']['status'] == 'read'): ?>🔵 Okundu<?php endif; ?>
                                <?php if ($this->_tpl_vars['submission']['status'] == 'replied'): ?>🟢 Yanıtlandı<?php endif; ?>
                            </span>
                        </div>
                    </div>
                    
                                        <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 6px;">
                        <strong style="color: #555;">🏠 İlan:</strong>
                        <div style="margin-top: 8px;">
                            <?php if ($this->_tpl_vars['submission']['listing_title']): ?>
                                <a href="<?php echo $this->_tpl_vars['submission']['listing_url']; ?>
" target="_blank" style="color: #007cba; font-weight: bold; font-size: 16px; text-decoration: none; display: inline-block; padding: 8px 12px; background: white; border: 1px solid #007cba; border-radius: 4px; transition: all 0.3s;">
                                    🏠 <?php echo $this->_tpl_vars['submission']['listing_title']; ?>

                                </a>
                                <small style="color: #666; display: block; margin-top: 5px;">İlana gitmek için tıklayın</small>
                            <?php else: ?>
                                <span style="color: #999;">İlan #<?php echo $this->_tpl_vars['submission']['listing_id']; ?>
</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if ($this->_tpl_vars['submission']['admin_notes']): ?>
                    <div style="margin-top: 20px; padding: 15px; background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 6px;">
                        <strong style="color: #856404;">📝 Admin Notları:</strong>
                        <div style="margin-top: 8px; color: #856404;"><?php echo $this->_tpl_vars['submission']['admin_notes']; ?>
</div>
                    </div>
                    <?php endif; ?>
                </div>
                
                                <?php if ($this->_tpl_vars['form_data']): ?>
                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3 style="color: #007cba; border-bottom: 3px solid #007cba; padding-bottom: 8px; margin-bottom: 20px;">
                        📋 Teklif Detayları
                    </h3>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px;">
                        <?php $_from = $this->_tpl_vars['form_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_key'] => $this->_tpl_vars['field_value']):
?>
                        <div class="detail-item" style="padding: 12px; background: #f8f9fa; border-radius: 6px; border-left: 4px solid #007cba;">
                            <strong style="color: #555; display: block; margin-bottom: 5px;">
                                <?php echo $this->_tpl_vars['field_key']; ?>
:
                            </strong>
                            <span style="color: #333; font-size: 15px;"><?php echo $this->_tpl_vars['field_value']; ?>
</span>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
        <?php endif; ?>
    </div>

<?php else: ?>
    <div id="nav_bar">
    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['smarty']]['const']['RL_LANG_DIR']['quote_management']['add']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=forms" class="button_bar">
            <span class="left"></span>
            <span class="center_add">Teklif Formları Yönet</span>
            <span class="right"></span>
        </a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=settings" class="button_bar">
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
                        <option value="new" <?php if ($this->_tpl_vars['status_filter'] == 'new'): ?>selected<?php endif; ?>>Yeni</option>
                        <option value="read" <?php if ($this->_tpl_vars['status_filter'] == 'read'): ?>selected<?php endif; ?>>Okundu</option>
                        <option value="replied" <?php if ($this->_tpl_vars['status_filter'] == 'replied'): ?>selected<?php endif; ?>>Yanıtlandı</option>
                    </select>
                </form>
            </div>
        </div>
        
        <?php if ($this->_tpl_vars['error_message']): ?>
        <div class="error" style="background:#ffe6e6;border:1px solid #ff9999;padding:10px;margin:10px 0;color:#cc0000;">
            <strong>Hata:</strong> <?php echo $this->_tpl_vars['error_message']; ?>

        </div>
        <?php elseif ($this->_tpl_vars['submissions']): ?>
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
                <?php $_from = $this->_tpl_vars['submissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submission']):
?>
                <tr>
                    <td><?php echo $this->_tpl_vars['submission']['id']; ?>
</td>
                    <td><?php echo ((is_array($_tmp=@$this->_tpl_vars['submission']['form_name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Bilinmiyor') : smarty_modifier_default($_tmp, 'Bilinmiyor')); ?>
</td>
                    <td><?php echo $this->_tpl_vars['submission']['requester_name']; ?>
</td>
                    <td><a href="mailto:<?php echo $this->_tpl_vars['submission']['requester_email']; ?>
"><?php echo $this->_tpl_vars['submission']['requester_email']; ?>
</a></td>
                    <td><?php echo $this->_tpl_vars['submission']['requester_phone']; ?>
</td>
                    <td>
                        <?php if ($this->_tpl_vars['submission']['listing_title']): ?>
                            <a href="<?php echo $this->_tpl_vars['submission']['listing_url']; ?>
" target="_blank" style="color: #007cba; font-weight: bold; text-decoration: none;">
                                <?php echo $this->_tpl_vars['submission']['listing_title']; ?>

                            </a>
                        <?php else: ?>
                            <a href="https://mobil.gmoplus.com/listing.php?id=<?php echo $this->_tpl_vars['submission']['listing_id']; ?>
" target="_blank" style="color: #007cba; text-decoration: none;">
                                İlan #<?php echo $this->_tpl_vars['submission']['listing_id']; ?>

                            </a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']['created_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</td>
                    <td>
                        <span class="status-<?php echo $this->_tpl_vars['submission']['status']; ?>
">
                            <?php if ($this->_tpl_vars['submission']['status'] == 'new'): ?>Yeni<?php endif; ?>
                            <?php if ($this->_tpl_vars['submission']['status'] == 'read'): ?>Okundu<?php endif; ?>
                            <?php if ($this->_tpl_vars['submission']['status'] == 'replied'): ?>Yanıtlandı<?php endif; ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=view&id=<?php echo $this->_tpl_vars['submission']['id']; ?>
" class="button">Görüntüle</a>
                    </td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
        
        <!-- pagination -->
        <?php if ($this->_tpl_vars['pages'] > 1): ?>
        <div class="pagination">
                            <?php if ($this->_tpl_vars['page'] == $this->_tpl_vars['current_page']): ?>
                    <span class="current"><?php echo $this->_tpl_vars['page']; ?>
</span>
                <?php else: ?>
                    <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
pg=<?php echo $this->_tpl_vars['page']; ?>
<?php if ($this->_tpl_vars['status_filter']): ?>&status=<?php echo $this->_tpl_vars['status_filter']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['page']; ?>
</a>
                <?php endif; ?>
                    </div>
        <?php endif; ?>
        
        <?php else: ?>
        <div class="no-data">
            <p>Henüz teklif talebi bulunmuyor.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
/* Enhanced Quote Management Styles */
.info-item, .detail-item 
.info-item:hover, .detail-item:hover 
.form-grid input:focus, .form-grid select:focus, .form-grid textarea:focus 
.status-badge 
.status-new .status-read .status-replied 
button:hover, .button:hover 
.table .header 
/* Responsive design */
@media (max-width: 768px)     
    .button, button }
</style>

<?php endif; ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 