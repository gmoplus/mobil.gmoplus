<?php /* Smarty version 2.6.31, created on 2025-07-12 17:34:00
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news_block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news_block.tpl', 18, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news_block.tpl', 27, false),)), $this); ?>
<!-- news block tpl -->

<?php if (! empty ( $this->_tpl_vars['all_news'] )): ?>
    <svg class="hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../img/svg/view.svg', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </svg>

    <?php $this->assign('column_class', 'col-md-4'); ?>

    <?php if ($this->_tpl_vars['block']['Side'] == 'middle_left' || $this->_tpl_vars['block']['Side'] == 'middle_right'): ?>
        <?php $this->assign('column_class', 'col-lg-12'); ?>
    <?php elseif ($this->_tpl_vars['block']['Side'] == 'left'): ?>
        <?php $this->assign('column_class', 'col-md-4 col-lg-12'); ?>
    <?php endif; ?>

    <div class="row">
    <?php $_from = $this->_tpl_vars['all_news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news_item']):
?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['controllerDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'news/article.tpl') : smarty_modifier_cat($_tmp, 'news/article.tpl')), 'smarty_include_vars' => array('article' => $this->_tpl_vars['news_item'],'columnClass' => $this->_tpl_vars['column_class'],'contentLimit' => $this->_tpl_vars['config']['news_block_content_length'],'boxMode' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endforeach; endif; unset($_from); ?>
    </div>

    <div class="text-center">
        <a title="<?php echo $this->_tpl_vars['lang']['all_news']; ?>
" class="button w-100 all-news-button" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'news'), $this);?>
"><?php echo $this->_tpl_vars['lang']['all_news']; ?>
</a>
    </div>
<?php else: ?>
    <?php echo $this->_tpl_vars['lang']['no_news']; ?>

<?php endif; ?>

<!-- news block tpl end -->