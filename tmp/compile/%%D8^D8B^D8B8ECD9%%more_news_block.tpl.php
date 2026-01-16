<?php /* Smarty version 2.6.31, created on 2025-09-14 23:13:37
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/more_news_block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/more_news_block.tpl', 6, false),)), $this); ?>
<!-- more news block tpl -->

<?php if ($this->_tpl_vars['otherArticles']): ?>
    <div class="row">
        <?php $_from = $this->_tpl_vars['otherArticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['otherArticle']):
?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['controllerDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'news/article.tpl') : smarty_modifier_cat($_tmp, 'news/article.tpl')), 'smarty_include_vars' => array('article' => $this->_tpl_vars['otherArticle'],'columnClass' => 'col-md-4','contentLimit' => $this->_tpl_vars['config']['news_block_content_length'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endforeach; endif; unset($_from); ?>
    </div>
<?php else: ?>
    <div class="text-notice"><?php echo $this->_tpl_vars['lang']['no_news']; ?>
</div>
<?php endif; ?>

<!-- more news block tpl end -->