<?php /* Smarty version 2.6.31, created on 2025-07-22 10:02:19
         compiled from blocks/photo_manager.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'blocks/photo_manager.tpl', 14, false),array('modifier', 'regex_replace', 'blocks/photo_manager.tpl', 62, false),array('function', 'math', 'blocks/photo_manager.tpl', 22, false),)), $this); ?>
<!-- photos manager -->

<div class="dark"><?php echo $this->_tpl_vars['lang']['max_file_size_caption']; ?>
 <b><?php echo $this->_tpl_vars['max_file_size']; ?>
 MB</b></div>

<?php $this->assign('width', $this->_tpl_vars['config']['pg_upload_thumbnail_width']+4); ?>
<?php $this->assign('height', $this->_tpl_vars['config']['pg_upload_thumbnail_height']-50+4); ?>

<div id="fileupload">
    <form action="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/admin.php" method="post" enctype="multipart/form-data">
        <span class="files canvas"></span>
        <span title="<?php echo $this->_tpl_vars['lang']['add_photo']; ?>
" class="draft fileinput-button">
            <?php echo $this->_tpl_vars['lang']['add_photo']; ?>

            <?php $this->assign('replace', ('{')."count".('}')); ?>
            <?php if ($this->_tpl_vars['allowed_photos']): ?><span class="allowed"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['allowed_count'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['allowed_photos']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['allowed_photos'])); ?>
</span><?php endif; ?>
            <input type="file" name="files[]" multiple />
        </span>

        <div><input type="button" class="start" value="<?php echo $this->_tpl_vars['lang']['upload']; ?>
" /></div>
    </form>
</div>

<?php echo smarty_function_math(array('equation' => 'round(180 * height / width)','width' => $this->_tpl_vars['config']['pg_upload_thumbnail_width'],'height' => $this->_tpl_vars['config']['pg_upload_thumbnail_height'],'assign' => 'thumbnail_height'), $this);?>


<?php echo '
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <span class="template-upload fade item active">
        <span class="preview"><span class="fade"></span></span><span class="start"></span>
        <img src="'; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif" class="cancel" alt="'; ?>
<?php echo $this->_tpl_vars['lang']['delete']; ?>
<?php echo '" title="'; ?>
<?php echo $this->_tpl_vars['lang']['delete']; ?>
<?php echo '" />
        <span class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></span>
        <div class="photo_navbar"></div>
    </span>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <span class="template-download fade item active">
        <div class="photo-preview">
            <img class="thumbnail" src="{%=file.thumbnail_url%}" style="height: '; ?>
<?php echo $this->_tpl_vars['thumbnail_height']; ?>
<?php echo 'px;" />
            <img data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}" src="'; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif" class="delete" alt="'; ?>
<?php echo $this->_tpl_vars['lang']['delete']; ?>
<?php echo '" title="'; ?>
<?php echo $this->_tpl_vars['lang']['delete']; ?>
<?php echo '" />
        </div>

        <div class="photo_navbar" id="navbar_{%=file.id%}">
            <img title="'; ?>
<?php echo $this->_tpl_vars['lang']['rotate_picture']; ?>
<?php echo '" src="'; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif" class="rotate" alt="" />
            {% if ( file.is_crop ) { %}<img id="crop_photo_{%=file.id%}" title="'; ?>
<?php echo $this->_tpl_vars['lang']['crop_photo']; ?>
<?php echo '" src="'; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif" class="crop" alt="" />{% } %}
            <img title="'; ?>
<?php echo $this->_tpl_vars['lang']['manage_description']; ?>
<?php echo '" src="'; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif" class="edit" alt="" />
            <span class="current-description hide">{%=file.description%}</span>
        </div>
    </span>
{% } %}
</script>
'; ?>


<script type="text/javascript">
var photo_allowed = <?php if ($this->_tpl_vars['plan_info']['Image_unlim']): ?>undefined<?php else: ?><?php if ($this->_tpl_vars['plan_info']['Image']): ?><?php echo $this->_tpl_vars['plan_info']['Image']; ?>
<?php else: ?>0<?php endif; ?><?php endif; ?>;
var photo_client_max_size = 10*1024*1024;
var photo_max_size = <?php if ($this->_tpl_vars['max_file_size']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['max_file_size'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/[\D]/', '') : smarty_modifier_regex_replace($_tmp, '/[\D]/', '')); ?>
<?php else: ?>2<?php endif; ?>*1024*1024;
var photo_width = <?php if ($this->_tpl_vars['config']['pg_upload_thumbnail_width']): ?><?php echo $this->_tpl_vars['config']['pg_upload_thumbnail_width']; ?>
<?php else: ?>120<?php endif; ?>;
var photo_height = <?php if ($this->_tpl_vars['config']['pg_upload_thumbnail_height']): ?><?php echo $this->_tpl_vars['config']['pg_upload_thumbnail_height']; ?>
<?php else: ?>90<?php endif; ?>;
var photo_orig_width = <?php if ($this->_tpl_vars['config']['pg_upload_large_width']): ?><?php echo $this->_tpl_vars['config']['pg_upload_large_width']; ?>
<?php else: ?>800<?php endif; ?>;
var photo_orig_height = <?php if ($this->_tpl_vars['config']['pg_upload_large_height']): ?><?php echo $this->_tpl_vars['config']['pg_upload_large_height']; ?>
<?php else: ?>600<?php endif; ?>;
var photo_auto_upload = <?php if ($this->_tpl_vars['config']['img_auto_upload']): ?>true<?php else: ?>false<?php endif; ?>;
var photo_listing_id = <?php if ($this->_tpl_vars['listing']['ID']): ?><?php echo $this->_tpl_vars['listing']['ID']; ?>
<?php else: ?>false<?php endif; ?>;
var photo_user_crop = <?php if ($this->_tpl_vars['config']['img_crop_interface']): ?>true<?php else: ?>false<?php endif; ?>;
var sort_save = false;
lang['error_maxFileSize'] = "<?php echo $this->_tpl_vars['lang']['error_maxFileSize']; ?>
";
lang['error_acceptFileTypes'] = "<?php echo $this->_tpl_vars['lang']['error_acceptFileTypes']; ?>
";
lang['uploading_completed'] = "<?php echo $this->_tpl_vars['lang']['uploading_completed']; ?>
";
lang['upload'] = "<?php echo $this->_tpl_vars['lang']['upload']; ?>
";
lang['picture_preparing'] = "<?php echo $this->_tpl_vars['lang']['picture_preparing']; ?>
";
lang['upload_file'] = "<?php if ($this->_tpl_vars['lang']['upload_file']): ?><?php echo $this->_tpl_vars['lang']['upload_file']; ?>
<?php else: ?>File:<?php endif; ?>";
lang['upload_no_preview_available'] = "<?php if ($this->_tpl_vars['lang']['upload_no_preview_available']): ?><?php echo $this->_tpl_vars['lang']['upload_no_preview_available']; ?>
<?php else: ?>No preview available<br /> in IE browsers<?php endif; ?>";
lang['manage_description'] = "<?php echo $this->_tpl_vars['lang']['manage_description']; ?>
";
var ph_empty_error = "<?php echo $this->_tpl_vars['lang']['crop_empty_coords']; ?>
";
var ph_too_small_error = "<?php echo $this->_tpl_vars['lang']['crop_too_small']; ?>
";
</script>

<script>
<?php echo '

$(function(){
    $(\'#fileupload\').on(\'click\', \'.photo_navbar .rotate\', function(){
        var $icon = $(this);
        var $container = $(this).closest(\'.item\');
        var media_id = $(this).closest(\'.photo_navbar\').attr(\'id\').split(\'_\')[1];

        $icon.hide();

        var data = {
            listing_id: photo_listing_id,
            media_id: media_id
        };

        flynax.sendAjaxRequest(\'pictureRotate\', data, function(response){
            $icon.show();

            if (response.status == \'OK\') {
                $container.find(\'img.thumbnail\')
                    .attr(\'src\', response.results.Thumbnail);
            } else {
                printMessage(\'error\', lang[\'system_error\']);
            }
        });
    });
});

'; ?>

</script>

<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/jquery.ui.widget.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/tmpl.min.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/load-image.min.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/canvas-to-blob.min.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/bootstrap.min.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/jquery.iframe-transport.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/jquery.fileupload.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/jquery.fileupload-fp.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/jquery.fileupload-ui.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/main.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
upload/exif.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<!-- photos manager end -->