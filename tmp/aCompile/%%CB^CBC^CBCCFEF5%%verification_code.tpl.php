<?php /* Smarty version 2.6.31, created on 2025-10-18 19:35:14
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/verificationCode/admin/verification_code.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/verificationCode/admin/verification_code.tpl', 10, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/verificationCode/admin/verification_code.tpl', 21, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/plugins/verificationCode/admin/verification_code.tpl', 63, false),array('modifier', 'ceil', '/home/gmoplus/mobil.gmoplus.com/plugins/verificationCode/admin/verification_code.tpl', 65, false),)), $this); ?>
<!-- verification_code tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php if (! $_GET['action']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
&amp;action=add" class="button_bar"><span class="left"></span>
            <span class="center_add"><?php echo $this->_tpl_vars['lang']['vc_add_item']; ?>
</span><span class="right"></span>
        </a>
    <?php endif; ?>
    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['rlBaseC'])) ? $this->_run_mod_handler('replace', true, $_tmp, '&amp;', '') : smarty_modifier_replace($_tmp, '&amp;', '')); ?>
" class="button_bar"><span class="left"></span>
        <span class="center_list"><?php echo $this->_tpl_vars['lang']['verification_code_list']; ?>
</span><span class="right"></span>
    </a>
</div>
<!-- navigation bar end -->

<?php if (isset ( $_GET['action'] )): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add/edit verification_code -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
&amp;action=<?php if ($_GET['action'] == 'add'): ?>add<?php else: ?>edit&amp;item=<?php echo $_GET['item']; ?>
<?php endif; ?>" method="post">
        <input type="hidden" name="submit" value="1" />
        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1" />
        <?php endif; ?>
        <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['vc_name']; ?>
</td>
                <td>
                    <input type="text" name="name" value="<?php echo $this->_tpl_vars['sPost']['name']; ?>
" maxlength="255" />
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['vc_position']; ?>
</td>
                <td class="field">
                    <select name="position" class="login_input_select">
                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <option value="header" <?php if ($this->_tpl_vars['sPost']['position'] == 'header'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['vc_position_header']; ?>
</option>
                        <option value="footer" <?php if ($this->_tpl_vars['sPost']['position'] == 'footer'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['vc_position_footer']; ?>
</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['vc_content']; ?>
</td>
                <td class="field">
                    <textarea cols="50" rows="5" name="content"><?php echo $this->_tpl_vars['sPost']['content']; ?>
</textarea>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['show_on_pages']; ?>
</td>
                <td class="field" id="pages_obj">
                    <fieldset class="light">
                        <?php $this->assign('pages_phrase', 'admin_controllers+name+pages'); ?>
                        <legend id="legend_pages" class="up"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['pages_phrase']]; ?>
</legend>
                        <div id="pages">
                            <div id="pages_cont" <?php if (! empty ( $this->_tpl_vars['sPost']['show_on_all'] ) || empty ( $this->_tpl_vars['sPost']['pages'] )): ?>style="display: none;"<?php endif; ?>>
                                <table class="sTable" style="margin-bottom: 15px;">
                                <tr>
                                    <td valign="top">
                                    <?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pagesF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pagesF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['page']):
        $this->_foreach['pagesF']['iteration']++;
?>
                                    <div style="padding: 2px 8px;">
                                        <input class="checkbox" <?php if ($this->_tpl_vars['sPost']['pages'] && ((is_array($_tmp=$this->_tpl_vars['page']['ID'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['pages']) : in_array($_tmp, $this->_tpl_vars['sPost']['pages']))): ?>checked="checked"<?php endif; ?> id="page_<?php echo $this->_tpl_vars['page']['ID']; ?>
" type="checkbox" name="pages[<?php echo $this->_tpl_vars['page']['ID']; ?>
]" value="<?php echo $this->_tpl_vars['page']['ID']; ?>
" /> <label class="cLabel" for="page_<?php echo $this->_tpl_vars['page']['ID']; ?>
"><?php echo $this->_tpl_vars['page']['name']; ?>
</label>
                                    </div>
                                    <?php $this->assign('perCol', ((is_array($_tmp=$this->_foreach['pagesF']['total']/3)) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>

                                    <?php if ($this->_foreach['pagesF']['iteration'] % $this->_tpl_vars['perCol'] == 0): ?>
                                        </td>
                                        <td valign="top">
                                    <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?>
                                    </td>
                                </tr>
                                </table>
                            </div>

                            <div class="grey_area" style="margin: 0 0 5px;">
                                <label><input id="show_on_all" <?php if ($this->_tpl_vars['sPost']['show_on_all'] || empty ( $this->_tpl_vars['sPost']['pages'] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="show_on_all" value="true" /> <?php echo $this->_tpl_vars['lang']['sticky']; ?>
</label>
                                <span id="pages_nav" <?php if ($this->_tpl_vars['sPost']['show_on_all'] || empty ( $this->_tpl_vars['sPost']['pages'] )): ?>class="hide"<?php endif; ?>>
                                    <span onclick="$('#pages_cont input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                    <span class="divider"> | </span>
                                    <span onclick="$('#pages_cont input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                </span>
                            </div>
                        </div>
                    </fieldset>

                    <script type="text/javascript">
                    <?php echo '

                    $(document).ready(function() {
                        $(\'#legend_pages\').click(function() {
                            fieldset_action(\'pages\');
                        });

                        $(\'input#show_on_all\').click(function() {
                            $(\'#pages_cont\').slideToggle();
                            $(\'#pages_nav\').fadeToggle();
                        });

                        $(\'#pages input\').click(function() {
                            if ( $(\'#pages input:checked\').length > 0 )
                            {
                                //$(\'#show_on_all\').prop(\'checked\', false);
                            }
                        });
                    });

                    '; ?>

                    </script>
                </td>
            </tr>
            <tr>
                <td class="no_divider"></td>
                <td class="field">
                    <input type="submit" value="<?php if ($_GET['action'] == 'edit'): ?><?php echo $this->_tpl_vars['lang']['edit']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['add']; ?>
<?php endif; ?>" />
                </td>
            </tr>
        </table>
    </form>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- add/edit verification_code end -->

<?php else: ?>
    <!-- ext grid -->
    <div id="grid"></div>
    <script type="text/javascript">
    var verificationCodeGrid;

    <?php echo '
    $(document).ready(function() {
        verificationCodeGrid = new gridObj({
            key: \'verificationCode\',
            id: \'grid\',
            ajaxUrl: rlPlugins + \'verificationCode/admin/verification_code.inc.php?q=ext\',
            defaultSortField: \'Date\',
            remoteSortable: true,
            checkbox: true,
            actions: [
                [lang[\'ext_delete\'], \'delete\']
            ],
            title: lang[\'ext_vc_manager\'],
            fields: [
                {name: \'Name\', mapping: \'Name\'},
                {name: \'Position\', mapping: \'Position\'},
                {name: \'Content\', mapping: \'Content\', type: \'string\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    width: 40,
                    fixed: true,
                    id: \'rlExt_black_bold\'
                },{
                    header: lang[\'ext_vc_name\'],
                    dataIndex: \'Name\',
                    width: 40
                },{
                    header: lang[\'ext_vc_position\'],
                    dataIndex: \'Position\',
                    width: 100,
                    fixed: true
                },{
                    header: lang[\'ext_date\'],
                    dataIndex: \'Date\',
                    width: 80,
                    fixed: true,
                    renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 10,
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
                },{
                    header: lang[\'ext_actions\'],
                    width: 80,
                    fixed: true,
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(data) {
                        var out = "<center>";

                        out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&item="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_view\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'rlConfirm( \\""+lang[\'ext_notice_\'+delete_mod]+"\\", \\"deleteVerificationCode\\", \\""+data+"\\", \\"load\\" )\' />";

                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        verificationCodeGrid.init();
        grid.push(verificationCodeGrid.grid);

        // actions listener
        verificationCodeGrid.actionButton.addListener(\'click\', function() {
            var sel_obj = verificationCodeGrid.checkboxColumn.getSelections();
            var action = verificationCodeGrid.actionsDropDown.getValue();

            if (!action) {
                return false;
            }

            for (var i = 0; i < sel_obj.length; i++) {
                verificationCodeGrid.ids += sel_obj[i].id;

                if (sel_obj.length != i + 1) {
                    verificationCodeGrid.ids += \'|\';
                }
            }

            if (action === \'delete\') {
                Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_\' + delete_mod], function(btn) {
                    if (btn === \'yes\') {
                        deleteVerificationCode(verificationCodeGrid.ids);
                    }
                });
            }
        });
    });

    /**
     * Remove verification code
     * @since 1.1.0
     * @param ids - List of IDs separated by "|" character
     */
    const deleteVerificationCode = function(ids) {
        flynax.sendAjaxRequest(\'deleteVerificationCode\', {ids: ids}, function(response) {
            if (response.status === \'OK\') {
                verificationCodeGrid.reload();

                if (response.message) {
                    printMessage(\'notice\', response.message);
                }
            } else {
                printMessage(\'error\', lang.system_error);
            }
        });
    }
    '; ?>

    </script>
    <!-- ext grid end -->
<?php endif; ?>

<!-- verification_code tpl -->