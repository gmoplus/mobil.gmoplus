<?php /* Smarty version 2.6.31, created on 2025-10-18 19:35:19
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/importExportCategories/admin/importExportCategories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'implode', '/home/gmoplus/mobil.gmoplus.com/plugins/importExportCategories/admin/importExportCategories.tpl', 18, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/importExportCategories/admin/importExportCategories.tpl', 28, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/importExportCategories/admin/importExportCategories.tpl', 54, false),array('modifier', 'json_encode', '/home/gmoplus/mobil.gmoplus.com/plugins/importExportCategories/admin/importExportCategories.tpl', 110, false),)), $this); ?>
<!-- export import categories tpl -->
<!-- navigation bar -->

<div id="nav_bar">
    <?php if ($_GET['action'] == 'import' || ! isset ( $_GET['action'] )): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=export" class="button_bar"><span class="left"></span><span
                class="center_export"><?php echo $this->_tpl_vars['lang']['importExportCategories_export']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <?php if ($_GET['action'] == 'export'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
" class="button_bar"><span class="left"></span><span
                class="center_import"><?php echo $this->_tpl_vars['lang']['importExportCategories_import']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
</div>
<!-- navigation bar end -->

<?php if (! isset ( $_GET['action'] )): ?>
    <?php if (! isset ( $_POST['submit'] )): ?>
        <?php $this->assign('systemColumns', ((is_array($_tmp=', ')) ? $this->_run_mod_handler('implode', true, $_tmp, $this->_tpl_vars['systemColumns']) : implode($_tmp, $this->_tpl_vars['systemColumns']))); ?>
        <?php $this->assign('replace', ('{')."system_columns".('}')); ?>

        <?php $this->assign('multilingualColumns', ((is_array($_tmp=', ')) ? $this->_run_mod_handler('implode', true, $_tmp, $this->_tpl_vars['multilingualColumns']) : implode($_tmp, $this->_tpl_vars['multilingualColumns']))); ?>
        <?php $this->assign('replace2', ('{')."multilingual_columns".('}')); ?>
    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/m_block_start.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <h2><?php echo $this->_tpl_vars['lang']['importExportCategories_example']; ?>
</h2>
    <br>
    <p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['importExportCategories_header_row'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['systemColumns']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['systemColumns'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace2'], $this->_tpl_vars['multilingualColumns']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace2'], $this->_tpl_vars['multilingualColumns'])); ?>
</p>
    <br>
    <img src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
importExportCategories/admin/static/example-v2.png" alt="" title="" style="width: 700px;" />
    <br><br><br>
    <img src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
importExportCategories/admin/static/multilingual_example.png" alt="" title="" style="width: 1200px;" />
    <div class="clear"></div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/m_block_end.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.categoryDropdown.js"></script>
    <script>
        var category_selected = <?php if ($this->_tpl_vars['sPost']['export_category_id']): ?><?php echo $this->_tpl_vars['sPost']['export_category_id']; ?>
<?php else: ?>null<?php endif; ?>;
        <?php echo '
            $(document).ready(function() {
                $(\'select[name=export_category_id]\').categoryDropdown({
                    listingType: \'#type\',
                    default_selection: category_selected,
                    phrases: { '; ?>

                        no_categories_available: "<?php echo $this->_tpl_vars['lang']['no_categories_available']; ?>
",
                        select: "<?php echo $this->_tpl_vars['lang']['select']; ?>
",
                        select_category: "<?php echo $this->_tpl_vars['lang']['select_category']; ?>
"
                    <?php echo ' }
                });
            });
        '; ?>

    </script>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=import" id="importForm" method="post" enctype="multipart/form-data"
        onsubmit="return submit_form();">
        <input type="hidden" name="submit" value="1" />
        <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
</td>
                <td class="field">
                    <select class="w200" name="export_listing_type" id="type">
                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
                            <option <?php if ($this->_tpl_vars['sPost']['export_listing_type'] == $this->_tpl_vars['l_type']['Key']): ?>selected="selected" <?php endif; ?>
                                value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
"><?php echo $this->_tpl_vars['l_type']['name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['parent_category']; ?>
</td>
                <td class="field">
                    <select class="w200" name="export_category_id">
                        <option value=""><?php if ($this->_tpl_vars['categories']): ?><?php echo $this->_tpl_vars['lang']['select']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['eil_select_listing_type']; ?>
<?php endif; ?></option>
                        <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
                            <option <?php if ($this->_tpl_vars['category']['Level'] == 0): ?>class="highlight_opt" <?php endif; ?>
                                <?php if ($this->_tpl_vars['category']['margin']): ?>style="margin-left: <?php echo $this->_tpl_vars['category']['margin']; ?>
px;" <?php endif; ?> value="<?php echo $this->_tpl_vars['category']['ID']; ?>
"
                                <?php if ($this->_tpl_vars['sPost']['export_category_id'] == $this->_tpl_vars['category']['ID']): ?>selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['category']['pName']]; ?>

                                (<?php echo $this->_tpl_vars['category']['Count']; ?>
)
                            </option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="name">
                    <span class="red">*</span><?php echo $this->_tpl_vars['lang']['file']; ?>

                </td>
                <td class="field">
                    <input type="file" class="file" name="file_import" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="field">
                    <input class="submit" type="submit" value="<?php echo $this->_tpl_vars['lang']['importExportCategories_import']; ?>
" />
                </td>
            </tr>
        </table>
    </form>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $this->assign('tempRepPhrase', ('{')."field".('}')); ?>

    <script type="text/javascript">
        <?php echo '
            var submit_form = function() {
                let importFile     = $(\'[name="file_import"]\').val(),
                    listingType    = $(\'[name="export_listing_type"]\').val(),
                    allowedFormats = JSON.parse(\''; ?>
<?php echo json_encode($this->_tpl_vars['allowedFormats']); ?>
<?php echo '\');

                if (!listingType) {
                    printMessage(\'error\', \''; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['importExportCategories_import_filename_empty'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['tempRepPhrase'], $this->_tpl_vars['lang']['listing_type']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['tempRepPhrase'], $this->_tpl_vars['lang']['listing_type'])); ?>
<?php echo '\');
                    return false;
                } else if (importFile == \'\') {
                    printMessage(\'error\', \''; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['importExportCategories_import_filename_empty'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['tempRepPhrase'], $this->_tpl_vars['lang']['file']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['tempRepPhrase'], $this->_tpl_vars['lang']['file'])); ?>
<?php echo '\');
                    return false;
                } else {
                    if ($.inArray(importFile.split(\'.\').pop(), allowedFormats) < 0) {
                        printMessage(\'error\', \''; ?>
<?php echo $this->_tpl_vars['lang']['importExportCategories_incorrect_file_ext']; ?>
<?php echo '\');
                        return false;
                    }
                }
                return true;
            }
        '; ?>

    </script>
<?php elseif ($_GET['action'] === 'import'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div style="padding: 10px;">
        <table class="lTable">
            <tr class="body">
                <td class="list_td_light"><?php echo $this->_tpl_vars['lang']['importExportCategories_pre_import_notice']; ?>
</td>
                <td style="width: 5px;" rowspan="100"></td>
                <td class="list_td_light" align="center" style="width: 200px;">
                    <input type="button" id="import_categories_button" value="<?php echo $this->_tpl_vars['lang']['importExportCategories_import']; ?>
"
                        style="margin: 0;width: 100px;" />
                </td>
            </tr>
        </table>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="grid"></div>
    <script type="text/javascript" src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
importExportCategories/admin/static/lib.js"></script>
    <script>
        lang.h1_heading                 = '<?php echo $this->_tpl_vars['lang']['h1_heading']; ?>
';
        lang.title                      = '<?php echo $this->_tpl_vars['lang']['title']; ?>
';
        lang.meta_description           = '<?php echo $this->_tpl_vars['lang']['meta_description']; ?>
';
        lang.meta_keywords              = '<?php echo $this->_tpl_vars['lang']['meta_keywords']; ?>
';
        lang.category_url_listing_logic = '<?php echo $this->_tpl_vars['lang']['category_url_listing_logic']; ?>
';

        let pathImport = '<?php echo $this->_tpl_vars['rlBaseC']; ?>
', importInProcess = false;
        <?php echo '

        /**
         * @todo - Remove this code when compatibility will be >= 4.8.1
         */
        if (typeof lang.importExportCategories_titleOfManager === \'undefined\') {
            lang.importExportCategories_titleOfManager = \''; ?>
<?php echo $this->_tpl_vars['lang']['importExportCategories_titleOfManager']; ?>
<?php echo '\';
        }

        $(document).ready(function() {
            $(\'.button_bar\').remove();

            let $importButton = $(\'#import_categories_button\');

            $importButton.click(function() {
                importInProcess = true;
                $importButton.prop(\'disabled\', true).val(lang.loading);
                importCategories(0);
            });

            $(window).bind(\'beforeunload\', function() {
                if (importInProcess) {
                    return \'Uploading the data is in process; closing the page will stop the process.\';
                }
            });

            function importCategories(start) {
                $.post(rlConfig.ajax_url, {
                        item: \'importCategory\',
                        stack: start
                    },
                    function(response) {
                        response = JSON.parse(response);
                        if (response.next === true && response.start > start) {
                            importCategories(response.start);
                        } else {
                            importInProcess = false;
                            location.href = rlUrlHome + \'index.php?controller=\' + controller + \'&done\';
                        }
                    }
                )
            }
            let validError = false;
            var importCategoriesGrid = new gridObj({
                key: \'importCategories\',
                id: \'grid\',
                ajaxUrl: rlPlugins + \'importExportCategories/admin/importExportCategories.inc.php?q=ext\',
                defaultSortField: false,
                title: lang[\'importExportCategories_titleOfManager\'],
                fields: [
                    {name: \'name\', mapping: \'Name\'},
                    {name: \'parent\', mapping: \'Parent\'},
                    {name: \'type\', mapping: \'Type\'},
                    {name: \'path\', mapping: \'Path\'},
                    {name: \'locked\', mapping: \'Lock\'},
                    {name: \'title\', mapping: \'Title\'},
                    {name: \'h1\', mapping: \'H1\'},
                    {name: \'metaDescription\', mapping: \'Meta_description\'},
                    {name: \'metaKeywords\', mapping: \'Meta_keywords\'},
                ],
                columns: [{
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    id: \'rlExt_item_bold\',
                    width: 22
                }, {
                    header: lang[\'ext_parent\'],
                    dataIndex: \'parent\',
                    id: \'rlExt_item\',
                    width: 15,
                    renderer: function(value) {
                        if (!value) {
                            return \'<span style="color:#3D3D3D">'; ?>
<?php echo $this->_tpl_vars['lang']['no_parent']; ?>
<?php echo '</span>\';
                        }
                        return value;
                    }
                }, {
                    header: lang[\'title\'],
                    dataIndex: \'title\',
                    id: \'rlExt_item\',
                    width: 12,
                }, {
                    header: lang[\'h1_heading\'],
                    dataIndex: \'h1\',
                    id: \'rlExt_item\',
                    width: 12,
                }, {
                    header: lang[\'meta_description\'],
                    dataIndex: \'metaDescription\',
                    id: \'rlExt_item\',
                    width: 11,
                }, {
                    header: lang[\'meta_keywords\'],
                    dataIndex: \'metaKeywords\',
                    id: \'rlExt_item\',
                    width: 11,
                }, {
                    header: lang[\'ext_type\'],
                    dataIndex: \'type\',
                    width: 10,
                    renderer: function(value) {
                        return \'<b>\' + value + \'</b>\';
                    }
                }, {
                    header: \''; ?>
<?php echo $this->_tpl_vars['lang']['url']; ?>
<?php echo '\',
                    dataIndex: \'path\',
                    width: 40,
                    renderer: function(value, row) {
                        if (!value) {
                            return \'<span style="color:#df7c41">will generated</span>\';
                        }
                        return value;
                    }
                }, {
                    header: lang[\'ext_locked\'],
                    dataIndex: \'locked\',
                    width: 8,
                    renderer: function(value) {
                        if (value == \'1\') {
                            return lang[\'ext_yes\'];
                        }
                        return lang[\'ext_no\'];
                    }
                }]
            });

            importCategoriesGrid.init();
            grid.push(importCategoriesGrid.grid);

        });
        '; ?>

    </script>
<?php elseif ($_GET['action'] == 'export'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form id="export_form" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=export" method="post" onsubmit="return submit_form();">
        <input type="hidden" name="submit" value="1" />
        <input type="hidden" id="str_category" name="str_category" />
        <input type="hidden" id="strincludeType" name="strincludeType" />
        <table class="form">
            <tr>
                <td>
                    <div id="cat_checkboxed" style="margin: 0 0 8px;<?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>display: none<?php endif; ?>">
                        <div class="tree">
                            <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['section']):
?>
                                <fieldset class="light">
                                    <legend id="legend_section_<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="up"
                                        onclick="fieldset_action('section_<?php echo $this->_tpl_vars['section']['ID']; ?>
');"><?php echo $this->_tpl_vars['section']['name']; ?>
</legend>
                                    <div id="section_<?php echo $this->_tpl_vars['section']['ID']; ?>
">
                                        <?php if (! empty ( $this->_tpl_vars['section']['Categories'] )): ?>
                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_level_checkbox.tpl') : smarty_modifier_cat($_tmp, 'category_level_checkbox.tpl')), 'smarty_include_vars' => array('categories' => $this->_tpl_vars['section']['Categories'],'first' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                            <div class="grey_area">
                                                <label><input class="checkbox" type="checkbox" name="include_sub_cat[]"
                                                        value="<?php echo $this->_tpl_vars['section']['Type']; ?>
" /> <?php echo $this->_tpl_vars['lang']['include_subcats']; ?>
</label>
                                                <span onclick="levelSection('check',<?php echo $this->_tpl_vars['section']['ID']; ?>
)" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                                <span class="divider"> | </span>
                                                <span onclick="levelSection('uncheck',<?php echo $this->_tpl_vars['section']['ID']; ?>
)"
                                                    class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                                </span>
                                            </div>
                                        <?php else: ?>
                                            <div style="padding: 0 0 8px 10px;"><?php echo $this->_tpl_vars['lang']['no_items_in_sections']; ?>
</div>
                                        <?php endif; ?>
                                    </div>
                                </fieldset>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                    </div>

                    <script type="text/javascript">
                        var submit_form;
                        var tree_selected = <?php if ($_POST['categories']): ?>[<?php $_from = $_POST['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['postcatF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['postcatF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['post_cat']):
        $this->_foreach['postcatF']['iteration']++;
?>['<?php echo $this->_tpl_vars['post_cat']; ?>
']<?php if (! ($this->_foreach['postcatF']['iteration'] == $this->_foreach['postcatF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]
                    <?php else: ?>false
                    <?php endif; ?>;
                    var tree_parentPoints = <?php if ($this->_tpl_vars['parentPoints']): ?>[<?php $_from = $this->_tpl_vars['parentPoints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['parentF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['parentF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['parent_point']):
        $this->_foreach['parentF']['iteration']++;
?>['<?php echo $this->_tpl_vars['parent_point']; ?>
']<?php if (! ($this->_foreach['parentF']['iteration'] == $this->_foreach['parentF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]
                    <?php else: ?>false
                    <?php endif; ?>;
                    <?php echo '
                        var uncheckChildCheckboxes = function() {
                            $(\'.tree input\').off(\'click\').click(function() {
                                var $parent = $(this);
                                var $parentLi = $parent.closest(\'li\');
                                var $isIncludeSub = $parentLi.closest(\'div\');
                                $isIncludeSub = $isIncludeSub.find(\'[name="include_sub_cat[]"]\').is(":checked");
                                var $childs = $parentLi.find(\'ul\');
                                if ($isIncludeSub) {
                                    $childs.find(\'input\').removeAttr(\'checked\');
                                }
                            });
                        }
                        $(document).ready(function() {
                            uncheckChildCheckboxes();
                            $(\'.opened\').live(\'click\', function() {
                                var $parent = $(this);
                                var $parentLi = $parent.closest(\'li\');
                                $parentLi.find(\'.grey_area\').css(\'display\', \'none\');

                            });

                            $(\'li>img:not(.opened)\').live(\'click\', function() {
                                $(this).closest(\'li\').addClass(\'parent_li\');
                                $(this).closest(\'li\').find(\'.grey_area\').last().css("display", "block");
                                var $li = $(this).closest(\'li\');
                                $open = $li.find(\'.opened\');
                                $close = $open.closest(\'li\').find(\'.grey_area\').css("display", "block");
                            });

                            $("[name=\'categories[]\']").live(\'change\', function() {
                                var $parent = $(this);
                                var $parentLi = $parent.closest(\'li\');
                                var $isIncludeSub = $parentLi.closest(\'div\');
                                $isIncludeSub = $isIncludeSub.find(\'[name="include_sub_cat[]"]\').is(\':checked\');
                                if ($isIncludeSub) {
                                    if (this.checked) {
                                        $(this).parent().closest(\'li\').find(\'img:not(.no_child)\').removeAttr(\'style\');
                                        $(this).parent().closest(\'li\').addClass(\'iec-hide_img\');
                                    } else {
                                        $(this).parent().closest(\'li\').find(\'img:not(.no_child)\').css(\'display\', \'inline\');
                                        $img = $(this).closest(\'li\').removeClass(\'iec-hide_img\');
                                    }
                                }
                            });
                            $("[name=\'include_sub_cat[]\']").live(\'change\', function() {
                                var $parent = $(this);
                                var $parentDiv = $parent.closest(\'div\');
                                var $greatParentDiv = $parentDiv.parent().closest(\'div\');
                                $img = $greatParentDiv.find(\'.iec-hide_img\');
                                if (this.checked) {
                                    var $li = $img.closest(\'li\');
                                    var $ul = $li.find(\'ul\');
                                    $inputBefore = $greatParentDiv.find(\'input:checked\');
                                    $liBefore = $inputBefore.closest(\'li\');
                                    $liBefore.find(\'img:not(.no_child)\').removeAttr("style");
                                    $liBefore.closest(\'li\').addClass(\'iec-hide_img\');
                                    $parentLi = $greatParentDiv.find(\'.parent_li\');
                                    $parentInput = $parentLi.find(\'input:checked\');
                                    $liParent = $parentInput.closest(\'li\');
                                    $ulChild = $liParent.find(\'ul\');
                                    $ulChild.find($("input")).removeAttr(\'checked\');
                                    $liParent.find(\'img:not(.no_child)\').removeAttr("style");
                                    $liParent.addClass(\'iec-hide_img\');
                                } else {
                                    $greatParentDiv.find(\'img:not(.no_child)\').css("display", "inline");
                                    $img.removeClass(\'iec-hide_img\');
                                }
                            })

                            $("[name=\'categories[]\']").prop("disabled", false);
                            $("#export_btn").prop("disabled", false);
                            flynax.treeLoadLevel(\'checkbox\', \'flynax.openTree(tree_selected, tree_parentPoints)\', \'div#cat_checkboxed\');
                            flynax.openTree(tree_selected, tree_parentPoints);

                            $(\'input[name=cat_sticky]\').click(function() {
                                $(\'#cat_checkboxed\').slideToggle();
                                $(\'#cats_nav\').fadeToggle();
                            });

                            submit_form = function() {
                                var data = $(\'#export_form\').serializeArray();
                                var newDataCategory = \'\';
                                var newDataIncludeSubCate = \'\';

                                $.each(data, function() {
                                    if (this.name === \'categories[]\') {
                                        newDataCategory += this.value + \',\';
                                    }
                                    if (this.name === \'include_sub_cat[]\') {
                                        newDataIncludeSubCate += this.value + \',\';
                                    }
                                });

                                if (newDataCategory.length > 0) {
                                    newDataCategory = newDataCategory.substring(0, newDataCategory.length - 1);
                                }

                                if (newDataIncludeSubCate.length > 0) {
                                    newDataIncludeSubCate = newDataIncludeSubCate.substring(0, newDataIncludeSubCate.length - 1);
                                }

                                $(\'#str_category\').val(newDataCategory);
                                $(\'#strincludeType\').val(newDataIncludeSubCate);
                                $("#cat_checkboxed div.tree input").prop(\'checked\', false);

                                if (!$(\'input[name = cat_sticky]\').is(":checked")) {
                                    if (newDataCategory.length > 0) {
                                        return true;
                                    } else {
                                        printMessage(\'info\', \''; ?>
<?php echo $this->_tpl_vars['lang']['importExportCategories_empty']; ?>
<?php echo '\');
                                        return false;
                                    }
                                } else {
                                    $(\'#system_message\').css(\'display\', \'none\');
                                }
                            }
                        });

                    '; ?>

                </script>
                <script>
                    <?php echo '
                        function levelAll(flag) {
                            $li = $(\'div.tree\').find(\'li\');
                            if (flag === \'uncheck_all\') {
                                $(\'#cat_checkboxed div.tree input[name=\\\'categories[]\\\']\').prop(\'checked\', false);
                                $li.removeClass(\'iec-hide_img\');
                            } else {
                                $(\'#cat_checkboxed div.tree input\').prop(\'checked\', true);
                                $li.find(\'img:not(.no_child)\').removeAttr("style");
                                $li.addClass(\'iec-hide_img\');
                            }
                        }

                        function levelSection(flag, sectionID) {
                            $li = $(\'#section_\' + sectionID).find(\'li\');
                            if (flag === \'uncheck\') {
                                $(\'#section_\' + sectionID + \' input[name=\\\'categories[]\\\']\').prop(\'checked\', false);
                                $li.removeClass(\'iec-hide_img\');
                            } else {
                                $(\'#section_\' + sectionID + \' input[name=\\\'categories[]\\\']\').prop(\'checked\', true);
                                $subCatInclude = $(\'#section_\' + sectionID).find(\'input[name=\\\'include_sub_cat[]\\\']\');
                                if ($subCatInclude.is(\':checked\')) {
                                    $li.find(\'img:not(.no_child)\').removeAttr("style");
                                    $li.addClass(\'iec-hide_img\');
                                }
                            }
                        }

                        function levelDynamic(flag, $context) {
                            $div = $context.closest(\'div\');
                            $li = $context.closest(\'li\');
                            $ul = $li.find(\'ul\');
                            $childLi = $ul.find(\'li\');
                            if (flag === \'uncheck\') {
                                $childLi.removeClass(\'iec-hide_img\');
                            } else {
                                $divSubCatInclude = $li.closest(\'div\');
                                $subCatInclude = $divSubCatInclude.find(\'input[name=\\\'include_sub_cat[]\\\']\');
                                if ($subCatInclude.is(":checked")) {
                                    $parentInput = $li.find(\'input[name=\\\'categories[]\\\']\').first();
                                    $parentInput.prop(\'checked\', true);
                                    $li.find(\'img:not(.no_child)\').removeAttr("style");
                                    $li.addClass(\'iec-hide_img\');
                                }
                            }
                        }
                    '; ?>

                </script>

                <div class="grey_area">
                    <label><input class="checkbox" <?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>checked="checked" <?php endif; ?> type="checkbox"
                            name="cat_sticky" value="true" /> <?php echo $this->_tpl_vars['lang']['sticky']; ?>
</label>
                    <span id="cats_nav" <?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>class="hide" <?php endif; ?>>
                        <span onclick="levelAll('check_all')" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                        <span class="divider"> | </span>
                        <span onclick="levelAll('uncheck_all')" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                    </span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="field">
                <input type="submit" id="export_btn" value="<?php echo $this->_tpl_vars['lang']['importExportCategories_export']; ?>
" />
            </td>
        </tr>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<!-- export import categories tpl end -->