<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:14
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/grid_icon_featured.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'intval', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/grid_icon_featured.tpl', 10, false),)), $this); ?>
<?php if ($this->_tpl_vars['config']['shc_module']): ?>
    <?php if ($this->_tpl_vars['featured_listing']['shc_mode'] == 'fixed'): ?>
        <span class="add-to-cart" data-item-id="<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
">
            <svg id="shc-item-<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
" viewBox="0 0 18 18" class="icon grid-icon-fill" title="<?php echo $this->_tpl_vars['lang']['shc_add_to_cart']; ?>
">
                <use xlink:href="#add-to-cart-listing"></use>
            </svg>
        </span>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['featured_listing']['shc_mode'] == 'auction'): ?>
        <span class="auction-listing" title="<?php echo intval($this->_tpl_vars['featured_listing']['shc_total_bids']); ?>
 <?php echo $this->_tpl_vars['lang']['shc_bids']; ?>
, <?php echo $this->_tpl_vars['lang']['shc_left_time']; ?>
: <?php echo $this->_tpl_vars['featured_listing']['left_time']; ?>
" id="shc-item-<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
" data-item-id="<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
">
            <svg viewBox="0 0 18 18" class="icon grid-icon-fill">
                <use xlink:href="#auction_bids"></use>
            </svg>
        </span>
    <?php endif; ?>
<?php endif; ?>