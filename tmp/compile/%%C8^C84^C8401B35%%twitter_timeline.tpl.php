<?php /* Smarty version 2.6.31, created on 2025-09-17 21:44:53
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins//bookmarks/twitter_timeline.tpl */ ?>
<!-- twitter box -->

<?php if ($this->_tpl_vars['config']['bookmarks_twitter_box_username']): ?>

<?php echo '<a class="twitter-timeline" data-height="'; ?><?php echo $this->_tpl_vars['config']['bookmarks_twitter_box_height']; ?><?php echo '" href="https://twitter.com/'; ?><?php echo $this->_tpl_vars['config']['bookmarks_twitter_box_username']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['lang']['bookmarks_twitter_tweets_by']; ?><?php echo ' @'; ?><?php echo $this->_tpl_vars['config']['bookmarks_twitter_box_username']; ?><?php echo '</a>'; ?>


<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<?php else: ?>
    <?php echo $this->_tpl_vars['lang']['bookmarks_twitter_box_deny']; ?>

<?php endif; ?>

<!-- twitter box end -->