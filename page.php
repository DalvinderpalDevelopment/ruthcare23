<?php get_header(); ?>
<?php get_template_part('template-parts/content/breadcrumbs'); ?>
<?php if (is_page('about')):
    get_template_part('template-parts/content/about-content'); endif; ?>
<?php if (is_page('volunteering') || is_page('about')):
    get_template_part('template-parts/content/volunteer-sign-up'); endif; ?>
<?php if (is_page('contact')):
    get_template_part('template-parts/content/map');
    get_template_part('template-parts/content/get-in-touch');
    get_template_part('template-parts/content/contact-form');
endif; ?>
<?php get_template_part('template-parts/content/milestones'); ?>
<?php get_template_part('template-parts/content/featured-articles'); ?>
<?php get_footer(); ?>