<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/footer.tpl', 17, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/footer.tpl', 42, false),)), $this); ?>
    <footer class="page-footer content-padding">
        <div class="point1 clearfix">
            <div class="row no-gutters">
                <?php if ($this->_tpl_vars['plugins']['massmailer_newsletter']): ?>
                    <div class="newsletter col-12 col-xl-3 order-xl-2 mb-4">
                        <div class="row">
                            <p class="newsletter__text col-xl-12 col-md-6"><?php echo $this->_tpl_vars['lang']['footer_newsletter_text']; ?>
</p>
                            <div class="col-xl-12 col-md-6" id="nova-newsletter-cont">

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <nav class="footer-menu col-12<?php if ($this->_tpl_vars['plugins']['massmailer_newsletter']): ?> col-xl-9<?php endif; ?>">
                    <div class="row">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='menus')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'footer_menu.tpl') : smarty_modifier_cat($_tmp, 'footer_menu.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                        <?php if ($this->_tpl_vars['config']['ios_app_url'] || $this->_tpl_vars['config']['android_app_url']): ?>
                            <div class="mobile-apps col-lg-3">
                                <h4 class="footer-menu-title"><?php echo $this->_tpl_vars['lang']['footer_menu_mobile_apps']; ?>
</h4>
                                <?php if ($this->_tpl_vars['config']['ios_app_url']): ?>
                                <a class="d-inline-block pt-0 pt-lg-2 mb-lg-3" target="_blank" href="<?php echo $this->_tpl_vars['config']['ios_app_url']; ?>
">
                                    <img src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/app-store-icon.svg" alt="App store icon" />
                                </a>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['config']['android_app_url']): ?>
                                <a class="d-inline-block ml-3 ml-lg-0 mt-0" target="_blank" href="<?php echo $this->_tpl_vars['config']['android_app_url']; ?>
">
                                    <img src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/play-market-icon.svg" alt="Play market icon" />
                                </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer_data.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </footer>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplFooter'), $this);?>

</div>

<?php if (! $this->_tpl_vars['isLogin']): ?>
    <div id="login_modal_source" class="hide">
        <div class="tmp-dom">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/login_modal.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footerScript.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['componentDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'offer-task/_offer-task.tpl') : smarty_modifier_cat($_tmp, 'offer-task/_offer-task.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['componentDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'offer-service/_offer-service.tpl') : smarty_modifier_cat($_tmp, 'offer-service/_offer-service.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>