<?php /* Smarty version 2.6.31, created on 2025-07-12 17:24:22
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 16, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 33, false),array('modifier', 'df', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 148, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 338, false),array('modifier', 'array_search', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 338, false),array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 375, false),array('modifier', 'pathinfo', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 376, false),array('modifier', 'files', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 399, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 447, false),array('function', 'customFieldHandler', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 42, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 315, false),array('function', 'math', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 328, false),array('function', 'getTmpFile', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 436, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 477, false),array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field.tpl', 478, false),)), $this); ?>
<!-- fields block -->

<script>if (typeof window.textarea_fields == 'undefined') window.textarea_fields = new Array();</script>

<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
    <?php if ($this->_tpl_vars['field']['Add_page']): ?>
        <?php $this->assign('fKey', $this->_tpl_vars['field']['Key']); ?>
        <?php $this->assign('fVal', $_POST['f']); ?>

        <?php $this->assign('cell_class', 'single-field'); ?>
        <?php if ($this->_tpl_vars['field']['Type'] == 'price' || $this->_tpl_vars['field']['Type'] == 'mixed'): ?>
            <?php $this->assign('cell_class', 'combo-field'); ?>
        <?php elseif ($this->_tpl_vars['field']['Type'] == 'checkbox'): ?>
            <?php $this->assign('cell_class', 'checkbox-field'); ?>
        <?php elseif ($this->_tpl_vars['field']['Type'] == 'radio'): ?>
            <?php if (count($this->_tpl_vars['field']['Values']) <= 2): ?>
                <?php $this->assign('cell_class', 'inline-fields'); ?>
            <?php else: ?>
                <?php $this->assign('cell_class', 'checkbox-field'); ?>
            <?php endif; ?>
        <?php elseif ($this->_tpl_vars['field']['Type'] == 'bool'): ?>
            <?php $this->assign('cell_class', 'inline-fields'); ?>
        <?php elseif ($this->_tpl_vars['field']['Type'] == 'date'): ?>
            <?php $this->assign('cell_class', 'two-fields'); ?>
        <?php elseif ($this->_tpl_vars['field']['Key'] == 'Category_ID' && $this->_tpl_vars['listing_types'][$this->_tpl_vars['group']['Listing_type']]['Search_multi_categories']): ?>
            <?php $this->assign('levels_number', $this->_tpl_vars['listing_types'][$this->_tpl_vars['group']['Listing_type']]['Search_multicat_levels']); ?>
            <?php if ($this->_tpl_vars['levels_number'] == 2): ?>
                <?php $this->assign('cell_class', 'two-fields'); ?>
            <?php elseif ($this->_tpl_vars['levels_number'] > 2): ?>
                <?php $this->assign('cell_class', 'three-field'); ?>
            <?php endif; ?>
        <?php elseif ($this->_tpl_vars['field']['Type'] == 'phone'): ?>
            <?php $this->assign('cell_class', ((is_array($_tmp=$this->_tpl_vars['cell_class'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' phone') : smarty_modifier_cat($_tmp, ' phone'))); ?>
        <?php elseif ($this->_tpl_vars['field']['Type'] == 'accept'): ?>
            <?php $this->assign('cell_class', 'inline-fields'); ?>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['field']['Map'] && $this->_tpl_vars['account_address'][$this->_tpl_vars['field']['Key']]): ?>
            <input type="hidden" class="on_map_data" data-field-key="<?php echo $this->_tpl_vars['field']['Key']; ?>
" value="<?php echo $this->_tpl_vars['account_address'][$this->_tpl_vars['field']['Key']]; ?>
" />
        <?php endif; ?>

        <?php echo $this->_plugins['function']['customFieldHandler'][0][0]->customFieldHandler(array('field' => $this->_tpl_vars['field'],'assign' => 'use_custom'), $this);?>


        <?php $this->assign('default_value', ''); ?>

        <?php if (! $this->_tpl_vars['use_custom']): ?>
            <div class="submit-cell"<?php if ($this->_tpl_vars['field']['Required']): ?> data-required="true"<?php endif; ?>>
                <div class="name">
                    <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pName']]; ?>

                    <?php if ($this->_tpl_vars['field']['Required']): ?>
                        <span class="red">&nbsp;*</span>
                    <?php endif; ?>
                    <?php if (! empty ( $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pDescription']] )): ?>
                        <img class="qtip" alt="" title="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pDescription']]; ?>
" id="fd_<?php echo $this->_tpl_vars['field']['Key']; ?>
" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
                    <?php endif; ?>
                </div>
                <div class="field <?php echo $this->_tpl_vars['cell_class']; ?>
<?php if ($this->_tpl_vars['field']['Map'] && $this->_tpl_vars['field']['Key'] != 'account_address_on_map'): ?> on_map<?php endif; ?>" id="sf_field_<?php echo $this->_tpl_vars['field']['Key']; ?>
">

                <?php if ($this->_tpl_vars['field']['Type'] == 'text'): ?>
                    <?php if (( $this->_tpl_vars['field']['Multilingual'] && count($this->_tpl_vars['languages']) > 1 ) || is_array ( $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']] )): ?>
                        <ul class="tabs tabs-hash">
                            <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                                <li lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" <?php if (($this->_foreach['langF']['iteration'] <= 1)): ?>class="active"<?php endif; ?>>
                                    <a href="#<?php echo $this->_tpl_vars['fKey']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
" data-target="<?php echo $this->_tpl_vars['fKey']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php echo $this->_tpl_vars['language']['name']; ?>
</a>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                        <div class="ml_tabs_content light-inputs">
                            <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                            <div lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" <?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?>class="hide"<?php endif; ?> id="area_<?php echo $this->_tpl_vars['fKey']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
">
                                <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']][$this->_tpl_vars['language']['Code']]): ?>
                                    <?php $this->assign('default_value', $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']][$this->_tpl_vars['language']['Code']]); ?>
                                <?php elseif ($this->_tpl_vars['field']['pMultiDefault']): ?>
                                    <?php $this->assign('default_value', $this->_tpl_vars['field']['pMultiDefault'][$this->_tpl_vars['language']['Code']]); ?>
                                <?php elseif ($this->_tpl_vars['field']['Default'] && $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pDefault']]): ?>
                                    <?php $this->assign('default_value', $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pDefault']]); ?>
                                <?php else: ?>
                                    <?php $this->assign('default_value', ''); ?>
                                <?php endif; ?>

                                <input type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][<?php echo $this->_tpl_vars['language']['Code']; ?>
]" maxlength="<?php if ($this->_tpl_vars['field']['Values'] != ''): ?><?php echo $this->_tpl_vars['field']['Values']; ?>
<?php else: ?>255<?php endif; ?>" value="<?php echo $this->_tpl_vars['default_value']; ?>
" />
                            </div>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                    <?php else: ?>
                        <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]): ?>
                            <?php $this->assign('default_value', $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]); ?>
                        <?php elseif ($this->_tpl_vars['field']['Default']): ?>
                            <?php $this->assign('default_value', $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pDefault']]); ?>
                        <?php endif; ?>
                        <input type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]" <?php if ($this->_tpl_vars['field']['Values'] < 100): ?>size="<?php echo $this->_tpl_vars['field']['Values']; ?>
" class="wauto"<?php endif; ?> maxlength="<?php if ($this->_tpl_vars['field']['Values'] != ''): ?><?php echo $this->_tpl_vars['field']['Values']; ?>
<?php else: ?>255<?php endif; ?>" value="<?php echo $this->_tpl_vars['default_value']; ?>
" />
                    <?php endif; ?>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'textarea'): ?>
                    <?php if (( $this->_tpl_vars['field']['Multilingual'] && count($this->_tpl_vars['languages']) > 1 ) || is_array ( $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']] )): ?>
                        <ul class="tabs tabs-hash">
                            <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                                <li lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" <?php if (($this->_foreach['langF']['iteration'] <= 1)): ?>class="active"<?php endif; ?>>
                                    <a href="#<?php echo $this->_tpl_vars['fKey']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
" data-target="<?php echo $this->_tpl_vars['fKey']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php echo $this->_tpl_vars['language']['name']; ?>
</a>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                        <div class="ml_tabs_content">
                            <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                            <div lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" <?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?>class="hide"<?php endif; ?> id="area_<?php echo $this->_tpl_vars['fKey']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
">
                                <textarea data-type="<?php echo $this->_tpl_vars['field']['Condition']; ?>
" rows="5" cols="" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][<?php echo $this->_tpl_vars['language']['Code']; ?>
]" id="textarea_<?php echo $this->_tpl_vars['field']['Key']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php echo ''; ?><?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']][$this->_tpl_vars['language']['Code']]): ?><?php echo ''; ?><?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']][$this->_tpl_vars['language']['Code']]; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</textarea>

                                <script>
                                if (!window.textarea_fields['textarea_<?php echo $this->_tpl_vars['field']['Key']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
']) <?php echo ' { '; ?>

                                    window.textarea_fields['textarea_<?php echo $this->_tpl_vars['field']['Key']; ?>
_<?php echo $this->_tpl_vars['language']['Code']; ?>
'] = <?php echo ' { '; ?>

                                        type: '<?php echo $this->_tpl_vars['field']['Condition']; ?>
',
                                        length: '<?php echo $this->_tpl_vars['field']['Values']; ?>
'
                                    <?php echo ' } '; ?>
;
                                <?php echo ' } '; ?>
;
                                </script>
                            </div>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                    <?php else: ?>
                        <textarea data-type="<?php echo $this->_tpl_vars['field']['Condition']; ?>
" rows="5" cols="" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]" id="textarea_<?php echo $this->_tpl_vars['field']['Key']; ?>
"><?php echo ''; ?><?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]): ?><?php echo ''; ?><?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]; ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['field']['Default']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pDefault']]; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</textarea>

                        <script>
                        if (!window.textarea_fields['textarea_<?php echo $this->_tpl_vars['field']['Key']; ?>
']) <?php echo ' { '; ?>

                            window.textarea_fields['textarea_<?php echo $this->_tpl_vars['field']['Key']; ?>
'] = <?php echo ' { '; ?>

                                type: '<?php echo $this->_tpl_vars['field']['Condition']; ?>
',
                                length: '<?php echo $this->_tpl_vars['field']['Values']; ?>
'
                            <?php echo ' } '; ?>
;
                        <?php echo ' } '; ?>
;
                        </script>
                    <?php endif; ?>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'number'): ?>
                    <input class="numeric wauto" type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]" size="<?php if ($this->_tpl_vars['field']['Values']): ?><?php echo $this->_tpl_vars['field']['Values']; ?>
<?php else: ?>18<?php endif; ?>" maxlength="<?php if ($this->_tpl_vars['field']['Values']): ?><?php echo $this->_tpl_vars['field']['Values']; ?>
<?php else: ?>18<?php endif; ?>" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]): ?>value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]; ?>
"<?php endif; ?> />
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'phone'): ?>
                    <span class="phone-field" dir="ltr">
                        <?php if ($this->_tpl_vars['field']['Opt1']): ?>
                            + <input type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][code]" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['code']): ?>value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['code']; ?>
"<?php endif; ?> maxlength="4" size="3" class="wauto ta-center numeric" /> -&nbsp;
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['field']['Condition']): ?>
                            <?php $this->assign('df_source', ((is_array($_tmp=$this->_tpl_vars['field']['Condition'])) ? $this->_run_mod_handler('df', true, $_tmp) : smarty_modifier_df($_tmp))); ?>
                            <select name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][area]">
                                <?php $_from = $this->_tpl_vars['df_source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['df_key'] => $this->_tpl_vars['df_item']):
?>
                                    <option value="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['df_item']['pName']]; ?>
" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['area']): ?><?php if ($this->_tpl_vars['lang'][$this->_tpl_vars['df_item']['pName']] == $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['area']): ?>selected="selected"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['df_item']['Default']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['df_item']['pName']]; ?>
</option>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                        <?php else: ?>
                            <input type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][area]" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['area']): ?>value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['area']; ?>
"<?php endif; ?> maxlength="<?php echo $this->_tpl_vars['field']['Default']; ?>
" size="<?php echo $this->_tpl_vars['field']['Default']; ?>
" class="ta-center numeric" />
                        <?php endif; ?>
                        &nbsp;-&nbsp;
                        <input type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][number]" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['number']): ?>value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['number']; ?>
"<?php endif; ?> maxlength="<?php echo $this->_tpl_vars['field']['Values']; ?>
" size="<?php echo $this->_tpl_vars['field']['Values']+2; ?>
" class="ta-center numeric" />
                        <?php if ($this->_tpl_vars['field']['Opt2']): ?>
                            &nbsp;<?php echo $this->_tpl_vars['lang']['phone_ext_out']; ?>
 <input type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][ext]" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['ext']): ?>value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['ext']; ?>
"<?php endif; ?> maxlength="4" size="3" class="ta-center" />
                        <?php endif; ?>
                    </span>

                    <?php if ($this->_tpl_vars['field']['Opt3'] && ( $this->_tpl_vars['config']['whatsapp_phone_icon'] || $this->_tpl_vars['config']['viber_phone_icon'] || $this->_tpl_vars['config']['telegram_phone_icon'] )): ?>
                        <div class="phone-messengers mt-3 mb-3">
                            <?php if ($this->_tpl_vars['config']['whatsapp_phone_icon']): ?>
                                <span class="custom-input d-block phone-messengers__whatsapp">
                                    <label title="<?php echo $this->_tpl_vars['lang']['profile_has_whatsapp']; ?>
">
                                        <input type="checkbox"
                                               <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['messengers']['whatsapp']): ?>checked="checked"<?php endif; ?>
                                               value="<?php echo $this->_tpl_vars['_phoneMessengers']['whatsapp']; ?>
"
                                               name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][messengers][whatsapp]"
                                        />
                                        <?php echo $this->_tpl_vars['lang']['profile_has_whatsapp']; ?>

                                    </label>
                                </span>
                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['config']['viber_phone_icon']): ?>
                                <span class="custom-input d-block mt-2 phone-messengers__viber">
                                    <label title="<?php echo $this->_tpl_vars['lang']['profile_has_viber']; ?>
">
                                        <input type="checkbox"
                                               <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['messengers']['viber']): ?>checked="checked"<?php endif; ?>
                                               value="<?php echo $this->_tpl_vars['_phoneMessengers']['viber']; ?>
"
                                               name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][messengers][viber]"
                                        />
                                        <?php echo $this->_tpl_vars['lang']['profile_has_viber']; ?>

                                    </label>
                                </span>
                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['config']['telegram_phone_icon']): ?>
                                <span class="custom-input d-block mt-2 phone-messengers__telegram">
                                    <label title="<?php echo $this->_tpl_vars['lang']['profile_has_telegram']; ?>
">
                                        <input type="checkbox"
                                               <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['messengers']['telegram']): ?>checked="checked"<?php endif; ?>
                                               value="<?php echo $this->_tpl_vars['_phoneMessengers']['telegram']; ?>
"
                                               name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][messengers][telegram]"
                                        />
                                        <?php echo $this->_tpl_vars['lang']['profile_has_telegram']; ?>

                                    </label>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'date'): ?>
                    <?php if ($this->_tpl_vars['field']['Default'] == 'single'): ?>
                        <input class="date"
                            type="text"
                            id="date_<?php echo $this->_tpl_vars['field']['Key']; ?>
"
                            name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]"
                            maxlength="10"
                            value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]; ?>
"
                            autocomplete="off" />

                        <script class="fl-js-dynamic"><?php echo '
                        $(document).ready(function(){
                            $(\'#date_'; ?>
<?php echo $this->_tpl_vars['field']['Key']; ?>
<?php echo '\')
                                .datepicker({
                                    showOn     : \'focus\',
                                    dateFormat : \'yy-mm-dd\',
                                    changeMonth: true,
                                    changeYear : true,
                                    yearRange  : \'-100:+30\'
                                })
                                .datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);
                        });
                        '; ?>
</script>
                    <?php elseif ($this->_tpl_vars['field']['Default'] == 'multi'): ?>
                        <input placeholder="<?php echo $this->_tpl_vars['lang']['from']; ?>
"
                            class="date"
                            type="text"
                            id="date_<?php echo $this->_tpl_vars['field']['Key']; ?>
_from"
                            name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][from]"
                            maxlength="10"
                            value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['from']; ?>
"
                            autocomplete="off" />

                        <input placeholder="<?php echo $this->_tpl_vars['lang']['to']; ?>
"
                            class="date"
                            type="text"
                            id="date_<?php echo $this->_tpl_vars['field']['Key']; ?>
_to"
                            name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][to]"
                            maxlength="10"
                            value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['to']; ?>
"
                            autocomplete="off" />

                        <script class="fl-js-dynamic"><?php echo '
                        $(document).ready(function(){
                            $(\'#date_'; ?>
<?php echo $this->_tpl_vars['field']['Key']; ?>
<?php echo '_from\')
                                .datepicker({
                                    showOn     : \'focus\',
                                    dateFormat : \'yy-mm-dd\',
                                    changeMonth: true,
                                    changeYear : true,
                                    yearRange  : \'-100:+30\'
                                })
                                .datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);

                            $(\'#date_'; ?>
<?php echo $this->_tpl_vars['field']['Key']; ?>
<?php echo '_to\')
                                .datepicker({
                                    showOn     : \'focus\',
                                    dateFormat : \'yy-mm-dd\',
                                    changeMonth: true,
                                    changeYear : true,
                                    yearRange  : \'-100:+30\'
                                })
                                .datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);
                        });
                        '; ?>
</script>
                    <?php endif; ?>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'mixed' || $this->_tpl_vars['field']['Type'] == 'unit'): ?>
                    <input class="numeric" type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][value]" size="8" maxlength="15" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['value']): ?>value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['value']; ?>
"<?php endif; ?> />
                    <?php if (! empty ( $this->_tpl_vars['field']['Condition'] )): ?>
                        <?php $this->assign('df_source', ((is_array($_tmp=$this->_tpl_vars['field']['Condition'])) ? $this->_run_mod_handler('df', true, $_tmp) : smarty_modifier_df($_tmp))); ?>
                    <?php else: ?>
                        <?php $this->assign('df_source', $this->_tpl_vars['field']['Values']); ?>
                    <?php endif; ?>

                    <?php if ($this->_tpl_vars['df_source'] && count($this->_tpl_vars['df_source']) > 1): ?>
                        <select name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][df]">
                            <?php $_from = $this->_tpl_vars['df_source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['df_key'] => $this->_tpl_vars['df_item']):
?>
                                <option value="<?php echo $this->_tpl_vars['df_item']['Key']; ?>
" <?php if (( $this->_tpl_vars['df_item']['Key'] == $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['df'] ) || ( ! $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['df'] && $this->_tpl_vars['df_item']['Default'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['df_item']['pName']]; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    <?php else: ?>
                        <input type="hidden" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][df]" value="<?php $_from = $this->_tpl_vars['df_source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mItem']):
?><?php echo $this->_tpl_vars['mItem']['Key']; ?>
<?php $this->assign('mixed_cur_val', $this->_tpl_vars['mItem']['pName']); ?><?php break; ?><?php endforeach; endif; unset($_from); ?>" />
                        <span><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['mixed_cur_val']]; ?>
</span>
                    <?php endif; ?>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'price'): ?>
                    <?php $this->assign('currency', ((is_array($_tmp='currency')) ? $this->_run_mod_handler('df', true, $_tmp) : smarty_modifier_df($_tmp))); ?>
                    <input class="numeric" type="text" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][value]" size="8" maxlength="15" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['value']): ?>value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['value']; ?>
"<?php endif; ?> />
                    <?php if ($this->_tpl_vars['currency'] && count($this->_tpl_vars['currency']) > 1): ?>
                        <select name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][currency]">
                            <?php $_from = $this->_tpl_vars['currency']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['currency_item']):
?>
                                <option value="<?php echo $this->_tpl_vars['currency_item']['Key']; ?>
" <?php if (( $this->_tpl_vars['currency_item']['Key'] == $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['currency'] ) || ( ! $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]['currency'] && $this->_tpl_vars['currency_item']['Default'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['currency_item']['pName']]; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    <?php else: ?>
                        <input type="hidden" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][currency]" value="<?php $_from = $this->_tpl_vars['currency']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cItem']):
?><?php echo $this->_tpl_vars['cItem']['Key']; ?>
<?php $this->assign('price_cur_val', $this->_tpl_vars['cItem']['name']); ?><?php break; ?><?php endforeach; endif; unset($_from); ?>" />
                        <span><?php echo $this->_tpl_vars['price_cur_val']; ?>
</span>
                    <?php endif; ?>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'bool'): ?>
                    <span class="custom-input">
                        <label>
                            <input type="radio" value="1" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']] == '1'): ?>checked="checked"<?php elseif ($this->_tpl_vars['field']['Default']): ?>checked="checked"<?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['yes']; ?>

                        </label>
                    </span>
                    <span class="custom-input">
                        <label>
                            <input type="radio" value="0" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']] == '0'): ?>checked="checked"<?php elseif (! $this->_tpl_vars['field']['Default'] && ! $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]): ?>checked="checked"<?php endif; ?>/>
                            <?php echo $this->_tpl_vars['lang']['no']; ?>

                        </label>
                    </span>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'select'): ?>
                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplListingFieldSelect'), $this);?>

                    <select class="<?php if ($this->_tpl_vars['field']['Key'] == 'year'): ?>w120<?php endif; ?><?php if ($this->_tpl_vars['field']['Autocomplete']): ?> select-autocomplete<?php endif; ?>" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]">
                        <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>

                        <?php $_from = $this->_tpl_vars['field']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['option']):
?>
                            <?php if ($this->_tpl_vars['field']['Condition']): ?>
                                <?php $this->assign('key', $this->_tpl_vars['option']['Key']); ?>
                            <?php endif; ?>
                            <option value="<?php if ($this->_tpl_vars['field']['Condition']): ?><?php echo $this->_tpl_vars['option']['Key']; ?>
<?php else: ?><?php echo $this->_tpl_vars['key']; ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]): ?><?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']] == $this->_tpl_vars['key']): ?>selected="selected"<?php endif; ?><?php else: ?><?php if (( $this->_tpl_vars['field']['Default'] == $this->_tpl_vars['key'] ) || $this->_tpl_vars['option']['Default']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php if ($this->_tpl_vars['field']['Condition'] == 'years'): ?><?php echo $this->_tpl_vars['option']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['option']['pName']]; ?>
<?php endif; ?></option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'checkbox'): ?>
                    <?php $this->assign('fDefault', $this->_tpl_vars['field']['Default']); ?>
                    <?php if ($this->_tpl_vars['field']['Opt2']): ?><?php echo smarty_function_math(array('assign' => 'col_count','equation' => '12 / opt','opt' => $this->_tpl_vars['field']['Opt2']), $this);?>
<?php endif; ?>
                    <input type="hidden" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][0]" value="0" />

                    <div class="row">
                    <?php $_from = $this->_tpl_vars['field']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['checkboxF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['checkboxF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['option']):
        $this->_foreach['checkboxF']['iteration']++;
?>
                        <?php if ($this->_tpl_vars['field']['Condition']): ?>
                            <?php $this->assign('key', $this->_tpl_vars['option']['Key']); ?>
                        <?php endif; ?>
                        <span class="custom-input col-xs-12 <?php if ($this->_tpl_vars['col_count']): ?>col-sm-<?php echo $this->_tpl_vars['col_count']; ?>
<?php else: ?>col-lg-4 col-md-6 col-sm-4<?php endif; ?>">
                            <label title="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['option']['pName']]; ?>
">
                                    <input type="checkbox" <?php if (is_array ( $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']] )): ?><?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]) : in_array($_tmp, $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]))): ?>checked="checked"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['option']['Default'] || ( $this->_tpl_vars['field']['Default'] && is_numeric ( ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('array_search', true, $_tmp, $this->_tpl_vars['field']['Default']) : array_search($_tmp, $this->_tpl_vars['field']['Default'])) ) )): ?>checked="checked"<?php endif; ?><?php endif; ?> value="<?php echo $this->_tpl_vars['key']; ?>
" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
][<?php echo $this->_tpl_vars['key']; ?>
]" />
                                <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['option']['pName']]; ?>

                            </label>
                        </span>
                    <?php endforeach; endif; unset($_from); ?>
                    </div>

                    <div class="checkbox_bar"><a href="javascript:void(0)" onclick="$(this).parent().prev().find('input[type=checkbox]').prop('checked', true)"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</a> / <a onclick="$(this).parent().prev().find('input[type=checkbox]').prop('checked', false)" href="javascript:void(0)"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</a></div>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'radio'): ?>
                    <input type="hidden" value="0" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]" />

                    <?php if ($this->_tpl_vars['field']['Values'] && count($this->_tpl_vars['field']['Values']) > 2): ?><div class="row"><?php endif; ?>
                    <?php $_from = $this->_tpl_vars['field']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['checkboxF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['checkboxF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['option']):
        $this->_foreach['checkboxF']['iteration']++;
?>
                        <?php if ($this->_tpl_vars['field']['Condition']): ?>
                            <?php $this->assign('key', $this->_tpl_vars['option']['Key']); ?>
                        <?php endif; ?>

                        <span class="custom-input<?php if ($this->_tpl_vars['field']['Values'] && count($this->_tpl_vars['field']['Values']) > 2): ?> col-xs-12 col-sm-6 col-md-4<?php endif; ?>">
                            <label title="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['option']['pName']]; ?>
">
                                <input type="radio" value="<?php echo $this->_tpl_vars['key']; ?>
" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]" <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]): ?><?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']] == $this->_tpl_vars['key']): ?>checked="checked"<?php endif; ?><?php else: ?><?php if (( $this->_tpl_vars['field']['Default'] == $this->_tpl_vars['key'] ) || $this->_tpl_vars['option']['Default']): ?>checked="checked"<?php endif; ?><?php endif; ?> />
                                <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['option']['pName']]; ?>

                            </label>
                        </span>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php if ($this->_tpl_vars['field']['Values'] && count($this->_tpl_vars['field']['Values']) > 2): ?></div><?php endif; ?>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'file' || $this->_tpl_vars['field']['Type'] == 'image'): ?>
                    <?php $this->assign('field_value', ''); ?>

                    <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]): ?>
                        <?php $this->assign('field_value', $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]); ?>
                    <?php elseif ($_POST['f_sys_exist'][$this->_tpl_vars['fKey']]): ?>
                        <?php $this->assign('field_value', $_POST['f_sys_exist'][$this->_tpl_vars['fKey']]); ?>
                    <?php endif; ?>

                    <?php if ($this->_tpl_vars['field_value']): ?>
                        <?php if ($this->_tpl_vars['field']['Opt1']): ?>
                            <div class="uploaded-files d-flex mb-4 flex-wrap">
                                <?php $_from = ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['field_value']) : explode($_tmp, $this->_tpl_vars['field_value'])); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
                                    <?php $this->assign('file_info', ((is_array($_tmp=$this->_tpl_vars['file'])) ? $this->_run_mod_handler('pathinfo', true, $_tmp) : pathinfo($_tmp))); ?>
                                    <div class="d-flex flex-column uploaded-file mr-3 file-data"
                                         data-field="<?php echo $this->_tpl_vars['field']['Key']; ?>
"
                                         data-multipart="1"
                                         data-id="<?php echo $this->_tpl_vars['itemId']; ?>
"
                                         data-value="<?php echo $this->_tpl_vars['file']; ?>
"
                                         data-type="listing">
                                        <span class="uploaded-file__ext d-flex flex-column justify-content-center align-items-center hlight hborder">
                                            <?php echo $this->_tpl_vars['file_info']['extension']; ?>

                                            <a href="javascript://" class="remove-file">
                                                <img class="delete icon mt-2"
                                                     src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif"
                                                     alt=""
                                                     title="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" />
                                            </a>
                                        </span>
                                        <span class="font-size-xs">
                                            <a href="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['file']; ?>
" target="_blank" class="d-flex mt-1 text-center text-break justify-content-center"><?php echo $this->_tpl_vars['file_info']['filename']; ?>
</a>
                                        </span>
                                    </div>
                                <?php endforeach; endif; unset($_from); ?>
                            </div>
                        <?php else: ?>
                            <?php if (! ((is_array($_tmp=$this->_tpl_vars['field']['Key'])) ? $this->_run_mod_handler('files', true, $_tmp) : smarty_modifier_files($_tmp))): ?>
                                <div id="<?php echo $this->_tpl_vars['field']['Key']; ?>
_file"
                                    class="image-field-preview file-data"
                                    data-field="<?php echo $this->_tpl_vars['field']['Key']; ?>
"
                                    data-value="<?php echo $this->_tpl_vars['field_value']; ?>
"
                                    data-type="listing">
                                    <div class="relative fleft">
                                        <input type="hidden" name="f[sys_exist_<?php echo $this->_tpl_vars['field']['Key']; ?>
]" value="<?php echo $this->_tpl_vars['field_value']; ?>
" />

                                        <div class="fleft" style="margin-bottom: 5px;">
                                            <div>
                                                <table class="sTable">
                                                    <tr>
                                                        <td><?php echo $this->_tpl_vars['lang']['currently_uploaded_file']; ?>
</td>
                                                        <td class="ralign">
                                                            <a href="javascript://" id="delete_<?php echo $this->_tpl_vars['field']['Key']; ?>
" class="remove-file">
                                                                <?php echo $this->_tpl_vars['lang']['remove']; ?>

                                                                <img id="delete_<?php echo $this->_tpl_vars['field']['Key']; ?>
" class="delete icon"
                                                                src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" alt="" title="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" />
                                                            </a>
                                                        </td></tr>
                                                </table>
                                            </div>
                                            <span style="font-style:italic;" class="dark_13" title="<?php echo $this->_tpl_vars['field_value']; ?>
">
                                                <b><?php echo $this->_tpl_vars['field_value']; ?>
</b>
                                            </span>
                                        </div>
                                        <div class="clear"></div>

                                        <?php if ($this->_tpl_vars['field']['Type'] == 'image'): ?>
                                            <img style="width: auto;" class="thumbnail" title="<?php echo $this->_tpl_vars['field']['name']; ?>
"
                                                alt="<?php echo $this->_tpl_vars['field']['name']; ?>
" src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['field_value']; ?>
" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            <?php else: ?>
                                <?php echo $this->_plugins['function']['getTmpFile'][0][0]->getTmpFile(array('field' => $this->_tpl_vars['field']['Key'],'parent' => 'f'), $this);?>

                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php $this->assign('field_type', $this->_tpl_vars['field']['Default']); ?>
                    <div class="file-input">
                        <input type="hidden" name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]" value="<?php echo $this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']]; ?>
" />
                        <input class="file"
                               type="file"
                               <?php if ($this->_tpl_vars['field']['Opt1']): ?>
                               accept=".<?php echo ((is_array($_tmp=$this->_tpl_vars['l_file_types'][$this->_tpl_vars['field_type']]['ext'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', ',.') : smarty_modifier_replace($_tmp, ',', ',.')); ?>
"
                               multiple
                               name="<?php echo $this->_tpl_vars['field']['Key']; ?>
[]"
                               <?php else: ?>
                               name="<?php echo $this->_tpl_vars['field']['Key']; ?>
"
                               <?php endif; ?> />
                        <input type="text" class="file-name" name="" />
                        <span><?php echo $this->_tpl_vars['lang']['choose']; ?>
</span>
                    </div>

                    <?php if ($this->_tpl_vars['field']['Type'] == 'file' && $this->_tpl_vars['field']['Default'] && $this->_tpl_vars['field']['Default'] != 'mixed'): ?>
                        <em><?php echo $this->_tpl_vars['l_file_types'][$this->_tpl_vars['field_type']]['name']; ?>
 (.<?php echo ((is_array($_tmp=$this->_tpl_vars['l_file_types'][$this->_tpl_vars['field_type']]['ext'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', ', .') : smarty_modifier_replace($_tmp, ',', ', .')); ?>
)</em>
                    <?php elseif ($this->_tpl_vars['field']['Default'] && $this->_tpl_vars['field']['Default'] == 'mixed'): ?>
                        <?php $this->assign('file_limit_replace', ('{')."number".('}')); ?>
                        <em><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['files_limit_hint'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['file_limit_replace'], $this->_tpl_vars['field']['Opt2']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['file_limit_replace'], $this->_tpl_vars['field']['Opt2'])); ?>
</em>
                    <?php endif; ?>
                <?php elseif ($this->_tpl_vars['field']['Type'] == 'accept'): ?>
                    <input class="hide"
                        value="0"
                        type="checkbox"
                        name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]"
                        checked="checked" />

                    <label>
                        <input value="1"
                            type="checkbox"
                            name="f[<?php echo $this->_tpl_vars['field']['Key']; ?>
]"
                            <?php if ($this->_tpl_vars['fVal'][$this->_tpl_vars['fKey']] == '1'): ?>checked="checked"<?php endif; ?> />
                        &nbsp;<?php echo $this->_tpl_vars['lang']['agree']; ?>


                        <a target="_blank" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['field']['Default']), $this);?>
">
                            <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => ((is_array($_tmp='pages+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['field']['Default']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['field']['Default']))), $this);?>

                        </a>
                    </label>
                <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<!-- fields block end -->