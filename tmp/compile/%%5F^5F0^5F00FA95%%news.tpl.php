<?php /* Smarty version 2.6.31, created on 2025-07-13 03:58:03
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news.tpl', 17, false),array('function', 'toPrettyDateTime', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news.tpl', 35, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news.tpl', 47, false),array('function', 'paging', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news.tpl', 79, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/news.tpl', 17, false),)), $this); ?>
<!-- news tpl -->

<svg class="hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../img/svg/view.svg', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</svg>

<div class="content-padding">
    <?php if ($this->_tpl_vars['article']): ?>
        <?php if ($this->_tpl_vars['article']['Picture']): ?>
        <div class="row">
            <div class="col-md-4">
                <img class="w-100" src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
news/<?php echo $this->_tpl_vars['article']['Picture']; ?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />

                <div class="d-flex mt-2">
                    <?php if ($this->_tpl_vars['article']['Category_Name']): ?>
                        <div class="date"><?php echo $this->_tpl_vars['lang']['category']; ?>
:
                            <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'news','add_url' => ((is_array($_tmp='category=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['article']['Category_Path']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['article']['Category_Path']))), $this);?>
" title="<?php echo $this->_tpl_vars['article']['Category_Name']; ?>
">
                                <?php echo $this->_tpl_vars['article']['Category_Name']; ?>

                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="ml-auto d-flex align-items-center">
                        <span class="mr-2 date"><?php echo $this->_tpl_vars['article']['Views']; ?>
</span>

                        <svg viewBox="0 0 14 10" class="news-article__views grid-icon-fill">
                            <use xlink:href="#icon-eye"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
        <?php endif; ?>

        <div class="d-flex mb-2">
            <div class="date"><?php echo $this->_plugins['function']['toPrettyDateTime'][0][0]->toPrettyDateTime(array('date' => $this->_tpl_vars['article']['Date']), $this);?>
</div>
            <?php if (! $this->_tpl_vars['article']['Picture']): ?>
            <div class="ml-auto d-flex align-items-center">
                <span class="mr-2 date"><?php echo $this->_tpl_vars['article']['Views']; ?>
</span>

                <svg viewBox="0 0 14 10" class="news-article__views grid-icon-fill">
                    <use xlink:href="#icon-eye"></use>
                </svg>
            </div>
            <?php endif; ?>
        </div>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'newsPostCaption'), $this);?>


        <article class="news-article__content">
            <?php echo $this->_tpl_vars['article']['content']; ?>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'newsPostContent'), $this);?>

        </article>

        <div class="mt-2">
            <a title="<?php echo $this->_tpl_vars['lang']['back_to_news']; ?>
" href="<?php echo $this->_tpl_vars['back_link']; ?>
"><?php echo $this->_tpl_vars['lang']['back_to_news']; ?>
</a>
        </div>

        <?php if ($this->_tpl_vars['article']['Picture']): ?>
            </div>
        </div>
        <?php endif; ?>
    <?php else: ?>
        <?php if ($this->_tpl_vars['news']): ?>
            <div class="row">
            <?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news_item']):
?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['controllerDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'news/article.tpl') : smarty_modifier_cat($_tmp, 'news/article.tpl')), 'smarty_include_vars' => array('article' => $this->_tpl_vars['news_item'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endforeach; endif; unset($_from); ?>
            </div>

            <!-- paging block -->
            <?php if ($this->_tpl_vars['newsCurrentCategory'] && $this->_tpl_vars['newsCurrentCategory']['Path']): ?>
                <?php $this->assign('newsCategoryPath', $this->_tpl_vars['newsCurrentCategory']['Path']); ?>

                <?php if (! $this->_tpl_vars['config']['mod_rewrite']): ?>
                    <?php $this->assign('newsCategoryPath', ((is_array($_tmp='category=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['newsCategoryPath']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['newsCategoryPath']))); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php echo $this->_plugins['function']['paging'][0][0]->paging(array('calc' => $this->_tpl_vars['pageInfo']['calc'],'total' => $this->_tpl_vars['news'],'current' => $this->_tpl_vars['pageInfo']['current'],'per_page' => $this->_tpl_vars['config']['news_at_page'],'url' => $this->_tpl_vars['newsCategoryPath']), $this);?>

            <!-- paging block end -->
        <?php else: ?>
            <div class="text-notice"><?php echo $this->_tpl_vars['lang']['no_news']; ?>
</div>
        <?php endif; ?>
    <?php endif; ?>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'newsBottomTpl'), $this);?>

</div>

<!-- news tpl end -->