<?php /* Smarty version 2.6.31, created on 2025-07-13 03:58:03
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news_categories_block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news_categories_block.tpl', 5, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news_categories_block.tpl', 32, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news_categories_block.tpl', 13, false),)), $this); ?>
<!-- news categories block tpl -->

<?php if (! empty ( $this->_tpl_vars['newsCategories'] )): ?>
    <?php $this->assign('sidebar_mode', false); ?>
    <?php $this->assign('categories_count', count($this->_tpl_vars['newsCategories'])); ?>

    <?php if ($this->_tpl_vars['block']['Side'] == 'left'): ?>
        <?php $this->assign('sidebar_mode', true); ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['newsCurrentCategory']): ?>
    <div class="pb-1">
        <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'news'), $this);?>
" class="d-flex align-items-center">
            <svg viewBox="0 0 16 32" class="categories-box__arrow mr-2 header-usernav-icon-fill">
               <use xlink:href="#core-icon-arrow-left"></use>
            </svg>
            <?php echo $this->_tpl_vars['lang']['all_news']; ?>

        </a>
    </div>
    <?php endif; ?>

    <div class="categories-box mt-2<?php if ($this->_tpl_vars['sidebar_mode']): ?> categories-box__style_sidebar<?php endif; ?> categories-box__style_grid">
        <div class="categories-box__slide<?php if ($this->_tpl_vars['newsCurrentCategory']): ?> pl-3 pl-md-0 pl-lg-3<?php endif; ?>">
            <div class="<?php if ($this->_tpl_vars['sidebar_mode'] && $this->_tpl_vars['categories_count'] > 12): ?> categories-box__scrollbar scrollbar<?php endif; ?>">
                <div class="row">
                <?php $_from = $this->_tpl_vars['newsCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['newsCategory']):
?>
                    <div class="categories-box__item col-md-4 col-lg-3">
                        <div class="categories-box__parent d-flex align-items-center <?php if ($this->_tpl_vars['sidebar_mode']): ?>pb-1 pb-md-2 pb-lg-1<?php else: ?>pb-2<?php endif; ?>">
                            <div class="d-flex align-items-center shrink-fix overflow-hidden">
                                <a class="categories-box__parent-link<?php if ($this->_tpl_vars['newsCurrentCategory'] && $this->_tpl_vars['newsCurrentCategory']['ID'] == $this->_tpl_vars['newsCategory']['ID']): ?> categories-box__parent-link_active<?php endif; ?>"
                                   title="<?php echo $this->_tpl_vars['newsCategory']['Name']; ?>
"
                                   href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'news','add_url' => ((is_array($_tmp='category=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['newsCategory']['Path']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['newsCategory']['Path']))), $this);?>
">
                                        <?php echo $this->_tpl_vars['newsCategory']['Name']; ?>

                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; unset($_from); ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <?php echo $this->_tpl_vars['lang']['listing_type_no_categories']; ?>

<?php endif; ?>

<!-- news categories block tpl end -->