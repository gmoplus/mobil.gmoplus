<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:20
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/content_slider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'key', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/content_slider.tpl', 5, false),array('modifier', 'preg_match', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/content_slider.tpl', 6, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/content_slider.tpl', 11, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/content_slider.tpl', 14, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/content_slider.tpl', 11, false),)), $this); ?>
<!-- content slider -->

<?php $this->assign('is_form_arranged', false); ?>
<?php if (is_array ( $this->_tpl_vars['search_forms'] )): ?>
    <?php $this->assign('first_form_key', key($this->_tpl_vars['search_forms'])); ?>
    <?php if (((is_array($_tmp='/_tab[0-9]$/')) ? $this->_run_mod_handler('preg_match', true, $_tmp, $this->_tpl_vars['first_form_key']) : preg_match($_tmp, $this->_tpl_vars['first_form_key']))): ?>
        <?php $this->assign('is_form_arranged', true); ?>
    <?php endif; ?>
<?php endif; ?>

<?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/content-slider/util.js') : smarty_modifier_cat($_tmp, 'components/content-slider/util.js'))), $this);?>

<?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/content-slider/carousel.js') : smarty_modifier_cat($_tmp, 'components/content-slider/carousel.js'))), $this);?>


<div id="homeCarousel" class="carousel slide carousel-fade<?php if (! ( ! $this->_tpl_vars['is_form_arranged'] && is_array ( $this->_tpl_vars['search_forms'] ) && count($this->_tpl_vars['search_forms']) > 1 )): ?> no-search-tabs<?php endif; ?>" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php if (count($this->_tpl_vars['home_slides']) > 1): ?>
            <?php $_from = $this->_tpl_vars['home_slides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['slides'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['slides']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['slide']):
        $this->_foreach['slides']['iteration']++;
?>
            <li data-target="#homeCarousel"
                data-slide-to="<?php echo ($this->_foreach['slides']['iteration']-1); ?>
"
                <?php if (($this->_foreach['slides']['iteration'] <= 1)): ?>
                class="active"
                <?php endif; ?>></li>
            <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </ol>
    <div class="carousel-inner h-100">
        <?php $_from = $this->_tpl_vars['home_slides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['slides'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['slides']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['slide']):
        $this->_foreach['slides']['iteration']++;
?>
            <div class="carousel-item<?php if (($this->_foreach['slides']['iteration'] <= 1)): ?> active<?php endif; ?>">
                <img class="carousel-picture d-block w-100 h-100"
                     src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
slides/<?php echo $this->_tpl_vars['slide']['Picture']; ?>
"
                     alt="<?php echo $this->_tpl_vars['slide']['title']; ?>
">

                <div class="carousel-caption">
                    <h2 class="carousel-slide-heading"><?php echo $this->_tpl_vars['slide']['title']; ?>
</h2>
                    <p class="carousel-slide-description"><?php echo $this->_tpl_vars['slide']['description']; ?>
</p>

                    <?php if ($this->_tpl_vars['slide']['URL']): ?>
                    <a class="mt-md-4 button" href="<?php echo $this->_tpl_vars['slide']['URL']; ?>
"><?php echo $this->_tpl_vars['lang']['view_details']; ?>
</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php if (count($this->_tpl_vars['home_slides']) > 1): ?>
    <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
    <?php endif; ?>
</div>

<!-- content slider end -->