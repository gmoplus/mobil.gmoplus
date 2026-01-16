<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/js.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/js.tpl', 6, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/weatherForecast/js.tpl', 9, false),)), $this); ?>
<!-- weather forecase | footer js code statement -->

<script>
lang['error'] = "<?php echo $this->_tpl_vars['lang']['error']; ?>
";
lang['weatherForecast_no_wf'] = "<?php echo $this->_tpl_vars['lang']['weatherForecast_no_wf']; ?>
";
var weatherForecast_lang = "<?php if ((defined('RL_LANG_CODE') ? @RL_LANG_CODE : null) == 'en'): ?>en-GB<?php else: ?><?php echo ((is_array($_tmp=(defined('RL_LANG_CODE') ? @RL_LANG_CODE : null))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
<?php endif; ?>";
var weatherForecast_conditions = new Array();
<?php $_from = $this->_tpl_vars['condition_codes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['weather_code'] => $this->_tpl_vars['weather_condition']):
?>
    weatherForecast_conditions[<?php echo $this->_tpl_vars['weather_code']; ?>
] = '<?php $this->assign('cond_phrase', ((is_array($_tmp='weatherForecast_cond_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['weather_condition']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['weather_condition']))); ?><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['cond_phrase']]; ?>
';
<?php endforeach; endif; unset($_from); ?>
</script>

<script id="weather-forecast" type="text/x-jquery-tmpl">
<?php echo '

<li>
    <div class="two-inline left clearfix">
        <div class="day">${week_day_short}</div>
        <div class="day-forecast">
            <ul class="weather-icon w${icon}">
                <li class="base"></li>
                <li class="pheno"></li>
            </ul>
            <div class="cond">${name}</div>
            <div class="temp">
                <span><span>'; ?>
<?php echo $this->_tpl_vars['lang']['weatherForecast_high']; ?>
<?php echo '</span> ${temp_max}<span>, </span></span>
                <span><span>'; ?>
<?php echo $this->_tpl_vars['lang']['weatherForecast_low']; ?>
<?php echo '</span> ${temp_min}</span>
            </div>
        </div>
    </div>
</li>

'; ?>

</script>

<!-- weather forecase | footer js code statement end -->