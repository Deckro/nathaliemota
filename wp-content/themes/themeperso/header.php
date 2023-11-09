<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital@0;1&display=swap" rel="stylesheet"> 
    <title>nathalie mota</title>
    <?php wp_head();?>
</head>
<body>
    <header>
        <div class="header">
            <div class="logonav">
                <div>
                    <img class="logo" src="<?php echo get_template_directory_uri().'/assets/img/Logo.png';?>" alt="">
                </div>
                <div>
                <nav class="nav_header">
                <?php $menuh = wp_get_nav_menu_items('header');
                    for($i = 0; $i< count($menuh); $i++){?>
                    <div>
                       <a class="<?php echo $menuh[$i]-> classes[0];?>" href="<?php echo $menuh[$i]-> url;?>"><?php echo $menuh[$i]-> title;?></a>
                    </div>
                    <?php                    
                    }
                ?> 
                </nav>
                </div>
            </div>
        </div>
    </header>

