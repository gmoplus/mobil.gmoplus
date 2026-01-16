<?php /* Smarty version 2.6.31, created on 2025-10-18 19:37:49
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins//shoppingCart/admin/view/configs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins//shoppingCart/admin/view/configs.tpl', 1, false),array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/plugins//shoppingCart/admin/view/configs.tpl', 44, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/plugins//shoppingCart/admin/view/configs.tpl', 134, false),array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/plugins//shoppingCart/admin/view/configs.tpl', 6, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form id="shc-configs" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
module=configs&form=settings" method="post">
        <div id="shc_settings">
            <table class="form">
                <tr>
                    <td class="divider first" colspan="3"><div class="inner"><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'config+name+general_common'), $this);?>
</div></td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_module']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_module'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_module]" tab="fixed" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_module'] == '0' || ! $this->_tpl_vars['config']['shc_module']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_module]" tab="fixed" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_module_auction']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_module_auction'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_module_auction]" tab="auction" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_module_auction'] == '0' || ! $this->_tpl_vars['config']['shc_module_auction']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_module_auction]" tab="auction" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_module_listing']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_module_listing'] == '1' || ! isset ( $this->_tpl_vars['config']['shc_module_listing'] )): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_module_listing]" tab="listing" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_module_listing'] == '0'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_module_listing]" tab="listing" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_module_listing_des']; ?>
</span>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_method']; ?>
</td>
                    <td class="field">
                        <select name="config[shc_method]">
                            <option value="single" <?php if ($this->_tpl_vars['config']['shc_method'] == 'single'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['shc_method_single']; ?>
</option>
                            <option value="multi" <?php if ($this->_tpl_vars['config']['shc_method'] == 'multi'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['shc_method_multi']; ?>
</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_price_format_tabs']; ?>
</td>
                    <td class="field">
                        <div id="fields_section">
                            <div id="fields_container" class="ui-sortable">
                                <?php $this->assign('shcPriceFormatTabs', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['config']['shc_price_format_tabs']) : explode($_tmp, $this->_tpl_vars['config']['shc_price_format_tabs']))); ?>
                                <?php $_from = $this->_tpl_vars['shcPriceFormatTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tab']):
?>
                                    <?php if ($this->_tpl_vars['tab'] == 'auction'): ?>
                                        <?php $this->assign('shc_mode_tab', ((is_array($_tmp='shc_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['tab']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['tab']))); ?>
                                    <?php else: ?>
                                        <?php $this->assign('shc_mode_tab', ((is_array($_tmp='shc_mode_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['tab']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['tab']))); ?>
                                    <?php endif; ?>
                                    <div class="field_obj tab-<?php echo $this->_tpl_vars['tab']; ?>
">
                                        <div class="field_title" title="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shc_mode_tab']]; ?>
">
                                            <div class="title"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shc_mode_tab']]; ?>
</div>
                                            <input type="checkbox" name="config[shc_price_format_tabs][]" value="<?php echo $this->_tpl_vars['tab']; ?>
" class="hide" checked="checked" />
                                        </div>
                                    </div>
                                <?php endforeach; endif; unset($_from); ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_method_currency_convert']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_method_currency_convert'] == 'single'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_method_currency_convert]" value="single" /> <?php echo $this->_tpl_vars['lang']['shc_method_currency_convert_single']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_method_currency_convert'] == 'multi' || ! $this->_tpl_vars['config']['shc_method_currency_convert']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_method_currency_convert]" value="multi" /> <?php echo $this->_tpl_vars['lang']['shc_method_currency_convert_multi']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_digital_product']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_digital_product'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_digital_product]" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_digital_product'] == '0' || ! $this->_tpl_vars['config']['shc_digital_product']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_digital_product]" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_show_unavailable_listings']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_show_unavailable_listings'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_show_unavailable_listings]" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_show_unavailable_listings'] == '0' || ! $this->_tpl_vars['config']['shc_show_unavailable_listings']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_show_unavailable_listings]" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_count_items_block']; ?>
</td>
                    <td class="field">
                        <input type="text" name="config[shc_count_items_block]" value="<?php echo $this->_tpl_vars['config']['shc_count_items_block']; ?>
" />
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_orders_per_page']; ?>
</td>
                    <td class="field">
                        <input type="text" name="config[shc_orders_per_page]" value="<?php echo $this->_tpl_vars['config']['shc_orders_per_page']; ?>
" />
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_items_cart_duration']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_items_cart_duration'] == 'period' || ! $this->_tpl_vars['config']['shc_items_cart_duration']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_items_cart_duration]" value="period" /> <?php echo $this->_tpl_vars['lang']['shc_items_cart_duration_period']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_items_cart_duration'] == 'unlimited'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_items_cart_duration]" value="unlimited" /> <?php echo $this->_tpl_vars['lang']['shc_items_cart_duration_unlimited']; ?>
</label>
                    </td>
                </tr>
                <tr class="items-cart-duration-period<?php if ($this->_tpl_vars['config']['shc_items_cart_duration'] == 'unlimited'): ?> hide<?php endif; ?>">
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_interval_refresh_cart']; ?>
</td>
                    <td class="field">
                        <input type="text" name="config[shc_interval_refresh_cart]" value="<?php echo $this->_tpl_vars['config']['shc_interval_refresh_cart']; ?>
" />
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_interval_refresh_cart_des']; ?>
</span>
                    </td>
                </tr>
            </table>

            <table class="form">
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_time_format']; ?>
</td>
                    <td class="field">
                        <input type="text" name="config[shc_time_format]" value="<?php if ($this->_tpl_vars['config']['shc_time_format']): ?><?php echo $this->_tpl_vars['config']['shc_time_format']; ?>
<?php else: ?>%H%I%S<?php endif; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['enable_for']; ?>
</td>
                    <td class="field">
                        <fieldset class="light">
                            <legend id="legend_accounts_tab_area" class="up" onclick="fieldset_action('accounts_tab_area');"><?php echo $this->_tpl_vars['lang']['account_type']; ?>
</legend>
                            <div id="accounts_tab_area" style="padding: 0 10px 10px 10px;">
                                <table>
                                <tr>
                                    <td>
                                        <input type="hidden" name="config[shc_account_types]" value="" />
                                        <?php $this->assign('shcAccountTypes', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['config']['shc_account_types']) : explode($_tmp, $this->_tpl_vars['config']['shc_account_types']))); ?>
                                        <table>
                                        <tr>
                                        <?php $_from = $this->_tpl_vars['account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ac_type'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ac_type']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a_type']):
        $this->_foreach['ac_type']['iteration']++;
?>
                                            <td>
                                                <div style="padding: 2px 8px 2px 0;">
                                                    <input <?php if (((is_array($_tmp=$this->_tpl_vars['a_type']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['shcAccountTypes']) : in_array($_tmp, $this->_tpl_vars['shcAccountTypes']))): ?>checked="checked"<?php endif; ?> style="margin-bottom: 0px;" type="checkbox" id="account_type_<?php echo $this->_tpl_vars['a_type']['ID']; ?>
" value="<?php echo $this->_tpl_vars['a_type']['Key']; ?>
" name="config[shc_account_types][]" /> <label for="account_type_<?php echo $this->_tpl_vars['a_type']['ID']; ?>
"><?php echo $this->_tpl_vars['a_type']['name']; ?>
</label>
                                                </div>
                                            </td>
                                            
                                        <?php if ($this->_foreach['ac_type']['iteration']%1 == 0 && ! ($this->_foreach['ac_type']['iteration'] == $this->_foreach['ac_type']['total'])): ?>
                                        </tr>
                                        <tr>
                                        <?php endif; ?>
                                        
                                        <?php endforeach; endif; unset($_from); ?>
                                        </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <?php $this->assign('shc_account_types_help', 'config+des+shc_account_types'); ?>
                                        <span class="field_description"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shc_account_types_help']]; ?>
</span>
                                    </td>
                                </tr>
                                </table>

                                <div class="grey_area" style="margin: 8px 0 0;">
                                    <span onclick="$('#accounts_tab_area input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                    <span class="divider"> | </span>
                                    <span onclick="$('#accounts_tab_area input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                </div>
                            </div>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['shc_payment_methods']; ?>
</td>
                    <td class="field">
                        <fieldset class="light">
                            <legend id="legend_payment_gateways_tab_area" class="up" onclick="fieldset_action('payment_gateways_tab_area');"><?php echo $this->_tpl_vars['lang']['payment_gateway']; ?>
</legend>
                            <div id="payment_gateways_tab_area" style="padding: 0 10px 10px 10px;">
                                <table>
                                <tr>
                                    <td>
                                        <input type="hidden" name="config[shc_payment_gateways]" value="" />
                                        <?php $this->assign('shcPaymentGateways', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['config']['shc_payment_gateways']) : explode($_tmp, $this->_tpl_vars['config']['shc_payment_gateways']))); ?>
                                        <table>
                                        <tr>
                                        <?php $_from = $this->_tpl_vars['payment_gateways']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Fpg'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Fpg']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gateway']):
        $this->_foreach['Fpg']['iteration']++;
?>
                                            <td>
                                                <div style="padding: 2px 8px 2px 0;">
                                                    <label><input <?php if (((is_array($_tmp=$this->_tpl_vars['gateway']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['shcPaymentGateways']) : in_array($_tmp, $this->_tpl_vars['shcPaymentGateways'])) && ( ! $this->_tpl_vars['config']['shc_commission_enable'] || $this->_tpl_vars['config']['shc_method'] == 'single' || ( $this->_tpl_vars['config']['shc_commission_enable'] && $this->_tpl_vars['gateway']['Parallel'] ) )): ?>checked="checked"<?php endif; ?> <?php if (( $this->_tpl_vars['config']['shc_commission_enable'] && ! $this->_tpl_vars['gateway']['Parallel'] ) || ( $this->_tpl_vars['config']['shc_escrow'] && ! $this->_tpl_vars['gateway']['escrow'] )): ?>disabled="disabled="<?php endif; ?> style="margin-bottom: 0px;" type="checkbox" value="<?php echo $this->_tpl_vars['gateway']['Key']; ?>
" name="config[shc_payment_gateways][]" class="<?php if ($this->_tpl_vars['gateway']['Parallel']): ?>parallel<?php endif; ?><?php if ($this->_tpl_vars['gateway']['escrow']): ?> escrow<?php endif; ?>" /> <?php echo $this->_tpl_vars['gateway']['name']; ?>
</label>
                                                </div>
                                            </td>
                                            
                                        <?php if ($this->_foreach['Fpg']['iteration']%1 == 0 && ! ($this->_foreach['Fpg']['iteration'] == $this->_foreach['Fpg']['total'])): ?>
                                        </tr>
                                        <tr>
                                        <?php endif; ?>
                                        
                                        <?php endforeach; endif; unset($_from); ?>
                                        </tr>
                                        </table>
                                    </td>
                                </tr>
                                </table>

                                <div class="grey_area" style="margin: 8px 0 0;">
                                    <span onclick="$('#payment_gateways_tab_area input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                    <span class="divider"> | </span>
                                    <span onclick="$('#payment_gateways_tab_area input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                </div>
                            </div>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_allow_cash']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_allow_cash'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_allow_cash]" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_allow_cash'] == '0' || ! $this->_tpl_vars['config']['shc_allow_cash']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_allow_cash]" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_escrow']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_escrow'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_escrow]" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_escrow'] == '0' || ! $this->_tpl_vars['config']['shc_escrow']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_escrow]" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_escrow_des']; ?>
</span>
                    </td>
                </tr>
                <!-- commission settings -->
                <tr class="commission<?php if ($this->_tpl_vars['config']['shc_method'] == 'single'): ?> hide<?php endif; ?>">
                    <td class="divider first" colspan="3"><div class="inner"><?php echo $this->_tpl_vars['lang']['shc_commission_settings']; ?>
</div></td>
                </tr>
                <tr class="commission<?php if ($this->_tpl_vars['config']['shc_method'] == 'single'): ?> hide<?php endif; ?>">
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_commission_enable']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_commission_enable'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_commission_enable]" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_commission_enable'] == '0' || ! $this->_tpl_vars['config']['shc_commission_enable']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_commission_enable]" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                    </td>
                </tr>
                <tr class="commission<?php if ($this->_tpl_vars['config']['shc_method'] == 'single'): ?> hide<?php endif; ?>">
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_commission_type']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_commission_type'] == 'percent'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_commission_type]" value="percent" /> <?php echo $this->_tpl_vars['lang']['shc_commission_unit_percent']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_commission_type'] == 'fixed' || ! $this->_tpl_vars['config']['shc_commission_type']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_commission_type]" value="fixed" /> <?php echo $this->_tpl_vars['lang']['shc_commission_unit_fixed']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_commission_type_des']; ?>
</span>
                    </td>
                </tr>
                <tr class="commission<?php if ($this->_tpl_vars['config']['shc_method'] == 'single'): ?> hide<?php endif; ?>">
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_commission']; ?>
</td>
                    <td class="field">
                        <input type="text" name="config[shc_commission]" value="<?php if ($this->_tpl_vars['config']['shc_commission']): ?><?php echo $this->_tpl_vars['config']['shc_commission']; ?>
<?php else: ?>0<?php endif; ?>" />
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_commission_des']; ?>
</span>
                    </td>
                </tr>
                <tr class="commission<?php if ($this->_tpl_vars['config']['shc_method'] == 'single'): ?> hide<?php endif; ?>">
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_commission_add']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_commission_add'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_commission_add]" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_commission_add'] == '0' || ! $this->_tpl_vars['config']['shc_commission_type']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_commission_add]" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_commission_add_des']; ?>
</span>
                    </td>
                </tr>
                <!-- end /commission settings -->
                <tr>
                    <td class="divider first" colspan="3"><div class="inner"><?php echo $this->_tpl_vars['lang']['shc_auction_settings']; ?>
</div></td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_auto_rate']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_auto_rate'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_auto_rate]" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_auto_rate'] == '0' || ! $this->_tpl_vars['config']['shc_auto_rate']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_auto_rate]" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_auto_rate_des']; ?>
</span>
                    </td>
                </tr>
                <tr id="shc_auto_rate_period" class="<?php if ($this->_tpl_vars['config']['shc_auto_rate'] == '0'): ?>hide<?php endif; ?>">
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_auto_rate_period']; ?>
</td>
                    <td class="field">
                        <input type="text" name="config[shc_auto_rate_period]" value="<?php if ($this->_tpl_vars['config']['shc_auto_rate_period']): ?><?php echo $this->_tpl_vars['config']['shc_auto_rate_period']; ?>
<?php endif; ?>" />
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['shc_auto_rate_period_des']; ?>
</span>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_auction_cancel_bid_seller']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_auction_cancel_bid_seller'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_auction_cancel_bid_seller]" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_auction_cancel_bid_seller'] == '0' || ! $this->_tpl_vars['config']['shc_auction_cancel_bid_seller']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_auction_cancel_bid_seller]" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_auction_cancel_bid_buyer']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_auction_cancel_bid_buyer'] == '1' || ! $this->_tpl_vars['config']['shc_auction_cancel_bid_buyer']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_auction_cancel_bid_buyer]" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_auction_cancel_bid_buyer'] == '0'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_auction_cancel_bid_buyer]" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_buy_now']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_buy_now'] == '1' || ! $this->_tpl_vars['config']['shc_buy_now']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_buy_now]" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_buy_now'] == '0'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_buy_now]" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="divider first" colspan="3"><div class="inner"><?php echo $this->_tpl_vars['lang']['shc_shipping_settings']; ?>
</div></td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_shipping_fields']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_shipping_fields'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_shipping_fields]" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_shipping_fields'] == '0' || ! isset ( $this->_tpl_vars['config']['shc_shipping_fields'] )): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_shipping_fields]" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_shipping_fields_des']; ?>
</span>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_shipping_step']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_shipping_step'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_shipping_step]" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_shipping_step'] == '0' || ! isset ( $this->_tpl_vars['config']['shc_shipping_step'] )): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_shipping_step]" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_shipping_step_des']; ?>
</span>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_shipping_price_fixed']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_shipping_price_fixed'] == 'single' || ! $this->_tpl_vars['config']['shc_shipping_price_fixed']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_shipping_price_fixed]" value="single" /> <?php echo $this->_tpl_vars['lang']['shc_fixed_price_single']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_shipping_price_fixed'] == 'multi'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_shipping_price_fixed]" value="multi" /> <?php echo $this->_tpl_vars['lang']['shc_fixed_price_multi']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_weight_unit']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_weight_unit'] == 'kgs' || ! $this->_tpl_vars['config']['shc_weight_unit']): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_weight_unit]" value="kgs" /> <?php echo $this->_tpl_vars['lang']['shc_weight_kgs']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_weight_unit'] == 'lbs'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_weight_unit]" value="lbs" /> <?php echo $this->_tpl_vars['lang']['shc_weight_lbs']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['shcLang']['shc_use_multifield']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['config']['shc_use_multifield'] == '1'): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_use_multifield]" value="1" <?php if ($this->_tpl_vars['config']['shc_shipping_calc']): ?>disabled="disabled"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['config']['shc_use_multifield'] == '0' || ! isset ( $this->_tpl_vars['config']['shc_use_multifield'] )): ?>checked="checked"<?php endif; ?> type="radio" name="config[shc_use_multifield]" <?php if ($this->_tpl_vars['config']['shc_shipping_calc']): ?>disabled="disabled"<?php endif; ?> value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['shcLang']['shc_use_multifield_des']; ?>
</span>
                    </td>
                </tr>
            </table>
            <div id="shipper-address">
                <table class="form">
                    <tr>
                        <td class="divider first" colspan="3">
                            <div class="inner"><?php echo $this->_tpl_vars['lang']['shc_shipper_address']; ?>
</div>
                            <input type="hidden" name="config[shc_shipper_address]" value="" />
                        </td>
                    </tr>
                </table>
                <?php if ($this->_tpl_vars['allowMultifield']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField/admin/tplHeader.tpl') : smarty_modifier_cat($_tmp, 'multiField/admin/tplHeader.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>

                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field.tpl') : smarty_modifier_cat($_tmp, 'field.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['shcShippingfields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                <?php if ($this->_tpl_vars['allowMultifield']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField/admin/tplFooter.tpl') : smarty_modifier_cat($_tmp, 'multiField/admin/tplFooter.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>
            </div>

            <table class="form">
                <tr>
                    <td class="name no_divider"></td>
                    <td class="field">
                        <input type="hidden" name="form" value="submit" />
                        <input id="shc_button" type="submit" class="button lang_add" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script>

var shc_method = '<?php echo $this->_tpl_vars['config']['shc_method']; ?>
';
rlConfig['convertPrices'] = <?php if ($_GET['convertPrices']): ?>true<?php else: ?>false<?php endif; ?>;

<?php echo '
$(document).ready(function() {
    if (shc_method) {
        if (shc_method == \'single\') {
            $(\'#shipper-address\').removeClass(\'hide\');
            handlePaymentGateways(false);
        } else {
            handlePaymentGateways(
                $(\'input[name="config[shc_commission_enable]"]:checked\').val() == 1 ? true : false,
                $(\'input[name="config[shc_escrow]"]:checked\').val() == 1 ? true : false
            );
            $(\'#shipper-address\').addClass(\'hide\');
        }
    }

    $(\'select[name="config[shc_method]"]\').change(function() {
        checkSettingsFieldsByMethod($(this).val());

        if ($(this).val() == \'single\') {
            $(\'tr.commission\').hide();
            $(\'#shipper-address\').removeClass(\'hide\');
            handlePaymentGateways(false, $(\'input[name="config[shc_escrow]"]:checked\').val() == 1 ? true : false);
        } else {
            $(\'tr.commission\').show();
            $(\'#shipper-address\').addClass(\'hide\');
            handlePaymentGateways(
                $(\'input[name="config[shc_commission_enable]"]:checked\').val() == 1 ? true : false,
                $(\'input[name="config[shc_escrow]"]:checked\').val() == 1 ? true : false
            );
        }
    });

    checkSettingsFieldsByMethod(shc_method);

    $(\'input[name="config[shc_auto_rate]"]\').change(function() {
        if($(this).is(\':checked\')) {
            if($(this).val() == \'1\') {
                $(\'#shc_auto_rate_period\').show();
            } else {
                $(\'#shc_auto_rate_period\').hide();
                $(\'input[name="config[shc_auto_rate_period]"]\').val(0);
            }
        }
    });

    $(\'input[name="config[shc_commission_enable]"]\').change(function() {
        if ($(this).val() == 1 && $(this).is(\':checked\')) {
            var commissionEnable = false;
            $(\'#payment_gateways_tab_area input[type="checkbox"]\').each(function() {
                if ($(this).hasClass(\'parallel\')) {
                    commissionEnable = true;
                    return;
                }
            });
            if (commissionEnable) {
                handlePaymentGateways(true);
            } else {
                $(this).prop(\'checked\', false);
                printMessage(\'error\', \''; ?>
<?php echo $this->_tpl_vars['lang']['shc_comission_enable_notice']; ?>
<?php echo '\');
            }
        } else {
            handlePaymentGateways(false);
        }
    });

    $(\'#fields_container\').sortable({
        placeholder: \'ui-field-highlight\',
        items: \'div.field_obj:not(.ui-state-disabled)\',
        cursor: \'move\',
        forcePlaceholderSize: true,
        helper: \'clone\',
        opacity: 0.5
    }).disableSelection();

    $( "input[name^=\'config[shc_module\']" ).each(function() {
        if ($(this).is(\':checked\')) {
            controlPriceFormatTabs($(this).attr(\'tab\'), $(this).val());
        }
    });

    $( "input[name^=\'config[shc_module\']" ).click(function() {
        controlPriceFormatTabs($(this).attr(\'tab\'), $(this).val());
    });

    $(\'input[name="config[shc_method_currency_convert]"]\').change(function() {
        if ($(this).val() == \'single\' && $(this).is(\':checked\')) {
            rlConfirm(lang[\'shc_confirm_convert_method\'], "acceptMethodCurrencyConvert", false, false, false, "cancelCurrencyConvert");
        }
    });

    $(\'input[name="config[shc_items_cart_duration]"]\').change(function() {
        if ($(this).val() == \'period\' && $(this).is(\':checked\')) {
            $(\'.items-cart-duration-period\').removeClass(\'hide\');
        } else if (!$(\'.items-cart-duration-period\').hasClass(\'hide\')) {
            $(\'.items-cart-duration-period\').addClass(\'hide\');
        }
    });
    $(\'input[name="config[shc_escrow]"]\').change(function() {
        if ($(this).val() == 1 && $(this).is(\':checked\')) {
            var escrowEnable = false;
            $(\'#payment_gateways_tab_area input[type="checkbox"]\').each(function() {
                if ($(this).hasClass(\'escrow\')) {
                    escrowEnable = true;
                    return;
                }
            });
            if (escrowEnable) {
                handlePaymentGateways(false, true);
            } else {
                $(this).prop(\'checked\', false);
                printMessage(\'error\', \''; ?>
<?php echo $this->_tpl_vars['lang']['shc_escrow_enable_notice']; ?>
<?php echo '\');
            }
        } else {
            handlePaymentGateways(false, false);
        }
    });
});

$(\'#shc_position\').change(function() {
    if ( $(this).val() == \'top\' || $(this).val() == \'bottom\') {
        $(\'#type_dom\').slideUp();
    } else {
        $(\'#type_dom\').slideDown();
    }
});

var checkSettingsFieldsByMethod = function(method) {
    $(\'#shc_settings table.form tr\').each(function() {
        if($(this).hasClass(\'single\') || $(this).hasClass(\'multi\') )
        {
            if ($(this).hasClass(method)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        }
    });
}

var handlePaymentGateways = function(parallel, escrow) {
    $(\'#payment_gateways_tab_area input[type="checkbox"]\').each(function() {
        if (!$(this).hasClass(\'parallel\') && (parallel === true || escrow === true)) {
            $(this).prop(\'disabled\', true);
            $(this).prop(\'checked\', false);
        } else {
            $(this).prop(\'disabled\', false);
        }
    });
}

var controlPriceFormatTabs = function(tab, status) {
    var el = $(\'#fields_container\').find(\'div.tab-\' + tab);

    if (el.length > 0) {
        if (status == 1) {
            el.removeClass(\'ui-state-disabled\');
        } else {
            el.addClass(\'ui-state-disabled\');
        }
    }
}

var cancelCurrencyConvert = function() {
    $(\'input[name="config[shc_method_currency_convert]"]\').each(function() {
        if ($(this).is(\':checked\') && $(this).val() == \'single\') {
            $(this).prop(\'checked\', false);
        }
        if ($(this).val() == \'multi\') {
            $(this).prop(\'checked\', \'checked\');
        }
    });
}

/**
 * Method fake
 */
var acceptMethodCurrencyConvert = function(){
    return;
}

// Convert exists prices
if (rlConfig[\'convertPrices\']) {
    var convertMethod = \'shoppingCart.initConvertPrices\';
}

if (convertMethod) {
    rlConfirm(lang[\'shc_convert_prices_prompt\'], convertMethod);
}

'; ?>

</script>