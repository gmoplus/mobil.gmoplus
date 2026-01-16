<?php /* Smarty version 2.6.31, created on 2025-07-13 21:57:42
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/saved_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/saved_search.tpl', 22, false),array('modifier', 'date_format', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/saved_search.tpl', 28, false),)), $this); ?>
<!-- saved search tpl -->

<div class="content-padding" id="saved_search_obj">
    <?php if (! empty ( $this->_tpl_vars['saved_search'] )): ?>
    <div class="list-table statuses" id="saved_search">
        <div class="header">
            <div class="checkbox" style="width: 40px;"><label><input class="inline all" type="checkbox" /></label></div>
            <div class="center" style="width: 30px;">#</div>
            <div><?php echo $this->_tpl_vars['lang']['criteria']; ?>
</div>
            <div style="width: 160px;"><?php echo $this->_tpl_vars['lang']['last_check']; ?>
</div>
            <div style="width: 80px;"><?php echo $this->_tpl_vars['lang']['status']; ?>
</div>
        </div>

        <?php $_from = $this->_tpl_vars['saved_search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['searchF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['searchF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['searchF']['iteration']++;
?>
            <?php $this->assign('status_key', $this->_tpl_vars['item']['Status']); ?>
            <div class="row" id="item_<?php echo $this->_tpl_vars['item']['ID']; ?>
">
                <div class="checkbox action no-flex"><label><input class="inline" value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" type="checkbox" /></label></div>
                <div class="center iteration no-flex"><?php echo $this->_foreach['searchF']['iteration']; ?>
</div>
                <div data-caption="<?php echo $this->_tpl_vars['lang']['criteria']; ?>
" class="content">
                    <table class="table">
                        <?php $_from = $this->_tpl_vars['item']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'saved_search_field.tpl') : smarty_modifier_cat($_tmp, 'saved_search_field.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </table>
                </div>
                <div data-caption="<?php echo $this->_tpl_vars['lang']['last_check']; ?>
" class="date-cell">
                    <span class="title"><?php echo $this->_tpl_vars['lang']['last_check']; ?>
:</span></span>
                    <div class="text" style="padding: 0 0 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
</div>
                    <a class="do-search" href="javascript:void(0)" id="search_<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['lang']['check_search']; ?>
</a>
                </div>
                <div data-caption="<?php echo $this->_tpl_vars['lang']['status']; ?>
" class="status-cell"><span class="title"><?php echo $this->_tpl_vars['lang']['status']; ?>
:</span> <span id="status_<?php echo $this->_tpl_vars['item']['ID']; ?>
"><span class="<?php echo $this->_tpl_vars['status_key']; ?>
"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['status_key']]; ?>
</span></span></div>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <div id="mass_actions" class="hide mass-actions"><?php echo '<a id="activate" href="javascript:void(0);" title="'; ?><?php echo $this->_tpl_vars['lang']['activate']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['lang']['activate']; ?><?php echo '</a><a id="deactivate" href="javascript:void(0);" title="'; ?><?php echo $this->_tpl_vars['lang']['deactivate']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['lang']['deactivate']; ?><?php echo '</a><a id="delete" href="javascript:void(0);" title="'; ?><?php echo $this->_tpl_vars['lang']['delete']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['lang']['delete']; ?><?php echo '</a>'; ?>
</div>

    <script class="fl-js-dynamic">
    lang.no_saved_search = '<?php echo $this->_tpl_vars['lang']['no_saved_search']; ?>
';
    <?php echo '
        $(function() {
            var $savedSearchInputs = $("#saved_search input:not(\'.all\')"),
                $massActionInput = $(\'#saved_search input.all\'),
                $massActionSection = $(\'#mass_actions\');

            $(\'a.do-search\').click(function() {
                flUtil.ajax(
                    {mode: \'ajaxCheckSavedSearch\', id: $(this).attr(\'id\').split(\'_\')[1]},
                    function(response, status) {
                        if (status === \'success\' && response && response.status === \'OK\' && response.url) {
                            window.location.href = response.url;
                        } else {
                            printMessage(
                                \'error\',
                                response.message ? response.message : lang.system_error
                            );
                        }
                    }
                );
            });

            $massActionInput.click(function() {
                $savedSearchInputs.each(function() {
                    $(this).prop(\'checked\', $massActionInput.prop(\'checked\')).trigger(\'change\');
                });
            });

            $savedSearchInputs.change(function() {
                var tab = false;
                $savedSearchInputs.each(function() {
                    if ($(this).is(\':checked\') && !$(this).hasClass(\'all\')) {
                        tab = true;
                    }
                });

                if (tab === true) {
                    $massActionSection.fadeIn(\'normal\');
                } else {
                    $massActionInput.prop(\'checked\', false);
                    $massActionSection.fadeOut(\'normal\');
                }
            });

            $(\'#mass_actions a\').click(function() {
                var items = \'\', action = $(this).attr(\'id\');
                $savedSearchInputs.each(function() {
                    if ($(this).is(\':checked\') && $(this).is(\':visible\')) {
                        items = items ? items + \'|\' + $(this).val() : $(this).val();
                    }
                });

                if (action === \'delete\') {
                    flUtil.loadStyle(rlConfig.tpl_base + \'components/popup/popup.css\');
                    flUtil.loadScript(rlConfig.tpl_base + \'components/popup/_popup.js\', function() {
                        $(\'body\').popup({
                            click     : false,
                            content   : \''; ?>
<?php echo $this->_tpl_vars['lang']['delete_confirm']; ?>
<?php echo '\',
                            caption   : lang.notice,
                            navigation: {
                                okButton: {
                                    text: lang.delete,
                                    onClick: function(popup){
                                        sendSavedSearchRequest(items, action);
                                        popup.close();
                                    }
                                },
                                cancelButton: {
                                    text : lang.cancel,
                                    class: \'cancel\'
                                }
                            }
                        });
                    });
                } else {
                    sendSavedSearchRequest(items, action);
                }
            });

            var sendSavedSearchRequest = function (items, action) {
                flUtil.ajax(
                    {mode: \'ajaxMassSavedSearch\', items: items, action: action},
                    function(response, status) {
                        if (status === \'success\' && response && response.status === \'OK\') {
                            printMessage(\'notice\', response.message);

                            status  = action === \'activate\' ? \'active\' : \'approval\';
                            var ids = items.split(\'|\');
                            switch (action) {
                                case \'activate\':
                                case \'deactivate\':
                                    ids.forEach(function (id) {
                                        $(\'#status_\' + id).html(
                                            $(\'<span>\', {class: status}).text(lang[status])
                                        );
                                    });
                                    break;
                                case \'delete\':
                                    ids.forEach(function (id) {
                                        $(\'#item_\' + id).fadeOut(\'slow\');
                                    });

                                    if (response.missingAllerts) {
                                        $(\'#saved_search_obj\').html(
                                            $(\'<div>\', {class: \'info\'}).html(lang.no_saved_search)
                                        );
                                    }
                                    break;
                            }
                        } else {
                            printMessage(
                                \'error\',
                                response.message ? response.message : lang.system_error
                            );
                        }
                    }
                );
            }
        });
    '; ?>
</script>
</div>

<?php else: ?>
    <div class="info"><?php echo $this->_tpl_vars['lang']['no_saved_search']; ?>
</div>
<?php endif; ?>

<!-- saved search tpl end -->