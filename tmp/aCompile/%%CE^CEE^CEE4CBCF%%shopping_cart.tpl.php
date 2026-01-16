<?php /* Smarty version 2.6.31, created on 2025-08-02 19:14:15
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/shopping_cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/shopping_cart.tpl', 9, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/shopping_cart.tpl', 63, false),)), $this); ?>
<!-- shoppingCart plugin -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php if ($_GET['module'] == 'auction' && ! $_GET['action']): ?>
        <a href="javascript:void(0)" onclick="show('search')" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['search']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>    
    <?php if ($_GET['module']): ?>
    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['rlBaseC'])) ? $this->_run_mod_handler('replace', true, $_tmp, '&amp;', '') : smarty_modifier_replace($_tmp, '&amp;', '')); ?>
" class="button_bar"><?php echo '<span class="left"></span><span class="center_list">'; ?><?php echo $this->_tpl_vars['lang']['shc_orders']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>
    <?php endif; ?>
    <?php if ($_GET['module'] != 'auction'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
module=auction" class="button_bar"><?php echo '<span class="left"></span><span class="center_list">'; ?><?php echo $this->_tpl_vars['lang']['shc_auctions']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>
    <?php endif; ?>
    <?php if ($_GET['module'] != 'configs'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
module=configs&form=settings" class="button_bar"><?php echo '<span class="left"></span><span class="center_edit">'; ?><?php echo $this->_tpl_vars['lang']['settings']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>
    <?php endif; ?>
    <?php if ($_GET['module'] != 'shipping_methods'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
module=shipping_methods" class="button_bar"><?php echo '<span class="left"></span><span class="center_list">'; ?><?php echo $this->_tpl_vars['lang']['shc_shipping_methods']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>
    <?php endif; ?>
    <?php if ($_GET['module'] != 'shipping_fields'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
module=shipping_fields" class="button_bar"><?php echo '<span class="left"></span><span class="center_list">'; ?><?php echo $this->_tpl_vars['lang']['shc_shipping_fields']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>
    <?php endif; ?>
    <?php if ($_GET['module'] == 'shipping_fields'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
module=shipping_fields&action=add" class="button_bar"><?php echo '<span class="left"></span><span class="center_add">'; ?><?php echo $this->_tpl_vars['lang']['add_field']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>
    <?php endif; ?>
    <a href="https://www.flynax.<?php if ((defined('RL_LANG_CODE') ? @RL_LANG_CODE : null) == 'ru'): ?>ru<?php else: ?>com<?php endif; ?>/files/manuals/shopping-cart-bidding-guide.pdf" target="_blank" class="button_bar"><?php echo '<span class="left"></span><span class="center_info">'; ?><?php echo $this->_tpl_vars['lang']['shc_help']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>
</div>

<div class="clear" style="*margin: -3px 0; *height: 1px;"></div>
<!-- navigation bar end -->

<?php $this->assign('sPost', $_POST); ?>

<?php if ($_GET['module']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pluginPath'])) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['module']) : smarty_modifier_cat($_tmp, $_GET['module'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.tpl') : smarty_modifier_cat($_tmp, '.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
    <?php if ($_GET['action'] == 'view'): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pluginPath'])) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'order_details.tpl') : smarty_modifier_cat($_tmp, 'order_details.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
        <!-- ext grid -->
        <div id="grid"></div>
        <script type="text/javascript">
        var shoppingCartGrid;

        <?php echo '
        $(document).ready(function(){

            shoppingCartGrid = new gridObj({
                key: \'shopping_cart\',
                id: \'grid\',
                ajaxUrl: rlPlugins + \'shoppingCart/admin/shopping_cart.inc.php?q=ext\',
                defaultSortField: \'Date\',
                remoteSortable: true,
                checkbox: true,
                actions: [
                    [lang[\'ext_delete\'], \'delete\']
                ],
                title: lang[\'ext_shc_orders_manager\'],
                fields: [
                    {name: \'Txn_ID\', mapping: \'Txn_ID\'},
                    {name: \'Order_key\', mapping: \'Order_key\'},
                    {name: \'bFull_name\', mapping: \'bFull_name\', type: \'string\'},
                    {name: \'dFull_name\', mapping: \'dFull_name\', type: \'string\'},
                    {name: \'Account_ID\', mapping: \'Account_ID\', type: \'string\'},
                    {name: \'title\', mapping: \'title\', type: \'string\'},
                    {name: \'Total\', mapping: \'Total\'},
                    {name: \'Commission_total\', mapping: \'Commission_total\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'pStatus\', mapping: \'pStatus\'},
                    {name: \'Shipping_status\', mapping: \'Shipping_status\'},
                    {name: \'Buyer_ID\', mapping: \'Buyer_ID\', type: \'int\'},
                    {name: \'Dealer_ID\', mapping: \'Dealer_ID\', type: \'int\'},
                    {name: \'ID\', mapping: \'ID\', type: \'int\'},
                    {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                    {name: \'Escrow_date\', mapping: \'Escrow_date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                    {name: \'Escrow_status\', mapping: \'Escrow_status\'},
                ],
                columns: [
                    {
                        header: lang[\'ext_id\'],
                        dataIndex: \'ID\',
                        width: 35,
                        fixed: true,
                        id: \'rlExt_black_bold\'
                    },{
                        header: lang[\'shc_buyer\'],
                        dataIndex: \'bFull_name\',
                        width: 120,
                        fixed: true,
                        renderer: function(username, obj, row)
                        {
                            if ( username )
                            {
                                var out = \'<a class="green_11_bg" href="\'+rlUrlHome+\'index.php?controller=accounts&action=view&userid=\'+row.data.Buyer_ID+\'" ext:qtip="\'+lang[\'ext_click_to_view_details\']+\'">\'+username+\'</a>\';
                            }
                            else
                            {
                                var out = \'<span class="delete">'; ?>
<?php echo $this->_tpl_vars['lang']['account_removed']; ?>
<?php echo '</span>\';
                            }
                            return out;
                        }
                    },{
                        header: lang[\'shc_dealer\'],
                        dataIndex: \'dFull_name\',
                        width: 120,
                        fixed: true,
                        renderer: function(username, obj, row)
                        {
                            if ( username )
                            {
                                var out = \'<a class="green_11_bg" href="\'+rlUrlHome+\'index.php?controller=accounts&action=view&userid=\'+row.data.Dealer_ID+\'" ext:qtip="\'+lang[\'ext_click_to_view_details\']+\'">\'+username+\'</a>\';
                            }
                            else
                            {
                                var out = \'<span class="delete">'; ?>
<?php echo $this->_tpl_vars['lang']['account_removed']; ?>
<?php echo '</span>\';
                            }
                            return out;
                        }
                    },{
                        header: lang[\'ext_item\'],
                        dataIndex: \'title\',
                        width: 20
                    },{
                        header: lang[\'shc_order_key\'],
                        dataIndex: \'Order_key\',
                        width: 100,
                        fixed: true
                    },{
                        header: lang[\'ext_total\']+\' (\'+rlCurrency+\')\',
                        dataIndex: \'Total\',
                        width: 5
                    }'; ?>
<?php if ($this->_tpl_vars['config']['shc_method'] == 'multi' && $this->_tpl_vars['config']['shc_commission_enable']): ?><?php echo ',{
                        header: lang[\'shc_commission\']+\' (\'+rlCurrency+\')\',
                        dataIndex: \'Commission_total\',
                        width: 5
                    }'; ?>
<?php endif; ?><?php echo ',{
                        header: lang[\'ext_date\'],
                        dataIndex: \'Date\',
                        width: 80,
                        fixed: true,
                        renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                    },{
                        header: lang[\'shc_shipping_status\'],
                        dataIndex: \'Shipping_status\',
                        width: 80,
                        fixed: true,
                        editor: new Ext.form.ComboBox({
                            store: [
                                [\'pending\', lang[\'pending\']],
                                [\'processing\', lang[\'shc_processing\']],
                                [\'shipped\', lang[\'shc_shipped\']],
                                [\'declined\', lang[\'shc_declined\']],
                                [\'open\', lang[\'shc_open\']],
                                [\'delivered\', lang[\'shc_delivered\']]
                            ],
                            displayField: \'value\',
                            valueField: \'key\',
                            typeAhead: true,
                            mode: \'local\',
                            triggerAction: \'all\',
                            selectOnFocus:true
                        }),
                        renderer: function(val){
                            return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                    },{
                        header: lang[\'ext_status\'],
                        dataIndex: \'pStatus\',
                        width: 80,
                        fixed: true,
                        renderer: function (val, obj, row) {
                            if (val == lang[\'ext_paid\'])
                            {
                                obj.style += \'background: #D2E798;\';
                                return \'<span>\' + val + \'</span>\';  
                            }
                            else if (val == lang[\'ext_unpaid\'])
                            {
                                obj.style += \'background: #FF878A;\';
                                return \'<span>\' + val + \'</span>\'; 
                            }
                            else if (val == lang[\'ext_pending\'])
                            {
                                obj.style += \'background: #c0ecee;\';
                                return \'<span>\' + val + \'</span>\'; 
                            }
                            else if (val == lang[\'canceled\'])
                            {
                                obj.style += \'background: #d7d7d7;\';
                                return \'<span>\' + val + \'</span>\';
                            }
                        }
                    }'; ?>
<?php if ($this->_tpl_vars['config']['shc_escrow']): ?><?php echo ',{
                        header: lang[\'shc_escrow_expiration\'],
                        dataIndex: \'Escrow_date\',
                        width: 120,
                        fixed: true,
                        renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                    },{
                        header: lang[\'shc_order_confirm\'],
                        width: 80,
                        fixed: true,
                        dataIndex: \'Escrow_status\',
                        sortable: false,
                        editor: new Ext.form.ComboBox({
                            store: [
                                [\'pending\', lang[\'pending\']],
                                [\'confirmed\', lang[\'shc_escrow_confirmed\']],
                                [\'canceled\', lang[\'shc_escrow_canceled\']]
                            ],
                            displayField: \'value\',
                            valueField: \'key\',
                            typeAhead: true,
                            mode: \'local\',
                            triggerAction: \'all\',
                            selectOnFocus:true
                        }),
                        renderer: function(val, obj, row) {
                            let escrowStatus = row.data.Escrow_status;
                            let qtip = lang[\'ext_click_to_edit\'];
                            let _val = \'\';
                            if (row.data.Status == \'unpaid\') {
                                qtip = lang[\'shc_order_unpaid\'];
                            }
                            if (val == \'confirmed\' || val == lang[\'shc_escrow_confirmed\']) {
                                obj.style += \'background: #D2E798;\';
                                _val = lang[\'shc_escrow_confirmed\'];
                            }
                            else if (val == \'canceled\' || val == lang[\'shc_escrow_canceled\']) {
                                obj.style += \'background: #FF878A;\';
                                _val = lang[\'shc_escrow_canceled\'];
                            }
                            else if (val == \'pending\' || val == lang[\'pending\']) {
                                obj.style += \'background: #c0ecee;\';
                                _val = lang[\'pending\'];
                            }
                            return \'<span ext:qtip="\'+qtip+\'">\'+_val+\'</span>\';
                        }
                    }'; ?>
<?php endif; ?><?php echo ',{
                        header: lang[\'ext_actions\'],
                        width: 80,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(data) {
                            var out = "<center>";
                            var splitter = false;

                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=view&item="+data+"\'><img class=\'view\' ext:qtip=\'"+lang[\'ext_view\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'rlConfirm( \\""+lang[\'ext_notice_\'+delete_mod]+"\\", \\"shoppingCart.deleteOrder\\", \\""+data+"\\", \\"load\\" )\' />";

                            out += "</center>";

                            return out;
                        }
                    }
                ]
            });
            
            shoppingCartGrid.init();
            grid.push(shoppingCartGrid.grid);
            
            // actions listener
            shoppingCartGrid.actionButton.addListener(\'click\', function()
            {
                var sel_obj = shoppingCartGrid.checkboxColumn.getSelections();
                var action = shoppingCartGrid.actionsDropDown.getValue();

                if ( !action )
                {
                    return false;
                }
                
                for( var i = 0; i < sel_obj.length; i++ )
                {
                    shoppingCartGrid.ids += sel_obj[i].id;
                    if (sel_obj.length != i+1) {
                        shoppingCartGrid.ids += \'|\';
                    }
                }
                
                if (action == \'delete\') {
                    Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_\'+delete_mod], function(btn) {
                        if ( btn == \'yes\' )
                        {
                            shoppingCart.deleteOrder(shoppingCartGrid.ids);
                        }
                    });
                }
            });

            shoppingCartGrid.grid.addListener(\'beforeedit\', function(editEvent) {
                if (editEvent.field == \'Escrow_status\' && editEvent.record.data.Status == \'unpaid\') {
                    console.log(editEvent.record.data);
                    return false;
                }
            });
        });

        '; ?>

        </script>
        <!-- ext grid end -->
    <?php endif; ?>
<?php endif; ?>

<script class="fl-js-dynamic">
    <?php echo '
    $(document).ready(function(){
        $(\'.cancel-update-listings\').click(function() {
            rlConfirm("'; ?>
<?php echo $this->_tpl_vars['lang']['shc_confirm_cancel_upddate_listings']; ?>
<?php echo '", "cancelUpdateListings", "", "load");
        });
    });

    let cancelUpdateListings = function() {
        let data = {module: \'all\'};
        flynax.sendAjaxRequest(\'shoppingCartCancelUpdateListings\', data, function(response){
            if (response.status == \'OK\') {
                $(\'.alert\').html(\'\');
                $(\'.alert\').hide();
            }
        });
    }

    let confirmOrder = function(params) {
        params = params.split(\',\');
        let data = {orderID: params[0], accountID: params[1]};
        flynax.sendAjaxRequest(\'shoppingCartConfirmOrder\', data, function(response){
            if (response.status == \'OK\') {
                printMessage(\'notice\', response.message);
                if ($(\'#escrow-status\').length > 0) {
                    $(\'#escrow-status\').html(response.text);
                } else {
                    shoppingCartGrid.reload();
                }
            }
        });
    }
'; ?>

</script>
<!-- shoppingCart plugin -->