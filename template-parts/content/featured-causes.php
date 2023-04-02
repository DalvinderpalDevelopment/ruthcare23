<?php if(function_exists('get_field')) {
    $image_size = 'custom-thumbnail';
    $featured_cause_1_image = !empty(get_field('featured_cause_1_image')) ? wp_get_attachment_image(get_field('featured_cause_1_image'), $image_size, false, array("class" => "img-fluid w-100")) : '';
    $featured_cause_1_heading = !empty(get_field('featured_cause_1_heading')) ? get_field('featured_cause_1_heading') : '';
    $featured_cause_1_text = !empty(get_field('featured_cause_1_text')) ? get_field('featured_cause_1_text') : '';
    $featured_cause_2_image = !empty(get_field('featured_cause_2_image')) ? wp_get_attachment_image(get_field('featured_cause_2_image'), $image_size, false, array("class" => "img-fluid w-100")) : '';
    $featured_cause_2_heading = !empty(get_field('featured_cause_2_heading')) ? get_field('featured_cause_2_heading') : '';
    $featured_cause_2_text = !empty(get_field('featured_cause_2_text')) ? get_field('featured_cause_2_text') : '';
    $featured_cause_3_image = !empty(get_field('featured_cause_3_image')) ? wp_get_attachment_image(get_field('featured_cause_3_image'), $image_size, false, array("class" => "img-fluid w-100")) : '';
    $featured_cause_3_heading = !empty(get_field('featured_cause_3_heading')) ? get_field('featured_cause_3_heading') : '';
    $featured_cause_3_text = !empty(get_field('featured_cause_3_text')) ? get_field('featured_cause_3_text') : '';
} ?>
<section class="featured-causes">
    <div class="container pt-4 pb-3">
        <div class="row p-3">
            <div class="col col-12 text-center">
                <h2 class="fw-semibold text-dark">Featured Causes</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-12 col-md-6 col-lg-4 pb-3 px-4">
                <div class="cause h-100 shadow rounded">
                    <div class="cause-image">
                        <?php echo $featured_cause_1_image; ?>
                    </div>
                        <div class="cause-heading px-3 pt-4 pb-1">
                        <h3 class="fw-semibold"><?php echo $featured_cause_1_heading; ?></h3>
                    </div>
                    <div class="cause-text px-3 pb-4 pt-1">
                        <p class="p-0"><?php echo $featured_cause_1_text; ?></p>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-6 col-lg-4 pb-3 px-4">
                <div class="cause h-100 shadow rounded">
                    <div class="cause-image">
                        <?php echo $featured_cause_2_image; ?>
                    </div>
                    <div class="cause-heading px-3 pt-4 pb-1">
                        <h3 class="fw-semibold"><?php echo $featured_cause_2_heading; ?></h3>
                    </div>
                    <div class="cause-text px-3 pb-4 pt-1">
                        <p class="p-0"><?php echo $featured_cause_2_text; ?></p>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-6 col-lg-4 pb-3 px-4">
                <div class="cause h-100 shadow rounded">
                    <div class="cause-image">
                        <?php echo $featured_cause_3_image; ?>
                    </div>
                    <div class="cause-heading px-3 pt-4 pb-1">
                        <h3 class="fw-semibold"><?php echo $featured_cause_3_heading; ?></h3>
                    </div>
                    <div class="cause-text px-3 pb-4 pt-1">
                        <p class="p-0"><?php echo $featured_cause_3_text; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>