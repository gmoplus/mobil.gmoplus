<?php /* Smarty version 2.6.31, created on 2025-07-27 12:57:12
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/add_listing_fields_shipping.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/add_listing_fields_shipping.tpl', 45, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/add_listing_fields_shipping.tpl', 120, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/add_listing_fields_shipping.tpl', 151, false),)), $this); ?>
<table class="form" id="fs_shipping_details">
	<tr class="auction fixed">
		<td class="name">
			<?php echo $this->_tpl_vars['lang']['shc_shipping_details']; ?>

		</td>
		<td class="field">
			<fieldset class="light">
				<legend id="legend_shipping_details" class="up" onclick="fieldset_action('shipping_details');"><?php echo $this->_tpl_vars['lang']['shc_shipping_details']; ?>
</legend>
				<div id="shipping_details">
					<table class="form">
						<tr>
							<td class="name">
								<?php echo $this->_tpl_vars['lang']['shc_handling_time']; ?>

								<img class="qtip" alt="" title="<?php echo $this->_tpl_vars['lang']['shc_handling_time_des']; ?>
" id="fd_shc_dimensions" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
							</td>
							<td class="field" id="sf_field_shc_handling_time">
								<select name="fshc[shc_handling_time]">
									<option value="-1"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
									<?php $_from = $this->_tpl_vars['shc_handling_time']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['htime']):
?>
										<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($_POST['fshc']['shc_handling_time'] == $this->_tpl_vars['key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['htime']; ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="name">
								<?php echo $this->_tpl_vars['lang']['shc_package_type']; ?>

								<img class="qtip" alt="" title="<?php echo $this->_tpl_vars['lang']['shc_package_type_des']; ?>
" id="fd_shc_package_type" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
							</td>
							<td class="field" id="sf_field_shc_package_type">
								<select name="fshc[shc_package_type]">
									<option value="-1"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
									<?php $_from = $this->_tpl_vars['shc_package_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['ptype']):
?>
										<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($_POST['fshc']['shc_package_type'] == $this->_tpl_vars['key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['ptype']; ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="name">
								<?php echo $this->_tpl_vars['lang']['shc_weight']; ?>

							</td>
							<td class="field" id="sf_field_shc_bid_weight">
								<input class="numeric wauto" size="8" type="text" name="fshc[shc_weight]" maxlength="11" value="<?php if ($_POST['fshc']['shc_weight']): ?><?php echo $_POST['fshc']['shc_weight']; ?>
<?php else: ?>0<?php endif; ?>" />
								<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['shc_weight_type'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>

							</td>
						</tr>
						<tr>
							<td class="name">
								<?php echo $this->_tpl_vars['lang']['shc_dimensions']; ?>

								<img class="qtip" alt="" title="<?php echo $this->_tpl_vars['lang']['shc_dimensions_des']; ?>
" id="fd_shc_dimensions" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
							</td>
							<td class="field" id="sf_field_shc_dimensions">
                                <input type="text" class="numeric wauto" name="fshc[shc_dimensions][length]" value="<?php if ($_POST['fshc']['shc_dimensions']): ?><?php echo $_POST['fshc']['shc_dimensions']['length']; ?>
<?php endif; ?>" size="8" /><?php echo $this->_tpl_vars['lang']['in']; ?>
.&nbsp;
								X&nbsp;<input type="text" class="numeric wauto" name="fshc[shc_dimensions][width]" value="<?php if ($_POST['fshc']['shc_dimensions']): ?><?php echo $_POST['fshc']['shc_dimensions']['width']; ?>
<?php endif; ?>"  size="8" /><?php echo $this->_tpl_vars['lang']['in']; ?>
.&nbsp;
                                X&nbsp;<input type="text" class="numeric wauto" name="fshc[shc_dimensions][height]" value="<?php if ($_POST['fshc']['shc_dimensions']): ?><?php echo $_POST['fshc']['shc_dimensions']['height']; ?>
<?php endif; ?>" size="8" /><?php echo $this->_tpl_vars['lang']['in']; ?>
.&nbsp;
							</td>
						</tr>
						<tr>
							<td class="name">
								<?php echo $this->_tpl_vars['lang']['shc_shipping_price_type']; ?>

							</td>
							<td class="field" id="sf_field_shc_dimensions">
								<span class="custom-input"><label><input <?php if ($_POST['fshc']['shc_shipping_price_type'] == 'free' || ! $_POST['fshc']['shc_shipping_price_type']): ?>checked="checked"<?php endif; ?> class="shc-price-type" type="radio" name="fshc[shc_shipping_price_type]" value="free" /><?php echo $this->_tpl_vars['lang']['shc_shipping_price_type_free']; ?>
</label></span>
								<span class="custom-input"><label><input <?php if ($_POST['fshc']['shc_shipping_price_type'] == 'fixed'): ?>checked="checked"<?php endif; ?> class="shc-price-type" type="radio" name="fshc[shc_shipping_price_type]" value="fixed" /><?php echo $this->_tpl_vars['lang']['shc_shipping_price_type_fixed']; ?>
</label></span>
                                <?php if ($this->_tpl_vars['is_calculated']): ?>
								    <span class="custom-input">
                                        <label>
                                            <input <?php if ($_POST['fshc']['shc_shipping_price_type'] == 'calculate'): ?>checked="checked"<?php endif; ?> class="shc-price-type" type="radio" name="fshc[shc_shipping_price_type]" value="calculate" />
                                            <?php echo $this->_tpl_vars['lang']['shc_shipping_price_type_calculate']; ?>

                                        </label>
                                    </span>
                                <?php endif; ?>
							</td>
						</tr>
						<tr class="<?php if ($_POST['fshc']['shc_shipping_price_type'] != 'fixed'): ?>hide<?php endif; ?>">
							<td class="name">
								<?php echo $this->_tpl_vars['lang']['shc_shipping_price']; ?>

							</td>
							<td class="field" id="sf_field_shc_shipping_price">
                                <?php if ($this->_tpl_vars['config']['shc_shipping_price_fixed'] == 'multi'): ?>
                                    <div class="fixed-prices">
                                        <?php if ($_POST['fshc']['shc_shipping_fixed_prices']): ?>
                                            <?php $_from = $_POST['fshc']['shc_shipping_fixed_prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['price_item']):
?>
                                                <div class="price-item" data-index="<?php echo $this->_tpl_vars['key']; ?>
">
                                                    <span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span>
                                                    <input class="numeric wauto price" size="8" type="text" name="fshc[shc_shipping_fixed_prices][<?php echo $this->_tpl_vars['key']; ?>
][price]" maxlength="11" value="<?php echo $this->_tpl_vars['price_item']['price']; ?>
" />
                                                    <input class="wauto" type="text" name="fshc[shc_shipping_fixed_prices][<?php echo $this->_tpl_vars['key']; ?>
][name]" value="<?php echo $this->_tpl_vars['price_item']['name']; ?>
" />
                                                    <a title="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" class="delete-price-item" data-index="<?php echo $this->_tpl_vars['key']; ?>
" href="javascript:;">
                                                        <img src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" class="remove" />
                                                    </a>
                                                </div>
                                            <?php endforeach; endif; unset($_from); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div><a href="javascript://" class="add-price-item"><?php echo $this->_tpl_vars['lang']['shc_add_price_item']; ?>
</a></div>
                                <?php else: ?>
                                    <input class="numeric wauto" size="8" type="text" name="fshc[shc_shipping_price]" maxlength="11" value="<?php if ($_POST['fshc']['shc_shipping_price']): ?><?php echo $_POST['fshc']['shc_shipping_price']; ?>
<?php else: ?>0<?php endif; ?>" />
                                    <span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span>
                                <?php endif; ?>
							</td>
						</tr>
                        <tr class="<?php if ($_POST['fshc']['shc_shipping_price_type'] != 'fixed'): ?> hide<?php endif; ?>">
                            <td class="name">
                                <?php echo $this->_tpl_vars['lang']['shc_shipping_discount']; ?>

                            </td>
                            <td class="field" id="sf_field_shc_shipping_discount">
                                <input class="numeric wauto" size="8" type="text" name="fshc[shc_shipping_discount]" maxlength="11" value="<?php if ($_POST['fshc']['shc_shipping_discount']): ?><?php echo $_POST['fshc']['shc_shipping_discount']; ?>
<?php else: ?>0<?php endif; ?>" />
                                <span>%,&nbsp;</span>
                                <span class="dimension-divider"><?php echo $this->_tpl_vars['lang']['shc_shipping_discount_at']; ?>
</span>
                                <input class="numeric wauto" size="8" type="text" name="fshc[shc_shipping_discount_at]" maxlength="11" value="<?php if ($_POST['fshc']['shc_shipping_discount_at']): ?><?php echo $_POST['fshc']['shc_shipping_discount_at']; ?>
<?php else: ?>0<?php endif; ?>" />
                            </td>
                        </tr>
                        <tr class="auction fixed <?php if ($_POST['fshc']['shc_shipping_price_type'] != 'fixed' && $_POST['fshc']['shc_shipping_price_type'] != 'free' && ! empty ( $_POST['fshc']['shc_shipping_price_type'] )): ?> hide<?php endif; ?>">
                            <td class="name">
                                <span class="red">&nbsp;*</span>&nbsp;
                                <?php echo $this->_tpl_vars['lang']['shc_shipping_method']; ?>

                            </td>
                            <td class="field" id="sf_field_shc_shipping_method">
                                <span class="custom-input"><label><input <?php if (((is_array($_tmp='courier')) ? $this->_run_mod_handler('in_array', true, $_tmp, $_POST['fshc']['shipping_method_fixed']) : in_array($_tmp, $_POST['fshc']['shipping_method_fixed']))): ?>checked="checked"<?php endif; ?> type="checkbox" name="fshc[shipping_method_fixed][]" value="courier" /><?php echo $this->_tpl_vars['lang']['shc_courier']; ?>
</label></span>
                                <span class="custom-input"><label><input <?php if (((is_array($_tmp='pickup')) ? $this->_run_mod_handler('in_array', true, $_tmp, $_POST['fshc']['shipping_method_fixed']) : in_array($_tmp, $_POST['fshc']['shipping_method_fixed']))): ?>checked="checked"<?php endif; ?> type="checkbox" name="fshc[shipping_method_fixed][]" value="pickup" /><?php echo $this->_tpl_vars['lang']['shc_pickup']; ?>
</label></span>
                            </td>
                        </tr>
						<tr id="shipping-methods" class="hide">
							<td class="name">
								<?php echo $this->_tpl_vars['lang']['shc_shipping_methods']; ?>

							</td>
							<td class="field">
								<table class="form">
								<?php $_from = $this->_tpl_vars['shipping_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shipping_method']):
?>
									<tr>
										<td class="divider first">
											<div class="inner" style="padding: 5px 8px 5px 8px;">
												<input type="checkbox" <?php if ($_POST['shipping'][$this->_tpl_vars['shipping_method']['Key']]['enable']): ?>checked="checked"<?php endif; ?> name="shipping[<?php echo $this->_tpl_vars['shipping_method']['Key']; ?>
][enable]" value="1" id="shmid_<?php echo $this->_tpl_vars['shipping_method']['Key']; ?>
" class="enable-shipping-method" /> <label for="shmid_<?php echo $this->_tpl_vars['shipping_method']['Key']; ?>
"><?php echo $this->_tpl_vars['shipping_method']['name']; ?>
</label>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<div id="shipping-method-settings-<?php echo $this->_tpl_vars['shipping_method']['Key']; ?>
" class="hide" style="padding-bottom: 15px;">
												<div class="submit-cell clearfix">
													<div class="name"><?php echo $this->_tpl_vars['lang']['shc_fixed_shipping_price']; ?>
</div>
													<div class="field single-field">
														<input type="text" class="wauto numeric shipping-fixed-price" size="8" name="shipping[<?php echo $this->_tpl_vars['shipping_method']['Key']; ?>
][price]" value="<?php if ($_POST['shipping'][$this->_tpl_vars['shipping_method']['Key']]['price']): ?><?php echo $_POST['shipping'][$this->_tpl_vars['shipping_method']['Key']]['price']; ?>
<?php elseif ($this->_tpl_vars['shipping_method']['Type'] == 'offline'): ?>0<?php endif; ?>" />
														<?php if ($this->_tpl_vars['shipping_method']['Type'] == 'online'): ?>
															&nbsp;&nbsp;-<?php echo $this->_tpl_vars['lang']['or']; ?>
-&nbsp;&nbsp;<label><input type="radio" class="shipping-auto-price" <?php if ($_POST['shipping'][$this->_tpl_vars['shipping_method']['Key']]['auto'] || ! $_POST['shipping'][$this->_tpl_vars['shipping_method']['Key']]['price']): ?>checked="checked"<?php endif; ?> name="shipping[<?php echo $this->_tpl_vars['shipping_method']['Key']; ?>
][auto]" value="1" /><?php echo $this->_tpl_vars['lang']['shc_auto_shipping_calculate']; ?>
</label>
														<?php endif; ?>
													</div>
												</div>
												<div class="clearfix">
													<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping_methods_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['shipping_method']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['shipping_method']['Key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '/view/ap_add_listing.tpl') : smarty_modifier_cat($_tmp, '/view/ap_add_listing.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; endif; unset($_from); ?>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</fieldset>
		</td>
	</tr>
</table>
<script type="text/javascript">
var price_item_index = 0;
var shippingElemets = [];
var price_item_tpl = '<div class="price-item" data-index="[index]"><span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span>&nbsp;<input class="numeric wauto price" size="8" type="text" name="fshc[shc_shipping_fixed_prices][[index]][price]" maxlength="11" value="" />&nbsp;<input class="wauto" type="text" name="fshc[shc_shipping_fixed_prices][[index]][name]" value="" /><a class="delete-price-item" data-index="[index]" title="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" href="javascript:;"><img src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" class="remove" /></a></div>';
<?php echo '
$(document).ready(function() {
    $(\'.enable-shipping-method\').each(function() {
        if ($(this).is(\':checked\')) {
            $(this).parent().next().show();
        }
    });

    $(\'.enable-shipping-method\').click(function() {
        if ($(this).is(\':checked\')) {
            $(this).parent().next().show();
        } else {
            $(this).parent().next().hide();
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

        var price_item_html = price_item_tpl.replace(/\\[index\\]/g, price_item_index);
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
});
'; ?>

</script>