<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:14
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/featured_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/featured_item.tpl', 27, false),array('function', 'math', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/featured_item.tpl', 50, false),array('function', 'toPrettyDateTime', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/featured_item.tpl', 86, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/featured_item.tpl', 52, false),array('modifier', 'strip_tags', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/featured_item.tpl', 77, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/featured_item.tpl', 90, false),)), $this); ?>
<?php 
global $page_info, $rlListingTypes;

$block = $this->get_template_vars('block');
$side_bar_exists = $this->get_template_vars('side_bar_exists');
$listing_type = $this->get_template_vars('type');

if ($listing_type && !$rlListingTypes->types[$listing_type]['Photo']) {
    $class = 'col-lg-6 ';

    if (in_array($block['Side'], array('middle_left', 'middle_right'))) {
        $class = 'col-lg-12';
    }
} else {
    $class = 'col-lg-3 col-md-4 col-sm-6 ';

    if (in_array($block['Side'], array('middle', 'bottom', 'top'))) {
        $class = $side_bar_exists ? 'col-sm-6 col-md-4' : 'col-lg-3 col-md-4 col-sm-6';
    } elseif (in_array($block['Side'], array('middle_left', 'middle_right'))) {
        $class = 'col-sm-6';
    }
}

$this->assign('box_item_class', $class);
 ?>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'featuredItemTop'), $this);?>


<li <?php if ($this->_tpl_vars['featured_listing']['ID']): ?>id="fli_<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
"<?php endif; ?> class="<?php echo $this->_tpl_vars['box_item_class']; ?>
 d-flex flex-column<?php if (! $this->_tpl_vars['featured_listing']['Main_photo']): ?> no-picture<?php endif; ?>">
    <?php if ($this->_tpl_vars['listing_types'][$this->_tpl_vars['type']]['Photo']): ?>
        <div class="picture<?php if (! $this->_tpl_vars['featured_listing']['Main_photo']): ?> no-picture<?php endif; ?>">
            <a title="<?php echo $this->_tpl_vars['featured_listing']['listing_title']; ?>
" <?php if ($this->_tpl_vars['config']['featured_new_window']): ?>target="_blank"<?php endif; ?> href="<?php echo $this->_tpl_vars['featured_listing']['url']; ?>
">
                <?php if ($this->_tpl_vars['featured_listing']['Photos_count'] > 1 && $this->_tpl_vars['block']['Side'] != 'left'): ?>
                <div data-id="<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
" class="listing-picture-slider">
                    <span class="listing-picture-slider__navbar d-flex h-100 relative">
                    <?php unset($this->_sections['pics']);
