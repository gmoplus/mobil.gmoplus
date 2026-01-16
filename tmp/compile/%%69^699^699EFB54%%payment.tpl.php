<?php /* Smarty version 2.6.31, created on 2025-07-14 14:03:41
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/payment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'constant', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/payment.tpl', 2, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/payment.tpl', 3, false),array('modifier', 'number_format', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/payment.tpl', 15, false),array('function', 'gateways', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/payment.tpl', 38, false),)), $this); ?>
<div class="highlight">
	<?php if ($this->_tpl_vars['step'] != ((is_array($_tmp="rlPayment::POST_URL")) ? $this->_run_mod_handler('constant', true, $_tmp) : constant($_tmp))): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => 'order_details','name' => $this->_tpl_vars['lang']['order_details'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<div class="table-cell">
			<div class="name"><div><span><?php echo $this->_tpl_vars['lang']['item']; ?>
</span></div></div>
			<div class="value">
				<?php echo $this->_tpl_vars['transaction']['Item_name']; ?>

			</div>
		</div>
		<div class="table-cell">
			<div class="name"><div><span><?php echo $this->_tpl_vars['lang']['total']; ?>
</span></div></div>
			<div class="value">
				<?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['transaction']['Total'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, '.', ',') : number_format($_tmp, 2, '.', ',')); ?>

				<?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
			</div>
		</div>
		<?php if ($this->_tpl_vars['transaction']['Status'] == 'paid'): ?>
			<div class="table-cell">
				<div class="name"><div><span><?php echo $this->_tpl_vars['lang']['txn_id']; ?>
</span></div></div>
				<div class="value">
					<?php echo $this->_tpl_vars['transaction']['Txn_ID']; ?>

				</div>
			</div>
			<div class="table-cell">
				<div class="name"><div><span><?php echo $this->_tpl_vars['lang']['payment_gateway']; ?>
</span></div></div>
				<div class="value">
					<?php echo $this->_tpl_vars['transaction']['Gateway']; ?>

				</div>
			</div>
		<?php endif; ?>

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<!-- payment gateways -->
		<?php if ($this->_tpl_vars['step'] == ((is_array($_tmp="rlPayment::CHECKOUT_URL")) ? $this->_run_mod_handler('constant', true, $_tmp) : constant($_tmp))): ?>
			<?php echo $this->_plugins['function']['gateways'][0][0]->gateways(array(), $this);?>

		<?php endif; ?>
		<!-- end payment gateways -->	
	<?php endif; ?>
</div>