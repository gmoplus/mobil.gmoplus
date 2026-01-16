<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:12
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'categoryUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl', 35, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl', 35, false),array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl', 50, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl', 73, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl', 179, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl', 47, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl', 50, false),array('modifier', 'number_format', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/category-box/_category-box.tpl', 96, false),)), $this); ?>
<!-- category box -->

<?php $this->assign('more_categories_link', false); ?>
<?php $this->assign('type_settings', $this->_tpl_vars['listing_types'][$this->_tpl_vars['type']]); ?>
<?php $this->assign('sidebar_mode', false); ?>
<?php $this->assign('middle_mode', false); ?>
<?php $this->assign('parent_scrollbar', false); ?>

<?php if ($this->_tpl_vars['block']['Options']['categories_style']['default'] == 'grid'): ?>
    <?php $this->assign('grid_class', 'col-sm-6 col-md-4 col-lg-3'); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['typePage']): ?>
    <?php $this->assign('source_categories', $this->_tpl_vars['categories']); ?>
<?php else: ?>
    <?php $this->assign('source_categories', $this->_tpl_vars['box_categories'][$this->_tpl_vars['type']]); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['block']['Side'] == 'middle_left' || $this->_tpl_vars['block']['Side'] == 'middle_right'): ?>
    <?php $this->assign('middle_mode', true); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['block']['Side'] == 'left' || $this->_tpl_vars['middle_mode']): ?>
    <?php $this->assign('sidebar_mode', true); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['sidebar_mode'] && $this->_tpl_vars['bread_crumbs']): ?>
    <div class="categories-bc d-md-none d-lg-block">
    <?php $_from = $this->_tpl_vars['bread_crumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['category_bc'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['category_bc']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['category_bc']):
        $this->_foreach['category_bc']['iteration']++;
?>
        <?php if (($this->_foreach['category_bc']['iteration'] <= 1) || ($this->_foreach['category_bc']['iteration'] == $this->_foreach['category_bc']['total'])): ?>
            <?php continue; ?>
        <?php endif; ?>

        <div class="pb-1">
            <a href="<?php if ($this->_tpl_vars['category_bc']['category']): ?><?php echo $this->_plugins['function']['categoryUrl'][0][0]->categoryUrl(array('category' => $this->_tpl_vars['category_bc']), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['pageInfo']['Key']), $this);?>
<?php endif; ?>" class="d-flex align-items-center">
                <svg viewBox="0 0 16 32" class="categories-box__arrow mr-2 header-usernav-icon-fill">
                   <use xlink:href="#core-icon-arrow-left"></use>
                </svg>
                <?php echo $this->_tpl_vars['category_bc']['name']; ?>

            </a>
        </div>
    <?php endforeach; endif; unset($_from); ?>
    </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['source_categories']): ?>
    <?php $this->assign('categories_count', count($this->_tpl_vars['source_categories'])); ?>

    <?php if ($this->_tpl_vars['block']['Options']['visible_categories']['default'] && $this->_tpl_vars['categories_count'] > $this->_tpl_vars['block']['Options']['visible_categories']['default']): ?>
        <?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=(defined('RL_LIBS_URL') ? @RL_LIBS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fancyapps/carousel.css') : smarty_modifier_cat($_tmp, 'fancyapps/carousel.css'))), $this);?>

        <?php $this->assign('carousel', $this->_tpl_vars['block']['Options']['visible_categories']['default']); ?>
    <?php endif; ?>

    <?php $this->assign('categories_has_subcat', false); ?>
    <?php $_from = $this->_tpl_vars['source_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
        <?php if ($this->_tpl_vars['cat']['sub_categories']): ?>
            <?php $this->assign('categories_has_subcat', true); ?>
            <?php break; ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

    <div class="categories-box mt-2<?php if ($this->_tpl_vars['block']['Options']['display_subcategories']['default'] && ! $this->_tpl_vars['sidebar_mode']): ?> categories-box_subcategory-exists<?php endif; ?><?php if ($this->_tpl_vars['sidebar_mode']): ?> categories-box__style_sidebar<?php endif; ?><?php if ($this->_tpl_vars['middle_mode']): ?> categories-box__style_middle<?php endif; ?> categories-box__style_<?php echo $this->_tpl_vars['block']['Options']['categories_style']['default']; ?>
<?php if ($this->_tpl_vars['carousel']): ?> carousel<?php endif; ?>" id="categories_box_<?php echo $this->_tpl_vars['block']['Key']; ?>
">

        <?php if ($this->_tpl_vars['carousel']): ?>
        <div class="f-carousel__viewport overflow-hidden">
            <div class="f-carousel__track d-flex">
        <?php endif; ?>

        <div class="categories-box__slide<?php if ($this->_tpl_vars['carousel']): ?> f-carousel__slide p-0 w-100 col-12<?php endif; ?><?php if ($this->_tpl_vars['typePage'] && isset ( $this->_tpl_vars['category']['Parent_ID'] )): ?> pl-3 pl-md-0 pl-lg-3<?php endif; ?>">
            <div class="<?php if (! $this->_tpl_vars['carousel'] && $this->_tpl_vars['sidebar_mode'] && $this->_tpl_vars['categories_count'] > 12): ?><?php $this->assign('parent_scrollbar', true); ?>categories-box__scrollbar scrollbar<?php elseif ($this->_tpl_vars['block']['Options']['categories_style']['default'] == 'grid'): ?>overflow-hidden<?php endif; ?>">
                <div<?php if ($this->_tpl_vars['block']['Options']['categories_style']['default'] == 'grid'): ?> class="row"<?php endif; ?>>
            <?php $_from = $this->_tpl_vars['source_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fCategory'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fCategory']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['fCategory']['iteration']++;
?>
                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplBetweenCategories'), $this);?>


                <div class="categories-box__item<?php if (! $this->_tpl_vars['cat']['Count']): ?> categories-box__item_empty<?php endif; ?> <?php echo $this->_tpl_vars['grid_class']; ?>
">
                    <div class="categories-box__parent d-flex align-items-center category-wrapper-hook pb-2">
                        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplPreCategory'), $this);?>


                        <div class="d-flex align-items-center shrink-fix overflow-hidden<?php if ($this->_tpl_vars['block']['Options']['display_subcategories']['default'] && $this->_tpl_vars['categories_has_subcat'] && ! $this->_tpl_vars['cat']['sub_categories']): ?> categories-box__parent-link-wrapper<?php endif; ?>">
                            <?php if ($this->_tpl_vars['cat']['sub_categories'] && $this->_tpl_vars['sidebar_mode'] && $this->_tpl_vars['block']['Options']['display_subcategories']['default']): ?>
                                <svg viewBox="0 0 32 32" class="categories-box__plus user-select-none mr-2 header-usernav-icon-fill d-md-none d-lg-block">
                                   <use xlink:href="#core-icon-plus"></use>
                                </svg>
                            <?php endif; ?>

                            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplPreCategoryName'), $this);?>


                            <a class="categories-box__parent-link<?php if ($this->_tpl_vars['category'] && $this->_tpl_vars['cat']['ID'] == $this->_tpl_vars['category']['ID']): ?> categories-box__parent-link_active<?php endif; ?>"
                               title="<?php if ($this->_tpl_vars['lang'][$this->_tpl_vars['cat']['pTitle']]): ?><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['cat']['pTitle']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['cat']['pName']]; ?>
<?php endif; ?>"
                               href="<?php if (isset ( $this->_tpl_vars['cat']['Links_type'] )): ?><?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['cat']['Page_key']), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['categoryUrl'][0][0]->categoryUrl(array('category' => $this->_tpl_vars['cat']), $this);?>
<?php endif; ?>">
                                    <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['cat']['pName']]; ?>

                            </a>

                            <?php if ($this->_tpl_vars['block']['Options']['display_counter']['default']): ?>
                                <div class="categories-box__parent-counter ml-2">
                                    <span><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['Count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplPostCategory'), $this);?>

                    </div>

                    <?php if ($this->_tpl_vars['cat']['sub_categories'] && $this->_tpl_vars['block']['Options']['display_subcategories']['default']): ?>
                        <div class="categories-box__subcategories pb-3">
                            <div<?php if ($this->_tpl_vars['sidebar_mode'] && ! $this->_tpl_vars['parent_scrollbar'] && count($this->_tpl_vars['cat']['sub_categories']) > 12 && ! $this->_tpl_vars['block']['Options']['subcategories_number']['default']): ?> class="categories-box__scrollbar scrollbar"<?php endif; ?>>
                            <?php $_from = $this->_tpl_vars['cat']['sub_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['subCatF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['subCatF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sub_cat']):
        $this->_foreach['subCatF']['iteration']++;
?>
                                <div class="categories-box__subcategory align-items-center <?php echo ''; ?><?php if ($this->_tpl_vars['block']['Options']['subcategories_number']['default'] && $this->_foreach['subCatF']['iteration'] > $this->_tpl_vars['block']['Options']['subcategories_number']['default']): ?><?php echo ' categories-box__hidden d-none'; ?><?php else: ?><?php echo 'd-flex'; ?><?php endif; ?><?php echo ''; ?>
">
                                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplPreSubCategory'), $this);?>


                                    <a class="categories-box__subcategory-link" title="<?php if ($this->_tpl_vars['lang'][$this->_tpl_vars['sub_cat']['pTitle']]): ?><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['sub_cat']['pTitle']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['sub_cat']['name']; ?>
<?php endif; ?>"
                                       href="<?php echo $this->_plugins['function']['categoryUrl'][0][0]->categoryUrl(array('category' => $this->_tpl_vars['sub_cat'],'type' => $this->_tpl_vars['cat']['Type']), $this);?>
">
                                        <?php echo $this->_tpl_vars['sub_cat']['name']; ?>

                                    </a>

                                                                        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplPostSubCategory'), $this);?>

                                </div>
                            <?php endforeach; endif; unset($_from); ?>
                            </div>

                            <?php if ($this->_tpl_vars['block']['Options']['subcategories_number']['default'] && $this->_foreach['subCatF']['total'] > $this->_tpl_vars['block']['Options']['subcategories_number']['default']): ?>
                                <?php if ($this->_tpl_vars['block']['Options']['more_subcategories_style']['default'] == 'more_subcategories_popup'): ?>
                                    <span class="categories-box__more-subcategories" title="<?php echo $this->_tpl_vars['lang']['show_other_categories']; ?>
"><?php echo $this->_tpl_vars['lang']['more']; ?>
 &raquo;</span>
                                    <?php $this->assign('more_categories_link', true); ?>
                                <?php else: ?>
                                    <a href="<?php if (isset ( $this->_tpl_vars['cat']['Links_type'] )): ?><?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['cat']['Page_key']), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['categoryUrl'][0][0]->categoryUrl(array('category' => $this->_tpl_vars['cat']), $this);?>
<?php endif; ?>"
                                       class="button low mt-2"
                                       title="<?php echo $this->_tpl_vars['lang']['show_other_categories']; ?>
">
                                        <?php echo $this->_tpl_vars['lang']['show_other_categories']; ?>

                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

        <?php if ($this->_tpl_vars['carousel'] && $this->_foreach['fCategory']['iteration']%$this->_tpl_vars['carousel'] == 0 && ! ($this->_foreach['fCategory']['iteration'] == $this->_foreach['fCategory']['total'])): ?>
                </div>
            </div>
        </div>
        <div class="categories-box__slide f-carousel__slide p-0 w-100 col-12">
            <div>
                <div class="<?php if ($this->_tpl_vars['block']['Options']['categories_style']['default'] == 'grid'): ?>row<?php endif; ?>">
        <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
                </div>
            </div>
        </div>

        <?php if ($this->_tpl_vars['carousel']): ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($this->_tpl_vars['carousel']): ?>
        <script class="fl-js-dynamic">
        var category_box_id = '#categories_box_<?php echo $this->_tpl_vars['block']['Key']; ?>
';
        <?php echo '
        flUtil.loadScript(rlConfig[\'libs_url\']+\'fancyapps/carousel.umd.js\', function(){
            new Carousel($(category_box_id).get(0), {
                Navigation: false,
                Autoplay: false
            });
        });
        '; ?>

        </script>
    <?php endif; ?>
<?php else: ?>
    <?php if (! isset ( $this->_tpl_vars['search_results'] )): ?>
        <?php echo $this->_tpl_vars['lang']['listing_type_no_categories']; ?>

    <?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['more_categories_link'] || $this->_tpl_vars['sidebar_mode']): ?>
    <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/category-box/_category-box.js') : smarty_modifier_cat($_tmp, 'components/category-box/_category-box.js'))), $this);?>

<?php endif; ?>

<!-- category box end -->