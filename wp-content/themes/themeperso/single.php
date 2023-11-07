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
<div class="single">
    <div class="single_top">
        <div class="single_top_info">
            <h2 class="single_top_title"><?php echo $post->post_title;?></h2>
            <p class="single_top_cat">Référence :<?php echo $fields['reference'];?></p>
            <p class="single_top_cat">Type :<?php echo $fields['type'];?></p>
            <p class="single_top_cat">Categorie : <?php echo get_the_terms($post->ID, 'categorie')[0]->name; ?></p>
            <p class="single_top_cat">Format : <?php echo get_the_terms($post->ID, 'format')[0]->name; ?></p>
            <p class="single_top_cat">Année :<?php echo $fields['année'];?></p>
        </div>
        <img class="single_top_img" src="<?php echo $img;?>" alt="">
    </div>
</div>
    

<div class="single_middle">
    <div class="single_middle_info">
        <p>cette photo vous intéresse?</p>
        <button><a href="#contact">contact</a></button>
    </div>
    <div>
        <img src="" alt="miniature">
        <div><img src="" alt=""><img src="" alt=""></div>
    </div>
</div>


<div>
    <p>VOUS AIMEREZ AUSSI</p>
    <div class="single_galerie">
        <?php                    
            while ( $galerie->have_posts() ) {
                $galerie->the_post();
                echo ' <div class="single_photos">';
                echo get_the_post_thumbnail( get_the_ID(), 'full' );
                echo '</div>';       
            } 
        ?>
    </div>
</div>
<button id='tout'>Toutes les photos</button>


<?php get_footer(); ?>