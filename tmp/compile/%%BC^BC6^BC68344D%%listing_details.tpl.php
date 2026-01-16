<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:47
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/listing_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'mapsAPI', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/listing_details.tpl', 6, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/listing_details.tpl', 16, false),array('function', 'staticMap', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/listing_details.tpl', 92, false),array('modifier', 'json_encode', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/listing_details.tpl', 10, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/listing_details.tpl', 25, false),array('modifier', 'count', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/controllers/listing_details.tpl', 31, false),)), $this); ?>
<!-- listing details -->

<?php if (! $this->_tpl_vars['errors']): ?>

<?php if ($this->_tpl_vars['config']['map_module'] && $this->_tpl_vars['location']['direct']): ?>
    <?php echo $this->_plugins['function']['mapsAPI'][0][0]->mapsAPI(array('assign' => 'mapAPI'), $this);?>


    <script>
    rlConfig['mapAPI'] = [];
    rlConfig['mapAPI']['css'] = JSON.parse('<?php echo json_encode($this->_tpl_vars['mapAPI']['css']); ?>
');
    rlConfig['mapAPI']['js']  = JSON.parse('<?php echo json_encode($this->_tpl_vars['mapAPI']['js']); ?>
');
    </script>
<?php endif; ?>

<div class="listing-details details <?php if ($this->_tpl_vars['config']['map_module'] && $this->_tpl_vars['location']['direct'] && $this->_tpl_vars['photos']): ?>loc-exists<?php endif; ?><?php if (! $this->_tpl_vars['photos']): ?> no-listing-photos<?php endif; ?>">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingDetailsTopTpl'), $this);?>


    <div class="top-navigation d-flex justify-content-between">
        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplListingDetailsNavLeft'), $this);?>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplListingDetailsNavRight'), $this);?>

    </div>
    
    <?php if ($this->_tpl_vars['photos']): ?>
        <section class="main-section">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['componentDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'listing-details-gallery/_listing-details-gallery.tpl') : smarty_modifier_cat($_tmp, 'listing-details-gallery/_listing-details-gallery.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </section>
    <?php endif; ?>

    <section class="content-section clearfix">
        <!-- tabs -->
        <?php if (count($this->_tpl_vars['tabs']) > 1): ?>
            <ul class="tabs tabs-hash">
                <?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tab']):
        $this->_foreach['tabF']['iteration']++;
?><?php echo '<li '; ?><?php if (($this->_foreach['tabF']['iteration'] <= 1)): ?><?php echo 'class="active"'; ?><?php endif; ?><?php echo ' id="tab_'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '"><a href="#'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '" data-target="'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['tab']['name']; ?><?php echo '</a></li>'; ?>
<?php endforeach; endif; unset($_from); ?>
            </ul>
        <?php endif; ?>
        <!-- tabs end -->

        <!-- listing details -->
        <div id="area_listing" class="tab_area">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <?php if ($this->_tpl_vars['price_tag_value']): ?>
                    <div class="price-tag mb-3" id="df_field_price">
                        <span><?php echo $this->_tpl_vars['price_tag_value']; ?>
</span>
                        <?php if ($this->_tpl_vars['listing_data']['sale_rent'] == 2 && $this->_tpl_vars['listing']['common']['Fields']['time_frame']['value']): ?>
                            / <?php echo $this->_tpl_vars['listing']['common']['Fields']['time_frame']['value']; ?>

                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplListingDetailsRating'), $this);?>

                </div>
            </div>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingDetailsPreFields'), $this);?>


            <div class="listing-fields">
            <?php $_from = $this->_tpl_vars['listing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
                <div class="<?php if ($this->_tpl_vars['group']['Key']): ?><?php echo $this->_tpl_vars['group']['Key']; ?>
<?php else: ?>no-group<?php endif; ?><?php if ($this->_tpl_vars['group']['Key'] == 'common'): ?> row<?php endif; ?>">
                    <?php if ($this->_tpl_vars['group']['Group_ID'] && $this->_tpl_vars['group']['Key'] != 'common'): ?>
                        <?php $this->assign('hide', false); ?>
                        <?php if (! $this->_tpl_vars['group']['Display']): ?>
                            <?php $this->assign('hide', true); ?>
                        <?php endif; ?>

                        <?php $this->assign('value_counter', '0'); ?>
                        <?php $_from = $this->_tpl_vars['group']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group_values']):
        $this->_foreach['groupsF']['iteration']++;
?>
                            <?php if ($this->_tpl_vars['group_values']['value'] == '' || ! $this->_tpl_vars['group_values']['Details_page']): ?>
                                <?php $this->assign('value_counter', $this->_tpl_vars['value_counter']+1); ?>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>

                        <?php if (! empty ( $this->_tpl_vars['group']['Fields'] ) && ( $this->_foreach['groupsF']['total'] != $this->_tpl_vars['value_counter'] )): ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => $this->_tpl_vars['group']['ID'],'name' => $this->_tpl_vars['group']['name'],'hide' => $this->_tpl_vars['hide'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                            <?php if ($this->_tpl_vars['group']['Key'] == 'location' && $this->_tpl_vars['config']['map_module'] && $this->_tpl_vars['location']['direct']): ?>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 fields">
                            <?php $_from = $this->_tpl_vars['group']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fListings'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fListings']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['item']):
        $this->_foreach['fListings']['iteration']++;
?>
                                <?php if (! empty ( $this->_tpl_vars['item']['value'] ) && $this->_tpl_vars['item']['Details_page']): ?>
                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field_out.tpl') : smarty_modifier_cat($_tmp, 'field_out.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 map">
                                        <section title="<?php echo $this->_tpl_vars['lang']['expand_map']; ?>
" class="map-capture">
                                            <img alt="<?php echo $this->_tpl_vars['lang']['expand_map']; ?>
"
                                                 src="<?php echo $this->_plugins['function']['staticMap'][0][0]->staticMap(array('location' => $this->_tpl_vars['location']['direct'],'zoom' => $this->_tpl_vars['config']['map_default_zoom'],'width' => 480,'height' => 180), $this);?>
"
                                                 srcset="<?php echo $this->_plugins['function']['staticMap'][0][0]->staticMap(array('location' => $this->_tpl_vars['location']['direct'],'zoom' => $this->_tpl_vars['config']['map_default_zoom'],'width' => 480,'height' => 180,'scale' => 2), $this);?>
 2x" />
                                            <?php if (! $this->_tpl_vars['listing_type']['Photo'] || ! $this->_tpl_vars['photos']): ?><span class="media-enlarge"><span></span></span><?php endif; ?>
                                        </section>
                                    </div>
                                </div>

                                <?php if (! $this->_tpl_vars['listing_type']['Photo'] || ! $this->_tpl_vars['photos']): ?>
                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'listing_details_static_map.tpl') : smarty_modifier_cat($_tmp, 'listing_details_static_map.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                <?php else: ?>
                                    <script class="fl-js-dynamic">
                                    <?php echo '

                                    $(function(){
                                        $(\'.map .map-capture img\').click(function(){
                                            flynax.slideTo(\'body\');
                                            $(\'#media .nav-buttons .nav-button.map\').trigger(\'click\');
                                        });
                                    });

                                    '; ?>

                                    </script>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php $_from = $this->_tpl_vars['group']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fListings'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fListings']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['item']):
        $this->_foreach['fListings']['iteration']++;
