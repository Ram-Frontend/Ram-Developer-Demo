<?php

if( have_rows('add_component') ) {
    while ( have_rows('add_component') ) { the_row();
        $layout = get_row_layout();
        switch ($layout) {
            case "fetured-post":
                get_template_part('template-parts/components/featured-post');
            break;
            case "welcome":
                get_template_part('template-parts/components/welcome');
            break;
            case "testmonial":
                get_template_part('template-parts/components/testmonial');
            break;
            case "efforts":
                get_template_part('template-parts/components/efforts');
            break;
            case "services":
                get_template_part('template-parts/components/services');
            break;
            case "blog":
                get_template_part('template-parts/components/blog');
            break;
            case "contact-us":
                get_template_part('template-parts/components/contact');
            break;
        }
    }
}

?>
