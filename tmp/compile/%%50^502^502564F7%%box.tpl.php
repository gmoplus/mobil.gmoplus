<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/microdata/box.tpl */ ?>
<!-- microdata added json code -->
<?php if ($this->_tpl_vars['microdata']): ?>
    <script type="application/ld+json">
        <?php echo $this->_tpl_vars['microdata']; ?>

    </script>
<?php endif; ?>

<?php if ($this->_tpl_vars['microdataErrors']): ?>
<!-- Microdata errors
    <?php $_from = $this->_tpl_vars['microdataErrors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <?php echo $this->_tpl_vars['item']; ?>

    <?php endforeach; endif; unset($_from); ?>
-->
<?php endif; ?>
<!-- microdata added json code end -->