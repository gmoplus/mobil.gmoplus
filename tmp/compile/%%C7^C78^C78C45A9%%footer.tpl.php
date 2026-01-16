<?php /* Smarty version 2.6.31, created on 2025-07-14 13:48:59
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/bankWireTransfer/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/mobil.gmoplus.com/plugins/bankWireTransfer/footer.tpl', 107, false),)), $this); ?>
<?php if ($this->_tpl_vars['pageInfo']['Key'] == 'payment_history'): ?>
    <script class="fl-js-dynamic">
        var transactions = new Array();
        <?php $_from = $this->_tpl_vars['transactions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
            var html_item = '';
            <?php if ($this->_tpl_vars['item']['Gateway_key'] == 'bankWireTransfer' && ! empty ( $this->_tpl_vars['item']['Txn_ID'] )): ?>
                html_item = '<div data-caption="<?php echo $this->_tpl_vars['lang']['bwt_doc_file']; ?>
" id="bwt-file-<?php echo $this->_tpl_vars['item']['ID']; ?>
">';
                <?php if ($this->_tpl_vars['item']['Status'] == 'unpaid'): ?>
                    html_item += '<a href="javascript://" class="bwt-upload-file mb-2<?php if (! empty ( $this->_tpl_vars['item']['Doc'] )): ?> hide<?php else: ?> d-block<?php endif; ?>" title="<?php echo $this->_tpl_vars['lang']['bwt_upload']; ?>
" data-item="<?php echo $this->_tpl_vars['item']['ID']; ?>
"><svg viewBox="0 0 24 24" width="18" height="18" class="icon grid-icon-fill align-middle"><use xlink:href="#upload"></use></svg>&nbsp;<?php echo $this->_tpl_vars['lang']['upload']; ?>
</a>';
                <?php endif; ?>
                <?php if (! empty ( $this->_tpl_vars['item']['Doc'] )): ?>
                    html_item += '<a class="d-block download text-truncate d-inline-block" style="max-width: 120px;" href="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['item']['Doc']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['lang']['bwt_view_doc']; ?>
"><svg width="18" height="18" viewBox="0 0 24 24" class="icon grid-icon-fill align-middle"><use xlink:href="#download"></use></svg>&nbsp;<?php echo $this->_tpl_vars['item']['Doc_name']; ?>
</a>';
                    <?php if ($this->_tpl_vars['item']['Status'] == 'unpaid'): ?>
                        html_item += '<a class="bwt-delete-file d-block mt-2" data-item="<?php echo $this->_tpl_vars['item']['ID']; ?>
" href="javascript://"><svg width="18" height="18" viewBox="0 0 24 24" class="icon grid-icon-fill align-middle"><use xlink:href="#remove"></use></svg>&nbsp;<?php echo $this->_tpl_vars['lang']['delete']; ?>
</a>';
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['item']['Status'] == 'paid' && empty ( $this->_tpl_vars['item']['Doc'] )): ?>
                    html_item += '<?php echo $this->_tpl_vars['lang']['not_available']; ?>
';
                <?php endif; ?>
                html_item += '</div>';
            <?php else: ?>
                html_item = '<div data-caption="<?php echo $this->_tpl_vars['lang']['bwt_doc_file']; ?>
"><?php echo $this->_tpl_vars['lang']['not_available']; ?>
</div>';
            <?php endif; ?>
            transactions[<?php echo $this->_tpl_vars['key']; ?>
] = [];
            transactions[<?php echo $this->_tpl_vars['key']; ?>
]['ID'] = '<?php echo $this->_tpl_vars['item']['ID']; ?>
';
            transactions[<?php echo $this->_tpl_vars['key']; ?>
]['Txn_ID'] = '<?php echo $this->_tpl_vars['item']['Txn_ID']; ?>
';
            transactions[<?php echo $this->_tpl_vars['key']; ?>
]['Gateway'] = '<?php echo $this->_tpl_vars['item']['Gateway_key']; ?>
';
            transactions[<?php echo $this->_tpl_vars['key']; ?>
]['html_item'] = html_item;
        <?php endforeach; endif; unset($_from); ?>

        <?php echo '
        $(document).ready(function() {
            $(\'.transactions > div.header > div:eq(2)\').after(\'<div style="width: 120px;">'; ?>
<?php echo $this->_tpl_vars['lang']['bwt_doc_file']; ?>
<?php echo '</div>\');
            for (var i = 0; i < transactions.length; i++) {
                var txnElID = \'\';

                if ($(\'#txn-id-\' + transactions[i][\'ID\']).length > 0) {
                    txnElID = transactions[i][\'ID\'];
                } else if(transactions[i][\'Txn_ID\'] != \'0\' && transactions[i][\'Txn_ID\'] != \'\') {
                    txnElID = transactions[i][\'Txn_ID\'];
                }

                if (txnElID && transactions[i][\'Gateway\'] == \'bankWireTransfer\') {
                    var tmpTxnID = $(\'#txn-id-\' + txnElID).html();

                    let popupContentID = $(\'#txn_\' + transactions[i][\'ID\']).length
                        ? transactions[i][\'ID\']
                        : transactions[i][\'Txn_ID\'];

                    $(\'#txn-id-\' + txnElID).html(\'<a id="\'+ txnElID +\'" href="#" onClick="initFlModal(this, \\\'txn_\'+ popupContentID +\'\\\')" ref="nofollow" class="btw">\'+ tmpTxnID +\'</a>\');
                }
                $(\'#txn-id-\' + txnElID).parent().parent().after(transactions[i][\'html_item\']);
            }
        });

        function initFlModal(obj, element) {
            $(obj).flModal({
                width: 450,
                height: \'auto\',
                source: \'#\' + element,
                click: false
            });
        }
        '; ?>

    </script>
    <?php $_from = $this->_tpl_vars['transactions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <?php if ($this->_tpl_vars['item']['Gateway_key'] == 'bankWireTransfer' && ! empty ( $this->_tpl_vars['item']['Txn_ID'] )): ?>
            <div class="hide" id="txn_<?php echo $this->_tpl_vars['item']['ID']; ?>
">
                <div class="caption_padding"><?php echo $this->_tpl_vars['lang']['bwt_view_details']; ?>
</div>
                <div class="list-table">
                    <div class="row">
                        <div class="no-flex default">
                            <div class="table-cell clearfix small">
                                <div class="name"><?php echo $this->_tpl_vars['lang']['item']; ?>
</div>
                                <div class="value"><?php echo $this->_tpl_vars['item']['Txn_ID']; ?>
</div>
                            </div>
                            <div class="table-cell clearfix small">
                                <div class="name"><?php echo $this->_tpl_vars['lang']['price']; ?>
</div>
                                <div class="value"><?php if ($this->_tpl_vars['config']['system_currency_position'] == 'before'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['item']['Total']; ?>
<?php if ($this->_tpl_vars['config']['system_currency_position'] == 'after'): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php endif; ?></div>
                            </div>
                            <div class="table-cell clearfix small">
                                <div class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</div>
                                <div class="value"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['item']['Status']]; ?>
</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-cell clearfix small">
                            <div class="value">
                                <div class="table-cell clearfix small">
                                    <div class="name"><b><?php echo $this->_tpl_vars['lang']['bwt_payment_details']; ?>
:</b></div>
                                    <div class="sLine"></div>
                                </div>
                                <?php if ($this->_tpl_vars['item']['Dealer_ID'] && $this->_tpl_vars['item']['payment_details']): ?>
                                    <?php echo $this->_tpl_vars['item']['payment_details']['content']; ?>

                                <?php else: ?>
                                    <?php echo $this->_tpl_vars['payment_details']['content']; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'bankWireTransfer/upload.tpl') : smarty_modifier_cat($_tmp, 'bankWireTransfer/upload.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>