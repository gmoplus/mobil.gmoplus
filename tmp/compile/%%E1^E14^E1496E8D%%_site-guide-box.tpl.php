<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:20
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/site-guide-box/_site-guide-box.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/site-guide-box/_site-guide-box.tpl', 3, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/site-guide-box/_site-guide-box.tpl', 10, false),array('function', 'fetch', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/site-guide-box/_site-guide-box.tpl', 15, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/site-guide-box/_site-guide-box.tpl', 3, false),)), $this); ?>
<!-- site guide box -->

<?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/site-guide-box/site-guide-box.css') : smarty_modifier_cat($_tmp, 'components/site-guide-box/site-guide-box.css'))), $this);?>


<section class="row">
    <div class="col-md-4">
        <div class="site-guide-card w-100 position-relative overflow-hidden mb-4 mb-md-0">
            <div class="position-absolute w-100 h-100">
                <?php if ($this->_tpl_vars['post_task_page_key']): ?>
                <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['post_task_page_key']), $this);?>
" class="text-reset">
                <?php endif; ?>
                    <div class="pt-4 pl-4 pr-4 pt-md-2 pl-md-2 pr-md-2 pt-xl-4 pl-xl-4 pr-xl-4 text-center">
                        <h3 class="mt-2 font-weight-bold mb-3"><?php echo $this->_tpl_vars['lang']['site_guide_card_title_1']; ?>
</h3>
                        <p class="font-weight-light"><?php echo $this->_tpl_vars['lang']['site_guide_card_text_1']; ?>
</p>
                        <?php echo smarty_function_fetch(array('file' => ((is_array($_tmp=$this->_tpl_vars['componentDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'site-guide-box/image1.svg') : smarty_modifier_cat($_tmp, 'site-guide-box/image1.svg'))), $this);?>

                    </div>
                <?php if ($this->_tpl_vars['post_task_page_key']): ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="site-guide-card w-100 position-relative overflow-hidden mb-4 mb-md-0">
            <div class="position-absolute w-100 h-100">
                <div class="pt-4 pl-4 pr-4 pt-md-2 pl-md-2 pr-md-2 pt-xl-4 pl-xl-4 pr-xl-4 text-center">
                    <h3 class="mt-2 font-weight-bold mb-3"><?php echo $this->_tpl_vars['lang']['site_guide_card_title_2']; ?>
</h3>
                    <p class="font-weight-light"><?php echo $this->_tpl_vars['lang']['site_guide_card_text_2']; ?>
</p>
                    <?php echo smarty_function_fetch(array('file' => ((is_array($_tmp=$this->_tpl_vars['componentDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'site-guide-box/image2.svg') : smarty_modifier_cat($_tmp, 'site-guide-box/image2.svg'))), $this);?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="site-guide-card w-100 position-relative overflow-hidden">
            <div class="position-absolute w-100 h-100">
                <div class="pt-4 pl-4 pr-4 pt-md-2 pl-md-2 pr-md-2 pt-xl-4 pl-xl-4 pr-xl-4 text-center">
                    <h3 class="mt-2 font-weight-bold mb-3"><?php echo $this->_tpl_vars['lang']['site_guide_card_title_3']; ?>
</h3>
                    <p class="font-weight-light"><?php echo $this->_tpl_vars['lang']['site_guide_card_text_3']; ?>
</p>
                    <?php echo smarty_function_fetch(array('file' => ((is_array($_tmp=$this->_tpl_vars['componentDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'site-guide-box/image3.svg') : smarty_modifier_cat($_tmp, 'site-guide-box/image3.svg'))), $this);?>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- site guide box end -->