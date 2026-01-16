<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:20
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/horizontal_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/horizontal_search.tpl', 4, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/horizontal_search.tpl', 27, false),)), $this); ?>
<!-- home page search box tpl -->

<!-- tabs -->
<?php if (count($this->_tpl_vars['search_forms']) > 1): ?>
    <ul class="tabs tabs-hash <?php if (count($this->_tpl_vars['search_forms']) < 5): ?> tabs_count_<?php echo count($this->_tpl_vars['search_forms']); ?>
<?php endif; ?>">
        <?php $_from = $this->_tpl_vars['search_forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['stabsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stabsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sf_key'] => $this->_tpl_vars['search_form']):
        $this->_foreach['stabsF']['iteration']++;
?>
            <li id="tab_<?php echo $this->_tpl_vars['sf_key']; ?>
" class="<?php if (($this->_foreach['stabsF']['iteration'] <= 1)): ?>active<?php endif; ?>">
                <a href="#<?php echo $this->_tpl_vars['sf_key']; ?>
" data-target="<?php echo $this->_tpl_vars['sf_key']; ?>
"><?php echo $this->_tpl_vars['search_form']['name']; ?>
</a>
            </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
<?php endif; ?>
<!-- tabs end -->

<div class="horizontal-search">
    <div class="search-block-content">
        <?php $_from = $this->_tpl_vars['search_forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sformsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sformsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sf_key'] => $this->_tpl_vars['search_form']):
        $this->_foreach['sformsF']['iteration']++;
?>
            <?php $this->assign('spage_key', $this->_tpl_vars['listing_types'][$this->_tpl_vars['search_form']['listing_type']]['Page_key']); ?>
            <?php $this->assign('listing_type', $this->_tpl_vars['listing_types'][$this->_tpl_vars['search_form']['listing_type']]); ?>
            <?php $this->assign('post_form_key', $this->_tpl_vars['sf_key']); ?>
            
            <div id="area_<?php echo $this->_tpl_vars['sf_key']; ?>
" class="search_tab_area<?php if (! ($this->_foreach['sformsF']['iteration'] <= 1)): ?> hide<?php endif; ?>">
                <form name="map-search-form" action="post" target="" accesskey="<?php echo $this->_tpl_vars['search_form']['listing_type']; ?>
"><?php echo '<input type="hidden" name="post_form_key" value="'; ?><?php echo $this->_tpl_vars['post_form_key']; ?><?php echo '" />'; ?><?php $_from = $this->_tpl_vars['search_form']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fields_search_horizontal.tpl') : smarty_modifier_cat($_tmp, 'fields_search_horizontal.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['item']['Fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '<div class="search-form-cell submit"><div><span></span><div><input type="submit" value="'; ?><?php echo $this->_tpl_vars['lang']['search']; ?><?php echo '" /></div></div></div>'; ?>
</form>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>

<!-- home page search box tpl end -->