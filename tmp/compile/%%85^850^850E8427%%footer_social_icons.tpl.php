<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/menus/footer_social_icons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/menus/footer_social_icons.tpl', 11, false),array('function', 'getRssUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/menus/footer_social_icons.tpl', 53, false),)), $this); ?>
<!-- menus/footer_social_icons.tpl -->

<?php $this->assign('network_replace', ('{')."network_name".('}')); ?>

<?php $this->assign('icon_margin_class', 'ml-4'); ?>
<?php if ($this->_tpl_vars['marginClass']): ?>
    <?php $this->assign('icon_margin_class', $this->_tpl_vars['marginClass']); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['config']['telegram_page']): ?>
    <a class="<?php echo $this->_tpl_vars['icon_margin_class']; ?>
" target="_blank" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['join_us_on_social_network'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['network_replace'], 'Telegram') : smarty_modifier_replace($_tmp, $this->_tpl_vars['network_replace'], 'Telegram')); ?>
" href="<?php echo $this->_tpl_vars['config']['telegram_page']; ?>
">
        <svg class="d-block" viewBox="0 0 24 24">
           <use xlink:href="#core-social-telegram"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if ($this->_tpl_vars['config']['vk_page']): ?>
    <a class="<?php echo $this->_tpl_vars['icon_margin_class']; ?>
" target="_blank" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['join_us_on_social_network'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['network_replace'], 'VK') : smarty_modifier_replace($_tmp, $this->_tpl_vars['network_replace'], 'VK')); ?>
" href="<?php echo $this->_tpl_vars['config']['vk_page']; ?>
">
        <svg class="d-block" viewBox="0 0 24 24">
           <use xlink:href="#core-social-vk"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if ($this->_tpl_vars['config']['whatsapp_page']): ?>
    <a class="<?php echo $this->_tpl_vars['icon_margin_class']; ?>
" target="_blank" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['join_us_on_social_network'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['network_replace'], 'Whatsapp') : smarty_modifier_replace($_tmp, $this->_tpl_vars['network_replace'], 'Whatsapp')); ?>
" href="<?php echo $this->_tpl_vars['config']['whatsapp_page']; ?>
">
        <svg class="d-block" viewBox="0 0 24 24">
           <use xlink:href="#core-social-whatsapp"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if ($this->_tpl_vars['config']['instagram_page']): ?>
    <a class="<?php echo $this->_tpl_vars['icon_margin_class']; ?>
" target="_blank" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['join_us_on_social_network'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['network_replace'], 'Instagram') : smarty_modifier_replace($_tmp, $this->_tpl_vars['network_replace'], 'Instagram')); ?>
" href="<?php echo $this->_tpl_vars['config']['instagram_page']; ?>
">
        <svg class="d-block" viewBox="0 0 24 24">
           <use xlink:href="#core-social-instagram"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if ($this->_tpl_vars['config']['facebook_page']): ?>
    <a class="<?php echo $this->_tpl_vars['icon_margin_class']; ?>
" target="_blank" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['join_us_on_social_network'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['network_replace'], 'Facebook') : smarty_modifier_replace($_tmp, $this->_tpl_vars['network_replace'], 'Facebook')); ?>
" href="<?php echo $this->_tpl_vars['config']['facebook_page']; ?>
">
        <svg class="d-block" viewBox="0 0 24 24">
           <use xlink:href="#core-social-facebook"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if ($this->_tpl_vars['config']['twitter_page']): ?>
    <a class="<?php echo $this->_tpl_vars['icon_margin_class']; ?>
" target="_blank" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['join_us_on_social_network'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['network_replace'], 'Twitter') : smarty_modifier_replace($_tmp, $this->_tpl_vars['network_replace'], 'Twitter')); ?>
" href="<?php echo $this->_tpl_vars['config']['twitter_page']; ?>
">
        <svg class="d-block" viewBox="0 0 24 24">
           <use xlink:href="#core-social-twitterx"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if ($this->_tpl_vars['pages']['rss_feed']): ?>
    <a class="<?php echo $this->_tpl_vars['icon_margin_class']; ?>
" title="<?php echo $this->_tpl_vars['lang']['subscribe_rss']; ?>
" href="<?php echo $this->_plugins['function']['getRssUrl'][0][0]->getRssUrl(array('mode' => 'footer'), $this);?>
" target="_blank">
        <svg class="d-block" viewBox="0 0 24 24">
           <use xlink:href="#core-social-rss"></use>
        </svg>
    </a>
<?php endif; ?>

<!-- menus/footer_social_icons.tpl end -->