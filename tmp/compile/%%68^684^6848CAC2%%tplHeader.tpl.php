<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/verificationCode/tplHeader.tpl */ ?>
<!-- verification code plugin -->

<?php if (! empty ( $this->_tpl_vars['verification_code_header'] )): ?>
    <?php $_from = $this->_tpl_vars['verification_code_header']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vch']):
?>
        <!-- <?php echo $this->_tpl_vars['vch']['Name']; ?>
 -->
        <?php echo $this->_tpl_vars['vch']['Content']; ?>

        <!-- end  <?php echo $this->_tpl_vars['vch']['Name']; ?>
 -->
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<!-- verification code plugin -->