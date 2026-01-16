<?php /* Smarty version 2.6.31, created on 2025-10-18 19:33:55
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/listing_status/admin/watermark.tpl */ ?>
<?php if ($this->_tpl_vars['watermark']): ?>
	<table>
		<tr>
			<td>
			<div class="status_box">
				<input type="hidden" name="watermark<?php if ($this->_tpl_vars['large']): ?>Large<?php endif; ?>[<?php echo $this->_tpl_vars['code']; ?>
]" value="<?php echo $this->_tpl_vars['watermark']; ?>
"/>
				<img class="status" src="<?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
files/watermark/<?php echo $this->_tpl_vars['watermark']; ?>
">
                <img src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" class="delete_item" alt="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" title="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" data-key="<?php echo $this->_tpl_vars['sPost']['key']; ?>
" data-code="<?php echo $this->_tpl_vars['code']; ?>
" data-watermark="<?php echo $this->_tpl_vars['watermark']; ?>
" data-large="<?php echo $this->_tpl_vars['large']; ?>
" />

			</div>
			</td>
			<td>
				<span class="field_description_noicon"><?php if ($this->_tpl_vars['large']): ?><?php echo $this->_tpl_vars['lang']['ls_label_large']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['ls_label']; ?>
<?php endif; ?></span>
			</td>
		</tr>
	</table>
<?php else: ?>
	<input type="file" name="watermark<?php if ($this->_tpl_vars['large']): ?>Large<?php endif; ?>[<?php echo $this->_tpl_vars['code']; ?>
]" accept="image/*" />
	<span class="field_description_noicon"><?php if ($this->_tpl_vars['large']): ?><?php echo $this->_tpl_vars['lang']['ls_label_large']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['ls_label']; ?>
<?php endif; ?></span><span class="field_description"><?php if ($this->_tpl_vars['large']): ?><?php echo $this->_tpl_vars['lang']['ls_watermarks_large_label_hint']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['ls_watermarks_label_hint']; ?>
<?php endif; ?></span>
<?php endif; ?>