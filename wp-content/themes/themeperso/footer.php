<footer>
    <?php require_once 'template-parts/footer/modale-contact.php'; ?>
    <div>
        <nav class="flex nav_footer">
            <?php $menuf = wp_get_nav_menu_items('footer');
                for($i = 0; $i< count($menuf); $i++){?>
                   <a class="hovernav"href="<?php echo $menuf[$i]-> url;?>"><?php echo $menuf[$i]-> title;?></a>
                <?php                    
                }
            ?> 
        </nav>
    </div>
    
</footer>

<?php wp_footer(); ?>

</body>
</html>