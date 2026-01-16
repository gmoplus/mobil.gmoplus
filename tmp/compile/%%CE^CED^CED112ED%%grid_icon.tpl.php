<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:14
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/grid_icon.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'intval', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/grid_icon.tpl', 11, false),)), $this); ?>
<?php if ($this->_tpl_vars['config']['shc_module']): ?>
    <?php if ($this->_tpl_vars['listing']['shc_mode'] == 'fixed'): ?>
        <li class="add-to-cart" title="<?php echo $this->_tpl_vars['lang']['shc_add_to_cart']; ?>
" id="shc-item-<?php echo $this->_tpl_vars['listing']['ID']; ?>
" data-item-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
">
            <svg viewBox="0 0 18 18" class="icon grid-icon-fill">
                <use xlink:href="#add-to-cart-listing"></use>
            </svg>
            <span class="link"><?php echo $this->_tpl_vars['lang']['shc_add_to_cart']; ?>
</span>
        </li>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['listing']['shc_mode'] == 'auction'): ?>
        <li class="auction-listing" title="<?php echo intval($this->_tpl_vars['listing']['shc_total_bids']); ?>
 <?php echo $this->_tpl_vars['lang']['shc_bids']; ?>
, <?php echo $this->_tpl_vars['lang']['shc_left_time']; ?>
: <?php echo $this->_tpl_vars['listing']['left_time']; ?>
" id="shc-item-<?php echo $this->_tpl_vars['listing']['ID']; ?>
" data-item-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
">
            <svg viewBox="0 0 18 18" class="icon grid-icon-fill">
                <use xlink:href="#auction_bids"></use>
            </svg>
            <span class="link"><?php echo intval($this->_tpl_vars['listing']['shc_total_bids']); ?>
 <?php echo $this->_tpl_vars['lang']['shc_bids']; ?>
<?php if ($this->_tpl_vars['listing']['left_time'] != $this->_tpl_vars['lang']['shc_auction_closed']): ?>, <?php echo $this->_tpl_vars['listing']['left_time']; ?>
<?php endif; ?></span>
        </li>
    <?php endif; ?>
<?php endif; ?>