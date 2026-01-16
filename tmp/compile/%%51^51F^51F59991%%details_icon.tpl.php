<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:47
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/reportBrokenListing/view/details_icon.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'version_compare', '/home/gmoplus/mobil.gmoplus.com/plugins/reportBrokenListing/view/details_icon.tpl', 7, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/reportBrokenListing/view/details_icon.tpl', 8, false),array('function', 'fetch', '/home/gmoplus/mobil.gmoplus.com/plugins/reportBrokenListing/view/details_icon.tpl', 8, false),)), $this); ?>
<!-- report broken listing | listing details icon -->
<?php if (( ! $this->_tpl_vars['account_info'] || $this->_tpl_vars['listing_data']['Account_ID'] !== $this->_tpl_vars['account_info']['ID'] ) && $this->_tpl_vars['pageInfo']['Controller'] == 'listing_details'): ?>
    <li>
        <span data-lid="<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
" title="<?php echo $this->_tpl_vars['lang']['reportbroken_add_in']; ?>
" class="hide link" id="report-broken-listing">
            <?php echo $this->_tpl_vars['lang']['reportbroken_add_in']; ?>

            <span class="rbl-icon ml-1">
                <?php if (((is_array($_tmp=$this->_tpl_vars['config']['rl_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, '4.9.2') : version_compare($_tmp, '4.9.2')) >= 0): ?>
                    <?php echo smarty_function_fetch(array('file' => ((is_array($_tmp=(defined('RL_LIBS') ? @RL_LIBS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'icons/svg-line-set/road-sign-warning.svg') : smarty_modifier_cat($_tmp, 'icons/svg-line-set/road-sign-warning.svg'))), $this);?>

                <?php else: ?>
                    <?php echo smarty_function_fetch(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'reportBrokenListing/static/road-sign-warning.svg') : smarty_modifier_cat($_tmp, 'reportBrokenListing/static/road-sign-warning.svg'))), $this);?>

                <?php endif; ?>
            </span>
        </span>
        <span data-lid="<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
" title="<?php echo $this->_tpl_vars['lang']['reportbroken_add_in']; ?>
" class="hide link" id="remove-report">
            <?php echo $this->_tpl_vars['lang']['reportbroken_remove_in']; ?>

            <span class="rbl-icon ml-1">
                <?php if (((is_array($_tmp=$this->_tpl_vars['config']['rl_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, '4.9.2') : version_compare($_tmp, '4.9.2')) >= 0): ?>
                    <?php echo smarty_function_fetch(array('file' => ((is_array($_tmp=(defined('RL_LIBS') ? @RL_LIBS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'icons/svg-line-set/remove-circle.svg') : smarty_modifier_cat($_tmp, 'icons/svg-line-set/remove-circle.svg'))), $this);?>

                <?php else: ?>
                    <?php echo smarty_function_fetch(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'reportBrokenListing/static/remove-circle.svg') : smarty_modifier_cat($_tmp, 'reportBrokenListing/static/remove-circle.svg'))), $this);?>

                <?php endif; ?>
            </span>
        </span>
    </li>
<?php endif; ?>
<!-- report broken listing | listing details icon end -->