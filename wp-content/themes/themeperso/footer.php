<footer>
    <div>
        <nav>
        <nav>
            <?php $menuf = wp_get_nav_menu_items('footer');
                for($i = 0; $i< count($menuf); $i++){?>
                <div>
                   <a href="<?php echo $menuf[$i]-> url;?>"><?php echo $menuf[$i]-> title;?></a>
                </div>
                <?php                    
                }
            ?> 
            </nav>
        </nav>
    </div>
    <?php require_once 'template-parts/footer/modale-contact.php'; ?>
</footer>


</body>
</html>