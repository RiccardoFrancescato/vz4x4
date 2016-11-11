
<?php
    $jsonurl ="";
    if(!empty($_GET["y"])){
        switch ($_GET["y"]) {
            case "2015":
                $jsonurl ="2015photos.json";
                break;
            case "2016":
                $jsonurl ="2016photos.json";
                break;
            default:
                header('HTTP/1.1 404 Not Found');
                include 'not_found.html';
                exit;
        }
    }
    $json = file_get_contents($jsonurl,0,null,null);
    $json_output = json_decode($json);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Val di Zoldo 4X4</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Arvo:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/photos.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.html#page-top">Val di Zoldo 4X4</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="index.html#about">COS'&Egrave;</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.html#services">EDIZIONI</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.html#portfolio">FOTO</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.html#contact">CONTATTI</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <section id="portfolio">
    <?php
    $json = file_get_contents($jsonurl,0,null,null);
    if($json== null){
        echo" <div class=\"header-content-inner\">
                <div class=\"row\">
                    <div class=\"col-lg-3 col-lg-offset-5 col-sm-5\">
                <div class=\"error-template\">
                    <h1>Oops!</h1>
                    <h2>Sorry no photos</h2>
                    <div class=\"error-actions\">
                        <a href=\"index.html\" class=\"btn btn-primary btn-lg\"><span class=\"glyphicon glyphicon-home\"></span>Take Me Home </a>
                    </div>
                </div>
            </div></div>
            </div>";
            exit;
    }
    ?>
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
            <?php
                $json_output = json_decode($json);                    
                foreach ( $json_output->items as $item )
                {
                    echo" <div class=\"col-lg-3 col-sm-5\">";
                    echo"<a href=\"https://drive.google.com/uc?export=view&id={$item->id}\" class=\"portfolio-box\">";
                        echo"<img src=\"https://drive.google.com/uc?export=view&id={$item->id}\" class=\"img-responsive\" alt=\"\">";
                        echo"<div class=\"portfolio-box-caption\"></div>";
                    echo"</a>";
                    echo"</div>";
                }
            ?>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

</body>

</html>
