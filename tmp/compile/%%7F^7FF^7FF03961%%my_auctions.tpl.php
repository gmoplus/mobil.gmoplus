<?php /* Smarty version 2.6.31, created on 2025-07-27 12:48:24
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_auctions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/my_auctions.tpl', 6, false),)), $this); ?>
<!-- my bids/offers | shopping cart -->

<div class="content-padding">
    <?php if (! empty ( $this->_tpl_vars['auction_info'] )): ?>
        <?php if ($this->_tpl_vars['auction_mod'] == 'live'): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/auction_details_live.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/auction_details_live.tpl')), 'smarty_include_vars' => array('auction_info' => $this->_tpl_vars['auction_info'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php else: ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/auction_details.tpl') : smarty_modifier_cat($_tmp, 'shoppingCart/view/auction_details.tpl')), 'smarty_include_vars' => array('auction_info' => $this->_tpl_vars['auction_info'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    <?php elseif (! isset ( $_GET['item'] )): ?>
        <!-- tabs -->
        <ul class="tabs">
            <?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tab']):
        $this->_foreach['tabF']['iteration']++;
?><?php echo '<li '; ?><?php if (( ($this->_foreach['tabF']['iteration'] <= 1) && ! $this->_tpl_vars['auction_mod'] ) || $this->_tpl_vars['auction_mod'] == $this->_tpl_vars['tab']['key']): ?><?php echo 'class="active"'; ?><?php endif; ?><?php echo ' id="tab_'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '"><a href="#'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '" data-target="'; ?><?php echo $this->_tpl_vars['tab']['key']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['tab']['name']; ?><?php echo '</a></li>'; ?>
<?php endforeach; endif; unset($_from); ?>
        </ul>
        <!-- tabs end -->

        <div id="auctions">
            <?php if ($this->_tpl_vars['auctions']): ?>
                <?php if ($this->_tpl_vars['auction_mod'] == 'winnerbids' || ! $this->_tpl_vars['auction_mod']): ?>
                    <?php $this->assign('auction_tab_file', 'my_auctions_won.tpl'); ?>
                <?php else: ?>
                    <?php $this->assign('auction_tab_file', 'my_auctions.tpl'); ?>
                <?php endif; ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'shoppingCart/view/') : smarty_modifier_cat($_tmp, 'shoppingCart/view/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['auction_tab_file']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['auction_tab_file'])), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<script>
var auctionHash = flynax.getHash();
var auctionMode = auctionHash ? auctionHash : 'winnerbids';
rlConfig['shc_orders_per_page'] = <?php if ($this->_tpl_vars['config']['shc_orders_per_page']): ?><?php echo $this->_tpl_vars['config']['shc_orders_per_page']; ?>
<?php else: ?>10<?php endif; ?>;
lang['shc_no_auctions'] = '<?php echo $this->_tpl_vars['lang']['shc_no_auctions']; ?>
';
<?php echo '

$(function(){
    $(\'ul.tabs li\').click(function(){
        if ($(this).hasClass(\'more\') || $(this).hasClass(\'overflowed\')) {
            return;
        }

        auctionMode = $(this).attr(\'id\').split(\'_\')[1];
        loadAuctions(auctionMode);
    });

    $(\'#auctions\').on(\'click\', \'[name=load_more_auctions]\', function(){
        $(this)
            .prop(\'disabled\', true)
            .addClass(\'disabled\')
            .val(lang[\'loading\']);

        var dataPage = $(this).data(\'page\');
        var page = dataPage ? parseInt(dataPage) : 1;
        page++;
        loadAuctions(auctionMode, page);
        $(this).attr(\'data-page\', page);
    });

    $(\'#tab_\' + auctionMode).click();
});

var loadAuctions = function(mode, page) {
    var $container = $(\'#auctions\');
    var $wrapper = $(\'#content_\' + mode);
    var tabCreated = $wrapper.length;

    $container.find(\'> div\').addClass(\'d-none\');

    if (tabCreated) {
        $wrapper.removeClass(\'d-none\');
    } else {
        $wrapper = $(\'<div>\').attr(\'id\', \'content_\' + mode);
        $wrapper.html(\'<div class="preloader">\'+ lang[\'loading\']+\'</div>\');
    }

    $container.append($wrapper);

    if (!tabCreated || page) {
        var data = {
            mode: \'shoppingCartBidsOffers\',
            item: mode,
            page: page ? page : 1
        };
        flUtil.ajax(data, function(response) {
            $wrapper.find(\'.preloader\').remove();

            if (response.status == \'OK\') {
                if (page) {
                    $wrapper.find(\'.list-table\').append(response.content);

                    if (!response.count|| response.count < rlConfig[\'shc_orders_per_page\']) {
                        $wrapper.find(\'.shc-load-more-button-cont\').remove();
                    } else {
                        $loadMoreButton = $wrapper.find(\'[name=load_more_auctions]\');
                        $loadMoreButton
                            .prop(\'disabled\', false)
                            .removeClass(\'disabled\')
                            .val($loadMoreButton.data(\'phrase\'));
                    }
                } else {
                    if (response.count) {
                        $wrapper.html(response.content);
                    } else {
                        $wrapper.html(\'<div class="text-notice">\' + lang[\'shc_no_auctions\'] + \'</div>\');
                    }
                }
            } else {
                printMessage(\'error\', response.message);
            }
        });
    }
}

'; ?>

</script>

<!-- my bids/offers end | shopping cart -->