?>
                                    <?php if (! empty ( $this->_tpl_vars['item']['value'] ) && $this->_tpl_vars['item']['Details_page']): ?>
                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field_out.tpl') : smarty_modifier_cat($_tmp, 'field_out.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            <?php endif; ?>

                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endif; ?>

                        <?php $this->assign('main_section_no_group', false); ?>
                    <?php else: ?>
                        <?php if ($this->_tpl_vars['group']['Fields']): ?>
                            <?php $_from = $this->_tpl_vars['group']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                <?php if (! empty ( $this->_tpl_vars['item']['value'] ) && $this->_tpl_vars['item']['Details_page']): ?>
                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field_out.tpl') : smarty_modifier_cat($_tmp, 'field_out.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; endif; unset($_from); ?>
            </div>

            <!-- statistics area -->
            <section class="statistics clearfix">
                <ul class="controls">
                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingDetailsAfterStats'), $this);?>

                </ul>
                <ul class="counters">
                    <?php if ($this->_tpl_vars['config']['count_listing_visits']): ?><li><span class="count"><?php echo $this->_tpl_vars['listing_data']['Shows']; ?>
</span> <?php echo $this->_tpl_vars['lang']['shows']; ?>
</li><?php endif; ?>
                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingDetailsCounters'), $this);?>

                </ul>
            </section>
            <!-- statistics area end -->
        </div>
        <!-- listing details end -->

        <?php if ($this->_tpl_vars['config']['tell_a_friend_tab']): ?>
            <!-- tell a friend tab -->
            <div id="area_tell_friend" class="tab_area hide">
                <div class="content-padding">
                    <div class="submit-cell">
                        <div class="name"><?php echo $this->_tpl_vars['lang']['friend_name']; ?>
 <span class="red">*</span></div>
                        <div class="field"><input class="wauto" type="text" id="friend_name" name="friend_name" maxlength="50" size="30" value="<?php echo $_POST['friend_name']; ?>
" /></div>
                    </div>

                    <div class="submit-cell">
                        <div class="name"><?php echo $this->_tpl_vars['lang']['friend_email']; ?>
 <span class="red">*</span></div>
                        <div class="field"><input class="wauto" type="text" id="friend_email" name="friend_email" maxlength="50" size="30" value="<?php echo $_POST['friend_email']; ?>
" /></div>
                    </div>

                    <div class="submit-cell">
                        <div class="name"><?php echo $this->_tpl_vars['lang']['your_name']; ?>
</div>
                        <div class="field"><input class="wauto" type="text" id="your_name" name="your_name" maxlength="100" size="30" value="<?php echo $this->_tpl_vars['account_info']['Full_name']; ?>
" /></div>
                    </div>

                    <div class="submit-cell">
                        <div class="name"><?php echo $this->_tpl_vars['lang']['your_email']; ?>
