<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/blocks/user_navbar.tpl */ ?>
<!-- user navigation bar -->

<span class="d-none d-md-flex circle<?php if ($this->_tpl_vars['isLogin']): ?> logged-in<?php endif; ?><?php if ($this->_tpl_vars['new_messages']): ?> notify<?php endif; ?>" id="user-navbar">
    <span class="default">
        <svg viewBox="0 0 22 22" class="header-usernav-icon-fill">
            <use xlink:href="#user-icon"></use>
        </svg>
    </span>
    <span class="content <?php if ($this->_tpl_vars['isLogin']): ?>a-menu<?php endif; ?> hide">
        <?php if ($this->_tpl_vars['isLogin']): ?>
            <div class="account-name"><?php echo $this->_tpl_vars['isLogin']; ?>
</div>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menus/user_navbar_menu.tpl', 'smarty_include_vars' => array()));
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
    </span>
</span>

<span class="circle" id="theme-switcher">
    <span class="default">
        <svg viewBox="0 0 22 22">
            <?php if ($_COOKIE['colorTheme']): ?>
            <use xlink:href="#theme-<?php if ($_COOKIE['colorTheme'] == 'dark'): ?>sun<?php else: ?>moon<?php endif; ?>-icon"></use>
            <?php else: ?>
            <use id="theme-switcher-sun" xlink:href="#theme-sun-icon"></use>
            <use id="theme-switcher-moon" xlink:href="#theme-moon-icon"></use>
            <?php endif; ?>
        </svg>
    </span>
</span>

<!-- user navigation bar end -->