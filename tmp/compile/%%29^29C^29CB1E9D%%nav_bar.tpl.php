<?php /* Smarty version 2.6.31, created on 2025-07-12 17:52:33
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/booking/nav_bar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pageUrl', '/home/gmoplus/mobil.gmoplus.com/plugins/booking/nav_bar.tpl', 8, false),)), $this); ?>
<?php if ($this->_tpl_vars['listing']['ID'] && $this->_tpl_vars['listing']['booking_module'] && ( $this->_tpl_vars['booking_allowed_plans'][$this->_tpl_vars['listing']['Plan_ID']] || ( $this->_tpl_vars['config']['membership_module'] && $this->_tpl_vars['booking_allowed_membership_plans'][$this->_tpl_vars['listing']['Plan_ID']] ) ) && $this->_tpl_vars['listing_type']['Booking_type'] != 'none'): ?>
    <li class="nav-icon">
        <a class="booking-details" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => 'booking_details','vars' => "id=".($this->_tpl_vars['listing']['ID'])), $this);?>
">
            <span><?php echo $this->_tpl_vars['lang']['booking_module']; ?>
</span>
        </a>
    </li>
<?php endif; ?>