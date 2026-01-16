<?php /* Smarty version 2.6.31, created on 2025-08-02 22:24:34
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/categories_buttons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/categories_buttons.tpl', 3, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/categories_buttons.tpl', 10, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/categories_buttons.tpl', 7, false),array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/categories_buttons.tpl', 10, false),)), $this); ?>
<!-- buttons below categories -->

<?php $this->assign('box_listing_type', ((is_array($_tmp=$this->_tpl_vars['block']['Key'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ltcb_', '') : smarty_modifier_replace($_tmp, 'ltcb_', ''))); ?>
<?php $this->assign('type_page_key', $this->_tpl_vars['listing_types'][$this->_tpl_vars['box_listing_type']]['Page_key']); ?>

<div class="align-center mt-5 d-flex flex-column d-md-block align-items-sm-center">
    <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['type_page_key']), $this);?>
" class="button add-property button-transparent"><?php echo $this->_tpl_vars['lang']['browse_categories']; ?>
</a>
    <?php if ($this->_tpl_vars['post_task_page_key']): ?>
    <span class="ml-4 mr-4 mt-2 mb-2 mt-md-0 mb-md-0"><?php echo $this->_tpl_vars['lang']['or']; ?>
</span>
    <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['post_task_page_key']), $this);?>
" class="button add-property"><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => ((is_array($_tmp='pages+name+al_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['config']['service_package_type_task']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['config']['service_package_type_task']))), $this);?>
</a>
    <?php endif; ?>
</div>

<!-- buttons below categories end -->