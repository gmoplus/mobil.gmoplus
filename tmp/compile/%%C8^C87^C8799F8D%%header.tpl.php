<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/currencyConverter/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/plugins/currencyConverter/header.tpl', 66, false),array('modifier', 'flHtmlEntitiesDecode', '/home/gmoplus/mobil.gmoplus.com/plugins/currencyConverter/header.tpl', 66, false),)), $this); ?>
<!-- currency converter header styles -->

<style>
<?php echo '
#currency_selector span.content {
    /* flatty templates fallback */
    min-width: auto;
}
#currency_selector span.content > div {
    max-height: 270px;
    overflow: hidden;

    /* modern templates scrollBar fallback */
    padding-top: 0;
    padding-bottom: 0;
}
#currency_selector > span.default > span.symbol {
    font-size: 1.214em;
}
#currency_selector > span.default > span.code {
    font-size: 0.929em;
}

#currency_selector > span.default > * {
    display: inline-block!important;
}

#currency_selector ul > li.sticky-rate + li:not(.sticky-rate) {
    border-top: 1px rgba(0,0,0,.5) solid;
    height: 35px;
    padding-top: 7px;
    margin-top: 7px;
}

.price_tag span.hide,
.price-tag span.hide {
    display: none!important;
}

/*** MOBILE VIEW ***/
@media screen and (max-width: 767px) {
    #currency_selector {
        position: relative;
    }
}
'; ?>

</style>

<script>
var currencyConverter = new Object();
currencyConverter.config = new Array();
currencyConverter.rates = new Array();

lang['short_price_k'] = '<?php if ($this->_tpl_vars['lang']['short_price_k']): ?><?php echo $this->_tpl_vars['lang']['short_price_k']; ?>
<?php else: ?>k<?php endif; ?>';
lang['short_price_m'] = '<?php if ($this->_tpl_vars['lang']['short_price_m']): ?><?php echo $this->_tpl_vars['lang']['short_price_m']; ?>
<?php else: ?>m<?php endif; ?>';
lang['short_price_b'] = '<?php if ($this->_tpl_vars['lang']['short_price_b']): ?><?php echo $this->_tpl_vars['lang']['short_price_b']; ?>
<?php else: ?>b<?php endif; ?>';

currencyConverter.config['currency'] = <?php if ($this->_tpl_vars['curConv_code']): ?>'<?php echo $this->_tpl_vars['curConv_code']; ?>
'<?php else: ?>false<?php endif; ?>;
currencyConverter.config['field'] = '<?php echo $this->_tpl_vars['config']['currencyConverter_price_field']; ?>
';
currencyConverter.config['show_cents'] = <?php echo $this->_tpl_vars['config']['show_cents']; ?>
;
currencyConverter.config['price_delimiter'] = "<?php echo $this->_tpl_vars['config']['price_delimiter']; ?>
";
currencyConverter.config['cents_separator'] = "<?php echo $this->_tpl_vars['config']['price_separator']; ?>
";
currencyConverter.config['currency_position'] = '<?php echo $this->_tpl_vars['config']['system_currency_position']; ?>
';

<?php $_from = $this->_tpl_vars['curConv_rates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curConv_key'] => $this->_tpl_vars['curConv_rate']):
?>
currencyConverter.rates['<?php echo $this->_tpl_vars['curConv_key']; ?>
'] = new Array('<?php echo $this->_tpl_vars['curConv_rate']['Rate']; ?>
', ['<?php echo $this->_tpl_vars['curConv_rate']['Code']; ?>
'<?php if ($this->_tpl_vars['curConv_rate']['Symbol']): ?>,<?php $_from = ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['curConv_rate']['Symbol']) : explode($_tmp, $this->_tpl_vars['curConv_rate']['Symbol'])); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ccF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ccF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cc_rItem']):
        $this->_foreach['ccF']['iteration']++;
?>'<?php echo ((is_array($_tmp=$this->_tpl_vars['cc_rItem'])) ? $this->_run_mod_handler('flHtmlEntitiesDecode', true, $_tmp) : flHtmlEntitiesDecode($_tmp)); ?>
'<?php if (! ($this->_foreach['ccF']['iteration'] == $this->_foreach['ccF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php endif; ?>]);
<?php endforeach; endif; unset($_from); ?>
</script>

<!-- currency converter header styles end -->