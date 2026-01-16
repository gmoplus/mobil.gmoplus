<?php /* Smarty version 2.6.31, created on 2025-07-13 03:38:42
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/listing_status/recently_sold.block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/recently_sold.block.tpl', 7, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/recently_sold.block.tpl', 12, false),)), $this); ?>
<!-- listings label block -->
<?php if (! empty ( $this->_tpl_vars['ls_listings'] )): ?>
	<ul class="row featured with-pictures">
	<?php $_from = $this->_tpl_vars['ls_listings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['rsold_listing']):
?>
		<?php $this->assign('type', $this->_tpl_vars['rsold_listing']['Listing_type']); ?>
		<?php $this->assign('page_key', $this->_tpl_vars['listing_types'][$this->_tpl_vars['type']]['Page_key']); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'featured_item.tpl') : smarty_modifier_cat($_tmp, 'featured_item.tpl')), 'smarty_include_vars' => array('featured_listing' => $this->_tpl_vars['rsold_listing'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
<?php else: ?>
	<?php $this->assign('ls_lang', ((is_array($_tmp='lsl_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['ls_key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['ls_key']))); ?>
	<div class="grey_middle"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['rsold_no_listings'])) ? $this->_run_mod_handler('replace', true, $_tmp, "[days]", $this->_tpl_vars['ls_days']) : smarty_modifier_replace($_tmp, "[days]", $this->_tpl_vars['ls_days'])))) ? $this->_run_mod_handler('replace', true, $_tmp, "[label]", $this->_tpl_vars['lang'][$this->_tpl_vars['ls_lang']]) : smarty_modifier_replace($_tmp, "[label]", $this->_tpl_vars['lang'][$this->_tpl_vars['ls_lang']])); ?>
</div>
<?php endif; ?>
<!-- listings label block -->