<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pinar & Viola Boutique</title>
		<link rel="shortcut icon" href="<?php echo SITE_URL; ?>/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="http://fonts.typotheque.com/WF-023227-007472.css" type="text/css" />
		<?php wp_head(); ?>
		<meta name="description" content="">
	</head>

	<body>

		<header class="intro">
			<h1 class="intro-logo">
				<a href="<?php echo SITE_URL; ?>">
					<img src="<?php echo TEMPLATE_URL; ?>/imgs/pv-boutique-logo.jpg" alt="Pinar & Viola Boutique">
				</a>
			</h1>

			<?php if (is_front_page() || is_product() || is_product_taxonomy()) { ?>
				<nav class="collection-nav">
					<h2 class="collection-title btn btn--collection">
						<?php
							$current_collection = wp_get_post_terms($post->ID, 'product_cat');
							$current_collection = $current_collection[0];
						?>
						<a href="<?php echo SITE_URL; ?>/collection/<?php echo $current_collection->slug ?>">
							<?php echo $current_collection->name; ?>
						</a>
					</h2>
					<button class="btn btn--collection btn--collection-right">
						<span class="select-replacement">See other collections</span>
						<select class="replaced-select" id="collection-nav">
							<option>See other collections</option>
							<?php
								$terms = get_terms('product_cat');
								foreach ($terms as $term) {
									echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
								}
							?>
						</select>
					</button>
				</nav>
			<?php } ?>
		</header>

		<main class="main">
