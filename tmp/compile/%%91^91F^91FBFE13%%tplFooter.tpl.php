<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/verificationCode/tplFooter.tpl */ ?>
<!-- verification code plugin -->

<?php if (! empty ( $this->_tpl_vars['verification_code_footer'] )): ?>
    <?php $_from = $this->_tpl_vars['verification_code_footer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vcf']):
?>
        <!-- <?php echo $this->_tpl_vars['vcf']['Name']; ?>
 -->
        <?php echo $this->_tpl_vars['vcf']['Content']; ?>

        <!-- end <?php echo $this->_tpl_vars['vcf']['Name']; ?>
 -->
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<!-- verification code plugin -->