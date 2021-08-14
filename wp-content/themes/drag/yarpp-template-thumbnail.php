<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)

ORIGINAL CODE:
--------------------------------------------------------------------------------------------------------------------------------------------
<?php if (have_posts()):?>
<ol>
	<?php while (have_posts()) : the_post(); ?>
		<?php if (has_post_thumbnail()):?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a></li>
		<?php endif; ?>
	<?php endwhile; ?>
</ol>

<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>
--------------------------------------------------------------------------------------------------------------------------------------------
*/ ?>
<?php if (have_posts()):?>
<span id="container" class="container_full wrap_width">
    <section id="content" class="gray_leather">
        <article class="loop_expand_wrap lastnews_page">
            <header class="title-wrap">
                <h2 class="entry_title post_header">
                    <span class="icon-wrap"><i class="icon-resize-small"></i></span>
                    <?php if( qtrans_getLanguage() == 'es' ){ $content = 'NOTICIAS RELACIONADAS';
                    }elseif( qtrans_getLanguage() == 'ca' ){ $content = 'NOTÍCIES RELACIONADES';
                    }elseif( qtrans_getLanguage() == 'en' ){ $content = 'RELATED NEWS';
                    } 
                    echo $content?>
                </h2>
            </header>
            <span class="loop_expand_news_wrap">
            <?php $i = 1; ?>
            <?php while (have_posts()) : the_post(); ?>
            <section id="post-<?php the_ID(); ?>" class="loop_results_expand">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title=" <?php the_title_attribute(); ?>">
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
			<?php endwhile; ?>
                <span class="brkr brkr25 big_screen"></span>
                <span class="brkr brkr50 big_screen"></span>
                <span class="brkr brkr50 small_screen"></span>
                <span class="brkr brkr75 big_screen"></span>
                <div class="clearboth"></div> 
            </span>  
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
<?php endif; ?>