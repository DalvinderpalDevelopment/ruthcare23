<section class="article-single px-4 p-md-0">
    <?php if (have_posts()): ?>
    <div class="container pb-4 pt-5">
        <div class="row p-3">
            <div class="col col-12 text-center">
                <h2 class="fw-semibold text-dark"><?php the_title(); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="article-text col col-12 col-md-8 col-lg-9 px-0">
                <?php the_content(); ?>
            </div>
            <div class="col col-12 col-md-4 col-lg-3 px-0">
                <div class="share bg-dark d-flex justify-content-center align-items-center rounded">
                    <div class="text-center">
                        <h3 class="fw-semibold text-white pb-2">Share</h3>
                        <a  class="px-2" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" aria-label="Share post via Facebook"><i class="fab fa-facebook"></i></a>
                        <a class="px-2" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank" aria-label="Share posts via Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="donate d-flex justify-content-center align-items-center mt-4 rounded">
                    <div class="text-center">
                        <h3 class="fw-semibold text-white pb-2">Please Donate</h3>
                        <button aria-label="Donate button to enable popup donate form">Donate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
