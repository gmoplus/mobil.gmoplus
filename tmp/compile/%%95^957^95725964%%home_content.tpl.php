<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:20
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl', 4, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl', 9, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl', 29, false),array('modifier', 'implode', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl', 33, false),array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl', 96, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl', 19, false),array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl', 46, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/home_content.tpl', 74, false),)), $this); ?>
<!-- home page content tpl -->

<?php if ($this->_tpl_vars['home_slides']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'content_slider.tpl') : smarty_modifier_cat($_tmp, 'content_slider.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<section class="point1 m-auto position-relative horizontal-search<?php if ($this->_tpl_vars['plugins']['search_by_distance']): ?> sbd-exists<?php endif; ?>">
    <?php if (is_array ( $this->_tpl_vars['category_dropdown_types'] )): ?>
        <?php $this->assign('cdt_count', count($this->_tpl_vars['category_dropdown_types'])); ?>

        <?php if ($this->_tpl_vars['cdt_count'] == 1): ?>
            <?php $this->assign('spage_key', $this->_tpl_vars['listing_types'][$this->_tpl_vars['category_dropdown_types']['0']]['Page_key']); ?>
            <?php $this->assign('spage_path', $this->_tpl_vars['pages'][$this->_tpl_vars['spage_key']]); ?>
        <?php elseif ($this->_tpl_vars['cdt_count'] > 1): ?>
            <?php $this->assign('spage_path', ('{')."type".('}')); ?>
        <?php endif; ?>
    <?php endif; ?>

    <form class="pl-4 pr-4 pt-4 pb-4 w-100" accesskey="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'search'), $this);?>
#keyword_tab" method="post" action="<?php if ($this->_tpl_vars['cdt_count'] == 0): ?><?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'search'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['spage_path']; ?>
/<?php echo $this->_tpl_vars['search_results_url']; ?>
.html<?php else: ?>?page=<?php echo $this->_tpl_vars['spage_path']; ?>
&<?php echo $this->_tpl_vars['search_results_url']; ?>
<?php endif; ?><?php endif; ?>">
        <input type="hidden" name="action" value="search" />
        <input type="hidden" name="form" value="keyword_search" />
        <input type="hidden" name="post_form_key" value="<?php if ($this->_tpl_vars['cdt_count'] == 1): ?><?php echo $this->_tpl_vars['category_dropdown_types']['0']; ?>
_<?php if ($this->_tpl_vars['listing_types'][$this->_tpl_vars['category_dropdown_types']['0']]['Advanced_search']): ?>advanced<?php else: ?>quick<?php endif; ?><?php endif; ?>" />

        <div class="d-flex flex-column flex-md-row cd-form">
            <?php $this->assign('any_replace', ('{')."field".('}')); ?>

            <?php if ($this->_tpl_vars['cdt_count'] > 0): ?>
                <select name="f[Category_ID]" class="cd-dropdown mr-1">
                    <option value=""><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['any_field_value'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['any_replace'], $this->_tpl_vars['lang']['category']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['any_replace'], $this->_tpl_vars['lang']['category'])); ?>
</option>
                </select>

                <script class="fl-js-dynamic">
                var categoryDropdownTypes = <?php if ($this->_tpl_vars['cdt_count'] == 1): ?>'<?php echo $this->_tpl_vars['category_dropdown_types']['0']; ?>
'<?php elseif (is_array ( $this->_tpl_vars['category_dropdown_types'] )): ?>Array('<?php echo implode("', '", $this->_tpl_vars['category_dropdown_types']); ?>
')<?php else: ?>''<?php endif; ?>;
                var categoryDropdownData = null;

                <?php if ($this->_tpl_vars['cdt_count'] > 1): ?>
                    categoryDropdownData = new Array();
                    <?php $_from = $this->_tpl_vars['category_dropdown_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fSearchForms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fSearchForms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dropdown_type']):
        $this->_foreach['fSearchForms']['iteration']++;
