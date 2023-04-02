<?php if(function_exists('get_field')) {
    $banner_image_1 = !empty(get_field('banner_image_1')) ? wp_get_attachment_image(get_field('banner_image_1'), 'custom-full') : '';
    $banner_image_2 = !empty(get_field('banner_image_2')) ? wp_get_attachment_image(get_field('banner_image_2'), 'custom-full') : '';
    $banner_image_3 = !empty(get_field('banner_image_3')) ? wp_get_attachment_image(get_field('banner_image_3'), 'custom-full') : '';
    $banner_heading = !empty(get_field('banner_heading')) ? get_field('banner_heading') : '';
    $banner_text = !empty(get_field('banner_text')) ? get_field('banner_text') : '';
} ?>
<section class="home-banner">
    <div class="banner-carousel owl-carousel">
        <div class="slide-1 item">
            <?php echo $banner_image_1; ?>
        </div>
        <div class="slide-2 item">
            <?php echo $banner_image_2; ?>
        </div>
        <div class="slide-3 item">
            <?php echo $banner_image_3; ?>
        </div>
    </div>
    <div class="home-banner-overlay w-100 position-absolute top-0 d-flex justify-content-center align-items-center">
        <div class="banner-content text-center m-auto">
            <h1 class="fw-semibold text-white pb-3"><?php echo $banner_heading; ?></h1>
            <div class="banner-text pb-3 w-100">
                <p class="text-white"><?php echo $banner_text; ?></p>
            </div>
            <div class="banner-buttons row">
                <div class="col col-12 col-md-6 d-flex justify-content-center justify-content-md-end pb-3 pb-md-0">
                    <button class="button donate px-4 py-3 border-0 rounded text-white mx-3" aria-label="Donate button to enable popup donate form">Donate Now</button>
                </div>
                <div class="col col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                    <a class="button px-4 py-3 rounded text-white text-decoration-none mx-3" href="/about" aria-label="Access the about page to get more info about the charity">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>