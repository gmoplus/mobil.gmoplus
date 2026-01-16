<?php /* Smarty version 2.6.31, created on 2025-09-14 23:13:29
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/article.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'toPrettyDateTime', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/article.tpl', 6, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/article.tpl', 21, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/article.tpl', 27, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/article.tpl', 16, false),array('modifier', 'regex_replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/article.tpl', 31, false),array('modifier', 'strip_tags', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/article.tpl', 31, false),array('modifier', 'truncate', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/news/article.tpl', 37, false),)), $this); ?>
<!-- news article -->

<article class="<?php if ($this->_tpl_vars['columnClass']): ?><?php echo $this->_tpl_vars['columnClass']; ?>
<?php else: ?>col-md-6<?php endif; ?> d-flex">
    <div class="mb-<?php if ($this->_tpl_vars['boxMode']): ?>3<?php else: ?>5<?php endif; ?> d-flex flex-fill flex-column">
        <div class="d-flex mb-2">
            <div class="date"><?php echo $this->_plugins['function']['toPrettyDateTime'][0][0]->toPrettyDateTime(array('date' => $this->_tpl_vars['article']['Date']), $this);?>
</div>
            <div class="ml-auto d-flex align-items-center">
                <span class="mr-2 date"><?php echo $this->_tpl_vars['article']['Views']; ?>
</span>

                <svg viewBox="0 0 14 10" class="news-article__views grid-icon-fill">
                    <use xlink:href="#icon-eye"></use>
                </svg>
            </div>
        </div>

        <?php $this->assign('articlePath', ((is_array($_tmp='path=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['article']['Path']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['article']['Path']))); ?>
        <?php if ($this->_tpl_vars['article']['Category_Path']): ?>
            <?php $this->assign('articlePath', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='category=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['article']['Category_Path']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['article']['Category_Path'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&') : smarty_modifier_cat($_tmp, '&')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['articlePath']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['articlePath']))); ?>
        <?php endif; ?>

        <a class="link-large d-flex flex-column" title="<?php echo $this->_tpl_vars['article']['title']; ?>
" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'news','add_url' => $this->_tpl_vars['articlePath']), $this);?>
">
            <h4><?php echo $this->_tpl_vars['article']['title']; ?>
</h4>

            <div class="news-article__pic-cont position-relative mt-3 mb-3">
                <img class="position-absolute w-100 h-100" src="<?php if ($this->_tpl_vars['article']['Picture']): ?><?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
news/<?php echo $this->_tpl_vars['article']['Picture']; ?>
<?php else: ?><?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif<?php endif; ?>" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
            </div>
            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'newsPostCaption'), $this);?>

        </a>

        <?php $this->assign('newsContent', $this->_tpl_vars['article']['content']); ?>
        <?php $this->assign('newsContent', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['newsContent'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(<style[^>]*>[^>]*<\\/style>)/mi", "") : smarty_modifier_regex_replace($_tmp, "/(<style[^>]*>[^>]*<\\/style>)/mi", "")))) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false))); ?>

        <?php if (! $this->_tpl_vars['contentLimit']): ?>
            <?php $this->assign('contentLimit', $this->_tpl_vars['config']['news_page_content_length']); ?>
        <?php endif; ?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['newsContent'])) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_tpl_vars['contentLimit'], '...', false) : smarty_modifier_truncate($_tmp, $this->_tpl_vars['contentLimit'], '...', false)); ?>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'newsPostContent'), $this);?>

    </div>
</article>

<!-- news article end -->