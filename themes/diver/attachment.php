<?php get_header(); ?>

<div id="main-wrap">
			<div id="content" role="main">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php if ( ! empty( $post->post_parent ) ) : ?>

				<div id="attachment-post" style="text-align: center;">
	
						<p class="attachment"><?php
							$attachment_width  = apply_filters( 'diver_attachment_width', 900 );
							$attachment_height = apply_filters( 'diver_attachment_height', 900 );

							echo wp_get_attachment_image( $post->ID, array( $attachment_width, $attachment_height ) );
						?></p>

					<div class="entry-meta">
						<span class="entry-title"><?php the_title(); ?></span>
						<?php
							printf( __( '<span class="%1$s">By</span> %2$s', 'twentyten' ),
								'meta-prep meta-prep-author',
								sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), get_the_author() ) ),
									get_the_author()
								)
							);
						?>
						<span class="meta-sep">|</span>
						<?php
							printf( '<span class="%1$s">Published</span> %2$s',
								'meta-prep meta-prep-entry-date',
								sprintf( '<span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span>',
									esc_attr( get_the_time() ),
									get_the_date()
								)
							);
							if ( wp_attachment_is_image() ) {
								echo ' <span class="meta-sep">|</span> ';
								$metadata = wp_get_attachment_metadata();
								printf( __( 'Full size is %s pixels', 'twentyten' ),
									sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
										wp_get_attachment_url(),
										esc_attr( __( 'Link to full-size image', 'twentyten' ) ),
										$metadata['width'],
										$metadata['height']
									)
								);
							}
						?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
					</div>
					<div class="entry-content">
						<div class="entry-attachment">

<?php else : ?>
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
<?php endif; ?>
						</div>

<?php the_content(); ?>

					</div>
				</div>

<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>
