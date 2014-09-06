<div class="cabinet cabinet-top">
	<ul class="product-list cabinet-body">
	<?php
		global $query_string;
		query_posts( $query_string . '&post_type=wpsc-product' );
		while (wpsc_have_products()) :  wpsc_the_product(); ?>
			<li class="product">
				<a href="<?php echo wpsc_the_product_permalink(); ?>">
					<figure class="product-thumbnail">
						<img src="<?php echo wpsc_the_product_image(); ?>" alt="">
					</figure>

					<span class="product-price btn">
						<?php echo wpsc_the_product_price(); ?>
					</span>
				</a>
			</li>
		<?php endwhile; ?>
	</ul>
	<div class="cabinet-bottom"></div>
</div>
