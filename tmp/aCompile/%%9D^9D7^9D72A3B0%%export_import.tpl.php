<?php /* Smarty version 2.6.31, created on 2025-10-18 19:37:18
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/export_import/admin/export_import.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/admin/export_import.tpl', 16, false),array('modifier', 'escape', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/admin/export_import.tpl', 102, false),array('modifier', 'version_compare', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/admin/export_import.tpl', 136, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/admin/export_import.tpl', 272, false),)), $this); ?>
<!-- import/export listings tpl -->

<!-- navigation bar -->
<?php if ($_GET['action'] != 'export' && $_GET['action'] != 'export_table'): ?>
<div id="nav_bar">
	<a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=export" class="button_bar"><span class="left"></span><span class="center_export"><?php echo $this->_tpl_vars['lang']['eil_export']; ?>
</span><span class="right"></span></a>
</div>
<?php endif; ?>
<!-- navigation bar end -->

<?php $this->assign('sPost', $_POST); ?>

<?php if ($this->_tpl_vars['ei_mode'] == 'import_upload'): ?>

	<!-- import upload form -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=import" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="import_file" />
		<table class="form">
		<tr>
			<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['eil_file_for_import']; ?>
</td>
			<td class="field">
				<input type="file" name="file" />
				<span class="field_description"><?php echo $this->_tpl_vars['lang']['eil_file_for_import_desc']; ?>
</span>
			</td>
		</tr>
		<tr>
			<td class="name"><?php echo $this->_tpl_vars['lang']['eil_pictures_archive']; ?>
</td>
			<td class="field">
				<input type="file" name="archive" />
				<span class="field_description"><?php echo $this->_tpl_vars['lang']['eil_pictures_archive_desc']; ?>
</span>

				<div class="field_description" style="margin: 10px 0 0 0;"><?php echo $this->_tpl_vars['lang']['eil_max_file_size']; ?>
 <b><?php echo $this->_tpl_vars['max_file_size']; ?>
 MB</b></div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input name="" type="submit" value="<?php echo $this->_tpl_vars['lang']['upload']; ?>
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
	<!-- import upload form end -->

<?php elseif ($this->_tpl_vars['ei_mode'] == 'import_form'): ?>

	<!-- import form -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=import<?php if ($_GET['page']): ?>&page=<?php echo $_GET['page']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="import_form" />
		<input type="hidden" name="from_post" value="1" />

		<table class="form import-form">
		<tr>
			<td class="name"><div style="min-width: 160px;"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listings']; ?>
</div></td>
			<td class="field">
                <div class="listing-container">
    				<table class="import export">
    				<tr class="col-checkbox no_hover">
    					<td></td>
    					<?php $_from = $this->_tpl_vars['sPost']['data']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['checkboxF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['checkboxF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['checkbox']):
        $this->_foreach['checkboxF']['iteration']++;
?>
    					<td>
    						<?php $this->assign('iter_checkbox', $this->_foreach['checkboxF']['iteration']-1); ?>
    						<div><input <?php if (isset ( $this->_tpl_vars['sPost']['data'] ) && $this->_tpl_vars['sPost']['cols'][$this->_tpl_vars['iter_checkbox']]): ?>checked="checked"<?php elseif (! isset ( $this->_tpl_vars['sPost']['data'] )): ?>checked="checked"<?php endif; ?> value="1" type="checkbox"  name="cols[<?php echo $this->_tpl_vars['iter_checkbox']; ?>
]" /></div>
    					</td>
    					<?php endforeach; endif; unset($_from); ?>
    				</tr>

    				<tr class="header no_hover">
    					<td class="row-checkbox"></td>
    					<?php $_from = $this->_tpl_vars['sPost']['data']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fieldF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fieldF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col']):
        $this->_foreach['fieldF']['iteration']++;
?>
    						<td>
    							<?php $this->assign('iter_field', $this->_foreach['fieldF']['iteration']-1); ?>
    							<div>
    								<span class="caption" title="<?php echo $this->_tpl_vars['col']; ?>
"><?php echo $this->_tpl_vars['col']; ?>
</span> -
    								<select style="width: 130px;" name="field[<?php echo $this->_tpl_vars['iter_field']; ?>
]">
    									<option value=""><?php echo $this->_tpl_vars['lang']['eil_select_field']; ?>
</option>
    									<optgroup label="<?php echo $this->_tpl_vars['lang']['eil_system_fields']; ?>
">
    										<?php $_from = $this->_tpl_vars['system_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
    											<option <?php if ($this->_tpl_vars['sPost']['field'][$this->_tpl_vars['iter_field']] == $this->_tpl_vars['field']['Key']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['field']['Key']; ?>
"><?php echo $this->_tpl_vars['field']['name']; ?>
</option>
    										<?php endforeach; endif; unset($_from); ?>
    									</optgroup>
    									<optgroup label="<?php echo $this->_tpl_vars['lang']['eil_listing_fields']; ?>
">
    										<?php $_from = $this->_tpl_vars['listing_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
    											<option <?php if ($this->_tpl_vars['sPost']['field'][$this->_tpl_vars['iter_field']] == $this->_tpl_vars['field']['Key']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['field']['Key']; ?>
"><?php echo $this->_tpl_vars['field']['name']; ?>
</option>
    										<?php endforeach; endif; unset($_from); ?>
    									</optgroup>
    								</select>
    							</div>
    						</td>
    					<?php endforeach; endif; unset($_from); ?>
    				</tr>
    				<?php unset($this->_sections['rowF']);
$this->_sections['rowF']['name'] = 'rowF';
$this->_sections['rowF']['loop'] = is_array($_loop=$this->_tpl_vars['sPost']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rowF']['start'] = (int)$this->_tpl_vars['grid']['start'];
$this->_sections['rowF']['max'] = (int)$this->_tpl_vars['grid']['limit']+1;
$this->_sections['rowF']['show'] = true;
if ($this->_sections['rowF']['max'] < 0)
    $this->_sections['rowF']['max'] = $this->_sections['rowF']['loop'];
$this->_sections['rowF']['step'] = 1;
if ($this->_sections['rowF']['start'] < 0)
    $this->_sections['rowF']['start'] = max($this->_sections['rowF']['step'] > 0 ? 0 : -1, $this->_sections['rowF']['loop'] + $this->_sections['rowF']['start']);
else
    $this->_sections['rowF']['start'] = min($this->_sections['rowF']['start'], $this->_sections['rowF']['step'] > 0 ? $this->_sections['rowF']['loop'] : $this->_sections['rowF']['loop']-1);
if ($this->_sections['rowF']['show']) {
    $this->_sections['rowF']['total'] = min(ceil(($this->_sections['rowF']['step'] > 0 ? $this->_sections['rowF']['loop'] - $this->_sections['rowF']['start'] : $this->_sections['rowF']['start']+1)/abs($this->_sections['rowF']['step'])), $this->_sections['rowF']['max']);
    if ($this->_sections['rowF']['total'] == 0)
        $this->_sections['rowF']['show'] = false;
} else
    $this->_sections['rowF']['total'] = 0;
if ($this->_sections['rowF']['show']):

            for ($this->_sections['rowF']['index'] = $this->_sections['rowF']['start'], $this->_sections['rowF']['iteration'] = 1;
                 $this->_sections['rowF']['iteration'] <= $this->_sections['rowF']['total'];
                 $this->_sections['rowF']['index'] += $this->_sections['rowF']['step'], $this->_sections['rowF']['iteration']++):
$this->_sections['rowF']['rownum'] = $this->_sections['rowF']['iteration'];
$this->_sections['rowF']['index_prev'] = $this->_sections['rowF']['index'] - $this->_sections['rowF']['step'];
$this->_sections['rowF']['index_next'] = $this->_sections['rowF']['index'] + $this->_sections['rowF']['step'];
$this->_sections['rowF']['first']      = ($this->_sections['rowF']['iteration'] == 1);
$this->_sections['rowF']['last']       = ($this->_sections['rowF']['iteration'] == $this->_sections['rowF']['total']);
?>
    					<?php $this->assign('iter_row', $this->_foreach['rowF']['iteration']-1); ?>
    						<tr class="body<?php if ($this->_sections['rowF']['iteration']%2 == 0 && ! $this->_sections['rowF']['first']): ?> highlight<?php endif; ?>">
    							<td class="row-checkbox"></td>
    							<?php $_from = $this->_tpl_vars['sPost']['data'][$this->_sections['rowF']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['colF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['colF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col']):
        $this->_foreach['colF']['iteration']++;
?>
    								<td>
    									<div>
     										<span style="display:block;"><?php echo ((is_array($_tmp=$this->_tpl_vars['col'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
    									</div>
    								</td>
    							<?php endforeach; endif; unset($_from); ?>
    						</tr>
    				<?php endfor; endif; ?>
    				</table>
                </div>
			</td>
		</tr>
		<?php if ($this->_tpl_vars['grid']['total_pages'] > 1): ?>
			<tr>
				<td class="name"></td>
				<td class="field">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'export_import') : smarty_modifier_cat($_tmp, 'export_import')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'pagination.tpl') : smarty_modifier_cat($_tmp, 'pagination.tpl')), 'smarty_include_vars' => array('type' => 'import')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
</td>
			<td class="field">
				<select class="w200" name="import_listing_type" id="Type">
					<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
					<?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
						<option <?php if ($this->_tpl_vars['sPost']['import_listing_type'] == $this->_tpl_vars['l_type']['Key']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
"><?php echo $this->_tpl_vars['l_type']['name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['eil_default_category']; ?>
</td>
			<td class="field">
				<select class="w200" name="import_category_id">
					<option value=""><?php if ($this->_tpl_vars['categories']): ?><?php echo $this->_tpl_vars['lang']['select']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['eil_select_listing_type']; ?>
<?php endif; ?></option>
                    <?php if ($this->_tpl_vars['categories'] && ((is_array($_tmp=$this->_tpl_vars['config']['rl_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, "4.4.0") : version_compare($_tmp, "4.4.0")) < 0): ?>
						<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
							<option <?php if ($this->_tpl_vars['category']['Level'] == 0): ?>class="highlight_opt"<?php endif; ?> <?php if ($this->_tpl_vars['category']['margin']): ?>style="margin-left: <?php echo $this->_tpl_vars['category']['margin']; ?>
px;"<?php endif; ?> value="<?php echo $this->_tpl_vars['category']['ID']; ?>
" <?php if ($this->_tpl_vars['sPost']['import_category_id'] == $this->_tpl_vars['category']['ID']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['category']['pName']]; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['eil_default_owner']; ?>
</td>
			<td class="field">
				<input style="width: 188px;" type="text" value="<?php echo $this->_tpl_vars['sPost']['import_account_id_tmp']; ?>
" name="import_account_id" />
				<script type="text/javascript">
				var post_account_id = <?php if ($this->_tpl_vars['sPost']['import_account_id']): ?><?php echo $this->_tpl_vars['sPost']['import_account_id']; ?>
<?php else: ?>false<?php endif; ?>;
				<?php echo '
					$(\'input[name=import_account_id]\').rlAutoComplete({add_id: true, id: post_account_id});
				'; ?>

				</script>
			</td>
		</tr>
		<tr>
			<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['eil_default_status']; ?>
</td>
			<td class="field">
				<select class="w200" name="import_status">
					<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
					<option value="active" <?php if ($this->_tpl_vars['sPost']['import_status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
					<option value="approval" <?php if ($this->_tpl_vars['sPost']['import_status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
				</select>
			</td>
		</tr>
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['eil_default_plan']; ?>
</td>
            <td class="field">
                <select class="w200 2 <?php if ($this->_tpl_vars['membership_module'] && ! $this->_tpl_vars['config']['allow_listing_plans']): ?>disabled<?php endif; ?>" <?php if ($this->_tpl_vars['membership_module'] && ! $this->_tpl_vars['config']['allow_listing_plans']): ?>disabled="disabled"<?php endif; ?> name="import_plan_id">
                    <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                    <?php if ($this->_tpl_vars['plans']): ?>
                        <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plan']):
?>
                            <?php $this->assign('plan_type', ((is_array($_tmp=$this->_tpl_vars['plan']['Type'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_plan') : smarty_modifier_cat($_tmp, '_plan'))); ?>
                            <option  data-type="<?php echo $this->_tpl_vars['plan_type']; ?>
" value="<?php echo $this->_tpl_vars['plan']['ID']; ?>
" <?php if ($this->_tpl_vars['sPost']['import_plan_id'] == $this->_tpl_vars['plan']['ID']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['plan']['name']; ?>
 (<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['plan_type']]; ?>
)</option>
                        <?php endforeach; endif; unset($_from); ?>
                    <?php endif; ?>
                </select>
                <?php if ($this->_tpl_vars['membership_module'] && ! $this->_tpl_vars['config']['allow_listing_plans']): ?>
                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['eil_only_mp_allowed']; ?>
</span>
                <?php endif; ?>
            </td>
        </tr>
		<tr>
			<td class="name"><?php echo $this->_tpl_vars['lang']['eil_paid']; ?>
</td>
			<td class="field">
				<?php $this->assign('checkbox_field', 'import_paid'); ?>

				<?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
					<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
				<?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
					<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
				<?php else: ?>
					<?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
				<?php endif; ?>

				<input <?php echo $this->_tpl_vars['import_paid_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
				<input <?php echo $this->_tpl_vars['import_paid_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
			</td>
		</tr>
		<tr>
			<td class="name"><?php echo $this->_tpl_vars['lang']['eil_total_listings']; ?>
</td>
			<td class="field">
				<?php echo $this->_tpl_vars['grid']['total']; ?>

			</td>
		</tr>
		<tr>
			<td class="name"><?php echo $this->_tpl_vars['lang']['eil_per_run']; ?>
</td>
			<td class="field">
				<select style="width: 60px;" name="import_per_run">
					<?php if ($this->_tpl_vars['plans']): ?>
						<?php $_from = $this->_tpl_vars['per_run']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['run']):
?>
							<option value="<?php echo $this->_tpl_vars['run']; ?>
" <?php if ($this->_tpl_vars['sPost']['import_per_run'] == $this->_tpl_vars['run']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['run']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</select>
				<span class="field_description"><?php echo $this->_tpl_vars['lang']['eil_per_run_desc']; ?>
</span>
			</td>
		</tr>
		<tr>
			<td></td>
			<td class="field"><input type="submit" name="" value="<?php echo $this->_tpl_vars['lang']['import']; ?>
" /></td>
		</tr>
		</table>
	</form>

	<div class="import_note">
		<div><?php echo $this->_tpl_vars['lang']['eil_pictures_by_url_note']; ?>
</div>
		<div><?php echo $this->_tpl_vars['lang']['eil_youtube_video_field_note']; ?>
</div>
	</div>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- import form end -->

    <?php if (((is_array($_tmp=$this->_tpl_vars['config']['rl_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, "4.4.0") : version_compare($_tmp, "4.4.0")) >= 0): ?>
        <script>
            var category_selected = <?php if ($this->_tpl_vars['sPost']['import_category_id']): ?><?php echo $this->_tpl_vars['sPost']['import_category_id']; ?>
<?php else: ?>null<?php endif; ?>;
            <?php echo '

            $(document).ready(function(){
                $(\'select[name=import_category_id]\').categoryDropdown({
                    listingType: \'#Type\',
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
    <?php else: ?>
    	<script type="text/javascript">
            <?php echo '
                var eil_select_listing_type = "{$lang.eil_select_listing_type}";
                $(\'select[name=import_listing_type]\').change(function(){
                    eil_typeHandler($(this).val(), \'import_category_id\');
                });
            '; ?>


        </script>
    <?php endif; ?>

	<script type="text/javascript">
	var eil_listing_wont_imported = "<?php echo $this->_tpl_vars['lang']['eil_listing_wont_imported']; ?>
";
	var eil_column_wont_imported = "<?php echo $this->_tpl_vars['lang']['eil_column_wont_imported']; ?>
";


	var allow_match = <?php if ($_POST['from_post'] || isset ( $_GET['edit'] )): ?>false<?php else: ?>true<?php endif; ?>;
	var matched_fields = 0;
	var listings_count = <?php echo count($this->_tpl_vars['sPost']['data']); ?>
;
	var hide_first = <?php if ($this->_tpl_vars['sPost']['hide_first']): ?>true<?php else: ?>false<?php endif; ?>;
	<?php echo '

	$(document).ready(function(){
		eil_colHandler();

		$(\'input[name^=cols]\').click(function(){
			eil_colHandler();
		});

		/* match fields handler */
		$(\'table.import tr.header td div\').each(function () {
			var field = $(this).find(\'span.caption\').text();

			if (field != \'$\' && !$(this).find(\'select\').val() && field) {
				$(this).find(\'select optgroup option\').each(function () {
					var pattern = new RegExp(\'^\' + field + \'?\', \'i\');

					if (pattern.test($(this).text())) {
						if (allow_match) {
							$(this).attr(\'selected\', true);
						}

						matched_fields++;
						return false;
					}
				});

				if (!$(this).find(\'select\').val()) {
					$(this).find(\'select\').addClass(\'error\');
				}
			}
		});

		if ( (matched_fields > 2 || hide_first) && listings_count > 1 )
		{
			$(\'table.import tr.body:first\').hide();
			$(\'table.import\').after(\'<input type="hidden" name="hide_first" value="1" />\');
		}

		$(\'table.import select.error\').click(function(){
			$(this).removeClass(\'error\');
		});
	});

	'; ?>


	</script>

<?php elseif ($this->_tpl_vars['ei_mode'] == 'import_importing'): ?>

	<!-- importing -->
	<script type="text/javascript">
		$(document).ready(function() <?php echo '{'; ?>

			importExport.phrases['completed'] = "<?php echo $this->_tpl_vars['lang']['eil_completed']; ?>
";
			importExport.phrases['updating_mp'] = "<?php echo $this->_tpl_vars['lang']['eil_update_membership']; ?>
";
			importExport.phrases['mp_updated'] = "<?php echo $this->_tpl_vars['lang']['eil_mp_updated']; ?>
";
			importExport.config['per_run'] = <?php echo $this->_tpl_vars['import_details']['1']['value']; ?>
;
			importExport.config['membership_module'] = <?php if ($this->_tpl_vars['config']['membership_module']): ?>1<?php else: ?>0<?php endif; ?>;
			importExport.config['allow_listing_plans'] = <?php if ($this->_tpl_vars['config']['allow_listing_plans']): ?>1<?php else: ?>0<?php endif; ?>;
		<?php echo '}'; ?>
);
	</script>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<table class="list">
	<?php $_from = $this->_tpl_vars['import_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['itemF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['itemF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['itemF']['iteration']++;
?>
	<tr>
		<td class="name"><?php echo $this->_tpl_vars['item']['name']; ?>
:</td>
		<td class="value<?php if (($this->_foreach['itemF']['iteration'] <= 1)): ?> first<?php endif; ?>"><?php echo $this->_tpl_vars['item']['value']; ?>
</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr id="import_start_nav">
		<td style="height: 50px;min-width: 200px;">
			<span class="purple_13">&larr; </span><a class="cancel" href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
&amp;action=import&amp;edit" style="padding: 0;"><?php echo $this->_tpl_vars['lang']['eil_back_to_import_form']; ?>
</a>
		</td>
		<td class="value">
			<input id="start_import" type="button" value="<?php echo $this->_tpl_vars['lang']['eil_start']; ?>
" />
		</td>
	</tr>
	</table>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'export_import') : smarty_modifier_cat($_tmp, 'export_import')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'import_interface.tpl') : smarty_modifier_cat($_tmp, 'import_interface.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- importing -->

    <div id="imported-listings">
        <script>
        rights[cKey] = rights['listings'];
        </script>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'controllers/listings.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
<?php elseif ($this->_tpl_vars['ei_mode'] == 'export'): ?>

    <?php if ($this->_tpl_vars['multiFieldExist']): ?>
        <script type="text/javascript" src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
multiField/static/lib.js"></script>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField/admin/tplHeader.tpl') : smarty_modifier_cat($_tmp, 'multiField/admin/tplHeader.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

	<!-- export conditions -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=export" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="export_condition" />
		<input type="hidden" name="from_post" value="1" />
		<table class="form">
		<tr>
			<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['eil_file_format']; ?>
</td>
			<td class="field">
				<select class="w130" name="export_format">
					<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
					<option <?php if ($this->_tpl_vars['sPost']['export_format'] == 'xls'): ?>selected="selected"<?php endif; ?> value="xls"><?php echo $this->_tpl_vars['lang']['eil_xls']; ?>
</option>
					<option <?php if ($this->_tpl_vars['sPost']['export_format'] == 'xlsx'): ?>selected="selected"<?php endif; ?> value="xlsx"><?php echo $this->_tpl_vars['lang']['eil_xlsx']; ?>
</option>
					<option <?php if ($this->_tpl_vars['sPost']['export_format'] == 'csv'): ?>selected="selected"<?php endif; ?> value="csv"><?php echo $this->_tpl_vars['lang']['eil_csv']; ?>
</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
</td>
			<td class="field">
				<select class="w200" name="export_listing_type" id="Type">
					<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
					<?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
						<option <?php if ($this->_tpl_vars['sPost']['export_listing_type'] == $this->_tpl_vars['l_type']['Key']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
"><?php echo $this->_tpl_vars['l_type']['name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="name"><?php echo $this->_tpl_vars['lang']['category']; ?>
</td>
			<td class="field">
				<select class="w200" name="export_category_id">
					<option value=""><?php if ($this->_tpl_vars['categories']): ?><?php echo $this->_tpl_vars['lang']['select']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['eil_select_listing_type']; ?>
<?php endif; ?></option>
					<?php if ($this->_tpl_vars['categories'] && ((is_array($_tmp=$this->_tpl_vars['config']['rl_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, "4.4.0") : version_compare($_tmp, "4.4.0")) < 0): ?>
						<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
							<option <?php if ($this->_tpl_vars['category']['Level'] == 0): ?>class="highlight_opt"<?php endif; ?> <?php if ($this->_tpl_vars['category']['margin']): ?>style="margin-left: <?php echo $this->_tpl_vars['category']['margin']; ?>
px;"<?php endif; ?> value="<?php echo $this->_tpl_vars['category']['ID']; ?>
" <?php if ($this->_tpl_vars['sPost']['export_category_id'] == $this->_tpl_vars['category']['ID']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['category']['pName']]; ?>
 (<?php echo $this->_tpl_vars['category']['Count']; ?>
)</option>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="name"><?php echo $this->_tpl_vars['lang']['posted_date']; ?>
</td>
			<td class="field">
				<input style="width: 65px;" name="export_date_from" type="text" value="<?php echo $this->_tpl_vars['sPost']['export_date_from']; ?>
" size="12" maxlength="10" id="date_from" />
				<img class="divider" alt="" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
				<input style="width: 65px;" name="export_date_to" type="text" value="<?php echo $this->_tpl_vars['sPost']['export_date_to']; ?>
" size="12" maxlength="10" id="date_to" />
			</td>
		</tr>
		</table>

		<div id="export_table" style="margin-top: 10px;">
			<?php if ($this->_tpl_vars['fields']): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'export_import') : smarty_modifier_cat($_tmp, 'export_import')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'search.tpl') : smarty_modifier_cat($_tmp, 'search.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
		</div>

		<table class="form">
		<tr>
			<td style="width: 185px;"></td>
			<td class="field"><input type="submit" name="" value="<?php echo $this->_tpl_vars['lang']['eil_export']; ?>
" /></td>
		</tr>
		</table>
	</form>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- export conditions end -->

    <?php if ($this->_tpl_vars['multiFieldExist']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField/admin/tplFooter.tpl') : smarty_modifier_cat($_tmp, 'multiField/admin/tplFooter.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

	<script type="text/javascript">
	<?php echo '

	$(document).ready(function(){
		$(function(){
			$(\'#date_from\').datepicker({showOn: \'both\', buttonImage: \''; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif\', buttonText: \''; ?>
<?php echo $this->_tpl_vars['lang']['dp_choose_date']; ?>
<?php echo '\', buttonImageOnly: true, dateFormat: \'yy-mm-dd\'}).datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);
			$(\'#date_to\').datepicker({showOn: \'both\', buttonImage: \''; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif\', buttonText: \''; ?>
<?php echo $this->_tpl_vars['lang']['dp_choose_date']; ?>
<?php echo '\', buttonImageOnly: true, dateFormat: \'yy-mm-dd\'}).datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);
	    });
	});

	'; ?>

	</script>

	<?php if (((is_array($_tmp=$this->_tpl_vars['config']['rl_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, "4.4.0") : version_compare($_tmp, "4.4.0")) >= 0): ?>
		<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.categoryDropdown.js"></script>
	    <script>
	        var category_selected = <?php if ($this->_tpl_vars['sPost']['export_category_id']): ?><?php echo $this->_tpl_vars['sPost']['export_category_id']; ?>
<?php else: ?>null<?php endif; ?>;
	        <?php echo '

	        $(document).ready(function(){
	            $(\'select[name=export_category_id]\').categoryDropdown({
	                listingType: \'#Type\',
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
	<?php endif; ?>

	<script type="text/javascript">
		var eil_select_listing_type = "<?php echo $this->_tpl_vars['lang']['eil_select_listing_type']; ?>
";
		<?php echo '

		$(document).ready(function(){
			$(\'select[name=export_listing_type]\').change(function(){
			 	eil_typeHandler($(this).val(), \'export_category_id\');
			});
		});
		'; ?>

	</script>

<?php elseif ($this->_tpl_vars['ei_mode'] == 'export_table'): ?>

	<!-- export listings table -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=export_table" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="export_table" />
		<input type="hidden" name="from_post" value="1" />
		<input type="hidden" name="exclude_from_list" id="exclude_from_list" />

		<table style="margin: -3px 0 10px 0;">
		<tr>
			<td style="padding-right: 20px;">
				<span class="purple_13">&larr; </span><a class="cancel" href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
&amp;action=export" style="padding: 0;"><?php echo $this->_tpl_vars['lang']['eil_back_to_export_criteria']; ?>
</a>
			</td>
			<td class="value">
				<input style="margin-top: 0;" type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" />
			</td>
		</tr>
		</table>

        <div class="listing-container">
    		<table class="import export">
    		<tr class="col-checkbox no_hover">
    			<td></td>
    			<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['checkboxF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['checkboxF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['checkbox']):
        $this->_foreach['checkboxF']['iteration']++;
?>
    			<td>
    				<?php $this->assign('iter_checkbox', $this->_foreach['checkboxF']['iteration']-1); ?>
    				<div><input <?php if (isset ( $this->_tpl_vars['sPost']['from_post'] ) && $this->_tpl_vars['sPost']['cols'][$this->_tpl_vars['iter_checkbox']]): ?>checked="checked"<?php elseif (! isset ( $this->_tpl_vars['sPost']['from_post'] )): ?>checked="checked"<?php endif; ?> value="1" type="checkbox" name="cols[<?php echo $this->_tpl_vars['iter_checkbox']; ?>
]" /></div>
    			</td>
    			<?php endforeach; endif; unset($_from); ?>
    		</tr>
    		<tr class="header">
    			<td></td>
    			<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
    				<td><div><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pName']]; ?>
</div></td>
    			<?php endforeach; endif; unset($_from); ?>
    		</tr>

    		<?php $_from = $this->_tpl_vars['export_listings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rowF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rowF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['listing']):
        $this->_foreach['rowF']['iteration']++;
?>
    			<?php $this->assign('iter_row', $this->_foreach['rowF']['iteration']-1); ?>
    			<tr class="body<?php if ($this->_foreach['rowF']['iteration']%2 == 0 && ! ($this->_foreach['rowF']['iteration'] <= 1)): ?> highlight<?php endif; ?>">
    				<td class="row-checkbox">
    					<div><input <?php if (isset ( $this->_tpl_vars['sPost']['from_post'] ) && $this->_tpl_vars['sPost']['rows'][$this->_tpl_vars['iter_row']]): ?>checked="checked"<?php elseif (! isset ( $this->_tpl_vars['sPost']['from_post'] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="rows[<?php echo $this->_tpl_vars['iter_row']; ?>
]" data-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
" value="1" value="1" /></div>
    				</td>
    				<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
    					<td><div><?php echo $this->_tpl_vars['listing'][$this->_tpl_vars['field']['Key']]; ?>
</div></td>
    				<?php endforeach; endif; unset($_from); ?>
    			</tr>
    		<?php endforeach; endif; unset($_from); ?>
    		</table>
        </div>

		<?php if ($this->_tpl_vars['grid']['total_pages'] > 1): ?>
			<table class="table">
				<tr>
					<td></td>
					<td class="field">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'export_import') : smarty_modifier_cat($_tmp, 'export_import')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'pagination.tpl') : smarty_modifier_cat($_tmp, 'pagination.tpl')), 'smarty_include_vars' => array('type' => 'export')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</td>
				</tr>
			</table>
		<?php endif; ?>

		<table style="margin-top: 10px;">
		<tr>
			<td style="padding-right: 20px;">
				<span class="purple_13">&larr; </span><a class="cancel" href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
&amp;action=export" style="padding: 0;"><?php echo $this->_tpl_vars['lang']['eil_back_to_export_criteria']; ?>
</a>
			</td>
			<td class="value">
				<input style="margin-top: 0;" type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
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
	<!-- export listings table -->

	<script type="text/javascript">
	var eil_listing_wont_imported = "<?php echo $this->_tpl_vars['lang']['eil_listing_wont_exported']; ?>
";
	var eil_column_wont_imported = "<?php echo $this->_tpl_vars['lang']['eil_column_wont_exported']; ?>
";
	<?php echo '

	$(document).ready(function(){

		eil_colHandler();

		$(\'input[name^=cols]\').click(function(){
			eil_colHandler();
		});

		$(\'input[name^=cols]\').each(function(){
			var index = $(this).closest(\'tr.col-checkbox\').find(\'input\').index(this) + 2;
			var count = 0;
			var empty = 0;
			$(\'table.import tr.body td:nth-child(\'+index+\') div\').each(function(){
				empty += trim($(this).html()) == \'\' ? 1 : 0;
				count ++;
			});

			if ( count == empty )
			{
				$(this).trigger(\'click\');
			}
		});
	});

	'; ?>

	</script>

<?php endif; ?>

<!-- import/export listings tpl end