<?php
// Template Name: Dashboard
get_header();

// Check if the user is logged in; if not, redirect to the login page
if ( !is_user_logged_in() ) {
    wp_redirect( home_url( '/login/' ) );
    exit;
}

// Setup pagination variables
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query to get all posts
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5, // Number of posts per page
    'paged' => $paged
);

$query = new WP_Query($args);
?>
<style>
    .posthover:hover{
        background-color:black;
    }
</style>
<div class="container mt-5" style="color:white;background-color: rgba(0, 0, 0, 0.7);">
    <h2 class="text-center">All Posts</h2>
    
    <?php if ($query->have_posts()) : ?>
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-12 mb-4">
                    <div class="card" style="color:white;background-color: rgba(0, 0, 0, 0.7);">
                        <div class="card-body posthover" >
                            <h4 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination Links -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => max(1, $paged),
                'format' => '?paged=%#%',
                'show_all' => false,
                'prev_text' => '« Prev',
                'next_text' => 'Next »',
            ));
            ?>
        </div>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); // Reset the query ?>
</div>

<?php get_footer(); ?>
