<?php /* Smarty version 2.6.31, created on 2025-10-12 11:06:02
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/cart.tpl', 3, false),array('function', 'str2money', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/cart.tpl', 17, false),)), $this); ?>
<!-- shopping cart tpl -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/static/icons.svg') : smarty_modifier_cat($_tmp, 'shoppingCart/static/icons.svg')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['config']['shc_module']): ?>
    <span class="circle cart-icon-container circle_mobile-full-width circle_content-padding priority-z-index">
        <span class="default">
            <svg viewBox="0 0 18 18" class="icon align-self-center header-usernav-icon-fill cart-navbar-icon">
                <use xlink:href="#add-to-cart-listing"></use>
            </svg>
            <span class="button flex-fill">
                <span class="ml-2 count"><?php echo $this->_tpl_vars['shcTotalInfo']['count']; ?>
</span>
                <span class="shc-rtl-fix"><?php echo $this->_tpl_vars['lang']['shc_count_items']; ?>
</span>
                <span>/</span>
                <span class="summary shc_price">
                    <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
                    <?php echo $this->_plugins['function']['str2money'][0][0]->str2money(array('string' => $this->_tpl_vars['shcTotalInfo']['total']), $this);?>

                    <?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?> <?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?>
                </span>
            </span>
        </span>
        <span class="content hide">
            <ul id="shopping_cart_block" class="cart-items circle__list_no-list-styles">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/cart_items.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/cart_items.tpl')), 'smarty_include_vars' => array('shcItems' => $this->_tpl_vars['shcItems'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </ul>
        </span>
    </span>

    <script class="fl-js-dynamic">
    <?php echo '

    $(function(){
        $(\'.cart-icon-container > .default\').click(function(){
            $(\'span.circle_opened\').not($(this).parent()).removeClass(\'circle_opened\');
            $(this).parent().toggleClass(\'circle_opened\');

            if (typeof flUtil.setPriorityZIndex == \'function\') {
                flUtil.setPriorityZIndex($(this).parent());
            }
        });

        $(document).bind(\'click touchstart\', function(event){
            if (!$(event.target).parents().hasClass(\'circle_opened\')) {
                $(\'.cart-icon-container\').removeClass(\'circle_opened\');
            }
        });
    });

    '; ?>

    </script>
<?php endif; ?>

<!-- shopping cart tpl end -->