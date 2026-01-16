<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:19
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/add_listing_fields_shipping.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/add_listing_fields_shipping.tpl', 3, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/add_listing_fields_shipping.tpl', 123, false),)), $this); ?>
<!-- shipping methods -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => 'shipping_details','name' => $this->_tpl_vars['lang']['shc_shipping_details'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="package_details">
    <div class="submit-cell clearfix">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_handling_time']; ?>

        </div>
        <div class="field single-field" id="sf_field_shc_handling_time">
            <select name="fshc[shc_handling_time]">
                <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                <?php $_from = $this->_tpl_vars['shc_handling_time']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['htime']):
?>
                    <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['key'] == $_POST['fshc']['shc_handling_time']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['htime']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </div>
    </div>
    <div class="submit-cell fixed">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_package_type']; ?>

        </div>
        <div class="field single-field" id="sf_field_shc_package_type">
            <select name="fshc[shc_package_type]">
                <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                <?php $_from = $this->_tpl_vars['shc_package_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['ptype']):
?>
                    <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['key'] == $_POST['fshc']['shc_package_type']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['ptype']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </div>
    </div>
    <div class="submit-cell fixed">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_weight']; ?>

        </div>
        <div class="field combo-field" id="sf_field_shc_bid_weight">
            <input class="numeric wauto" size="8" type="text" name="fshc[shc_weight]" maxlength="11" value="<?php if ($_POST['fshc']['shc_weight']): ?><?php echo $_POST['fshc']['shc_weight']; ?>
<?php else: ?>0<?php endif; ?>" />
            <?php $this->assign('shc_weight_unit', ((is_array($_tmp='shc_weight_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['config']['shc_weight_unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['config']['shc_weight_unit']))); ?>
            <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shc_weight_unit']]; ?>

        </div>
    </div>
    <div class="submit-cell">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_dimensions']; ?>

        </div>
        <div class="field combo-field" id="sf_field_shc_dimensions">
            <input type="text" class="numeric wauto mr-0" name="fshc[shc_dimensions][length]" value="<?php echo $_POST['fshc']['shc_dimensions']['length']; ?>
" size="7" />
            <span class="dimension-divider">x</span>
            <input type="text" class="numeric wauto mr-0" name="fshc[shc_dimensions][width]" value="<?php echo $_POST['fshc']['shc_dimensions']['width']; ?>
"  size="7" />
            <span class="dimension-divider">x</span>
            <input type="text" class="numeric wauto mr-0" name="fshc[shc_dimensions][height]" value="<?php echo $_POST['fshc']['shc_dimensions']['height']; ?>
" size="7" />
        </div>
    </div>
    <?php if ($this->_tpl_vars['config']['shc_shipping_step']): ?>
        <div class="submit-cell fixed">
            <div class="name">
                <?php echo $this->_tpl_vars['lang']['shc_shipping_price_type']; ?>

            </div>
            <div class="field inline-fields">
                <span class="custom-input"><label><input <?php if ($_POST['fshc']['shc_shipping_price_type'] == 'free' || ! $_POST['fshc']['shc_shipping_price_type']): ?>checked="checked"<?php endif; ?> class="shc-price-type" type="radio" name="fshc[shc_shipping_price_type]" value="free" /><?php echo $this->_tpl_vars['lang']['shc_shipping_price_type_free']; ?>
</label></span>
                <span class="custom-input"><label><input <?php if ($_POST['fshc']['shc_shipping_price_type'] == 'fixed'): ?>checked="checked"<?php endif; ?> class="shc-price-type" type="radio" name="fshc[shc_shipping_price_type]" value="fixed" /><?php if ($this->_tpl_vars['config']['shc_shipping_price_fixed'] == 'multi'): ?><?php echo $this->_tpl_vars['lang']['shc_fixed_price_multi']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['shc_shipping_price_type_fixed']; ?>
<?php endif; ?></label></span>
                <?php if ($this->_tpl_vars['is_calculated']): ?>
                    <span class="custom-input">
                        <label>
                            <input <?php if ($_POST['fshc']['shc_shipping_price_type'] == 'calculate'): ?>checked="checked"<?php endif; ?> class="shc-price-type" type="radio" name="fshc[shc_shipping_price_type]" value="calculate" />
                            <?php echo $this->_tpl_vars['lang']['shc_shipping_price_type_calculate']; ?>

                        </label>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <input type="hidden" name="fshc[shc_shipping_price_type]" value="free" />
    <?php endif; ?>
    <div class="submit-cell fixed <?php if ($_POST['fshc']['shc_shipping_price_type'] != 'fixed'): ?> hide<?php endif; ?>">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_shipping_price']; ?>

        </div>
        <div class="field combo-field" id="sf_field_shc_shipping_price">
            <?php if ($this->_tpl_vars['config']['shc_shipping_price_fixed'] == 'multi'): ?>
                <div class="fixed-prices">
                    <?php if ($_POST['fshc']['shc_shipping_fixed_prices']): ?>
                        <?php $_from = $_POST['fshc']['shc_shipping_fixed_prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['price_item']):
?>
                            <div class="price-item mb-2" data-index="<?php echo $this->_tpl_vars['key']; ?>
">
                                <input class="numeric wauto price mr-1" size="8" type="text" name="fshc[shc_shipping_fixed_prices][<?php echo $this->_tpl_vars['key']; ?>
][price]" maxlength="11" value="<?php echo $this->_tpl_vars['price_item']['price']; ?>
" />
                                <span class="shc-currency mr-2"><?php echo $this->_tpl_vars['defaultCurrencyName']; ?>
</span>
                                <input class="wauto" type="text" name="fshc[shc_shipping_fixed_prices][<?php echo $this->_tpl_vars['key']; ?>
][name]" value="<?php echo $this->_tpl_vars['price_item']['name']; ?>
" />
                                <a class="icon delete delete-price-item" data-index="<?php echo $this->_tpl_vars['key']; ?>
" href="javascript://"></a>
                            </div>
                        <?php endforeach; endif; unset($_from); ?>
                    <?php endif; ?>
                </div>
                <div><a href="javascript://" class="add-price-item pt-2 pb-3 d-inline-block"><?php echo $this->_tpl_vars['lang']['shc_add_price_item']; ?>
</a></div>
            <?php else: ?>
                <input class="numeric wauto" size="8" type="text" name="fshc[shc_shipping_price]" maxlength="11" value="<?php if ($_POST['fshc']['shc_shipping_price']): ?><?php echo $_POST['fshc']['shc_shipping_price']; ?>
<?php else: ?>0<?php endif; ?>" />
                <span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span>
            <?php endif; ?>
        </div>
    </div>
    <div class="submit-cell fixed <?php if ($_POST['fshc']['shc_shipping_price_type'] != 'fixed'): ?> hide<?php endif; ?>">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_shipping_discount']; ?>

            <img class="qtip" alt="" title="<?php echo $this->_tpl_vars['lang']['shc_shipping_discount_notice']; ?>
" id="fd_shc_shipping_discount" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
        </div>
        <div class="field combo-field" id="sf_field_shc_shipping_discount">
            <input class="numeric wauto" size="5" type="text" name="fshc[shc_shipping_discount]" maxlength="3" value="<?php if ($_POST['fshc']['shc_shipping_discount']): ?><?php echo $_POST['fshc']['shc_shipping_discount']; ?>
<?php else: ?>0<?php endif; ?>" />
            <span>%,&nbsp;</span>
            <span class="dimension-divider"><?php echo $this->_tpl_vars['lang']['shc_shipping_discount_at']; ?>
</span>
            <input class="numeric wauto" size="5" type="text" name="fshc[shc_shipping_discount_at]" maxlength="11" value="<?php if ($_POST['fshc']['shc_shipping_discount_at']): ?><?php echo $_POST['fshc']['shc_shipping_discount_at']; ?>
<?php else: ?>0<?php endif; ?>" />
        </div>
    </div>
    <div class="submit-cell fixed <?php if ($_POST['fshc']['shc_shipping_price_type'] != 'fixed' && $_POST['fshc']['shc_shipping_price_type'] != 'free' && ! empty ( $_POST['fshc']['shc_shipping_price_type'] )): ?> hide<?php endif; ?>">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_shipping_method']; ?>

            <?php if ($this->_tpl_vars['config']['shc_shipping_step']): ?>
                <span class="red">&nbsp;*</span>
            <?php endif; ?>
        </div>
        <div class="field checkbox-field" id="sf_field_shc_shipping_method">
            <?php if ($this->_tpl_vars['config']['shc_shipping_step']): ?>
                <span class="custom-input mr-3">
                    <label>
                        <input type="checkbox" <?php if (((is_array($_tmp='courier')) ? $this->_run_mod_handler('in_array', true, $_tmp, $_POST['fshc']['shipping_method_fixed']) : in_array($_tmp, $_POST['fshc']['shipping_method_fixed']))): ?>checked="checked"<?php endif; ?> name="fshc[shipping_method_fixed][]" value="courier" /><?php echo $this->_tpl_vars['lang']['shc_courier']; ?>

                    </label>
                </span>
                <span class="custom-input">
                    <label>
                        <input type="checkbox" <?php if (((is_array($_tmp='pickup')) ? $this->_run_mod_handler('in_array', true, $_tmp, $_POST['fshc']['shipping_method_fixed']) : in_array($_tmp, $_POST['fshc']['shipping_method_fixed']))): ?>checked="checked"<?php endif; ?> name="fshc[shipping_method_fixed][]" value="pickup" /><?php echo $this->_tpl_vars['lang']['shc_pickup']; ?>

                    </label>
                </span>
            <?php else: ?>
                <?php echo $this->_tpl_vars['lang']['shc_pickup']; ?>

                <input type="hidden" name="fshc[shipping_method_fixed][]" value="pickup" />
            <?php endif; ?>
        </div>
    </div>

    <div class="submit-cell hide" id="shipping-methods">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_shipping_price_type_calculate']; ?>

        </div>
        <div class="field">
            <?php $_from = $this->_tpl_vars['shipping_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['method']):
?>
                <div class="submit-cell clearfix">
                    <div class="name">
                        <label><input type="checkbox" <?php if ($_POST['shipping'][$this->_tpl_vars['method']['Key']]['enable']): ?>checked="checked"<?php endif; ?> name="shipping[<?php echo $this->_tpl_vars['method']['Key']; ?>
][enable]" value="1" class="enable-shipping-method" /><?php echo $this->_tpl_vars['method']['name']; ?>
</label>
                    </div>
                    <div class="field single-field hide">
                        <a href="javascript:;" class="button shipping-method-settings" data-settings="<?php echo $this->_tpl_vars['method']['Key']; ?>
" data-method-name="<?php echo $this->_tpl_vars['method']['name']; ?>
"><?php echo $this->_tpl_vars['lang']['manage']; ?>
</a>
                    </div>
                </div>
                <div id="shipping-method-settings-<?php echo $this->_tpl_vars['method']['Key']; ?>
" class="hide">
                    <div class="tmp-dom tmp-dom-<?php echo $this->_tpl_vars['method']['Key']; ?>
">
                        <div class="submit-cell clearfix">
                            <div class="name"><?php echo $this->_tpl_vars['lang']['shc_fixed_shipping_price']; ?>
</div>
                            <div class="field single-field">
                                <input type="text" class="wauto numeric shipping-fixed-price" size="8" name="shipping[<?php echo $this->_tpl_vars['method']['Key']; ?>
][price]" value="<?php if ($_POST['shipping'][$this->_tpl_vars['method']['Key']]['price']): ?><?php echo $_POST['shipping'][$this->_tpl_vars['method']['Key']]['price']; ?>
<?php else: ?>0<?php endif; ?>" id="shipping-fixed-price-<?php echo $this->_tpl_vars['method']['Key']; ?>
" />
                                <span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span>
                                <span style="display: block;">&nbsp;&nbsp;-<?php echo $this->_tpl_vars['lang']['or']; ?>
