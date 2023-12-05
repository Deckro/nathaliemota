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
        
            <select class="filtre" name="catégorie" id="catégorie" onfocus="this.size=6;"onblur="this.size=1;"onchange="this.size=1; this.blur()">
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
<div>
<?php
    $maxAffiche = 11;
?>
    <?php require_once 'template-parts/pages/galerie.php'; ?>
</div>   
<div class="flex center">
    <button class="btn" id="tout">charger plus</button>
</div>
<?php get_footer(); ?>