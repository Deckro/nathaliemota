<?php get_header(); ?>
<?php $fields = get_fields();?>
<?php $post = get_post();?>
<?php $img = get_the_post_thumbnail_url();?>
<div>
<h2><?php echo $post->post_title;?></h2>
<p>Référence :<?php echo $fields['reference'];?></p>
<p>Type :<?php echo $fields['type'];?></p>
<p>Categorie : <?php echo get_the_terms($post->ID, 'categorie')[0]->name; ?></p>
<p>Format : <?php echo get_the_terms($post->ID, 'format')[0]->name; ?></p>
<p>Année :<?php echo $fields['année'];?></p>
</div>
<img src="<?php echo $img;?>" alt="">


<?php get_footer(); ?>