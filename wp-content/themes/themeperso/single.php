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
<div>
<h2><?php echo $post->post_title;?></h2>
<p>Référence :<?php echo $fields['reference'];?></p>
<p>Type :<?php echo $fields['type'];?></p>
<p>Categorie : <?php echo get_the_terms($post->ID, 'categorie')[0]->name; ?></p>
<p>Format : <?php echo get_the_terms($post->ID, 'format')[0]->name; ?></p>
<p>Année :<?php echo $fields['année'];?></p>
</div>
<img src="<?php echo $img;?>" alt="">
<div>
    <p>cette photo vous intéresse?</p>
    <button><a href="#contact">contact</a></button>
    <div>
        <img src="" alt="miniature">
        <div><img src="" alt=""><img src="" alt=""></div>
    </div>
</div>
<div>
    <p>VOUS AIMEREZ AUSSI</p>
    <?php                    
        while ( $galerie->have_posts() ) {
            $galerie->the_post();
            echo ' <div class="single_galerie">';
            echo get_the_post_thumbnail( get_the_ID(), 'full' );
            echo '</div>';       
        } 
    ?>
</div>
<button id='tout'>Toutes les photos</button>


<?php get_footer(); ?>