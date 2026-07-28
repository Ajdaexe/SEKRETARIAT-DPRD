<?php
/**
 * The main template file
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<section class="hero" data-title="Informasi" data-subtitle="Informasi dan Berita Terbaru dari Sekretariat DPRD Kabupaten Purbalingga">
    <div class="hero-copy">
        <h1><?php is_archive() ? the_archive_title() : (is_search() ? 'Hasil Pencarian' : 'Informasi & Berita'); ?></h1>
        <p><?php is_archive() ? the_archive_description() : 'Informasi dan Berita Terbaru dari Sekretariat DPRD Kabupaten Purbalingga'; ?></p>
    </div>
</section>

<section class="container section reveal">
    <?php if ( have_posts() ) : ?>
        <div class="service-grid three">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div style="margin:-30px -30px 20px; overflow:hidden; border-radius:var(--radius) var(--radius) 0 0;">
                            <?php the_post_thumbnail('medium_large', array('style' => 'width:100%; height:200px; object-fit:cover;')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div style="font-size:13px; color:var(--muted); margin-bottom:8px;">
                        🗓️ <?php echo get_the_date(); ?> &nbsp; 👤 <?php the_author(); ?>
                    </div>
                    
                    <h3 style="margin-top:0; font-size:20px; line-height:1.3;">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" style="color:var(--ink); text-decoration:none;">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <p style="font-size:14px; color:var(--muted); line-clamp:3; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden;">
                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                    </p>
                    
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="text-link" style="margin-top:14px; display:inline-block;">
                        Baca Selengkapnya ➔
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
        
        <div style="margin-top: 40px; display:flex; justify-content:center; gap:10px;">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '← Sebelumnya',
                'next_text' => 'Selanjutnya →',
            ) );
            ?>
        </div>
        
    <?php else : ?>
        <div style="text-align:center; padding:60px 20px;">
            <h2 style="margin-bottom:10px;">Belum ada konten</h2>
            <p style="color:var(--muted);">Mohon maaf, belum ada konten yang dapat ditampilkan saat ini.</p>
        </div>
    <?php endif; ?>
</section>

<?php
get_footer();
