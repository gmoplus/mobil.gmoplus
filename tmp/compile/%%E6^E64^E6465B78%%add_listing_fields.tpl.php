<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:19
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/add_listing_fields.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/add_listing_fields.tpl', 71, false),)), $this); ?>
<?php $this->assign('shcFVal', $_POST['f']); ?>

<div class="d-none" id="price_variants">
    <div class="price_item auction mr-md-3 mb-2 mb-md-0">
        <div class="price-item-caption mb-1"><?php echo $this->_tpl_vars['lang']['shc_start_price']; ?>
</div>
        <input class="numeric price-start<?php if ($this->_tpl_vars['isAuctionActive']): ?> qtip<?php endif; ?>" type="text" name="fshc[shc_start_price]" size="8" maxlength="9" <?php if ($_POST['fshc']['shc_start_price']): ?>value="<?php echo $_POST['fshc']['shc_start_price']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['isAuctionActive']): ?>readonly="readonly"<?php endif; ?> />
    </div>
    <div class="price_item auction mr-md-3 mb-2 mb-md-0">
        <div class="mb-1 price-item-caption"><?php echo $this->_tpl_vars['lang']['shc_reserved_price']; ?>
</div>
        <input class="numeric<?php if ($this->_tpl_vars['isAuctionActive']): ?> qtip<?php endif; ?>" type="text" name="fshc[shc_reserved_price]" size="8" maxlength="9" <?php if ($_POST['fshc']['shc_reserved_price']): ?>value="<?php echo $_POST['fshc']['shc_reserved_price']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['isAuctionActive']): ?>readonly="readonly"<?php endif; ?> />
    </div>
</div>

<?php if ($this->_tpl_vars['config']['shc_method'] == 'multi' && $this->_tpl_vars['config']['shc_commission'] > 0 && $this->_tpl_vars['config']['shc_commission_enable']): ?>
    <div class="submit-cell auction">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_commission_start_price']; ?>

            <img class="qtip" alt="" title="<?php echo $this->_tpl_vars['lang']['shc_commission_start_price_notice']; ?>
" id="fd_shc_commission_start_price" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
        </div>
        <div class="field combo-field">
            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><span class="shc-currency"><?php echo $this->_tpl_vars['defaultCurrencyName']; ?>
</span><?php endif; ?>
            <span class="price-start-commission">0.00</span>
            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?> <span class="shc-currency"><?php echo $this->_tpl_vars['defaultCurrencyName']; ?>
</span><?php endif; ?>
            (<?php echo ''; ?><?php echo $this->_tpl_vars['lang']['shc_start_price_with_commission']; ?><?php echo ':&nbsp;'; ?><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo '<span class="shc-currency">'; ?><?php echo $this->_tpl_vars['defaultCurrencyName']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo '<span class="price-start-item-total">0.00</span>'; ?><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo ' <span class="shc-currency">'; ?><?php echo $this->_tpl_vars['defaultCurrencyName']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?>
)
        </div>
    </div>
    <div class="submit-cell auction fixed">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['shc_commission']; ?>

        </div>
        <div class="field combo-field">
            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><span class="shc-currency"><?php echo $this->_tpl_vars['defaultCurrencyName']; ?>
</span><?php endif; ?>
            <span class="commission"><?php if ($_POST['fshc']['shc_commission']): ?><?php echo $_POST['fshc']['shc_commission']; ?>
<?php else: ?>0.00<?php endif; ?></span>
            <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?> <span class="shc-currency"><?php echo $this->_tpl_vars['defaultCurrencyName']; ?>
