<?php /* Smarty version 2.6.31, created on 2025-10-18 19:35:28
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/admin/massmailer_newsletter.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/admin/massmailer_newsletter.tpl', 93, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/admin/massmailer_newsletter.tpl', 200, false),array('modifier', 'string_format', '/home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/admin/massmailer_newsletter.tpl', 240, false),array('function', 'fckEditor', '/home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/admin/massmailer_newsletter.tpl', 134, false),)), $this); ?>
<!-- massmailer/newsletter -->

<script type="text/javascript" src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
massmailer_newsletter/static/lib.js"></script>
<script type="text/javascript">
    massmailer.phrases['send_confirm'] = "<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_send_confirm']; ?>
";
    massmailer.phrases['completed']    = "<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_completed_notice']; ?>
";
    massmailer.phrases['empty_emails'] = "<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_no_selected_emails']; ?>
";
    massmailer.config['id']            = <?php if ($_GET['massmailer']): ?><?php echo $_GET['massmailer']; ?>
<?php else: ?>false<?php endif; ?>;
</script>
<script>
    <?php echo '
        $(\'document\').ready(function() {
            $(\'#langSelect\').on(\'change\', function() {
                $.post(rlConfig.ajax_url, {
                        item: \'getCountMassmailer\',
                        langMassmailer: this.value
                    },
                    function(response) {
                        if (response.status == \'OK\') {
                            $strHtml = \'<li>\' +
                                \'<label>\' +
                                \'<input type="checkbox" name="site_accounts" />\' +
                                \' \' + response.data.langAcType + \' \' + \'(\' + response.data.total + \')\' +
                                \'</label>\' +
                                \'</li>\';


                            $(".countUser").empty()

                            $.each(response.data, function(i, item) {
                                if (item.Key) {
                                    $strHtml += \'<li style="padding-left: 20px;">\' +
                                        \'<label>\' +
                                        \'<input class="accounts"\' +
                                        \'type="checkbox"\' +
                                        \'name="type[]"\' +
                                        \'value="\' + item.Key + \'"/>\' +
                                        \' \' + item.name + \' (\' + item.count + \')\' +
                                        \'</label>\' +
                                        \'</li>\';
                                }
                            })
                            $(".countUser").empty();
                            $(".countUser").html($strHtml);
                        }

                    }, \'json\')

            });

        });
    '; ?>

</script>
<!-- navigation bar -->
<div id="nav_bar"><?php echo ''; ?><?php if ($_GET['page'] == 'newsletter'): ?><?php echo '<a href="javascript:void(0)" onclick="show(\'filters\');" class="button_bar"><span class="left"></span><span class="center_search">'; ?><?php echo $this->_tpl_vars['lang']['filters']; ?><?php echo '</span><span class="right"></span></a>'; ?><?php endif; ?><?php echo ''; ?><?php if (! $_GET['page'] && $_GET['action'] != 'add'): ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['rlBaseC']; ?><?php echo 'action=add" class="button_bar"><span class="left"></span><span class="center_add">'; ?><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_add_massmailer']; ?><?php echo '</span><span class="right"></span></a><a href="'; ?><?php echo $this->_tpl_vars['rlBaseC']; ?><?php echo 'page=newsletter" class="button_bar"><span class="left"></span><span class="center_recepeints">'; ?><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_recipients']; ?><?php echo '</span><span class="right"></span></a>'; ?><?php endif; ?><?php echo ''; ?><?php if ($_GET['action'] || $_GET['page']): ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['rlBase']; ?><?php echo 'index.php?controller='; ?><?php echo $_GET['controller']; ?><?php echo '" class="button_bar"><span class="left"></span><span class="center_list">'; ?><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_newsletters_list']; ?><?php echo '</span><span class="right"></span></a>'; ?><?php endif; ?><?php echo ''; ?>

</div>
<!-- navigation bar end -->

<?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>
    <?php $this->assign('sPost', $_POST); ?>

    <!-- add new massmailer -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="<?php echo ''; ?><?php echo $this->_tpl_vars['rlBaseC']; ?><?php echo 'action='; ?><?php if ($_GET['action'] == 'add'): ?><?php echo 'add'; ?><?php elseif ($_GET['action'] == 'edit'): ?><?php echo 'edit&massmailer='; ?><?php echo $_GET['massmailer']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
" enctype="multipart/form-data" method="post">
        <input type="hidden" name="fromPost" value="1" />
        <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['key']; ?>
</td>
                <td class="field">
                    <input id="massmailer_key" <?php if ($_GET['action'] == 'edit'): ?>readonly="readonly" class="disabled" <?php endif; ?>
                        type="text" value="<?php echo $_POST['massmailer_key']; ?>
" name="massmailer_key" size="12" maxlength="100" />
                </td>
            </tr>
            <tr>
                <td class="name">
                    <span class="red">*</span><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_subject']; ?>

                </td>
                <td class="field">
                    <input class="w350" type="text" name="subject" value="<?php echo $this->_tpl_vars['sPost']['subject']; ?>
" />
                </td>
            </tr>
            <tr>
                <td class="name">
                    <span class="red">*</span><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_body']; ?>

                </td>
                <td class="field">

                    <div style="padding: 0 0 5px 0;">
                        <select id="var_sel">
                            <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                            <?php $_from = $this->_tpl_vars['l_email_variables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['var']):
?>
                                <option value="<?php echo $this->_tpl_vars['var']; ?>
"><?php echo $this->_tpl_vars['var']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                        <input class="caret_button no_margin" id="input_<?php echo $this->_tpl_vars['language']['Code']; ?>
" type="button" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
"
                            style="margin-left: 5px" />
                        <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['add_template_variable']; ?>
</span>
                    </div>

                    <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => 'body','width' => '100%','height' => '200','value' => $this->_tpl_vars['sPost']['body']), $this);?>


                    <script type="text/javascript">
                        <?php echo '
                            $(document).ready(function() {
                                if (typeof flynax.putCursorInCKTextarea == \'function\') {
                                    flynax.putCursorInCKTextarea(\'body\');
                                }

                                $(\'.caret_button\').click(function() {
                                    var variable = $(\'#var_sel\').val();

                                    if (variable == \'\') {
                                        return;
                                    }

                                    var instance = CKEDITOR.instances[\'body\'];
                                    instance.getSelection().getStartElement().appendHtml(variable);
                                });
                            });
                        '; ?>

                    </script>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->_tpl_vars['lang']['massmailer_newsletter_user_lang']; ?>

                </td>
                <td class="field">
                    <select id="langSelect" name="lang">
                        <option value="all" <?php if (empty ( $this->_tpl_vars['sPost']['langSelect'] ) || $this->_tpl_vars['sPost']['langSelect'] === 'all'): ?>selected<?php endif; ?>>
                            <?php echo $this->_tpl_vars['lang']['all']; ?>

                        </option>
                        <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langSystem']):
?>
                            <option value="<?php echo $this->_tpl_vars['langSystem']['Code']; ?>
" <?php if ($this->_tpl_vars['sPost']['langSelect'] === $this->_tpl_vars['langSystem']['Code']): ?>selected<?php endif; ?>>
                                <?php echo $this->_tpl_vars['langSystem']['name']; ?>

                            </option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_recipients']; ?>
</td>
                <td class="field">
                    <ul class="clear_list" style="padding: 5px 0 0;">
                        <li>
                            <label>
                                <input type="checkbox" name="newsletters_accounts"
                                    <?php if ($this->_tpl_vars['sPost']['newsletters_accounts']): ?>checked="checked" <?php endif; ?> />
                                <?php echo $this->_tpl_vars['lang']['massmailer_newsletter_newsletter']; ?>
 (<?php echo $this->_tpl_vars['other_type_count']['subscribers']['count']; ?>
)
                            </label>
                        </li>
                        <div class="countUser">
                            <li>
                                <label>
                                    <input type="checkbox" name="site_accounts" <?php if ($this->_tpl_vars['sPost']['site_accounts']): ?>checked="checked"
                                        <?php endif; ?> />
                                    <?php echo $this->_tpl_vars['lang']['account_type']; ?>
 (<?php echo $this->_tpl_vars['other_type_count']['total_accounts']; ?>
)
                                </label>
                            </li>
                            <?php $_from = $this->_tpl_vars['account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type']):
?>
                                <?php $this->assign('sType', $this->_tpl_vars['sPost']['type']); ?>
                                <?php $this->assign('tKey', $this->_tpl_vars['type']['Key']); ?>
                                <li style="padding-left: 20px;">
                                    <label>
                                        <input class="accounts" type="checkbox" name="type[]" value="<?php echo $this->_tpl_vars['tKey']; ?>
"
                                            <?php if ($this->_tpl_vars['sType'] && ((is_array($_tmp=$this->_tpl_vars['tKey'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sType']) : in_array($_tmp, $this->_tpl_vars['sType']))): ?>checked="checked" <?php endif; ?> />
                                        <?php echo $this->_tpl_vars['type']['name']; ?>
 (<?php echo $this->_tpl_vars['type']['count']; ?>
)
                                    </label>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                        <li>
                            <label>
                                <input type="checkbox" name="contact_us" <?php if ($this->_tpl_vars['sPost']['contact_us']): ?>checked="checked" <?php endif; ?> />
                                <?php echo $this->_tpl_vars['lang']['massmailer_newsletter_contact_us']; ?>
 (<?php echo $this->_tpl_vars['other_type_count']['contacts']['count']; ?>
)
                            </label>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                <td class="field">
                    <select name="status">
                        <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected" <?php endif; ?>>
                            <?php echo $this->_tpl_vars['lang']['active']; ?>

                        </option>
                        <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected" <?php endif; ?>>
                            <?php echo $this->_tpl_vars['lang']['approval']; ?>

                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
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
    <!-- add new massmailer end -->
<?php elseif ($_GET['action'] == 'send'): ?>
    <script type="text/javascript">
        var $total_res = <?php echo ((is_array($_tmp=$this->_tpl_vars['massmailer_form']['Recipients_newsletter_count']['Count'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
;
        massmailer.phrases['massmailer_newsletter_sent_email_zero'] = '<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_sent_email_zero']; ?>
';
    </script>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <table class="list mn_list">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_to']; ?>
:</td>
            <td class="value topfix">
                <?php if ($this->_tpl_vars['massmailer_form']['Recipients_newsletter']): ?>
                    <div class="dark_13 mn_padding">
                        <a target="_blank"
                            href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&page=newsletter&subscribers=1">
                            <?php echo $this->_tpl_vars['lang']['massmailer_newsletter_newsletter']; ?>
 (<?php echo $this->_tpl_vars['massmailer_form']['Recipients_newsletter_count']['Count']; ?>
)
                        </a>

                        <?php if (! empty ( $this->_tpl_vars['massmailer_form']['Recipients_newsletter_emails'] )): ?>
                            <div class="emails" id="emails_newsletter"
                                style="margin: 10px; border: 1px #ccc solid; padding: 5px; font-weight: normal;">
                                <?php $_from = $this->_tpl_vars['massmailer_form']['Recipients_newsletter_emails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['emails']):
?>
                                    <label>
                                        <input type="checkbox" name="emails[<?php echo $this->_tpl_vars['email']['Mail']; ?>
]" value="<?php echo $this->_tpl_vars['emails']['Mail']; ?>
" /><?php echo $this->_tpl_vars['emails']['Mail']; ?>

                                    </label>
                                <?php endforeach; endif; unset($_from); ?>

                                <div class="grey_area">
                                    <span onclick="$('#emails_newsletter input').prop('checked', true);" class="green_10">
                                        <?php echo $this->_tpl_vars['lang']['check_all']; ?>

                                    </span>
                                    <span class="divider"> | </span>
                                    <span onclick="$('#emails_newsletter input').prop('checked', false);" class="green_10">
                                        <?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>

                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (! empty ( $this->_tpl_vars['massmailer_form']['Recipients_accounts'] )): ?>
                    <div class="dark_13 mn_padding">
                        <a target="_blank"
                            href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&page=newsletter&subscribers=2">
                            <?php echo $this->_tpl_vars['lang']['massmailer_newsletter_site_accounts']; ?>
:
                        </a>

                        <ul class="clear_list">
                            <?php $_from = $this->_tpl_vars['massmailer_form']['Recipients_accounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['recipients_accounts']):
?>
                                <?php $this->assign('newKey', $this->_tpl_vars['recipients_accounts']['Key']); ?>
                                <script type="text/javascript">
                                    var $total_res = $total_res + <?php echo ((is_array($_tmp=$this->_tpl_vars['massmailer_form']['Recipients_accounts_count'][$this->_tpl_vars['newKey']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
;
                                </script>
                                <li><?php echo $this->_tpl_vars['recipients_accounts']['name']; ?>
 (<?php echo $this->_tpl_vars['massmailer_form']['Recipients_accounts_count'][$this->_tpl_vars['newKey']]; ?>
)
                                    <?php $this->assign('emails', $this->_tpl_vars['massmailer_form']['Recipients_accounts_emails'][$this->_tpl_vars['newKey']]); ?>

                                    <?php if (! empty ( $this->_tpl_vars['emails'] )): ?>
                                        <div class="emails" id="emails_<?php echo $this->_tpl_vars['newKey']; ?>
"
                                            style="margin: 10px; border: 1px #ccc solid; padding: 5px; font-weight: normal;">
                                            <?php $_from = $this->_tpl_vars['emails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['email']):
?>
                                                <label>
                                                    <input type="checkbox" name="emails[<?php echo $this->_tpl_vars['email']['Mail']; ?>
]" value="<?php echo $this->_tpl_vars['email']['Mail']; ?>
" />
                                                    <?php echo $this->_tpl_vars['email']['Mail']; ?>

                                                </label>
                                            <?php endforeach; endif; unset($_from); ?>

                                            <div class="grey_area">
                                                <span onclick="$('#emails_<?php echo $this->_tpl_vars['newKey']; ?>
 input').prop('checked', true);" class="green_10">
                                                    <?php echo $this->_tpl_vars['lang']['check_all']; ?>

                                                </span>
                                                <span class="divider"> | </span>
                                                <span onclick="$('#emails_<?php echo $this->_tpl_vars['newKey']; ?>
 input').prop('checked', false);" class="green_10">
                                                    <?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>

                                                </span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['massmailer_form']['Recipients_contact_us']): ?>
                    <div class="dark_13 mn_padding">
                        <a target="_blank"
                            href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&page=newsletter&subscribers=3">
                            <?php echo $this->_tpl_vars['lang']['massmailer_newsletter_contact_us']; ?>
 (<?php echo $this->_tpl_vars['massmailer_form']['Recipients_contact_us_count']['Count']; ?>
)</a>
                        <script type="text/javascript">
                            var $total_res = $total_res + <?php echo ((is_array($_tmp=$this->_tpl_vars['massmailer_form']['Recipients_contact_us_count']['Count'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
;
                        </script>

                        <?php if (! empty ( $this->_tpl_vars['massmailer_form']['Recipients_contact_us_emails'] )): ?>
                            <div class="emails" id="emails_contact_us"
                                style="margin: 10px; border: 1px #ccc solid; padding: 5px; font-weight: normal;">
                                <?php $_from = $this->_tpl_vars['massmailer_form']['Recipients_contact_us_emails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['emails']):
?>
                                    <label>
                                        <input type="checkbox" name="emails[<?php echo $this->_tpl_vars['email']['Mail']; ?>
]" value="<?php echo $this->_tpl_vars['emails']['Mail']; ?>
" />
                                        <?php echo $this->_tpl_vars['emails']['Mail']; ?>

                                    </label>
                                <?php endforeach; endif; unset($_from); ?>

                                <div class="grey_area">
                                    <span onclick="$('#emails_contact_us input').prop('checked', true);" class="green_10">
                                        <?php echo $this->_tpl_vars['lang']['check_all']; ?>

                                    </span>
                                    <span class="divider"> | </span>
                                    <span onclick="$('#emails_contact_us input').prop('checked', false);" class="green_10">
                                        <?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>

                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['subject']; ?>
:</td>
            <td class="value">
                <b><?php echo $this->_tpl_vars['massmailer_form']['Subject']; ?>
</b>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_body']; ?>
:</td>
            <td class="value topfix">
                <div class="mn_area"><?php echo $this->_tpl_vars['massmailer_form']['Body']; ?>
</div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="value">
                <input id="start_send" type="button" value="<?php echo $this->_tpl_vars['lang']['massmailer_newsletter_send']; ?>
" />
                <a style="padding: 0 0 0 10px"
                    href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&action=edit&massmailer=<?php echo $_GET['massmailer']; ?>
">
                    <?php echo $this->_tpl_vars['lang']['edit']; ?>

                </a>
            </td>
        </tr>
    </table>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'massmailer_newsletter/admin/send_interface.tpl') : smarty_modifier_cat($_tmp, 'massmailer_newsletter/admin/send_interface.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($_GET['page'] == 'newsletter'): ?>
    <!-- newsletter filter -->
    <div class="hide" id="filters">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['filter_by'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <table class="sTable">
            <tr>
                <td valign="top">
                    <table class="form">
                        <tr>
                            <td class="name w130"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
                            <td class="field"><input type="text" id="name" maxlength="40" /></td>
                        </tr>
                        <tr>
                            <td class="name w130"><?php echo $this->_tpl_vars['lang']['mail']; ?>
</td>
                            <td class="field"><input type="text" id="email" maxlength="50" /></td>
                        </tr>
                        <tr>
                            <td class="name w130"><?php echo $this->_tpl_vars['lang']['subscribed_from']; ?>
</td>
                            <td class="field">
                                <select id="subscribed_from">
                                    <option value=""><?php echo $this->_tpl_vars['lang']['any']; ?>
</option>
                                    <option value="1"><?php echo $this->_tpl_vars['lang']['massmailer_newsletter_newsletter']; ?>
</option>
                                    <option value="2"><?php echo $this->_tpl_vars['lang']['accounts']; ?>
</option>
                                    <option value="3"><?php echo $this->_tpl_vars['lang']['contacts']; ?>
</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="account_types" class="hide">
                            <td class="name w130"><?php echo $this->_tpl_vars['lang']['account_type']; ?>
</td>
                            <td class="field">
                                <select id="account_type">
                                    <option value=""><?php echo $this->_tpl_vars['lang']['any']; ?>
</option>
                                    <?php $_from = $this->_tpl_vars['account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['account_type']):
?>
                                        <option value="<?php echo $this->_tpl_vars['account_type']['Key']; ?>
"><?php echo $this->_tpl_vars['account_type']['name']; ?>
</option>
                                    <?php endforeach; endif; unset($_from); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="name w130"><?php echo $this->_tpl_vars['lang']['date']; ?>
</td>
                            <td class="field" style="white-space: nowrap;">
                                <input style="width: 65px;" type="text" value="" size="12" maxlength="10" id="date_from" />
                                <img class="divider" alt="" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
                                <input style="width: 65px;" type="text" value="" size="12" maxlength="10" id="date_to" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="field">
                                <input id="search_button" type="submit" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" />
                                <input type="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_filter_button" />

                                <a class="cancel" href="javascript:void(0)" onclick="show('filters')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <script type="text/javascript">
        var get_filter = 0;
        <?php if ($_GET['subscribers']): ?>
            get_filter = <?php echo $_GET['subscribers']; ?>
;
        <?php endif; ?>
        <?php echo '

            var sFields = new Array(\'name\', \'email\', \'subscribed_from\', \'account_type\', \'date_from\', \'date_to\');
            var cookie_filters = new Array();

            $(document).ready(function() {
                        if ($(\'select#subscribed_from option:selected\').val() == 2) {
                            $(\'tr#account_types\').show()
                        } else {
                            $(\'tr#account_types\').hide()
                        }

                        $(\'#subscribed_from\').change(function() {
                            if ($(this).val() == 2) {
                                $(\'tr#account_types\').show()
                            } else {
                                $(\'tr#account_types\').hide()
                            }
                        })

                        $(function() {
                                    $(\'#date_from\').datepicker({
                                        showOn: \'both\',
                                        buttonImage    : \''; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif\',
                                        buttonText     : \''; ?>
<?php echo $this->_tpl_vars['lang']['dp_choose_date']; ?>
<?php echo '\',
                                        buttonImageOnly: true,
                                        dateFormat: \'yy-mm-dd\'
                                        }).datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);

                                        $(\'#date_to\').datepicker({
                                            showOn: \'both\',
                                            buttonImage    : \''; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif\',
                                            buttonText     : \''; ?>
<?php echo $this->_tpl_vars['lang']['dp_choose_date']; ?>
<?php echo '\',
                                            buttonImageOnly: true,
                                            dateFormat: \'yy-mm-dd\'
                                            }).datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);
                                        });

                                        if (readCookie(\'newsletter_sc\')) {
                                            $(\'#filters\').show();
                                            cookie_filters = readCookie(\'newsletter_sc\').split(\',\');

                                            for (var i in cookie_filters) {
                                                if (typeof(cookie_filters[i]) == \'string\') {
                                                    var item = cookie_filters[i].split(\'||\');
                                                    $(\'#\' + item[0]).selectOptions(item[1]);
                                                }
                                            }

                                            cookie_filters.push(new Array(\'search\', 1));
                                        }

                                        $(\'#search_button\').click(function() {
                                            var sValues = new Array();
                                            var filters = new Array();
                                            var save_cookies = new Array();
                                            var counter = 0;

                                            for (var si = 0; si < sFields.length; si++) {
                                                if ($.trim($(\'#\' + sFields[si]).val()) != \'\' && $(\'#\' + sFields[si])
                                                    .val() != undefined) {
                                                    sValues[counter] = $(\'#\' + sFields[si]).val();
                                                    filters[counter] = new Array(sFields[si], $(\'#\' + sFields[si])
                                                        .val());
                                                    save_cookies[counter] = sFields[si] + \'||\' + $(\'#\' + sFields[
                                                        si]).val();
                                                    counter = counter + 1;
                                                }
                                            }

                                            // save search criteria
                                            createCookie(\'newsletter_sc\', save_cookies, 1);
                                            filters.push(new Array(\'filters\', 1));
                                            newsletterGrid.filters = filters;
                                            newsletterGrid.reload();

                                        });

                                        $(\'#reset_filter_button\').click(function() {
                                            eraseCookie(\'newsletter_sc\');
                                            newsletterGrid.reset();

                                            $("#search select option[value=\'\']").attr(\'selected\', true);
                                            $("#search input[type=text]").val(\'\');
                                        });

                                        if (get_filter > 0) {
                                            $(\'#filters\').show();
                                            cookie_filters = Array(\'subscribed_from||\' + get_filter);
                                            var item = cookie_filters[0].split(\'||\');
                                            $(\'#\' + item[0]).selectOptions(item[1]);

                                            cookie_filters.push(new Array(\'search\', 1));
                                        }
                                    })
                                '; ?>

    </script>
    <!-- newsletter grid -->
    <div id="grid"></div>
    <script type="text/javascript">
        <?php echo '
            var newsletterGrid;

            $(document).ready(function() {
                newsletterGrid = new gridObj({
                    key: \'newsletter\',
                    id: \'grid\',
                    ajaxUrl: rlPlugins + \'massmailer_newsletter/admin/massmailer_newsletter.inc.php?q=ext2\',
                    defaultSortField: \'Name\',
                    title: lang[\'ext_newsletter_manager\'],
                    filters: cookie_filters,
                    fields: [
                        {name: \'ID\', mapping: \'ID\'},
                        {name: \'Name\', mapping: \'Name\'},
                        {name: \'Mail\', mapping: \'Mail\'},
                        {name: \'Status\', mapping: \'Status\'},
                        {name: \'From\', mapping: \'From\'},
                        {name: \'dev_subscriber\', mapping: \'dev_subscriber\'},
                        {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d\'}
                    ],
                    columns: [{
                        header: lang[\'ext_name\'],
                        dataIndex: \'Name\',
                        id: \'rlExt_item_bold\',
                        width: 23
                    }, {
                        header: \''; ?>
<?php echo $this->_tpl_vars['lang']['subscribed_from']; ?>
<?php echo '\',
                        dataIndex: \'From\',
                        width: 14
                    }, {
                        header: lang[\'ext_email\'],
                        dataIndex: \'Mail\',
                        width: 250,
                        fixed: true
                    }, {
                        header: lang[\'ext_subscribe_date\'],
                        dataIndex: \'Date\',
                        width: 180,
                        fixed: true,
                        renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(
                            \'b\', \'M\'))
                    }, {
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
                            selectOnFocus: true,
                        })
                    }, {
                        header: lang[\'ext_actions\'],
                        width: 60,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(data, ext, row) {
                            var line_id = row.data[\'ID\'];
                            var sub_type = row.data[\'dev_subscriber\'];
                            var out = "<img class=\'remove\' ext:qtip=\'" + lang[\'ext_delete\'] +
                                "\' src=\'" + rlUrlHome;
                            out += "img/blank.gif\' onClick=\'rlConfirm( \\"" + lang[
                                \'ext_notice_delete\'];
                            out += "\\", \\"xajax_deleteSubscriber\\", Array(\\"" + line_id;
                            out += "\\", \\"" + sub_type + "\\"), \\"news_load\\" )\' />";

                            return out;
                        }
                    }]
                });

                newsletterGrid.init();
                grid.push(newsletterGrid.grid);

                newsletterGrid.grid.addListener(\'beforeedit\', function(editEvent) {
                    if (editEvent.record.data.dev_subscriber != \'subscribers\') {
                        editEvent.cancel = true;
                        newsletterGrid.store.rejectChanges();
                        Ext.MessageBox.alert(lang[\'ext_notice\'], lang[
                            \'ext_you_shouldnt_change_non_subscribers_users\']);
                    }
                });
            });
        '; ?>

    </script>
    <!-- newsletter grid end -->
<?php else: ?>
    <!-- massmailer grid -->
    <div id="grid"></div>
    <script type="text/javascript">
        <?php echo '
            var massmailerGrid;

            $(document).ready(function() {
                massmailerGrid = new gridObj({
                    key: \'massmailer\',
                    id: \'grid\',
                    ajaxUrl: rlPlugins + \'massmailer_newsletter/admin/massmailer_newsletter.inc.php?q=ext\',
                    defaultSortField: \'Name\',
                    title: lang[\'ext_massmailer_manager\'],
                    fields: [
                        {name: \'ID\', mapping: \'ID\'},
                        {name: \'Name\', mapping: \'Subject\'},
                        {name: \'Description\', mapping: \'Body\'},
                        {name: \'Status\', mapping: \'Status\'},
                        {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d\'}
                    ],
                    columns: [{
                        header: lang[\'ext_subject\'],
                        dataIndex: \'Name\',
                        id: \'rlExt_item_bold\',
                        width: 30
                    }, {
                        header: lang[\'ext_add_date\'],
                        dataIndex: \'Date\',
                        width: 120,
                        fixed: true,
                        renderer: function(val) {
                            return Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\')
                                .replace(\'b\', \'M\'))(val);
                        },
                    }, {
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        width: 90,
                        fixed: true,
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
                        width: 80,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(data) {
                            var out = "<a href=\'" + rlUrlHome + "index.php?controller=" +
                                controller;
                            out += "&action=send&massmailer=" + data +
                                "\'><img class=\'send\' ext:qtip=\'";
                            out += lang[\'ext_massmailer_send\'] + "\' src=\'" + rlUrlHome +
                                "img/blank.gif\' /></a>";
                            out += "<a href=\'" + rlUrlHome + "index.php?controller=" + controller;
                            out += "&action=edit&massmailer=" + data +
                                "\'><img class=\'edit\' ext:qtip=\'" + lang[\'ext_edit\'];
                            out += "\' src=\'" + rlUrlHome + "img/blank.gif\' /></a>" +
                                "<img class=\'remove\' ext:qtip=\'";
                            out += lang[\'ext_delete\'] + "\' src=\'" + rlUrlHome +
                                "img/blank.gif\' onclick=\'rlConfirm(\\"";
                            out += lang[\'ext_notice_\' + delete_mod] +
                                "\\", \\"xajax_deleteMassmailerNewsletter\\", \\"";
                            out += Array(data) + "\\", \\"section_load\\" )\' />";

                            return out;
                        }
                    }]
                });

                massmailerGrid.init();
                grid.push(massmailerGrid.grid);

            });

        '; ?>

    </script>
    <!-- massmailer grid end -->
<?php endif; ?>

<!-- massmailer/newsletter -->