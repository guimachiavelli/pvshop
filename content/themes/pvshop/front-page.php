<?php get_header(); ?>
	<?php
$test = get_site_option('featured_collection');
var_dump($test);
	?>
123
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="page">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
<?php get_footer(); ?>
