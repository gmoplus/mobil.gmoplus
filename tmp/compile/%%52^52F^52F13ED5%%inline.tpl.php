<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins//bookmarks/inline.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/plugins//bookmarks/inline.tpl', 33, false),)), $this); ?>
<!-- bookmarks inline bar -->

<?php if ($this->_tpl_vars['button_size'] == 'medium'): ?>
    <?php $this->assign('icon_size', 32); ?>
<?php elseif ($this->_tpl_vars['button_size'] == 'small'): ?>
    <?php $this->assign('icon_size', 24); ?>
<?php elseif ($this->_tpl_vars['button_size'] == 'large'): ?>
    <?php $this->assign('icon_size', 42); ?>
<?php endif; ?>

<?php $this->assign('parent_tag', 'div'); ?>
<?php if ($this->_tpl_vars['key'] == 'bookmark_details'): ?>
    <?php $this->assign('parent_tag', 'li'); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['key'] == 'bookmark_done_step'): ?>
<div class="mt-3 mb-3">
    <?php echo $this->_tpl_vars['lang']['or']; ?>


    <div class="mt-3">
        <?php echo $this->_tpl_vars['lang']['bookmarks_step_done_text']; ?>

    </div>
</div>
<?php endif; ?>

<<?php echo $this->_tpl_vars['parent_tag']; ?>
 class="text-<?php echo $this->_tpl_vars['align']; ?>
">
    <div class="a2a_kit a2a_kit_size_<?php echo $this->_tpl_vars['icon_size']; ?>
 a2a_default_style d-inline-block a2a_barsize_<?php echo $this->_tpl_vars['button_size']; ?>
 a2a_bartheme_<?php echo $this->_tpl_vars['theme']; ?>
"
        <?php if ($this->_tpl_vars['key'] == 'bookmark_done_step'): ?>
         data-a2a-url="[listing_url]"
         data-a2a-title="[listing_title]"
        <?php endif; ?>
        >
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
</<?php echo $this->_tpl_vars['parent_tag']; ?>
>

<!-- bookmarks inline bar end -->