<?php /* Smarty version 2.6.31, created on 2025-08-09 11:09:07
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 92, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 124, false),array('modifier', 'strlen', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 214, false),array('modifier', 'regex_replace', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 214, false),array('modifier', 'escape', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 216, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 345, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 410, false),array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 107, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/export_import/controller.tpl', 410, false),)), $this); ?>
<!-- excel export/ import | RESPONSIVE -->
<?php $this->assign('sPost', $_POST); ?>
<script>
	var rlUrlHome = "<?php echo $this->_tpl_vars['rlBase']; ?>
";
</script>
<!-- tabs -->
<?php if (! $this->_tpl_vars['iel_action']): ?>
	<ul class="tabs">
		<?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tab']):
        $this->_foreach['tabF']['iteration']++;
?><?php echo '<li class="'; ?><?php if (( $this->_tpl_vars['sPost']['action'] == 'export_condition' || isset ( $_GET['refine'] ) ) && $this->_tpl_vars['tab']['key'] == 'export'): ?><?php echo 'active '; ?><?php elseif (( $this->_tpl_vars['sPost']['action'] != 'export_condition' && ! isset ( $_GET['refine'] ) ) && $this->_tpl_vars['tab']['key'] == 'import'): ?><?php echo 'active '; ?><?php endif; ?><?php echo '" id="tab_'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '"><a href="#'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '" data-target="'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['tab']['name']; ?><?php echo '</a></li>'; ?>
<?php endforeach; endif; unset($_from); ?>
	</ul>
<?php endif; ?>
<!-- tabs end -->

<div class="content-padding eil">
	<a href="#" id="line_color" class="hide"></a>
	<?php if (! $this->_tpl_vars['iel_action']): ?>
		<!-- import/export forms -->
		<div id="area_import" class="tab_area<?php if ($this->_tpl_vars['sPost']['action'] == 'export_condition' || isset ( $_GET['refine'] )): ?> hide<?php endif; ?>">
			<?php if (! $this->_tpl_vars['prevent_import_export'] && ! $this->_tpl_vars['prevent_import']): ?>
				<form action="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
.html<?php else: ?>?page=<?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="action" value="import_file" />

					<div class="submit-cell">
						<div class="name"><?php echo $this->_tpl_vars['lang']['eil_file_for_import']; ?>
</div>
						<div class="field single-field">
							<div class="file-input">
								<input type="file" class="file ei-selecting-file" name="file" />
								<input type="text" class="file-name" name="" />
								<span><?php echo $this->_tpl_vars['lang']['choose']; ?>
</span>
							</div>

							<div style="padding: 2px 0 10px;"><?php echo $this->_tpl_vars['lang']['eil_file_for_import_desc']; ?>
</div>
						</div>
					</div>

					<div class="submit-cell">
						<div class="name"><?php echo $this->_tpl_vars['lang']['eil_pictures_archive']; ?>
</div>
						<div class="field single-field">
							<div class="file-input">
								<input type="file" class="file ei-selecting-file" name="archive" />
								<input type="text" class="file-name" name="" />
								<span><?php echo $this->_tpl_vars['lang']['choose']; ?>
</span>
							</div>

							<div style="padding: 2px 0 10px;"><?php echo $this->_tpl_vars['lang']['eil_max_file_size']; ?>
 <b><?php echo $this->_tpl_vars['max_file_size']; ?>
 MB</b></div>
						</div>
					</div>

					<div class="submit-cell">
						<div class="name"></div>
						<div class="field"><input name="" type="submit" value="<?php echo $this->_tpl_vars['lang']['upload']; ?>
" /></div>
					</div>
				</form>
			<?php else: ?>
				<?php if ($this->_tpl_vars['prevent_import_export']): ?>
					<?php echo $this->_tpl_vars['lang']['iel_cantimport']; ?>

				<?php else: ?>
					<?php echo $this->_tpl_vars['lang']['iel_account_type_cant_import']; ?>

				<?php endif; ?>
			<?php endif; ?>
		</div>

		<!-- export conditions -->
		<div id="area_export" class="tab_area<?php if ($this->_tpl_vars['sPost']['action'] != 'export_condition' && ! isset ( $_GET['refine'] )): ?> hide<?php endif; ?>">
		<?php if (! $this->_tpl_vars['prevent_export']): ?>
		<form action="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
.html<?php else: ?>?page=<?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="export_condition" />
				<input type="hidden" name="from_post" value="1" />

				<div class="submit-cell">
					<div class="name"><?php echo $this->_tpl_vars['lang']['eil_file_format']; ?>
 <span class="red">*</span></div>
					<div class="field single-field">
						<select name="export_format">
							<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
							<option <?php if ($this->_tpl_vars['sPost']['export_format'] == 'xls'): ?>selected="selected"<?php endif; ?> value="xls"><?php echo $this->_tpl_vars['lang']['eil_xls']; ?>
</option>
                            <option <?php if ($this->_tpl_vars['sPost']['export_format'] == 'xlsx'): ?>selected="selected"<?php endif; ?> value="xlsx"><?php echo $this->_tpl_vars['lang']['eil_xlsx']; ?>
</option>
							<option <?php if ($this->_tpl_vars['sPost']['export_format'] == 'csv'): ?>selected="selected"<?php endif; ?> value="csv"><?php echo $this->_tpl_vars['lang']['eil_csv']; ?>
</option>
						</select>
					</div>
				</div>

				<div class="submit-cell">
					<div class="name"><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
 <span class="red">*</span></div>
					<div class="field single-field">
						<select name="export_listing_type">
							<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
							<?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
								<?php if (((is_array($_tmp=$this->_tpl_vars['l_type']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['account_info']['Abilities']) : in_array($_tmp, $this->_tpl_vars['account_info']['Abilities']))): ?>
									<option <?php if ($this->_tpl_vars['sPost']['export_listing_type'] == $this->_tpl_vars['l_type']['Key']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
"><?php echo $this->_tpl_vars['l_type']['name']; ?>
</option>
								<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
						</select>
					</div>
				</div>

				<div class="submit-cell">
					<div class="name"><?php echo $this->_tpl_vars['lang']['category']; ?>
</div>
					<div class="field single-field">
						<select name="export_category_id">
							<option value=""><?php if ($this->_tpl_vars['categories']): ?><?php echo $this->_tpl_vars['lang']['select']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['eil_select_listing_type']; ?>
<?php endif; ?></option>
							<?php if ($this->_tpl_vars['categories']): ?>
								<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
									<option <?php if ($this->_tpl_vars['category']['Level'] == 0): ?>class="highlight_opt"<?php endif; ?> <?php if ($this->_tpl_vars['category']['margin']): ?>style="margin-left: <?php echo $this->_tpl_vars['category']['margin']; ?>
px;"<?php endif; ?> value="<?php echo $this->_tpl_vars['category']['ID']; ?>
" <?php if ($this->_tpl_vars['sPost']['export_category_id'] == $this->_tpl_vars['category']['ID']): ?>selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => $this->_tpl_vars['category']['pName']), $this);?>
</option>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</select>
					</div>
				</div>

				<div class="submit-cell">
					<div class="name"><?php echo $this->_tpl_vars['lang']['posted_date']; ?>
</div>
					<div class="field two-fields">
						<input name="export_date_from" placeholder="<?php echo $this->_tpl_vars['lang']['from']; ?>
" type="text" value="<?php echo $this->_tpl_vars['sPost']['export_date_from']; ?>
" size="12" maxlength="10" id="date_from" />
						<input name="export_date_to" placeholder="<?php echo $this->_tpl_vars['lang']['to']; ?>
" type="text" value="<?php echo $this->_tpl_vars['sPost']['export_date_to']; ?>
" size="12" maxlength="10" id="date_to" />
					</div>
				</div>

				<div id="export_table" style="margin-top: 10px;">
					<?php if ($this->_tpl_vars['fields']): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'export_import') : smarty_modifier_cat($_tmp, 'export_import')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'search.tpl') : smarty_modifier_cat($_tmp, 'search.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
				</div>

				<div class="submit-cell buttons">
					<div class="name"></div>
					<div class="field"><input type="submit" name="" value="<?php echo $this->_tpl_vars['lang']['eil_export']; ?>
" /></div>
				</div>
			</form>

			<script class="fl-js-dynamic">//<![CDATA[
				var eil_select_listing_type = "<?php echo $this->_tpl_vars['lang']['eil_select_listing_type']; ?>
";
				<?php echo '

				$(document).ready(function(){
					$(\'select[name=export_listing_type]\').change(function(){
						eil_typeHandler($(this).val(), \'export_category_id\');
					});

                    flUtil.loadStyle(rlConfig[\'tpl_base\'] + \'css/jquery.ui.css\');

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

				//]]>
			</script>
		<?php else: ?>
			<?php echo $this->_tpl_vars['lang']['iel_account_type_cant_import']; ?>

		<?php endif; ?>
		</div>

		<!-- export conditions end -->

	<?php elseif ($this->_tpl_vars['iel_action'] == 'import-table'): ?>

        <?php if ($this->_tpl_vars['sPost']['data'] && is_array ( $this->_tpl_vars['sPost']['data'] )): ?>
    		<!-- import table -->
    		<div class="iel_table">
    			<form id="importing-data" action="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
/import-table<?php if ($_GET['pg']): ?>/index<?php echo $_GET['pg']; ?>
<?php endif; ?>.html<?php else: ?>?page=<?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
&amp;action=import-table<?php endif; ?>" method="post" enctype="multipart/form-data">
    				<input type="hidden" name="action" value="import_form" />
    				<input type="hidden" name="from_post" value="1" />

    				<div class="submit-cell listing-container">
    					<div class="field">
    						<table class="import list">
    							<tr class="col-checkbox no_hover">
    								<td class="divider"></td>
    								<?php $_from = $this->_tpl_vars['sPost']['data']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['checkboxF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['checkboxF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['checkbox']):
        $this->_foreach['checkboxF']['iteration']++;
?>
    									<td>
    										<?php $this->assign('iter_checkbox', $this->_foreach['checkboxF']['iteration']-1); ?>
    										<label><input class="multiline" <?php if (isset ( $this->_tpl_vars['sPost']['data'] ) && $this->_tpl_vars['sPost']['cols'][$this->_tpl_vars['iter_checkbox']]): ?>checked="checked"<?php elseif (! isset ( $this->_tpl_vars['sPost']['data'] )): ?>checked="checked"<?php endif; ?> value="1" type="checkbox"  name="cols[<?php echo $this->_tpl_vars['iter_checkbox']; ?>
]" /></label>
    									</td>
    									<?php if (! ($this->_foreach['checkboxF']['iteration'] == $this->_foreach['checkboxF']['total'])): ?><td class="divider"></td><?php endif; ?>
    								<?php endforeach; endif; unset($_from); ?>
    							</tr>
    							<tr class="header no_hover">
    								<td class="row-checkbox no-style"></td>
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
</span>
    											<select name="field[<?php echo $this->_tpl_vars['iter_field']; ?>
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
    									<?php if (! ($this->_foreach['fieldF']['iteration'] == $this->_foreach['fieldF']['total'])): ?><td class="divider"></td><?php endif; ?>
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
    								<tr class="body">
    									<td class="row-checkbox">
    									</td>
    									<?php $_from = $this->_tpl_vars['sPost']['data'][$this->_sections['rowF']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['colF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['colF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col']):
        $this->_foreach['colF']['iteration']++;
?>
    										<td class="eil-field<?php if (strlen($this->_tpl_vars['col']) > 94 || strlen($this->_tpl_vars['col']) != strlen(((is_array($_tmp=$this->_tpl_vars['col'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/[\r\t\n]/', '') : smarty_modifier_regex_replace($_tmp, '/[\r\t\n]/', '')))): ?> scroll<?php endif; ?>">
    											<div class="hborder">
    												<?php echo ((is_array($_tmp=$this->_tpl_vars['col'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

    											</div>
    										</td>
    										<?php if (! ($this->_foreach['colF']['iteration'] == $this->_foreach['colF']['total'])): ?><td class="divider"></td><?php endif; ?>
    									<?php endforeach; endif; unset($_from); ?>
    								</tr>
    							<?php endfor; endif; ?>
    						</table>
    					</div>
    				</div>
    				<?php if ($this->_tpl_vars['grid']['total_pages'] > 1): ?>
                        <div class="ralign">
    					   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'export_import') : smarty_modifier_cat($_tmp, 'export_import')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'pagination.tpl') : smarty_modifier_cat($_tmp, 'pagination.tpl')), 'smarty_include_vars' => array('type' => 'import')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </div>
    				<?php endif; ?>
    				<div class="submit-cell options-start">
    					<div class="name"><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
 <span class="red">*</span></div>
    					<div class="field">
    						<select class="w200" name="import_listing_type">
    							<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
    							<?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
    								<?php if (((is_array($_tmp=$this->_tpl_vars['l_type']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['account_info']['Abilities']) : in_array($_tmp, $this->_tpl_vars['account_info']['Abilities']))): ?>
    									<option <?php if ($this->_tpl_vars['sPost']['import_listing_type'] == $this->_tpl_vars['l_type']['Key']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
"><?php echo $this->_tpl_vars['l_type']['name']; ?>
</option>
    								<?php endif; ?>
    							<?php endforeach; endif; unset($_from); ?>
    						</select>
    					</div>
    				</div>

    				<div class="submit-cell">
    					<div class="name"><?php echo $this->_tpl_vars['lang']['eil_default_category']; ?>
 <span class="red">*</span></div>
    					<div class="field">
    						<select class="w200" name="import_category_id">
    							<option value=""><?php if ($this->_tpl_vars['categories']): ?><?php echo $this->_tpl_vars['lang']['select']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['eil_select_listing_type']; ?>
<?php endif; ?></option>
    							<?php if ($this->_tpl_vars['categories']): ?>
    								<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
    									<option <?php if ($this->_tpl_vars['category']['Level'] == 0): ?>class="highlight_option"<?php endif; ?> <?php if ($this->_tpl_vars['category']['margin']): ?>style="margin-left: <?php echo $this->_tpl_vars['category']['margin']; ?>
px;"<?php endif; ?> value="<?php echo $this->_tpl_vars['category']['ID']; ?>
" <?php if ($this->_tpl_vars['sPost']['import_category_id'] == $this->_tpl_vars['category']['ID']): ?>selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => $this->_tpl_vars['category']['pName']), $this);?>
</option>
    								<?php endforeach; endif; unset($_from); ?>
    							<?php endif; ?>
    						</select>
    					</div>
    				</div>

    				<div class="submit-cell">
    					<div class="name"><?php echo $this->_tpl_vars['lang']['eil_default_status']; ?>
 <span class="red">*</span></div>
    					<div class="field">
    						<select class="w200" name="import_status">
    							<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
    							<option value="active" <?php if ($this->_tpl_vars['sPost']['import_status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
    							<option value="approval" <?php if ($this->_tpl_vars['sPost']['import_status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
    						</select>
    					</div>
    				</div>
    				<?php if (! $this->_tpl_vars['block_plan_import']): ?>
                        <?php $this->assign('max_import', "max-import"); ?>

    					<div class="submit-cell import-package-informer <?php if (! $_SESSION['eil_import_grid_message']): ?>hide<?php endif; ?>">
    						<input type="hidden" id="max-import" name="max-import" value="<?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['max_import']]): ?><?php echo $this->_tpl_vars['sPost'][$this->_tpl_vars['max_import']]; ?>
<?php endif; ?>">
    						<div class="name"></div>
    						<div class="field informer"><?php echo $_SESSION['eil_import_grid_message']; ?>
</div>
    					</div>
    					<div class="submit-cell">
    						<div class="name"><?php echo $this->_tpl_vars['lang']['eil_default_plan']; ?>
 <span class="red">*</span></div>
    						<div class="field">
    							<select id="import_plan_id" class="w200" name="import_plan_id">
    								<option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
    								<?php if ($this->_tpl_vars['plans']): ?>
    									<?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plan']):
?>
    										<?php $this->assign('plan_type', ((is_array($_tmp=$this->_tpl_vars['plan']['Type'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_plan') : smarty_modifier_cat($_tmp, '_plan'))); ?>
    										<option value="<?php echo $this->_tpl_vars['plan']['ID']; ?>
" <?php if ($this->_tpl_vars['sPost']['import_plan_id'] == $this->_tpl_vars['plan']['ID']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['plan']['name']; ?>
 (<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['plan_type']]; ?>
) - <?php if ($this->_tpl_vars['plan']['Price']): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php echo $this->_tpl_vars['plan']['Price']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['free']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['plan']['is_bought']): ?> (<?php echo $this->_tpl_vars['lang']['eil_owned']; ?>
)<?php endif; ?></option>
    									<?php endforeach; endif; unset($_from); ?>
    								<?php endif; ?>
    							</select>
    						</div>
    					</div>
    				<?php endif; ?>

    				<div class="submit-cell">
    					<div class="name"><?php echo $this->_tpl_vars['lang']['eil_per_run']; ?>
</div>
    					<div class="field">
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
    					</div>
    				</div>

    				<div class="submit-cell buttons">
    					<div class="name"></div>
    					<div class="field"><input type="submit" name="" value="<?php echo $this->_tpl_vars['lang']['eil_import']; ?>
" /></div>
    				</div>
    			</form>

    			<div class="import_note">
    				<div><?php echo $this->_tpl_vars['lang']['eil_pictures_by_url_note']; ?>
</div>
    				<div><?php echo $this->_tpl_vars['lang']['eil_youtube_video_field_note']; ?>
</div>
    			</div>
    		</div>
    		<!-- import table end -->

    		<script class="fl-js-dynamic">//<![CDATA[
    			importExport.phrases['eil_default_view'] = "<?php echo $this->_tpl_vars['lang']['eil_default_view']; ?>
";
    			importExport.phrases['eil_import_table'] = "<?php echo $this->_tpl_vars['lang']['eil_import_table']; ?>
";
    			importExport.phrases['eil_free_listing'] = "<?php echo $this->_tpl_vars['lang']['eil_free_listing']; ?>
";
    			importExport.phrases['eil_prepaid_package'] = "<?php echo $this->_tpl_vars['lang']['eil_prepaid_package']; ?>
";
    			importExport.phrases['used_up'] = "<?php echo $this->_tpl_vars['lang']['used_up']; ?>
";
    			importExport.phrases['powered_by'] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['powered_by'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
";
    			importExport.phrases['copy_rights'] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['copy_rights'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
";
    			importExport.phrases['unlimited'] = "<?php echo $this->_tpl_vars['lang']['unlimited']; ?>
";
    			importExport.phrases['number_left'] = "<?php echo $this->_tpl_vars['lang']['number_left']; ?>
";
    			tplSetting = '<?php echo $this->_tpl_vars['tpl_settings']; ?>
';

    			<?php $_from = $this->_tpl_vars['user_plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user_plan']):
?>
    			importExport.plans[<?php echo $this->_tpl_vars['user_plan']['ID']; ?>
] = new Array();
    			<?php $_from = $this->_tpl_vars['user_plan']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plan_field'] => $this->_tpl_vars['plan_value']):
?>
    			importExport.plans[<?php echo $this->_tpl_vars['user_plan']['ID']; ?>
]['<?php echo $this->_tpl_vars['plan_field']; ?>
'] = <?php if (is_numeric ( $this->_tpl_vars['plan_value'] )): ?><?php echo $this->_tpl_vars['plan_value']; ?>
<?php else: ?>'<?php echo $this->_tpl_vars['plan_value']; ?>
'<?php endif; ?>;
    			<?php endforeach; endif; unset($_from); ?>
    			<?php endforeach; endif; unset($_from); ?>

    			var eil_listing_wont_imported = "<?php echo $this->_tpl_vars['lang']['eil_listing_wont_imported']; ?>
";
    			var eil_column_wont_imported = "<?php echo $this->_tpl_vars['lang']['eil_column_wont_imported']; ?>
";
    			var eil_select_listing_type = "<?php echo $this->_tpl_vars['lang']['eil_select_listing_type']; ?>
";

    			var allow_match = <?php if ($_POST['from_post'] || isset ( $_GET['edit'] )): ?>false<?php else: ?>true<?php endif; ?>;
    			var matched_fields = 0;
    			var listings_count = <?php if ($this->_tpl_vars['sPost']['data'] && count($this->_tpl_vars['sPost']['data'])): ?><?php echo count($this->_tpl_vars['sPost']['data']); ?>
<?php else: ?>0<?php endif; ?>;
    			var hide_first = <?php if ($this->_tpl_vars['sPost']['hide_first']): ?>true<?php else: ?>false<?php endif; ?>;
    			<?php echo '

    			$(document).ready(function(){
    				eil_rowHandler();
    				eil_colHandler();
    				eil_status();
    				importExport.modeSwitcher();
    				importExport.plansHandler();

    				$(\'input[name^=rows]\').click(function(){
    					var index = $(\'table.import tr.body td.row-checkbox input\').index(this);
    					eil_rowHandler(index);
    				});
    				$(\'input[name^=cols]\').click(function(){
    					eil_colHandler();
    				});

    				$(\'select[name=import_listing_type]\').change(function(){
    					eil_typeHandler($(this).val(), \'import_category_id\');
    				});

    				$(\'select[name=import_status]\').change(function(){
    					eil_status($(this).val());
    				});

    				/* match fields handler */
    				$(\'table.import tr.header td:not(.divider) div\').each(function(){
    					var field = $(this).find(\'span.caption\').text();
    					if ( !$(this).find(\'select\').val() && field )
    					{
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
    						if ( !$(this).find(\'select\').val() )
    						{
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

    			//]]>
    		</script>
        <?php else: ?>
            <?php $this->assign('replace', ('{')."name".('}')); ?>
            <span class="text-notice"><?php echo $this->_tpl_vars['lang']['eil_no_listings']; ?>
 <a href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'xls_export_import'), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['back_to_category'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['bread_crumbs']['1']['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['bread_crumbs']['1']['name'])); ?>
</a></span>
        <?php endif; ?>
	<?php elseif ($this->_tpl_vars['iel_action'] == 'import-preview'): ?>

		<!-- importing -->
		<script class="fl-js-dynamic">//<![CDATA[[
			importExport.phrases['completed'] = "<?php echo $this->_tpl_vars['lang']['eil_completed']; ?>
";
			importExport.config['per_run'] = <?php echo $this->_tpl_vars['import_details']['1']['value']; ?>
;
			//]]>
		</script>

		<table class="table">
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
		</table>

		<div id="import_start_nav">
			<table class="table" style="margin-top: 15px;">
				<tr>
					<td class="name" style="padding-top: 9px;">
						<a class="dark_12" href="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
/import-table.html?edit<?php else: ?>?page=<?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
&amp;action=import-table&amp;edit<?php endif; ?>">&larr;<?php echo $this->_tpl_vars['lang']['eil_back_to_import_form']; ?>
</a>
					</td>
					<td class="value">
						<input id="start_import" type="button" value="<?php echo $this->_tpl_vars['lang']['eil_start']; ?>
" />
					</td>
				</tr>
			</table>
		</div>

		<div id="eil_statistic" class="hide">
			<div class="caption" style="padding-top: 30px"><?php echo $this->_tpl_vars['lang']['eil_importing_caption']; ?>
</div>
			<table class="table">
				<tr>
					<td class="name">
						<?php echo $this->_tpl_vars['lang']['eil_total_listings']; ?>
:
					</td>
					<td class="value"><?php echo $this->_tpl_vars['import_details']['0']['value']; ?>
</td>
				</tr>
			</table>

			<div id="dom_area">
				<table class="table">
					<tr>
						<td class="name">
							<?php echo $this->_tpl_vars['lang']['eil_importing']; ?>
:
						</td>
						<td class="value" id="importing">1-<?php if ($this->_tpl_vars['import_details']['1']['value'] > $this->_tpl_vars['import_details']['0']['value']): ?><?php echo $this->_tpl_vars['import_details']['0']['value']; ?>
<?php else: ?><?php echo $this->_tpl_vars['import_details']['1']['value']; ?>
<?php endif; ?></td>
					</tr>
				</table>
			</div>

			<div class="progress hborder">
				<div>
					<div id="processing" class="highlight_dark search">
						<div id="loading_percent">0%</div>
					</div>
				</div>
			</div>
		</div>

		<!-- importing -->

	<?php elseif ($this->_tpl_vars['iel_action'] == 'export-table'): ?>

		<form action="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
/export-table.html<?php else: ?>?page=<?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
&amp;action=export-table<?php endif; ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="action" value="export_table" />
			<input type="hidden" name="from_post" value="1" />
			<input type="hidden" name="exclude_from_list" id="exclude_from_list" />

			<div class="form-buttons" style="padding: 0 0 30px;">
                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
.html?refine<?php else: ?>?page=<?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
&amp;refine<?php endif; ?>">&larr;<?php echo $this->_tpl_vars['lang']['eil_back_to_export_criteria']; ?>
</a>
                <input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" />
            </div>

			<div class="iel_table">
				<table class="import export list">
					<tr class="col-checkbox no_hover">
						<td></td>
						<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['checkboxF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['checkboxF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['checkbox']):
        $this->_foreach['checkboxF']['iteration']++;
?>
							<td>
								<?php $this->assign('iter_checkbox', $this->_foreach['checkboxF']['iteration']-1); ?>
								<label><input class="multiline" <?php if (isset ( $this->_tpl_vars['sPost']['from_post'] ) && $this->_tpl_vars['sPost']['cols'][$this->_tpl_vars['iter_checkbox']]): ?>checked="checked"<?php elseif (! isset ( $this->_tpl_vars['sPost']['from_post'] )): ?>checked="checked"<?php endif; ?> value="1" type="checkbox" name="cols[<?php echo $this->_tpl_vars['iter_checkbox']; ?>
]" /></label>
							</td>
							<?php if (! ($this->_foreach['checkboxF']['iteration'] == $this->_foreach['checkboxF']['total'])): ?>
								<td></td>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</tr>
					<tr class="header no_hover">
						<td class="no-style"></td>
						<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fieldF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fieldF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field']):
        $this->_foreach['fieldF']['iteration']++;
?>
							<td><div><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['field']['pName']]; ?>
</div></td>
							<?php if (! ($this->_foreach['fieldF']['iteration'] == $this->_foreach['fieldF']['total'])): ?>
								<td class="divider"></td>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</tr>

					<?php $_from = $this->_tpl_vars['export_listings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rowF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rowF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['listing']):
        $this->_foreach['rowF']['iteration']++;
?>
						<?php $this->assign('iter_row', $this->_foreach['rowF']['iteration']-1); ?>
						<tr class="body">
							<td class="row-checkbox">
								<label><input <?php if (isset ( $this->_tpl_vars['sPost']['from_post'] ) && $this->_tpl_vars['sPost']['rows'][$this->_tpl_vars['iter_row']]): ?>checked="checked"<?php elseif (! isset ( $this->_tpl_vars['sPost']['from_post'] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="rows[<?php echo $this->_tpl_vars['iter_row']; ?>
]" data-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
" value="1" /></label>
							</td>
							<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fieldF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fieldF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field']):
        $this->_foreach['fieldF']['iteration']++;
?>
								<td class="eil-field<?php if (strlen($this->_tpl_vars['listing'][$this->_tpl_vars['field']['Key']]) > 65 || strlen($this->_tpl_vars['listing'][$this->_tpl_vars['field']['Key']]) != strlen(((is_array($_tmp=$this->_tpl_vars['listing'][$this->_tpl_vars['field']['Key']])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/[\r\t\n]/', '') : smarty_modifier_regex_replace($_tmp, '/[\r\t\n]/', '')))): ?> scroll<?php elseif (strlen(((is_array($_tmp=$this->_tpl_vars['listing'][$this->_tpl_vars['field']['Key']])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/[\r\t\n]/', '') : smarty_modifier_regex_replace($_tmp, '/[\r\t\n]/', ''))) < 20): ?> inline-nowrap<?php endif; ?>">
                                    <div class="hborder">
                                        <?php echo $this->_tpl_vars['listing'][$this->_tpl_vars['field']['Key']]; ?>

                                    </div>
                                </td>
								<?php if (! ($this->_foreach['fieldF']['iteration'] == $this->_foreach['fieldF']['total'])): ?>
									<td class="divider"></td>
								<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</div>

			<?php if ($this->_tpl_vars['grid']['total_pages'] > 1): ?>
				<div class="two-inline clearfix">
					<div class="name"></div>
					<div class="field">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'export_import') : smarty_modifier_cat($_tmp, 'export_import')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'pagination.tpl') : smarty_modifier_cat($_tmp, 'pagination.tpl')), 'smarty_include_vars' => array('type' => 'export')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="form-buttons">
                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
.html?refine<?php else: ?>?page=<?php echo $this->_tpl_vars['pageInfo']['Path']; ?>
&amp;refine<?php endif; ?>">&larr;<?php echo $this->_tpl_vars['lang']['eil_back_to_export_criteria']; ?>
</a>
                <input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" />
			</div>
		</form>
		<!-- export listings table -->

		<script class="fl-js-dynamic">
			var eil_listing_wont_imported = "<?php echo $this->_tpl_vars['lang']['eil_listing_wont_exported']; ?>
";
			var eil_column_wont_imported = "<?php echo $this->_tpl_vars['lang']['eil_column_wont_exported']; ?>
";
			importExport.phrases['eil_default_view'] = "<?php echo $this->_tpl_vars['lang']['eil_default_view']; ?>
";
			importExport.phrases['eil_import_table'] = "<?php echo $this->_tpl_vars['lang']['eil_export_listings']; ?>
";
			importExport.phrases['powered_by'] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['powered_by'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
";
			importExport.phrases['copy_rights'] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['copy_rights'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
";
			<?php echo '

			$(document).ready(function(){
				eil_rowHandler();
				eil_colHandler();
				importExport.modeSwitcher();

				$(\'input[name^=rows]\').click(function(){
					var index = $(\'table.import tr.body td.row-checkbox input\').index(this);
					eil_rowHandler(index);
				});
				$(\'input[name^=cols]\').click(function(){
					eil_colHandler();
				});

				$(\'input[name^=cols]\').each(function(){
					var index = $(this).closest(\'tr.col-checkbox\').find(\'input\').index(this);
					index = (index * 2) + 2;

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

</div>

<!-- excel export/ import end -->