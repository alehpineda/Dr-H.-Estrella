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
        <li><span>Tel: 222-5453</span></li>
        <li><a href="mailto:contacto@drhestrella.com">contacto@drhestrella.com</a></li>
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
                    <li class="dropdown"><a href="#procedimientos" class="dropdown-toggle">Procedimientos<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="first"><a href="cuerpo.html">Contorno Corporal</a>
                                <ul class="dropdown-menu">
                                    <li class="first"><a href="cuerpo.html#abdomen">Reducción de Abdomen</a></li>
                                    <li><a href="cuerpo.html#lipo">Liposucción</a></li>
                                    <li><a href="cuerpo.html#lipoescultura">Lipoescultura</a></li>
                                </ul>
                            </li>
                            <li><a href="rostro.html">Facial</a>
                                <ul class="dropdown-menu">
                                    <li class="first"><a href="rostro.html#facial">Rejuvenecimiento Facial</a></li>
                                    <li><a href="rostro.html#parpados">Parpados</a></li>
                                    <li><a href="rostro.html#mejillas">Mejillas</a></li>
                                    <li><a href="rostro.html#orejas">Orejas</a></li>
                                    <li><a href="rostro.html#lobulos">Lobulos</a></li>
                                    <li><a href="rostro.html#labios">Labios</a></li>
                                </ul>
                            </li>
                            <li><a href="pecho.html">Pecho</a>
                                <ul class="dropdown-menu">
                                    <li class="first"><a href="pecho.html#aumento">Aumento de Busto</a></li>
                                    <li><a href="pecho.html#levantamiento">Levantamiento de Busto</a></li>
                                    <li><a href="pecho.html#reduccion">Reduccion de Busto</a></li>
                                </ul>
                            </li>
                            <li><a href="piel.html">Piel</a>
                                <ul class="dropdown-menu">
                                    <li class="first"><a href="piel.html#peeling">Exfoliación Química</a></li>
                                    <li class="first"><a href="piel.html#dermo">Dermoabrasión</a></li>
                                </ul>                            
                            </li>
                            <li><a href="nariz.html">Nariz</a>
                                <ul class="dropdown-menu">
                                    <li class="first"><a href="nariz.html#rino">Rinoplastia</a></li>
                                </ul>
                            </li>
                        </ul>
                    <li><a href="drestrella.html">Dr. Estrella</a></li>
                    <li><a href="contact.html">Contacto</a></li>
                </ul>
            </div>
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
                            <h3>Forma de contacto e Información</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="container">
        <div class="subline">
          
            <a href="contact.html" class="more col-xs-4 col-xxs-12 pull-right"><strong>Contactanos! </strong> Queremos escucharte.</a>
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
                    <p class="tac">Estamos ansiosos por escucharte, no dudes en solicitar mas información enviandonos tus datos.</p>

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
                                    <h4 class="modal-title" id="myModalLabel">Tu email se ha enviado con exito.</h4>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn right" data-dismiss="modal">Cerrar</button>
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
                            <li><strong>Telefono</strong>222-5453</li>
                            <li><strong>Correo</strong><a href="mailto:contacto@drhestrella.com">contacto@drhestrella.com</a></li>
                            <li><strong>Direccion</strong><br>Consultorio 910, Piso 9. 
                                <br>Paseo del Tecnologico No. 909. 
                                <br>Col. Residencial Tecnologico.
                                <br>Torreón, Coah.
                            </li>
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
                    <input class="query" type="text" value="Ingresa tu Email" onfocus="if($(this).val()=='Ingresa tu email'){$(this).val('');}" onBlur="if($(this).val()==''){$(this).val('Ingresa tu email');}">
                    <input class="button" type="submit" value="ok" name="">
                </form>
            </div>

            <div class="box2 pull-left-sm">
                <div class="header">Contactanos</div>
                <ul>
                    <li><img src="img/icons/user.png" alt=""/>Dr. Héctor Israel Estrella Camorlinga</li>
                    <li> Cirugía Plástica Estética 
                        y Reconstructiva</li>
                    <li><img src="img/icons/point.png" alt=""/> Consultorio 910, Piso 9
                        <br>Paseo del Tecnologico #909
                        <br>Hospital Angeles. Torreón, Coah.</li>
                    <li><img src="img/icons/phone.png" alt=""/>222-5453</li>
                    <li><img src="img/icons/address.png" alt=""/><a href="mailto:contacto@drhestrella.com">contacto@drhestrella.com</a></li>
                </ul>
            </div>

            <div class="box3 pull-left-sm last">
                <div class="header">Redes Sociales</div>
                <p>Siguenos y te escuchamos en cualquiera de estos medios.</p>
                <div class="addthis_toolbox addthis_default_style addthis_16x16_style">
                    <a class="addthis_button_facebook"><span><span></span></span></a>
                    <a class="addthis_button_email"><span><span></span></span></a>
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