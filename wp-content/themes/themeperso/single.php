<?php get_header(); ?>
<?php $fields = get_fields();?>
<?php $post = get_post();?>
<?php $img = get_the_post_thumbnail_url();?>
<?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'tax_query' =>  array(array ( 
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => get_the_terms($post->ID, 'categorie')[0]->slug
        )
    ));
    $galerie = new WP_Query($args);
    $current_post_id = $post->ID;
?>
<div class="single flex">
    <div class="top flex">
        <div class="info">
            <h2 class="title"><?php echo $post->post_title;?></h2>
            <p class="cat">Référence :<?php echo $fields['reference'];?></p>
            <p class="cat">Type :<?php echo $fields['type'];?></p>
            <p class="cat">Categorie : <?php echo get_the_terms($post->ID, 'categorie')[0]->name; ?></p>
            <p class="cat">Format : <?php echo get_the_terms($post->ID, 'format')[0]->name; ?></p>
            <p class="cat">Année :<?php echo $fields['année'];?></p>
        </div>
        <img class="img" src="<?php echo $img;?>" alt="">
    </div>
</div>

<div class="single"> 
    <div class="flex middle">
        <div class="flex info">
            <p class="text">cette photo vous intéresse?</p>
            <button id="middlecontact" class="modale_ouverture btn">contact</button>
        </div>
        <div class="right">
        <?php
            $first = true;
            while ($galerie->have_posts() ) {
                            $galerie->the_post();
                            if(get_the_ID()!= $current_post_id){
                                $class = $first?'activemini':'';
                            echo ' <div class="miniature '.$class.'">';
                            echo get_the_post_thumbnail(  get_the_ID(), 'full');
                            echo '</div>';
                            $first = false;       
            }} 
            ?>            
            <div class="flex arrow"><img id="left" class="fleche" src="<?php echo get_template_directory_uri().'/assets/img/Line6.svg';?>" alt=""><img id="right"class="fleche" src="<?php echo get_template_directory_uri().'/assets/img/Line7.svg';?>" alt=""></div>
        </div>
    </div>
</div>


<div class="single">
    <p class="vous">VOUS AIMEREZ AUSSI</p>
    <div class="galerie">
        <?php 
            $compteur = 0;                   
            while ( $galerie->have_posts() ) {  
                $galerie->the_post();
                if(get_the_ID()!= $current_post_id){
                $cacher = $compteur>1?"cacher":"";
                echo ' <div class="flex photos '.$cacher.'">
                <div class="hover">
                    <img id="cadre" class="cadre" src="'.get_template_directory_uri().'/assets/img/icon_fullscreen.svg'.'" alt="">
                    <a href="'.get_post_permalink().'">
                        <img class="eye" src="'.get_template_directory_uri().'/assets/img/icon_eye.svg'.'" alt="">
                    </a>
                    <p class="titre_img">'.get_the_title().'</p>
                    <p class="categorie_img">'.get_the_terms(get_the_ID(), 'categorie')[0]->name.'</p>
                </div>
                <div class="lightbox">
                    <div>
                        <a id ="closelightbox" class="close2">x</a>
                    </div>
                    <div class="lightbox_img">
                        <a class="light" href="'.get_post_permalink().'">
                            '.get_the_post_thumbnail( get_the_ID(), 'full' ).'
                        </a>
                    </div>
                        <p class="light_titre_img">'.get_the_title().'</p>
                        <p class="light_categorie_img">'.get_the_terms(get_the_ID(), 'categorie')[0]->name.'</p>
                    <div class="lightbox_left">
                        <img class="light_box_fleche_left" src="'.get_template_directory_uri().'/assets/img/Line6.svg'.'" alt="">
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
            }} 
        ?>
    </div>
</div>
<div class="flex center">
    <button class="btn none" id='tout'>Toutes les photos</button>
</div>

<script>
const middleContact = document.getElementById('middlecontact')

middleContact.addEventListener('click', function(){
    modaleOpen ()
})
function modaleOpen(){
    modaleCacher.classList.add('formactive')
}
</script>

<?php get_footer(); ?>


