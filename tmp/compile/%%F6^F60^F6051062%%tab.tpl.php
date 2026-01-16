<?php /* Smarty version 2.6.31, created on 2025-07-13 03:01:28
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/cookiesPolicy/tab.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addJS', '/home/gmoplus/mobil.gmoplus.com/plugins/cookiesPolicy/tab.tpl', 112, false),array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/cookiesPolicy/tab.tpl', 112, false),)), $this); ?>
<!-- cookiesPolicy tab -->

<?php if ($this->_tpl_vars['config']['cookiesPolicy_view'] == 'banner'): ?>
    <?php if (! $_COOKIE['cookies_policy']): ?>
        <div class="cookies-policy pt-3 pb-3 pl-2 pr-2 pt-md-4 pb-md-4 position-fixed w-100">
            <div class="point1 container mx-auto">
                <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center">
                    <div class="cookies-policy__content flex-fill mr-0 mr-md-5"><?php echo $this->_tpl_vars['lang']['cookies_policy_content_text']; ?>
</div>
                    <div class="cookies-policy__button mt-3 mt-md-0">
                        <input type="button" class="cookie-accept w-100" value="<?php echo $this->_tpl_vars['lang']['cookies_policy_accept']; ?>
" />
                    </div>
                </div>
            </div>
        </div>

        <script class="fl-js-dynamic">
        var cpBlockAllCookies  = <?php if ($this->_tpl_vars['config']['cp_block_all_cookies']): ?>true<?php else: ?>false<?php endif; ?>;
        <?php echo '

        $(function(){
            $(\'input.cookie-accept\').click(function(){
                createCookie(\'cookies_policy\', true, 365);

                if (rlPageInfo.controller === \'add_listing\' || cpBlockAllCookies) {
                    document.location.reload(true);
                } else {
                    $(\'.cookies-policy\').addClass(\'cookies-policy_accepted\');
                }
            });

            $(\'.cookies-policy\').on(\'transitionend webkitTransitionEnd oTransitionEnd\', function(e){
                if ($(e.target).hasClass(\'cookies-policy\')) {
                    $(\'.compare-ad-container\').addClass(\'cookies-policy-show\');

                    $(this).remove();
                }
            });
        });

        '; ?>

        </script>

        <style>
        <?php echo '
        .cookies-policy {
            background: rgba(0,0,0,.8);
            bottom: 0;
            left: 0;
            opacity: 1;
            z-index: 100;

            transition: opacity 0.4s ease;
        }
        .cookies-policy_accepted {
            opacity: 0;
        }
        .cookies-policy__content {
            font-weight: 300;
            color: white;
            line-height: 26px;
        }
        .cookies-policy__content a {
            filter: brightness(1.8);
        }
        @media (min-width: 768px) {
            .cookies-policy__button {
                flex: 0 0 200px;
            }
        }
        .compare-ad-container:not(.cookies-policy-show) {
            display: none !important;
        }
        '; ?>

        </style>
    <?php endif; ?>
<?php else: ?>
    <?php if ($this->_tpl_vars['config']['cookiesPolicy_position'] && ( ! $this->_tpl_vars['config']['cookiesPolicy_hide_icon'] || ! $_COOKIE['cookies_policy'] )): ?>
        <div id="cookies_policy_<?php echo $this->_tpl_vars['config']['cookiesPolicy_position']; ?>
"
            <?php if ((defined('RL_LANG_DIR') ? @RL_LANG_DIR : null) == 'rtl'): ?>class="cp-rtl"<?php endif; ?>>
            <div class="cookies_policy_icon"
                id="cookies_policy_icon_<?php echo $this->_tpl_vars['config']['cookiesPolicy_position']; ?>
">
                <span>C</span>
            </div>

            <div id="cookies_policy_big_form"
                class="cookies_policy_big_form_<?php echo $this->_tpl_vars['config']['cookiesPolicy_position']; ?>
 hide">
                <div class="header">
                    <div><?php echo $this->_tpl_vars['lang']['cookies_policy_cookie_control']; ?>
</div>
                </div>

                <div class="content"><?php echo $this->_tpl_vars['lang']['cookies_policy_content_text']; ?>
</div>

                <div class="buttons_content">
                    <?php if (! $_COOKIE['cookies_policy']): ?>
                        <input type="button" class="cookie_accept" value="<?php echo $this->_tpl_vars['lang']['cookies_policy_accept']; ?>
" />
                    <?php endif; ?>

                    <input type="button" class="cookie_decline" value="<?php echo $this->_tpl_vars['lang']['cookies_policy_decline']; ?>
" />
                </div>
            </div>
        </div>

        <script>
        var cpConfigs = <?php echo '{}'; ?>
;

        cpConfigs.showCookieNotice = <?php if (! $_COOKIE['cookies_policy']): ?>true<?php else: ?>false<?php endif; ?>;
        cpConfigs.redirectUrl      = '<?php echo $this->_tpl_vars['config']['cookiesPolicy_redirect_url']; ?>
';
        cpConfigs.removeCookieBox  = <?php if ($this->_tpl_vars['config']['cookiesPolicy_hide_icon']): ?>true<?php else: ?>false<?php endif; ?>;
        cpConfigs.blockAllCookies  = <?php if ($this->_tpl_vars['config']['cp_block_all_cookies']): ?>true<?php else: ?>false<?php endif; ?>;
        </script>

        <?php echo $this->_plugins['function']['addJS'][0][0]->smartyAddJS(array('file' => ((is_array($_tmp=(defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, '/cookiesPolicy/static/lib.js') : smarty_modifier_cat($_tmp, '/cookiesPolicy/static/lib.js'))), $this);?>

    <?php endif; ?>
<?php endif; ?>

<!-- cookiesPolicy tab end -->