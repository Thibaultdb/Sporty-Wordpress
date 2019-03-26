<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content zalen m-0">
        <?php
        if ( is_single() ) :
            
            $value_begeleider1_id = get_post_meta(get_the_ID(), '_kampen_begeleider1', true);
            $value_begeleider2_id = get_post_meta(get_the_ID(), '_kampen_begeleider2', true);
            $value_kok1_id = get_post_meta(get_the_ID(), '_kampen_kok', true);
                if ($value_begeleider1_id){
                    $begeleider1 = get_post($value_begeleider1_id);
                    $naam_begeleider1 = $begeleider1->post_title;
                    $inhoud1 = $begeleider1->post_content;
                    $thumbnail_tag_begeleider1 = get_the_post_thumbnail($begeleider1->ID, 'thumbnail');
                }
                if ($value_begeleider2_id){
                    $begeleider2 = get_post($value_begeleider2_id);
                    $naam_begeleider2 = $begeleider2->post_title;
                    $inhoud2 = $begeleider2->post_content;
                    $thumbnail_tag_begeleider2 = get_the_post_thumbnail($begeleider2->ID, 'thumbnail');
                }
                if ($value_kok1_id){
                    $kok1 = get_post($value_kok1_id);
                    $naam_kok1 = $kok1->post_title;
                    $inhoud3 = $kok1->post_content;
                    $thumbnail_tag_kok1 = get_the_post_thumbnail($kok1->ID, 'thumbnail');
                }
			?>

        <!--Navigatie-->
        <!--main van de deetailpagina-->
        <div class="maindetail">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 slider " src="
					<?php echo get_stylesheet_directory_uri();?>
					/media/slider/slider5.jpg"
                            alt="First slide">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 slider" src="
					<?php echo get_stylesheet_directory_uri();?>
					/media/slider/slider2.jpg"
                            alt="Second slide">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 slider" src="
					<?php echo get_stylesheet_directory_uri();?>
					/media/slider/slider4.jpg"
                            alt="Third slide">

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="texthead">
                <div class="container textheader">
                    <p>
                        <?php the_title() ?>
                    </p>
                </div>
            </div>
            <section class="container">
                <div class="uitlegkamp">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="headerKamp">
                                Waarom voor een
                                <?php the_title(); ?> kiezen?
                            </h4>
                            <?php the_content(); ?>
                        </div>
                        <div class="col-sm-4">
                            <div class="post-thumbnail w-100 p-3">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php
//print_r($begeleider1);
//print_r($begeleider2);
//print_r($kok1);
                
        if(!empty($begeleider1)){ ?>
                <div class="row trainer">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 big-image justify-content-center d-flex">
                        <?php print($thumbnail_tag_begeleider1) ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-center">
                        <h3><?php print($naam_begeleider1); ?></h3>
                        <p class="TextB">
                            <?php print($inhoud1); ?>
                        </p>
                    </div>
                </div>
           <?php }
           if(!empty($begeleider2)){ ?>
                <div class="row kok">
                    <div class="gegevensBgl col-xs-12 col-sm-12 col-md-12 col-lg-6 text-center">
                    <h3><?php print($naam_begeleider2); ?></h3>
                        <p class="TextB">
                            <?php print($inhoud2); ?>
                        </p>
                    </div>
                    <div class="fotoBgl col-xs-12 col-sm-12 col-md-12 col-lg-6 big-image">
                    <?php print($thumbnail_tag_begeleider2) ?>
                    </div>
                </div>
                <?php }
           if(!empty($kok1)) { ?>
                <div class="row verantwoordelijke">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 big-image">
                        <?php print($thumbnail_tag_kok1) ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-center">
                    <h3><?php print($naam_kok1); ?></h3>
                        <p class="TextB">
                            <?php print($inhoud3); ?>
                        </p>
                    </div>
                    </div>
                </div>
                <?php } ?>
            </section>
           </div>

    </div>
</article>


<!--JS voor de slider!!-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

<?php
			else :
			
				the_content( __( 'Verder lezen <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
        endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Paginas:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>