<?php get_header(); ?>
<?php $fields = get_fields();?>
<?php $post = get_post();?>
<?php $img = get_the_post_thumbnail_url();?>
<?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
    );
    $galerie = new WP_Query($args);
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
            <button class="btn"><a href="#contact">contact</a></button>
        </div>
        <div class="right">
        <?php
            $first = true;
            while ($galerie->have_posts() ) {
                            $galerie->the_post();
                            if(get_the_ID()!= $post->ID){
                                $class = $first?'activemini':'';
                            echo ' <div class="miniature '.$class.'">';
                            echo get_the_post_thumbnail_url(  get_the_ID(), 'full');
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
                $cacher = $compteur>1?"cacher":"";
                echo ' <div class="flex photos '.$cacher.'"><a href="'.get_post_permalink().'">';
                echo get_the_post_thumbnail( get_the_ID(), 'full' );
                echo '</a></div>';  
                $compteur ++;
            } 
        ?>
    </div>
</div>
<div class="flex center">
    <button class="charger none" id='tout'>Toutes les photos</button>
</div>

<?php get_footer(); ?>


