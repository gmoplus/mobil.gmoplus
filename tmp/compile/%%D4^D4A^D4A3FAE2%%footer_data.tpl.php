<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/footer_data.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/footer_data.tpl', 11, false),)), $this); ?>
<!-- footer data tpl -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../img/social.svg', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="footer-data row mt-4">
    <div class="icons justify-content-start col-12 col-sm-auto col-lg-3 order-2 mt-3 mt-sm-0 d-flex">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menus/footer_social_icons.tpl', 'smarty_include_vars' => array('marginClass' => 'mr-4')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <div class="align-self-center col-12 mt-4 mt-sm-0 col-sm">
        &copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
, <?php echo $this->_tpl_vars['lang']['powered_by']; ?>

        <a title="<?php echo $this->_tpl_vars['lang']['powered_by']; ?>
 <?php echo $this->_tpl_vars['lang']['copy_rights']; ?>
" href="<?php echo $this->_tpl_vars['lang']['flynax_url']; ?>
"><?php echo $this->_tpl_vars['lang']['copy_rights']; ?>
</a>
    </div>
</div>

<!-- footer data tpl end -->