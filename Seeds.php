<?php require_once './core/init.php'; ?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Forest Herbs | | Seeds</title>
        <link rel='shortcut icon' href='./Resourses/Images/favicon.png' type='image/x-icon'>
        <link rel='icon' href='./Resourses/Images/favicon.png' type='image/x-icon'>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="keywords" content="Forest Herbs,Forest Herbs for import and export,herbs,seeds,spices">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="./Resourses/CSS/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./Resourses/CSS/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="./Resourses/CSS/main-style.css" rel="stylesheet" type="text/css" />

    </head>
    <body>

        <?php require './Header.php'; ?> 

        <!----- Our Important Products Section ----->
        <section class='ourImportantProducts'>
            <div class="container">
                <div class="row"> 
                    <h2 class="heading">Our Seeds</h2> 

                    <?php
                    $user = new User();
                    $productData = $user->getProducts(array('Seeds'));
                    $imagePath = Config::get('downloadDestination');
                    if ($productData) {
                        foreach ($productData as $data) {
                            echo '<div class="col-md-3 col-sm-6 col-xs-12 "> ';
                            echo '<img src="' . $imagePath . $data->image . '" width="100%" height="150px"> ';
                            echo '<p class="subtitle">' . $data->name . '</p>';
                            echo '</div> ';
                        }
                    } else {
                        echo '<h4> No Avaliable Seeds Now </h4>';
                    }
                    ?>

                </div>
            </div>
        </section>
        <!----- Our Important Products Section ----->

        <?php require './Footer.php'; ?>


        <script src="./Resourses/JS/jquery.js"></script>
        <script src="./Resourses/JS/bootstrap.js"></script>
    </body>
</html>
