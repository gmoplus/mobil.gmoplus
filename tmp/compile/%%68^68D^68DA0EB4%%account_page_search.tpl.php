<?php /* Smarty version 2.6.31, created on 2025-07-12 21:32:45
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/account_page_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/account_page_search.tpl', 6, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/account_page_search.tpl', 11, false),array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/account_page_search.tpl', 11, false),)), $this); ?>
<!-- account page listing search -->

<span class="expander"></span>

<section class="side_block_search">
    <div class="search-item single-field<?php if (count($this->_tpl_vars['search_forms']) == 1): ?> hide<?php endif; ?>">
        <select id="search_type_select" name="search_type" class="w-100">
            <?php $_from = $this->_tpl_vars['search_forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['search_form']):
?>
                <option value="<?php echo $this->_tpl_vars['search_form']['0']['Listing_type']; ?>
"
                    <?php if ($this->_tpl_vars['selected_search_type'] == $this->_tpl_vars['search_form']['0']['Listing_type']): ?>selected="selected"<?php endif; ?>>
                    <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => ((is_array($_tmp='listing_types+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['search_form']['0']['Listing_type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['search_form']['0']['Listing_type']))), $this);?>

                </option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    </div>

    <div id="search-forms">
        <?php $_from = $this->_tpl_vars['search_forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['searchForms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['searchForms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sf_key'] => $this->_tpl_vars['search_form']):
        $this->_foreach['searchForms']['iteration']++;
?>
            <div id="area_<?php echo $this->_tpl_vars['sf_key']; ?>
" class="search-form-area<?php if (! ( ( $this->_tpl_vars['selected_search_type'] && $this->_tpl_vars['selected_search_type'] == $this->_tpl_vars['sf_key'] ) || ( ! $this->_tpl_vars['selected_search_type'] && ($this->_foreach['searchForms']['iteration'] <= 1) ) )): ?> hide<?php endif; ?>">
                <form method="post" 
                      action="<?php echo $this->_tpl_vars['account']['Personal_address']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['search_results_url']; ?>
.html<?php else: ?>&<?php echo $this->_tpl_vars['search_results_url']; ?>
<?php endif; ?>"
                      id="form_<?php echo $this->_tpl_vars['sf_key']; ?>
">
                    <input type="hidden" name="form_key" value="<?php echo $this->_tpl_vars['search_form']['0']['Form_key']; ?>
" />
                    <input type="hidden" name="listing_type_key" value="<?php echo $this->_tpl_vars['search_form']['0']['Listing_type']; ?>
" />

                    <?php $_from = $this->_tpl_vars['search_form']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
                        <?php if ($this->_tpl_vars['group']['Fields']['0']['Key'] == 'posted_by'): ?>
                            <?php continue; ?>
                        <?php endif; ?>

                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fields_search_box.tpl') : smarty_modifier_cat($_tmp, 'fields_search_box.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['group']['Fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endforeach; endif; unset($_from); ?>

                    <div class="search-footer">
                        <?php if ($this->_tpl_vars['group']['With_picture']): ?>
                        <div class="search-item">
                            <div class="field"></div>
                            <label><input <?php if ($_REQUEST['f']['with_photo']): ?>checked="checked"<?php endif; ?> type="checkbox" name="f[with_photo]" value="true" /> <?php echo $this->_tpl_vars['lang']['with_photos_only']; ?>
</label>
                        </div>
                        <?php endif; ?>

                        <div class="align-button">
                            <input class="search_field_item button" type="submit" name="search" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" />
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</section>

<script class="fl-js-dynamic">
<?php echo '

$(function(){
    var $formsContainer = $(\'#search-forms\');

    $(\'#search_type_select\').change(function(){
        var val = $(this).val();
        var $area = $formsContainer.find(\'#area_\' + val);
        var $form = $formsContainer.find(\'#form_\' + val);

        $formsContainer.find(\'.search-form-area:not(.hide)\').addClass(\'hide\');

        $area.removeClass(\'hide\');
        $form.find(\'.search-item select\').each(function(){
            $(this).val($(this).find(\'option:first\').val());
        });
        $form.find(\'.search-item input\').val(\'\');
    });
});

'; ?>

</script>

<!-- account page listing search end -->