$this->_sections['pics']['start'] = (int)0;
$this->_sections['pics']['loop'] = is_array($_loop=$this->_tpl_vars['featured_listing']['Photos_count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pics']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['pics']['max'] = (int)5;
$this->_sections['pics']['name'] = 'pics';
$this->_sections['pics']['show'] = true;
if ($this->_sections['pics']['max'] < 0)
    $this->_sections['pics']['max'] = $this->_sections['pics']['loop'];
if ($this->_sections['pics']['start'] < 0)
    $this->_sections['pics']['start'] = max($this->_sections['pics']['step'] > 0 ? 0 : -1, $this->_sections['pics']['loop'] + $this->_sections['pics']['start']);
else
    $this->_sections['pics']['start'] = min($this->_sections['pics']['start'], $this->_sections['pics']['step'] > 0 ? $this->_sections['pics']['loop'] : $this->_sections['pics']['loop']-1);
if ($this->_sections['pics']['show']) {
    $this->_sections['pics']['total'] = min(ceil(($this->_sections['pics']['step'] > 0 ? $this->_sections['pics']['loop'] - $this->_sections['pics']['start'] : $this->_sections['pics']['start']+1)/abs($this->_sections['pics']['step'])), $this->_sections['pics']['max']);
    if ($this->_sections['pics']['total'] == 0)
        $this->_sections['pics']['show'] = false;
} else
    $this->_sections['pics']['total'] = 0;
if ($this->_sections['pics']['show']):

            for ($this->_sections['pics']['index'] = $this->_sections['pics']['start'], $this->_sections['pics']['iteration'] = 1;
                 $this->_sections['pics']['iteration'] <= $this->_sections['pics']['total'];
                 $this->_sections['pics']['index'] += $this->_sections['pics']['step'], $this->_sections['pics']['iteration']++):
$this->_sections['pics']['rownum'] = $this->_sections['pics']['iteration'];
$this->_sections['pics']['index_prev'] = $this->_sections['pics']['index'] - $this->_sections['pics']['step'];
$this->_sections['pics']['index_next'] = $this->_sections['pics']['index'] + $this->_sections['pics']['step'];
$this->_sections['pics']['first']      = ($this->_sections['pics']['iteration'] == 1);
$this->_sections['pics']['last']       = ($this->_sections['pics']['iteration'] == $this->_sections['pics']['total']);
?>
                        <span class="flex-fill">
                            <?php if ($this->_sections['pics']['first']): ?>
                            <img src="<?php if ($this->_tpl_vars['featured_listing']['Main_photo']): ?><?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['featured_listing']['Main_photo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank_10x7.gif<?php endif; ?>"
                                <?php if ($this->_tpl_vars['featured_listing']['Main_photo_x2']): ?>srcset="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['featured_listing']['Main_photo_x2']; ?>
 2x"<?php endif; ?>
                                alt="<?php echo $this->_tpl_vars['featured_listing']['listing_title']; ?>
"
                                loading="lazy" />
                            <?php else: ?>
                                <img class="pic-empty-<?php echo $this->_sections['pics']['iteration']; ?>
 d-none" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank_10x7.gif" alt="<?php echo $this->_tpl_vars['featured_listing']['listing_title']; ?>
" />
                                <?php if ($this->_sections['pics']['last'] && $this->_tpl_vars['featured_listing']['Photos_count'] > 5): ?>
                                <span class="justify-content-center align-items-center text-center flex-column">
                                    <svg viewBox="0 0 54 46">
                                        <use xlink:href="#photo-cam-icon"></use>
                                    </svg>
                                    <?php echo smarty_function_math(array('equation' => 'count - 5','count' => $this->_tpl_vars['featured_listing']['Photos_count'],'assign' => 'more_count'), $this);?>

                                    <?php $this->assign('count_replace', ('{')."count".('}')); ?>
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['count_more_pictures'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['count_replace'], $this->_tpl_vars['more_count']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['count_replace'], $this->_tpl_vars['more_count'])); ?>

                                </span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </span>
                    <?php endfor; endif; ?>
                    </span>
                </div>
                <?php else: ?>
                    <img src="<?php if ($this->_tpl_vars['featured_listing']['Main_photo']): ?><?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['featured_listing']['Main_photo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank_10x7.gif<?php endif; ?>"
                    <?php if ($this->_tpl_vars['featured_listing']['Main_photo_x2']): ?>srcset="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['featured_listing']['Main_photo_x2']; ?>
 2x"<?php endif; ?>
                    alt="<?php echo $this->_tpl_vars['featured_listing']['listing_title']; ?>
" />
                <?php endif; ?>
                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplFeaturedItemPhoto'), $this);?>

            </a>

            <span id="fav_<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
