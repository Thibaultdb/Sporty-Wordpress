<?php
/**
 * homepage
 */
?>


    <?php get_header(); ?>
    <body>
<main>
    <div class="banner_image"></div>
    <div class="bg_h1">

        <div class="container">
            <h1>INFO</h1>
        </div>
    </div>
    <div class="info_adjust">
        <div class="container">
            <div class="row pt-5">
                <div class="col-sm-6 p-4">
                    <p class="homepage_grid_text">Welkom bij Sporty! Wij zijn een vereniging die allerlei
                        verschillende
                        sportkampen organiseren voor
                        jongeren en kinderen. Of je nu beginner of expert, sportief of niet sportief bent, het
                        maakt
                        allemaal niet uit. De enige vereiste is een liefde voor sport!!</p>
                </div>
                <div class="col-sm-6 p-3">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/media/sports-bannersmall_top.png" alt="small_banner_sport" class="homepage_circels w-100">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 p-3">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/media/sports-bannersmall_bottom.png" alt="small_banner_sporty" class="homepage_circels w-100">
                </div>
                <div class="col-sm-6 p-4">
                    <p class="homepage_grid_text">Wij bieden jou een fantastische ervaring vol met plezante
                        activiteiten en uitdagingen, waar je je
                        samen met vele anderen naar hartelust kan uitleven! Onze kampen worden ondertussen grondig
                        gepland
                        en gemonitord door een team van professionele begeleiders om alles vlot en veilig te laten
                        verlopen.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- button -->
    <div class="replace_button d-flex justify-content-center">
        <button type="button" class="btn btn-primary pl-4 pr-4">INSCHRIJVEN</button>
    </div>

    <div class="container text-center">
    
    <?php
        // WP_Query arguments
        $args = array(
            'post_type'              => array( 'kampen' ),
            'nopaging'               => false,
            'order'                  => 'ASC',
            'orderby'                => 'date',
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
            print('<div class="row">');
            
            while ( $query->have_posts() ) {
                $query->the_post();
                $url = wp_get_shortlink();
                $title= get_the_title();
                
                print('<div class="col-sm-4 p-4 grid">');
                print("<a href='$url'>");
                 // do something
                print('<div class="image-homepage">');
                the_post_thumbnail('thumbnail',['class'=> 
                                        'float-left thumbnail']);
                ?><div class="middle"><?php the_title();?></div><?php
                print("</div></a>");
                
               
                
                //get_the_post_thumbnail();
                print('</div>');
            }
            print('</div>');
        } else {
            // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();

        ?>
        </div>
    <br />
    <?php get_footer(); ?>
</main>