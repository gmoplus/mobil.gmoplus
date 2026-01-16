<?php /* Smarty version 2.6.31, created on 2025-10-18 19:36:19
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/rssfeed/admin/rssfeed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/rssfeed/admin/rssfeed.tpl', 17, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/plugins/rssfeed/admin/rssfeed.tpl', 30, false),)), $this); ?>
<!-- rss feeds tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span
                class="center_add"><?php echo $this->_tpl_vars['lang']['add_block']; ?>
</span><span class="right"></span></a>
    <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
" class="button_bar"><span class="left"></span><span
                class="center_list"><?php echo $this->_tpl_vars['lang']['items_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action'] == 'edit' || $_GET['action'] == 'add'): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add new feed -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;id=<?php echo $_GET['id']; ?>
<?php endif; ?>"
          method="post">
        <input type="hidden" name="submit" value="1"/>
        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1"/>
        <?php endif; ?>

        <table class="form">

            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
                <td class="field">
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                        <ul class="tabs">
                            <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                                <li lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
"
                                    <?php if (($this->_foreach['langF']['iteration'] <= 1)): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['language']['name']; ?>
</li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    <?php endif; ?>

                    <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                        <input type="text" name="name[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['name'][$this->_tpl_vars['language']['Code']]; ?>
"
                               maxlength="350"/>
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </td>
            </tr>

            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['rssfeed_link']; ?>
</td>
                <td class="field" id="rssfeed_url">
                    <input type="text" name="url" value="<?php echo $this->_tpl_vars['sPost']['url']; ?>
" class="w350"/> <input style="margin-top: 0;"
                                                                                             type="button"
                                                                                             value="<?php echo $this->_tpl_vars['lang']['rssfeed_validate']; ?>
"/>

                    <div id="feed_sample"></div>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['article_num']; ?>
</td>
                <td class="field">
                    <input type="text" name="article_num" value="<?php echo $this->_tpl_vars['sPost']['article_num']; ?>
" maxlength="5" class="w60"
                           style="text-align: center;"/>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['rssfeed_article_update_delay']; ?>
</td>
                <td class="field">
                    <input type="text" name="update_delay"
                           value="<?php if ($this->_tpl_vars['sPost']['update_delay']): ?><?php echo $this->_tpl_vars['sPost']['update_delay']; ?>
<?php else: ?>12<?php endif; ?>" maxlength="5" class="w60"
                           style="text-align: center;"/> <span><?php echo $this->_tpl_vars['lang']['rssfeed_hours']; ?>
</span>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['block_side']; ?>
</td>
                <td class="field">
                    <select name="side">
                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['l_block_sides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sides_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sides_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['block_side']):
        $this->_foreach['sides_f']['iteration']++;
?>
                            <option value="<?php echo $this->_tpl_vars['sKey']; ?>
" <?php if ($this->_tpl_vars['sKey'] == $this->_tpl_vars['sPost']['side']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['block_side']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['use_block_design']; ?>
</td>
                <td class="field">
                    <?php if ($this->_tpl_vars['sPost']['tpl'] == '1'): ?>
                        <?php $this->assign('tpl_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['tpl'] == '0'): ?>
                        <?php $this->assign('tpl_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('tpl_yes', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['tpl_yes']; ?>
 class="lang_add" type="radio" name="tpl" value="1"/> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['tpl_no']; ?>
 class="lang_add" type="radio" name="tpl" value="0"/> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                <td class="field">
                    <select name="status">
                        <option value="active"
                                <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                        <option value="approval"
                                <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="<?php if ($_GET['action'] == 'edit'): ?><?php echo $this->_tpl_vars['lang']['edit']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['add']; ?>
<?php endif; ?>"/>
                </td>
            </tr>
        </table>
    </form>
    <script type="text/javascript">
        var edit_mode = <?php if ($_GET['action'] == 'edit'): ?>true<?php else: ?>false<?php endif; ?>;
        <?php echo '

        $(document).ready(function () {
            $(\'#rssfeed_url input[type=button]\').click(function () {
                var url = $(this).prev().val();

                if (url != \'\') {
                    if (!isUrl(url)) {
                        printMessage(\'error\', lang[\'ext_rssfeed_bad_url\']);
                        $(this).prev().addClass(\'error\');
                    } else {
                        $(this).val(lang[\'loading\']);
                        xajax_rssfeedValidate(url);
                    }
                } else {
                    $(this).prev().addClass(\'error\');
                }
            })
            $(\'#rssfeed_url input[type=text]\').keyup(function () {
                $(this).removeClass(\'error\');
            });

            if (edit_mode) {
                $(\'#rssfeed_url input[type=button]\').trigger(\'click\');
            }
        });

        if (typeof (\'isUrl\' != \'function\')) {
            function isUrl(s) {
                var regexp = /(ftp|http|https):\\/\\/(\\w+:{0,1}\\w*@)?(\\S+)(:[0-9]+)?(\\/|\\/([\\w#!:.?+=&%@!\\-\\/]))?/;
                return regexp.test(s);
            }
        }

        '; ?>

    </script>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- add new feed end -->

<?php else: ?>
    <script type="text/javascript">
        // blocks sides list
        var block_sides = [
            <?php $_from = $this->_tpl_vars['l_block_sides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sides_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sides_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['block_side']):
        $this->_foreach['sides_f']['iteration']++;
?>
            ['<?php echo $this->_tpl_vars['sKey']; ?>
', '<?php echo $this->_tpl_vars['block_side']; ?>
']<?php if (! ($this->_foreach['sides_f']['iteration'] == $this->_foreach['sides_f']['total'])): ?>,<?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        ];
    </script>
    <!-- grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
        var rssFeedGrid;

        <?php echo '
        $(document).ready(function () {

            rssFeedGrid = new gridObj({
                key: \'rssFeed\',
                id: \'grid\',
                ajaxUrl: rlPlugins + \'rssfeed/admin/rssfeed.inc.php?q=ext\',
                defaultSortField: \'name\',
                title: lang[\'rssfeed_ext_caption\'],
                remoteSortable: false,
                fields: [
                    {name: \'ID\', mapping: \'ID\'},
                    {name: \'name\', mapping: \'name\'},
                    {name: \'Side\', mapping: \'Side\'},
                    {name: \'Tpl\', mapping: \'Tpl\'},
                    {name: \'Article_num\', mapping: \'Article_num\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'}
                ],
                columns: [
                    {
                        header: lang[\'ext_name\'],
                        dataIndex: \'name\',
                        width: 20,
                        id: \'rlExt_item_bold\'
                    }, {
                        header: lang[\'ext_article_num\'],
                        dataIndex: \'Article_num\',
                        width: 5,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowDecimals: false
                        }),
                        renderer: function (val) {
                            return \'<span ext:qtip="\' + lang[\'ext_click_to_edit\'] + \'">\' + val + \'</span>\';
                        }
                    }, {
                        header: lang[\'ext_block_side\'],
                        dataIndex: \'Side\',
                        width: 8,
                        editor: new Ext.form.ComboBox({
                            store: block_sides,
                            displayField: \'value\',
                            valueField: \'key\',
                            typeAhead: true,
                            mode: \'local\',
                            triggerAction: \'all\',
                            selectOnFocus: true
                        }),
                        renderer: function (val) {
                            return \'<span ext:qtip="\' + lang[\'ext_click_to_edit\'] + \'">\' + val + \'</span>\';
                        }
                    }, {
                        header: lang[\'ext_block_style\'],
                        dataIndex: \'Tpl\',
                        width: 8,
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
                            selectOnFocus: true
                        }),
                        renderer: function (val) {
                            return \'<span ext:qtip="\' + lang[\'ext_click_to_edit\'] + \'">\' + val + \'</span>\';
                        }
                    }, {
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        fixed: true,
                        width: 100,
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
                            selectOnFocus: true
                        })
                    }, {
                        header: lang[\'ext_actions\'],
                        width: 70,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function (data) {
                            var out = "<center>";
                            out += "<a href=\'" + rlUrlHome + "index.php?controller=" + controller + "&action=edit&id=" + data + "\'><img class=\'edit\' ext:qtip=\'" + lang[\'ext_edit\'] + "\' src=\'" + rlUrlHome + "img/blank.gif\' /></a>";
                            out += "<img class=\'remove\' ext:qtip=\'" + lang[\'ext_delete\'] + "\' src=\'" + rlUrlHome + "img/blank.gif\' onClick=\'rlConfirm( \\"" + lang[\'ext_notice_delete\'] + "\\", \\"xajax_deleteRssFeed\\", \\"" + Array(data) + "\\" )\' />";
                            out += "</center>";

                            return out;
                        }
                    }
                ]
            });

            rssFeedGrid.init();
            grid.push(rssFeedGrid.grid);

        });
        '; ?>

        //]]>
    </script>
    <!-- grid end -->

<?php endif; ?>

<!-- rss feeds tpl -->