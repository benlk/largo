<?php
/**
 * The template for displaying custom taxonomy archives
 */

get_header(); ?>

		<div id="content" class="stories span8" role="main">

		<?php if ( have_posts() ) { ?>
			<header class="category-background clearfix">

				<h1 class="page-title"><?php single_term_title(); ?></h1>

				<?php
					$term_description = term_description();
					if ( $term_description )
						echo '<div class="taxonomy-description">' . $term_description . '</div>';
				?>
			</header> <!-- /.category-background -->

			<h3 class="recent-posts clearfix"><?php _e('Recent posts', 'largo'); ?><a class="rss-link" href="<?php echo esc_url( get_term_feed_link( get_queried_object() ) ); ?>"><i class="social-icons rss24"></i></a></h3>

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'taxonomy' );
				endwhile;
				largo_content_nav( 'nav-below' );

			} else {
				get_template_part( 'content', 'not-found' );
			}
			?>

		</div>
		<!-- /.grid_8 #content -->
<aside id="sidebar" class="span4">
<?php get_sidebar('topic'); ?>
</aside>
<!-- /.grid_4 -->
<?php get_footer(); ?>
