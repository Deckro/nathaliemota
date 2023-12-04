<div class="flex center galerie marge">
    <?php 
        $compteur = 0;                   
        while ( $galerie->have_posts() ) {  
            $galerie->the_post();
            if(get_the_ID()!= $current_post_id){
                $cacher = $compteur>$miniAffiche?"cacher":"";
                echo ' <div class="flex photos '.$cacher.'">';
                require 'lightbox.php'; 
                echo get_the_post_thumbnail( get_the_ID(), 'full' );
                echo '</div>';  
                $compteur ++;
        }}
    ?>
</div>
