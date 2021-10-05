<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header(); ?>
<div id="content" class="narrowcolumn">

    <!-- This sets the $curauth variable -->

    <?php
    // filter
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <div class="s-sec" style="background: #eee;">
        <div class="s-container">

            <h2 class="s-title">Posts by <?php echo $curauth->nickname;?></h2>
            <div class="s-grid -d4">
                <?php 
                $args = array(
                    'posts_per_page' => 3,
                    'orderby' => 'rand',
                    'meta_query' => array(
                        'relation'=> 'OR',
                        array(
                            'key'     => 'authors_$_author',
                            'value'   => $curauth->ID,
                            'compare' => 'LIKE',
                        ),
                    )
                );
                $the_query = new WP_Query( $args );
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    get_template_part( 'template-parts/content', 'card' );
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>