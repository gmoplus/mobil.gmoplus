<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/currencyConverter/user_navbar.tpl */ ?>
<!-- header user navigation bar -->

<span class="circle currency-selector selector" id="currency_selector">
	<span class="default"><span class="<?php if ($this->_tpl_vars['sign_length'] == 3): ?>code<?php else: ?>symbol<?php endif; ?>"><?php echo $this->_tpl_vars['curConv_sign']; ?>
</span></span>
	<span class="content hide">
		<div>
			<ul>
			<?php $_from = $this->_tpl_vars['curConv_rates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['currencyKey'] => $this->_tpl_vars['curConv_rate']):
?>
                <?php if ($this->_tpl_vars['curConv_rate']['Status'] != 'active'): ?><?php continue; ?><?php endif; ?>

				<li<?php if ($this->_tpl_vars['curConv_rate']['Sticky'] || $this->_tpl_vars['currencyKey'] == $this->_tpl_vars['curConv_code']): ?> class="<?php if ($this->_tpl_vars['curConv_rate']['Sticky']): ?>sticky-rate<?php endif; ?><?php if ($this->_tpl_vars['currencyKey'] == $this->_tpl_vars['curConv_code']): ?> active<?php endif; ?>"<?php endif; ?> data-code="<?php echo $this->_tpl_vars['currencyKey']; ?>
">
                    <a accesskey="<?php echo $this->_tpl_vars['currencyKey']; ?>
" title="<?php echo $this->_tpl_vars['curConv_rate']['Country']; ?>
" class="font1<?php if ($this->_tpl_vars['currencyKey'] == $this->_tpl_vars['curConv_code']): ?> active<?php endif; ?>" href="javascript://"><?php echo $this->_tpl_vars['curConv_rate']['Code']; ?>
</a>
                </li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
	</span>
</span>

<!-- header user navigation bar end -->