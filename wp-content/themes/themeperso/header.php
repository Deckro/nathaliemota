<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nathalie mota</title>
</head>
<body>
    <header>
        <div>
            <img src="<?php echo get_template_directory_uri().'/assets/img/Logo.png';?>" alt="">
            <nav>
            <?php $menuh = wp_get_nav_menu_items('header');
                for($i = 0; $i< count($menuh); $i++){?>
                <div>
                   <a href="<?php echo $menuh[$i]-> url;?>"><?php echo $menuh[$i]-> title;?></a>
                </div>
                <?php                    
                }
            ?> 
            </nav>
        </div>

    </header>
