<?php /* Smarty version 2.6.31, created on 2025-07-12 17:52:33
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/listing_status/status_selector.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/status_selector.tpl', 3, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/status_selector.tpl', 13, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/status_selector.tpl', 33, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/status_selector.tpl', 33, false),)), $this); ?>
<!-- label selectors box -->
<?php if ($this->_tpl_vars['listing']['Status'] == 'active'): ?>
    <?php $this->assign('label_array', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['listing']['Sub_status_data']) : explode($_tmp, $this->_tpl_vars['listing']['Sub_status_data']))); ?>
    <li class="single-inline">
        <?php if ($this->_tpl_vars['listing']['Plan_type'] == 'account'): ?>
            <?php $this->assign('statuses', $this->_tpl_vars['membership_statuses']); ?>
        <?php else: ?>
            <?php $this->assign('statuses', $this->_tpl_vars['status']); ?>
        <?php endif; ?>
        
        <?php $this->assign('ls_array', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['listing']['Sub_status']) : explode($_tmp, $this->_tpl_vars['listing']['Sub_status']))); ?>
        <?php $_from = $this->_tpl_vars['statuses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <?php if (((is_array($_tmp=$this->_tpl_vars['item']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['ls_array']) : in_array($_tmp, $this->_tpl_vars['ls_array']))): ?>
                <?php $this->assign('ls_default', $this->_tpl_vars['item']['Key']); ?>
                <?php break; ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        
    	<select id="status_selector_<?php echo $this->_tpl_vars['listing']['ID']; ?>
" data-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
" title="<?php echo $this->_tpl_vars['lang']['ls_substatus']; ?>
" class="hint selector">
    		<?php $_from = $this->_tpl_vars['statuses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    			<?php if ($this->_tpl_vars['item']['Type'] == 'all'): ?>
    				<option value="<?php echo $this->_tpl_vars['item']['Key']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['item']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['label_array']) : in_array($_tmp, $this->_tpl_vars['label_array']))): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    			<?php elseif (((is_array($_tmp=$this->_tpl_vars['listing_type']['Type'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['item']['Type']) : in_array($_tmp, $this->_tpl_vars['item']['Type']))): ?>
    				<option value="<?php echo $this->_tpl_vars['item']['Key']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['item']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['label_array']) : in_array($_tmp, $this->_tpl_vars['label_array']))): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    			<?php endif; ?>
    		<?php endforeach; endif; unset($_from); ?>
    	</select>
    </li>

    <?php if ($this->_tpl_vars['listing']['Main_photo'] && $this->_tpl_vars['config']['ls_verify_module'] && ! ((is_array($_tmp='verified')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['label_array']) : in_array($_tmp, $this->_tpl_vars['label_array']))): ?>
        <?php $this->assign('type_array', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['lb_statuses']['verified']['Type']) : explode($_tmp, $this->_tpl_vars['lb_statuses']['verified']['Type']))); ?>
        <li class="nav-icon verified<?php if (! ((is_array($_tmp=$this->_tpl_vars['listing']['Listing_type'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['type_array']) : in_array($_tmp, $this->_tpl_vars['type_array']))): ?> hide<?php endif; ?>">
            <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'verify_photos','vars' => ((is_array($_tmp='id=')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['listing']['ID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['listing']['ID']))), $this);?>
"><span>
                <?php if (((is_array($_tmp='wait')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['label_array']) : in_array($_tmp, $this->_tpl_vars['label_array']))): ?><?php echo $this->_tpl_vars['lang']['ls_pending_verification']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['ls_verify_photos']; ?>
<?php endif; ?>
            </span>&nbsp;</a>
        </li>
    <?php endif; ?>
<?php endif; ?>
<!-- label selectors box end -->