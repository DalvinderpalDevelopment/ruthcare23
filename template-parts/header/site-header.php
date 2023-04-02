<?php
    $position = is_404() ? '' : 'position-fixed';
?>
<header class="<?php echo $position; ?> w-100">
    <div class="container">
        <div class="row py-4 px-3 px-md-0">
            <div class="col col-7 col-md-3 d-flex justify-content-start align-items-center">
                <a href="<?php echo home_url(); ?>" aria-label="Click logo to navigate user to homepage"><img class="w-75 px-0 px-lg-3" src="<?php echo get_template_directory_uri() ?>/src/imgs/ruthcare-logo.png" alt="Ruth Care Foundation Logo"/></a>
            </div>
            <div class="col col-5 col-md-9 d-flex justify-content-end align-items-center">
                <nav class="d-flex align-items-center">
                    <?php wp_nav_menu(array('name' => 'main-menu', 'theme_location' => 'main_menu', 'orderby' => 'menu_order')); ?>
                    <button class="donate custom-shadow" aria-label="Donate button to enable popup donate form">Donate</button>
                    <div class="hamburger">
                        <div class="hamburger-icon">
                            <button class="border-0" aria-label="Hamburger icon for mobile nav">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </nav>               
            </div>           
        </div>
    </div>
</header> 
<div class="mobile-menu position-fixed top-0 bottom-0 start-0 end-0 h-100">
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex justify-content-end">
            <div class="mobile-content col col-12 col-md-3 px-0 py-4">
                <div class="cross d-flex justify-content-end">
                    <div class="cross-icon p-4">
                        <button class="border-0" aria-label="Cross icon for mobile nav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
                <?php wp_nav_menu(array('name' => 'main-menu', 'theme_location' => 'main_menu', 'orderby' => 'menu_order')); ?>
            </div>
        </div>
    </div>
</div>
<div class="donation-section position-fixed top-0 start-0 end-0">
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="donation-widget bg-white rounded overflow-auto p-5">
                    <div class="cross d-flex justify-content-end">
                        <div class="cross-icon p-4">
                            <button class="border-0" aria-label="Cross icon for popout donation form">
                                <span></span>
                                <span></span> 
                            </button>
                        </div>
                    </div>
                    <?php echo do_shortcode('[give_form id="185"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>