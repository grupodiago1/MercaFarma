<div class="blog-post">
	<?php 
	    $video = get_post_meta(get_the_ID(), '_kinetic_intro_video', true);
	?>
	<?php if($video!=''){ ?>
		<div class="post-gallery">
			<!-- Vimeo -->
			<?php echo wp_oembed_get(get_post_meta(get_the_ID(), '_kinetic_intro_video', true)); ?>
			<!-- End Vimeo -->
		</div>
	<?php } ?>
	<h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<ul class="post-meta">
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_time(get_option( 'date_format' )); ?></a>
		</li>
		<?php if(has_category()){ ?>
			<li><?php the_category(', '); ?></li>
		<?php } ?>
		<li>
			<?php
             comments_popup_link( esc_html__('0 Comments','kinetic'), esc_html__('1 Comment','kinetic'), esc_html__('% Comments','kinetic'), '',  esc_html__('Comment off','kinetic'));
            ?>
		</li>
	</ul>
	<?php the_excerpt(); ?>
	
</div>