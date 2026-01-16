<?php /* Smarty version 2.6.31, created on 2025-07-27 12:57:13
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/priceHistory/view/apTplFooter.tpl */ ?>
<script>
    var ph_listing_id = '<?php echo $_GET['id']; ?>
';
    $('#edit_listing > fieldset').first().after('<div id="ph-container"></div>');
    $('#ph-container').load(rlPlugins + 'priceHistory/admin/price_history_edit.php?id=' + ph_listing_id);
</script>