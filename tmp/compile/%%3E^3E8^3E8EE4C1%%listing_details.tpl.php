<?php /* Smarty version 2.6.31, created on 2025-10-12 11:45:29
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'str2money', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl', 22, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl', 176, false),array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl', 221, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl', 222, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl', 250, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl', 84, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl', 102, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/listing_details.tpl', 152, false),)), $this); ?>
<!-- shoppingCart plugin -->

<?php if ($this->_tpl_vars['listing_data']['shc_mode'] == 'auction' || $this->_tpl_vars['listing_data']['shc_mode'] == 'fixed'): ?>
    <?php $this->assign('is_aution_active', false); ?>
    <?php if ($this->_tpl_vars['listing_data']['shc']['Status'] == 'active' && $this->_tpl_vars['listing_data']['shc']['time_left_value'] > 0 && $this->_tpl_vars['listing_data']['shc_auction_status'] != 'closed' && $this->_tpl_vars['listing_data']['shc_quantity'] > 0 && $this->_tpl_vars['config']['shc_module_auction']): ?>
        <?php $this->assign('is_aution_active', true); ?>
    <?php endif; ?>
    <div class="shc-group mb-4">
        <?php if ($this->_tpl_vars['listing_data']['shc_mode'] == 'auction'): ?>
            <div class="auction-details<?php if (! $this->_tpl_vars['is_aution_active']): ?> closed<?php endif; ?><?php if (! $this->_tpl_vars['isLogin']): ?> not-logged-in<?php endif; ?> hborder mb-3">
                <?php if ($this->_tpl_vars['is_aution_active']): ?>
                    <ul class="d-flex">
                        <li class="flex-fill">
                            <div class="name date mb-2"><?php echo $this->_tpl_vars['lang']['shc_time_left']; ?>
</div>
                            <div class="value" id="time-left"><?php echo $this->_tpl_vars['listing_data']['shc']['time_left']; ?>
</div>
                        </li>

                        <li class="flex-fill">
                            <div class="name date mb-2"><?php if ($this->_tpl_vars['listing_data']['shc']['total_bids'] > 0): ?><?php echo $this->_tpl_vars['lang']['shc_current_bid']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['shc_starting_bid']; ?>
<?php endif; ?></div>
                            <span class="value">
                                <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo $this->_tpl_vars['listing_data']['shc']['currency']; ?>
<?php endif; ?>
                                <span id="current_price"><?php echo $this->_plugins['function']['str2money'][0][0]->str2money(array('string' => $this->_tpl_vars['listing_data']['shc']['current_bid'],'showCents' => false), $this);?>
</span>
                                <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?> <?php echo $this->_tpl_vars['listing_data']['shc']['currency']; ?>
<?php endif; ?>
                            </span>
                            <span class="bid-info">[<a href="javascript:void(0);" id="bid_history"><span id="total_bids"><?php echo $this->_tpl_vars['listing_data']['shc']['total_bids']; ?>
</span> <?php echo $this->_tpl_vars['lang']['shc_bids']; ?>
</a>]</span>
                        </li>
                    </ul>

                    <?php if ($this->_tpl_vars['isLogin']): ?>
                        <div class="mt-3 d-flex">
                            <input placeholder="<?php echo $this->_tpl_vars['listing_data']['shc']['shc_min_bid']; ?>
" type="text" class="numeric flex-fill shrink-fix" name="rate_bid" id="rate_bid" />
                            <a class="ml-2 button flex-shrink-0" href="javascript:void(0);" id="shc_add_bid" data-phrase="<?php echo $this->_tpl_vars['lang']['shc_add_bid']; ?>
"><?php echo $this->_tpl_vars['lang']['shc_add_bid']; ?>
</a>
                        </div>
                    <?php else: ?>
                        <div class="mt-2"><?php echo $this->_tpl_vars['shc_add_bid_not_login']; ?>
</div>
                    <?php endif; ?>
                <?php elseif ($this->_tpl_vars['listing_data']['shc_auction_status'] != 'closed' && $this->_tpl_vars['listing_data']['shc_quantity'] <= 0): ?>
                    <?php echo $this->_tpl_vars['lang']['shc_auction_reserved']; ?>

                <?php elseif (! $this->_tpl_vars['config']['shc_module_auction']): ?>
                    <?php echo $this->_tpl_vars['lang']['shc_auction_is_disabled']; ?>

                <?php else: ?>
                    <?php echo $this->_tpl_vars['lang']['shc_auction_closed']; ?>

                <?php endif; ?>

                <?php if ($this->_tpl_vars['winner_info']): ?>
                    <div class="table-cell mt-2">
                        <div class="name"><?php echo $this->_tpl_vars['lang']['shc_winner']; ?>
:</div>
                        <div class="value"><?php echo $this->_tpl_vars['winner_info']['Full_name']; ?>
</div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="d-flex mb-3">
                <?php if ($this->_tpl_vars['is_aution_active'] && $this->_tpl_vars['listing_data']['price'] && $this->_tpl_vars['config']['shc_buy_now'] && $this->_tpl_vars['listing_data']['shc']['buy_now_allowed']): ?>
                    <a class="button flex-fill text-center" href="javascript:void(0);" id="shc_by_now_item"><?php echo $this->_tpl_vars['lang']['shc_buy_now']; ?>
</a>
                    <?php if ($this->_tpl_vars['listing_data']['shc_quantity'] > 0): ?>
                        <a class="button add-to-cart flex-fill ml-2 text-center" data-item-id="<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
" href="javascript:void(0);" id="shc-item-<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
"><?php echo $this->_tpl_vars['lang']['shc_add_to_cart']; ?>
</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <?php if ($this->_tpl_vars['listing_data']['shc_available'] && $this->_tpl_vars['listing_data']['shc_quantity'] > 0 && $this->_tpl_vars['config']['shc_module']): ?>
                <a class="button w-100 add-to-cart text-center mb-3" data-item-id="<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
" href="javascript:void(0);" id="shc-item-<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
"><?php echo $this->_tpl_vars['lang']['shc_add_to_cart']; ?>
</a>
            <?php endif; ?>
        <?php endif; ?>

        <div class="listing-fields">
            <?php if ($this->_tpl_vars['listing_data']['shc_mode'] == 'fixed' && ! $this->_tpl_vars['listing_data']['Digital']): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_left_in_stock']; ?>
</div>
                <div class="value">
                    <?php if ($this->_tpl_vars['listing_data']['shc_quantity'] > 0 && $this->_tpl_vars['listing_data']['shc_available']): ?>
                        <?php echo $this->_tpl_vars['listing_data']['shc_quantity']; ?>

                    <?php else: ?>
                        <span class="red"><?php echo $this->_tpl_vars['lang']['shc_not_available']; ?>
</span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['listing_data']['Handling_time'] != '' && $this->_tpl_vars['listing_data']['Handling_time'] != '-1'): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_handling_time']; ?>
</div>
                <div class="value">
                    <?php $this->assign('shc_lf_value', ((is_array($_tmp='shc_handling_time_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['listing_data']['Handling_time']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['listing_data']['Handling_time']))); ?>
                    <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shc_lf_value']]; ?>

                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['listing_data']['Package_type'] != '' && $this->_tpl_vars['listing_data']['Package_type'] != '-1'): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_package_type']; ?>
</div>
                <div class="value">
                    <?php $this->assign('shc_lf_value', ((is_array($_tmp='shc_package_type_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['listing_data']['Package_type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['listing_data']['Package_type']))); ?>
                    <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shc_lf_value']]; ?>

                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['listing_data']['Weight']): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_weight']; ?>
</div>
                <div class="value">
                    <?php echo $this->_tpl_vars['listing_data']['Weight']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['config']['shc_weight_unit'])) ? $this->_run_mod_handler('replace', true, $_tmp, 's', '') : smarty_modifier_replace($_tmp, 's', '')); ?>

                </div>
            </div>
            <?php endif; ?>
            <?php if (! empty ( $this->_tpl_vars['listing_data']['Dimensions']['length'] ) && ! empty ( $this->_tpl_vars['listing_data']['Dimensions']['width'] ) && ! empty ( $this->_tpl_vars['listing_data']['Dimensions']['height'] )): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_dimensions']; ?>
</div>
                <div class="value">
                    <?php echo $this->_tpl_vars['listing_data']['Dimensions']['length']; ?>
&nbsp;<i>x</i>&nbsp;<?php echo $this->_tpl_vars['listing_data']['Dimensions']['width']; ?>
&nbsp;<i>x</i>&nbsp;<?php echo $this->_tpl_vars['listing_data']['Dimensions']['height']; ?>
 <?php echo $this->_tpl_vars['config']['shc_length_type']; ?>

                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['listing_data']['Shipping_price_type'] == 'fixed'): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_shipping_price']; ?>
</div>
                <div class="value">
                    <?php if ($this->_tpl_vars['config']['shc_shipping_price_fixed'] == 'single' || ( ! $this->_tpl_vars['listing_data']['Shipping_fixed_prices'] && $this->_tpl_vars['listing_data']['Shipping_price'] )): ?>
                        <span class="shc_price">
                            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
                            <?php echo $this->_plugins['function']['str2money'][0][0]->str2money(array('string' => $this->_tpl_vars['listing_data']['Shipping_price']), $this);?>

                            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
                        </span>
                    <?php elseif ($this->_tpl_vars['listing_data']['Shipping_fixed_prices']): ?>
                        <?php $_from = $this->_tpl_vars['listing_data']['Shipping_fixed_prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fixedPrice']):
?>
                        <div>
                            <?php echo $this->_tpl_vars['fixedPrice']['name']; ?>
 - 
                            <span class="shc_price">
                                <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
                                <?php echo $this->_plugins['function']['str2money'][0][0]->str2money(array('string' => $this->_tpl_vars['fixedPrice']['price']), $this);?>

                                <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
                            </span>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['listing_data']['Shipping_discount'] > 0): ?>
                    <div>
                        <small>- <?php echo $this->_tpl_vars['listing_data']['Shipping_discount']; ?>
% <?php echo $this->_tpl_vars['lang']['shc_after_more']; ?>
</small>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['listing_data']['Shipping_price_type'] == 'free' && ! $this->_tpl_vars['listing_data']['Digital']): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_shipping_price']; ?>
</div>
                <div class="value">
                    <?php echo $this->_tpl_vars['lang']['free']; ?>

                </div>
            </div>
            <?php endif; ?>
            <?php if (count($this->_tpl_vars['listing_data']['Shipping_method_fixed']) > 0 && ( $this->_tpl_vars['listing_data']['Shipping_price_type'] == 'fixed' || $this->_tpl_vars['listing_data']['Shipping_price_type'] == 'free' ) && ! $this->_tpl_vars['listing_data']['Digital']): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_shipping_method']; ?>
</div>
                <div class="value">
                    <ul class="shc-payment-gateways d-flex">
                    <?php $_from = $this->_tpl_vars['listing_data']['Shipping_method_fixed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shippingMethod']):
?>
                        <?php $this->assign('shippingMethodVal', ((is_array($_tmp='shc_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['shippingMethod']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['shippingMethod']))); ?>
                        <li><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shippingMethodVal']]; ?>
</li>
                    <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['payment_gateways'] && ! $this->_tpl_vars['config']['shc_allow_cash']): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['payment_gateways']; ?>
</div>
                <div class="value">
                    <ul class="shc-payment-gateways d-flex flex-wrap">
                        <?php if ($this->_tpl_vars['payment_gateways']): ?>
                            <?php $_from = $this->_tpl_vars['payment_gateways']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gateways'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gateways']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gateway']):
        $this->_foreach['gateways']['iteration']++;
?>
                            <li class="mr-2 mb-2"><?php echo ''; ?><?php if ($this->_tpl_vars['gateway']['Key'] == 'paypal' || $this->_tpl_vars['gateway']['Key'] == '2co'): ?><?php echo '<img alt="" src="'; ?><?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?><?php echo 'payment/'; ?><?php echo $this->_tpl_vars['gateway']['Key']; ?><?php echo '/'; ?><?php echo $this->_tpl_vars['gateway']['Key']; ?><?php echo '.png" />'; ?><?php else: ?><?php echo ''; ?><?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'shoppingCartListingDetailsGatewaysTpl'), $this);?><?php echo '<img alt="" src="'; ?><?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?><?php echo ''; ?><?php echo $this->_tpl_vars['gateway']['Key']; ?><?php echo '/static/'; ?><?php echo $this->_tpl_vars['gateway']['Key']; ?><?php echo '.png" />'; ?><?php endif; ?><?php echo ''; ?>
</li>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php else: ?>
                            <li><div class="notice"><?php echo $this->_tpl_vars['lang']['shc_not_available_payment_gateways']; ?>
</div></li>
                        <?php endif; ?>
                    </ul>
                    <?php if ($this->_tpl_vars['config']['shc_escrow']): ?>
                        <div class="escrow-item">
                            <img alt="" src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
shoppingCart/static/escrow.svg" />
                            <span class="green"><?php echo $this->_tpl_vars['lang']['shc_escrow_item']; ?>
</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['config']['shc_allow_cash'] && ( ! $this->_tpl_vars['payment_gateways'] || ( $this->_tpl_vars['payment_gateways'] && $this->_tpl_vars['dealer_options']['allow_cash'] ) )): ?>
                <div class="table-cell clearfix">
                    <div class="name"><?php echo $this->_tpl_vars['lang']['shc_payment_cash']; ?>
</div>
                    <div class="value">
                        <?php echo $this->_tpl_vars['lang']['yes']; ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['listing_data']['has_shipping']): ?>
            <div class="table-cell clearfix">
                <div class="name"><?php echo $this->_tpl_vars['lang']['shc_available']; ?>
</div>
                <div class="value">
                    <ul class="checkboxes clearfix">
                        <?php $_from = $this->_tpl_vars['listing_data']['Shipping_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['method']):
?>
                            <?php if ($this->_tpl_vars['method']['enable']): ?>
                                <?php $this->assign('shc_shm_name', ((is_array($_tmp='shipping_methods+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['key']))); ?>
                                <li class="active" title="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shc_shm_name']]; ?>
"><img alt="" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" /><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shc_shm_name']]; ?>
</li>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($this->_tpl_vars['listing_data']['shc_mode'] == 'auction' && $this->_tpl_vars['config']['shc_module_auction']): ?>
    <?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/popup/popup.css') : smarty_modifier_cat($_tmp, 'components/popup/popup.css'))), $this);?>

    <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/popup/_popup.js') : smarty_modifier_cat($_tmp, 'components/popup/_popup.js'))), $this);?>


    <script class="fl-js-dynamic">
        lang['shc_empty_bid_value'] = "<?php echo $this->_tpl_vars['lang']['shc_empty_bid_value']; ?>
";
        lang['shc_do_you_want_to_add_bid'] = "<?php echo $this->_tpl_vars['lang']['shc_do_you_want_to_add_bid']; ?>
";
        lang['shc_add_bid'] = "<?php echo $this->_tpl_vars['lang']['shc_add_bid']; ?>
";
        var shcTimeZone = '<?php if ($this->_tpl_vars['config']['timezone']): ?><?php echo $this->_tpl_vars['config']['timezone']; ?>
<?php else: ?>America/New_York<?php endif; ?>';
        var shcListingID = <?php echo $this->_tpl_vars['listing_data']['ID']; ?>
;
        <?php echo '

        $(document).ready(function(){
            '; ?>
shoppingCart.updateLeftTime('<?php echo $this->_tpl_vars['listing_data']['shc_start_time']; ?>
', <?php echo $this->_tpl_vars['listing_data']['shc_days']; ?>
, '<?php echo $this->_tpl_vars['lang']['shc_auction_time_attr']; ?>
');<?php echo '

            $(\'#shc_add_bid\').each(function(){
                $(this).click(function(){
                    shcAddBid($(this));
                });
            });

            $(\'#bid_history\').click(function() {
                $(\'#tab_shoppingCart a\').trigger(\'click\');
                flynax.slideTo(\'.bid-history-header\');
            });

            $(\'#shc_by_now_item\').click(function() {
                shoppingCartBasic.addItem(
                    '; ?>
<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
<?php echo ', 
                    true, 
                    \''; ?>
<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'shc_my_shopping_cart','vars' => ((is_array($_tmp='item=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['listing_data']['ID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['listing_data']['ID']))), $this);?>
<?php echo '\'
                );
            });
            $(\'#price_buy_now\').html($(\'#df_field_price\').html());
        });

        var shcAddBid = function($button) {
            if ($button.hasClass(\'disabled\')) {
                return;
            }

            var $rateBid = $(\'#rate_bid\');

            if (!$rateBid.val()) {
                printMessage(\'error\', lang[\'shc_empty_bid_value\']);
                $rateBid.focus();
                return;
            }

            var data = {
                click: false,
                caption: lang[\'shc_do_you_want_to_add_bid\'],
                width: \'auto\',
                height: \'auto\'
            };
            if (isLogin) {
                data.navigation = {
                    okButton: {
                        text: lang[\'shc_add_bid\'],
                        class: \'low\',
                        onClick: function($popup){
                            shoppingCart.addBid(shcListingID, $rateBid.val())
                            $popup.close();
                        }
                    },
                    cancelButton: {
                        text: lang.cancel,
                        class: \'low cancel\',
                    }
                };
            } else {
                data.content = \'#login_modal_source\';
            }
            $(\'body\').popup(data);
        }

        '; ?>

    </script>
    <?php endif; ?>
<?php endif; ?>

<!-- end shoppingCart plugin -->