?>
                        <?php $this->assign('type_page_key', $this->_tpl_vars['listing_types'][$this->_tpl_vars['dropdown_type']]['Page_key']); ?>

                        categoryDropdownData.push(<?php echo ' { '; ?>

                            ID: '<?php echo $this->_tpl_vars['dropdown_type']; ?>
',
                            Key: '<?php echo $this->_tpl_vars['dropdown_type']; ?>
',
                            Link_type: '<?php echo $this->_tpl_vars['listing_types'][$this->_tpl_vars['dropdown_type']]['Links_type']; ?>
',
                            Path: '<?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['type_page_key']]; ?>
',
                            name: '<?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => ((is_array($_tmp='pages+name+lt_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['dropdown_type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['dropdown_type']))), $this);?>
',
                            Sub_cat: <?php echo $this->_foreach['fSearchForms']['iteration']; ?>
,
                            Advanced_search: <?php echo $this->_tpl_vars['listing_types'][$this->_tpl_vars['dropdown_type']]['Advanced_search']; ?>

                        <?php echo ' } '; ?>
);
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>

                <?php echo '

                flUtil.loadScript(rlConfig.tpl_base  + \'js/categoryDropdown.js\', function() {
                    $(\'section.horizontal-search select[name="f[Category_ID]"]\').categoryDropdown({
                        listingTypeKey: categoryDropdownTypes,
                        typesData: categoryDropdownData,
                        phrases: { '; ?>

                            no_categories_available: "<?php echo $this->_tpl_vars['lang']['no_categories_available']; ?>
",
                            select: "<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['any_field_value'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['any_replace'], $this->_tpl_vars['lang']['category']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['any_replace'], $this->_tpl_vars['lang']['category'])); ?>
",
                            select_category: "<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['any_field_value'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['any_replace'], $this->_tpl_vars['lang']['category']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['any_replace'], $this->_tpl_vars['lang']['category'])); ?>
"
                        <?php echo ' }
                    });
                });

                '; ?>

                </script>
            <?php endif; ?>

            <input class="tags-autocomplete flex-fill" type="text" placeholder="<?php echo $this->_tpl_vars['lang']['keyword_search_hint']; ?>
" name="f[keyword_search]" />

            <?php if ($this->_tpl_vars['aHooks']['search_by_distance']): ?>
                <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'search_by_distance/static/lib.js') : smarty_modifier_cat($_tmp, 'search_by_distance/static/lib.js'))), $this);?>

                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'search_by_distance') : smarty_modifier_cat($_tmp, 'search_by_distance')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'config.js.tpl') : smarty_modifier_cat($_tmp, 'config.js.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                <script class="fl-js-dynamic">
                var sbd_zip_field = '<?php echo $this->_tpl_vars['config']['sbd_zip_field']; ?>
';

                <?php echo '
                    $(function(){
                        if (typeof sbdLocationAutocomplete != \'undefined\') {
                            sbdLocationAutocomplete(\'.horizontal-search.sbd-exists input#location_search\', sbd_zip_field);
                        }
                    });
                    '; ?>

                    </script>

                    <input class="flex-fill"
                           type="text"
                           placeholder="<?php if ($this->_tpl_vars['config']['sbd_search_mode'] == 'mixed'): ?><?php echo $this->_tpl_vars['lang']['sbd_location_search_hint']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['sbd_zipcode']; ?>
<?php endif; ?>"
                           name="f[<?php echo $this->_tpl_vars['config']['sbd_zip_field']; ?>
][zip]"
                           id="location_search" />
                    <input type="hidden"
                           name="f[<?php echo $this->_tpl_vars['config']['sbd_zip_field']; ?>
][distance]"
                           value="<?php $this->assign('sbd_distance', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['config']['sbd_distance_items']) : explode($_tmp, $this->_tpl_vars['config']['sbd_distance_items']))); ?><?php echo $this->_tpl_vars['sbd_distance']['1']; ?>
" />

                    <input type="hidden" name="f[<?php echo $this->_tpl_vars['config']['sbd_zip_field']; ?>
][lat]" />
                    <input type="hidden" name="f[<?php echo $this->_tpl_vars['config']['sbd_zip_field']; ?>
][lng]" />
            <?php endif; ?>

            <input class="ml-0 ml-md-1" type="submit" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" />
        </div>
    </form>
</section>

<!-- home page content tpl end -->