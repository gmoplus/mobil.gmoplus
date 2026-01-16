<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:47
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field_out_value.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field_out_value.tpl', 5, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field_out_value.tpl', 12, false),array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field_out_value.tpl', 22, false),array('modifier', 'pathinfo', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field_out_value.tpl', 23, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field_out_value.tpl', 73, false),array('modifier', 'truncate', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/field_out_value.tpl', 73, false),)), $this); ?>
<!-- item out value tpl -->

<?php if ($this->_tpl_vars['item']['Type'] == 'checkbox' && is_array ( $this->_tpl_vars['item']['Values'] )): ?>
    <ul class="checkboxes row">
    <?php if ($this->_tpl_vars['item']['Opt2']): ?><?php echo smarty_function_math(array('assign' => 'col_count','equation' => '12 / opt','opt' => $this->_tpl_vars['item']['Opt2']), $this);?>
<?php endif; ?>
    <?php $_from = $this->_tpl_vars['item']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['checkboxF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['checkboxF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tile']):
        $this->_foreach['checkboxF']['iteration']++;
?>
        <?php if (! empty ( $this->_tpl_vars['item']['Condition'] )): ?>
            <?php $this->assign('tit_source', $this->_tpl_vars['tile']['Key']); ?>
        <?php else: ?>
            <?php $this->assign('tit_source', $this->_tpl_vars['tile']['ID']); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['item']['Opt1'] || ((is_array($_tmp=$this->_tpl_vars['tit_source'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['item']['source']) : in_array($_tmp, $this->_tpl_vars['item']['source']))): ?>
            <li title="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['tile']['pName']]; ?>
" class="col-xs-12 <?php if ($this->_tpl_vars['col_count']): ?>col-sm-<?php echo $this->_tpl_vars['col_count']; ?>
<?php else: ?>col-lg-4 col-md-6 col-sm-4<?php endif; ?> <?php if (((is_array($_tmp=$this->_tpl_vars['tit_source'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['item']['source']) : in_array($_tmp, $this->_tpl_vars['item']['source']))): ?>active<?php endif; ?>">
                <img src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" alt="" /><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['tile']['pName']]; ?>

            </li>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
<?php elseif ($this->_tpl_vars['item']['Type'] == 'file'): ?>
    <?php if ($this->_tpl_vars['item']['Opt1']): ?>
        <div class="uploaded-files d-flex flex-wrap">
            <?php $_from = ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['item']['value']) : explode($_tmp, $this->_tpl_vars['item']['value'])); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
                <?php $this->assign('file_info', ((is_array($_tmp=$this->_tpl_vars['file'])) ? $this->_run_mod_handler('pathinfo', true, $_tmp) : pathinfo($_tmp))); ?>
                <a href="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['file']; ?>
" target="_blank" class="d-flex flex-column uploaded-file mr-3">
                    <span class="uploaded-file__ext d-flex flex-column justify-content-center align-items-center hlight hborder">
                        <?php echo $this->_tpl_vars['file_info']['extension']; ?>

                    </span>
                    <span class="font-size-xs mb-3">
                        <span class="d-flex mt-1 text-center text-break justify-content-center"><?php echo $this->_tpl_vars['file_info']['filename']; ?>
</span>
                    </span>
                </a>
            <?php endforeach; endif; unset($_from); ?>
        </div>
    <?php else: ?>
        <a href="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['item']['value']; ?>
"><?php echo $this->_tpl_vars['lang']['download']; ?>
</a>
    <?php endif; ?>
<?php elseif ($this->_tpl_vars['item']['Type'] == 'phone'): ?>
    <?php if ($this->_tpl_vars['item']['Contact'] && $this->_tpl_vars['item']['fake']): ?>
        <span><?php echo $this->_tpl_vars['item']['value']; ?>
</span>
    <?php else: ?>
        <?php if ($this->_tpl_vars['item']['Hidden']): ?>
            <?php if ($this->_tpl_vars['item']['source'] && $this->_tpl_vars['listing_data'] && $this->_tpl_vars['listing_data']['ID']): ?>
                <?php $this->assign('entityID', $this->_tpl_vars['listing_data']['ID']); ?>
                <?php $this->assign('entity', 'listing'); ?>
            <?php elseif (! $this->_tpl_vars['item']['source'] && $this->_tpl_vars['seller_info'] && $this->_tpl_vars['seller_info']['ID']): ?>
                <?php $this->assign('entityID', $this->_tpl_vars['seller_info']['ID']); ?>
                <?php $this->assign('entity', 'account'); ?>
            <?php endif; ?>

            <div class="hidden-phone"
                 data-entity="<?php echo $this->_tpl_vars['entity']; ?>
"
                 data-entity-id="<?php echo $this->_tpl_vars['entityID']; ?>
"
                 data-field="<?php echo $this->_tpl_vars['item']['Key']; ?>
"
                 data-listing-id="<?php if ($this->_tpl_vars['listing_data'] && $this->_tpl_vars['listing_data']['ID']): ?><?php echo $this->_tpl_vars['listing_data']['ID']; ?>
<?php endif; ?>"
            >
                <span class="mr-3"><?php echo $this->_tpl_vars['item']['value']; ?>
</span>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/field_out_phone_messengers.tpl', 'smarty_include_vars' => array('hidden' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
            <div class="show-phone<?php if ($this->_tpl_vars['entity'] === 'account' && $this->_tpl_vars['config']['hidden_phone_numbers'] > 0): ?> mt-1 mb-1<?php endif; ?>">
                <a title="<?php echo $this->_tpl_vars['lang']['phone_show_number']; ?>
" href="javascript://"><?php echo $this->_tpl_vars['lang']['phone_show_number']; ?>
</a>
            </div>
        <?php else: ?>
            <span class="m<?php if ((defined('RL_LANG_DIR') ? @RL_LANG_DIR : null) === 'ltr'): ?>r<?php else: ?>l<?php endif; ?>-3">
                <a href="tel:<?php echo $this->_tpl_vars['item']['value']; ?>
"><?php echo $this->_tpl_vars['item']['value']; ?>
</a>
            </span>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/field_out_phone_messengers.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    <?php endif; ?>
<?php elseif ($this->_tpl_vars['item']['Condition'] == 'isEmail'): ?>
    <?php if ($this->_tpl_vars['item']['Contact'] && $this->_tpl_vars['item']['fake']): ?><span><?php echo $this->_tpl_vars['item']['value']; ?>
</span><?php else: ?><a href="mailto:<?php echo $this->_tpl_vars['item']['value']; ?>
"><?php echo $this->_tpl_vars['item']['value']; ?>
</a><?php endif; ?>
<?php elseif ($this->_tpl_vars['item']['Condition'] == 'isUrl'): ?>
    <?php if ($this->_tpl_vars['item']['Contact'] && $this->_tpl_vars['item']['fake']): ?><span><?php echo $this->_tpl_vars['item']['value']; ?>
</span><?php else: ?><a rel="nofollow" href="<?php echo $this->_tpl_vars['item']['value']; ?>
" target="_blank"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['value'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'http://', '') : smarty_modifier_replace($_tmp, 'http://', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'https://', '') : smarty_modifier_replace($_tmp, 'https://', '')))) ? $this->_run_mod_handler('truncate', true, $_tmp, 35, '..', true, true) : smarty_modifier_truncate($_tmp, 35, '..', true, true)); ?>
</a><?php endif; ?>
<?php else: ?>
    <?php echo $this->_tpl_vars['item']['value']; ?>

<?php endif; ?>

<!-- item out value tpl end -->