<?php /* Smarty version 2.6.31, created on 2025-08-02 22:24:34
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/subcat_icons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'categoryUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/subcat_icons.tpl', 4, false),array('function', 'fetch', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/subcat_icons.tpl', 9, false),array('modifier', 'strpos', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/subcat_icons.tpl', 7, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/subcat_icons.tpl', 8, false),)), $this); ?>
<!-- subcategory icon -->

<span class="<?php if ($this->_tpl_vars['config']['categories_icons_subcategory_position'] == 'left'): ?>mr-2<?php else: ?>ml-2<?php endif; ?>">
    <a class="category category-icon" title="<?php echo $this->_tpl_vars['sub_cat']['name']; ?>
" href="<?php echo $this->_plugins['function']['categoryUrl'][0][0]->categoryUrl(array('category' => $this->_tpl_vars['sub_cat']), $this);?>
">
        <?php $this->assign('icon_is_svg', false); ?>

        <?php if (((is_array($_tmp=$this->_tpl_vars['sub_cat']['Icon'])) ? $this->_run_mod_handler('strpos', true, $_tmp, '.svg') : strpos($_tmp, '.svg')) !== false): ?>
            <?php $this->assign('src', ((is_array($_tmp=((is_array($_tmp=(defined('RL_LIBS') ? @RL_LIBS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'icons/svg-line-set/') : smarty_modifier_cat($_tmp, 'icons/svg-line-set/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sub_cat']['Icon']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sub_cat']['Icon']))); ?>
            <?php echo smarty_function_fetch(array('file' => $this->_tpl_vars['src']), $this);?>

        <?php else: ?>
            <img <?php if ($this->_tpl_vars['config']['categories_icons_crop_module']): ?>loading="lazy" style="width: <?php echo $this->_tpl_vars['config']['categories_icons_width']; ?>
px;height: <?php echo $this->_tpl_vars['config']['categories_icons_height']; ?>
px;"<?php endif; ?> src="<?php echo ((is_array($_tmp=((is_array($_tmp=(defined('RL_URL_HOME') ? @RL_URL_HOME : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'files/') : smarty_modifier_cat($_tmp, 'files/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sub_cat']['Icon']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sub_cat']['Icon'])); ?>
" title="<?php echo $this->_tpl_vars['sub_cat']['name']; ?>
" alt="<?php echo $this->_tpl_vars['sub_cat']['name']; ?>
" />
        <?php endif; ?>
    </a>
</span>

<!-- subcategory icon end -->