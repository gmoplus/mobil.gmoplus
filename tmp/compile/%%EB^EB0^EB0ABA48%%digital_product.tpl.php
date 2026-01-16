<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:19
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/digital_product.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'files', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/digital_product.tpl', 23, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/digital_product.tpl', 65, false),array('function', 'getTmpFile', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/digital_product.tpl', 56, false),)), $this); ?>
<div class="submit-cell auction fixed">
    <div class="name">
        <?php echo $this->_tpl_vars['lang']['shc_digital_product']; ?>

    </div>
    <div class="field inline-fields" id="sf_field_shc_bid_available">
        <span class="custom-input"><label><input type="radio" value="1" name="fshc[digital]" <?php if ($_POST['fshc']['digital'] == '1'): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label></span>
        <span class="custom-input"><label><input type="radio" value="0" name="fshc[digital]" <?php if ($_POST['fshc']['digital'] == '0' || $_POST['fshc']['digital'] == ''): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['lang']['no']; ?>
</label></span>
    </div>
</div>
<div class="submit-cell clearfix digital-product auction fixed<?php if ($_POST['fshc']['digital'] != '1'): ?> hide<?php endif; ?>">
    <div class="name">
        <?php echo $this->_tpl_vars['lang']['file']; ?>

    </div>
    <div class="field" id="sf_field_digital_product">
        <?php $this->assign('field_value', ''); ?>

        <?php if ($_POST['fshc']['digital_product']): ?>
            <?php $this->assign('field_value', $_POST['fshc']['digital_product']); ?>
        <?php elseif ($_POST['fshc']['sys_exist_digital_product']): ?>
            <?php $this->assign('field_value', $_POST['fshc']['sys_exist_digital_product']); ?>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['field_value'] && ! ((is_array($_tmp='digital_product')) ? $this->_run_mod_handler('files', true, $_tmp) : smarty_modifier_files($_tmp))): ?>
            <div id="digital_product_file" 
                class="image-field-preview file-data"
                data-field="digital_product"
                data-value="<?php echo $this->_tpl_vars['field_value']; ?>
"
                data-type="listing">
                <div class="relative fleft">
                    <input type="hidden" name="fshc[sys_exist_digital_product]" value="<?php echo $this->_tpl_vars['field_value']; ?>
" />

                    <div class="fleft" style="margin-bottom: 5px;">
                        <div>
                            <table class="sTable">
                                <tr>
                                    <td><?php echo $this->_tpl_vars['lang']['currently_uploaded_file']; ?>
</td>
                                    <td class="ralign">
                                        <a href="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['field_value']; ?>
"><?php echo $this->_tpl_vars['lang']['download']; ?>
</a>
                                        |
                                        <a href="javascript://" id="delete_digital_product" data-item="<?php echo $this->_tpl_vars['manageListing']->listingID; ?>
" class="delete-file-product">
                                            <?php echo $this->_tpl_vars['lang']['remove']; ?>

                                            <img id="delete_digital_product" class="delete icon" 
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
                </div>
                <div class="clear"></div>
            </div>
        <?php else: ?>
            <?php echo $this->_plugins['function']['getTmpFile'][0][0]->getTmpFile(array('field' => 'digital_product','parent' => 'fshc'), $this);?>

        <?php endif; ?>

        <div class="file-input">
            <input type="hidden" name="fshc[digital_product]" value="" />
            <input class="file" type="file" name="digital_product" />
            <input type="text" class="file-name" name="" />
            <span><?php echo $this->_tpl_vars['lang']['choose']; ?>
</span>
        </div>
        <em><?php echo $this->_tpl_vars['l_file_types']['zip']; ?>
 (.<?php echo ((is_array($_tmp=$this->_tpl_vars['l_file_types']['zip']['ext'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', ', .') : smarty_modifier_replace($_tmp, ',', ', .')); ?>
)</em>
    </div>
</div>