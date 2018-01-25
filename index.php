
<!-- Page back-end -->

<?php

    /* Unknown 
     *
     * @author Tudor Micu
     * 
     * @date 25/01/2018
     * 
     * @brief A cool website.
     *      
     */

session_start( );

?>

<!-- Page front-end -->

<!-- Page head -->

<head>

    <!-- Page title -->
    <title>un joculeţ colorat</title>

    <!-- Page stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Page charset -->
    <meta charset="UTF-8">

    <!-- Page SEO -->
    <meta name="description" content="un joculeţ colorat">
    <meta name="keywords" content=""> <!-- Note: De adăugat cuvinte cheie pentru căutare. -->
    <meta name="author" content="tud777r">

</head>

<?php 

if (isset($_GET ['status']) && $_GET ['status'] == 'playing') { 

    if (!isset($_SESSION ['Score'])) {
        $_SESSION ['Score'] = 0;
    }

    if (isset($_GET ['answer']) && $_GET ['answer'] == 'true' && isset($_SESSION ['c']) && isset($_SESSION ['h']) && isset($_SESSION ['n'])) { 
        if ($_SESSION ['c'] == $_SESSION ['h'] || $_SESSION ['n'] == 1) {
            $_SESSION ['Score']++;
        }
        else {
            $_SESSION ['Score'] = 0;
            echo '<div class="container"><div class="row"><div class="col-lg-12 text-center"><br><br><br><br><br><br><a style="text-decoration:none" href="/index.php"><h1>Final de joc!</h1></a></div></div></div></body>';
            exit;
        }
    } 
    elseif (isset($_GET ['answer']) && $_GET ['answer'] == 'false' && isset($_SESSION ['c']) && isset($_SESSION ['h']) && isset($_SESSION ['n'])) { 
        if ($_SESSION ['c'] == $_SESSION ['h'] || $_SESSION ['n'] == 1) {
            $_SESSION ['Score'] = 0;
            echo '<div class="container"><div class="row"><div class="col-lg-12 text-center"><br><br><br><br><br><br><a style="text-decoration:none" href="/index.php"><h1>Final de joc!</h1></a></div></div></div></body>';
            exit;
        }
        else {
            $_SESSION ['Score']++;
        }
    }  
    elseif (isset($_GET ['answer']) && $_GET ['answer'] == 'null') { 
        $_SESSION ['Score'] = 0;
        echo '<div class="container"><div class="row"><div class="col-lg-12 text-center"><br><br><br><br><br><br><a style="text-decoration:none" href="/index.php"><h1>Final de joc!</h1></a></div></div></div></body>';
        exit;
    }  

    $_SESSION ['c'] = rand(0, 5);

    $_SESSION ['h'] = rand(0, 5);
        
    $_SESSION ['n'] = rand(0, 1);

    switch ($_SESSION ['h']) {
        case 0: $_SESSION ['hex'] = '#FF0000'; break;
        case 1: $_SESSION ['hex'] = '#0000FF'; break;
        case 2: $_SESSION ['hex'] = '#FFFF00'; break;
        case 3: $_SESSION ['hex'] = '#00FF00'; break;
        case 4: $_SESSION ['hex'] = '#FFA500'; break;
        case 5: $_SESSION ['hex'] = '#551A8B'; break;
    }

    switch ($_SESSION ['c']) {
        case 0: $_SESSION ['color'] = 'roşu'; if ($_SESSION ['n'] == 1) { $_SESSION ['hex'] = '#FF0000'; } break;
        case 1: $_SESSION ['color'] = 'albastru'; if ($_SESSION ['n'] == 1) { $_SESSION ['hex'] = '#0000FF'; } break;
        case 2: $_SESSION ['color'] = 'galben'; if ($_SESSION ['n'] == 1) { $_SESSION ['hex'] = '#FFFF00'; } break;
        case 3: $_SESSION ['color'] = 'verde'; if ($_SESSION ['n'] == 1) { $_SESSION ['hex'] = '#00FF00'; } break;
        case 4: $_SESSION ['color'] = 'portocaliu'; if ($_SESSION ['n'] == 1) { $_SESSION ['hex'] = '#FFA500'; } break;
        case 5: $_SESSION ['color'] = 'mov'; if ($_SESSION ['n'] == 1) { $_SESSION ['hex'] = '#551A8B'; } break;
    }

    echo '
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br><br><br><br><br><br>
                    <h1 style="color:' . $_SESSION ['hex'] .'">' . $_SESSION ['color'] . '</h1>
                    <a style="text-decoration:none" href="/index.php?status=playing&answer=true">corect&nbsp</a>
                    <a style="text-decoration:none" href="/index.php?status=playing&answer=false">&nbspgreşit</a>
                    <p>Scorul tău: ' . $_SESSION ['Score'] . ' punct(e).</p>
                </div>
            </div>
        </div>
    </body>
    
    ';

} else { $_SESSION ['Score'] = 0;  ?>

<!-- Page body -->

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <br><br><br><br><br><br>
                <a style="text-decoration:none" href="/index.php?status=playing"><h1>Începe!</h1></a>
            </div>
        </div>
    </div>
</body>

<!-- Page footer -->

<footer style="position:static">
    <div class="row">
        <div class="col-lg-12 text-center">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <a href="www.github.com/tud666r">un joculeţ creat de tud666r.</a>
        </div>
    </div>
</footer>

<?php } ?>

