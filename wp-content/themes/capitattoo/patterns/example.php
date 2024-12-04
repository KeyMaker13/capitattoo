<?php
/**
 * Title: Example Pattern
 * Slug: capitattoo/example-pattern
 * Categories: formatting
 */

if ( function_exists( 'register_block_pattern' ) ) {
    register_block_pattern(
        'capitattoo/example-pattern',  // The slug for the block pattern
        array(
            'title'       => __( 'Example Pattern', 'capitattoo' ),
            'description' => _x( 'A custom block pattern for the theme.', 'Block pattern description', 'capitattoo' ),
            'content'     => '<!-- Your block pattern content goes here -->',
        )
    );
}

return [
    'title' => __('Example Pattern', 'capitattoo'),
    'content' => '<!-- wp:paragraph --><p>' . __('Your content goes here.', 'capitattoo') . '</p><!-- /wp:paragraph -->',
];


?>
