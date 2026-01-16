<?php /* Smarty version 2.6.31, created on 2025-07-12 17:24:00
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.listing.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.listing.tpl', 8, false),array('modifier', 'replace', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.listing.tpl', 15, false),array('modifier', 'regex_replace', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.listing.tpl', 38, false),array('modifier', 'date_format', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.listing.tpl', 50, false),)), $this); ?>
<!-- weather forecast listing -->

<?php if (! $this->_tpl_vars['wf_error'] && ! $this->_tpl_vars['weatherForecast_listing_city']): ?>
    <script>console.log('Weather Forecast ERROR: No listing city specified, widget disabled.')</script>
<?php else: ?>
    <div id="weather-listing-cont"<?php if ($this->_tpl_vars['config']['weatherForecast_position'] != 'top'): ?> class="hide"<?php endif; ?>>
        <?php if ($this->_tpl_vars['config']['weatherForecast_position'] == 'top' || $this->_tpl_vars['config']['weatherForecast_position'] == 'bottom'): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => 'weather_forecast','name' => $this->_tpl_vars['lang']['weatherForecast_weather_foreacst'],'line' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>   

        <div class="weather-widget weather-listing clearfix">
            <div class="location"><b>
                <?php if ($this->_tpl_vars['config']['weatherForecast_position'] == 'in_group'): ?>
                    <?php $this->assign('replace', ('{')."location".('}')); ?>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['weatherForecast_weather_in'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['weatherForecast_listing_city']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['weatherForecast_listing_city'])); ?>

                <?php else: ?>
                    <?php echo $this->_tpl_vars['weatherForecast_listing_city']; ?>

                <?php endif; ?>
            </b></div>
            
            <div class="current-cond">
                <div class="hborder" title="<?php echo $this->_tpl_vars['lang']['weatherForecast_cur_cond']; ?>
">
                    <div class="two-inline left clearfix">
                        <ul class="weather-icon">
                            <li class="base"></li>
                            <li class="pheno"></li>
                        </ul>
                        <div class="weather-info">
                            <div class="temp">-- <?php if ($this->_tpl_vars['config']['weatherForecast_units'] == 'Celsius'): ?>°C<?php else: ?>°F<?php endif; ?></div>
                            <div class="cond"><?php if ($this->_tpl_vars['wf_error']): ?><?php echo $this->_tpl_vars['lang']['error']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['loading']; ?>
<?php endif; ?></div>
                        </div>
                    </div>
                </div>

                <div class="weather-cp hide">
                    <div>
                        <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp='<a target="_blank" href="http://openweathermap.org/city/')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['config']['weatherForecast_wb_location_id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['config']['weatherForecast_wb_location_id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['weatherForecast_more_forecast'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>

                    </div>
                </div>
            </div>

            <?php if ($this->_tpl_vars['wf_error']): ?>
                <div class="forecast"><?php echo $this->_tpl_vars['wf_error']; ?>
</div>
            <?php else: ?>
                <ul class="forecast">
                    <?php unset($this->_sections['wf_loop']);
$this->_sections['wf_loop']['loop'] = is_array($_loop=3) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['wf_loop']['name'] = 'wf_loop';
$this->_sections['wf_loop']['max'] = (int)3;
$this->_sections['wf_loop']['show'] = true;
if ($this->_sections['wf_loop']['max'] < 0)
    $this->_sections['wf_loop']['max'] = $this->_sections['wf_loop']['loop'];
$this->_sections['wf_loop']['step'] = 1;
$this->_sections['wf_loop']['start'] = $this->_sections['wf_loop']['step'] > 0 ? 0 : $this->_sections['wf_loop']['loop']-1;
if ($this->_sections['wf_loop']['show']) {
    $this->_sections['wf_loop']['total'] = min(ceil(($this->_sections['wf_loop']['step'] > 0 ? $this->_sections['wf_loop']['loop'] - $this->_sections['wf_loop']['start'] : $this->_sections['wf_loop']['start']+1)/abs($this->_sections['wf_loop']['step'])), $this->_sections['wf_loop']['max']);
    if ($this->_sections['wf_loop']['total'] == 0)
        $this->_sections['wf_loop']['show'] = false;
} else
    $this->_sections['wf_loop']['total'] = 0;
if ($this->_sections['wf_loop']['show']):

            for ($this->_sections['wf_loop']['index'] = $this->_sections['wf_loop']['start'], $this->_sections['wf_loop']['iteration'] = 1;
                 $this->_sections['wf_loop']['iteration'] <= $this->_sections['wf_loop']['total'];
                 $this->_sections['wf_loop']['index'] += $this->_sections['wf_loop']['step'], $this->_sections['wf_loop']['iteration']++):
$this->_sections['wf_loop']['rownum'] = $this->_sections['wf_loop']['iteration'];
$this->_sections['wf_loop']['index_prev'] = $this->_sections['wf_loop']['index'] - $this->_sections['wf_loop']['step'];
$this->_sections['wf_loop']['index_next'] = $this->_sections['wf_loop']['index'] + $this->_sections['wf_loop']['step'];
$this->_sections['wf_loop']['first']      = ($this->_sections['wf_loop']['iteration'] == 1);
$this->_sections['wf_loop']['last']       = ($this->_sections['wf_loop']['iteration'] == $this->_sections['wf_loop']['total']);
?>
                        <li>
                            <div class="two-inline left clearfix">
                                <div class="day"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%a') : smarty_modifier_date_format($_tmp, '%a')); ?>
</div>
                                <div class="day-forecast">
                                    <ul class="weather-icon w">
                                        <li class="base"></li>
                                        <li class="pheno"></li>
                                    </ul>
                                    <div class="cond"><?php echo $this->_tpl_vars['lang']['loading']; ?>
</div>
                                    <div class="temp">
                                        <span><span><?php echo $this->_tpl_vars['lang']['weatherForecast_high']; ?>
</span> --<span>, </span></span>
                                        <span><span><?php echo $this->_tpl_vars['lang']['weatherForecast_low']; ?>
</span> --</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endfor; endif; ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <?php if ($this->_tpl_vars['config']['weatherForecast_position'] == 'top' || $this->_tpl_vars['config']['weatherForecast_position'] == 'bottom'): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    </div>

    <script>
    var weatherForecastListing = new Object();
    weatherForecastListing.target = 'weather-listing';
    weatherForecastListing.mode = '<?php if ($this->_tpl_vars['weatherForecast_listing_coordinates']): ?>coordinates<?php else: ?>location<?php endif; ?>';
    weatherForecastListing.location = "<?php echo $this->_tpl_vars['weatherForecast_listing_location']; ?>
";
    weatherForecastListing.position = '<?php echo $this->_tpl_vars['config']['weatherForecast_position']; ?>
';
    weatherForecastListing.position_group = '<?php echo $this->_tpl_vars['config']['weatherForecast_group']; ?>
';
    weatherForecastListing.position_in_group = '<?php echo $this->_tpl_vars['config']['weatherForecast_group_possition']; ?>
';
    </script>
<?php endif; ?>

<!-- weather forecast listing -->