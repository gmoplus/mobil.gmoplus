<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:14
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/listing.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/listing.tpl', 3, false),array('function', 'math', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/listing.tpl', 38, false),array('function', 'toPrettyDateTime', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/listing.tpl', 111, false),array('modifier', 'in_array', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/listing.tpl', 9, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/listing.tpl', 40, false),)), $this); ?>
<!-- listing item -->

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingTop'), $this);?>


<?php if ($this->_tpl_vars['listing']['Listing_type']): ?>
    <?php $this->assign('listing_type', $this->_tpl_vars['listing_types'][$this->_tpl_vars['listing']['Listing_type']]); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['listing_type']['Photo'] || ((is_array($_tmp=$this->_tpl_vars['pageInfo']['Controller'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['_mixedListingControllers']) : in_array($_tmp, $this->_tpl_vars['_mixedListingControllers'])) || $_REQUEST['mode'] == 'rvLoadListings'): ?>
    <?php $this->assign('pictures_available', true); ?>
<?php else: ?>
    <?php $this->assign('pictures_available', false); ?>
<?php endif; ?>

<article class="item<?php if ($this->_tpl_vars['listing']['Featured']): ?> featured<?php endif; ?><?php if (! $this->_tpl_vars['pictures_available']): ?> no-image<?php endif; ?> two-inline col-sm-4<?php if (! $this->_tpl_vars['side_bar_exists']): ?> col-md-3<?php endif; ?> <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplListingItemClass'), $this);?>
">

    <div class="main-column">
        <?php if ($this->_tpl_vars['pictures_available']): ?>
            <div class="picture<?php if (! $this->_tpl_vars['listing']['Main_photo']): ?> no-picture<?php endif; ?>">
                <a title="<?php echo $this->_tpl_vars['listing']['listing_title']; ?>
" <?php if ($this->_tpl_vars['config']['view_details_new_window']): ?>target="_blank"<?php endif; ?> href="<?php echo $this->_tpl_vars['listing']['url']; ?>
">
                    <?php if ($this->_tpl_vars['listing']['Photos_count'] > 1): ?>
                    <div data-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
" class="listing-picture-slider">
                        <span class="listing-picture-slider__navbar d-flex h-100 relative">
                        <?php unset($this->_sections['pics']);
$this->_sections['pics']['start'] = (int)0;
$this->_sections['pics']['loop'] = is_array($_loop=$this->_tpl_vars['listing']['Photos_count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <img src="<?php if ($this->_tpl_vars['listing']['Main_photo']): ?><?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['listing']['Main_photo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank_10x7.gif<?php endif; ?>"
                                    <?php if ($this->_tpl_vars['listing']['Main_photo_x2']): ?>srcset="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['listing']['Main_photo_x2']; ?>
 2x"<?php endif; ?>
                                    alt="<?php echo $this->_tpl_vars['listing']['listing_title']; ?>
"
                                    loading="lazy" />
                                <?php else: ?>
                                    <img class="pic-empty-<?php echo $this->_sections['pics']['iteration']; ?>
 d-none" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank_10x7.gif" alt="<?php echo $this->_tpl_vars['listing']['listing_title']; ?>
" />
                                    <?php if ($this->_sections['pics']['last'] && $this->_tpl_vars['listing']['Photos_count'] > 5): ?>
                                    <span class="justify-content-center align-items-center text-center flex-column">
                                        <svg viewBox="0 0 54 46">
                                            <use xlink:href="#photo-cam-icon"></use>
                                        </svg>
                                        <?php echo smarty_function_math(array('equation' => 'count - 5','count' => $this->_tpl_vars['listing']['Photos_count'],'assign' => 'more_count'), $this);?>

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
                        <img src="<?php if ($this->_tpl_vars['listing']['Main_photo']): ?><?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['listing']['Main_photo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank_10x7.gif<?php endif; ?>"
                        <?php if ($this->_tpl_vars['listing']['Main_photo_x2']): ?>srcset="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['listing']['Main_photo_x2']; ?>
 2x"<?php endif; ?>
                        alt="<?php echo $this->_tpl_vars['listing']['listing_title']; ?>
" />
                    <?php endif; ?>

                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplListingItemPhoto'), $this);?>


                    <?php if ($this->_tpl_vars['listing']['Featured']): ?><div class="label" title="<?php echo $this->_tpl_vars['lang']['featured']; ?>
"><?php echo $this->_tpl_vars['lang']['featured']; ?>
</div><?php endif; ?>
                </a>

                <span id="fav_<?php echo $this->_tpl_vars['listing']['ID']; ?>
" class="favorite add" title="<?php echo $this->_tpl_vars['lang']['add_to_favorites']; ?>
">
                    <svg viewBox="0 0 14 12" class="icon">
                        <use xlink:href="#favorite-icon"></use>
                    </svg>
                </span>
            </div>
        <?php endif; ?>

        <ul class="card-info flex-fill<?php if ($this->_tpl_vars['config']['sf_display_fields']): ?> with-names<?php endif; ?>">
            <li class="title">
                <a class="link-large"
                    title="<?php echo $this->_tpl_vars['listing']['listing_title']; ?>
"
                    <?php if ($this->_tpl_vars['config']['view_details_new_window']): ?>target="_blank"<?php endif; ?>
                    href="<?php echo $this->_tpl_vars['listing']['url']; ?>
">
                    <?php echo $this->_tpl_vars['listing']['listing_title']; ?>

                </a>
            </li>

            <li class="fields d-flex">
                <div class="field-values flex-fill shrink-fix">
                    <?php $this->assign('short_form_fields', 0); ?>
                    <?php $_from = $this->_tpl_vars['listing']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fListings'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fListings']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['item']):
        $this->_foreach['fListings']['iteration']++;
?>
                        <?php if (empty ( $this->_tpl_vars['item']['value'] ) || ! $this->_tpl_vars['item']['Details_page'] || ( $this->_tpl_vars['item']['Key'] == $this->_tpl_vars['config']['price_tag_field'] || ((is_array($_tmp=$this->_tpl_vars['item']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['tpl_settings']['listing_grid_except_fields']) : in_array($_tmp, $this->_tpl_vars['tpl_settings']['listing_grid_except_fields'])) )): ?><?php continue; ?><?php endif; ?>

                        <?php if ($this->_tpl_vars['config']['sf_display_fields']): ?>
                            <div class="table-cell small clearfix">
                                <div class="name"><?php echo $this->_tpl_vars['item']['name']; ?>
</div>
                                <div class="value"><?php echo $this->_tpl_vars['item']['value']; ?>
</div>
                            </div>
                        <?php else: ?>
                        <span><?php echo $this->_tpl_vars['item']['value']; ?>
</span>
                        <?php endif; ?>

                        <?php $this->assign('short_form_fields', $this->_tpl_vars['short_form_fields']+1); ?>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingAfterFields'), $this);?>

                </div>

                <?php if (! $this->_tpl_vars['config']['sf_display_fields']): ?>
                    <div class="stat-line"><?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingAfterStats'), $this);?>
</div>
                <?php endif; ?>
            </li>

            <li class="system d-flex align-items-center">
                <?php if ($this->_tpl_vars['listing']['fields'][$this->_tpl_vars['config']['price_tag_field']]['value']): ?>
                    <span class="price-tag">
                        <span><?php echo $this->_tpl_vars['listing']['fields'][$this->_tpl_vars['config']['price_tag_field']]['value']; ?>
</span>
                    </span>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['listing']['Listing_type'] == $this->_tpl_vars['config']['service_package_type_task']): ?>
                    <span class="date"><?php echo $this->_plugins['function']['toPrettyDateTime'][0][0]->toPrettyDateTime(array('date' => $this->_tpl_vars['listing']['Date']), $this);?>
</span>
                <?php elseif ($this->_tpl_vars['config']['sf_display_fields']): ?>
                    <div class="stat-line ml-auto"><?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingAfterStats'), $this);?>
</div>
                <?php endif; ?>
            </li>

            <?php if ($this->_tpl_vars['config']['messages_module']): ?>
                <?php if ($this->_tpl_vars['listing']['Listing_type'] == $this->_tpl_vars['config']['service_package_type_service']): ?>
                    <li data-listing-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
" class="offer-task pt-2">
                        <input type="button" value="<?php echo $this->_tpl_vars['lang']['service_offer_task']; ?>
" class="w-100 button-transparent" />
                    </li>
                <?php elseif ($this->_tpl_vars['pictures_available'] && $this->_tpl_vars['listing']['Listing_type'] == $this->_tpl_vars['config']['service_package_type_task']): ?>
                    <li data-listing-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
" class="offer-service pt-2">
                        <input type="button" value="<?php echo $this->_tpl_vars['lang']['service_offer_service']; ?>
" class="w-100 button-transparent" />
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>

        <div class="navigation-column">
            <?php if ($this->_tpl_vars['config']['messages_module'] && ! $this->_tpl_vars['pictures_available'] && $this->_tpl_vars['listing']['Listing_type'] == $this->_tpl_vars['config']['service_package_type_task']): ?>
                <div data-listing-id="<?php echo $this->_tpl_vars['listing']['ID']; ?>
" class="offer-service">
                    <input type="button" value="<?php echo $this->_tpl_vars['lang']['service_offer_service']; ?>
" class="w-100 button-transparent" />
                </div>
            <?php endif; ?>

            <div class="before-nav"><?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingBeforeStats'), $this);?>
</div>

            <ul class="nav-column d-flex justify-content-end"><?php echo ''; ?><?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingNavIcons'), $this);?><?php echo ''; ?><?php if ($this->_tpl_vars['listing']['Listing_type'] != $this->_tpl_vars['config']['service_package_type_service'] && $this->_tpl_vars['listing']['Listing_type'] != $this->_tpl_vars['config']['service_package_type_task'] && $this->_tpl_vars['config']['show_call_owner_button'] && $this->_tpl_vars['config']['messages_module']): ?><?php echo '<li data-listing-id="'; ?><?php echo $this->_tpl_vars['listing']['ID']; ?><?php echo '" class="call-owner"><svg viewBox="0 0 14 14" class="icon grid-icon-fill"><use xlink:href="#contact-icon"></use></svg></li>'; ?><?php endif; ?><?php echo ''; ?>
</ul>

            <span class="category-info hide">
                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
<?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['listing_type']['Page_key']]; ?>
/<?php echo $this->_tpl_vars['listing']['Path']; ?>
<?php if ($this->_tpl_vars['listing_type']['Cat_postfix']): ?>.html<?php else: ?>/<?php endif; ?><?php else: ?>?page=<?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['listing_type']['Page_key']]; ?>
&category=<?php echo $this->_tpl_vars['listing']['Category_ID']; ?>
<?php endif; ?>">
                    <?php echo $this->_tpl_vars['listing']['name']; ?>

                </a>
            </span>
        </div>
    </div>
</article>

<!-- listing item end -->