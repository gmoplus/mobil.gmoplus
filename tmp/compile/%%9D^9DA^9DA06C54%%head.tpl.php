<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl', 2, false),array('modifier', 'strip_tags', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl', 13, false),array('modifier', 'escape', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl', 13, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl', 67, false),array('function', 'includeFonts', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl', 16, false),array('function', 'displayCSS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl', 17, false),array('function', 'getRssUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl', 42, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/head.tpl', 55, false),)), $this); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo ((is_array($_tmp=(defined('RL_LANG_CODE') ? @RL_LANG_CODE : null))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
">
<head>

<title><?php if ($this->_tpl_vars['pageInfo']['meta_title']): ?><?php echo $this->_tpl_vars['pageInfo']['meta_title']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pageInfo']['title']; ?>
<?php endif; ?></title>

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="generator" content="Flynax Classifieds Software" />
<meta charset="UTF-8" />
<meta http-equiv="x-dns-prefetch-control" content="on" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />

<meta name="description" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pageInfo']['meta_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<meta name="Keywords" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pageInfo']['meta_keywords'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<?php echo $this->_plugins['function']['includeFonts'][0][0]->includeFonts(array(), $this);?>

<?php echo $this->_plugins['function']['displayCSS'][0][0]->displayCSS(array('mode' => 'header'), $this);?>


<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/favicon.ico?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="image/x-icon" />

<?php if ($this->_tpl_vars['pageInfo']['canonical']): ?>
<link rel="canonical" href="<?php echo $this->_tpl_vars['pageInfo']['canonical']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['pageInfo']['rel_prev']): ?>
<link rel="prev" href="<?php echo $this->_tpl_vars['pageInfo']['rel_prev']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['pageInfo']['rel_next']): ?>
<link rel="next" href="<?php echo $this->_tpl_vars['pageInfo']['rel_next']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['pageInfo']['robots']): ?>
<?php $this->assign('meta_robots', $this->_tpl_vars['pageInfo']['robots']); ?>
<meta name="robots" content="<?php if ($this->_tpl_vars['meta_robots']['noindex']): ?>noindex<?php else: ?>index<?php endif; ?><?php if ($this->_tpl_vars['meta_robots']['nofollow']): ?>,nofollow<?php endif; ?>">
<?php endif; ?>

<?php if ($this->_tpl_vars['hreflang']): ?>
<?php $_from = $this->_tpl_vars['hreflang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['code'] => $this->_tpl_vars['href']):
?>
<link rel="alternate" href="<?php echo $this->_tpl_vars['href']; ?>
" hreflang="<?php if ($this->_tpl_vars['config']['lang'] == $this->_tpl_vars['code']): ?>x-default<?php else: ?><?php echo $this->_tpl_vars['code']; ?>
<?php endif; ?>" />
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['rss'] && $this->_tpl_vars['pages']['rss_feed']): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['rss']['title']; ?>
" href="<?php echo $this->_plugins['function']['getRssUrl'][0][0]->getRssUrl(array(), $this);?>
" />
<?php endif; ?>

<!--[if lte IE 10]>
<meta http-equiv="refresh" content="0; url=<?php echo $this->_tpl_vars['rlTplBase']; ?>
browser-upgrade.htx" />
<style><?php echo 'body { display: none!important; }'; ?>
</style>
<![endif]-->

<script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
javascript/system.lib.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.ui.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/datePicker/i18n/ui.datepicker-<?php echo ((is_array($_tmp=(defined('RL_LANG_CODE') ? @RL_LANG_CODE : null))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplHeaderCommon'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'js_config.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
js/lib.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplHeader'), $this);?>


<?php echo $this->_tpl_vars['ajaxJavascripts']; ?>


</head>

<body class="large <?php echo ((is_array($_tmp=$this->_tpl_vars['pageInfo']['Key'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', '-') : smarty_modifier_replace($_tmp, '_', '-')); ?>
-page<?php if (! $this->_tpl_vars['side_bar_exists']): ?> no-sidebar<?php endif; ?><?php if ($this->_tpl_vars['bread_crumbs_exists']): ?> bc-exists<?php endif; ?><?php if ($this->_tpl_vars['config']['header_banner_space'] && $this->_tpl_vars['pageInfo']['Key'] != 'search_on_map'): ?> header-banner<?php endif; ?><?php if ($this->_tpl_vars['pageInfo']['Controller'] == 'listing_details' && $this->_tpl_vars['blocks']['get_more_details']): ?> get-details-box<?php endif; ?><?php if ($this->_tpl_vars['config']['general_simple_color'] != 'green'): ?> <?php echo $this->_tpl_vars['config']['general_simple_color']; ?>
-theme<?php endif; ?><?php if (! $this->_tpl_vars['config']['img_crop_thumbnail']): ?> listing-fit-contain<?php endif; ?><?php if ($this->_tpl_vars['pageInfo']['Controller'] == 'static'): ?> static-page<?php endif; ?>" <?php if ((defined('RL_LANG_DIR') ? @RL_LANG_DIR : null) == 'rtl'): ?>dir="rtl"<?php endif; ?>>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplBodyTop'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../img/core.svg', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>