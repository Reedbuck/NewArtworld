<?php




function true_load_posts(){
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';
	$q = new WP_Query($args);
	if( $q->have_posts() ): ?>
<div class="wrap-triple-col">
    <div class="triple-col clearfix">
        <?php
		while($q->have_posts()): $q->the_post();
			
			?>

			                     <div class="col-md-12">
                                        <a class="item" href="<?php echo get_permalink() ?>">   
                                            <div class="blog_border">
                                                <div class="col-md-3">
                                                    <div class="square_block">
                                                        <?php if(has_post_thumbnail() == 'true') { ?>
                                                    <img class="img-thrumb" src="<?php 
                $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumbnail-size', true);
                echo $thumb_url[0]; 
                                                                ?>">
                                                        <?php }else{ ?>
                                                        <img class="img-thrumb" src="<?php bloginfo('template_url'); ?>/images/clashlogo.jpg">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <h2><?php echo get_the_title(); ?></h2>
                                                    <p><?php echo get_the_excerpt() ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

			<?php
		endwhile; ?>
    </div>
</div>
<?php
	endif;
	wp_reset_postdata();
	die();
}
 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');



?>