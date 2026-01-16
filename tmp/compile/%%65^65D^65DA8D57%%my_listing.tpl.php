<?php /* Smarty version 2.6.31, created on 2025-07-12 17:52:33
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/shoppingCart/view/my_listing.tpl */ ?>
<?php if ($this->_tpl_vars['listing']['shc_mode'] == 'auction'): ?>
    <?php if (( $this->_tpl_vars['listing']['shc_auction_status'] == 'closed' || $this->_tpl_vars['listing']['shc']['time_left_value'] <= 0 ) && $this->_tpl_vars['listing']['shc']['Auction_won'] != ''): ?>
        <li class="nav-icon text-nowrap qtip" title="<?php echo $this->_tpl_vars['lang']['shc_winner']; ?>
 <?php echo $this->_tpl_vars['listing']['shc']['winner']['Full_name']; ?>
">
            <svg viewBox="0 0 18 18" class="icon shc-my-listings-icon">
                <use xlink:href="#auction_bids"></use>
            </svg>
            <a class="shc-my-listings-link" href="javascript://">
                <span><?php echo $this->_tpl_vars['lang']['shc_closed']; ?>
</span>
            </a>
        </li>
    <?php endif; ?>
    <?php if (( ( $this->_tpl_vars['listing']['shc_auction_status'] == 'closed' || $this->_tpl_vars['listing']['shc']['time_left_value'] <= 0 ) && $this->_tpl_vars['listing']['shc']['Auction_won'] == '' ) || $this->_tpl_vars['listing']['shc_days'] <= 0): ?>
        <li class="nav-icon text-nowrap">
            <svg viewBox="0 0 18 18" class="icon shc-my-listings-icon">
                <use xlink:href="#renew_auction"></use>
            </svg>
            <a class="shc-my-listings-link renew-auction" <?php echo $this->_tpl_vars['lang']['shc_renew_auction']; ?>
 href="javascript://" id="renew_auction-<?php echo $this->_tpl_vars['listing']['ID']; ?>
">
                <span><?php echo $this->_tpl_vars['lang']['shc_renew_auction']; ?>
</span>
            </a>
        </li>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['listing']['shc_auction_status'] == 'active' && $this->_tpl_vars['listing']['shc']['Auction_won'] <= 0 && $this->_tpl_vars['listing']['shc']['time_left'] > 0): ?>
        <li class="nav-icon text-nowrap" title="<?php echo $this->_tpl_vars['listing']['shc_total_bids']; ?>
 <?php echo $this->_tpl_vars['lang']['shc_bids']; ?>
">
            <svg viewBox="0 0 18 18" class="icon shc-my-listings-icon">
                <use xlink:href="#auction_bids"></use>
            </svg>
            <a class="shc-my-listings-link" href="<?php echo $this->_tpl_vars['listing']['url']; ?>
#bids">
                <span><?php echo $this->_tpl_vars['listing']['shc_total_bids']; ?>
 <?php echo $this->_tpl_vars['lang']['shc_bids']; ?>
</span>
            </a>
        </li>
        <?php if ($this->_tpl_vars['listing']['shc_total_bids'] > 0): ?>
        <li class="nav-icon text-nowrap">
            <svg viewBox="-2 -2 14 14" class="icon shc-my-listings-icon">
                <use xlink:href="#close_icon"></use>
            </svg>
            <a class="shc-my-listings-link close-auction" title="<?php echo $this->_tpl_vars['lang']['shc_close_auction']; ?>
" href="javascript://" id="close_auction-<?php echo $this->_tpl_vars['listing']['ID']; ?>
">
                <span><?php echo $this->_tpl_vars['lang']['shc_close_auction']; ?>
</span>
            </a>
        </li>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>