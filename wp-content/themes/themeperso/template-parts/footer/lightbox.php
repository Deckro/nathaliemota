<div class="hover">
    <img id="cadre" class="cadre" src="'.get_template_directory_uri().'/assets/img/icon_fullscreen.svg'.'" alt="">
    <img id="eye" class="eye" src="'.get_template_directory_uri().'/assets/img/icon_eye.svg'.'" alt="">
    <p class="titre_img">'.get_the_title().'</p>
    <p class="categorie_img">'.get_the_terms(get_the_ID(), 'categorie')[0]->name.'</p>
</div>
<div class="lightbox">
     <div>
        <a id ="closelightbox" class="close2">x</a>
    </div>
    <div class="lightbox_img">
    '.get_the_post_thumbnail( get_the_ID(), 'full' ).'
    </div>
    <p class="light_titre_img">'.get_the_title().'</p>
    <p class="light_categorie_img">'.get_the_terms(get_the_ID(), 'categorie')[0]->name.'</p>
    <div class="lightbox_left">
        <img class="light_box_fleche" src="'.get_template_directory_uri().'/assets/img/Line6.svg'.'" alt="">
        <p class="precedent">precedent</p>
    </div>
    <div class="lightbox_right">
        <p class="suivant">suivant</p>
        <img class="light_box_fleche" src="'.get_template_directory_uri().'/assets/img/Line7.svg'.'" alt="">
    </div>
</div>