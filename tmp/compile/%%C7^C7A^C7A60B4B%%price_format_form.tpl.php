<?php /* Smarty version 2.6.31, created on 2025-10-18 12:05:51
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/price_format_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'df', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/price_format_form.tpl', 4, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/price_format_form.tpl', 28, false),)), $this); ?>
<!-- shoppingCart plugin -->

<div id="shc-group" class="submit-cell hide w-100">
    <?php $this->assign('currency', ((is_array($_tmp='currency')) ? $this->_run_mod_handler('df', true, $_tmp) : smarty_modifier_df($_tmp))); ?>

    <div class="submit-cell">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_price_format']; ?>

            <span class="red">&nbsp;*</span>
        </div>
        <div class="field inline-fields">
            <?php $_from = $this->_tpl_vars['shcTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['FShcTabs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['FShcTabs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shcTab']):
        $this->_foreach['FShcTabs']['iteration']++;
?>
                <?php if ($this->_tpl_vars['shcTab']['module']): ?>
                    <?php if (( ! $_POST['fshc']['shc_mode'] && ($this->_foreach['FShcTabs']['iteration'] <= 1) ) || $_POST['fshc']['shc_mode'] == $this->_tpl_vars['shcTab']['module']): ?>
                        <?php $this->assign('shc_mode_active', $this->_tpl_vars['shcTab']['module']); ?>
                    <?php endif; ?>
                    <span class="custom-input mb-2">
                        <label>
                            <input <?php if ($this->_tpl_vars['isAuctionActive']): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['shc_mode_active'] == $this->_tpl_vars['shcTab']['module']): ?>checked="checked"<?php endif; ?> class="shc-mode" type="radio" name="fshc[shc_mode]" value="<?php echo $this->_tpl_vars['shcTab']['module']; ?>
" /><?php echo $this->_tpl_vars['shcTab']['name']; ?>

                        </label>
                    </span>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </div>
    </div>

    <div id="shc_fields_area">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart') : smarty_modifier_cat($_tmp, 'shoppingCart')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'view') : smarty_modifier_cat($_tmp, 'view')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'add_listing_fields.tpl') : smarty_modifier_cat($_tmp, 'add_listing_fields.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <?php if ($this->_tpl_vars['config']['shc_shipping_fields']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart') : smarty_modifier_cat($_tmp, 'shoppingCart')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'view') : smarty_modifier_cat($_tmp, 'view')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'add_listing_fields_shipping.tpl') : smarty_modifier_cat($_tmp, 'add_listing_fields_shipping.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <?php endif; ?>
</div>

<script class="fl-js-dynamic">
var shc_check_settings = <?php if ($this->_tpl_vars['config']['shc_method'] == 'multi'): ?>false<?php else: ?>true<?php endif; ?>;

var listing_field_price = '<?php echo $this->_tpl_vars['config']['price_tag_field']; ?>
';
var shc_mode = '<?php if ($_POST['fshc']['shc_mode']): ?><?php echo $_POST['fshc']['shc_mode']; ?>
<?php else: ?><?php echo $this->_tpl_vars['shc_mode_active']; ?>
<?php endif; ?>';
var isLogin = <?php if ($this->_tpl_vars['isLogin']): ?>true<?php else: ?>false<?php endif; ?>;
var isCommission = <?php if ($this->_tpl_vars['config']['shc_commission_enable'] && $this->_tpl_vars['config']['shc_method'] == 'multi'): ?>true<?php else: ?>false<?php endif; ?>;
lang['login'] = '<?php echo $this->_tpl_vars['lang']['login']; ?>
';
lang['sign_in'] = '<?php echo $this->_tpl_vars['lang']['sign_in']; ?>
';
lang['shc_buy_now'] = "<?php echo $this->_tpl_vars['lang']['shc_buy_now']; ?>
";

<?php echo '

$(document).ready(function() {
    if (listing_field_price == \'\') {
        printMessage(\'warning\', \''; ?>
<?php echo $this->_tpl_vars['lang']['shc_price_field_not_selected']; ?>
<?php echo '\');
    }
    else {
        shoppingCart.replaceFieldPrice(listing_field_price);
        
        $(\'#shc-group\').show().trigger(\'resize\');

        $(\'input[name="fshc[shc_mode]"]\').click(function() {
            shoppingCart.priceFormatTabs($(this).val());
        });

        $(\'input.quantity-unlimited\').change(function(){
            if ($(this).is(\':checked\')) {
                $(\'input[name="fshc[shc_quantity]"]\').attr(\'disabled\', true).addClass(\'disabled\').val(\'\');
            } else {
                $(\'input[name="fshc[shc_quantity]"]\').attr(\'disabled\', false).removeClass(\'disabled\');
            }
        });

        if (shc_mode) {
            shoppingCart.priceFormatTabs(shc_mode, true);
        }

        // calculate commission
        if (isCommission) {
            if ($(\'input.price-full\').val() != \'\') {
                if ($(\'input[name="fshc[shc_mode]"]:checked\').val() != \'listing\') {
                    shoppingCart.calculateCommission($(\'input.price-full\').val());
                }
            }
            if ($(\'input.price-start\').val() != \'\') {
                shoppingCart.calculateCommission($(\'input.price-start\').val(), \'start\');
            }
            $(\'input.price-full\').keyup(function() {
                if ($(\'input[name="fshc[shc_mode]"]:checked\').val() != \'listing\') {
                    if ($(this).val() != \'\') {
                        $(\'.price-item\').text($(this).val());
                        shoppingCart.calculateCommission($(this).val());
                    }
                }
            });
            $(\'input.price-full\').blur(function() {
                if ($(\'input[name="fshc[shc_mode]"]:checked\').val() != \'listing\') {
                    if ($(this).val() != \'\') {
                        $(\'.price-item\').text($(this).val());
                        shoppingCart.calculateCommission($(this).val());
                    }
                }
            });
            $(\'input.price-start\').keyup(function() {
                if ($(this).val() != \'\') {
                    shoppingCart.calculateCommission($(this).val(), \'start\');
                }
            });
            $(\'input.price-start\').blur(function() {
                if ($(this).val() != \'\') {
                    shoppingCart.calculateCommission($(this).val(), \'start\');
                }
            });
        }

        $(\'input[type="text"].qtip\').each(function() {
            $(this).attr(\'title\', \''; ?>
<?php echo $this->_tpl_vars['lang']['shc_cannot_edit_auction']; ?>
<?php echo '\');
        });
    }

    shoppingCart.controlDigitalProduct(
        $(\'input[name="fshc[digital]"]:checked\').val(), 
        shc_mode, 
        $(\'input[name="fshc[quantity_unlim]"]:checked\').val()
    );

    $(\'input[name="fshc[digital]"]\').click(function() {
        if ($(this).is(\':checked\') && $(this).val() == \'1\') {
            shoppingCart.controlDigitalProduct(1, $(\'input[name="fshc[shc_mode]"]:checked\').val(), true);
        } else {
            shoppingCart.controlDigitalProduct(0, $(\'input[name="fshc[shc_mode]"]:checked\').val());
        }
    });

    $(\'input.quantity-unlimited\').click(function() {
        if ($(this).is(\':checked\')) {
            $(\'input[name="fshc[shc_quantity]"]\').prop(\'readonly\', true);
        } else {
            $(\'input[name="fshc[shc_quantity]"]\').prop(\'readonly\', false);
        }
    });

    $(\'.delete-file-product\').click(function() {
        shoppingCart.deleteFile($(this).data(\'item\'));
    });
});

'; ?>

</script>

<!-- end shoppingCart plugin -->