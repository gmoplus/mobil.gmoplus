<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/menus/main_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/menus/main_menu.tpl', 26, false),)), $this); ?>
<!-- main menu block -->

<div class="menu d-flex h-100 align-items-center flex-grow-0 flex-md-fill shrink-fix">
    <div class="d-none d-md-flex h-100 flex-fill shrink-fix">
        <span class="mobile-menu-header d-none align-items-center order-1">
            <span class="mobile-menu-header-title"><?php echo $this->_tpl_vars['lang']['menu']; ?>
</span>
            <div class="flex-fill d-flex mr-3 justify-content-center" id="mobile-left-usernav"></div>
            <svg viewBox="0 0 12 12" class="mobile-close-icon">
                <use xlink:href="#close-icon"></use>
            </svg>
        </span>

        <div class="menu-content pt-3 pb-3 pt-md-0 pb-md-0 order-3">
        <?php $_from = $this->_tpl_vars['main_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mMenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mMenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mainMenu']):
        $this->_foreach['mMenu']['iteration']++;
?>
            <?php if ($this->_tpl_vars['mainMenu']['Key'] == 'add_listing'): ?><?php $this->assign('add_listing_button', $this->_tpl_vars['mainMenu']); ?><?php continue; ?><?php endif; ?>

            <a title="<?php echo $this->_tpl_vars['mainMenu']['title']; ?>
"
               class="<?php if ($this->_tpl_vars['pageInfo']['Key'] == $this->_tpl_vars['mainMenu']['Key']): ?> active<?php endif; ?>"
               <?php if ($this->_tpl_vars['mainMenu']['No_follow'] || $this->_tpl_vars['mainMenu']['Login']): ?>
               rel="nofollow"
               <?php endif; ?>
               href="<?php echo ''; ?><?php if ($this->_tpl_vars['mainMenu']['Page_type'] == 'external'): ?><?php echo ''; ?><?php echo $this->_tpl_vars['mainMenu']['Controller']; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['mainMenu']['Key'],'vars' => $this->_tpl_vars['mainMenu']['Get_vars']), $this);?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
"><?php echo $this->_tpl_vars['mainMenu']['name']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
        </div>

        <?php if ($this->_tpl_vars['add_listing_button']): ?>
            <a class="button add-property order-2 flex-shrink-0 d-flex d-md-none"
                <?php if ($this->_tpl_vars['mainMenu']['No_follow'] || $this->_tpl_vars['mainMenu']['Login']): ?>
                rel="nofollow"
                <?php endif; ?>
                title="<?php echo $this->_tpl_vars['mainMenu']['title']; ?>
"
                href="<?php echo ''; ?><?php if ($this->_tpl_vars['pageInfo']['Controller'] != 'add_listing' && ! empty ( $this->_tpl_vars['category']['Path'] ) && ! $this->_tpl_vars['category']['Lock']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['rlBase']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['add_listing_button']['Path']; ?><?php echo '/'; ?><?php echo $this->_tpl_vars['category']['Path']; ?><?php echo '/'; ?><?php echo $this->_tpl_vars['steps']['plan']['path']; ?><?php echo '.html'; ?><?php else: ?><?php echo '?page='; ?><?php echo $this->_tpl_vars['add_listing_button']['Path']; ?><?php echo '&step='; ?><?php echo $this->_tpl_vars['steps']['plan']['path']; ?><?php echo '&id='; ?><?php echo $this->_tpl_vars['category']['ID']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['add_listing_button']['Key']), $this);?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
">
            <?php echo $this->_tpl_vars['add_listing_button']['name']; ?>
</a>
        <?php endif; ?>

        <div class="menu-content order-4 d-block d-md-none mt-3 pt-2 pb-2">
            <div class="content <?php if ($this->_tpl_vars['isLogin']): ?>a-menu<?php endif; ?>">
                <?php if ($this->_tpl_vars['isLogin']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menus/account_menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php else: ?>
                    <span class="user-navbar-container">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/login_modal.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<span class="menu-button d-flex d-md-none align-items-center" title="<?php echo $this->_tpl_vars['lang']['menu']; ?>
">
    <svg viewBox="0 0 20 14">
        <use xlink:href="#mobile-menu"></use>
    </svg>
</span>


<!-- main menu block end -->