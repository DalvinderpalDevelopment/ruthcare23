<?php if(function_exists('get_field')) {
    $image_size = 'custom-large';
    $home_about_image = !empty(get_field('about_image')) ? wp_get_attachment_image(get_field('about_image'), $image_size, false, array("class" => "img-fluid w-100 h-100 object-fit-cover"))  : '';
    $home_about_text = !empty(get_field('about_text')) ? get_field('about_text') : '';
} ?>
<section class="home-about px-4 p-md-0">
    <div class="container pt-4 pb-5">
        <div class="row py-3">
          <div class="about-image col col-12 col-md-6 px-0">
            <?php echo $home_about_image; ?>
          </div>
          <div class="about-content col col-12 col-md-6 d-flex align-items-center px-0">
            <div class="w-100">
                <div class="about-heading text-white px-4 pt-5 pb-1">
                    <h2 class="fw-semibold">About Us</h2>
                </div>
                <div class="about-text text-white px-4 py-1 ">
                    <p><?php echo $home_about_text; ?></p>
                </div>
                <div class="about-buttons d-block d-lg-flex justify-content-start px-1 pt-3 pb-5">
                    <div class="d-flex justify-content-start justify-content-lg-end pb-3 pb-lg-0">
                        <a class="button px-4 custom-shadow py-3 rounded text-white text-decoration-none mx-3" href="/about" aria-label="Access the about page to get more info about the charity">Learn More</a>
                    </div>
                    <div class="d-flex justify-content-start justify-content-lg-start">
                        <button class="button donate custom-shadow px-4 py-3 border-0 rounded text-white mx-3" aria-label="Donate button to enable popup donate form">Donate Now</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</section>