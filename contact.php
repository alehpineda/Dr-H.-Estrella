<?php include("./config.php"); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dr Estrella | Cirujia Plástica</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, follow" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="css/fonts.css" rel="stylesheet" media="screen" />
    <link href="css/general.css" rel="stylesheet" media="screen" />
    <link href="css/content.css" rel="stylesheet" media="screen" />
    <link href="css/responsive.css" rel="stylesheet" media="screen" />

    <!-- JS Files -->
    <script src="js/jquery-1.9.1.js"></script> <!-- jQuery Library -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap Framework -->
    <script src="js/jquery.reject.js"></script> <!-- jQuery Brower Rejection -->
    <script src="js/jquery.BlackAndWhite.js"></script> <!-- jQuery Black and White Images -->
    <script src="js/template.js"></script> <!-- UNISTAR Template javascript -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="body">
<header id="header" class="container">
    <ul class="contact">
        <li><span>+52 (871) 7 12 34 56 </span></li>
        <li><a href="mailto:jdiego.hinojosa@gmail.com">info@drestrella.com</a></li>
    </ul>

    <div class="logo"><a title="" href="index.html"><img src="img/unistar-logo.png" alt=""/></a></div>

    <div id="topmenu" class="clear">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Inicio</a></li>
                    <li class="dropdown">
                        <a href="index.html" class="dropdown-toggle">Servicios<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="first"><a href="index.html">Rostro</a>
                                <ul class="dropdown-menu">
                                    <li class="first"><a href="index.html">Rostro</a></li>
                                    <li><a href="index.html">Cara</a></li>
                                    <li><a href="index.html">Levantamiento de ceja</a></li>
                                    <li><a href="index.html">Cuello</a></li>
				    <li><a href="index.html">Rinoplastia</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href="index.html">Cuerpo</a></li>
                            <li><a href="index.html">Pecho</a></li>
                            <li><a href="index.html">Piel</a></li>
                            <li><a href="index.html">Procedimiento para Hombres</a></li>
                        </ul>
                    <li><a href="index.html">Dr. Estrella</a></li>
                    <li><a href="contact.html">Contacto</a></li>
                </ul>
            </div>

            <ul class="fright lang">
                <li><a class="active" href="#">EN</a></li>
                <li><a href="#">ES</a></li>
                
            </ul>
        </nav>
    </div>
</header>

<section>
    <div id="carousel-main-wrapper" class="small theme-default hidden-xs">
        <div class="container">
            <div id="carousel-small" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/gallery/banner-contact.jpg" alt="" />
                        <div class="carousel-caption">
                            <h2>Contactanos</h2>
                            <h3>Forma de contacto e Inoformacion</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="container">
        <div class="subline">
          
            <a href="contact.html" class="more col-xs-4 col-xxs-12 pull-right"><strong>Contactanos</strong> queremos escucharte</a>
            <div class="shadow"></div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row ">
            <section class="col-sm-9 pull-left">
                <div class="boxes style4 well noradius noshadow">
                    <div class="title"><span>Comunicate</span></div>
                    <p class="tac">Estamos ansiosos por escucharte , no dudes en solicitar mas informacion enviandonos tus datos</p>

                    <form id="contact-form" class="row mt10 style1" action="#" method="post">
                        <input type="hidden" name="email_to" value="<?php echo $email_to ?>">
                        <input type="hidden" name="email_subject" value="<?php echo $email_subject ?>">

                        <div class="col-md-6">
                            <input name="name" type="text" id="name" placeholder="Nombre completo" required />
                        </div>
                        <div class="col-md-6">
                            <input name="email" type="email" id="email" placeholder="Correo electronico" required />
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" rows="7" cols="5" id="message" placeholder="Escribe tu mensaje..." required></textarea>
                            <div class="submit_btn">
                                <div class="inner">
                                    <input class="submit btn" type="submit" value="Enviar" />
                                    <input class="modal btn hidden" type="button" value="Submit" name="" data-toggle="modal" data-target="#modalBox" />
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="modal fade bs-modal-sm" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Contact form</h4>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn right" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <aside class="sidebar column col-sm-3 pull-right">
                <div class="contacts block">
                    <div class="title">Contactanos</div>
                    <div class="content well">
                        <p><strong>Empieza una nueva etapa.</p>
                        <ul class="style6">
                            <li><strong>Telefono</strong>+52(871)7123456</li>
                            <li><strong>Correo</strong><a href="#">info@drestrella.com</a></li>
                            <li><strong>Skype</strong>dr.estrella</li>
                            <li><strong>Direccion</strong>Paseo del Tecnologico 900, Villa la Rosita</li>
                            <li><strong>Celular</strong>8711678901</li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>

        <div class="map box">
            <div class="title"><span>Encuentranos</span></div>
            <div class="rel">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3600.6309451860716!2d-103.39609399999999!3d25.517352!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdb7d743337f9%3A0xf0501e5b7095d681!2sHospital+%C3%81ngeles!5e0!3m2!1sen!2smx!4v1399068221394" width="600" height="450" frameborder="0" style="border:0"></iframe>
                <div class="shadow"></div>
            </div>
            <br/>
        </div>
    </div>

    
</section>

<footer id="footer-wide">
    <div id="footer" class="container">
        <div class="">
            <div class="box1 pull-left-sm first">
                <div class="header">Suscribete para recibir nuestras promociones</div>
                <p> </p>
                <form id="newsletter" action="index.html" method="get">
                    <input class="query" type="text" value="Enter your email address" onfocus="if($(this).val()=='Enter your email address'){$(this).val('');}" onBlur="if($(this).val()==''){$(this).val('Enter your email address');}">
                    <input class="button" type="submit" value="ok" name="">
                </form>
            </div>

            <div class="box2 pull-left-sm">
                <div class="header">Contactanos</div>
                <ul>
                    <li><img src="img/icons/user.png" alt=""/>Cirujano - Dr. H. Estrella</li>
                    <li><img src="img/icons/point.png" alt=""/>Consultorio 4-Torre de Especialidades-Hospital Angeles Torreon, Torreon, Coah.</li>
                    <li><img src="img/icons/phone.png" alt=""/>+52 (871) 7123456</li>
                    <li><img src="img/icons/address.png" alt=""/><a href="#">information@drestrella.com</a></li>
                </ul>
            </div>

            <div class="box3 pull-left-sm last">
                <div class="header">Redes Sociales</div>
                <p>Siguenos y te escuchamos en cualquiera de estos medios.</p>
                <div class="addthis_toolbox addthis_default_style addthis_16x16_style">
                    <a class="addthis_button_facebook"><span><span></span></span></a>
                    <a class="addthis_button_email"><span><span></span></span></a>
                    <a class="addthis_button_twitter"><span><span></span></span></a>
                    <a class="addthis_button_google_plusone_share"><span><span></span></span></a>
                    <a class="addthis_button_in"><span><span></span></span></a>
                    <a class="addthis_button_rss"><span><span></span></span></a>
                    <a class="addthis_button_compact"><span><span></span></span></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<script>
    jQuery(function($) {
        /*$('.modal.btn').click();*/
        $("#contact-form").submit(function(){
            event.preventDefault();
            $(".modal.btn").click();
            $.ajax({
                type: "POST",
                url: "send-contact-form.php",
                data: $('#contact-form').serialize()
            }).done(function(data) {
                $(".modal-body").html(data);
            });
        });
    });
</script>

</body>
</html>