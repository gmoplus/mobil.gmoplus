<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/footer.tpl */ ?>
<!-- Shopping Cart Plugin -->

<script class="fl-js-dynamic">
    var currencyConverterAvailable  = '<?php echo $this->_tpl_vars['currencyConverter']; ?>
';
    <?php echo '

    $(document).ready(function() {
        shoppingCartBasic.init();

        if (typeof currencyConverter !== \'undefined\' && currencyConverterAvailable) {
            $(\'.shc_price\').convertPrice();
        }

        '; ?>
<?php if ($this->_tpl_vars['config']['shc_method'] == 'multi' && $this->_tpl_vars['pageInfo']['Controller'] == 'my_shopping_cart' && $this->_tpl_vars['pageInfo']['Controller'] == 'auction_payment'): ?><?php echo '
        if ($(\'.my_paygc_credits\').length){
            $(\'.my_paygc_credits\').remove();
        }
        '; ?>
<?php endif; ?><?php echo '
    });
    
    '; ?>

</script>

<!-- end Shopping Cart Plugin -->