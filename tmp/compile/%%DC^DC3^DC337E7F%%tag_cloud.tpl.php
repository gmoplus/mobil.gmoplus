<?php /* Smarty version 2.6.31, created on 2025-07-13 03:38:42
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tag_cloud.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripcslashes', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tag_cloud.tpl', 8, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tag_cloud.tpl', 12, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tag_cloud.tpl', 12, false),array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/plugins/tag_cloud/tag_cloud.tpl', 33, false),)), $this); ?>
<!-- Box with tags tpl -->

<?php if (! $this->_tpl_vars['tag_cloud']): ?>
    <span class="info"><?php echo $this->_tpl_vars['lang']['tc_cloud_empty']; ?>
</span>
<?php elseif ($this->_tpl_vars['config']['tc_box_type'] == 'simple'): ?>
    <div id="cloud">
        <?php $_from = $this->_tpl_vars['tag_cloud']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
            <a <?php if ($this->_tpl_vars['config']['tc_tag_new_page']): ?>target="_blank"<?php endif; ?> href="<?php echo (defined('SEO_BASE') ? @SEO_BASE : null); ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pages']['tags']; ?>
/<?php echo $this->_tpl_vars['tag']['Path']; ?>
<?php if ($this->_tpl_vars['config']['tc_urls_postfix']): ?>.html<?php else: ?>/<?php endif; ?><?php else: ?>?page=<?php echo $this->_tpl_vars['pages']['tags']; ?>
&tag=<?php echo $this->_tpl_vars['tag']['Path']; ?>
<?php endif; ?>" style="font-size:<?php echo $this->_tpl_vars['tag']['Size']; ?>
px;"><?php echo stripcslashes($this->_tpl_vars['tag']['Tag']); ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
    </div>
<?php elseif ($this->_tpl_vars['config']['tc_box_type'] == 'gradient'): ?>
    <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'tag_cloud/static/jquery.tagcloud.js') : smarty_modifier_cat($_tmp, 'tag_cloud/static/jquery.tagcloud.js'))), $this);?>


    <div id="cloud">
        <?php $_from = $this->_tpl_vars['tag_cloud']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
            <a <?php if ($this->_tpl_vars['config']['tc_tag_new_page']): ?>target="_blank"<?php endif; ?> href="<?php echo (defined('SEO_BASE') ? @SEO_BASE : null); ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pages']['tags']; ?>
/<?php echo $this->_tpl_vars['tag']['Path']; ?>
<?php if ($this->_tpl_vars['config']['tc_urls_postfix']): ?>.html<?php else: ?>/<?php endif; ?><?php else: ?>?page=<?php echo $this->_tpl_vars['pages']['tags']; ?>
&tag=<?php echo $this->_tpl_vars['tag']['Path']; ?>
<?php endif; ?>" rel="<?php echo $this->_tpl_vars['tag']['Count']; ?>
"><?php echo $this->_tpl_vars['tag']['Tag']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
    </div>

    <script class="fl-js-dynamic">
        <?php echo '
            $.fn.tagcloud.defaults = {
                size: {start: '; ?>
<?php echo $this->_tpl_vars['config']['tc_minsize']; ?>
, end: <?php echo $this->_tpl_vars['config']['tc_maxsize']; ?>
<?php echo ', unit: \'px\'},
                color: {start: '; ?>
'<?php echo $this->_tpl_vars['config']['tc_jquery_gradient_start']; ?>
', end: '<?php echo $this->_tpl_vars['config']['tc_jquery_gradient_end']; ?>
'<?php echo '}
            };

            $(function(){
                $(\'#cloud a\').tagcloud();
            }); 
        '; ?>

    </script>
<?php elseif ($this->_tpl_vars['config']['tc_box_type'] == 'circle'): ?>
    <?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'tag_cloud/static/jqcloud.css') : smarty_modifier_cat($_tmp, 'tag_cloud/static/jqcloud.css'))), $this);?>

    <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'tag_cloud/static/jqcloud.js') : smarty_modifier_cat($_tmp, 'tag_cloud/static/jqcloud.js'))), $this);?>


    <script class="fl-js-dynamic">
        var word_list = [
            <?php $_from = $this->_tpl_vars['tag_cloud']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tagsLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tagsLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tag']):
        $this->_foreach['tagsLoop']['iteration']++;
?>
                <?php if ($this->_tpl_vars['config']['mod_rewrite']): ?>
                    <?php $this->assign('tag_link', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('SEO_BASE') ? @SEO_BASE : null))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['pages']['tags']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['pages']['tags'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '/') : smarty_modifier_cat($_tmp, '/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['tag']['Path']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['tag']['Path']))); ?>
                <?php else: ?>
                    <?php $this->assign('tag_link', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('SEO_BASE') ? @SEO_BASE : null))) ? $this->_run_mod_handler('cat', true, $_tmp, '?page=') : smarty_modifier_cat($_tmp, '?page=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['pages']['tags']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['pages']['tags'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&tag=') : smarty_modifier_cat($_tmp, '&tag=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['tag']['Path']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['tag']['Path']))); ?>
                <?php endif; ?>

                <?php echo '{
                        text  : "'; ?>
<?php echo $this->_tpl_vars['tag']['Tag']; ?>
",
                        weight: <?php if ($this->_tpl_vars['tag']['Size'] != 'NAN'): ?><?php echo $this->_tpl_vars['tag']['Size']; ?>
<?php else: ?>11<?php endif; ?>,
                        count : <?php echo $this->_tpl_vars['tag']['Count']; ?>
<?php echo ',
                        html  : {title: "'; ?>
<?php echo $this->_tpl_vars['tag']['Tag']; ?>
<?php echo '"/*, "class": "custom-class"*/},
                        link  : {href: "'; ?>
<?php echo $this->_tpl_vars['tag_link']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php if ($this->_tpl_vars['config']['tc_urls_postfix']): ?>.html<?php else: ?>/<?php endif; ?><?php endif; ?>", <?php if ($this->_tpl_vars['config']['tc_tag_new_page']): ?>target: "_blank"<?php endif; ?>
                    <?php echo '}}
                '; ?>

                <?php if (! ($this->_foreach['tagsLoop']['iteration'] == $this->_foreach['tagsLoop']['total'])): ?>,<?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        ];
        <?php echo '
        $(function(){
            $cloud = $(\'#cloud\');

            $cloud.jQCloud(word_list, {
                width : $cloud.width(),
                height: \''; ?>
<?php echo $this->_tpl_vars['config']['tc_jquery_circle_height']; ?>
<?php echo '\',
                size  : {start: '; ?>
<?php echo $this->_tpl_vars['config']['tc_minsize']; ?>
, end: <?php echo $this->_tpl_vars['config']['tc_maxsize']; ?>
<?php echo '},
                color : {start: '; ?>
'<?php echo $this->_tpl_vars['config']['tc_jquery_gradient_start']; ?>
', end: '<?php echo $this->_tpl_vars['config']['tc_jquery_gradient_end']; ?>
'}<?php echo '
            });
        });
        '; ?>

    </script>

    <div id="cloud"></div>
<?php endif; ?>

<!-- Box with tags tpl end -->