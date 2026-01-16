<?php /* Smarty version 2.6.31, created on 2025-08-18 14:53:32
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/autoRegPrevent/admin/auto_reg_prevent.tpl */ ?>
<!-- auto_reg_prevent.tpl -->

<!-- navigation bar -->
<div id="nav_bar"><?php echo '<a href="javascript:void(0)" onclick="$(\'div#add_prevent\').toggleClass(\'hide\');" class="button_bar"><span class="left"></span><span class="center_add">'; ?><?php echo $this->_tpl_vars['lang']['add']; ?><?php echo '</span><span class="right"></span></a>'; ?>
</div>
<!-- navigation bar end -->

<div id="action_blocks">
    <div id="add_prevent" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/m_block_start.tpl', 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['autoRegPrevent_addItem'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form id="form-add-to-spam-list" onsubmit="addToSpamList();return false;" method="post">
        <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
            <td class="field">
                <input type="text" id="arp_username" style="width: 200px;" maxlength="60" />
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['mail']; ?>
</td>
            <td class="field">
                <input type="text" id="arp_mail" style="width: 200px;" maxlength="60" />
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['autoRegPrevent_ext_ip']; ?>
</td>
            <td class="field">
                <input type="text" id="arp_ip" style="width: 200px;" maxlength="60" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="field">
                <input type="submit" name="item_submit" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
" />
                <a onclick="$('div#add_prevent').addClass('hide')" href="javascript:void(0)" class="cancel">
                    <?php echo $this->_tpl_vars['lang']['close']; ?>

                </a>
            </td>
        </tr>
        </table>
        </form>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/m_block_end.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <script><?php echo '
            function restoreSubmitButtonTitle() {
                $(\'input[name=item_submit]\').val(\''; ?>
<?php echo $this->_tpl_vars['lang']['add']; ?>
<?php echo '\');
            }

            function postAjaxItem(item, data, callback) {
                var url = rlConfig[\'ajax_url\'] + \'?item=\' + item;

                if (arguments.length === 2 && data instanceof Function) {
                    callback = data;
                    data = [];
                }

                $.post(url, data, function (response) {
                    if (!(callback instanceof Function)) {
                        return;
                    }

                    if (response && response.status && response.message) {
                        var success = response.status === \'OK\';
                        callback(success, response);
                    } else {
                        callback(false, response);
                    }
                }, \'json\').fail(function (error) {
                    callback(false, error);
                });
            }

            function funcDelete(entryId) {
                var data = {
                    id: entryId
                };
                postAjaxItem(\'autoRegPrevent_deleteEntry\', data, function (success, response) {
                    if (success) {
                        printMessage(\'notice\', response.message);
                        autoRegPreventGrid.reload();
                    }
                });
            }

            function addToSpamList() {
                let data = {
                    item: \'autoRegPrevent_addToSpamList\',
                    username: $.trim($(\'input#arp_username\').val()),
                    email: $.trim($(\'input#arp_mail\').val()),
                    ip: $.trim($(\'input#arp_ip\').val())
                };

                if (data.ip && !/[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}/.test(data.ip)) {
                    printMessage(\'error\', lang.autoRegPrevent_invalidIp);
                    return;
                }

                $(\'input[name=item_submit]\').val(lang[\'ext_loading\']);

                postAjaxItem(\'autoRegPrevent_addToSpamList\', data, function (success, response) {
                    if (success) {
                        printMessage(\'notice\', response.message);
                        document.getElementById(\'form-add-to-spam-list\').reset();
                        autoRegPreventGrid.reload();
                    } else {
                        if (response.status === \'ERROR\' && response.message) {
                            printMessage(\'error\', response.message);
                        } else {
                            printMessage(\'error\', lang[\'ext_error_saving_changes\']);
                        }
                    }
                    restoreSubmitButtonTitle();
                });
            }
        '; ?>
</script>
    </div>
</div>

<div id="grid"></div>
<script><?php echo '
var autoRegPreventGrid;

$(document).ready(function(){
    autoRegPreventGrid = new gridObj({
        key: \'autoRegPrevent\',
        id: \'grid\',
        ajaxUrl: rlPlugins + \'autoRegPrevent/admin/auto_reg_prevent.inc.php?q=ext\',
        defaultSortField: \'Date\',
        defaultSortType: \'DESC\',
        title: lang[\'autoRegPrevent_ext_manager\'],
        fields: [
            {name: \'ID\', mapping: \'ID\'},
            {name: \'Username\', mapping: \'Username\'},
            {name: \'Mail\', mapping: \'Mail\'},
            {name: \'IP\', mapping: \'IP\'},
            {name: \'Reason\', mapping: \'Reason\'},
            {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
            {name: \'Status\', mapping: \'Status\'}
        ],
        columns: [
            {
                header: lang[\'ext_username\'],
                dataIndex: \'Username\',
                width: 40
            },{
                header: lang[\'ext_email\'],
                dataIndex: \'Mail\',
                width: 60
            },{
                header: \''; ?>
<?php echo $this->_tpl_vars['lang']['autoRegPrevent_ext_ip']; ?>
<?php echo '\',
                dataIndex: \'IP\',
                width: 30
            },{
                header: lang[\'autoRegPrevent_ext_reason\'],
                dataIndex: \'Reason\',
                width: 35,
                id: \'rlExt_item\'
            },{
                header: lang[\'autoRegPrevent_ext_date_reg\'],
                dataIndex: \'Date\',
                width: 25,
                renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
            },{
                header: lang[\'ext_status\'],
                dataIndex: \'Status\',
                width: 20,
                editor: new Ext.form.ComboBox({
                    '; ?>

                    store: [
                        ['block', '<?php echo $this->_tpl_vars['lang']['autoRegPrevent_status_block']; ?>
'],
                        ['unblock', '<?php echo $this->_tpl_vars['lang']['autoRegPrevent_status_unblock']; ?>
']
                    ],
                    <?php echo '
                    mode: \'local\',
                    typeAhead: true,
                    triggerAction: \'all\',
                    selectOnFocus: true
                }),
                renderer: function(rowValue, row) {
                    if (rowValue === \''; ?>
<?php echo $this->_tpl_vars['lang']['autoRegPrevent_status_block']; ?>
<?php echo '\') {
                        row.style += \'background: #d2e798;\';
                    } else if (rowValue === \''; ?>
<?php echo $this->_tpl_vars['lang']['autoRegPrevent_status_unblock']; ?>
<?php echo '\') {
                        row.style += \'background: #ffe7ad;\';
                    }

                    return \'<div ext:qtip="\' + lang[\'ext_click_to_edit\'] + \'">\' + rowValue + \'</div>\';
                }
            },{
                header: lang[\'ext_actions\'],
                width: 55,
                fixed: true,
                dataIndex: \'ID\',
                sortable: false,
                renderer: function(id) {
                    var out = \'<img \';
                    out += \'ext:qtip="\' + lang[\'ext_delete\'] + \'"\';
                    out += \'class="remove"\';
                    out += \'src="\' + rlUrlHome + \'img/blank.gif"\';
                    out += \'style="display:block;margin-left:auto;margin-right:auto;"\';
                    out += \'onclick="rlConfirm(\\\'\' + lang[\'ext_notice_delete\'] + \'\\\', \\\'funcDelete\\\', \' + id + \')"\';
                    out += \' />\';

                    return out;
                }
            }
        ]
    });

    autoRegPreventGrid.init();
    grid.push(autoRegPreventGrid.grid);
});
'; ?>
</script>

<!-- auto_reg_prevent.tpl end -->