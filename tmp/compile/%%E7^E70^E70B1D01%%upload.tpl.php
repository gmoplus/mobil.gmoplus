<?php /* Smarty version 2.6.31, created on 2025-07-14 13:48:59
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/bankWireTransfer/upload.tpl */ ?>
<div id="bwt_upload_form" class="hide">
    <div class="table-cell">
        <div class="name">
            <?php echo $this->_tpl_vars['lang']['bwt_doc_file_available']; ?>
: .pdf, .zip, .doc, .docx, .xls, .xlsx
        </div>
        <div class="value">
            <input type="file" name="bwt_doc_file">
        </div>
    </div>
</div>
<script class="fl-js-dynamic">
    var tmpItemID = 0;
    <?php echo '
    $(document).ready(function(){
        $(\'.bwt-upload-file\').click(function() {
            tmpItemID = $(this).attr(\'data-item\');
            var el = \'#bwt_upload_form\';

            flUtil.loadScript([
                rlConfig[\'tpl_base\'] + \'components/popup/_popup.js\',
            ], function(){
                $(\'#controller_area\').popup({
                    click: false,
                    scroll: true,
                    closeOnOutsideClick: false,
                    content: $(el).html(),
                    caption: \''; ?>
<?php echo $this->_tpl_vars['lang']['bwt_doc_file']; ?>
<?php echo '\',
                    navigation: {
                        okButton: {
                            text: lang[\'save\'],
                            onClick: function(popup){
                                var file = popup.$interface.find(\'input[name="bwt_doc_file"]\')[0].files[0];
                                bwtUploadFile(tmpItemID, file);

                                popup.close();
                            }
                        },
                        cancelButton: {
                            text: lang[\'cancel\'],
                            class: \'cancel\'
                        }
                    }
                });
            });
        });

        $(document).on(\'click\', \'.bwt-delete-file\', function() {
            var itemID = $(this).attr(\'data-item\');
            var data = {
                mode: \'bwtDeleteFile\',
                item: itemID,
                lang: rlLang
            };
            flUtil.ajax(data, function(response) {
                if (response.status == \'OK\') {
                    $(\'.transactions\').find(\'div#bwt-file-\' + itemID).find(\'.download\').remove();
                    $(\'.transactions\').find(\'div#bwt-file-\' + itemID).find(\'.bwt-delete-file\').remove();
                    $(\'.bwt-upload-file\').removeClass(\'hide\').addClass(\'d-block\');
                    printMessage(\'notice\', response.message);
                } else {
                    printMessage(\'error\', response.message);
                }
            });
        });
    });

    var bwtUploadFile = function(itemID, file) {
        var formData = new FormData();
        formData.append(\'file\', file);
        $.ajax({
            url: rlConfig[\'ajax_url\'] + \'?mode=bwtUploadFile&item=\' + itemID + \'&lang=\' + rlLang,
            type: "POST",
            data: formData,
            dataType: \'json\',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == \'OK\') {
                    $(\'.transactions\').find(\'div#bwt-file-\' + itemID).find(\'.download\').remove();
                    $(\'.transactions\').find(\'div#bwt-file-\' + itemID).find(\'.bwt-delete-file\').remove();
                    $(\'.transactions\').find(\'div#bwt-file-\' + itemID).append(response.file);
                    $(\'.bwt-upload-file\').removeClass(\'d-block\').addClass(\'hide\');
                    printMessage(\'notice\', response.message);
                } else {
                    printMessage(\'error\', response.message);
                }
            }
        });
    }
'; ?>

</script>