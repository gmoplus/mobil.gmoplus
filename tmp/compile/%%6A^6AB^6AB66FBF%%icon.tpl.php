<?php /* Smarty version 2.6.31, created on 2025-07-12 19:10:10
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/icon.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strpos', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/icon.tpl', 3, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/icon.tpl', 16, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/icon.tpl', 21, false),array('function', 'categoryUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/icon.tpl', 23, false),array('function', 'fetch', '/home/gmoplus/mobil.gmoplus.com/plugins/categories_icons/icon.tpl', 29, false),)), $this); ?>
<!-- categories_icons plugin -->

<?php if ($this->_tpl_vars['cat']['Icon'] && ( ( ((is_array($_tmp=$this->_tpl_vars['block']['Key'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'ltcategories_') : strpos($_tmp, 'ltcategories_')) === 0 && $this->_tpl_vars['config']['categories_icons_type_page'] ) || ((is_array($_tmp=$this->_tpl_vars['block']['Key'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'ltcb_') : strpos($_tmp, 'ltcb_')) === 0 )): ?>
    <?php if (((is_array($_tmp=$this->_tpl_vars['block']['Key'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'ltcategories_') : strpos($_tmp, 'ltcategories_')) === 0): ?>
        <?php $this->assign('ci_icon_width', $this->_tpl_vars['config']['categories_icons_width_type_page']); ?>
        <?php $this->assign('ci_icon_height', $this->_tpl_vars['config']['categories_icons_height_type_page']); ?>
    <?php else: ?>
        <?php $this->assign('ci_icon_width', $this->_tpl_vars['config']['categories_icons_width']); ?>
        <?php $this->assign('ci_icon_height', $this->_tpl_vars['config']['categories_icons_height']); ?>
    <?php endif; ?>

    <?php $this->assign('lt_tmp', $this->_tpl_vars['listing_types'][$this->_tpl_vars['cat']['Type']]); ?>
    <?php $this->assign('lt_page_path', ((is_array($_tmp='lt_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['lt_tmp']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['lt_tmp']['Key']))); ?>

    <div class="<?php if ($this->_tpl_vars['config']['categories_icons_position'] == 'left'): ?>mr-3 mb-1 mt-1<?php elseif ($this->_tpl_vars['config']['categories_icons_position'] == 'right'): ?>ml-3 mb-1 mt-1<?php elseif ($this->_tpl_vars['config']['categories_icons_position'] == 'top'): ?>mt-3 mb-2 flex-basis-100<?php elseif ($this->_tpl_vars['config']['categories_icons_position'] == 'bottom'): ?>mt-2 mb-3 flex-basis-100<?php endif; ?><?php if (isset ( $this->_tpl_vars['cat']['Links_type'] ) && ( $this->_tpl_vars['config']['categories_icons_position'] == 'left' || $this->_tpl_vars['config']['categories_icons_position'] == 'right' )): ?> d-inline align-middle<?php endif; ?>">
        <a class="category-icon" title="<?php echo $this->_tpl_vars['cat']['name']; ?>
"
        <?php if ($this->_tpl_vars['ltCatBlock']): ?> 
            href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['lt_page_path'],'custom_lang' => (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null)), $this);?>
"
        <?php else: ?> 
            href="<?php echo $this->_plugins['function']['categoryUrl'][0][0]->categoryUrl(array('id' => $this->_tpl_vars['cat']['ID']), $this);?>
"
        <?php endif; ?>>
            <?php $this->assign('icon_is_svg', false); ?>

            <?php if (((is_array($_tmp=$this->_tpl_vars['cat']['Icon'])) ? $this->_run_mod_handler('strpos', true, $_tmp, '.svg') : strpos($_tmp, '.svg')) !== false): ?>
                <?php $this->assign('src', ((is_array($_tmp=((is_array($_tmp=(defined('RL_LIBS') ? @RL_LIBS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'icons/svg-line-set/') : smarty_modifier_cat($_tmp, 'icons/svg-line-set/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['cat']['Icon']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['cat']['Icon']))); ?>
                <?php echo smarty_function_fetch(array('file' => $this->_tpl_vars['src']), $this);?>

            <?php else: ?>
                <img <?php if ($this->_tpl_vars['ci_icon_width'] || $this->_tpl_vars['ci_icon_height']): ?>loading="lazy" style="width: <?php echo $this->_tpl_vars['ci_icon_width']; ?>
px;height: <?php echo $this->_tpl_vars['ci_icon_height']; ?>
px;"<?php endif; ?> src="<?php echo ((is_array($_tmp=((is_array($_tmp=(defined('RL_URL_HOME') ? @RL_URL_HOME : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'files/') : smarty_modifier_cat($_tmp, 'files/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['cat']['Icon']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['cat']['Icon'])); ?>
" title="<?php echo $this->_tpl_vars['cat']['name']; ?>
" alt="<?php echo $this->_tpl_vars['cat']['name']; ?>
" />
            <?php endif; ?>
        </a>
    </div>
<?php endif; ?>

<!-- end categories_icons plugin -->