</div>
                        <div class="field"><input class="wauto" type="text" id="your_email" name="your_email" maxlength="30" size="30" value="<?php echo $this->_tpl_vars['account_info']['Mail']; ?>
" /></div>
                    </div>

                    <div class="submit-cell">
                        <div class="name"><?php echo $this->_tpl_vars['lang']['message']; ?>
</div>
                        <div class="field"><textarea id="message" name="message" rows="6" cols="50"><?php echo $_POST['message']; ?>
</textarea></div>
                    </div>

                    <?php if ($this->_tpl_vars['config']['security_img_tell_friend']): ?>
                    <div class="submit-cell">
                        <div class="name"><?php echo $this->_tpl_vars['lang']['security_code']; ?>
 <span class="red">*</span></div>
                        <div class="field">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'captcha.tpl', 'smarty_include_vars' => array('no_caption' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="submit-cell">
                        <div class="field">
                            <input type="submit" class="button" value="<?php echo $this->_tpl_vars['lang']['send']; ?>
" id="send_friend" name="send_friend" />
                            <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_friend" name="reset_friend" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- tell a friend tab end -->
        <?php endif; ?>

        <!-- send message tab -->
        <?php if ($this->_tpl_vars['config']['messages_module'] && $this->_tpl_vars['tabs']['send_message']): ?>
            <div id="area_send_message" class="tab_area hide">
                <div class="submit-cell">
                    <div class="name"><?php echo $this->_tpl_vars['lang']['name']; ?>
 <span class="red">*</span></div>
                    <div class="field"><input maxlength="30" class="wauto" type="text" name="name" value="<?php echo $_POST['name']; ?>
" /></div>
                </div>

                <div class="submit-cell">
                    <div class="name"><?php echo $this->_tpl_vars['lang']['mail']; ?>
 <span class="red">*</span></div>
                    <div class="field"><input maxlength="30" class="wauto" type="text" name="email" value="<?php echo $_POST['email']; ?>
" /></div>
                </div>

                <div class="submit-cell">
                    <div class="name"><?php echo $this->_tpl_vars['lang']['phone']; ?>
</div>
                    <div class="field"><input maxlength="30" class="wauto" type="text" name="phone" value="<?php echo $_POST['phone']; ?>
" /></div>
                </div>

                <div class="submit-cell">
                    <div class="name"><?php echo $this->_tpl_vars['lang']['message']; ?>
 <span class="red">*</span></div>
                    <div class="field"><textarea rows="10" cols="50" class="wauto" name="message"><?php echo $_POST['message']; ?>
</textarea></div>
                </div>

                <?php if ($this->_tpl_vars['config']['security_img_contact_owner']): ?>
                <div class="submit-cell">
                    <div class="name"><?php echo $this->_tpl_vars['lang']['security_code']; ?>
 <span class="red">*</span></div>
                    <div class="field">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'captcha.tpl', 'smarty_include_vars' => array('no_caption' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="submit-cell">
                    <div class="field">
                        <input type="submit" class="button" value="<?php echo $this->_tpl_vars['lang']['send']; ?>
" />
                        <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" />
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- send message tab end -->

        <?php if (count($this->_tpl_vars['tabs']) > 1): ?>
            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingDetailsTab'), $this);?>

        <?php endif; ?>
    </section>
</div>

    <script class="fl-js-dynamic">
    <?php if (isset ( $_GET['highlight'] )): ?>
        flynaxTpl.highlightResults("<?php echo $_SESSION['keyword_search_data']['keyword_search']; ?>
", true);
    <?php endif; ?>

    var ld_inactive = <?php if ($this->_tpl_vars['pageInfo']['Listing_details_inactive']): ?>'<?php echo $this->_tpl_vars['lang']['ld_inactive_notice']; ?>
'<?php else: ?>false<?php endif; ?>;

    <?php echo '
        if ($(\'#df_field_vin .value\').length > 0) {
            var html = \'<a style="font-size: 14px;" href="javascript:void(0);">'; ?>
<?php if ($this->_tpl_vars['lang']['check_vin']): ?><?php echo $this->_tpl_vars['lang']['check_vin']; ?>
<?php else: ?>Check Vin<?php endif; ?><?php echo '</a>\';
            var vin = trim( $(\'#df_field_vin .value\').text() );
            var frame = \'<iframe scrolling="auto" height="600" frameborder="0" width="100%" src="https://www.carfax.com/cfm/check_order.cfm?vin=\'+vin+\'" style="border: 0pt none;overflow-x: hidden; overflow-y: auto;background: white;"></iframe>\';
            var source = \'\';
        }
    '; ?>

    </script>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'listingDetailsBottomJs'), $this);?>


    <script class="fl-js-dynamic">
    <?php echo '
    $(document).ready(function(){
        if (ld_inactive) {
            printMessage(\'warning\', ld_inactive, false, true);
        }

        $(\'#df_field_vin .value\').append(html);

        $(\'#df_field_vin .value a\').flModal({
            content: frame,
            source: source,
            width: 900,
            height: 640
        });

        flynaxTpl.setupTextarea();
    });
    '; ?>

    </script>

</div>
<?php else: ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'errors.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<!-- listing details end -->
