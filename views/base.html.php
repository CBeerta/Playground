<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Claus Beerta - <?php echo $title; ?></title>
  <meta name="description" content="Claus Beerta">
  <meta name="author" content="Claus Beerta">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="public/favicon.png">

  <link rel="stylesheet" href="public/css/style.css?v=2">
  <script src="public/js/libs/modernizr-1.7.min.js"></script>

</head>

<body>

  <div id="container">
    <header>
        <div id="logo">
          <h1><a href="<?php echo url_for(); ?>">Claus Beerta</a></h1>
          <h2>Stuff i do, don't and other babble.</h2>
        </div>
    </header>
    <!-- end div#header -->
    <div id="menu">
    <ul>
      <li class="active"><a href="<?php echo url_for('projects'); ?>">Projects</a></li>
      <li><a href="<?php echo url_for('photography'); ?>">Photography</a></li>
      <li><a href="<?php echo url_for('blog'); ?>">Blog</a></li>
      <li><a href="<?php echo url_for('contact'); ?>">Contact</a></li>
    </ul>
    </div>
    <!-- end div#menu -->
    <div id="splash"><img src="public/header-images/<?php echo randomHeaderImage('header-images/'); ?>" width="940" height="255" alt="" /></div>
    
    <div id="main" role="main">
        <div id="content">
            <?php echo $content; ?>
        </div>

    <sidebar>
        <ul>
          <!--li id="search">
            <h2>Search</h2>
            <form method="get" action="">
              <fieldset>
                <input type="text" id="search-text" name="s" value="" />
                <input type="submit" id="search-submit" value="Search" />
              </fieldset>
            </form>
          </li-->
          <li>

            <h2>Github Projects</h2>
            <ul class="github">
              <!--li><a href="#">Eget tempor eget nonummy</a></li-->
            </ul>
            
            <h2>Flickr Fotostream</h2>
                <!-- Start of Flickr Badge --> 
                <div id="flickr_badge_uber_wrapper"> 
                  <div id="flickr_badge_wrapper"> 
                    <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=5&display=latest&size=t&layout=x&source=user&user=46080991%40N07"></script> 
                  </div> 
                </div> 
                <!-- End of Flickr Badge -->             

          </li>
        </ul>
    </sidebar>

    </div>

    <div class="clearfix"></div>

    <footer>
    <p>Copyright &copy; 2000 - <?php echo date('Y'); ?> Claus Beerta. All Rights Reserved. </p>
    <!--p id="links"><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p-->
    </footer>
  </div> <!-- eo #container -->


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='public/js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script src="public/js/plugins.js"></script>
  <script src="public/js/script.js"></script>
  <!-- end scripts-->


  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");</script>
  <![endif]-->

</body>
</html>
