<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
    );
    $galerie = new WP_Query($args);
?>

<div class="flex center banner" style="background-image: url(<?php echo get_the_post_thumbnail_url($galerie->posts[rand(0,count($galerie->posts)-1)]->ID, 'full');?>)"> 
    <h1 class="flex titre_banner">photographe event</h1>

</div>
<div class="flex selecteur">
    <div class="flex select_gauche">
        <select name="catégorie" id="catégorie"><option value="">Catégorie</option><option value="mariage">mariage</option></select>
        <select name="formats" id="formats"><option value="">formats</option><option value="#">#</option></select>
    </div>
    <div class="select_droit">
        <select name="trier_par" id="trier_par"><option value="trier_par">Trier par</option><option value="#">#</option></select>
    </div>
</div>
<div class="flex center home_galerie">
    <?php                    
        $compteur = 0;                   
        while ( $galerie->have_posts() ) {  
            $galerie->the_post();
            $cacher = $compteur>7?"cacher":"";
            echo '<div class="flex photos '.$cacher.'"><a href="'.get_post_permalink().'">';
            echo get_the_post_thumbnail( get_the_ID(), 'full' );
            echo '</a></div>';  
            $compteur ++;       
        } 
    ?>
</div>
<div class="flex center">
    <button class="charger" id="tout">charger plus</button>
</div>
<?php get_footer(); ?>