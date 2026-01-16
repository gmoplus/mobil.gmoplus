<?php /* Smarty version 2.6.31, created on 2025-07-13 21:58:00
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/my_agents/my_agents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/my_agents/my_agents.tpl', 19, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/my_agents/my_agents.tpl', 20, false),array('function', 'paging', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/my_agents/my_agents.tpl', 87, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/my_agents/my_agents.tpl', 168, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/my_agents/my_agents.tpl', 19, false),array('modifier', 'date_format', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/my_agents/my_agents.tpl', 58, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/controllers/my_agents/my_agents.tpl', 87, false),)), $this); ?>
<!-- My Agents tpl -->

<div class="content-padding">
    <h2 class="mb-3"><?php echo $this->_tpl_vars['lang']['invite_for_new_agents']; ?>
</h2>

    <div class="mb-3">
        <form action="?send-invite=1" method="post" name="add-invite-form" class="row no-gutters">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <input class="w-100" type="text" placeholder="<?php echo $this->_tpl_vars['lang']['placeholder_invite_agent']; ?>
" name="agent-email"/>
            </div>

            <div class="col-md-4 mt-2 mt-md-0">
                <input type="submit" value="<?php echo $this->_tpl_vars['lang']['send']; ?>
" class="w-100 w-md-auto ml-0 ml-md-2" />
            </div>
        </form>
    </div>

    <?php if ($this->_tpl_vars['invites']): ?>
        <?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/popup/popup.css') : smarty_modifier_cat($_tmp, 'components/popup/popup.css'))), $this);?>

        <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/popup/_popup.js') : smarty_modifier_cat($_tmp, 'components/popup/_popup.js'))), $this);?>


        <h2 class="mb-3"><?php echo $this->_tpl_vars['lang']['invites']; ?>
</h2>

        <div class="invites list-table content-padding mb-5">
            <div class="header">
                <div class="center" style="width: 60px;"><?php echo $this->_tpl_vars['lang']['id']; ?>
</div>
                <div><?php echo $this->_tpl_vars['lang']['name']; ?>
/<?php echo $this->_tpl_vars['lang']['mail']; ?>
</div>
                <div><?php echo $this->_tpl_vars['lang']['date']; ?>
</div>
                <div><?php echo $this->_tpl_vars['lang']['status']; ?>
</div>
                <div><?php echo $this->_tpl_vars['lang']['actions']; ?>
</div>
            </div>

            <?php $_from = $this->_tpl_vars['invites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['invitesF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['invitesF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['invite']):
        $this->_foreach['invitesF']['iteration']++;
?>
                <div class="row">
                    <div data-caption="<?php echo $this->_tpl_vars['lang']['id']; ?>
" class="center"><?php echo $this->_tpl_vars['invite']['ID']; ?>
</div>
                    <div data-caption="<?php echo $this->_tpl_vars['lang']['name']; ?>
/<?php echo $this->_tpl_vars['lang']['mail']; ?>
" class="no-flex default">
                        <?php if ($this->_tpl_vars['invite']['Agent']['Full_name'] && $this->_tpl_vars['invite']['Agent']['Photo']): ?>
                            <a class="show-agent-thumbnail" href="javascript://" title="<?php echo $this->_tpl_vars['invite']['Agent']['Full_name']; ?>
">
                                <img src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['invite']['Agent']['Photo']; ?>
"
                                     alt="<?php echo $this->_tpl_vars['invite']['Agent']['Full_name']; ?>
"
                                     <?php if ($this->_tpl_vars['invite']['Agent']['Photo_x2']): ?>
                                        data-x2="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['invite']['Agent']['Photo_x2']; ?>
"
                                     <?php endif; ?>
                                     width="32"
                                     height="32"
                                     style="object-fit: cover"
                                >
                            </a>
                        <?php endif; ?>

                        <?php if ($this->_tpl_vars['invite']['Agent']['Personal_address']): ?>
                            <a href="<?php echo $this->_tpl_vars['invite']['Agent']['Personal_address']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['invite']['Agent']['Full_name']; ?>
">
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['invite']['Agent']['Full_name']): ?><?php echo $this->_tpl_vars['invite']['Agent']['Full_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['invite']['Agent_Email']; ?>
<?php endif; ?>
                        <?php if ($this->_tpl_vars['invite']['Agent']['Personal_address']): ?></a><?php endif; ?>
                    </div>
                    <div data-caption="<?php echo $this->_tpl_vars['lang']['date']; ?>
" class="no-flex default">
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['invite']['Created_Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>

                    </div>
                    <div data-caption="<?php echo $this->_tpl_vars['lang']['status']; ?>
" class="no-flex default statuses">
                        <?php if ($this->_tpl_vars['invite']['Status'] === 'accepted'): ?>
                            <?php $this->assign('inviteStatus', 'active'); ?>
                        <?php elseif ($this->_tpl_vars['invite']['Status'] === 'declined'): ?>
                            <?php $this->assign('inviteStatus', 'expired'); ?>
                        <?php else: ?>
                            <?php $this->assign('inviteStatus', $this->_tpl_vars['invite']['Status']); ?>
                        <?php endif; ?>

                        <span class="<?php echo $this->_tpl_vars['inviteStatus']; ?>
"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['invite']['Status']]; ?>
</span>

                        <?php if ($this->_tpl_vars['invite']['Status'] === 'accepted'): ?>
                            (<?php echo ((is_array($_tmp=$this->_tpl_vars['invite']['Accepted_Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
)
                        <?php elseif ($this->_tpl_vars['invite']['Status'] === 'declined'): ?>
                            (<?php echo ((is_array($_tmp=$this->_tpl_vars['invite']['Declined_Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
)
                        <?php endif; ?>
                    </div>
                    <div data-caption="<?php echo $this->_tpl_vars['lang']['actions']; ?>
" class="no-flex default">
                        <?php if ($this->_tpl_vars['invite']['Status'] === 'pending'): ?>
                            <a class="invite__resend" data-id="<?php echo $this->_tpl_vars['invite']['ID']; ?>
" href="javascript:"><?php echo $this->_tpl_vars['lang']['resend_invite']; ?>
</a> |
                        <?php endif; ?>
                        <a class="red invite__remove" data-id="<?php echo $this->_tpl_vars['invite']['ID']; ?>
" href="javascript:"><?php echo $this->_tpl_vars['lang']['remove']; ?>
</a>
                    </div>
                </div>
            <?php endforeach; endif; unset($_from); ?>
        </div>

        <?php echo $this->_plugins['function']['paging'][0][0]->paging(array('calc' => $this->_tpl_vars['pInfo']['calc'],'total' => count($this->_tpl_vars['invites']),'current' => $this->_tpl_vars['pInfo']['current'],'per_page' => $this->_tpl_vars['config']['dealers_per_page'],'url' => $this->_tpl_vars['pInfo']['paginationUrl']), $this);?>

    <?php else: ?>
        <div class="info"><?php echo $this->_tpl_vars['lang']['no_agents']; ?>
</div>
    <?php endif; ?>
</div>

<script class="fl-js-dynamic">
    lang.mail              = '<?php echo $this->_tpl_vars['lang']['mail']; ?>
';
    lang.notice_field_empty = '<?php echo $this->_tpl_vars['lang']['notice_field_empty']; ?>
';
    lang.notice_bad_email  = '<?php echo $this->_tpl_vars['lang']['notice_bad_email']; ?>
';

    <?php echo '
    $(function () {
        $(\'form[name="add-invite-form"]\').submit(function () {
            let $email  = $(\'[name="agent-email"]\'), error;

            if ($email.val() === \'\') {
                error = lang.notice_field_empty.replace(\'{field}\', `<b>"${lang.mail}"</b>`);
                printMessage(\'error\', error, \'agent-email\');
                return false;
            } else if (!flUtil.isEmail($email.val())) {
                error = lang.notice_bad_email.replace(\'{field}\', `<b>"${lang.mail}"</b>`);
                printMessage(\'error\', error, \'agent-email\');
                return false;
            }

            $(this).find(\'[type="submit"]\').val(lang.loading).addClass(\'disabled\').prop(\'disabled\', true);
        });

        '; ?>
<?php if ($this->_tpl_vars['invites']): ?><?php echo '
            $(\'a.invite__resend\').popup({
                caption: lang.notice,
                content: lang.resend_confirm,
                navigation: {
                    okButton: {
                        text: lang.resend_invite,
                        onClick: function(popup) {
                            let $okButton = $(this);
                            $okButton.val(lang.loading).addClass(\'disabled\').prop(\'disabled\', true);

                            flUtil.ajax(
                                {mode: \'resendAgentInvite\', id: popup.$element.data(\'id\')},
                                function(response, status) {
                                    $okButton.val(lang.resend_invite).removeClass(\'disabled\').removeProp(\'disabled\');

                                    if (status === \'success\' && response.status === \'OK\') {
                                        printMessage(\'notice\', lang.invite_resent_successfully);
                                    } else {
                                        printMessage(\'error\', lang.system_error);
                                    }

                                    popup.close();
                                }
                            );
                        }
                    },
                    cancelButton: {text: lang.cancel}
                }
            });

            $(\'a.invite__remove\').popup({
                caption: lang.notice,
                content: lang.delete_invite_confirmation,
                navigation: {
                    okButton: {
                        text: lang.delete,
                        onClick: function(popup) {
                            let $okButton = $(this);
                            $okButton.val(lang.loading).addClass(\'disabled\').prop(\'disabled\', true);

                            flUtil.ajax(
                                {mode: \'deleteAgentInvite\', id: popup.$element.data(\'id\')},
                                function(response, status) {
                                    $okButton.val(lang.delete).removeClass(\'disabled\').removeProp(\'disabled\');

                                    if (status === \'success\' && response.status === \'OK\') {
                                        location.href = \''; ?>
<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'my_agents'), $this);?>
<?php echo '\';
                                    } else {
                                        printMessage(\'error\', lang.system_error);
                                    }

                                    popup.close();
                                }
                            );
                        }
                    },
                    cancelButton: {text: lang.cancel}
                }
            });
        '; ?>
<?php endif; ?><?php echo '

        $(\'.show-agent-thumbnail\').click(function () {
            let $img = $(this).find(\'img\');
            let photoSource = $img.data(\'x2\') ? $img.data(\'x2\') : $img.attr(\'src\');

            $img.popup({
                click  : false,
                caption: $img.attr(\'alt\'),
                content: $(\'<img>\', {src: photoSource, width: \'200px\', height: \'100%\'}),
            });
        });
    });
'; ?>
</script>

<!-- My Agents tpl end -->