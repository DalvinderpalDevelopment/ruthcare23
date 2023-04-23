<?php $breadcrumbs_image = !empty(get_field('breadcrumbs_image')) ? wp_get_attachment_image(get_field('breadcrumbs_image'), 'custom-full') : ''; ?>

<section class="breadcrumbs">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-12 position-relative px-0">
                <?php if (is_archive() || is_single()):
                    echo '<img src="' . get_template_directory_uri() . '/src/imgs/blog-hero.jpg" alt="Blog Hero Image"/>';
                elseif ($breadcrumbs_image):
                    echo $breadcrumbs_image;
                endif; ?>
                <div class="content position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center">
                    <div>
                        <div class="content-title">
                            <?php if (is_archive() || is_single()):
                                echo '<h1 class="fw-semibold text-white">Blog</h1>'; else:
                                echo '<h1 class="fw-semibold text-white">' . get_the_title() . '</h1>'; endif; ?>
                        </div>
                        <div class="content-links d-flex justify-content-center align-items-center text-uppercase w-75 m-auto pt-3">
                            <a class="px-2" href="<?php echo get_home_url(); ?>" aria-label="Access the hompeage of the site">Home</a>
                            <i class="fa fa-chevron-right"></i>
                            <span class="px-2"><?php if (is_archive()):
                                echo 'Blog'; else:
                                echo the_title(); endif; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>