<?php /* Smarty version 2.6.31, created on 2025-07-16 02:11:00
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tags.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tags.tpl', 12, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tags.tpl', 22, false),array('modifier', 'regex_replace', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tags.tpl', 31, false),array('function', 'paging', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tags.tpl', 22, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tags.tpl', 29, false),)), $this); ?>
<!-- tags tpl -->

<?php if ($this->_tpl_vars['tag_info']): ?>
    <?php if (! empty ( $this->_tpl_vars['tag_info']['des'] )): ?>
        <div class="highlight" style="margin: 0 0 15px;">
            <?php echo $this->_tpl_vars['tag_info']['des']; ?>

        </div>
    <?php endif; ?>

    <div class="listings_area">
        <?php if (! empty ( $this->_tpl_vars['listings'] )): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'grid_navbar.tpl') : smarty_modifier_cat($_tmp, 'grid_navbar.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'grid.tpl') : smarty_modifier_cat($_tmp, 'grid.tpl')), 'smarty_include_vars' => array('hl' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <?php if ($this->_tpl_vars['config']['tc_highlight_tag']): ?>
                <script type="text/javascript">flynax.highlightSRGrid('<?php echo $_SESSION['keyword_search_data']['keyword_search']; ?>
');</script>
            <?php endif; ?>

            <!-- paging block -->
            <?php if ($this->_tpl_vars['config']['mod_rewrite']): ?>
                <?php echo $this->_plugins['function']['paging'][0][0]->paging(array('calc' => $this->_tpl_vars['pInfo']['calc'],'total' => count($this->_tpl_vars['listings']),'current' => $this->_tpl_vars['pInfo']['current'],'per_page' => $this->_tpl_vars['config']['listings_per_page'],'url' => $this->_tpl_vars['tag_info']['Path']), $this);?>

            <?php else: ?>
                <?php echo $this->_plugins['function']['paging'][0][0]->paging(array('calc' => $this->_tpl_vars['pInfo']['calc'],'total' => count($this->_tpl_vars['listings']),'current' => $this->_tpl_vars['pInfo']['current'],'per_page' => $this->_tpl_vars['config']['listings_per_page'],'url' => $this->_tpl_vars['tag_info']['Path'],'var' => 'tag'), $this);?>

            <?php endif; ?>
            <!-- paging block end -->
        <?php else: ?>
            <?php if ($this->_tpl_vars['keyword_search']): ?>
                <?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'add_listing','assign' => 'href'), $this);?>

                <?php $this->assign('link', ((is_array($_tmp=((is_array($_tmp='<a href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['href']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['href'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                <div class="info"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['no_listings_found'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.+)\]/', $this->_tpl_vars['link']) : smarty_modifier_regex_replace($_tmp, '/\[(.+)\]/', $this->_tpl_vars['link'])); ?>
</div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

<?php else: ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'tag_cloud') : smarty_modifier_cat($_tmp, 'tag_cloud')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, "tag_cloud.tpl") : smarty_modifier_cat($_tmp, "tag_cloud.tpl")), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<!-- tags tpl end -->