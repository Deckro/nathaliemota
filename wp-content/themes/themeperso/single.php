<?php get_header(); ?>
<?php $fields = get_fields();?>
<?php $post = get_post();?>
<?php $img = get_the_post_thumbnail_url();?>

<?php echo $post->post_title;?>
<?php echo $fields['type'];?>
<?php echo $fields['reference'];?>
<?php echo $fields['année'];?>
<img src="<?php echo $img;?>" alt="">

<?php get_footer(); ?>