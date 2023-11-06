<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
    );
    $galerie = new WP_Query($args);
?>

<div style="background-image: url(<?php echo get_the_post_thumbnail_url($galerie->posts[5]->ID, 'full');?>)"> 
    <h1>photographe event</h1>

</div>

<select name="catégorie" id="catégorie"><option value="">Catégorie</option><option value="mariage">mariage</option></select>
<select name="formats" id="formats"><option value="">formats</option><option value="#">#</option></select>
<select name="trier_par" id="trier_par"><option value="trier_par">TRIER PAE</option><option value="#">#</option></select>

<div>
    <?php                    
        while ( $galerie->have_posts() ) {
            $galerie->the_post();
            echo ' <div class="home_photo">';
            echo get_the_post_thumbnail( get_the_ID(), 'full' );
            echo '</div>';       
        } 
    ?>
</div>
<button>charger plus</button>

<?php get_footer(); ?>