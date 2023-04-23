<?php
$args = array('post_type'   => 'volunteer', 'numberposts' => -1);
$volunteers = get_posts($args);
?>
<section class="our-volunteers">
    <div class="container pt-4 pb-5">
        <div class="row py-3">
            <div class="col col-12 col-md-6 bg-dark text-center text-white d-flex align-items-center px-0">
                <div class="p-5">
                    <div class="volunteers-heading pb-2">
                        <h2 class="fw-semibold">Our Volunteers</h2>
                    </div>
                    <div class="volunteers-text pt-2">
                        <p>Meet our amazing volunteers working and contributing to the amazing cause that the charity provides.</p>
                    </div>
                </div>
            </div>
            <div class="volunteers-content col col-12 col-md-6 px-0">
                <div class="volunteers-carousel owl-carousel d-flex justify-content-center p-5">
                <?php foreach($volunteers as $volunteer):
                    $title = !empty($volunteer->post_title) ? '<p class="mb-0">Name: ' . $volunteer->post_title . '</p>' : '';
                    $role  = !empty(get_field('role', $volunteer->ID)) ? '<p>Role: ' . get_field('role', $volunteer->ID) . '</p>': '';
                    $facebook_link  = !empty(get_field('facebook_link', $volunteer->ID)) ? '<a href="' . get_field('facebook_link', $volunteer->ID) . '" target="_blank"><i class="fab fa-facebook" aria-label="Facebook page of volunteer"></i></a>' : '';
                    $twitter_link  = !empty(get_field('twitter_link', $volunteer->ID)) ? '<a href="' . get_field('twitter_link', $volunteer->ID) . '" target="_blank"><i class="fab fa-twitter" aria-label="Twitter page of volunteer"></i></a>' : '';
                    $linkedin_link  = !empty(get_field('linkedin_link', $volunteer->ID)) ? '<a href="' . get_field('linkedin_link', $volunteer->ID) . '" target="_blank"><i class="fab fa-linkedin" aria-label="Linkedin page of volunteer"></i></a>' : '';
                    $image = !empty(get_the_post_thumbnail( $volunteer->ID, 'thumbnail' )) ? get_the_post_thumbnail( $volunteer->ID, 'thumbnail' ) : '<img class="default" src="' . get_template_directory_uri() . '/src/imgs/user.png"/>';

                    echo '<div class="volunteer-content w-75">
                        <div class="volunteer-image">
                            ' . $image . '
                        </div>
                        <div class="p-4">
                            <div class="volunteer-heading text-center">
                                <h3 class="fw-semibold pb-2">Volunteer</h3>
                            </div>
                            <div class="volunteer-info text-center">
                                ' . $title . $role . '
                                <div class="volunteer-social d-flex justify-content-center">
                                    ' . $facebook_link . $twitter_link . $linkedin_link . '
                                </div>
                            </div>
                        </div>
                    </div>';
                endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>