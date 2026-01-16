<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/header_banner.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'eval', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/header_banner.tpl', 13, false),)), $this); ?>
<!-- header banner tpl -->

<?php $this->assign('banner_placed', false); ?>

<?php if ($this->_tpl_vars['blocks']['header_banner']): ?>
	<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block']):
?>
		<?php if ($this->_tpl_vars['block']['Side'] == 'header_banner'): ?>
			<?php $this->assign('banner_placed', true); ?>
			
			<?php if ($this->_tpl_vars['block']['Type'] == 'html'): ?>
				<?php echo $this->_tpl_vars['block']['Content']; ?>

			<?php elseif ($this->_tpl_vars['block']['Type'] == 'smarty'): ?>
				<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'eval', 'content' => $this->_tpl_vars['block']['Content'])), $this); ?>

			<?php elseif ($this->_tpl_vars['block']['Type'] == 'php'): ?>
				<?php 
					eval($this->_tpl_vars['block']['Content']);
				 ?>
			<?php endif; ?>
			
			<?php break; ?>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['banner_placed']): ?>
	<div class="banner-space d-flex h-100 w-100 justify-content-center align-items-center"><?php echo $this->_tpl_vars['tpl_settings']['header_banner_size_hint']; ?>
</div>
<?php endif; ?>

<!-- header banner tpl end -->