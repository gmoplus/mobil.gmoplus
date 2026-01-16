<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:14
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/listing_status/label.box.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/label.box.tpl', 12, false),array('function', 'getLabel', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/label.box.tpl', 30, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/label.box.tpl', 12, false),array('modifier', 'strstr', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/label.box.tpl', 16, false),array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/plugins/listing_status/label.box.tpl', 25, false),)), $this); ?>
<!-- display label -->
<?php $this->assign('label_mode', false); ?>
<?php if ($this->_tpl_vars['featured_listing']['Sub_status']): ?>
    <?php $this->assign('listing_label', $this->_tpl_vars['featured_listing']); ?>
<?php elseif ($this->_tpl_vars['listing']['Sub_status']): ?>
    <?php $this->assign('listing_label', $this->_tpl_vars['listing']); ?>
<?php elseif ($this->_tpl_vars['listing_data']['Sub_status']): ?>
    <?php $this->assign('listing_label', $this->_tpl_vars['listing_data']); ?>
    <?php $this->assign('label_mode', true); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['listing_label']['Sub_status_data']): ?>
    <?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'listing_status/static/style.css') : smarty_modifier_cat($_tmp, 'listing_status/static/style.css'))), $this);?>
 
<?php endif; ?>

<?php $this->assign('labels_class', ''); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_settings']['name'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'modern') : strstr($_tmp, 'modern')) || ((is_array($_tmp=$this->_tpl_vars['tpl_settings']['name'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'simple') : strstr($_tmp, 'simple')) || ((is_array($_tmp=$this->_tpl_vars['tpl_settings']['name'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'sun_cocktails') : strstr($_tmp, 'sun_cocktails'))): ?>
    <?php $this->assign('labels_class', 'lb_size-1'); ?>
<?php elseif (((is_array($_tmp=$this->_tpl_vars['tpl_settings']['name'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'escort_nova') : strstr($_tmp, 'escort_nova')) && ! $this->_tpl_vars['label_mode']): ?>
    <?php $this->assign('labels_class', 'lb_enova'); ?>
<?php endif; ?>


<div class="listing_labels <?php echo $this->_tpl_vars['labels_class']; ?>
"><?php echo ''; ?><?php if ($this->_tpl_vars['listing_label']['Sub_status_data']): ?><?php echo ''; ?><?php $this->assign('statuses', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['listing_label']['Sub_status_data']) : explode($_tmp, $this->_tpl_vars['listing_label']['Sub_status_data']))); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['statuses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?><?php echo ''; ?><?php $this->assign('data', $this->_tpl_vars['lb_statuses'][$this->_tpl_vars['item']]); ?><?php echo ''; ?><?php if ($this->_tpl_vars['data']): ?><?php echo ''; ?><?php echo $this->_plugins['function']['getLabel'][0][0]->getLabel(array('assign' => 'label','key' => $this->_tpl_vars['item'],'mode' => $this->_tpl_vars['label_mode']), $this);?><?php echo ''; ?><?php if ($this->_tpl_vars['data']['Watermark_type'] == 'text'): ?><?php echo ''; ?><?php if ($this->_tpl_vars['label']['name']): ?><?php echo '<div class="sub_status sub_status__text sub_status__position-'; ?><?php echo $this->_tpl_vars['data']['Position']; ?><?php echo '" data-name="'; ?><?php echo $this->_tpl_vars['label']['name']; ?><?php echo '"></div>'; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php if ($this->_tpl_vars['label']['img']): ?><?php echo '<div class="sub_status sub_status__img sub_status__position-'; ?><?php echo $this->_tpl_vars['data']['Position']; ?><?php echo '" data-name="'; ?><?php echo $this->_tpl_vars['label']['name']; ?><?php echo '"><img style="background: transparent!important;" src="'; ?><?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?><?php echo 'watermark/'; ?><?php echo $this->_tpl_vars['label']['img']; ?><?php echo '"/></div>'; ?><?php else: ?><?php echo '<div class="sub_status sub_status__text sub_status__position-'; ?><?php echo $this->_tpl_vars['data']['Position']; ?><?php echo '" data-name="'; ?><?php echo $this->_tpl_vars['label']['name']; ?><?php echo '"></div>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</div>

<!-- display label end -->