<?php
/**
 * Ultimas Noticias : Muestra las utlimas N entradas
 * Esto es un SNIPPET para incluir dentro de una plantilla de página de WP
 * 

*/
?> 
<div class="wrap_width container_wrap">
	<span id="container" class="container_full">
        <section id="content" class="gray_leather">
            <?php if ( is_front_page() || is_404() || is_search() ){ ?>
                <header class="title-wrap">
                    <h1>
                        <span class="icon-wrap"><i class="icon-fire"></i></span>
                        <em><?php if( qtrans_getLanguage() == 'es' ){ $content = 'NOTICIAS DESTACADAS';
                        }elseif( qtrans_getLanguage() == 'ca' ){ $content = 'NOTÍCIES DESTACADES';
                        }elseif( qtrans_getLanguage() == 'en' ){ $content = 'FEATURES NEWS';
                        } 
                        echo $content?>
                        </em>
                    </h1>
                </header>
                <article class="loop_featured_wrap">
					<?php
                    query_posts(array('post__in'=>get_option('sticky_posts'), 'numberposts' => 2, 'orderby'=>"post_date"));
                    if(have_posts()) :
                    while(have_posts()) : the_post();
                    ?>
                        <section class="loop_results_featured">
                        <a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>">
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail('featured-slider');
                            }
                            else {
                                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                            } ?>
                            <em><?php the_title(); ?></em>
                            <?php the_excerpt(); ?>
                        </a>
                        <?php thematic_postfooter(); ?>
                        </section>
                    <?php
                    endwhile;
                    endif;
                        wp_reset_query();
                    ?>
                    <span class="brkr brkr50 big_screen"></span>
                    <div class="clearboth"></div> 
                </article>
                <article class="loop_expand_wrap">
                    <header class="title-wrap">
                        <h2 class="entry_title post_header">
                            <span class="icon-wrap"><i class="icon-time"></i></span>
                            <?php if( qtrans_getLanguage() == 'es' ){ $content = 'NOTICIAS RECIENTES';
                            }elseif( qtrans_getLanguage() == 'ca' ){ $content = 'NOTÍCIES RECENTS';
                            }elseif( qtrans_getLanguage() == 'en' ){ $content = 'LAST NEWS';
                            } 
                            echo $content?>
                        </h2>
                    </header>
                <?php 
                $args = array( "post__not_in" =>get_option("sticky_posts"), 'numberposts' => 4, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
                $postslist = get_posts( $args ); ?>
					<span class="loop_expand_news_wrap">
                    <?php $i = 1; ?>
                    <?php foreach ($postslist as $post) : setup_postdata($post); ?>
                        <section id="post-<?php the_ID(); ?>" class="loop_results_expand">
                            <a href="<?php the_permalink(); ?>" title=" <?php echo the_title(); ?>">
								<?php
                                    if ( has_post_thumbnail() ) {
                                    echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                                    }
                                    else {
                                        echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                                    }
                                ?>
                                <em><?php echo the_title() ?></em>
                            </a>
                            <?php thematic_postfooter(); ?>     
                      </section>
                      <?php if ( $i ==2 ) : ?>
                                <div class="clearboth small_screen"></div> 
                      <?php endif; ?>
                      <?php $i++; ?> 
                <?php endforeach; ?>
                        <span class="brkr brkr25 big_screen"></span>
                        <span class="brkr brkr50 big_screen"></span>
                        <span class="brkr brkr50 small_screen"></span>
                        <span class="brkr brkr75 big_screen"></span>
                        <div class="clearboth"></div> 
            		</span>
            <?php // LastNews Drag Programa
			}elseif ( is_page( 7 ) ){?>
			<article class="loop_expand_wrap lastnews_page">
                    <header class="title-wrap">
                        <h1>
                            <a href="<?php echo get_category_link(3); ?>" target="_self" title="<?php echo get_cat_name(3); ?>"><i class="<?php the_field('cat_icon', 'category_3'); ?>"></i></a> 
                            <em><?php echo get_cat_name(3);?></em>:&nbsp;
                            <?php if( qtrans_getLanguage() == 'es' ){ $content = 'Noticias Recientes';
                            }elseif( qtrans_getLanguage() == 'ca' ){ $content = 'Notícies Recents';
                            }elseif( qtrans_getLanguage() == 'en' ){ $content = 'Last News';
                            } 
                            echo $content?>
                        </h1>
                    </header>
                <?php 
                $args = array( 'category' => '3','numberposts' => 4, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
                $postslist = get_posts( $args ); ?>
					<span class="loop_expand_news_wrap">
                    <?php $i = 1; ?>
                    <?php foreach ($postslist as $post) : setup_postdata($post); ?>
                        <section id="post-<?php the_ID(); ?>" class="loop_results_expand">
                            <a href="<?php the_permalink(); ?>" title=" <?php echo the_title(); ?>">
								<?php
                                    if ( has_post_thumbnail() ) {
                                    echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                                    }
                                    else {
                                        echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                                    }
                                ?>
                                <em><?php echo the_title() ?></em>
                            </a> 
                            <?php thematic_postfooter(); ?>    
                      </section>
                      <?php if ( $i ==2 ) : ?>
						<div class="clearboth small_screen"></div> 
                      <?php endif; ?>
                      <?php $i++;?> 
                <?php endforeach; ?>
                        <span class="brkr brkr25 big_screen"></span>
                        <span class="brkr brkr50 big_screen"></span>
                        <span class="brkr brkr50 small_screen"></span>
                        <span class="brkr brkr75 big_screen"></span>
                        <div class="clearboth"></div> 
            		</span>
            <?php // LastNews DragDroid
            }elseif ( is_page( 9 ) ){?>
			<article class="loop_expand_wrap lastnews_page">
                    <header class="title-wrap">
                        <h1>
                            <a href="<?php echo get_category_link(4); ?>" target="_self" title="<?php echo get_cat_name(4); ?>"><i class="<?php the_field('cat_icon', 'category_3'); ?>"></i></a> 
                            <em><?php echo get_cat_name(4);?></em>:&nbsp;
                            <?php if( qtrans_getLanguage() == 'es' ){ $content = 'Noticias Recientes';
                            }elseif( qtrans_getLanguage() == 'ca' ){ $content = 'Notícies Recents';
                            }elseif( qtrans_getLanguage() == 'en' ){ $content = 'Last News';
                            } 
                            echo $content?>
                        </h1>
                    </header>
                <?php 
                $args = array( 'category' => '4','numberposts' => 4, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
                $postslist = get_posts( $args ); ?>
					<span class="loop_expand_news_wrap">
                    <?php $i = 1; ?>
                    <?php foreach ($postslist as $post) : setup_postdata($post); ?>
                        <section id="post-<?php the_ID(); ?>" class="loop_results_expand">
                            <a href="<?php the_permalink(); ?>" title=" <?php echo the_title() ?>">
								<?php
                                    if ( has_post_thumbnail() ) {
                                    echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                                    }
                                    else {
                                        echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                                    }
                                ?>
                                <em><?php echo the_title() ?></em>
                            </a> 
                            <?php thematic_postfooter(); ?>    
                      </section>
                      <?php if ( $i ==2 ) : ?>
                                <div class="clearboth small_screen"></div> 
                      <?php endif; ?>
                      <?php $i++; ?> 
                <?php endforeach; ?>
                        <span class="brkr brkr25 big_screen"></span>
                        <span class="brkr brkr50 big_screen"></span>
                        <span class="brkr brkr50 small_screen"></span>
                        <span class="brkr brkr75 big_screen"></span>
                        <div class="clearboth"></div> 
            		</span>
          <?php } ?>  
       			 <footer class="foot_paged">
                	<?php if( qtrans_getLanguage() == 'es' ){ $content = 'MÁS NOTICIAS';
					}elseif( qtrans_getLanguage() == 'ca' ){ $content = 'MÉS NOTÍCIES';
					}elseif( qtrans_getLanguage() == 'en' ){ $content = 'MORE NEWS';
					} ?>
					<a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/noticies/' ; ?>" class="link_to_archive" title="<?php echo $content; ?>"/>
					<?php echo $content; ?>
					&nbsp;<i class="icon-chevron-right"></i></a>
                </footer>
			</article>
        </section>
	</span>
</div>