<?php /* Smarty version 2.6.31, created on 2025-07-12 17:21:05
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/massmailer_newsletter/footer_block_mailler.tpl */ ?>
<script class="fl-js-dynamic">
    <?php echo '
        $(document).ready(function(){
            $parent = $(\'.newsletter\');

            /**
             * OLX clone template fix
             * @todo - Remove once the olx_clone template will use newsletterAction() function
             */
            if ($parent.parent().hasClass(\'main-wrapper\')) {
                $parent.find(\'.newsletter_email\').attr(\'id\', \'newsletter_email\');
            }

            $button = $parent.find(\'.subscribe_user\');
            var $email  = $parent.find(\'.newsletter_email\');
            newsletterAction($button, $email, \'\', true);
        });
    '; ?>

</script>