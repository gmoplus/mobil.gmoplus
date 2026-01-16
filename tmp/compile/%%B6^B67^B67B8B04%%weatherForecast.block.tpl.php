<?php /* Smarty version 2.6.31, created on 2025-09-17 21:43:15
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'weatherCondition', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.block.tpl', 30, false),array('modifier', 'date_format', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.block.tpl', 43, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.block.tpl', 65, false),array('modifier', 'regex_replace', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/weatherForecast.block.tpl', 66, false),)), $this); ?>
<!-- weather forecast block -->

<?php if ($this->_tpl_vars['forecast'] || ( $this->_tpl_vars['config']['weatherForecast_use_geo'] && $_SESSION['GEOLocationData']->City )): ?>
    <div class="weather-widget weather-box clearfix">
        <div class="current-cond">
            <div class="location">
                <b>
                <?php $this->assign('lf_lang_code', (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null)); ?>
                <?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?>
                    <?php if ($_SESSION['GEOLocationData']->City_names && is_array ( $_SESSION['GEOLocationData']->City_names ) && $_SESSION['GEOLocationData']->City_names[$this->_tpl_vars['lf_lang_code']]): ?>
                        <?php echo $_SESSION['GEOLocationData']->City_names[$this->_tpl_vars['lf_lang_code']]; ?>

                    <?php else: ?>
                        <?php echo $_SESSION['GEOLocationData']->City; ?>

                    <?php endif; ?>
                <?php else: ?>
                    <?php echo $this->_tpl_vars['forecast']['location']; ?>

                <?php endif; ?>
                </b>
            </div>
            <div class="hborder" title="<?php echo $this->_tpl_vars['lang']['weatherForecast_cur_cond']; ?>
">
                <div class="two-inline left clearfix">
                    <ul class="weather-icon w<?php if (! $this->_tpl_vars['config']['weatherForecast_use_geo']): ?><?php echo $this->_tpl_vars['forecast']['forecast'][0]['icon']; ?>
<?php endif; ?>">
                        <li class="base"></li>
                        <li class="pheno"></li>
                    </ul>
                    <div class="weather-info">
                        <div class="temp"><?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?>-- <?php if ($this->_tpl_vars['config']['weatherForecast_units'] == 'Celsius'): ?>°C<?php else: ?>°F<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['forecast']['forecast'][0]['temp']; ?>
<?php endif; ?></div>
                        <div class="cond"><?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?><?php echo $this->_tpl_vars['lang']['loading']; ?>
<?php else: ?><?php echo $this->_plugins['function']['weatherCondition'][0][0]->weatherCondition(array('id' => $this->_tpl_vars['forecast']['forecast'][0]['icon_id'],'icon' => $this->_tpl_vars['forecast']['forecast'][0]['icon']), $this);?>
<?php endif; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="forecast">
            <?php if ($this->_tpl_vars['forecast']): ?>
                <?php $_from = $this->_tpl_vars['forecast']['forecast']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['forecastF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['forecastF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['day']):
        $this->_foreach['forecastF']['iteration']++;
?>
                    <?php if (($this->_foreach['forecastF']['iteration'] <= 1)): ?><?php continue; ?><?php endif; ?>

                    <li>
                        <div class="two-inline left clearfix">
                            <div class="day"><?php echo ((is_array($_tmp=$this->_tpl_vars['day']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%a') : smarty_modifier_date_format($_tmp, '%a')); ?>
</div>
                            <div class="day-forecast">
                                <ul class="weather-icon w<?php if (! $this->_tpl_vars['config']['weatherForecast_use_geo']): ?><?php echo $this->_tpl_vars['day']['icon']; ?>
<?php endif; ?>">
                                    <li class="base"></li>
                                    <li class="pheno"></li>
                                </ul>
                                <div class="cond"><?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?><?php echo $this->_tpl_vars['lang']['loading']; ?>
<?php else: ?><?php echo $this->_plugins['function']['weatherCondition'][0][0]->weatherCondition(array('id' => $this->_tpl_vars['day']['icon_id'],'icon' => $this->_tpl_vars['day']['icon']), $this);?>
<?php endif; ?></div>
                                <div class="temp">
                                    <span><span><?php echo $this->_tpl_vars['lang']['weatherForecast_high']; ?>
</span> <?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?>--<?php else: ?><?php echo $this->_tpl_vars['day']['temp_max']; ?>
<?php endif; ?><span>, </span></span>
                                    <span><span><?php echo $this->_tpl_vars['lang']['weatherForecast_low']; ?>
</span> <?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?>--<?php else: ?><?php echo $this->_tpl_vars['day']['temp_min']; ?>
<?php endif; ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; endif; unset($_from); ?>
            <?php else: ?>

            <?php endif; ?>
        </ul>

        <div class="weather-cp<?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?> hide<?php endif; ?>">
            <div>
                <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp='<a target="_blank" href="http://openweathermap.org/city/')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['config']['weatherForecast_wb_location_id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['config']['weatherForecast_wb_location_id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['weatherForecast_more_forecast'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>

            </div>
        </div>
    </div>

    <script>
    var weatherForecastBox = new Object();
    weatherForecastBox.target = 'weather-box';
    weatherForecastBox.mode = '<?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?>location<?php else: ?>id<?php endif; ?>';
    weatherForecastBox.location = <?php if ($this->_tpl_vars['config']['weatherForecast_use_geo']): ?><?php if ($_SESSION['GEOLocationData']->Country_code && $_SESSION['GEOLocationData']->City): ?>"<?php echo $_SESSION['GEOLocationData']->City; ?>
,<?php echo $_SESSION['GEOLocationData']->Country_code; ?>
"<?php else: ?>false<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['config']['weatherForecast_wb_location_id']; ?>
<?php endif; ?>;
    weatherForecastBox.now = <?php echo time(); ?>
;
    weatherForecastBox.updateTime = <?php echo $this->_tpl_vars['next_update']; ?>
;
    weatherForecastBox.cachePeriod = <?php if ($this->_tpl_vars['config']['weatherForecast_cache']): ?><?php echo $this->_tpl_vars['config']['weatherForecast_cache']; ?>
<?php else: ?>1<?php endif; ?>;
    weatherForecastBox.cached = <?php if (! $this->_tpl_vars['config']['weatherForecast_use_geo'] && $this->_tpl_vars['forecast']): ?>true<?php else: ?>false<?php endif; ?>;
    </script>
<?php else: ?>
    <span class="text-notice"><?php echo $this->_tpl_vars['lang']['weatherForecast_no_location']; ?>
</span>
<?php endif; ?>

<!-- weather forecast block end -->