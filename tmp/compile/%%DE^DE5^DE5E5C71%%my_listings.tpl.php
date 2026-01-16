<?php /* Smarty version 2.6.31, created on 2025-07-28 22:22:01
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl', 21, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl', 42, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl', 52, false),array('modifier', 'regex_replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl', 409, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl', 29, false),array('function', 'paging', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl', 52, false),array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl', 411, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/my_listings.tpl', 419, false),)), $this); ?>
<!-- my listings -->

<?php if (! empty ( $this->_tpl_vars['listings'] )): ?>

    <?php if ($this->_tpl_vars['sorting']): ?>

        <?php 
            $types = array('asc' => 'ascending', 'desc' => 'descending'); $this -> assign('sort_types', $types);
            $sort = array('price', 'number', 'date'); $this -> assign('sf_types', $sort);
         ?>

        <div class="grid_navbar">
            <div class="sorting">
                <div class="current<?php if ($this->_tpl_vars['grid_mode'] == 'map'): ?> disabled<?php endif; ?>">
                    <?php echo $this->_tpl_vars['lang']['sort_by']; ?>
:
                    <span class="link"><?php if ($this->_tpl_vars['sort_by']): ?><?php echo $this->_tpl_vars['sorting'][$this->_tpl_vars['sort_by']]['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['date']; ?>
<?php endif; ?></span>
                    <span class="arrow"></span>
                </div>
                <ul class="fields">
                    <?php $_from = $this->_tpl_vars['sorting']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fSorting'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fSorting']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sort_key'] => $this->_tpl_vars['field_item']):
        $this->_foreach['fSorting']['iteration']++;
?>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['field_item']['Type'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sf_types']) : in_array($_tmp, $this->_tpl_vars['sf_types']))): ?>
                            <?php $_from = $this->_tpl_vars['sort_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['st_key'] => $this->_tpl_vars['st']):
?>
                                <li><a rel="nofollow" <?php if ($this->_tpl_vars['sort_by'] == $this->_tpl_vars['sort_key'] && $this->_tpl_vars['sort_type'] == $this->_tpl_vars['st_key']): ?>class="active"<?php endif; ?> title="<?php echo $this->_tpl_vars['lang']['sort_listings_by']; ?>
 <?php echo $this->_tpl_vars['field_item']['name']; ?>
 (<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['st']]; ?>
)" href="<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?>?<?php else: ?>index.php?<?php echo $this->_tpl_vars['pageInfo']['query_string']; ?>
&<?php endif; ?>sort_by=<?php echo $this->_tpl_vars['sort_key']; ?>
&sort_type=<?php echo $this->_tpl_vars['st_key']; ?>
"><?php echo $this->_tpl_vars['field_item']['name']; ?>
 (<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['st']]; ?>
)</a></li>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php else: ?>
                            <li><a rel="nofollow" <?php if ($this->_tpl_vars['sort_by'] == $this->_tpl_vars['sort_key']): ?>class="active"<?php endif; ?> title="<?php echo $this->_tpl_vars['lang']['sort_listings_by']; ?>
 <?php echo $this->_tpl_vars['field_item']['name']; ?>
" href="<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?>?<?php else: ?>index.php?<?php echo $this->_tpl_vars['pageInfo']['query_string']; ?>
&<?php endif; ?>sort_by=<?php echo $this->_tpl_vars['sort_key']; ?>
&sort_type=asc"><?php echo $this->_tpl_vars['field_item']['name']; ?>
</a></li>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'myListingsAfterSorting'), $this);?>

                </ul>
            </div>
        </div>
    <?php endif; ?>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'myListingsBeforeListings'), $this);?>


    <section id="listings" class="my-listings list">
        <?php $_from = $this->_tpl_vars['listings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['listing']):
?>
            <?php if ($this->_tpl_vars['listing']['Subscription_ID']): ?>
                <?php $this->assign('hasSubscriptions', true); ?>
            <?php endif; ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'my_listing.tpl') : smarty_modifier_cat($_tmp, 'my_listing.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endforeach; endif; unset($_from); ?>
    </section>

    <!-- paging block -->
    <?php if ($this->_tpl_vars['search_results_mode'] && $this->_tpl_vars['refine_search_form']): ?>
        <?php $this->assign('myads_paging_url', $this->_tpl_vars['search_results_url']); ?>
    <?php else: ?>
        <?php $this->assign('myads_paging_url', false); ?>
    <?php endif; ?>
    <?php echo $this->_plugins['function']['paging'][0][0]->paging(array('calc' => $this->_tpl_vars['pInfo']['calc'],'total' => count($this->_tpl_vars['listings']),'current' => $this->_tpl_vars['pInfo']['current'],'per_page' => $this->_tpl_vars['config']['listings_per_page'],'url' => $this->_tpl_vars['myads_paging_url'],'method' => $this->_tpl_vars['listing_type']['Submit_method']), $this);?>

    <!-- paging block end -->

    <script class="fl-js-dynamic"><?php echo '
        $(document).ready(function(){
            $(\'.my-listings .delete\').each(function(){
                $(this).flModal({
                    caption: \''; ?>
<?php echo $this->_tpl_vars['lang']['warning']; ?>
<?php echo '\',
                    content: \''; ?>
<?php echo $this->_tpl_vars['lang']['notice_delete_listing']; ?>
<?php echo '\',
                    prompt: \'xajax_deleteListing(\'+ $(this).attr(\'id\').split(\'_\')[2] +\')\',
                    width: \'auto\',
                    height: \'auto\'
                });
            });

            '; ?>
<?php if ($this->_tpl_vars['hasSubscriptions']): ?><?php echo '
            $(\'.my-listings .unsubscription\').each(function() {
                $(this).flModal({
                    caption: \'\',
                    content: \''; ?>
<?php echo $this->_tpl_vars['lang']['stripe_unsubscripbe_confirmation']; ?>
<?php echo '\',
                    prompt: \'flSubscription.cancelSubscription(\\\'\'+ $(this).attr(\'accesskey\').split(\'-\')[2] +\'\\\', \\\'\'+ $(this).attr(\'accesskey\').split(\'-\')[0] +\'\\\', \'+ $(this).attr(\'accesskey\').split(\'-\')[1] +\', false)\',
                    width: \'auto\',
                    height: \'auto\'
                });
            });
            '; ?>
<?php endif; ?><?php echo '

            $(\'label.switcher-status input[type="checkbox"]\').change(function() {
                var element = $(this);
                var id = $(this).val();
                var status = $(this).is(\':checked\') ? \'active\' : \'approval\';

                $.getJSON(
                    rlConfig[\'ajax_url\'],
                    {mode: \'changeListingStatus\', item: id, value: status, lang: rlLang},
                    function(response) {
                        if (response) {
                            if (response.status == \'ok\') {
                                printMessage(\'notice\', response.message_text);
                            } else {
                                printMessage(\'error\', response.message_text);
                                element.prop(\'checked\', false);
                            }
                        }
                    }
                );
            });

            $(\'label.switcher-featured input[type="checkbox"]\').change(function() {
                var element = $(this);
                var id = $(this).val();
                var status = $(this).is(\':checked\') ? \'featured\': \'standard\';

                $.getJSON(
                    rlConfig[\'ajax_url\'],
                    {mode: \'changeListingFeaturedStatus\', item: id, value: status, lang: rlLang},
                    function(response) {
                        if (response) {
                            if (response.status == \'ok\') {
                                if (status == \'featured\') {
                                    $(\'article#listing_\' + id).addClass(\'featured\');
                                    $(\'article#listing_\'+ id +\' div.nav div.info .picture\').prepend(\'<div class="label"><div title="'; ?>
<?php echo $this->_tpl_vars['lang']['featured']; ?>
<?php echo '">'; ?>
<?php echo $this->_tpl_vars['lang']['featured']; ?>
<?php echo '</div></div></div>\');
                                } else {
                                    $(\'article#listing_\'+ id +\' div.nav div.info .picture\').find(\'div.label\').remove();
                                    $(\'article#listing_\' + id).removeClass(\'featured\');
                                }
                                printMessage(\'notice\', response.message_text);
                            } else {
                                printMessage(\'error\', response.message_text);
                                if (element.is(\':checked\')) {
                                    element.prop(\'checked\', false);
                                } else {
                                    element.prop(\'checked\', \'checked\');
                                }
                            }
                        }
                    }
                );
            });
            
            // Quote System - View listing quotes
            window.viewListingQuotes = function(listingId) {
                $.ajax({
                    url: \''; ?>
<?php echo $this->_tpl_vars['rlBase']; ?>
<?php echo 'quote_ajax.php\',
                    method: \'POST\',
                    data: {
                        action: \'get_listing_quotes\',
                        listing_id: listingId
                    },
                    dataType: \'json\',
                    success: function(response) {
                                                    if (response.success && response.quotes) {
                                var html = \'<div style="max-height: 600px; overflow-y: auto; color: #333; font-family: Arial, sans-serif;">\';
                                html += \'<h4 style="color: #333; margin-bottom: 20px; border-bottom: 2px solid #007bff; padding-bottom: 10px;">İlan Teklifleri (\' + response.quotes.length + \')</h4>\';
                                
                                for (var i = 0; i < response.quotes.length; i++) {
                                    var quote = response.quotes[i];
                                    html += \'<div style="border: 1px solid #ddd; margin: 15px 0; padding: 20px; border-radius: 8px; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">\';
                                    html += \'<div style="display: flex; justify-content: space-between; margin-bottom: 15px; align-items: center;">\';
                                    html += \'<strong style="color: #333; font-size: 16px;">👤 \' + quote.requester_name + \'</strong>\';
                                    html += \'<span style="color: #666; font-size: 12px; background: #f8f9fa; padding: 4px 8px; border-radius: 4px;">ID: \' + (quote.created_at || quote.id) + \'</span>\';
                                    html += \'</div>\';
                                    
                                    html += \'<div style="margin-bottom: 10px; color: #333;"><strong>📧 Email:</strong> <span style="color: #007bff;">\' + quote.requester_email + \'</span></div>\';
                                    if (quote.requester_phone) {
                                        html += \'<div style="margin-bottom: 10px; color: #333;"><strong>📞 Telefon:</strong> <span style="color: #28a745;">\' + quote.requester_phone + \'</span></div>\';
                                    }
                                    
                                    if (quote.form_data_parsed) {
                                        html += \'<div style="margin-top: 15px; color: #333;"><strong>📋 Teklif Detayları:</strong></div>\';
                                        html += \'<div style="background: #f8f9fa; padding: 15px; margin-top: 8px; border-radius: 6px; border-left: 4px solid #007bff;">\';
                                        
                                        // Field translations
                                        var fieldLabels = {
                                            // Nakliye alanları
                                            \'room_count\': \'Oda Sayısı\',
                                            \'old_house_access\': \'Eski Ev Erişimi\',
                                            \'new_house_access\': \'Yeni Ev Erişimi\',
                                            \'packing_help\': \'Paketleme Yardımı\',
                                            \'insurance\': \'Sigorta\',
                                            \'additional_info\': \'Ek Bilgiler\',
                                            \'old_address_city\': \'Eski Adres - İl\',
                                            \'old_address_district\': \'Eski Adres - İlçe\',
                                            \'old_address_neighborhood\': \'Eski Adres - Mahalle\',
                                            \'new_address_city\': \'Yeni Adres - İl\',
                                            \'new_address_district\': \'Yeni Adres - İlçe\',
                                            \'new_address_neighborhood\': \'Yeni Adres - Mahalle\',
                                            \'moving_time\': \'Taşınma Zamanı\',
                                            \'moving_date\': \'Taşınma Tarihi\',
                                            \'moving_time_hour\': \'Taşınma Saati\',
                                            // Temizlik alanları
                                            \'house_size\': \'Ev Büyüklüğü\',
                                            \'bathroom_count\': \'Banyo Sayısı\',
                                            \'cleaning_hours\': \'Temizlik Saati\',
                                            \'cleaning_frequency\': \'Temizlik Sıklığı\',
                                            \'pets\': \'Evcil Hayvan\',
                                            \'special_notes\': \'Özel Notlar\',
                                            \'address_city\': \'Şehir\',
                                            \'address_district\': \'İlçe\',
                                            \'address_neighborhood\': \'Mahalle\',
                                            \'address_details\': \'Adres Detayları\',
                                            \'cleaning_date\': \'Temizlik Tarihi\',
                                            // Uluslararası nakliye alanları
                                            \'transport_type\': \'Nakliyat Türü\',
                                            \'from_country\': \'Hangi Ülkeden\',
                                            \'to_country\': \'Hangi Ülkeye\',
                                            \'cargo_volume\': \'Eşya Hacmi (m³)\',
                                            \'package_volume\': \'Gönderi Hacmi\',
                                            \'package_weight\': \'Ağırlık\',
                                            \'cargo_to_country\': \'Gönderilecek Ülke\',
                                            \'cargo_from_country\': \'Gönderen Ülke\',
                                            \'cargo_type\': \'Kargo Tipi\',
                                            \'cargo_notes\': \'Kargo Notları\',
                                            \'logistics_details\': \'Lojistik Detayları\',
                                            \'international_cargo_details\': \'Uluslararası Kargo Detayları\',
                                            \'service_city\': \'Hizmet Şehri\',
                                            \'service_district\': \'Hizmet İlçesi\',
                                            \'service_neighborhood\': \'Hizmet Mahallesi\',
                                            \'when_needed\': \'Ne Zaman\',
                                            \'specific_date\': \'Belirli Tarih\',
                                            // Ortak alanlar
                                            \'full_name\': \'Ad Soyad\',
                                            \'phone\': \'Telefon\',
                                            \'email\': \'Email\',
                                            \'whatsapp_contact\': \'WhatsApp İletişimi\',
                                            \'details\': \'Detaylar\'
                                        };
                                        
                                        // Value translations  
                                        var valueLabels = {
                                            // Nakliye değerleri
                                            \'1+1\': \'1+1\',
                                            \'2+1\': \'2+1\', 
                                            \'3+1\': \'3+1\',
                                            \'4+1\': \'4+1\',
                                            \'5+1\': \'5+1\',
                                            \'bigger\': \'Daha büyük\',
                                            \'few_items\': \'Sadece birkaç eşya\',
                                            \'ground_floor\': \'Giriş katında\',
                                            \'basement\': \'Zemin altında\',
                                            \'stairs_1_3\': \'Merdiven 1-3 kat\',
                                            \'stairs_4_plus\': \'Merdiven 4+ kat\',
                                            \'building_elevator\': \'Bina asansörü\',
                                            \'cargo_elevator\': \'Yük asansörü\',
                                            \'modular_elevator\': \'Modüler asansör\',
                                            \'all_packing\': \'Tüm paketleme\',
                                            \'furniture_only\': \'Sadece mobilya\',
                                            \'no_packing\': \'Paketleme yok\',
                                            \'20k\': \'20.000 TL\',
                                            \'50k\': \'50.000 TL\',
                                            \'100k\': \'100.000 TL\',
                                            \'within_3_weeks\': \'3 hafta içinde\',
                                            \'within_2_months\': \'2 ay içinde\',
                                            \'within_6_months\': \'6 ay içinde\',
                                            \'just_checking\': \'Sadece fiyat bakıyorum\',
                                            // Temizlik değerleri
                                            \'1+0\': \'1+0\',
                                            \'1\': \'1\',
                                            \'2\': \'2\',
                                            \'3\': \'3\',
                                            \'4\': \'4+\',
                                            \'4 saat\': \'4 saat\',
                                            \'5 saat\': \'5 saat\',
                                            \'6 saat\': \'6 saat\',
                                            \'7 saat\': \'7 saat\',
                                            \'8 saat\': \'8 saat\',
                                            \'weekly\': \'Haftalık\',
                                            \'biweekly\': \'2 Haftada 1\',
                                            \'once\': \'Tek Sefer\',
                                            \'none\': \'Hayır\',
                                            \'dog\': \'Köpek var\',
                                            \'cat\': \'Kedi var\',
                                            \'both\': \'Köpek ve kedi var\',
                                            // Uluslararası nakliye değerleri
                                            \'house_to_house\': \'Uluslararası evden eve nakliyat\',
                                            \'cargo\': \'Yurtdışı kargo\',
                                            \'vehicle_transport\': \'Uluslararası araç taşıma\',
                                            \'logistics\': \'Uluslararası lojistik\',
                                            \'turkey\': \'Türkiye\',
                                            \'germany\': \'Almanya\',
                                            \'netherlands\': \'Hollanda\',
                                            \'france\': \'Fransa\',
                                            \'belgium\': \'Belçika\',
                                            \'usa\': \'A.B.D.\',
                                            \'uk\': \'İngiltere\',
                                            \'austria\': \'Avusturya\',
                                            \'switzerland\': \'İsviçre\',
                                            \'kktc\': \'K.K.T.C.\',
                                            \'uae\': \'Birleşik Arap Emirlikleri\',
                                            \'russia\': \'Rusya\',
                                            \'italy\': \'İtalya\',
                                            \'canada\': \'Kanada\',
                                            \'montenegro\': \'Karadağ\',
                                            \'sweden\': \'İsveç\',
                                            \'azerbaijan\': \'Azerbaycan\',
                                            \'5_or_less\': \'5 veya daha az\',
                                            \'80_or_more\': \'80 veya daha fazla\',
                                            \'very_small\': \'20 x 10 x 5 cm veya daha az\',
                                            \'small\': \'30 x 20 x 10 cm\',
                                            \'medium\': \'40 x 25 x 10 cm\',
                                            \'large\': \'50 x 27 x 27 cm\',
                                            \'xl\': \'50 x 40 x 40 cm\',
                                            \'xxl\': \'70 x 40 x 40 cm\',
                                            \'xxxl\': \'80 x 60 x 60 cm\',
                                            \'huge\': \'100 x 80 x 80 cm\',
                                            \'1m3\': \'1 m³\',
                                            \'2m3\': \'2 m³\',
                                            \'3m3\': \'3 m³\',
                                            \'4m3\': \'4 m³\',
                                            \'5m3_plus\': \'5 m³ veya daha fazla\',
                                            \'0_1kg\': \'0.1 kg\',
                                            \'0_5kg\': \'0.5 kg\',
                                            \'1kg\': \'1 kg\',
                                            \'5kg\': \'5 kg\',
                                            \'10kg\': \'10 kg\',
                                            \'20kg\': \'20 kg\',
                                            \'50kg\': \'50 kg\',
                                            \'100kg\': \'100 kg\',
                                            \'150kg_plus\': \'150 kg veya daha fazla\',
                                            \'personal\': \'Özel kargo\',
                                            \'commercial\': \'Ticari kargo\',
                                            \'other\': \'Diğer\',
                                            // Ortak değerler
                                            \'no\': \'Hayır\',
                                            \'yes\': \'Evet\'
                                        };
                                        
                                        for (var key in quote.form_data_parsed) {
                                            if (quote.form_data_parsed[key]) {
                                                var label = fieldLabels[key] || key;
                                                var value = valueLabels[quote.form_data_parsed[key]] || quote.form_data_parsed[key];
                                                html += \'<div style="margin-bottom: 8px; color: #333;"><strong style="color: #495057;">\' + label + \':</strong> <span style="color: #333;">\' + value + \'</span></div>\';
                                            }
                                        }
                                        html += \'</div>\';
                                    }
                                    
                                    if (quote.quote_message) {
                                        html += \'<div style="margin-top: 15px; color: #333;"><strong>💬 Ek Mesaj:</strong></div>\';
                                        html += \'<div style="background: #e8f4fd; padding: 15px; margin-top: 8px; border-radius: 6px; border-left: 4px solid #17a2b8; color: #333; font-style: italic;">\' + quote.quote_message + \'</div>\';
                                    }
                                    html += \'</div>\';
                                }
                                html += \'</div>\';
                            
                            // Show in modal - Try multiple modal methods
                            var modalShown = false;
                            
                            // Try flModal first
                            if (typeof flModal !== \'undefined\') {
                                $(document.body).flModal({
                                    content: html,
                                    width: \'80%\',
                                    height: \'70%\',
                                    caption: \'Teklif Detayları\'
                                });
                                modalShown = true;
                            }
                            // Try jQuery modal if available
                            else if (typeof $.fn.modal !== \'undefined\') {
                                var modalHtml = \'<div class="modal fade" id="quotesModal" tabindex="-1">\';
                                modalHtml += \'<div class="modal-dialog modal-lg">\';
                                modalHtml += \'<div class="modal-content">\';
                                modalHtml += \'<div class="modal-header">\';
                                modalHtml += \'<h5 class="modal-title">Teklif Detayları</h5>\';
                                modalHtml += \'<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>\';
                                modalHtml += \'</div>\';
                                modalHtml += \'<div class="modal-body">\' + html + \'</div>\';
                                modalHtml += \'</div></div></div>\';
                                
                                $(\'body\').append(modalHtml);
                                $(\'#quotesModal\').modal(\'show\');
                                $(\'#quotesModal\').on(\'hidden.bs.modal\', function() {
                                    $(this).remove();
                                });
                                modalShown = true;
                            }
                            // Fallback: Simple custom modal
                            else {
                                var overlay = \'<div id="simple-quotes-modal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 10000; display: flex; align-items: center; justify-content: center;">\';
                                overlay += \'<div style="background: white; width: 85%; max-width: 1000px; height: 80%; max-height: 800px; border-radius: 12px; overflow: hidden; position: relative; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">\';
                                overlay += \'<div style="padding: 20px; background: #f8f9fa; border-bottom: 1px solid #dee2e6; display: flex; justify-content: space-between; align-items: center;">\';
                                overlay += \'<h5 style="margin: 0; color: #333; font-size: 18px;">📋 Teklif Detayları</h5>\';
                                overlay += \'<button onclick="document.getElementById(\\\'simple-quotes-modal\\\').remove()" style="background: #dc3545; color: white; border: none; width: 30px; height: 30px; border-radius: 50%; font-size: 18px; cursor: pointer; display: flex; align-items: center; justify-content: center;">&times;</button>\';
                                overlay += \'</div>\';
                                overlay += \'<div style="padding: 25px; overflow-y: auto; height: calc(100% - 80px);">\' + html + \'</div>\';
                                overlay += \'</div></div>\';
                                
                                $(\'body\').append(overlay);
                                modalShown = true;
                            }
                            
                            // Mark quotes as read
                            $.post(\''; ?>
<?php echo $this->_tpl_vars['rlBase']; ?>
<?php echo 'quote_ajax.php\', {
                                action: \'mark_quotes_read\',
                                listing_id: listingId
                            });
                            
                            // Update UI - remove new quote badges
                            $(\'#listing_\' + listingId + \' .badge\').remove();
                            
                        } else {
                            alert(\'Teklifler yüklenirken hata oluştu.\');
                        }
                    },
                    error: function() {
                        alert(\'Teklifler yüklenirken hata oluştu.\');
                    }
                });
            };
        });
        '; ?>

    </script>
<?php else: ?>
    <div class="info">
        <?php if ($this->_tpl_vars['pages']['add_listing']): ?>
            <?php $this->assign('link', ((is_array($_tmp=((is_array($_tmp='<a href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['add_listing_href']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['add_listing_href'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['no_listings_here'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.+)\]/', $this->_tpl_vars['link']) : smarty_modifier_regex_replace($_tmp, '/\[(.+)\]/', $this->_tpl_vars['link'])); ?>

        <?php else: ?>
            <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'no_listings_found_deny_posting','db_check' => 'true'), $this);?>

        <?php endif; ?>
    </div>
<?php endif; ?>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'myListingsBottom'), $this);?>


<?php if ($this->_tpl_vars['hasSubscriptions']): ?>
    <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'js/subscription.js') : smarty_modifier_cat($_tmp, 'js/subscription.js')),'id' => 'subscription'), $this);?>

<?php endif; ?>

<!-- my listings end -->