" class="favorite add" title="<?php echo $this->_tpl_vars['lang']['add_to_favorites']; ?>
">
                <svg viewBox="0 0 14 12" class="icon">
                    <use xlink:href="#favorite-icon"></use>
                </svg>
            </span>
        </div>
    <?php endif; ?>

    <ul class="card-info flex-fill">
        <li class="title" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['featured_listing']['fields']['title']['value'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
            <a <?php if ($this->_tpl_vars['config']['featured_new_window']): ?>target="_blank"<?php endif; ?> href="<?php echo $this->_tpl_vars['featured_listing']['url']; ?>
">
                <?php echo $this->_tpl_vars['featured_listing']['listing_title']; ?>

            </a>
        </li>

        <li class="fields d-flex">
            <div class="flex-fill field-values mr-2">
                <?php if ($this->_tpl_vars['config']['messages_module'] && $this->_tpl_vars['featured_listing']['Listing_type'] == $this->_tpl_vars['config']['service_package_type_task']): ?>
                    <div class="d-inline-block mr-3"><?php echo $this->_plugins['function']['toPrettyDateTime'][0][0]->toPrettyDateTime(array('date' => $this->_tpl_vars['featured_listing']['Date']), $this);?>
</div>
                <?php endif; ?>

                <?php $_from = $this->_tpl_vars['featured_listing']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fieldsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fieldsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['item']):
        $this->_foreach['fieldsF']['iteration']++;
?>
                    <?php if (empty ( $this->_tpl_vars['item']['value'] ) || ! $this->_tpl_vars['item']['Details_page'] || ( $this->_tpl_vars['item']['Key'] == $this->_tpl_vars['config']['price_tag_field'] || ((is_array($_tmp=$this->_tpl_vars['item']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['tpl_settings']['listing_grid_except_fields']) : in_array($_tmp, $this->_tpl_vars['tpl_settings']['listing_grid_except_fields'])) )): ?><?php continue; ?><?php endif; ?>

                    <span id="flf_<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
_<?php echo $this->_tpl_vars['item']['Key']; ?>
"><?php echo $this->_tpl_vars['item']['value']; ?>
</span>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <div>
                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplFeaturedItemAdInfo'), $this);?>

            </div>
        </li>

        <li class="two-inline price_tag">
            <nav class="icons">
                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplFeaturedItemIcon'), $this);?>


                <?php if ($this->_tpl_vars['featured_listing']['Listing_type'] != $this->_tpl_vars['config']['service_package_type_service'] && $this->_tpl_vars['featured_listing']['Listing_type'] != $this->_tpl_vars['config']['service_package_type_task'] && $this->_tpl_vars['config']['show_call_owner_button'] && $this->_tpl_vars['config']['messages_module']): ?>
                <span data-listing-id="<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
" class="call-owner">
                    <svg viewBox="0 0 14 14" class="icon grid-icon-fill">
                        <use xlink:href="#contact-icon"></use>
                    </svg>
                </span>
                <?php endif; ?>
            </nav>

            <?php if ($this->_tpl_vars['featured_listing']['fields'][$this->_tpl_vars['config']['price_tag_field']]['value']): ?>
                <div>
                    <span><?php echo $this->_tpl_vars['featured_listing']['fields'][$this->_tpl_vars['config']['price_tag_field']]['value']; ?>
</span>
                    <?php if ($this->_tpl_vars['featured_listing']['sale_rent'] == 2 && $this->_tpl_vars['featured_listing']['fields']['time_frame']['value']): ?>
                        &nbsp;/ <?php echo $this->_tpl_vars['featured_listing']['fields']['time_frame']['value']; ?>

                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </li>

        <?php if ($this->_tpl_vars['config']['messages_module'] && $this->_tpl_vars['featured_listing']['Listing_type'] == $this->_tpl_vars['config']['service_package_type_service']): ?>
            <li data-listing-id="<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
" class="offer-task pt-2">
                <input type="button" value="<?php echo $this->_tpl_vars['lang']['service_offer_task']; ?>
" class="w-100 button-transparent" />
            </li>
        <?php else: ?>
            <li data-listing-id="<?php echo $this->_tpl_vars['featured_listing']['ID']; ?>
" class="offer-service pt-2 pt-md-0 ml-0 ml-md-3">
                <input type="button" value="<?php echo $this->_tpl_vars['lang']['service_offer_service']; ?>
" class="w-100 button-transparent" />
            </li>
        <?php endif; ?>
    </ul>
</li>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'featuredItemBottom'), $this);?>
