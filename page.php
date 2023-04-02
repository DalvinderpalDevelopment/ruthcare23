<?php get_header(); ?>
<?php get_template_part('template-parts/content/breadcrumbs'); ?>
<?php if(is_page('about')) { get_template_part('template-parts/content/about-content'); } ?>
<?php if(is_page('volunteering') || is_page('about')) { get_template_part('template-parts/content/volunteer-sign-up'); } ?>
<?php if (is_page('contact')) {
    get_template_part('template-parts/content/map');
    get_template_part('template-parts/content/get-in-touch');
    get_template_part('template-parts/content/contact-form'); } ?>
<?php get_template_part('template-parts/content/milestones'); ?>
<?php get_template_part('template-parts/content/featured-articles'); ?>
<?php get_footer(); ?>