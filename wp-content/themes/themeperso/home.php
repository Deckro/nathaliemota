<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
    );
    $galerie = new WP_Query($args);
?>

<div class="banner" style="background-image: url(<?php echo get_the_post_thumbnail_url($galerie->posts[5]->ID, 'full');?>)"> 
    <h1 class="titre_banner">photographe event</h1>

</div>

<select name="catégorie" id="catégorie"><option value="">Catégorie</option><option value="mariage">mariage</option></select>
<select name="formats" id="formats"><option value="">formats</option><option value="#">#</option></select>
<select name="trier_par" id="trier_par"><option value="trier_par">TRIER PAE</option><option value="#">#</option></select>

<div class="home_galerie">
    <?php                    
        while ( $galerie->have_posts() ) {
            $galerie->the_post();
            echo '<div class="home_photos">';
            echo get_the_post_thumbnail( get_the_ID(), '[1200,800]' );
            echo '</div>';       
        } 
    ?>
</div>
<div class="charger_btn">
    <button class="charger">charger plus</button>
</div>
<?php get_footer(); ?>