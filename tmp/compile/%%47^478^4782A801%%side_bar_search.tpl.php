<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:12
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/side_bar_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'reset', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/side_bar_search.tpl', 6, false),array('modifier', 'key', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/side_bar_search.tpl', 6, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/side_bar_search.tpl', 7, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/side_bar_search.tpl', 11, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/side_bar_search.tpl', 52, false),)), $this); ?>
<!-- side bar search form -->

<?php if ($this->_tpl_vars['search_forms'] && $this->_tpl_vars['pageInfo']['Key'] == 'home' || $this->_tpl_vars['pageInfo']['Controller'] == 'listing_type'): ?>
    <?php $this->assign('self_type_form', false); ?>

    <?php if ($this->_tpl_vars['pageInfo']['Key'] == 'home' && is_array ( $this->_tpl_vars['search_forms'] ) && ! ( bool ) preg_match ( '/\_tab[0-9]$/' , key(((is_array($_tmp=$this->_tpl_vars['search_forms'])) ? $this->_run_mod_handler('reset', true, $_tmp) : reset($_tmp))) )): ?>
        <?php $this->assign('self_type_form', ((is_array($_tmp=$this->_tpl_vars['block']['Key'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ltpb_', '') : smarty_modifier_replace($_tmp, 'ltpb_', ''))); ?>
    <?php endif; ?>

    <section class="side_block_search light-inputs">
        <?php if (is_array ( $this->_tpl_vars['search_forms'] ) && count($this->_tpl_vars['search_forms']) > 1 && ! $this->_tpl_vars['self_type_form']): ?>
            <!-- tabs -->
            <ul class="tabs tabs-hash search_tabs">
                <?php $_from = $this->_tpl_vars['search_forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['stabsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stabsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sf_key'] => $this->_tpl_vars['search_form']):
        $this->_foreach['stabsF']['iteration']++;
?><?php $this->assign('zindex', 20); ?>
                    <li id="tab_<?php echo $this->_tpl_vars['sf_key']; ?>
" class="<?php if (($this->_foreach['stabsF']['iteration'] <= 1)): ?>active<?php endif; ?>">
                        <a href="#<?php echo $this->_tpl_vars['sf_key']; ?>
" data-target="<?php echo $this->_tpl_vars['sf_key']; ?>
"><?php echo $this->_tpl_vars['search_form']['name']; ?>
</a>
                    </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <!-- tabs end -->
        <?php endif; ?>

        <?php $this->assign('items_count', 10); ?>

        <div class="search-block-content<?php if (is_array ( $this->_tpl_vars['search_forms'] ) && count($this->_tpl_vars['search_forms']) == 1): ?> no-tabs<?php endif; ?>">
            <?php $_from = $this->_tpl_vars['search_forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sformsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sformsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sf_key'] => $this->_tpl_vars['search_form']):
        $this->_foreach['sformsF']['iteration']++;
?>
                <?php if ($this->_tpl_vars['self_type_form'] && $this->_tpl_vars['search_form']['listing_type'] != $this->_tpl_vars['self_type_form']): ?>
                    <?php continue; ?>
                <?php endif; ?>

                <?php $this->assign('spage_key', $this->_tpl_vars['listing_types'][$this->_tpl_vars['search_form']['listing_type']]['Page_key']); ?>
                <?php $this->assign('post_form_key', $this->_tpl_vars['sf_key']); ?>

                <?php if (count($this->_tpl_vars['search_forms']) > 1): ?>
                    <div id="area_<?php echo $this->_tpl_vars['sf_key']; ?>
" class="search_tab_area<?php if (! ($this->_foreach['sformsF']['iteration'] <= 1)): ?> hide<?php endif; ?>">
                <?php endif; ?>

                <form method="<?php echo $this->_tpl_vars['listing_types'][$this->_tpl_vars['search_form']['listing_type']]['Submit_method']; ?>
" action="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['spage_key']]; ?>
<?php if ($this->_tpl_vars['category']['ID'] > 0): ?>/<?php echo $this->_tpl_vars['category']['Path']; ?>
<?php endif; ?>/<?php echo $this->_tpl_vars['search_results_url']; ?>
.html<?php else: ?>?page=<?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['spage_key']]; ?>
&<?php echo $this->_tpl_vars['search_results_url']; ?>
<?php if ($this->_tpl_vars['category']['ID'] > 0): ?>&category=<?php echo $this->_tpl_vars['category']['ID']; ?>
<?php endif; ?><?php endif; ?>">
                    <input type="hidden" name="action" value="search" />
                    <input type="hidden" name="post_form_key" value="<?php echo $this->_tpl_vars['sf_key']; ?>
" />

                    <div class="scroller<?php if ($this->_tpl_vars['block']['Side'] == 'top' || $this->_tpl_vars['block']['Side'] == 'bottom'): ?> row<?php endif; ?>">
                        <?php if ($this->_tpl_vars['search_form']['arrange_field']): ?>
                            <input type="hidden" name="f[<?php echo $this->_tpl_vars['search_form']['arrange_field']; ?>
]" value="<?php echo $this->_tpl_vars['search_form']['arrange_value']; ?>
" />
                        <?php endif; ?>

                        <?php echo ''; ?><?php $_from = $this->_tpl_vars['search_form']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['qsearchF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['qsearchF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['qsearchF']['iteration']++;
?><?php echo ''; ?><?php if ($this->_tpl_vars['block']['Side'] == 'top' || $this->_tpl_vars['block']['Side'] == 'bottom'): ?><?php echo '<div class="col-md-'; ?><?php if ($this->_tpl_vars['side_bar_exists']): ?><?php echo '4'; ?><?php else: ?><?php echo '3'; ?><?php endif; ?><?php echo ' mb-3">'; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fields_search_box.tpl') : smarty_modifier_cat($_tmp, 'fields_search_box.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['group']['Fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['block']['Side'] == 'top' || $this->_tpl_vars['block']['Side'] == 'bottom'): ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>


                        <?php if ($this->_tpl_vars['group']['With_picture']): ?>
                        <div class="search-item<?php if ($this->_tpl_vars['block']['Side'] == 'top' || $this->_tpl_vars['block']['Side'] == 'bottom'): ?> col-md-<?php if ($this->_tpl_vars['side_bar_exists']): ?>4<?php else: ?>3<?php endif; ?> mt-2<?php endif; ?>">
                            <label>
                                <input name="f[with_photo]" type="checkbox" value="true" />
                                <?php echo $this->_tpl_vars['lang']['with_photos_only']; ?>

                            </label>
                        </div>
                        <?php endif; ?>

                        <?php echo '<div class="search-button'; ?><?php if ($this->_tpl_vars['block']['Side'] == 'top' || $this->_tpl_vars['block']['Side'] == 'bottom'): ?><?php echo ' col-md-'; ?><?php if ($this->_tpl_vars['side_bar_exists']): ?><?php echo '4'; ?><?php else: ?><?php echo '3'; ?><?php endif; ?><?php echo ' pt-0 ml-auto'; ?><?php endif; ?><?php echo '"><input type="submit" name="search" value="'; ?><?php echo $this->_tpl_vars['lang']['search']; ?><?php echo '" />'; ?><?php if (! $this->_tpl_vars['in_category_search'] && $this->_tpl_vars['listing_types'][$this->_tpl_vars['search_form']['listing_type']]['Advanced_search'] && $this->_tpl_vars['listing_types'][$this->_tpl_vars['search_form']['listing_type']]['Advanced_search_availability']): ?><?php echo '<a title="'; ?><?php echo $this->_tpl_vars['lang']['advanced_search']; ?><?php echo '" href="'; ?><?php echo $this->_tpl_vars['rlBase']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['spage_key']]; ?><?php echo '/'; ?><?php echo $this->_tpl_vars['advanced_search_url']; ?><?php echo '.html'; ?><?php else: ?><?php echo '?page='; ?><?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['spage_key']]; ?><?php echo '&amp;'; ?><?php echo $this->_tpl_vars['advanced_search_url']; ?><?php echo ''; ?><?php endif; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['lang']['advanced_search']; ?><?php echo '</a>'; ?><?php endif; ?><?php echo '</div>'; ?>

                    </div>
                </form>

                <?php if (count($this->_tpl_vars['search_forms']) > 1): ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </div>
    </section>
<?php endif; ?>

<!-- side bar search form end -->