<?php
add_action('init', 'mattu_portfolio_register_shortcodes' );

function mattu_portfolio_register_shortcodes() {

	/* Register the [portfolio_items] shortcode. */
	add_shortcode('portfolio_items', 'mattu_portfolio_items_shortcode' );
}

function mattu_portfolio_items_shortcode() {

	/* Query Projects from the database. */
	$loop = new WP_Query(
		array(
			'post_type' => 'portfolio',
			'orderby' => 'date',
			'order' => 'ASC',
			'posts_per_page' => -1, // -1 shows all 
		)
	);

	/* Check if any portfolio items were returned. */
	if ( $loop->have_posts() ) {

		/* Open an unordered list. */
		$output = '<ul class="portfolio-items">';

		/* Loop through the portfolio items (The Loop). */
		while ( $loop->have_posts() ) {

			$loop->the_post();

			/* Display the portfolio item title. */
			$output .= the_title(
				'<li><a href="' . get_permalink() . '">',
				'</a></li>',
				false
			);
		}

		/* Close the unordered list. */
		$output .= '</ul>';
	}

	/* If no portfolio items were found. */
	else {
		$output = '<p>No Projects have been published.';
	}

	/* Return the portfolio items list. */
	return $output;
}

?>