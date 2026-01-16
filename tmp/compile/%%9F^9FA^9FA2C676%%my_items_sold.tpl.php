<?php /* Smarty version 2.6.31, created on 2025-07-27 12:48:20
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_items_sold.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_items_sold.tpl', 5, false),array('modifier', 'date_format', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_items_sold.tpl', 44, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_items_sold.tpl', 67, false),array('function', 'math', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_items_sold.tpl', 24, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_items_sold.tpl', 59, false),array('function', 'paging', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_items_sold.tpl', 67, false),)), $this); ?>
<!-- my purchases | shopping cart -->

<div class="content-padding">
    <?php if (! empty ( $this->_tpl_vars['itemID'] )): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/order_details.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/order_details.tpl')), 'smarty_include_vars' => array('orderInfo' => $this->_tpl_vars['orderInfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
        <?php if ($this->_tpl_vars['orders']): ?>
            <div class="list-table">
                <div class="header">
                    <div class="center" style="width: 40px;">#</div>
                    <div><?php echo $this->_tpl_vars['lang']['item']; ?>
</div>
                    <div style="width: 120px;"><?php echo $this->_tpl_vars['lang']['total']; ?>
</div>
                    <?php if ($this->_tpl_vars['config']['shc_method'] == 'multi' && $this->_tpl_vars['config']['shc_commission_enable']): ?>
                        <div style="width: 120px;"><?php echo $this->_tpl_vars['lang']['shc_commission']; ?>
</div>
                    <?php endif; ?>
                    <div style="width: 130px;"><?php echo $this->_tpl_vars['lang']['shc_order_key']; ?>
</div>
                    <div style="width: 120px;"><?php echo $this->_tpl_vars['lang']['date']; ?>
</div>
                    <div style="width: 120px;"><?php echo $this->_tpl_vars['lang']['shc_payment_status']; ?>
</div>
                    <div style="width: 140px;"><?php echo $this->_tpl_vars['lang']['shc_shipping_status']; ?>
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
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['shc_total']; ?>
">
                            <span class="price-cell shc_price"><?php echo $this->_tpl_vars['item']['Total']; ?>
</span>
                        </div>
                        <?php if ($this->_tpl_vars['config']['shc_method'] == 'multi' && $this->_tpl_vars['config']['shc_commission_enable']): ?> 
                            <div data-caption="<?php echo $this->_tpl_vars['lang']['shc_commission']; ?>
">
                                <span class="price-cell shc_price"><?php echo $this->_tpl_vars['item']['Commission']; ?>
</span>
                            </div>
                        <?php endif; ?>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['shc_order_key']; ?>
"><?php echo $this->_tpl_vars['item']['Order_key']; ?>
</div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['date']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
</div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['shc_payment_status']; ?>
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
                        </div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['shc_shipping_status']; ?>
">
                            <div></div>
                            <select id="shs_<?php echo $this->_tpl_vars['item']['ID']; ?>
" class="w70 shipping_status" <?php if ($this->_tpl_vars['item']['Shipping_status'] == 'delivered'): ?>disabled="disabled"<?php endif; ?>>
                                <?php $_from = $this->_tpl_vars['shipping_statuses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shs']):
?>
                                    <option value="<?php echo $this->_tpl_vars['shs']['Key']; ?>
" <?php if ($this->_tpl_vars['shs']['Key'] == $this->_tpl_vars['item']['Shipping_status']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['shs']['name']; ?>
</option>  
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                        </div>
                        <div data-caption="<?php echo $this->_tpl_vars['lang']['actions']; ?>
">
                            <a title="<?php echo $this->_tpl_vars['lang']['view_details']; ?>
" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('page' => 'shc_my_items_sold'), $this);?>
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
            <div class="text-notice"><?php echo $this->_tpl_vars['lang']['shc_no_sold_items']; ?>
</div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<div id="tracking_number_form" class="hide">
    <input type="hidden" id="order_item_id" value="">
    <div id="shipping_city" class="submit-cell courier dhl ups">
        <div class="name"><?php echo $this->_tpl_vars['lang']['shc_tracking_number']; ?>
</div>
        <div class="field single-field">
            <input class="wauto" size="25" type="text" value="" id="order_tracking_number" />
        </div>
    </div>
</div>
<script class="fl-js-dynamic">
    var tmpItemID = 0;
    <?php echo '
    $(document).ready(function(){
        $(\'.add-tracking-number\').click(function() {
            tmpItemID = $(this).attr(\'data-item-id\');
            var el = \'#tracking_number_form\';

            flUtil.loadScript([
                rlConfig[\'tpl_base\'] + \'components/popup/_popup.js\',
            ], function(){
                $(\'#fs_shc_order_details\').popup({
                    click: false,
                    scroll: true,
                    closeOnOutsideClick: false,
                    content: $(el).html(),
                    caption: \''; ?>
<?php echo $this->_tpl_vars['lang']['shc_add_tracking_number']; ?>
<?php echo '\',
                    navigation: {
                        okButton: {
                            text: lang[\'save\'],
                            onClick: function(popup){
                                var order_tracking_number = popup.$interface.find(\'#order_tracking_number\').val();
                                shoppingCart.saveTrackingNumber(tmpItemID, order_tracking_number);

                                popup.close();
                            }
                        },
                        cancelButton: {
                            text: lang[\'cancel\'],
                            class: \'cancel\'
                        }
                    }
                });
            });
        });

        $(\'select.shipping_status\').change(function() {
            if($(this).val() != \'\') {
                shoppingCart.changeShippingStatus($(this).val(), $(this).attr(\'id\').split(\'_\')[1]);
            }
        });
    });
'; ?>

</script>
<!-- my purchases end | shopping cart -->