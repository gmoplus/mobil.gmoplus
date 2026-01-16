<?php /* Smarty version 2.6.31, created on 2025-07-12 17:35:22
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/bankWireTransfer/form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/bankWireTransfer/form.tpl', 6, false),array('modifier', 'number_format', '/home/gmoplus/mobil.gmoplus.com/plugins/bankWireTransfer/form.tpl', 17, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/bankWireTransfer/form.tpl', 42, false),)), $this); ?>
<!-- bankWireTransfer plugin -->

<div id="bankWireTransfer-form">
	
	<?php if ($this->_tpl_vars['txn_info']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => 'order_information','name' => $this->_tpl_vars['lang']['bwt_order_information'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="table-cell">
				<div class="name"><?php echo $this->_tpl_vars['lang']['item']; ?>
</div>
				<div class="value"><?php if ($this->_tpl_vars['txn_info']['Item']): ?><?php echo $this->_tpl_vars['txn_info']['Item']; ?>
<?php else: ?><?php echo $_SESSION['complete_payment']['item_name']; ?>
<?php endif; ?></div>
			</div>
			<div class="table-cell">
				<div class="name"><?php echo $this->_tpl_vars['lang']['txn_id']; ?>
</div>
				<div class="value"><?php if ($this->_tpl_vars['txn_info']['Txn_ID']): ?><?php echo $this->_tpl_vars['txn_info']['Txn_ID']; ?>
<?php else: ?><?php echo $this->_tpl_vars['txn_id']; ?>
<?php endif; ?></div>
			</div>
			<div class="table-cell">
				<div class="name"><?php echo $this->_tpl_vars['lang']['price']; ?>
</div>
				<div class="value"><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['txn_info']['Total'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, '.', ',') : number_format($_tmp, 2, '.', ',')); ?>
 <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?></div>
			</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	    
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => 'payment_info','name' => $this->_tpl_vars['lang']['bwt_payment_details'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php if ($this->_tpl_vars['payment_details']): ?>
            <div class="table-cell">
                <div class="value">
                    <?php echo $this->_tpl_vars['payment_details']['content']; ?>

                </div>
            </div>
        <?php else: ?>
            <div class="static-content"><?php echo $this->_tpl_vars['lang']['bwt_missing_payment_details']; ?>
</div>
        <?php endif; ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php if ($this->_tpl_vars['completed']): ?>
		<div class="table-cell">
            <?php if ($this->_tpl_vars['txn_info']['Txn_ID']): ?>
                <?php $this->assign('txnID', $this->_tpl_vars['txn_info']['Txn_ID']); ?>
            <?php else: ?>
                <?php $this->assign('txnID', $this->_tpl_vars['txn_id']); ?>
            <?php endif; ?>
            <a class="button" href="<?php echo $_SESSION['complete_payment']['success_url']; ?>
"><?php echo $this->_tpl_vars['lang']['bwt_continue']; ?>
</a>&nbsp;&nbsp;
			<a target="_blank" class="margin" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'bwt_print','vars' => ((is_array($_tmp='txn_id=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['txnID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['txnID']))), $this);?>
"><?php echo $this->_tpl_vars['lang']['print_page']; ?>
</a>
		</div>
	<?php endif; ?>
</div>

<script  class="fl-js-dynammic">
    <?php if ($this->_tpl_vars['completed']): ?>
        <?php echo '
        $(\'ul#payment_gateways li input[type="radio"]\').each(function() {
            if ($(this).val() == \'bankWireTransfer\' && $(this).is(\':checked\')) {
                $(\'#fs_credit_card_details, #fs_billing_details\').addClass(\'hide\');
            }
        });
        $(document).ready(function(){
            $(\'#fs_order_details\').remove();
            $(\'#payment_gateways\').parent().parent().parent().remove();
            if ($(\'#form-checkout\').find(\'div.form-buttons\').length) {
                $(\'#form-checkout\').find(\'div.form-buttons\').remove();
            }
            // remove checkout button
            if ($(\'#form-checkout\').find(\'input[type="submit"]\').length) {
                $(\'#form-checkout\').find(\'input[type="submit"]\').remove();    
            }
            // remove cancel button
            if ($(\'#form-checkout\').find(\'a.close\').length) {
                $(\'#form-checkout\').find(\'a.close\').remove();    
            }
        });
        '; ?>

    <?php endif; ?>
</script>

<!-- end bankWireTransfer plugin -->