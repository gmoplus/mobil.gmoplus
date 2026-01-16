<?php /* Smarty version 2.6.31, created on 2025-10-10 21:49:10
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/header.tpl', 18, false),array('modifier', 'explode', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/header.tpl', 63, false),array('function', 'rlHook', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/header.tpl', 20, false),array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/tpl/header.tpl', 47, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'head.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../img/gallery.svg', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="main-wrapper d-flex flex-column">
    <header class="page-header<?php if ($this->_tpl_vars['pageInfo']['Key'] == 'home' && ! $this->_tpl_vars['config']['main_menu_home_page']): ?> main-menu-hidden<?php endif; ?><?php if ($this->_tpl_vars['pageInfo']['Key'] == 'search_on_map'): ?> fixed-menu<?php endif; ?>">
        <div class="point1 clearfix">
            <div class="top-navigation">
                <div class="point1 d-flex mx-auto flex-wrap no-gutters justify-content-between">
                    <div class="d-flex align-items-center flex-fill col-auto col-md-12 position-static">
                        <div class="mr-2" id="logo">
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
" title="<?php echo $this->_tpl_vars['config']['site_name']; ?>
">
                                <img alt="<?php echo $this->_tpl_vars['config']['site_name']; ?>
" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/logo.svg?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" />
                            </a>
                        </div>
                        <div class="d-flex flex-fill justify-content-end">
                            <div class="d-none d-md-flex" id="left-userbar">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'lang_selector.tpl') : smarty_modifier_cat($_tmp, 'lang_selector.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplHeaderUserNav'), $this);?>

                            </div>
                            <div class="d-flex justify-content-end user-navbar">
                                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'tplHeaderUserArea'), $this);?>


                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'user_navbar.tpl') : smarty_modifier_cat($_tmp, 'user_navbar.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>

                            <?php $_from = $this->_tpl_vars['main_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mMenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mMenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mainMenu']):
        $this->_foreach['mMenu']['iteration']++;
?>
                                <?php if ($this->_tpl_vars['mainMenu']['Key'] != 'add_listing'): ?><?php continue; ?><?php endif; ?>

                                <a class="button add-property button-transparent d-none d-md-flex"
                                    <?php if ($this->_tpl_vars['mainMenu']['No_follow'] || $this->_tpl_vars['mainMenu']['Login']): ?>
                                    rel="nofollow"
                                    <?php endif; ?>
                                    title="<?php echo $this->_tpl_vars['mainMenu']['title']; ?>
"
                                    href="<?php echo ''; ?><?php if ($this->_tpl_vars['pageInfo']['Controller'] != 'add_listing' && ! empty ( $this->_tpl_vars['category']['Path'] ) && ! $this->_tpl_vars['category']['Lock']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['rlBase']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['mod_rewrite']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['mainMenu']['Path']; ?><?php echo '/'; ?><?php echo $this->_tpl_vars['category']['Path']; ?><?php echo '/'; ?><?php echo $this->_tpl_vars['steps']['plan']['path']; ?><?php echo '.html'; ?><?php else: ?><?php echo '?page='; ?><?php echo $this->_tpl_vars['mainMenu']['Path']; ?><?php echo '&step='; ?><?php echo $this->_tpl_vars['steps']['plan']['path']; ?><?php echo '&id='; ?><?php echo $this->_tpl_vars['category']['ID']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['mainMenu']['Key']), $this);?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
">
                                    <?php echo $this->_tpl_vars['mainMenu']['name']; ?>

                                </a>
                                <?php break; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                    </div>

                    <nav class="main-menu col-auto col-md-12 d-flex<?php if ($this->_tpl_vars['pageInfo']['Key'] == 'home' && ! $this->_tpl_vars['config']['main_menu_home_page']): ?> d-md-none<?php endif; ?>">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='menus')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'main_menu.tpl') : smarty_modifier_cat($_tmp, 'main_menu.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </nav>
                </div>
            </div>
        </div>
        <?php $this->assign('page_menu', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['pageInfo']['Menus']) : explode($_tmp, $this->_tpl_vars['pageInfo']['Menus']))); ?>

        <?php if ($this->_tpl_vars['pageInfo']['Key'] == 'home'): ?>
        <section class="header-nav d-flex flex-column">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'home_content.tpl') : smarty_modifier_cat($_tmp, 'home_content.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </section>
        <?php endif; ?>
    </header>