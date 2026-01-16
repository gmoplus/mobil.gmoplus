<?php /* Smarty version 2.6.31, created on 2025-07-12 17:22:47
         compiled from /home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/call-owner/_sidebar-buttons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'phrase', '/home/gmoplus/mobil.gmoplus.com/templates/services_rainbow/components/call-owner/_sidebar-buttons.tpl', 3, false),)), $this); ?>
<!-- Call buttons in sidebar -->

<input type="button" class="w-100 contact-owner" value="<?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'contact_owner'), $this);?>
" accesskey="<?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'contact_owner'), $this);?>
" />
<input class="w-100 mt-3 call-owner" data-listing-id="<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
" type="button" value="<?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'call_owner'), $this);?>
" accesskey="<?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'call_owner'), $this);?>
" />

<!-- Quote Request Button -->
<input type="button" class="w-100 mt-3" id="quote-request-btn" value="Teklif Al" 
       data-listing-id="<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
" 
       data-category-id="<?php echo $this->_tpl_vars['listing_data']['Category_ID']; ?>
"
       style="display: none; background-color: #28a745; border-color: #28a745; color: white;" />

<!-- Call buttons in sidebar end -->