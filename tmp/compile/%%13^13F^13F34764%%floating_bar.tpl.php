<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins//bookmarks/floating_bar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/plugins//bookmarks/floating_bar.tpl', 13, false),)), $this); ?>
<!-- bookmarks floating bar -->

<?php if ($this->_tpl_vars['button_size'] == 'medium'): ?>
    <?php $this->assign('icon_size', 32); ?>
<?php elseif ($this->_tpl_vars['button_size'] == 'small'): ?>
    <?php $this->assign('icon_size', 24); ?>
<?php elseif ($this->_tpl_vars['button_size'] == 'large'): ?>
    <?php $this->assign('icon_size', 42); ?>
<?php endif; ?>

<div class="bs-floating">
    <div class="a2a_kit a2a_kit_size_<?php echo $this->_tpl_vars['icon_size']; ?>
 a2a_floating_style a2a_vertical_style a2a_barsize_<?php echo $this->_tpl_vars['button_size']; ?>
 a2a_bartheme_<?php echo $this->_tpl_vars['theme']; ?>
">
        <?php $_from = ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['services']) : explode($_tmp, $this->_tpl_vars['services'])); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['service']):
?>
        <?php if ($this->_tpl_vars['service'] == 'dd'): ?>
            <a class="a2a_dd<?php if ($this->_tpl_vars['counter']): ?> a2a_counter<?php endif; ?>" href="https://www.addtoany.com/share"></a>
        <?php else: ?>
            <a class="a2a_button_<?php echo $this->_tpl_vars['service']; ?>
<?php if ($this->_tpl_vars['counter']): ?> a2a_counter<?php endif; ?>"></a>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>

<?php if (( $this->_tpl_vars['pageInfo']['Controller_alt'] == 'listing_details' || ( $this->_tpl_vars['pageInfo']['Controller'] == 'add_listing' && $this->_tpl_vars['manageListing']->step == 'preview' ) ) && ! $this->_tpl_vars['is_owner'] && $this->_tpl_vars['config']['show_call_owner_button'] && $this->_tpl_vars['allow_contacts']): ?>
<script>
<?php echo '

$(function(){
    let callOwnerHeight = $(\'.contact-owner-navbar\').height();
    $(\'head\').append(\'<style>@media screen and (max-width: 625px) {.a2a_floating_style {bottom: \' + callOwnerHeight + \'px;!important}}</style>\');
});

'; ?>

</script>
<?php endif; ?>

<!-- bookmarks floating bar end -->