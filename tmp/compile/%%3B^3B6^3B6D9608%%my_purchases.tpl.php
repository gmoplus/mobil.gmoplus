<?php /* Smarty version 2.6.31, created on 2025-07-14 13:47:32
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_purchases.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_purchases.tpl', 6, false),array('function', 'math', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_purchases.tpl', 33, false),array('function', 'paging', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_purchases.tpl', 78, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_purchases.tpl', 6, false),array('modifier', 'date_format', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_purchases.tpl', 48, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_purchases.tpl', 78, false),)), $this); ?>
<!-- my purchases | shopping cart -->

<div class="content-padding">
    <?php if (! empty ( $this->_tpl_vars['itemID'] )): ?>
        <?php if ($this->_tpl_vars['step'] == 'checkout'): ?>
            <form id="form-checkout" method="post" action="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'shc_purchases','add_url' => 'step=checkout','vars' => ((is_array($_tmp='item=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['order_info']['ID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['order_info']['ID']))), $this);?>
">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/checkout.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/checkout.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                <input type="hidden" name="step" value="checkout" />
                <span class="form-buttons" style="padding-top: 0;">
                    <input type="submit" value="<?php echo $this->_tpl_vars['lang']['checkout']; ?>
" />
                    &nbsp;&nbsp;<a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'shc_purchases'), $this);?>
"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                </span>
            </form>
        <?php else: ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/order_details.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/order_details.tpl')), 'smarty_include_vars' => array('orderInfo' => $this->_tpl_vars['orderInfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if ($this->_tpl_vars['orders']): ?>
            <div class="list-table">
                <div class="header">
                    <div class="center" style="width: 40px;">#</div>
                    <div><?php echo $this->_tpl_vars['lang']['item']; ?>
</div>
                    <div style="width: 120px;"><?php echo $this->_tpl_vars['lang']['total']; ?>
</div>
                    <div style="width: 130px;"><?php echo $this->_tpl_vars['lang']['shc_order_key']; ?>
</div>
                    <div style="width: 120px;"><?php echo $this->_tpl_vars['lang']['date']; ?>
</div>
                    <div style="width: 120px;"><?php echo $this->_tpl_vars['lang']['shc_shipping_status']; ?>
</div>
                    <div style="width: 100px;"><?php echo $this->_tpl_vars['lang']['status']; ?>
</div>
                    <div style="width: 100px;"><?php echo $this->_tpl_vars['lang']['actions']; ?>
</div>
                </div>

                <?php $_from = $this->_tpl_vars['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['orderF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['orderF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['orderF']['iteration']++;
?>
                    <?php echo smarty_function_math(array('assign' => 'iteration','equation' => '(((current?current:1)-1)*per_page)+iter','iter' => $this->_foreach['orderF']['iteration'],'current' => $this->_tpl_vars['pInfo']['current'],'per_page' => $this->_tpl_vars['config']['shc_orders_per_page']), $this);?>


                    <div class="row">
                        <div class="center iteration no-flex"><?php echo $this->_tpl_vars['iteration']; ?>
</div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['item']; ?>
">
                            <ul>
                            <?php $_from = $this->_tpl_vars['item']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iVal']):
?>
                                <li><?php echo $this->_tpl_vars['iVal']['Item']; ?>
</li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['total']; ?>
">
                            <span class="price-cell shc_price"><?php echo $this->_tpl_vars['item']['Total']; ?>
</span>
                        </div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['shc_order_key']; ?>
"><?php echo $this->_tpl_vars['item']['Order_key']; ?>
</div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['date']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
</div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['shc_shipping_status']; ?>
">
                            <?php $this->assign('shippingStatus', ((is_array($_tmp='shc_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['Shipping_status']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['Shipping_status']))); ?>
                            <?php if ($this->_tpl_vars['item']['Shipping_status'] == 'pending'): ?>
                                <?php $this->assign('shippingStatus', $this->_tpl_vars['item']['Shipping_status']); ?>
                            <?php endif; ?>
                            <span><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['shippingStatus']]; ?>
</span>
                        </div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['status']; ?>
">
                            <span class="item_<?php echo $this->_tpl_vars['item']['Status']; ?>
"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['item']['Status']]; ?>
</span>
                            <?php if ($this->_tpl_vars['item']['Cash']): ?><small class="cash"><?php echo $this->_tpl_vars['lang']['shc_payment_cash']; ?>
</small><?php endif; ?>
                            <?php if ($this->_tpl_vars['config']['shc_escrow']): ?><small class="item_paid escrow-status <?php echo $this->_tpl_vars['item']['Escrow_status']; ?>
" title="<?php echo $this->_tpl_vars['lang']['shc_escrow_item']; ?>
"><?php echo $this->_tpl_vars['item']['Escrow_status_name']; ?>
</small><?php endif; ?>
                            <?php if ($this->_tpl_vars['item']['Bank_transfer'] && $this->_tpl_vars['item']['Status'] == 'unpaid'): ?>
                                <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'payment_history'), $this);?>
"><small class="cash"><?php echo $this->_tpl_vars['lang']['shc_bank_transfer']; ?>
</small></a>
                            <?php endif; ?>
                        </div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['actions']; ?>
">
                            <?php if ($this->_tpl_vars['item']['Status'] == 'unpaid' && ! $this->_tpl_vars['item']['Cash']): ?>
                                <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'shc_purchases','add_url' => 'step=checkout'), $this);?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?>?<?php else: ?>&<?php endif; ?>item=<?php echo $this->_tpl_vars['item']['ID']; ?>
">
                                    <?php echo $this->_tpl_vars['lang']['checkout']; ?>

                                </a>
                            <?php endif; ?>
                            <a class="d-block" title="<?php echo $this->_tpl_vars['lang']['view_details']; ?>
" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'shc_purchases'), $this);?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?>?<?php else: ?>&<?php endif; ?>item=<?php echo $this->_tpl_vars['item']['ID']; ?>
">
                                <?php echo $this->_tpl_vars['lang']['view_details']; ?>

                            </a>
                        </div>
                    </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>

            <?php echo $this->_plugins['function']['paging'][0][0]->paging(array('calc' => $this->_tpl_vars['pInfo']['calc'],'total' => count($this->_tpl_vars['orders']),'current' => $this->_tpl_vars['pInfo']['current'],'per_page' => $this->_tpl_vars['config']['shc_orders_per_page']), $this);?>

        <?php else: ?>
            <div class="text-notice"><?php echo $this->_tpl_vars['lang']['shc_no_purchases']; ?>
</div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<!-- my purchases end | shopping cart -->