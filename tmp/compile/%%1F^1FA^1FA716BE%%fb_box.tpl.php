<?php /* Smarty version 2.6.31, created on 2025-09-17 21:44:53
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins//bookmarks/fb_box.tpl */ ?>
<!-- facebook funs box tpl -->

<?php if ($this->_tpl_vars['config']['bookmarks_fb_box_appid'] && $this->_tpl_vars['config']['bookmarks_fb_box_url']): ?>
    <?php $this->assign('allow_fb_init', true); ?>
    <?php if ($this->_tpl_vars['aHooks']['facebookConnect']): ?>
        <?php if ($this->_tpl_vars['config']['facebookConnect_module'] && $this->_tpl_vars['config']['facebookConnect_appid'] && $this->_tpl_vars['config']['facebookConnect_secret'] && $this->_tpl_vars['config']['facebookConnect_account_type']): ?>
                <?php $this->assign('allow_fb_init', false); ?>
        <?php endif; ?>
    <?php endif; ?>

    <div id="fl-facebook-funs"></div>
    <div id="fb-root"></div>
    <script class="fl-js-dynamic">
    var allow_fb_init = <?php if ($this->_tpl_vars['allow_fb_init']): ?>true<?php else: ?>false<?php endif; ?>;
    <?php echo '
    $(document).ready(function(){
        var width = $(\'#fl-facebook-funs\').width();
        $(\'.fb-page\').attr(\'data-width\', width);

        if ( allow_fb_init ) {
            window.fbAsyncInit = function() {
                // init the FB JS SDK
                FB.init({
                    appId      : \''; ?>
<?php echo $this->_tpl_vars['config']['bookmarks_fb_box_appid']; ?>
<?php echo '\', // App ID from the app dashboard
                    channelUrl : \''; ?>
<?php echo $this->_tpl_vars['config']['bookmarks_fb_box_url']; ?>
<?php echo '\',   // Channel file for x-domain comms
                    status     : true,                                                  // Check Facebook Login status
                    xfbml      : true,                                                  // Look for social plugins on the page
                    version    : \'v2.2\'
                });

                FB.Event.subscribe(\'xfbml.render\',
                    function(response) {
                        $(\'.fb_iframe_widget iframe, .fb_iframe_widget > span\').width(width);
                    }
                );
            };
        }

        // Load the SDK asynchronously
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, \'script\', \'facebook-jssdk\'));
    });

    '; ?>

    </script>

    <div
        class="fb-page" 
        data-href="<?php echo $this->_tpl_vars['config']['bookmarks_fb_box_url']; ?>
"
        data-show-facepile="<?php if ($this->_tpl_vars['config']['bookmarks_fb_box_faces']): ?>true<?php else: ?>false<?php endif; ?>"
        data-tabs="<?php if ($this->_tpl_vars['config']['bookmarks_fb_box_stream']): ?>timeline<?php else: ?>false<?php endif; ?>"
        data-small-header="<?php if ($this->_tpl_vars['config']['bookmarks_fb_box_header']): ?>false<?php else: ?>true<?php endif; ?>"
        <?php if ($this->_tpl_vars['config']['bookmarks_fb_box_height']): ?>
        data-height="<?php echo $this->_tpl_vars['config']['bookmarks_fb_box_height']; ?>
"
        <?php endif; ?>></div>
<?php else: ?>
    <?php echo $this->_tpl_vars['lang']['bookmarks_fb_box_deny']; ?>

<?php endif; ?>

<!-- facebook funs box tpl end -->