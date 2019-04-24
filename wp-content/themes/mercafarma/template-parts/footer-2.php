<footer class="pattern-style" id="download-area">
    <div class="container">
		<?php if(is_active_sidebar('footer-2')){ ?>
			<?php dynamic_sidebar('footer-2'); ?>
		<?php } ?>
	</div>
    <p class="copyright">
       <?php echo do_shortcode(get_theme_mod( 'copyright','2019 kinetic. &copy; All Rights Reserved Nunforest')); ?>
    </p>
</footer>