</span><?php endif; ?>
            (<?php echo ''; ?><?php echo $this->_tpl_vars['lang']['shc_price_with_commission']; ?><?php echo ':&nbsp;'; ?><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo '<span class="shc-currency">'; ?><?php echo $this->_tpl_vars['defaultCurrencyName']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo '<span class="price-item-total">'; ?><?php if ($this->_tpl_vars['shcFVal'][$this->_tpl_vars['config']['price_tag_field']]['value']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['shcFVal'][$this->_tpl_vars['config']['price_tag_field']]['value']; ?><?php echo ''; ?><?php else: ?><?php echo '0.00'; ?><?php endif; ?><?php echo '</span>'; ?><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo ' <span class="shc-currency">'; ?><?php echo $this->_tpl_vars['defaultCurrencyName']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?>
)
        </div>
    </div>
<?php endif; ?>
<div class="submit-cell auction">
    <div class="name">
        <?php echo $this->_tpl_vars['lang']['shc_bid_step']; ?>

        <span class="red">&nbsp;*</span>
    </div>
    <div class="field combo-field" id="sf_field_shc_bid_step">
        <input class="numeric wauto<?php if ($this->_tpl_vars['isAuctionActive']): ?> qtip<?php endif; ?>" size="8" type="text" name="fshc[shc_bid_step]" maxlength="11" <?php if ($_POST['fshc']['shc_bid_step']): ?>value="<?php echo $_POST['fshc']['shc_bid_step']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['isAuctionActive']): ?>readonly="readonly"<?php endif; ?> />
        <span class="shc-currency"><?php echo $this->_tpl_vars['defaultCurrencyName']; ?>
</span>
    </div>
</div>

<div class="submit-cell auction">
    <div class="name">
        <?php echo $this->_tpl_vars['lang']['shc_duration']; ?>

        <span class="red">&nbsp;*</span>
    </div>
    <div class="field combo-field" id="sf_field_shc_bid_days">
        <input class="numeric wauto<?php if ($this->_tpl_vars['isAuctionActive']): ?> qtip<?php endif; ?>" size="8" type="text" name="fshc[shc_days]" maxlength="11" <?php if ($_POST['fshc']['shc_days']): ?>value="<?php echo $_POST['fshc']['shc_days']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['isAuctionActive']): ?>readonly="readonly"<?php endif; ?> />
        <?php echo $this->_tpl_vars['lang']['shc_days']; ?>

    </div>
</div>
<?php if ($this->_tpl_vars['config']['shc_digital_product']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/digital_product.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/digital_product.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<div class="submit-cell auction fixed quantity">
    <div class="name">
        <?php echo $this->_tpl_vars['lang']['shc_quantity']; ?>

        <span class="red">&nbsp;*</span>
    </div>
    <div class="field d-flex" id="sf_field_shc_bid_quantity">
        <input class="numeric wauto" size="8" type="text" name="fshc[shc_quantity]" maxlength="11" value="<?php if ($_POST['fshc']['shc_quantity']): ?><?php echo $_POST['fshc']['shc_quantity']; ?>
<?php else: ?>0<?php endif; ?>" <?php if ($_POST['fshc']['quantity_unlim'] == '1'): ?>readonly="readonly"<?php endif; ?> />
        <span class="mt-2 ml-2 mr-2 digital <?php if (! $_POST['fshc']['digital'] == '1'): ?> hide<?php endif; ?>"><?php echo $this->_tpl_vars['lang']['or']; ?>
</span>
        <span class="mt-2 custom-input digital <?php if (! $_POST['fshc']['digital'] == '1'): ?> hide<?php endif; ?>"><label><input type="checkbox" class="quantity-unlimited" name="fshc[quantity_unlim]" value="1" <?php if ($_POST['fshc']['quantity_unlim'] == '1'): ?>checked="checked"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['unlimited']; ?>
</label></span>
    </div>
</div>
<div class="submit-cell fixed available">
    <div class="name">
        <?php echo $this->_tpl_vars['lang']['shc_available']; ?>

    </div>
    <div class="field inline-fields" id="sf_field_shc_bid_available">
        <span class="custom-input"><label><input type="radio" value="1" name="fshc[shc_available]" <?php if ($_POST['fshc']['shc_available'] == '1' || $_POST['fshc']['shc_available'] == ''): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label></span>
        <span class="custom-input"><label><input type="radio" value="0" name="fshc[shc_available]" <?php if ($_POST['fshc']['shc_available'] == '0'): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['lang']['no']; ?>
</label></span>
    </div>
</div>

<?php if ($this->_tpl_vars['pageInfo']['Controller'] == 'edit_listing' && ! $this->_tpl_vars['isAuctionActive']): ?>
<div class="submit-cell auction">
    <div class="name"></div>
    <div class="field inline-fields" id="sf_field_shc_update_start_time">
        <label><input type="checkbox" value="1" name="fshc[shc_update_start_time]" <?php if ($_POST['fshc']['shc_update_start_time'] == '1'): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['shc_update_start_time']; ?>
</label>
        <input type="hidden" name="fshc[shc_edit]" value="1" />
        <?php if ($_POST['fshc']['shc_mode'] != 'auction'): ?><input type="hidden" name="fshc[shc_first_edit]" value="1" /><?php endif; ?>
    </div>
</div>
<?php endif; ?>