-&nbsp;&nbsp;</span>
                                <label>
                                    <input type="checkbox" class="shipping-auto-price" <?php if ($_POST['shipping'][$this->_tpl_vars['method']['Key']]['auto'] || ! $_POST['shipping'][$this->_tpl_vars['method']['Key']]['price']): ?>checked="checked"<?php endif; ?> name="shipping[<?php echo $this->_tpl_vars['method']['Key']; ?>
][auto]" value="1" /><?php echo $this->_tpl_vars['lang']['shc_auto_shipping_calculate']; ?>

                                </label>
                            </div>
                        </div>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping_methods_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['method']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['method']['Key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '/view/add_listing.tpl') : smarty_modifier_cat($_tmp, '/view/add_listing.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                        <div class="submit-cell buttons">
                            <div class="name"></div>
                            <div class="field">
                                <input type="button" class="button-apply" value="<?php echo $this->_tpl_vars['lang']['apply']; ?>
" />&nbsp;&nbsp;
                                <input type="button" class="button-cancel" value="<?php echo $this->_tpl_vars['lang']['cancel']; ?>
" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; unset($_from); ?>
        </div>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script class="fl-js-dynamic">
var shcPriceField = '<?php echo $this->_tpl_vars['config']['price_tag_field']; ?>
';
var price_item_index = 0;
var shippingElemets = [];
var shcPlaveHolderLcation = '<?php echo $this->_tpl_vars['lang']['shc_location']; ?>
';
<?php echo '
$(document).ready(function() {
    $(\'a.shipping-method-settings\').click(function() {
        var name_method = \''; ?>
<?php echo $this->_tpl_vars['lang']['shc_configure_shipping_method']; ?>
<?php echo '\';
        name_method = name_method.replace(\'{method}\', $(this).attr(\'data-method-name\'));
        var method = $(this).attr(\'data-settings\');
        var el = \'#shipping-method-settings-\' + method;

        flUtil.loadScript([
            rlConfig[\'tpl_base\'] + \'components/popup/_popup.js\',
        ], function(){
            $(\'#shipping-methods\').popup({
                click: false,
                scroll: true,
                closeOnOutsideClick: false,
                content: $(el).html(),
                caption: name_method,
                onShow: function(content){
                    $(el).html(\'\');
                    var self = this;

                    synchronizeFormValues(content);

                    content.find(\'.button-apply\').click(function() {
                        shippingElemets = [];
                        $(\'.popup div.body input[type=checkbox], .popup div.body input[type=text], .popup div.body select option:selected\').each(function() {
                            if ($(this).prop(\'tagName\') == \'INPUT\') {
                                if ([\'text\'].indexOf($(this).prop(\'type\')) >= 0) {
                                    shippingElemets.push({id: $(this).attr(\'id\'), \'val\': $(this).val()});
                                } else {
                                    if ($(this).is(\':checked\')) {
                                        shippingElemets.push({id: $(this).attr(\'id\'), \'val\': $(this).val()});
                                    }
                                }
                            } else if ($(this).prop(\'tagName\') == \'OPTION\') {
                                shippingElemets.push({id: $(this).parent().attr(\'id\'), \'val\': $(this).val()});
                            }
                        });
                        $(el).html($(\'.popup\').find(\'div.body\').html());

                        synchronizeFormValues($(\'#shipping-methods\'));
                        self.close();
                    });

                    content.find(\'.button-cancel\').click(function() {
                        $(el).html($(\'.popup\').find(\'div.body\').html());
                        self.close();
                    });
                }
            });
        });
    });

    $(\'.enable-shipping-method\').each(function() {
        if ($(this).is(\':checked\')) {
            $(this).parent().next().removeClass(\'hide\');
        }
    });

    $(\'.enable-shipping-method\').click(function() {
        if ($(this).is(\':checked\')) {
            $(this).parent().next().removeClass(\'hide\');
        } else {
            $(this).parent().next().addClass(\'hide\');
        }
    });
    
    $(document).on(\'keyup\', \'input.shipping-fixed-price\', function() {
        if ($(this).val() != \'\') {
            $(this).parent().find(\'input.shipping-auto-price\').prop(\'checked\', false);
        } else {
            $(this).parent().find(\'input.shipping-auto-price\').prop(\'checked\', \'checked\');
        }
    });
    
    $(document).on(\'change\', \'input.shipping-auto-price\', function() {
        if ($(this).is(\':checked\')) {
            $(this).parent().find(\'input[type="text"]\').val(\'\');
        }
    });

    shoppingCart.handleShippingPriceType(\''; ?>
<?php echo $_POST['fshc']['shc_shipping_price_type']; ?>
<?php echo '\');

    $(\'.add-price-item\').click(function() {
        if ($(\'.fixed-prices .price-item:last\').length) {
            price_item_index = parseInt($(\'.fixed-prices .price-item:last\').attr(\'data-index\'));
            price_item_index++;
        } else {
            price_item_index = 0;
        }

        if ($(\'select[name="f[\' + shcPriceField + \'][currency]"]\').length > 0) {
            var currencyCode = $(\'select[name="f[\' + shcPriceField + \'][currency]"] option:selected\').text();
        } else {
            var currencyCode = $(\'input[name="f[\' + shcPriceField + \'][currency]"]\').next().text();
        }

        var price_item_html = $(\'<div>\', {
                class: \'price-item mb-2\', 
                \'data-index\': price_item_index}
            )
            .append($(\'<input>\', {
                class: \'numeric wauto price mr-1\', 
                type: \'text\', 
                name: \'fshc[shc_shipping_fixed_prices][\'+price_item_index+\'][price]\', 
                maxlength: 11}).attr(\'size\', 8).attr(\'placeholder\', lang.price)
            )
            .append($(\'<span>\', {
                class: \'shc-currency mr-2\', 
                \'data-index\': price_item_index, 
                text: currencyCode})
            )
            .append($(\'<input>\', {
                class: \'wauto mr-2\', 
                type: \'text\', 
                name: \'fshc[shc_shipping_fixed_prices][\'+price_item_index+\'][name]\'}).attr(\'placeholder\', shcPlaveHolderLcation)
            )
            .append($(\'<a>\', {
                class: \'icon delete delete-price-item\', 
                \'data-index\': price_item_index, 
                href: \'javascript://\'})
            );

        $(\'.fixed-prices\').append(price_item_html);
    });

    $(document).on(\'click\', \'.delete-price-item\', function() {
        var index = parseInt($(this).attr(\'data-index\'));

        $(\'.fixed-prices .price-item\').each(function() {
            index_item = parseInt($(this).attr(\'data-index\'));

            if (index_item == index) {
                $(this).remove();
            }
        });
    });

    if ($(\'input[name="fshc[shc_shipping_price_type]"]:checked\').val() == \'calculate\') {
        $(\'#shipping-methods\').removeClass(\'hide\');
    }

    $(document).on(\'change\', \'select#shc_ups_origin\', function() {
        handleUPSShippingServices($(this).val());
    });
});

var synchronizeFormValues = function(content) {
    for (var i in shippingElemets) {
        var $element = content.find(\'#\' + shippingElemets[i].id);

        if ($element.prop(\'tagName\') == \'INPUT\') {
            if ([\'text\'].indexOf($element.prop(\'type\')) >= 0) {
                content.find(\'#\' + shippingElemets[i].id).val(shippingElemets[i].val);
            } else {
                content.find(\'#\' + shippingElemets[i].id).prop(\'checked\', true);
            }
        } else if ($element.prop(\'tagName\') == \'SELECT\') {
            content.find(\'#\' + shippingElemets[i].id).val(shippingElemets[i].val).trigger(\'change\');
        }
    }
}

var handleUPSShippingServices = function(origin) {
    $(\'input.ups-origin\').each(function() {
        var origins = $(this).attr(\'accesskey\').split(\',\');
        if (origins.indexOf(origin) >= 0) {
            $(this).parent(\'span\').removeClass(\'hide\');
        } else {
            $(this).prop(\'checked\', false);
            $(this).parent(\'span\').addClass(\'hide\');
        }
    });
}
'; ?>

</script>

<!-- end shipping methods -->