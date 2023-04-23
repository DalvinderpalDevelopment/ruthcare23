<?php
if (is_single()):
    global $post;
    $post_ID = !empty($post->ID) ? array($post->ID) : '';
endif;
$post_ID = isset($post_ID) ? $post_ID : '';
$args = array('post_type' => 'article', 'numberposts' => 6, 'post__not_in' => $post_ID);
$posts = new WP_Query($args);
?>
<section class="featured-articles" >
    <div class="container pt-4 pb-3">
        <div class="row py-3">
            <div class="col col-12 text-center">
                <?php if(is_single()):
                    echo '<h2 class="fw-semibold text-dark">More Articles</h2>';
                else:
                    echo '<h2 class="fw-semibold text-dark">Featured Articles</h2>';
                endif; ?>
            </div>
        </div>
        <div class="row">
            <?php if($posts->have_posts()): 
                $post_count = $posts->post_count;
                $carousel = $post_count > 3 ? 'owl-carousel px-2 px-md-5' : 'card-group justify-content-center';
                $layout = $post_count > 3 ? 'h-100' : 'col-md-6 col-lg-4';
                echo '<div class="articles-carousel ' . $carousel . '">';
                while($posts->have_posts()): 
                    $posts->the_post(); 
                    $post_count++;
                    $image = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'custom-thumbnail') : '';
                    $term = get_the_terms(get_the_ID(), 'topics');
                    $term_name = '';

                    if(isset($term) && isset($term[0])) {
                        $term_name = '<div class="article-term col-6 d-flex justify-content-end">
                            <span class="d-flex align-items-center">' . $term[0]->name . '</span>
                        </div>';
                    }

                    echo '<div class="col col-12 ' . $layout . ' p-3">
                        <div class="card article shadow h-100">
                            <div class="article-image">
                                ' . $image . '
                            </div>
                            <div class="card-body article-info p-3">
                                <div class="article-meta d-flex">
                                    <div class="article-date col-6">
                                        <span><i class="fa fa-calendar"></i>' . date('d F Y', strtotime(get_the_date())) . '</span> 
                                    </div>
                                    ' . $term_name . '
                                </div>
                                <div class="article-heading pt-3 mb-0">
                                    <h3 class="fw-semibold">' . get_the_title() . '</h3>
                                </div>
                                <div class="article-excerpt"> 
                                    <p>'  . excerpt(20, get_the_ID()) . '</p>  
                                </div>    
                            </div>
                            <div class="card-footer article-link d-flex justify-content-end p-3">
                                <a class="custom-shadow" href="' . get_the_permalink(get_the_ID()) . '" aria-label="Read more information about'. get_the_title() . '">Read More</a>    
                            </div>
                        </div>              
                    </div>';
                endwhile;
                echo '</div>';
             else:
                echo '<div class="col col-12">
                    <div class="alert bg-warning-subtle">
                        <h3 class="mb-0">There are no more articles!</h3>
                    </div>
                </div>';
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <div class="row pt-4 pb-3 px-3">
            <div class="col col-12 text-end">
                <a class="custom-shadow" href="/blog" aria-label="View more articles">View More</a>
            </div>
        </div>
    </div>
</section>