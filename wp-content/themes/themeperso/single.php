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

<div class="single flex marge">
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

<div class="single marge"> 
    <div class="flex middle">
        <div class="flex info">
            <p class="text">cette photo vous intéresse?</p>
            <button id="middlecontact" class="modale_ouverture btn" data-ref="<?php echo $fields['reference'];?>">contact</button>
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
            <div class="flex arrow"><img id="left" class="fleche" src="<?php echo get_template_directory_uri().'/assets/img/Line8.svg';?>" alt=""><img id="right"class="fleche" src="<?php echo get_template_directory_uri().'/assets/img/Line9.svg';?>" alt=""></div>
        </div>
    </div>
</div>


<div class="single marge">
    <p class="vous">VOUS AIMEREZ AUSSI</p>
    <?php
        $maxAffiche = 1;
    ?>
    <?php require_once 'template-parts/pages/galerie_single.php'; ?>
</div>
<div class="flex center">
    <button class="btn" id='tout'>Toutes les photos</button>
</div>

<script>
const middleContact = document.getElementById('middlecontact')

middleContact.addEventListener('click', function(ev){
    const refField = document.querySelector("input[name='your-subject']")
    refField.value = ev.currentTarget.dataset.ref
    modaleOpen ()
})
function modaleOpen(){
    modaleCacher.classList.add('formactive')
}
</script>

<?php get_footer(); ?>


