<?php 
 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 $articles = new WP_Query(array('post_type' => 'article', 'posts_per_page' => 6, 'paged' => $paged, 'post_status' => 'publish'));
?>
<section class="articles">
    <div class="container pb-4 pt-5">
        <div class="row p-3">
            <div class="col col-12 text-center">
                <h2 class="fw-semibold text-dark">Articles</h2>
            </div>
        </div>
        <div class="row justify-content-center px-1">
        <?php if ($articles->have_posts()):
            while ($articles->have_posts()):
                $articles->the_post();
                $image = !empty(get_the_ID()) ? get_the_post_thumbnail(get_the_ID(), 'custom-thumbnail') : '';
                $title = !empty(get_the_title()) ? '<h4 class="fw-semibold">' . get_the_title() . '</h4>' : '';
                $date = !empty(get_the_date()) ? '<span><i class="fa fa-calendar"></i>' . date('d F Y', strtotime(get_the_date())) . '</span>' : '';
                $category = !empty(get_the_ID()) ? get_categories(array('taxonomy' => 'topics')) : '';
                $excerpt = !empty(get_the_ID()) ? '<p>'  . excerpt(20, get_the_ID()) . '</p>': '';
                $permalink = !empty(get_the_permalink()) ? '<a href="' . get_the_permalink() . '" aria-label="Read more information about '. get_the_title() . '">Read More</a>' : '';

                echo '<div class="col col-12 col-md-6 col-lg-4 p-3">
                    <div class="card article h-100 shadow">
                        <div class="article-image">
                            ' . $image . '
                        </div>
                        <div class="card-body article-info p-3">
                            <div class="article-meta d-flex">
                                <div class="article-date col-6">
                                    ' . $date . ' 
                                </div>
                                <div class="article-category col-6 d-flex justify-content-end">';
                                if($category):
                                    echo '<span>' . $category[0]->name . '</span>';
                                endif;
                                
                                echo '</div>
                            </div>
                            <div class="article-heading pt-3 mb-0">
                                ' . $title . '
                            </div>
                            <div class="article-excerpt"> 
                                ' . $excerpt . '  
                            </div>    
                        </div>
                        <div class="card-footer article-link d-flex justify-content-end p-3">
                            ' . $permalink . '    
                        </div>
                    </div>              
                </div>';
            endwhile;
                the_posts_pagination(array('mid_size' => 2, 'prev_text' => __( 'Previous Page', 'ruthcare23' ), 'next_text' => __( 'Next Page', 'ruthcare23' )));
            else:
                echo '<div class="col col-12">
                    <div class="alert bg-warning-subtle">
                        <h3 class="mb-0">There are no posts!</h3>
                    </div>
                </div>';
            endif; ?>
        </div>
    </div>
</section>