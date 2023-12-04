<div class="hover">
    <img id="photo_<?php echo $post->ID;?>" class="cadre" src="<?php echo get_template_directory_uri().'/assets/img/icon_fullscreen.svg';?>" alt="">
    <a href="<?php echo get_post_permalink();?>">
        <img class="eye" src="<?php echo get_template_directory_uri().'/assets/img/icon_eye.svg';?>" alt="">
    </a>
    <p class="titre_img"><?php echo get_the_title();?></p>
    <p class="categorie_img"><?php echo get_the_terms(get_the_ID(), 'categorie')[0]->name;?></p>
</div>
<div id="light_<?php echo $post->ID;?>" class="lightbox">
    <div>
        <a class="closelightbox close2">x</a>
    </div>
    <div class="lightbox_img">
        <a class="light" href="<?php echo get_post_permalink();?>">
            <?php echo get_the_post_thumbnail( get_the_ID(), 'full' );?>
        </a>
    </div>
    <p class="light_titre_img"><?php echo get_the_title();?></p>
    <p class="light_categorie_img"><?php echo get_the_terms(get_the_ID(), 'categorie')[0]->name;?></p>
    <div class="lightbox_left">
        <img class="light_box_fleche_left" src="<?php echo get_template_directory_uri().'/assets/img/Line6.svg';?>" alt="">
        <p class="precedent">precedent</p>
    </div>
    <div class="lightbox_right">
        <p class="suivant">suivant</p>
        <img class="light_box_fleche_right" src="<?php echo get_template_directory_uri().'/assets/img/Line7.svg';?>" alt="">
    </div>
</div>
