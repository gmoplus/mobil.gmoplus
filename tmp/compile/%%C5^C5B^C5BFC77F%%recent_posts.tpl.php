<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/wordpressBridge/recent_posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', '/home/gmoplus/mobil.gmoplus.com/plugins/wordpressBridge/recent_posts.tpl', 23, false),)), $this); ?>
<?php if ($this->_tpl_vars['recent_posts']): ?>
    <?php if ($this->_tpl_vars['block']['Side'] == 'middle_left' || $this->_tpl_vars['block']['Side'] == 'middle_right'): ?>
        <?php $this->assign('box_class', 'col-md-3 col-md-6 mb-3'); ?>
    <?php elseif ($this->_tpl_vars['block']['Side'] == 'left'): ?>
        <?php $this->assign('box_class', 'col-md-3 col-lg-12 mb-3'); ?>
    <?php else: ?>
        <?php $this->assign('box_class', 'col-md-3 mb-4 mb-md-0'); ?>
    <?php endif; ?>

    <div class="wp-posts row">
        <?php $_from = $this->_tpl_vars['recent_posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['post']):
?>
            <div class="wpb_last_posts <?php echo $this->_tpl_vars['box_class']; ?>
">
                <a href="<?php echo $this->_tpl_vars['post']['url']; ?>
"><h4><?php echo $this->_tpl_vars['post']['title']; ?>
</h4></a>
                <div class="d-flex flex-column flex-sm-row flex-md-column mt-2">
                    <?php if ($this->_tpl_vars['post']['img']): ?>
                        <div class="mb-2 mr-0 mr-sm-3 mr-md-0"
                             style="<?php if ($this->_tpl_vars['config']['wp_box_image_width']): ?>width:<?php echo $this->_tpl_vars['config']['wp_box_image_width']; ?>
px;<?php endif; ?><?php if ($this->_tpl_vars['config']['wp_box_image_height']): ?>height:<?php echo $this->_tpl_vars['config']['wp_box_image_height']; ?>
px;<?php endif; ?>">
                            <a href="<?php echo $this->_tpl_vars['post']['url']; ?>
" class="d-block position-relative w-100" style="padding-bottom: 100%;">
                                <img style="object-fit: cover;" class="wp-post-img w-100 h-100 position-absolute" src="<?php echo $this->_tpl_vars['post']['img']; ?>
">
                            </a>
                        </div>
                    <?php endif; ?>
                    <p class="wp-desc"><?php echo $this->_tpl_vars['post']['excerpt']; ?>
 <span class="d-block text-right date"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
</span></p>
                </div>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
<?php else: ?>
    <span class="text-notice"><?php echo $this->_tpl_vars['lang']['no_news']; ?>
</span>
<?php endif; ?>