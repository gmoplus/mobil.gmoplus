<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:47
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/rating/listing_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/rating/listing_details.tpl', 4, false),)), $this); ?>
<!-- listing ration block -->

<li id="listing_rating_dom">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'rating') : smarty_modifier_cat($_tmp, 'rating')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'dom.tpl') : smarty_modifier_cat($_tmp, 'dom.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php if (! $this->_tpl_vars['rating_denied'] && ( ( $this->_tpl_vars['config']['rating_prevent_visitor'] && $this->_tpl_vars['isLogin'] ) || ! $this->_tpl_vars['config']['rating_prevent_visitor'] ) && ( ! $this->_tpl_vars['config']['rating_prevent_owner'] || ( $this->_tpl_vars['config']['rating_prevent_owner'] && $this->_tpl_vars['listing_data']['Account_ID'] != $this->_tpl_vars['account_info']['ID'] ) )): ?>
        <script type="text/javascript">
        var rating_listing_id = <?php echo $this->_tpl_vars['listing_data']['ID']; ?>
;
        <?php echo '

        $(document).ready(function(){
            var lr = $(\'ul.listing_rating_ul\');
            lr.find(\'li\').mouseenter(function(){
                var index = lr.find(\'li\').index(this) + 1;
                for(var i = 0; i < index; i++)
                {
                    lr.find(\'li:eq(\'+i+\')\').addClass(\'hover\');
                    if ( lr.find(\'li:eq(\'+i+\') div\').length > 0 )
                    {
                        lr.find(\'li div\').hide();
                    }
                }
            }).mouseleave(function(){
                lr.find(\'li\').removeClass(\'hover\');
                lr.find(\'li div\').show();
            }).click(function(){
                var stars = lr.find(\'li\').index(this) + 1;
                xajax_rate(rating_listing_id, stars);
            });
        });

        '; ?>

        </script>
    <?php endif; ?>

</li>

<!-- listing ration block end -->