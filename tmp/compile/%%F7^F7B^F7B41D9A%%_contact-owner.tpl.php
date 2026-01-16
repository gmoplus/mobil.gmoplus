<?php /* Smarty version 2.6.31, created on 2025-07-28 15:36:17
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/contact-owner/_contact-owner.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/contact-owner/_contact-owner.tpl', 6, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/contact-owner/_contact-owner.tpl', 12, false),array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/contact-owner/_contact-owner.tpl', 99, false),)), $this); ?>
<!-- Contact Owner buttons handler -->

<div class="d-none hidden-contact-form">
    <div class="tmp-dom w-100">
        <?php if ($this->_tpl_vars['allow_send_message']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'contact_seller_form.tpl') : smarty_modifier_cat($_tmp, 'contact_seller_form.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php else: ?>
            <div class="restricted-content">
                <?php if ($this->_tpl_vars['isLogin']): ?>
                    <p><?php echo $this->_tpl_vars['lang']['contact_form_not_available']; ?>
</p>
                    <span>
                        <a class="button" title="<?php echo $this->_tpl_vars['lang']['registration']; ?>
" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'my_profile'), $this);?>
#membership"><?php echo $this->_tpl_vars['lang']['change_plan']; ?>
</a>
                    </span>
                <?php else: ?>
                    <p style="margin-bottom: 20px;"><?php echo $this->_tpl_vars['lang']['contact_owner_hint']; ?>
</p>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'login_modal.tpl') : smarty_modifier_cat($_tmp, 'login_modal.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Quote Form Modal Content -->
<div id="quote-form-source" class="d-none">
    <div class="tmp-dom w-100">
        <div id="quote-form-container">
            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Yükleniyor...</span>
                </div>
                <p class="mt-2">Form yükleniyor...</p>
            </div>
        </div>
    </div>
</div>

<?php if ($this->_tpl_vars['allow_send_message']): ?>
<script>
<?php echo '

$(\'body\').on(\'submit\', \'form[name=contact_owner]\', function(){
    var $form = $(this);
    var $button = $form.find(\'input[type=submit]\');
    var listingID = $form.data(\'listing-id\');
    var accountID = $form.data(\'account-id\');
    var boxID = $form.data(\'box-id\');

    $button.val(lang[\'loading\']);

    if ($form.closest(\'.popup\').length) {
        $form.find(\'input,textarea\').focus(function(){
            $(this).removeClass(\'error\');
        });
    }

    var data = {
        mode:         \'contactOwner\',
        name:          $form.find(\'input[name=contact_name]\').val(),
        email:         $form.find(\'input[name=contact_email]\').val(),
        phone:         $form.find(\'input[name=contact_phone]\').val(),
        message:       $form.find(\'textarea[name=contact_message]\').val(),
        security_code: $form.find(\'input[name^=security_code]\').val(),
        listing_id:    listingID,
        account_id:    accountID,
        box_index:     boxID
    };
    flUtil.ajax(data, function(response, status){
        if (status == \'success\') {
            if (response.status == \'ok\') {
                $(\'#modal_block > div.inner > div.close\').trigger(\'click\');
                $form.closest(\'.popup\').find(\'.close\').trigger(\'click\');

                printMessage(\'notice\', response.message_text);

                $form.find(\'img[class^=contact_code_]\').trigger(\'click\');
                $form.find(\'input[type=reset]\').trigger(\'click\');
            } else {
                if ($form.closest(\'.popup\').length) {
                    $form.find(response.error_fields).addClass(\'error\');
                } else {
                    printMessage(\'error\', response.message_text, response.error_fields);
                }
            }

            $button.val($button.data(\'phrase\'));
        } else {
            printMessage(\'error\', lang[\'system_error\']);
        }
    });

    return false;
});

'; ?>

</script>
<?php endif; ?>

<script>
lang['contact_owner'] = "<?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'contact_owner'), $this);?>
";

<?php echo '
// Load contact owner functionality first
if (typeof flUtil !== \'undefined\') {
flUtil.loadStyle(rlConfig[\'tpl_base\'] + \'components/popup/popup.css\');
flUtil.loadScript(rlConfig[\'tpl_base\'] + \'components/popup/_popup.js\', function(){
    $(\'.contact-owner\').popup({
        width: 345,
        caption: lang[\'contact_owner\'],
        onShow: function($interface) {
            $(\'.hidden-contact-form > .tmp-dom\').appendTo($interface.find(\'.body\'));
            flynaxTpl.setupTextarea();
        },
        onClose: function($interface) {
            $interface.find(\'.body > *\').appendTo($(\'.hidden-contact-form\'));
            this.destroy();
        }
    });
    });
}

// Quote System Implementation
var QuoteSystem = {
    listingId: parseInt($(\'#quote-request-btn\').data(\'listing-id\')) || 0,
    categoryId: parseInt($(\'#quote-request-btn\').data(\'category-id\')) || 0,
    baseUrl: \''; ?>
<?php echo $this->_tpl_vars['rlBase']; ?>
<?php echo '\',
    modalLoading: false,
    isSubmitting: false,
    
    init: function() {
        this.modalLoading = false; // Reset loading flag
        if (this.listingId) {
            this.checkAvailability();
            this.bindEvents();
        }
    },
    
    checkAvailability: function() {
        var self = this;
        
        console.log(\'Quote System Debug:\');
        console.log(\'- Listing ID:\', self.listingId);
        console.log(\'- Category ID:\', self.categoryId);
        console.log(\'- Base URL:\', self.baseUrl);
        console.log(\'- Full AJAX URL:\', self.baseUrl + \'quote_ajax.php\');
        
        $.ajax({
            url: self.baseUrl + \'quote_ajax.php\',
            method: \'POST\',
            data: {
                action: \'check_availability\',
                listing_id: self.listingId
            },
            dataType: \'json\',
            success: function(response) {
                console.log(\'AJAX Success Response:\', response);
                if (response.success && response.data.available) {
                    $(\'#quote-request-btn\').show();
                    console.log(\'✅ Quote button shown for listing:\', self.listingId);
                } else {
                    console.log(\'❌ Quote form not available for this listing\');
                }
            },
            error: function(xhr, status, error) {
                console.error(\'❌ Quote availability check failed:\');
                console.error(\'- Status:\', status);
                console.error(\'- Error:\', error);
                console.error(\'- Response:\', xhr.responseText);
                console.error(\'- URL:\', self.baseUrl + \'quote_ajax.php\');
            }
        });
    },
    
    bindEvents: function() {
        var self = this;
        
        // Quote button click - using flModal
        $(\'#quote-request-btn\').on(\'click\', function() {
            self.openQuoteForm();
        });
        
        // Quote form submit
        $(document).on(\'submit\', \'#quote-form\', function(e) {
            e.preventDefault();
            self.submitQuote();
        });
    },
    
    openQuoteForm: function() {
        var self = this;
        
        console.log(\'🔘 Opening quote form, modalLoading:\', self.modalLoading);
        
        // Prevent double clicks - but allow after timeout
        if (self.modalLoading) {
            console.log(\'⚠️ Modal already loading, ignoring click\');
            return;
        }
        
        // Reset loading flag after 2 seconds as fallback
        setTimeout(function() {
            if (self.modalLoading) {
                console.log(\'🔄 Auto-resetting modalLoading flag after timeout\');
                self.modalLoading = false;
            }
        }, 2000);
        
        // Check if modal already exists
        if ($(\'#quote-overlay\').length > 0 || $(\'#modal_block\').length > 0) {
            console.log(\'⚠️ Modal already exists, ignoring click\');
            return;
        }
        
        self.modalLoading = true;
        
        // Check flModal availability
        console.log(\'🔍 Checking flModal availability:\', typeof $.fn.flModal);
        console.log(\'🔍 jQuery available:\', typeof $);
        
        // Always use simple modal for now to avoid flModal issues
        console.log(\'🔧 Using simple modal (forced)\');
        self.createSimpleModal();
    },
    
    createSimpleModal: function() {
        var self = this;
        
        console.log(\'🏗️ Creating simple modal\');
        
        // Create overlay
        var $overlay = $(\'<div id="quote-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999;">\');
        var $modal = $(\'<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #ffffff; color: #333333; padding: 20px; border-radius: 8px; max-width: 700px; width: 90%; max-height: 85%; overflow-y: auto; z-index: 10000; border: 1px solid #ddd; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">\');
        
        // Add close button
        var $closeBtn = $(\'<button type="button" style="position: absolute; top: 10px; right: 15px; background: #f8f9fa; border: 1px solid #ddd; color: #333; font-size: 18px; cursor: pointer; border-radius: 4px; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">&times;</button>\');
        $closeBtn.click(function() {
            self.modalLoading = false;
            $overlay.remove();
        });
        
        // Add title
        var $title = $(\'<h4 style="margin-top: 0;">Teklif Al</h4>\');
        
        // Add form container directly
        var $container = $(\'<div id="quote-form-container"><div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Yükleniyor...</span></div><p class="mt-2">Form yükleniyor...</p></div></div>\');
        
        $modal.append($closeBtn, $title, $container);
        $overlay.append($modal);
        $(\'body\').append($overlay);
        
        // Load form data
        console.log(\'About to load form for simple modal\');
        self.loadForm($modal);
        
        // Show modal first, then load form
        setTimeout(function() {
            console.log(\'📺 Modal displayed, now ready for interactions\');
        }, 100);
        
        // Close on overlay click
        $overlay.click(function(e) {
            if (e.target === this) {
                self.modalLoading = false;
                $(this).remove();
            }
        });
    },
    
    loadForm: function($interface) {
        var self = this;
        
        console.log(\'🔄 Loading form for listing:\', self.listingId);
        console.log(\'🔍 Interface type:\', $interface.attr(\'id\') || \'unknown\');
        
        $.ajax({
            url: self.baseUrl + \'quote_ajax.php\',
            method: \'POST\',
            data: {
                action: \'get_form\',
                listing_id: self.listingId
            },
            dataType: \'json\',
            success: function(response) {
                // If response is string, try to parse it
                if (typeof response === \'string\') {
                    try {
                        response = JSON.parse(response);
                        console.log(\'📥 Parsed string response to JSON\');
                    } catch (e) {
                        console.error(\'❌ Failed to parse response:\', e);
                        console.log(\'📥 Raw response:\', response);
                        return;
                    }
                }
                
                console.log(\'📥 Form load response:\', response);
                console.log(\'📥 Response type:\', typeof response);
                console.log(\'📥 Response keys:\', Object.keys(response || {}));
                
                if (response.success && response.data) {
                    console.log(\'✅ Valid response, calling renderForm\');
                    self.renderForm(response.data, $interface);
                    self.modalLoading = false; // Reset loading flag after successful form load
                } else {
                    console.log(\'❌ Invalid response:\', response);
                    self.modalLoading = false; // Reset loading flag on error
                    // Find the container in different ways
                    var $container = $interface.find(\'#quote-form-container\');
                    if (!$container.length) {
                        $container = $interface.find(\'.tmp-dom\');
                    }
                    if (!$container.length) {
                        $container = $interface;
                    }
                    
                    $container.html(
                        \'<div class="alert alert-danger">\' + 
                        (response.error || \'Form yüklenemedi\') + 
                        \'</div>\'
                    );
                }
            },
            error: function(xhr, status, error) {
                console.error(\'❌ AJAX Error:\', status, error);
                self.modalLoading = false; // Reset loading flag on error
                
                // Find the container in different ways
                var $container = $interface.find(\'#quote-form-container\');
                if (!$container.length) {
                    $container = $interface.find(\'.tmp-dom\');
                }
                if (!$container.length) {
                    $container = $interface;
                }
                
                $container.html(
                    \'<div class="alert alert-danger">Form yüklenirken hata oluştu: \' + error + \'</div>\'
                );
            }
        });
    },
    
    renderForm: function(formData, $interface) {
        var self = this;
        
        console.log(\'🎨 Rendering form with data:\', formData);
        console.log(\'🔍 Looking for container in interface...\');
        
        // Find the container in different ways
        var $container = $interface.find(\'#quote-form-container\');
        if (!$container.length) {
            $container = $interface.find(\'.tmp-dom\');
        }
        if (!$container.length) {
            $container = $interface;
        }
        
        console.log(\'📦 Container found:\', $container.length > 0 ? \'YES\' : \'NO\');
        
        var html = \'<style>#quote-form { background: #ffffff !important; color: #333333 !important; } \';
        html += \'#quote-form .form-control { background: #ffffff !important; color: #333333 !important; border: 1px solid #ced4da !important; } \';
        html += \'#quote-form .form-control:focus { background: #ffffff !important; color: #333333 !important; border-color: #007bff !important; box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25) !important; } \';
        html += \'#quote-form label { color: #333333 !important; font-weight: 500; margin-bottom: 5px; } \';
        html += \'#quote-form .text-danger { color: #dc3545 !important; } \';
        html += \'#quote-form .btn { border: 1px solid; padding: 8px 16px; border-radius: 4px; } \';
        html += \'#quote-form .btn-secondary { background: #6c757d !important; color: #ffffff !important; border-color: #6c757d !important; } \';
        html += \'#quote-form .btn-success { background: #28a745 !important; color: #ffffff !important; border-color: #28a745 !important; } \';
        html += \'#quote-form .alert-danger { background: #f8d7da !important; color: #721c24 !important; border: 1px solid #f5c6cb !important; } \';
        html += \'#quote-form h5, #quote-form h6 { color: #333333 !important; } \';
        html += \'#quote-form p { color: #666666 !important; } \';
        html += \'#quote-form .form-text { color: #6c757d !important; } \';
        html += \'#quote-form select option { background: #ffffff !important; color: #333333 !important; } \';
        html += \'</style>\';
        
        html += \'<form id="quote-form" class="quote-form">\';
        html += \'<input type="hidden" name="form_id" value="\' + formData.id + \'">\';
        html += \'<input type="hidden" name="listing_id" value="\' + self.listingId + \'">\';
        html += \'<input type="hidden" name="category_id" value="\' + self.categoryId + \'">\';
        
        // Form title and description
        if (formData.title) {
            html += \'<h5>\' + formData.title + \'</h5>\';
        }
        if (formData.description) {
            html += \'<p>\' + formData.description + \'</p>\';
        }
        
        // Basic contact information
        html += \'<div class="row">\';
        html += \'<div class="col-md-6">\';
        html += \'<div class="form-group" style="margin-bottom: 15px;">\';
        html += \'<label for="requester_name" style="display: block; margin-bottom: 5px;">Ad Soyad <span class="text-danger">*</span></label>\';
        html += \'<input type="text" class="form-control" id="requester_name" name="requester_name" required style="width: 100%; padding: 8px 12px;">\';
        html += \'</div>\';
        html += \'</div>\';
        html += \'<div class="col-md-6">\';
        html += \'<div class="form-group" style="margin-bottom: 15px;">\';
        html += \'<label for="requester_email" style="display: block; margin-bottom: 5px;">Email <span class="text-danger">*</span></label>\';
        html += \'<input type="email" class="form-control" id="requester_email" name="requester_email" required style="width: 100%; padding: 8px 12px;">\';
        html += \'</div>\';
        html += \'</div>\';
        html += \'</div>\';
        
        html += \'<div class="form-group" style="margin-bottom: 15px;">\';
        html += \'<label for="requester_phone" style="display: block; margin-bottom: 5px;">Telefon</label>\';
        html += \'<input type="tel" class="form-control" id="requester_phone" name="requester_phone" style="width: 100%; padding: 8px 12px;">\';
        html += \'</div>\';
        
        // Dynamic form fields
        if (formData.fields && formData.fields.length > 0) {
            html += \'<hr><h6>Teklif Detayları</h6>\';
            
            for (var i = 0; i < formData.fields.length; i++) {
                var field = formData.fields[i];
                html += \'<div class="form-group" style="margin-bottom: 15px;">\';
                html += \'<label for="field_\' + field.field_key + \'" style="display: block; margin-bottom: 5px;">\';
                html += field.field_name;
                if (field.is_required == 1) html += \' <span class="text-danger">*</span>\';
                html += \'</label>\';
                
                if (field.field_type === \'text\') {
                    html += \'<input type="text" class="form-control" id="field_\' + field.field_key + \'" name="form_data[\' + field.field_key + \']"\';
                    if (field.placeholder) html += \' placeholder="\' + field.placeholder + \'"\';
                    if (field.is_required == 1) html += \' required\';
                    html += \' style="width: 100%; padding: 8px 12px;">\';
                } else if (field.field_type === \'textarea\') {
                    html += \'<textarea class="form-control" id="field_\' + field.field_key + \'" name="form_data[\' + field.field_key + \']" rows="3"\';
                    if (field.placeholder) html += \' placeholder="\' + field.placeholder + \'"\';
                    if (field.is_required == 1) html += \' required\';
                    html += \' style="width: 100%; padding: 8px 12px; resize: vertical;"></textarea>\';
                } else if (field.field_type === \'select\' && field.options) {
                    html += \'<select class="form-control" id="field_\' + field.field_key + \'" name="form_data[\' + field.field_key + \']"\';
                    if (field.is_required == 1) html += \' required\';
                    html += \' style="width: 100%; padding: 8px 12px;">\';
                    html += \'<option value="">Seçiniz...</option>\';
                    
                    // Handle options object (JSON key-value pairs)
                    var options = field.options;
                    if (typeof options === \'string\') {
                        try {
                            options = JSON.parse(options);
                        } catch (e) {
                            console.log(\'Options parse error:\', e);
                            options = {};
                        }
                    }
                    
                    // If options is an object, iterate through key-value pairs
                    if (typeof options === \'object\' && options !== null) {
                        for (var optionKey in options) {
                            if (options.hasOwnProperty(optionKey)) {
                                var optionValue = options[optionKey];
                                html += \'<option value="\' + optionKey + \'">\' + optionValue + \'</option>\';
                            }
                        }
                    }
                    html += \'</select>\';
                } else if (field.field_type === \'number\') {
                    html += \'<input type="number" class="form-control" id="field_\' + field.field_key + \'" name="form_data[\' + field.field_key + \']"\';
                    if (field.placeholder) html += \' placeholder="\' + field.placeholder + \'"\';
                    if (field.is_required == 1) html += \' required\';
                    html += \' style="width: 100%; padding: 8px 12px;">\';
                } else if (field.field_type === \'email\') {
                    html += \'<input type="email" class="form-control" id="field_\' + field.field_key + \'" name="form_data[\' + field.field_key + \']"\';
                    if (field.placeholder) html += \' placeholder="\' + field.placeholder + \'"\';
                    if (field.is_required == 1) html += \' required\';
                    html += \' style="width: 100%; padding: 8px 12px;">\';
                } else if (field.field_type === \'phone\') {
                    html += \'<input type="tel" class="form-control" id="field_\' + field.field_key + \'" name="form_data[\' + field.field_key + \']"\';
                    if (field.placeholder) html += \' placeholder="\' + field.placeholder + \'"\';
                    if (field.is_required == 1) html += \' required\';
                    html += \' style="width: 100%; padding: 8px 12px;">\';
                } else if (field.field_type === \'date\') {
                    html += \'<input type="date" class="form-control" id="field_\' + field.field_key + \'" name="form_data[\' + field.field_key + \']"\';
                    if (field.is_required == 1) html += \' required\';
                    html += \' style="width: 100%; padding: 8px 12px;">\';
                }
                
                html += \'</div>\';
            }
        }
        
        // Message field
        html += \'<div class="form-group" style="margin-bottom: 15px;">\';
        html += \'<label for="quote_message" style="display: block; margin-bottom: 5px;">Ek Mesaj</label>\';
        html += \'<textarea class="form-control" id="quote_message" name="quote_message" rows="3" placeholder="Teklif ile ilgili ek detaylarınızı yazın..." style="width: 100%; padding: 8px 12px; resize: vertical;"></textarea>\';
        html += \'</div>\';
        

        
        html += \'<div class="text-right mt-3" style="margin-top: 20px; text-align: right;">\';
        html += \'<button type="button" class="btn btn-secondary mr-2" onclick="QuoteSystem.closeModal()" style="margin-right: 10px; padding: 10px 20px; font-size: 14px; border-radius: 4px;">İptal</button>\';
        html += \'<button type="submit" class="btn btn-success" style="padding: 10px 20px; font-size: 14px; border-radius: 4px;">Teklif Talebini Gönder</button>\';
        html += \'</div>\';
        
        html += \'</form>\';
        
        console.log(\'✅ Setting HTML to container\');
        console.log(\'📝 HTML length:\', html.length);
        console.log(\'📝 Container element:\', $container.get(0));
        $container.html(html);
        console.log(\'✅ HTML set, new container content length:\', $container.html().length);
        
        // Prevent double submission by removing any existing event listeners
        $(\'#quote-form\').off(\'submit.quote-system\').on(\'submit.quote-system\', function(e) {
            e.preventDefault();
            self.submitQuote();
        });
    },
    
    submitQuote: function() {
        var self = this;
        var $form = $(\'#quote-form\');
        
        // Prevent double submission
        if (self.isSubmitting) {
            console.log(\'⚠️ Already submitting, ignoring duplicate call\');
            return;
        }
        self.isSubmitting = true;
        
        var formData = $form.serialize() + \'&action=submit_quote\';
        
        var $submitBtn = $form.find(\'button[type="submit"]\');
        var originalText = $submitBtn.text();
        $submitBtn.text(\'Gönderiliyor...\').prop(\'disabled\', true);
        
        $.ajax({
            url: self.baseUrl + \'quote_ajax.php\',
            method: \'POST\',
            data: formData,
            dataType: \'json\',
            success: function(response) {
                self.isSubmitting = false; // Reset flag
                if (response.success) {
                    self.closeModal();
                    printMessage(\'notice\', \'Teklif talebiniz başarıyla gönderildi!\');
                } else {
                    var errorMsg = response.errors ? response.errors.join(\'\\n\') : (response.error || \'Teklif gönderilemedi\');
                    printMessage(\'error\', errorMsg);
                }
                $submitBtn.text(originalText).prop(\'disabled\', false);
            },
            error: function() {
                self.isSubmitting = false; // Reset flag
                printMessage(\'error\', \'Teklif gönderilirken hata oluştu\');
                $submitBtn.text(originalText).prop(\'disabled\', false);
            }
        });
    },
    
    closeModal: function() {
        var self = this;
        self.modalLoading = false;
        
        // Try flModal close first
        if ($(\'#modal_block\').length) {
            $(\'#modal_block .close\').trigger(\'click\');
        }
        // Try simple modal close
        if ($(\'#quote-overlay\').length) {
            $(\'#quote-overlay\').remove();
        }
    }
};

// Initialize when DOM is ready
$(document).ready(function() {
    QuoteSystem.init();
});

'; ?>

</script>

<!-- Contact Owner buttons handler end -->