<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:20
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/search-on-map-section/_search-on-map-section.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'mapsAPI', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/search-on-map-section/_search-on-map-section.tpl', 3, false),array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/search-on-map-section/_search-on-map-section.tpl', 5, false),array('function', 'addCSS', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/search-on-map-section/_search-on-map-section.tpl', 6, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/search-on-map-section/_search-on-map-section.tpl', 5, false),array('modifier', 'escape', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/search-on-map-section/_search-on-map-section.tpl', 21, false),)), $this); ?>
<!-- search on map section tpl -->

<?php echo $this->_plugins['function']['mapsAPI'][0][0]->mapsAPI(array(), $this);?>


<?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'controllers/search_map/search_map.js') : smarty_modifier_cat($_tmp, 'controllers/search_map/search_map.js'))), $this);?>

<?php echo $this->_plugins['function']['addCSS'][0][0]->smartyAddCSS(array('file' => ((is_array($_tmp=$this->_tpl_vars['rlTplBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'components/search-on-map-section/search-on-map-section.css') : smarty_modifier_cat($_tmp, 'components/search-on-map-section/search-on-map-section.css'))), $this);?>


<div class="search-map-section relative">
    <div id="map_container" class="search-map-section__cont w-100"></div>
    <span class="loading map-loading"><span class="loading-spinner"></span></span>

    <div class="search-map-area overflow-hidden">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'horizontal_search.tpl') : smarty_modifier_cat($_tmp, 'horizontal_search.tpl')), 'smarty_include_vars' => array('search_forms' => $this->_tpl_vars['map_search_forms'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <svg class="hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../img/svg/userLocation.svg', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </svg>
    
    <script class="fl-js-dynamic">
    var default_map_location = '<?php echo ((is_array($_tmp=$this->_tpl_vars['default_map_location'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
';
    var default_map_coordinates = [<?php if ($_POST['loc_lat'] && $_POST['loc_lng']): ?><?php echo $_POST['loc_lat']; ?>
,<?php echo $_POST['loc_lng']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['search_map_location']; ?>
<?php endif; ?>];
    var default_map_zoom = <?php if ($this->_tpl_vars['config']['search_map_location_zoom']): ?><?php echo $this->_tpl_vars['config']['search_map_location_zoom']; ?>
<?php else: ?>14<?php endif; ?>;
    var listings_limit_desktop = <?php if ($this->_tpl_vars['config']['map_search_listings_limit']): ?><?php echo $this->_tpl_vars['config']['map_search_listings_limit']; ?>
<?php else: ?>500<?php endif; ?>;
    var listings_limit_mobile = <?php if ($this->_tpl_vars['config']['map_search_listings_limit_mobile']): ?><?php echo $this->_tpl_vars['config']['map_search_listings_limit_mobile']; ?>
<?php else: ?>75<?php endif; ?>;

    lang['count_properties'] = '<?php echo $this->_tpl_vars['lang']['count_properties']; ?>
';
    lang['number_property_found'] = '<?php echo $this->_tpl_vars['lang']['number_property_found']; ?>
';
    lang['no_properties_found'] = '<?php echo $this->_tpl_vars['lang']['no_properties_found']; ?>
';
    lang['map_listings_request_empty'] = '<?php echo $this->_tpl_vars['lang']['map_listings_request_empty']; ?>
';
    lang['short_price_k'] = '<?php echo $this->_tpl_vars['lang']['short_price_k']; ?>
';
    lang['short_price_m'] = '<?php echo $this->_tpl_vars['lang']['short_price_m']; ?>
';
    lang['short_price_b'] = '<?php echo $this->_tpl_vars['lang']['short_price_b']; ?>
';
    lang['enter_a_location'] = '<?php echo $this->_tpl_vars['lang']['enter_a_location']; ?>
';

    <?php echo '

    var mapTabBar = mapSearch.tabBar;
    mapSearch.tabBar = function(){
        $(\'.leaflet-control-container\').addClass(\'point1\');

        if (typeof mapTabBar == \'function\') {
            mapTabBar.call(mapSearch);
        }
    }

    mapSearch.init({
        mapContainer: $(\'#map_container\'),
        mapCenter: default_map_coordinates,
        mapZoom: default_map_zoom,
        mapAltLocation: default_map_location,
        searchForm: $(\'.search-map-area .search-block-content\'),
        tabBar: $(\'.search-map-area .form-switcher\'),
        desktopLimit: listings_limit_desktop,
        mobileLimit: listings_limit_mobile,
        geocoder: true
    });
    '; ?>

    </script>
</div>

<!-- search on map section tpl end -->