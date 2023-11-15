<?php get_header(); ?>
<?php
    $cat = get_terms('categorie');
    $for = get_terms('format');
    $taxo = array();
    $formats = $_GET['formats'];
    $categories = $_GET['catégorie'];
    if($categories != ''){
        $taxo[] = array ( 
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $categories
        );
    }
    if($formats != ''){
        $taxo[] = array ( 
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $formats
        );
    }
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'tax_query' => $taxo
    );
    $galerie = new WP_Query($args);
?>

<div class="flex center banner" style="background-image: url(<?php echo get_the_post_thumbnail_url($galerie->posts[rand(0,count($galerie->posts)-1)]->ID, '[763,763]');?>)"> 
    <h1 class="flex titre_banner">photographe event</h1>

</div>
<div class="flex selecteur">
    <div class="flex select_gauche">
        <form id="choix" action="">
            <select class="filtre" name="catégorie" id="catégorie">
                <option value="">Catégorie</option>
                <?php
                var_dump($categories);
                for($i=0; $i<count($cat); $i++) {
                    $selected = $cat[$i]->slug==$categories?"selected":"";
                    echo '<option '.$selected.' value="'.$cat[$i]->slug.'">'.$cat[$i]->name.'</option>';
                }
                ?>
            </select>
            <select class="filtre" name="formats" id="formats">
                <option value="">formats</option>
                <?php
                var_dump($formats);
                for($i=0; $i<count($for); $i++) {
                    $selecteds = $for[$i]->slug==$formats?"selected":"";
                    echo '<option '.$selecteds.' value="'.$for[$i]->slug.'">'.$for[$i]->name.'</option>';
                }
                ?>
            </select>
        </form>
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