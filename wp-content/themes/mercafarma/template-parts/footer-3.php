<footer class="footer-defaut">
    <div class="container">
		<?php if(is_active_sidebar('footer-3')){ ?>
			<?php dynamic_sidebar('footer-3'); ?>
		<?php } ?>
	</div>
    <p class="copyright">
       <?php echo do_shortcode(get_theme_mod( 'copyright','2019 kinetic. &copy; All Rights Reserved Nunforest')); ?>
    </p>
</footer>