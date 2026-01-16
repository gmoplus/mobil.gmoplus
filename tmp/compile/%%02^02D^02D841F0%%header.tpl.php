<?php /* Smarty version 2.6.31, created on 2025-10-12 11:06:02
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/header.tpl', 3, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/header.tpl', 3, false),array('modifier', 'strpos', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/header.tpl', 6, false),)), $this); ?>
<!-- shopping cart navbar styles -->

<?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/popup/popup.css') : smarty_modifier_cat($_tmp, 'components/popup/popup.css'))), $this);?>


<?php $this->assign('navbar_icon_size', 16); ?>
<?php if (strpos($this->_tpl_vars['tpl_settings']['name'], '_nova_wide') || $this->_tpl_vars['tpl_settings']['name'] == 'general_cragslist_wide'): ?>
    <?php $this->assign('navbar_icon_size', 20); ?>
<?php endif; ?>

<style>
<?php echo '
svg.cart-navbar-icon {
    '; ?>

    width: <?php echo $this->_tpl_vars['navbar_icon_size']; ?>
px;
    height: <?php echo $this->_tpl_vars['navbar_icon_size']; ?>
px;
    <?php if ($this->_tpl_vars['sc_is_nova']): ?>
    flex-shrink: 0;
    <?php else: ?>
    vertical-align: middle;
    margin-top: -1px;
    <?php endif; ?>
    <?php echo '
}
.cart-icon-container .content {
    width: auto !important;
}

.shc-item-unavailable {
    filter: grayscale(0.8);
}
.shc-rtl-fix {
    unicode-bidi: embed;
}
#shopping_cart_block {
    min-width: 280px;
}
.cart-item-picture img {
    width: 70px;
    height: 50px;
    object-fit: cover;
}

.cart-icon-container ul.cart-items > li {
    position: relative;
    height: auto;
    line-height: inherit;
    white-space: normal;
}
.cart-icon-container .content .controls a.button {
    width: initial;
    white-space: nowrap;
}
.clear-cart {
    filter: brightness(1.8);
}
.delete-item-from-cart {
    right: 0;
    top: 4px;
}
body[dir=rtl] .delete-item-from-cart {
    right: auto;
    left: 0;
}

@media screen and (min-width: 992px) {
    .cart-icon-container .default > span {
        display: initial !important;
    }
}
@media screen and (max-width: 767px) {
    .cart-icon-container .default > span {
        text-indent: -1000px;
        display: inline-block;
    }
    div.total-info div.table-cell > div.name,
    div.auction-popup-info div.table-cell > div.name {
        width: 110px !important;
    }
}
@media screen and (max-width: 480px) {
    #shopping_cart_block {
        width: 100%;
    }
}

svg.cart-navbar-icon {
    '; ?>

    <?php if ($this->_tpl_vars['sc_is_nova']): ?>
    flex-shrink: 0;
    <?php else: ?>
    vertical-align: middle;
    margin-top: -4px;
    <?php endif; ?>
    <?php echo '
}

'; ?>


<?php if ($this->_tpl_vars['sc_is_flatty'] || $this->_tpl_vars['sc_hide_name']): ?>
<?php echo '
.cart-icon-container .default > span {
    display: none !important;
}
svg.cart-navbar-icon {
    margin: 0 !important;
}
'; ?>

<?php endif; ?>

<?php if (! $this->_tpl_vars['sc_is_flatty']): ?>
<?php echo '
.cart-icon-container .default:before,
.cart-icon-container .default:after {
    display: none !important;
}
'; ?>

<?php endif; ?>

</style>
<script>
rlConfig['shcOrderKey'] = '<?php echo $this->_tpl_vars['order_key']; ?>
';
rlConfig['system_currency_position'] = '<?php echo $this->_tpl_vars['config']['system_currency_position']; ?>
';
rlConfig['system_currency'] = '<?php echo $this->_tpl_vars['config']['system_currency']; ?>
';
rlConfig['system_currency_code'] = '<?php echo $this->_tpl_vars['config']['system_currency_code']; ?>
'.toLowerCase();
</script>

<!-- shopping cart navbar styles end -->