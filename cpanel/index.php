<!DOCTYPE html>
<html lang="en-us">

    <head>

        <meta charset="utf-8">
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Singelgolfs Kontrollpanel">
        <meta name="author" content="Jocke the Webmaster">
        <meta name="keywords" content="Singelgolfs Kontrollpanel">

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

        <title>Kontrollpanelen</title>

     
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
       
        <link rel="stylesheet" href="css/style.css">
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">

        <script src='http://code.jquery.com/jquery-1.11.1.min.js'></script>
      
        <script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
   
        <script src='http://cdnjs.cloudflare.com/ajax/libs/wow/1.0.2/wow.min.js'></script>
    
        <script src='js/scrollIt.min.js'></script>

        <script src='js/custom.js'></script>

        <script src='js/smoothwheel.js'></script>

    </head>

    <body>
        <!-- FIXED SIDEBAR -->
        <section class="col-lg-3 col-md-4 nopadding" id="intro">
            <div id="profile">
                <img class="img-responsive img-circle" src="img/leif.jpg" alt="Kung Tung">
                <h2>Singelgolfs Kontrollpanel</h2><br /><br /><br />
               
               

                <!-- NAVIGATION MENU -->
                <nav id="sidebar">
                    <ul class="sidebar-nav flexbox">
                        <li>
                            <a href="#about" data-scroll-nav="1">
                                <span class="icon"><i class="fa fa-home fa-lg fa-fw"></i></span>
                                <span class="option hidden-xs">Start</span>
                            </a>
                        </li>
                        <li>
                            <a href="#members" data-scroll-nav="2">
                                <span class="icon"><i class="fa fa-user fa-lg fa-fw"></i></span>
                                <span class="option hidden-xs">Medlemmar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#events" data-scroll-nav="3">
                                <span class="icon"><i class="fa fa-cloud fa-lg fa-fw"></i></span>
                                <span class="option hidden-xs">Resor</span>
                            </a>
                        </li>
                        <li>
                            <a href="#gallery" data-scroll-nav="4">
                                <span class="icon"><i class="fa fa-film fa-lg fa-fw"></i></span>
                                <span class="option hidden-xs">Bildarkivet</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>

        <!-- CONTENT -->
        <div class="col-lg-9 col-lg-offset-3 col-md-8 col-md-offset-4 nopadding" id="content">

            <!-- ABOUT -->
            <section id="about" data-scroll-index="1">
                <div class="section-container row nomargin">
                    <div class="col-lg-9 col-md-12">
                        <h2 class="wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="1.5s"> Kontrollpanelen </h2>
                        <p class="wow fadeIn" data-wow-delay="1.5s" data-wow-duration="2s"> Nya Singelgolf<p>
                    </div>
                </div>
            </section>

            <!-- MEMBERS -->
            <section id="members" data-scroll-index="2">
               <?php include("pages/members.php");?>
            </section>

            <!-- EVENTS -->
            <section id="events" data-scroll-index="3">
                <?php include("pages/events.php");?>
            </section>

            <!-- GALLERY -->
            <section id="gallery" data-scroll-index="4">
               <?php include("pages/gallery.php");?>
            </section>

            <!-- FOOTER -->
            <section class="hidden-lg hidden-md" id="footer">
                <div class="row nomargin">
                    <a id="scrollTop" href="#content"><h4 class="wow fadeIn" data-wow-delay="0.25s" data-wow-duration="0.75s"><i class="fa fa-hand-o-up fa-fw fa-lg"></i>Till toppen</h4></a>
                </div>
            </section>

        </div>

    </body>

</html>
