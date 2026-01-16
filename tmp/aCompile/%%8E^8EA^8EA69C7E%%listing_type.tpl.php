<?php /* Smarty version 2.6.31, created on 2025-08-02 18:25:38
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/listing_type.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/listing_type.tpl', 6, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/listing_type.tpl', 11, false),)), $this); ?>
<!-- shopping cart option -->

<?php $this->assign('shcModule', 'config+name+shc_module'); ?>
<?php $this->assign('shcAuction', 'config+name+shc_module_auction'); ?>
<tr>
	<td class="name"><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => $this->_tpl_vars['shcModule'],'db_check' => true), $this);?>
</td>
	<td class="field">
		<?php $this->assign('checkbox_field', 'shc_module'); ?>
		
		<?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
			<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
		<?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
			<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
		<?php else: ?>
			<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
		<?php endif; ?>
		
		<table>
		<tr>
			<td>
				<input <?php echo $this->_tpl_vars['shc_module_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
				<input <?php echo $this->_tpl_vars['shc_module_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
			</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td class="name"><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => $this->_tpl_vars['shcAuction'],'db_check' => true), $this);?>
</td>
	<td class="field">
		<?php $this->assign('checkbox_field', 'shc_auction'); ?>
		
		<?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
			<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
		<?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
			<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
		<?php else: ?>
			<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
		<?php endif; ?>
		
		<table>
		<tr>
			<td>
				<input <?php echo $this->_tpl_vars['shc_auction_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
				<input <?php echo $this->_tpl_vars['shc_auction_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
			</td>
		</tr>
		</table>
	</td>
</tr>

<!-- shopping cart option end -->