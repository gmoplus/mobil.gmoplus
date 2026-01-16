<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/block.tpl', 31, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/block.tpl', 31, false),)), $this); ?>
<!-- newsletter block -->

<?php $this->assign('narrow_box', false); ?>
<?php if ($this->_tpl_vars['block']['Side'] == 'middle_left' || $this->_tpl_vars['block']['Side'] == 'middle_right'): ?>
    <?php $this->assign('narrow_box', true); ?>
<?php endif; ?>

<div class="subscribe<?php if (is_array ( $this->_tpl_vars['block'] )): ?> row <?php if ($this->_tpl_vars['block']['Side'] == 'left'): ?>pl-md-2 pr-md-2 pl-lg-0 pr-lg-0<?php else: ?>light-inputs pl-md-2 pr-md-2<?php endif; ?><?php endif; ?>">
    <div class="<?php if (is_array ( $this->_tpl_vars['block'] )): ?><?php if ($this->_tpl_vars['narrow_box']): ?>col-12 mb-3<?php elseif ($this->_tpl_vars['block']['Side'] == 'left'): ?>col-md-4 col-lg-12 mb-3 mb-md-0 mb-lg-3 pl-md-2 pr-md-2<?php else: ?>col-md-4 mb-3 mb-md-0 pl-md-2 pr-md-2<?php endif; ?><?php else: ?>submit-cell<?php endif; ?>">
        <input placeholder="<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_your_name']; ?>
" type="text" class="newsletter_name w-100" maxlength="50" />
    </div>
    <div class="<?php if (is_array ( $this->_tpl_vars['block'] )): ?><?php if ($this->_tpl_vars['narrow_box']): ?>col-12 mb-3<?php elseif ($this->_tpl_vars['block']['Side'] == 'left'): ?>col-md-4 col-lg-12 mb-3 mb-md-0 mb-lg-3 pl-md-2 pr-md-2<?php else: ?>col-md-4 mb-3 mb-md-0 pl-md-2 pr-md-2<?php endif; ?><?php else: ?>submit-cell flex-fill<?php endif; ?>">
        <input placeholder="<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_your_e_mail']; ?>
"
            type="text"
            class="newsletter_email w-100"
            maxlength="100" />
    </div>
    <div<?php if (is_array ( $this->_tpl_vars['block'] )): ?> class="<?php if ($this->_tpl_vars['narrow_box']): ?>col-12<?php elseif ($this->_tpl_vars['block']['Side'] == 'left'): ?>col-md-4 col-lg-12 pl-md-2 pr-md-2<?php else: ?>col-md-4 pl-md-2 pr-md-2<?php endif; ?>"<?php endif; ?>>
        <input class="button subscribe_user w-100"
            type="button"
            value="<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_subscribe']; ?>
"
            data-default-val="<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_subscribe']; ?>
" />
    </div>
</div>

<script class="fl-js-dynamic">
    lang['massmailer_newsletter_no_response'] = '<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_no_response']; ?>
';
    lang['massmailer_newsletter_guest'] = '<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_guest']; ?>
';
</script>

<?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'massmailer_newsletter/static/mailler.js') : smarty_modifier_cat($_tmp, 'massmailer_newsletter/static/mailler.js'))), $this);?>


<script type="text/javascript">
    <?php echo '
        $(document).ready(function(){
            $parent = $(\'.massmailer_newsletter\');
            $button = $parent.find(\'.subscribe_user\');
            var $name   = $parent.find(\'.newsletter_name\');
            var $email  = $parent.find(\'.newsletter_email\');
            newsletterAction($button, $email, $name, false);
        });
    '; ?>

</script>

<!-- newsletter block end -->