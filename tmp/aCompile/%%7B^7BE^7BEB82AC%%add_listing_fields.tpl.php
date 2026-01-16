<?php /* Smarty version 2.6.31, created on 2025-10-16 09:09:18
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/add_listing_fields.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/add_listing_fields.tpl', 74, false),)), $this); ?>
<?php $this->assign('shcFVal', $_POST['f']); ?>
<table class="form">
    <tr class="auction fixed listing">
        <td class="name price_name">
            <span class="red">*</span> <?php echo $this->_tpl_vars['lang']['price']; ?>

        </td>
        <td class="field" id="sf_field_shc_start_price" valign="bottom">
            <div class="price_item auction">
                <div class="price-caption"><?php echo $this->_tpl_vars['lang']['shc_start_price']; ?>
</div>
                <input class="numeric w70 price-start" type="text" style="width: 70px;" name="fshc[shc_start_price]" size="8" maxlength="15" <?php if ($_POST['fshc']['shc_start_price']): ?>value="<?php echo $_POST['fshc']['shc_start_price']; ?>
"<?php endif; ?> />
            </div>
            <div class="price_item auction">
                <div class="price-caption"><?php echo $this->_tpl_vars['lang']['shc_reserved_price']; ?>
</div>
                <input class="numeric w70" type="text" style="width: 70px;" name="fshc[shc_reserved_price]" size="8" maxlength="15" <?php if ($_POST['fshc']['shc_reserved_price']): ?>value="<?php echo $_POST['fshc']['shc_reserved_price']; ?>
"<?php endif; ?> />
            </div>
            <div class="price_item auction fixed listing">
                <div class="price-caption"><?php echo $this->_tpl_vars['lang']['shc_buy_now']; ?>
</div>
                <!-- price field will be placed here -->
            </div>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['config']['shc_method'] == 'multi' && $this->_tpl_vars['config']['shc_commission'] > 0 && $this->_tpl_vars['config']['shc_commission_enable']): ?>
    <tr class="auction">
        <td class="name">
            <?php echo $this->_tpl_vars['lang']['shc_commission_start_price']; ?>

            <img class="qtip" alt="" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" title="<?php echo $this->_tpl_vars['lang']['shc_commission_start_price_notice']; ?>
" />
        </td>
        <td class="field">
            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span><?php endif; ?>
            <span class="price-start-commission">0.00</span>
            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?> <span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span><?php endif; ?>
            (<?php echo ''; ?><?php echo $this->_tpl_vars['lang']['shc_start_price_with_commission']; ?><?php echo ':&nbsp;'; ?><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo '<span class="shc-currency">'; ?><?php echo $this->_tpl_vars['currency']['0']['name']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo '<span class="price-start-item-total">0.00</span>'; ?><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo ' <span class="shc-currency">'; ?><?php echo $this->_tpl_vars['currency']['0']['name']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?>
)
        </td>
    </tr>
    <tr class="auction fixed">
        <td class="name">
            <?php echo $this->_tpl_vars['lang']['shc_commission']; ?>

        </td>
        <td class="field">
            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span><?php endif; ?>
            <span class="commission"><?php if ($_POST['fshc']['shc_commission']): ?><?php echo $_POST['fshc']['shc_commission']; ?>
<?php else: ?>0.00<?php endif; ?></span>
            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?> <span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span><?php endif; ?>
            (<?php echo ''; ?><?php echo $this->_tpl_vars['lang']['shc_price_with_commission']; ?><?php echo ':&nbsp;'; ?><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo '<span class="shc-currency">'; ?><?php echo $this->_tpl_vars['currency']['0']['name']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo '<span class="price-item-total">'; ?><?php if ($this->_tpl_vars['shcFVal'][$this->_tpl_vars['config']['price_tag_field']]['value']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['shcFVal'][$this->_tpl_vars['config']['price_tag_field']]['value']; ?><?php echo ''; ?><?php else: ?><?php echo '0.00'; ?><?php endif; ?><?php echo '</span>'; ?><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo ' <span class="shc-currency">'; ?><?php echo $this->_tpl_vars['currency']['0']['name']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?>
)
        </td>
    </tr>
    <?php endif; ?>
    <tr class="auction">
        <td class="name">
            <?php echo $this->_tpl_vars['lang']['shc_bid_step']; ?>

        </td>
        <td class="field" id="sf_field_shc_bid_step">
            <input class="numeric w50" type="text" style="width: 70px;" name="fshc[shc_bid_step]" maxlength="11" <?php if ($_POST['fshc']['shc_bid_step']): ?>value="<?php echo $_POST['fshc']['shc_bid_step']; ?>
"<?php endif; ?> />&nbsp;<span class="shc-currency"><?php echo $this->_tpl_vars['currency']['0']['name']; ?>
</span>
        </td>
    </tr>
    <tr class="auction">
        <td class="name">
            <?php echo $this->_tpl_vars['lang']['shc_duration']; ?>

        </td>
        <td class="field" id="sf_field_shc_days">
            <input class="numeric w50" type="text" style="width: 70px;" name="fshc[shc_days]" maxlength="11" <?php if ($_POST['fshc']['shc_days']): ?>value="<?php echo $_POST['fshc']['shc_days']; ?>
"<?php endif; ?> />&nbsp;<span><?php echo $this->_tpl_vars['lang']['shc_days']; ?>
</span>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['config']['shc_digital_product']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/admin/view/digital_product.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/admin/view/digital_product.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <tr class="auction fixed quantity">
        <td class="name">
            <?php echo $this->_tpl_vars['lang']['shc_quantity']; ?>

        </td>
        <td class="field" id="sf_field_shc_quantity">
            <input class="numeric w50" type="text" style="width: 70px;" name="fshc[shc_quantity]" maxlength="11" value="<?php if ($_POST['fshc']['shc_quantity']): ?><?php echo $_POST['fshc']['shc_quantity']; ?>
<?php else: ?>0<?php endif; ?>" <?php if ($_POST['fshc']['quantity_unlim'] == '1'): ?>readonly="readonly"<?php endif; ?> />
            <span class="digital <?php if (! $_POST['fshc']['digital'] == '1'): ?> hide<?php endif; ?>">&nbsp;<?php echo $this->_tpl_vars['lang']['or']; ?>
&nbsp;</span>
            <span class="digital <?php if (! $_POST['fshc']['digital'] == '1'): ?> hide<?php endif; ?>"><label><input type="checkbox" class="quantity-unlimited" name="fshc[quantity_unlim]" value="1" <?php if ($_POST['fshc']['quantity_unlim'] == '1'): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_tpl_vars['lang']['unlimited']; ?>
</label></span>
        </td>
    </tr>
    <tr class="fixed available">
        <td class="name">
            <?php echo $this->_tpl_vars['lang']['shc_available']; ?>

        </td>
        <td class="field" id="sf_field_shc_available">
            <label><input type="radio" value="1" name="fshc[shc_available]" <?php if ($_POST['fshc']['shc_available'] == '1' || ! isset ( $_POST['fshc']['shc_available'] )): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
            <label><input type="radio" value="0" name="fshc[shc_available]" <?php if ($_POST['fshc']['shc_available'] == '0'): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
        </td>
    </tr>
    <?php if ($_GET['action'] == 'edit'): ?>
    <tr class="auction">
        <td class="name"></td>
        <td class="field" id="sf_field_shc_update_start_time">
            <label><input type="checkbox" value="1" name="fshc[shc_update_start_time]" <?php if ($_POST['fshc']['shc_update_start_time'] == '1'): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['shc_update_start_time']; ?>
</label>
            <input type="hidden" name="fshc[shc_edit]" value="1" />
        </td>
    </tr>
    <?php endif; ?>
</table>