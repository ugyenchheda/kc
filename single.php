<?php get_header(cristiano_header()); ?>
	<div id="layout" class="<?php cristiano_site_layout(); ?>">
		<div id="container">
			<div id="content" class="center">
				<div id="single-post" class="<?php caristiano_has_sidebar(); ?>">
					<?php if ( have_posts() ) : ?>
						<main id="main">
							<?php while (have_posts()) : the_post(); ?>
								<article <?php post_class()?>>		
									<?php the_post_thumbnail('width-830'); ?>
									
									<h1 class="title"><?php the_title(); ?></h1>
								
									<ul class="entry-meta">
										<li>
											<i class="fa fa-calendar-o"></i>
											<time class="date" datetime="<?php the_date('Y-m-d g:i:s'); ?>">
												<?php the_time('F j, Y') ?>
											</time>
										</li>
										<li>
											<i class="fa fa-comment"></i>
											<a href="<?php the_permalink() ?>#comments"><?php comments_number(); ?></a>
										</li>
										<li>
											<i class="fa fa-tag"></i>
											<?php the_category(); ?>
										</li>
									</ul>
				
									<div class="content">
										<?php the_content(); ?>
									</div>
									<?php if(has_tag()): ?>
										<div class="tags">
											<i class="fa fa-tags" aria-hidden="true"></i>	
											<?php the_tags('','',''); ?>
										</div>
									<?php endif; ?>
								</article>
							<?php endwhile; ?>
							<?php 
								$args = array(
									'before' => '<div id="post-nav">',
									'after'	 => '</div>',
								);
								wp_link_pages( $args ); 
							?>
							<?php if ( comments_open() || get_comments_number() ) {
								comments_template();
							} else {
								echo '<h3>Comments are closed</h3>';
							} ?>
						</main>
					<?php endif; ?>
					<?php get_sidebar(); ?>
				
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	