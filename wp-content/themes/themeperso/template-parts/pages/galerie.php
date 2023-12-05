<div class="flex center galerie marge">
    <?php                    
        $compteur = 0;                   
        while ( $galerie->have_posts() ) {  
            $galerie->the_post();
            $cacher = $compteur>$maxAffiche?"cacher":"";
            echo '<div class="flex photos '.$cacher.'">';
            require 'lightbox.php'; 
            echo '<a class="photo" href="'.get_post_permalink().'">'.get_the_post_thumbnail( get_the_ID(), 'full' ).'</a>';
            echo '</div>';  
            $compteur ++;       
        } 
    ?>
</div>