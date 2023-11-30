<?php get_header(); ?>
<?php
    $cat = get_terms('categorie');
    $for = get_terms('format');
    $taxo = array();
    $formats = isset($_GET['formats'])?$_GET['formats']:null;
    $categories = isset($_GET['catégorie'])?$_GET['catégorie']:null;
    $trierPar = isset($_GET['trier_par'])?$_GET['trier_par']:null;
    if($categories != '' && $categories != null){
        $taxo[] = array ( 
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $categories
        );
    }
    if($formats != '' && $formats != null){
        $taxo[] = array ( 
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $formats
        );
    }
    $order = 'DESC';
    if($trierPar != '' && $trierPar != null){
        $order = $trierPar;
    }
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'tax_query' => $taxo,
        'orderby'=> 'post_date', 
        'order' => $order
    );
    $galerie = new WP_Query($args);
    $arg = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
    );
    $gal = new WP_Query($arg);
?>

<div class="flex center banner" style="background-image: url(<?php echo get_the_post_thumbnail_url($gal->posts[rand(0,count($gal->posts)-1)]->ID, 'full');?>)"> 
    <h1 class="flex titre_banner">photographe event</h1>

</div>
<form id="choix" action="">
<div class="flex selecteur">
 
        <div class="flex select_gauche">
        
            <select class="filtre" name="catégorie" id="catégorie" onfocus="this.size=6;"onblur="this.size=0;"onchange="this.size=1; this.blur()">
                <option value="">Catégorie</option>
                <?php
                for($i=0; $i<count($cat); $i++) {
                    $selected = $cat[$i]->slug==$categories?"selected":"";
                    echo '<option class="red"'.$selected.' value="'.$cat[$i]->slug.'">'.$cat[$i]->name.'</option>';
                }
                ?>
            </select>
            <select class="filtre" name="formats" id="formats" onfocus="this.size=6;"onblur="this.size=0;"onchange="this.size=1; this.blur()">
                <option class="red" value="">formats</option>
                <?php
                for($i=0; $i<count($for); $i++) {
                    $selecteds = $for[$i]->slug==$formats?"selected":"";
                    echo '<option class="red"'.$selecteds.' value="'.$for[$i]->slug.'">'.$for[$i]->name.'</option>';
                }
                ?>
            </select>
        
    </div>
    <div class="select_droit">
        <select class="filtre" name="trier_par" id="trier_par" onfocus="this.size=6;"onblur="this.size=0;"onchange="this.size=1; this.blur()">
            <option class="red" value="">Trier par</option>
            <option class="red" value="DESC">Decroissant</option>
            <option class="red" value="ASC">Croissant</option>
        </select>
    </div>

</div>
</form>
<div class="flex center home_galerie marge">
    <?php                    
        $compteur = 0;                   
        while ( $galerie->have_posts() ) {  
            $galerie->the_post();
            $cacher = $compteur>7?"cacher":"";
            echo '<div class="flex photos '.$cacher.'">
            <div class="hover">
                <img id="photo_'.$post->ID.'" class="cadre" src="'.get_template_directory_uri().'/assets/img/icon_fullscreen.svg'.'" alt="">
                <a href="'.get_post_permalink().'">
                    <img class="eye" src="'.get_template_directory_uri().'/assets/img/icon_eye.svg'.'" alt="">
                </a>
                <p class="titre_img">'.get_the_title().'</p>
                <p class="categorie_img">'.get_the_terms(get_the_ID(), 'categorie')[0]->name.'</p>
            </div>
            <div id="light_'.$post->ID.'" class="lightbox">
                <div>
                    <a class="closelightbox close2">x</a>
                </div>
                <div class="lightbox_img">
                    <a class="light" href="'.get_post_permalink().'">
                    '.get_the_post_thumbnail( get_the_ID(), 'full' ).'
                    </a>
                </div>
                <p class="light_titre_img">'.get_the_title().'</p>
                <p class="light_categorie_img">'.get_the_terms(get_the_ID(), 'categorie')[0]->name.'</p>
                <div class="lightbox_left">
                    <img class="white light_box_fleche_left" src="'.get_template_directory_uri().'/assets/img/Line6.svg'.'" alt="">
                    <p class="precedent">precedent</p>
                </div>
                <div class="lightbox_right">
                    <p class="suivant">suivant</p>
                    <img class="light_box_fleche_right" src="'.get_template_directory_uri().'/assets/img/Line7.svg'.'" alt="">
                </div>
            </div>';
            echo get_the_post_thumbnail( get_the_ID(), 'full' );
            echo '</div>';  
            $compteur ++;       
        } 
    ?>
</div>
<div class="flex center">
    <button class="btn" id="tout">charger plus</button>
</div>
<?php get_footer(); ?>