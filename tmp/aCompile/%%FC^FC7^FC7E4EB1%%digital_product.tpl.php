<?php /* Smarty version 2.6.31, created on 2025-07-27 12:57:12
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/digital_product.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getTmpFile', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/digital_product.tpl', 50, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/admin/view/digital_product.tpl', 55, false),)), $this); ?>
<tr class="fixed auction">
    <td class="name">
        <?php echo $this->_tpl_vars['lang']['shc_digital_product']; ?>

    </td>
    <td class="field" id="sf_field_shc_available">
        <label><input type="radio" value="1" name="fshc[digital]" <?php if ($_POST['fshc']['digital'] == '1'): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
        <label><input type="radio" value="0" name="fshc[digital]" <?php if ($_POST['fshc']['digital'] == '0' || ! $_POST['fshc']['digital']): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
    </td>
</tr>
<tr class="digital-product auction fixed<?php if ($_POST['fshc']['digital'] != '1'): ?> hide<?php endif; ?>">
    <td class="name">
        <?php echo $this->_tpl_vars['lang']['file']; ?>

    </td>
    <td class="field">
        <?php $this->assign('field_value', ''); ?>

        <?php if ($_POST['fshc']['digital_product']): ?>
            <?php $this->assign('field_value', $_POST['fshc']['digital_product']); ?>
        <?php elseif ($_POST['fshc']['sys_exist_digital_product']): ?>
            <?php $this->assign('field_value', $_POST['fshc']['sys_exist_digital_product']); ?>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['field_value']): ?>
            <div id="digital_product_file" style="padding: 0 0 5px 0;">
                <input type="hidden" name="fshc[sys_exist_digital_product]" value="<?php echo $this->_tpl_vars['field_value']; ?>
" />

                <a href="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['field_value']; ?>
"><?php echo $this->_tpl_vars['lang']['download']; ?>
</a>
                |
                <a id="delete_digital_product" href="javascript:void(0)"><?php echo $this->_tpl_vars['lang']['delete']; ?>
</a>

                <script>
                <?php echo '
                    
                    $(document).ready(function(){
                        $(\'#delete_digital_product\').click(function(){
                            '; ?>

                            rlConfirm('<?php echo $this->_tpl_vars['lang']['delete_confirm']; ?>
', 'shoppingCart.deleteFile', Array('<?php echo $this->_tpl_vars['listing_info']['ID']; ?>
'));
                            <?php echo '
                        });
                    });
                    
                '; ?>

                </script>
                <div style="font-style:italic;" class="dark_13" title="<?php echo $this->_tpl_vars['field_value']; ?>
">
                    <b><?php echo $this->_tpl_vars['field_value']; ?>
</b>
                </div>
            </div>
        <?php endif; ?>

        <?php echo $this->_plugins['function']['getTmpFile'][0][0]->getTmpFile(array('field' => 'digital_product','parent' => 'fshc'), $this);?>


        <?php $this->assign('field_type', $this->_tpl_vars['field']['Default']); ?>
        <input type="hidden" name="fshc[digital_product]" value="" />
        <input class="file" type="file" name="digital_product" />
        <span class="green_11"> <em><?php echo $this->_tpl_vars['l_file_types']['zip']; ?>
 (.<?php echo ((is_array($_tmp=$this->_tpl_vars['l_file_types']['zip']['ext'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', ', .') : smarty_modifier_replace($_tmp, ',', ', .')); ?>
)</em></span>
    </td>
</tr>   