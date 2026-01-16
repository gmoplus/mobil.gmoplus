<?php /* Smarty version 2.6.31, created on 2025-07-12 17:34:00
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/checkbox.tpl */ ?>
<!-- subscribe checkbox -->

<label style="padding: 10px 0 5px;display: block;">
    <?php $this->assign('mm_checked', ''); ?>
    <?php if ($_POST['profile']): ?>
        <?php if ($_POST['profile']['mn_subscribe']): ?>
            <?php $this->assign('mm_checked', 'checked="checked"'); ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if ($this->_tpl_vars['config']['mn_default_value']): ?>
            <?php $this->assign('mm_checked', 'checked="checked"'); ?>
        <?php endif; ?>
    <?php endif; ?>

    <input value="1" type="checkbox" name="profile[mn_subscribe]" <?php echo $this->_tpl_vars['mm_checked']; ?>
/>
    &nbsp;<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_subscribe_to']; ?>

</label>

<!-- subscribe checkbox end -->
