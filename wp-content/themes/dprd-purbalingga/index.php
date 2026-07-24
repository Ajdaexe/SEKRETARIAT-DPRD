<?php
get_header();
?>

<div class="container mx-auto px-4 py-12">
    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                    <header class="mb-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="aspect-w-16 aspect-h-9 mb-4 rounded overflow-hidden">
                                <?php the_post_thumbnail('medium', array('class' => 'object-cover w-full h-full')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <h2 class="text-xl font-bold text-maroon mb-2">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="hover:text-maroon-dark">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        
                        <div class="text-xs text-gray-500 mb-2">
                            <span><?php echo get_the_date(); ?></span>
                        </div>
                    </header>

                    <div class="text-gray-600 text-sm mb-4">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="text-maroon font-semibold text-sm hover:underline">
                        Baca Selengkapnya &rarr;
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
        
        <div class="mt-8 flex justify-center">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
            ) );
            ?>
        </div>
        
    <?php else : ?>
        <div class="text-center py-20">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Belum ada konten</h2>
            <p class="text-gray-500">Mohon maaf, belum ada konten yang dapat ditampilkan saat ini.</p>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();
