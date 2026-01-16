<?php /* Smarty version 2.6.31, created on 2025-10-12 11:06:02
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/cart_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'str2money', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/cart_items.tpl', 26, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/cart_items.tpl', 41, false),)), $this); ?>
<!-- my cart items list -->

<?php if (! empty ( $this->_tpl_vars['shcItems'] )): ?>
	<?php $_from = $this->_tpl_vars['shcItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['shcItemsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shcItemsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['shcItemsF']['iteration']++;
?>
		<li class="d-flex mb-3">
			<?php if ($this->_tpl_vars['item']['Main_photo']): ?>
				<div class="cart-item-picture mr-2<?php if (! $this->_tpl_vars['item']['shc_available']): ?> shc-item-unavailable<?php endif; ?>">
					<a href="<?php echo $this->_tpl_vars['item']['listing_link']; ?>
" target="_blank">
						<img alt="<?php echo $this->_tpl_vars['item']['Item']; ?>
"
							<?php if ($this->_tpl_vars['item']['Main_photo']): ?>
							src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['item']['Main_photo']; ?>
" 
							<?php else: ?>
							src="data:image/png;base64, <?php echo $this->_tpl_vars['item']['photo_tmp']; ?>
"
							<?php endif; ?>
						/>
					</a>
				</div>
			<?php endif; ?>
			<div class="cart-item-info flex-fill position-relative pr-3">
				<a href="<?php echo $this->_tpl_vars['item']['listing_link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['item']['Item']; ?>
</a>
				<div class="pt-1<?php if (! $this->_tpl_vars['item']['shc_available']): ?> red unavailable<?php endif; ?>">
					<?php if ($this->_tpl_vars['item']['shc_available']): ?>
						<span class="shc-rtl-fix"><?php echo $this->_tpl_vars['item']['Quantity']; ?>
 x</span>
						<strong class="shc_price">
						<?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
						<?php echo $this->_plugins['function']['str2money'][0][0]->str2money(array('string' => $this->_tpl_vars['item']['Price']), $this);?>

						<?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?> <?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
						</strong>
					<?php else: ?>
						<?php echo $this->_tpl_vars['lang']['shc_not_available']; ?>

					<?php endif; ?>
				</div>

				<div title="<?php echo $this->_tpl_vars['lang']['remove']; ?>
" class="close-red position-absolute delete-item-from-cart" data-id="<?php echo $this->_tpl_vars['item']['ID']; ?>
" data-item-id="<?php echo $this->_tpl_vars['item']['Item_ID']; ?>
"></div>
			</div>
		</li>
	<?php endforeach; endif; unset($_from); ?>
	
	<li class="d-flex align-items-center justify-content-between controls">
		<a href="javascript:void(0);" class="clear-cart red"><?php echo $this->_tpl_vars['lang']['shc_clear_cart']; ?>
</a>
        <a class="button ml-3" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'shc_my_shopping_cart'), $this);?>
"><?php echo $this->_tpl_vars['lang']['checkout']; ?>
</a>
	</li>
<?php else: ?>
	<li class="text-notice"><?php echo $this->_tpl_vars['lang']['shc_empty_cart']; ?>
</li>
<?php endif; ?>

<!-- my cart items list end -->