<div class="meta">
	<time class="published" datetime="<?php echo get_the_time('c'); ?>"> <?php echo __('<span>Posted on :</span>', 'roots'); ?>	<?php echo get_the_date(); ?></time>
	<div class="byline author vcard"><?php echo __('<span>By :</span>', 'roots'); ?>
		<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>#" rel="author" class="fn"><?php echo get_the_author(); ?></a>
	</div>
</div>
