<?php /* Smarty version 2.6.31, created on 2025-10-18 19:38:28
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/currencyConverter/admin/currencyConverter.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/currencyConverter/admin/currencyConverter.tpl', 50, false),)), $this); ?>
<!-- lcurrency converter tpl -->

<!-- navigation bar -->
<div id="nav_bar">
	<a href="javascript:void(0)" id="update_rates" class="button_bar"><span class="left"></span><span class="center_compare"><?php echo $this->_tpl_vars['lang']['currencyConverter_update_rate']; ?>
</span><span class="right"></span></a>	
	<a href="javascript:void(0)" id="add_currency" class="button_bar"><span class="left"></span><span class="center_add"><?php echo $this->_tpl_vars['lang']['currencyConverter_add_currency']; ?>
</span><span class="right"></span></a>

    <script>
    <?php echo '

    var updateRates = function(){
        var data = {
            item: \'currencyConverter_update_rates\'
        };
        $.post(rlConfig[\'ajax_url\'], data, function(response, status){
            if (response.status == \'OK\') {
                currencyGrid.reload();
                printMessage(\'notice\', lang[\'currencyConverter_rates_updated\']);
            } else {
                printMessage(\'error\', response.message);
            }
        }, \'json\').fail(function(object, status) {
            if (status == \'abort\') {
                return;
            }

            printMessage(\'error\', lang[\'system_error\']);
        });
    }

    $(function(){
        "use strict";

        $(\'#update_rates\').click(function(){
            rlConfirm(lang[\'currencyConverter_update_confirm_notice\'], \'updateRates\');
        });

        $(\'#add_currency\').click(function(){
            show(\'new_item\');
        });
    });

    '; ?>

    </script>
</div>
<!-- navigation bar end -->

<!-- add new currency -->
<div id="new_item" class="hide">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['currencyConverter_add_currency'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<form name="add_currency" action="" method="post">
	<table class="form">
	<tr>
		<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['currencyConverter_code']; ?>
</td>
		<td class="value">
			<input class="w60" type="text" name="code" maxlength="3" />
		</td>
	</tr>
	<tr>
		<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['currencyConverter_rate']; ?>
</td>
		<td class="value">
			<input class="w60 numeric" type="text" name="rate" maxlength="20" style="text-align: center;" />
		</td>
	</tr>
	<tr>
		<td class="name"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
		<td class="value">
			<input type="text" name="name" maxlength="50" />
		</td>
	</tr>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['currencyConverter_symbols']; ?>
</td>
        <td class="value">
            <input type="text" name="symbols" maxlength="50" />
            <span class="field_description"><?php echo $this->_tpl_vars['lang']['currencyConverter_symbols_hint']; ?>
</span>
        </td>
    </tr>
	
	<tr>
		<td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
		<td class="value">
			<select name="status">
				<option value="active"><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
				<option value="approval"><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td></td>
		<td>
			<input type="submit" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
" data-default-phrase="<?php echo $this->_tpl_vars['lang']['add']; ?>
" />
			<a class="cancel" href="javascript:void(0)" onclick="show('new_item')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
		</td>
	</tr>
	</table>
	</form>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<script>
<?php echo '

$(function(){
    "use strict";

    $(\'form[name=add_currency]\').on(\'submit\', function(e){
        e.preventDefault();

        var form = this;

        // enable loading
        var button = $(this).find(\'input[type=submit]\');
        button.val(lang[\'loading\']);

        // submit form
        var data = {
            item: \'currencyConverter_add_rate\',
            code: $(this).find(\'input[name=code]\').val(),
            rate: $(this).find(\'input[name=rate]\').val(),
            name: $(this).find(\'input[name=name]\').val(),
            symbols: $(this).find(\'input[name=symbols]\').val(),
            status: $(this).find(\'select[name=status]\').val()
        };

        $.post(rlConfig[\'ajax_url\'], data, function(response, status){
            if (response.status == \'OK\') {
                currencyGrid.reload();

                $(form).find(\'input[type=text]\').val(\'\');
                $(\'#new_item a.cancel\').trigger(\'click\');

                printMessage(\'notice\', lang[\'currencyConverter_added_notice\']);
            } else {
                var message = response.message;

                if (typeof response.message == \'object\') {
                    message = \'<ul>\';
                    $.each(response.message, function(index, error){
                        message += \'<li>\' + error + \'</li>\';
                    })
                    message += \'</ul>\';
                }

                printMessage(\'error\', message);
            }

            button.val(button.data(\'default-phrase\'));
        }, \'json\').fail(function(object, status) {
            if (status == \'abort\') {
                return;
            }

            printMessage(\'error\', lang[\'system_error\']);
            button.val(button.data(\'default-phrase\'));
        });
    });
});

'; ?>

</script>

<!-- add new currency end -->

<div id="grid"></div>
<script type="text/javascript">//<![CDATA[
lang['sticky'] = "<?php echo $this->_tpl_vars['lang']['sticky']; ?>
";
lang['deactivate'] = "<?php echo $this->_tpl_vars['lang']['deactivate']; ?>
";
lang['currencyConverter_code'] = "<?php echo $this->_tpl_vars['lang']['currencyConverter_code']; ?>
";
lang['currencyConverter_rate'] = "<?php echo $this->_tpl_vars['lang']['currencyConverter_rate']; ?>
";
lang['name'] = "<?php echo $this->_tpl_vars['lang']['name']; ?>
";

var mass_actions = [
    [lang['ext_activate'], 'activate'],
    [lang['deactivate'], 'approve']
];

var currencyGrid;

<?php echo '
$(document).ready(function(){
	
	currencyGrid = new gridObj({
		key: \'currency\',
		id: \'grid\',
		ajaxUrl: rlPlugins + \'currencyConverter/admin/currencyConverter.inc.php?q=ext\',
		defaultSortField: \'ID\',
		remoteSortable: true,
        checkbox: true,
        actions: mass_actions,
		title: lang[\'currencyConverter_ext_caption\'],
		fields: [
			{name: \'Code\', mapping: \'Code\', type: \'string\'},
			{name: \'Rate\', mapping: \'Rate\'},
			{name: \'Status\', mapping: \'Status\', type: \'string\'},
			{name: \'ID\', mapping: \'ID\'},
			{name: \'Symbol\', mapping: \'Symbol\', type: \'string\'},
            {name: \'Country\', mapping: \'Country\', type: \'string\'},
            {name: \'Sticky\', mapping: \'Sticky\'},
            {name: \'Sticky_original\', mapping: \'Sticky_original\'},
			{name: \'Position\', mapping: \'Position\'}
		],
		columns: [
			{
				header: lang[\'currencyConverter_code\'],
				dataIndex: \'Code\',
				width: 80,
				fixed: true,
				id: \'rlExt_item_bold\'
			},{
				header: lang[\'currencyConverter_rate\'],
				dataIndex: \'Rate\',
				width: 150,
				fixed: true,
				id: \'rlExt_item\',
				editor: new Ext.form.TextField({
					allowBlank: false
				}),
				renderer: function(val){
					return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
				}
			},{
				header: lang[\'name\'],
				dataIndex: \'Country\',
				width: 200,
				fixed: true,
				editor: new Ext.form.TextField({
					allowBlank: false
				}),
				renderer: function(val){
					return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
				}
			},{
				header: lang[\'currencyConverter_symbols\'] + \' \' + lang[\'currencyConverter_symbols_hint\'],
				dataIndex: \'Symbol\',
				width: 40,
                sortable: false,
				editor: new Ext.form.TextField({
                    maxLength: 64,
                    autoCreate: {
                        tag: \'input\',
                        type: \'text\',
                        size: \'64\',
                        autocomplete: \'off\',
                        maxlength: \'64\'
                    }
				})
			},{
                header: lang[\'sticky\'],
                dataIndex: \'Sticky\',
                width: 120,
                fixed: true,
                editor: new Ext.form.ComboBox({
                    store: [
                        [\'1\', lang[\'ext_yes\']],
                        [\'0\', lang[\'ext_no\']]
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
                header: lang[\'ext_position\'],
                dataIndex: \'Position\',
                width: 100,
                fixed: true,
                editor: new Ext.form.NumberField({
                    allowBlank: false,
                    allowDecimals: false
                }),
                renderer: function(val, ext, row){
                    var hint = lang[\'ext_click_to_edit\'];

                    if (row.data.Sticky_original == \'0\') {
                        val = lang[\'ext_not_available\'];
                        hint = lang[\'currencyConverter_ext_position_rejected\'];
                    }

                    return \'<span ext:qtip="\'+hint+\'">\'+val+\'</span>\';
                }
            },{
				header: lang[\'ext_status\'],
				dataIndex: \'Status\',
				width: 90,
				fixed: true,
                sortable: false,
				editor: new Ext.form.ComboBox({
					store: [
						[\'active\', lang[\'ext_active\']],
						[\'approval\', lang[\'ext_approval\']]
					],
					displayField: \'value\',
					valueField: \'key\',
					typeAhead: true,
					mode: \'local\',
					triggerAction: \'all\',
					selectOnFocus:true
				})
			}
		]
	});
	
	currencyGrid.init();
	grid.push(currencyGrid.grid);
	
    currencyGrid.grid.addListener(\'afteredit\', function(editEvent){
        if (editEvent.field == \'Sticky\'){
            currencyGrid.reload();
        }
    });

    currencyGrid.grid.addListener(\'beforeedit\', function(editEvent){
        if (editEvent.field == \'Position\' && editEvent.record.data.Sticky_original == \'0\') {
            editEvent.cancel = true;
            currencyGrid.store.rejectChanges();
        }
    });

    // actions listener
    currencyGrid.actionButton.addListener(\'click\', function(){
        var selected = currencyGrid.checkboxColumn.getSelections();
        var action = currencyGrid.actionsDropDown.getValue();

        if (!action){
            return false;
        }
        
        var ids = new Array();
        
        $.each(selected, function(index, item){
            ids.push(item.id);
        });
        
        ids = ids.join(\'|\');

        var data = {
            item: \'currencyConverter_mass_action\',
            ids: ids,
            action: action
        };
        $.post(rlConfig[\'ajax_url\'], data, function(response, status){
            if (response.status == \'OK\') {
                currencyGrid.checkboxColumn.clearSelections();
                currencyGrid.actionsDropDown.setVisible(false);
                currencyGrid.actionButton.setVisible(false);

                currencyGrid.reload();
            } else {
                printMessage(\'error\', response.message);
            }
        }, \'json\').fail(function(object, status) {
            if (status == \'abort\') {
                return;
            }

            printMessage(\'error\', lang[\'system_error\']);
        });
    });
});
'; ?>

//]]>
</script>

<!-- lcurrency converter tpl end -->