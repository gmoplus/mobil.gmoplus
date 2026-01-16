<?php /* Smarty version 2.6.31, created on 2025-07-12 17:24:00
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/reportBrokenListing/view/footer.tpl */ ?>
<!-- report broken listing form -->
<div class="hide" id="reportBrokenListing_form">
    <div class="caption hide"><?php echo $this->_tpl_vars['lang']['reportbroken_add_comment']; ?>
</div>
    <div class="text-center rbl_loading"><?php echo $this->_tpl_vars['lang']['loading']; ?>
</div>
    <div id="points"></div>
    <div class="report-nav hide">
        <div class="mt-4">
            <input type="submit" id="add-report" name="send" value="<?php echo $this->_tpl_vars['lang']['rbl_report']; ?>
" class="mr-3" />
            <a href="javascript://" class="close"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
        </div>
    </div>
</div>

<div class="hide" id="remove_report_form">
    <div class="caption"></div>
    <div><?php echo $this->_tpl_vars['lang']['reportbroken_do_you_want_to_delete_list']; ?>
</div>
    <div class="mt-4">
        <input type="submit" id="remove-report-button" name="remove" value="<?php echo $this->_tpl_vars['lang']['yes']; ?>
" class="mr-3" />
        <a href="javascript://" class="close"><?php echo $this->_tpl_vars['lang']['no']; ?>
</a>
    </div>
</div>

<script class="fl-js-dynamic">
    rlConfig['reportBroken_listing_id'] = <?php if ($this->_tpl_vars['listing_data']['ID']): ?><?php echo $this->_tpl_vars['listing_data']['ID']; ?>
<?php else: ?>0<?php endif; ?>;
    rlConfig['reportBroken_message_length'] = <?php if ($this->_tpl_vars['config']['reportBroken_message_length']): ?><?php echo $this->_tpl_vars['config']['reportBroken_message_length']; ?>
<?php else: ?>300<?php endif; ?>;
    lang['message'] = '<?php echo $this->_tpl_vars['lang']['message']; ?>
';

    $(document).ready(function() <?php echo '{'; ?>

        var reportBrokenListing = new ReportBrokenListings();
        reportBrokenListing.listing_id = rlConfig['reportBroken_listing_id'];
        reportBrokenListing.init();
    <?php echo '}'; ?>
);
</script>
<!-- report broken listing form end -->