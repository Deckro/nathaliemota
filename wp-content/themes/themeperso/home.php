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
<div class="selecteur">
    <div class="select_gauche">
        <select name="catégorie" id="catégorie"><option value="">Catégorie</option><option value="mariage">mariage</option></select>
        <select name="formats" id="formats"><option value="">formats</option><option value="#">#</option></select>
    </div>
    <div class="select_droit">
        <select name="trier_par" id="trier_par"><option value="trier_par">Trier par</option><option value="#">#</option></select>
    </div>
</div>
<div class="home_galerie">
    <?php                    
        $compteur = 0;                   
        while ( $galerie->have_posts() ) {  
            $galerie->the_post();
            $cacher = $compteur>7?"cacher":"";
            echo '<div class="photos '.$cacher.'"><a href="'.get_post_permalink().'">';
            echo get_the_post_thumbnail( get_the_ID(), 'full' );
            echo '</a></div>';  
            $compteur ++;       
        } 
    ?>
</div>
<div class="charger_btn">
    <button class="charger" id="plus">charger plus</button>
</div>
<?php get_footer(); ?>