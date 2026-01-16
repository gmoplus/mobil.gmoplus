<?php /* Smarty version 2.6.31, created on 2025-11-23 19:29:11
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl', 3, false),array('function', 'math', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl', 11, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl', 17, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl', 54, false),array('function', 'buildPrevStepURL', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl', 62, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl', 3, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl', 11, false),array('modifier', 'array_values', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_shopping_cart.tpl', 12, false),)), $this); ?>
<!-- my shopping cart page  -->

<?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/step-form-bottom-nav/step-form-bottom-nav.css') : smarty_modifier_cat($_tmp, 'components/step-form-bottom-nav/step-form-bottom-nav.css'))), $this);?>


<?php if (! $this->_tpl_vars['no_access']): ?>
    <?php $this->assign('allow_link', true); ?>
    <?php $this->assign('current_found', false); ?>

    <!-- steps -->
    <ul class="steps mobile">
        <?php echo smarty_function_math(array('assign' => 'step_width','equation' => 'round(100/count, 3)','count' => count($this->_tpl_vars['shc_steps'])), $this);?>

        <?php $this->assign('steps_values', array_values($this->_tpl_vars['shc_steps'])); ?>
        <?php $_from = $this->_tpl_vars['steps_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['stepsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stepsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['step_key'] => $this->_tpl_vars['step']):
        $this->_foreach['stepsF']['iteration']++;
?><?php echo ''; ?><?php if ($this->_tpl_vars['cur_step'] == $this->_tpl_vars['step']['key'] || ! $this->_tpl_vars['cur_step']): ?><?php echo ''; ?><?php $this->assign('allow_link', false); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $this->assign('next_index', $this->_tpl_vars['step_key']+1); ?><?php echo '<li style="width: '; ?><?php echo $this->_tpl_vars['step_width']; ?><?php echo '%;" class="'; ?><?php if ($this->_tpl_vars['cur_step']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['cur_step'] == $this->_tpl_vars['step']['key']): ?><?php echo 'current'; ?><?php $this->assign('current_found', true); ?><?php echo ''; ?><?php elseif (! $this->_tpl_vars['current_found']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['steps_values'][$this->_tpl_vars['next_index']]['key'] == $this->_tpl_vars['cur_step']): ?><?php echo 'prev '; ?><?php endif; ?><?php echo 'past'; ?><?php endif; ?><?php echo ''; ?><?php elseif (($this->_foreach['stepsF']['iteration'] <= 1)): ?><?php echo 'current'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php if ($this->_tpl_vars['allow_link']): ?><?php echo ''; ?><?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'shc_my_shopping_cart','add_url' => ((is_array($_tmp='step=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['step']['key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['step']['key']))), $this);?><?php echo ''; ?><?php else: ?><?php echo 'javascript:void(0)'; ?><?php endif; ?><?php echo '" title="'; ?><?php echo $this->_tpl_vars['step']['name']; ?><?php echo '">'; ?><?php if ($this->_tpl_vars['step']['caption']): ?><?php echo '<span>'; ?><?php echo $this->_tpl_vars['lang']['step']; ?><?php echo '</span> '; ?><?php echo $this->_foreach['stepsF']['iteration']; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['step']['name']; ?><?php echo ''; ?><?php endif; ?><?php echo '</a></li>'; ?>
<?php endforeach; endif; unset($_from); ?>
    </ul>
    <!-- end steps -->
<?php endif; ?>

<?php if (! $this->_tpl_vars['no_access']): ?>
    <h1><?php echo $this->_tpl_vars['step_name']; ?>
</h1>
<?php endif; ?>

<?php if ($this->_tpl_vars['cur_step'] == 'cart'): ?>
    <!-- cart details -->
    <div class="area_cart step_area content-padding" id="cart_items">
        <?php if (( $this->_tpl_vars['cart']['items'] || $this->_tpl_vars['cart']['dealers'] ) && $this->_tpl_vars['cart']['isAvailable']): ?>
            <?php if ($this->_tpl_vars['config']['shc_method'] == 'single'): ?>
                <form id="form_single" class="mb-4" method="post" action="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'shc_my_shopping_cart'), $this);?>
">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/items.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/items.tpl')), 'smarty_include_vars' => array('shcItems' => $this->_tpl_vars['cart']['items'],'shcDealer' => 'single','shcTotal' => $this->_tpl_vars['cart']['total'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </form>
            <?php elseif ($this->_tpl_vars['config']['shc_method'] == 'multi'): ?>
                <?php $_from = $this->_tpl_vars['cart']['dealers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dealer']):
?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => ((is_array($_tmp='shopping_cart_dealer_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['dealer']['ID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['dealer']['ID'])),'name' => $this->_tpl_vars['dealer']['Full_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <form id="form_<?php echo $this->_tpl_vars['dealer']['ID']; ?>
" method="post" action="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'shc_my_shopping_cart'), $this);?>
">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/items.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/items.tpl')), 'smarty_include_vars' => array('shcItems' => $this->_tpl_vars['dealer']['items'],'shcDealer' => $this->_tpl_vars['dealer']['ID'],'shcTotal' => $this->_tpl_vars['dealer']['total'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </form>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-message mb-4"><?php echo $this->_tpl_vars['lang']['shc_empty_cart']; ?>
</div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['cart']['hasUnavailable']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/items_unavailable.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/items_unavailable.tpl')), 'smarty_include_vars' => array('shcItems' => $this->_tpl_vars['cart']['items'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    </div>
    <!-- end cart details -->
<?php elseif ($this->_tpl_vars['cur_step'] == 'auth'): ?>
    <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'js/form.js') : smarty_modifier_cat($_tmp, 'js/form.js'))), $this);?>


    <div class="area_auth step_area hide">
        <form method="post" action="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'shc_my_shopping_cart','add_url' => "step=".($this->_tpl_vars['shc_steps']['auth']['path'])), $this);?>
">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/auth.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/auth.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <input type="hidden" name="form" value="submit" />

            <span class="form-buttons">
                <a href="<?php echo $this->_plugins['function']['buildPrevStepURL'][0][0]->buildPrevStepURL(array('show_extended' => 1), $this);?>
"><?php echo $this->_tpl_vars['lang']['perv_step']; ?>
</a>
                <input type="submit" value="<?php echo $this->_tpl_vars['lang']['next_step']; ?>
" />
            </span>
        </form>

        <script class="fl-js-dynamic">
        flForm.auth();
        </script>
    </div>
<?php elseif ($this->_tpl_vars['cur_step'] == 'shipping'): ?>
    <div class="area_shipping step_area content-padding hide">
        <form method="post" action="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'shc_my_shopping_cart','add_url' => "step=".($this->_tpl_vars['shc_steps']['shipping']['path'])), $this);?>
" id="shipping-form">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/shipping.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/shipping.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <input type="hidden" name="form" value="submit" />

            <div class="form-buttons form">
                <a href="<?php echo $this->_plugins['function']['buildPrevStepURL'][0][0]->buildPrevStepURL(array('show_extended' => 1), $this);?>
"><?php echo $this->_tpl_vars['lang']['perv_step']; ?>
</a>
                <input type="submit" value="<?php echo $this->_tpl_vars['lang']['next_step']; ?>
" />
            </div>
        </form>
    </div>
<?php elseif ($this->_tpl_vars['cur_step'] == 'checkout'): ?>
    <div class="area_checkout step_area content-padding hide">
        <form id="form-checkout" method="post" action="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'shc_my_shopping_cart','add_url' => "step=".($this->_tpl_vars['shc_steps']['checkout']['path'])), $this);?>
">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/checkout.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/checkout.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <input type="hidden" name="step" value="checkout" />
            <span class="form-buttons" style="padding-top: 0;">
                <?php if (! $this->_tpl_vars['completed']): ?>
                <a href="<?php echo $this->_plugins['function']['buildPrevStepURL'][0][0]->buildPrevStepURL(array('show_extended' => 1), $this);?>
"><?php echo $this->_tpl_vars['lang']['perv_step']; ?>
</a>
                <?php endif; ?>
                <input type="submit" value="<?php echo $this->_tpl_vars['lang']['checkout']; ?>
" />
            </span>
        </form>
    </div>

<?php elseif ($this->_tpl_vars['cur_step'] == 'done'): ?>
    <div class="area_done content-padding step_area hide">
        <div class="text-message">
            <?php if ($this->_tpl_vars['cash_only']): ?>
                <?php echo $this->_tpl_vars['lang']['shc_done_cash_payment']; ?>

            <?php elseif ($this->_tpl_vars['shcIsPaid']): ?>
                <?php echo $this->_tpl_vars['lang']['shc_done_notice']; ?>

            <?php else: ?>
                <?php echo $this->_tpl_vars['lang']['shc_waiting_payment']; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<script class="fl-js-dynamic">
var shc_dealer = '<?php echo $this->_tpl_vars['shcDealer']; ?>
';

<?php if ($this->_tpl_vars['cur_step']): ?>
    flynax.switchStep('<?php echo $this->_tpl_vars['cur_step']; ?>
');
<?php endif; ?>

<?php echo '
    $(document).ready(function(){
        $(\'#shipping_comment\').textareaCount({
            \'maxCharacterSize\': rlConfig[\'messages_length\'],
            \'warningNumber\': 20
        });

        shoppingCart.handlerItems();
    });
'; ?>

</script>

<!-- steps -->

<!-- my shopping cart page end  -->