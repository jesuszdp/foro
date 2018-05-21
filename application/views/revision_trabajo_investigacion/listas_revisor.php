<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Foro</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../public/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <!-- CSS Global -->
    <link href="../public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="../public/assets/plugins/owlcarousel2/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../public/assets/plugins/owlcarousel2/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../public/assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="../public/assets/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="../public/assets/plugins/countdown/jquery.countdown.css" rel="stylesheet">

    <link href="../public/assets/css/theme.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="assets/plugins/iesupport/html5shiv.js"></script>
    <script src="assets/plugins/iesupport/respond.min.js"></script>
    <![endif]-->
</head>
<body id="home" class="wide body-light">

  <!-- Preloader -->
  <div id="preloader">
      <div id="status">
          <div class="spinner"></div>
      </div>
  </div>

  <!-- Wrap all content -->
  <div class="wrapper">

    <!-- HEADER -->
    <header class="header fixed">
        <div class="container">
            <div class="header-wrapper clearfix">

            <!-- Logo -->
            <div class="logo">
                <a href="#home" class="scroll-to">
                  <img src="../public/assets/img/logo_foro_naranja.png" alt="" height="50px">
                    <!-- <span class="fa-stack">
                        <i class="fa logo-hex fa-stack-2x"></i>
                        <i class="fa logo-fa fa-map-marker fa-stack-1x"></i>
                    </span> -->
                </a>
            </div>
            <!-- /Logo -->

            <!-- Navigation -->
            <div id="mobile-menu"></div>
            <nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle btn"><i class="fa fa-bars"></i></a>
                <ul class="sf-menu nav" >
                    <li class=""><a href="#">Inicio</a></li>
                    <!-- <li><a href="#">Nuevo Registro</a></li>
                    <li><a href="#">Etapas con retraso</a></li>
                    <li><a href="#">Rechazados</a></li> -->
                    <li class="active"><a href="#">Trabajos de investigación</a></li>
                    <li><a href="#">Ayuda</a></li>

                    <li><a href="index.html">Cerrar sesión</a></li>
                    <!-- <li><a href="#price">Price</a></li>
                    <li><a href="#location">Location</a></li>
                    <li><a href="blog.html">Blog</a></li> -->
                </ul>
            </nav>
            <!-- /Navigation -->

            </div>
        </div>
    </header>
    <!-- /HEADER -->

      <!-- Content area -->
      <div class="content-area">
            <!-- PAGE SCHEDULE -->
          <section class="page-section light" id="schedule">
              <div class="container">
                <br><br>
                <br>
                  <div class="row">
                      <div class="col-md-8 pull-left">
                          <h1 class="section-title">
                              <span data-animation="flipInY" data-animation-delay="300" class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-connectdevelop"></i></span></span>
                              <span data-animation="fadeInRight" data-animation-delay="500" class="title-inner">Gestor</span>
                          </h1>
                      </div>
                      <!-- <div class="col-md-4 text-right-md pull-right">
                          <a href="#" class="btn btn-theme btn-theme-lg btn-theme-transparent-grey pull-right"
                             data-animation="flipInY" data-animation-delay="300"><i class="fa fa-print"></i> Download Schedule</a>
                      </div> -->
                  </div>

                  <!-- Schedule -->
                  <div class="schedule-wrapper clear" data-animation="fadeIn" data-animation-delay="200">
                      <div class="schedule-tabs lv1">
                          <ul id="tabs-lv1"  class="nav nav-justified">
                              <li class="active"><a href="#tab-first" data-toggle="tab"><strong>Sin comité</strong> <br/></a></li>
                              <li><a href="#tab-atencion" data-toggle="tab"><strong>Requiere atención</strong> <br/></a></li>
                              <li><a href="#tab-second" data-toggle="tab"><strong>En revisión</strong> <br/></a></li>

                              <li><a href="#tab-last" data-toggle="tab"><strong>Revisados</strong></a></li>
                                <li><a href="#tab-third" data-toggle="tab"><strong>Aceptados</strong> <br/></a></li>
                              <li><a href="#tab-five" data-toggle="tab"><strong>Rechazados</strong> <br/></a></li>
                          </ul>
                      </div>

                      <div class="tab-content lv1">
                          <!-- tab1 -->

                          <div id="tab-first" class="tab-pane fade in active">
                              <!-- <div class="schedule-tabs lv2">
                                  <ul id="tabs-lv21"  class="nav nav-justified">
                                      <li class="active"><a href="#tab-lv21-first" data-toggle="tab">HAll A</a></li>
                                      <li><a href="#tab-lv21-second" data-toggle="tab">HAll B</a></li>
                                      <li><a href="#tab-lv21-third" data-toggle="tab">HAll C</a></li>
                                      <li><a href="#tab-lv21-last" data-toggle="tab">HAll D</a></li>
                                  </ul>
                              </div> -->
                              <div class="tab-content lv2">
                                  <div id="tab-lv21-first" class="tab-pane fade in active">
                                      <div class="timeline">
                                          <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal"> <a  style="color:#fff;">Asignar</a> </button>
                                          <br>

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <!-- <th scope="col">Estatus</th> -->
                                                <!-- <th scope="col">Fecha de asignación</th>
                                                <th scope="col">Fecha de conclusión</th> -->
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td>
                                                <td scope="row">12285311F1</td>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <!-- <td>Sin comité</td> -->
                                                <!-- <td>05/06/2018</td>
                                                <td>05/06/2018</td> -->
                                                <td>
                                                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <!-- <td>Sin comité</td> -->
                                                <!-- <td>05/06/2018</td>
                                                <td>05/06/2018</td> -->
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <!-- <td>Sin comité</td> -->
                                                <!-- <td>05/06/2018</td>
                                                <td>05/06/2018</td> -->
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>

                                    </div>
                                  </div>
                                  <div id="tab-lv21-second" class="tab-pane fade">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Fecha de registro</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                    <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Evaluar</button> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>

                                      </div>
                                  </div>
                                  <div id="tab-lv21-third" class="tab-pane fade">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Fecha de registro</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>
                                      </div>
                                  </div>
                                  <div id="tab-lv21-last" class="tab-pane fade">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Fecha de registro</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div id="tab-atencion" class="tab-pane fade in active">
                              <!-- <div class="schedule-tabs lv2">
                                  <ul id="tabs-lv21"  class="nav nav-justified">
                                      <li class="active"><a href="#tab-lv21-first" data-toggle="tab">HAll A</a></li>
                                      <li><a href="#tab-lv21-second" data-toggle="tab">HAll B</a></li>
                                      <li><a href="#tab-lv21-third" data-toggle="tab">HAll C</a></li>
                                      <li><a href="#tab-lv21-last" data-toggle="tab">HAll D</a></li>
                                  </ul>
                              </div> -->
                              <div class="tab-content lv2">
                                  <div id="tab-lv21-first" class="tab-pane fade in active">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">Estatus R1</th>
                                                <th scope="col">Estatus R2</th>
                                                  <th scope="col">Estatus R3</th>
                                                    <th scope="col">Número de revisiones</th>
                                                <!-- <th scope="col">Fecha de asignación</th>
                                                <th scope="col">Fecha de conclusión</th> -->
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>Se agotó el tiempo</td>
                                                <td>Se agotó el tiempo</td>
                                                <td>Se agotó el tiempo</td>
                                                  <td>2</td>
                                                <!-- <td>05/06/2018</td>
                                                <td>05/06/2018</td> -->
                                                <td>
                                                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver trabajo</button>
                                                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Discrepancia</td>
                                                <td>Conflicto de interes</td>
                                                <td>Se agotó el tiempo</td>
                                                <td>5</td>

                                                <!-- <td>05/06/2018</td>
                                                <td>05/06/2018</td> -->
                                                <td>
                                                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver trabajo</button>
                                                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Conflicto de interés</td>
                                                <td>Se agotó el tiempo</td>
                                                <td>Se agotó el tiempo</td>
                                                <td>8</td>

                                                <!-- <td>05/06/2018</td>
                                                <td>05/06/2018</td> -->
                                                <td>
                                                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver trabajo</button> <br>
                                                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>

                                    </div>
                                  </div>
                                  <div id="tab-lv21-second" class="tab-pane fade">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Fecha de registro</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                    <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Evaluar</button> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>

                                      </div>
                                  </div>
                                  <div id="tab-lv21-third" class="tab-pane fade">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Fecha de registro</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>
                                      </div>
                                  </div>
                                  <div id="tab-lv21-last" class="tab-pane fade">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Fecha de registro</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general: ¿terminal o propedéutica?</td>
                                                <td>05/06/2018</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver</button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- tab2 -->
                          <div id="tab-second" class="tab-pane fade">
                              <!-- <div class="schedule-tabs lv2">
                                  <ul id="tabs-lv22"  class="nav nav-justified">
                                      <li class="active"><a href="#tab-lv22-first" data-toggle="tab">HAll A</a></li>
                                      <li><a href="#tab-lv22-second" data-toggle="tab">HAll B</a></li>
                                      <li><a href="#tab-lv22-third" data-toggle="tab">HAll C</a></li>
                                      <li><a href="#tab-lv22-last" data-toggle="tab">HAll D</a></li>
                                  </ul>
                              </div> -->
                              <div class="tab-content lv2">
                                  <div id="tab-lv22-first" class="tab-pane fade in active">
                                      <div class="timeline">
                                        <h4> <b>Nota:</b> La fecha debajo del nombre del revisor es la fecha límite de evaluación. </h4>
                                        <br>


                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">R1</th>
                                                <th scope="col">R2</th>
                                                <th scope="col">R3</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>Luis Eduardo <br> 05/06/2018</td>
                                                <td>Jesus Zoe <br> Concluido</td>
                                                <td>MArio Perez <br> 05/06/2018</td>
                                                <td>
                                                  <a class="col-sm-1 btn btn-theme btn-block submit-button" href="detalle_trabajo_gestor.html">Ver trabajo</a>
                                                  <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Reasignar</button> -->

                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Luis Eduardo <br> 05/06/2018</td>
                                                <td>Jesus Zoe <br> Concluido</td>
                                                <td>MArio Perez <br> 05/06/2018</td>
                                                <td>
                                                  <a class="col-sm-1 btn btn-theme btn-block submit-button" href="detalle_trabajo_gestor.html">Ver trabajo</a>
                                                  <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Reasignar</button> -->

                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Luis Eduardo <br> 05/06/2018</td>
                                                <td>Jesus Zoe <br> Concluido</td>
                                                <td>MArio Perez <br> 05/06/2018</td>
                                                <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="detalle_trabajo_gestor.html">Ver trabajo</a>
                                                  <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Reasignar</button> -->

                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>

                                      </div>
                                  </div>
                                  <div id="tab-lv22-second" class="tab-pane fade">
                                      <div class="timeline">

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-2.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-3.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-4.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                      </div>
                                  </div>
                                  <div id="tab-lv22-third" class="tab-pane fade">
                                      <div class="timeline">

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-3.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-4.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                      </div>
                                  </div>
                                  <div id="tab-lv22-last" class="tab-pane fade">
                                      <div class="timeline">

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-2.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-3.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- tab3 -->
                          <div id="tab-third" class="tab-pane fade">
                              <!-- <div class="schedule-tabs lv2">
                                  <ul id="tabs-lv23"  class="nav nav-justified">
                                      <li class="active"><a href="#tab-lv23-first" data-toggle="tab">Aceptados</a></li>
                                      <li><a href="#tab-lv23-second" data-toggle="tab">En discrepancia</a></li>
                                      <li><a href="#tab-lv23-third" data-toggle="tab">Rechazados</a></li>
                                      <li><a href="#tab-lv23-last" data-toggle="tab">HAll D</a></li>
                                  </ul>
                              </div> -->
                              <div class="tab-content lv2">
                                  <div id="tab-lv23-first" class="tab-pane fade in active">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">Tipo de exposición</th>
                                                <th scope="col">Puntaje</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>Oratoria</td>
                                                <td>90</td>
                                                <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Oratoria</td>

                                                <td>95</td>
                                                <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Oratoria</td>

                                                <!-- <td>Mario Perez</td> -->
                                                <td>80</td>
                                                <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>


                                      </div>
                                  </div>
                                  <div id="tab-lv23-second" class="tab-pane fade">
                                      <div class="timeline">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">Estatus</th>
                                                <th scope="col">Fecha de asignación</th>
                                                <th scope="col">Fecha de conclusión</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>En discrepancia</td>
                                                <td>05/06/2018</td>
                                                <td>05/06/2018</td>
                                                <td><a href="#">Ver</a> &nbsp  &nbsp
                                                    <a href="#">Asignar R3</a>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>En discrepancia</td>
                                                <td>05/06/2018</td>
                                                <td>05/06/2018</td>
                                                <td><a href="#">Ver</a> &nbsp  &nbsp
                                                      <a href="#">Asignar R3</a>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>En discrepancia</td>
                                                <td>05/06/2018</td>
                                                <td>05/06/2018</td>
                                                <td><a href="#">Ver</a> &nbsp  &nbsp
                                                        <a href="#">Asignar R3</a>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>




                                      </div>
                                  </div>
                                  <div id="tab-lv23-third" class="tab-pane fade">
                                      <div class="timeline">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">R1</th>
                                                <th scope="col">R2</th>
                                                <th scope="col">R3</th>
                                                <!-- <th scope="col">Fecha de asignación</th> -->
                                                <th scope="col">Fecha de conclusión</th>
                                                <th scope="col">Puntaje</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>Juan Cuadros</td>
                                                <td>Maria Juarez</td>
                                                <td>Mario Perez</td>
                                                <!-- <td>05/06/2018</td> -->
                                                <td>05/06/2018</td>

                                                <td>90</td>
                                                <td><a href="#">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Juan Cuadros</td>
                                                <td>Maria Juarez</td>
                                                <td>N/A</td>
                                                <!-- <td>05/06/2018</td> -->
                                                <td>05/06/2018</td>
                                                <td>95</td>
                                                <td><a href="#">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Juan Cuadros</td>
                                                <td>Maria Juarez</td>
                                                <td>N/A</td>

                                                <!-- <td>05/06/2018</td> -->
                                                <td>05/06/2018</td>
                                                <!-- <td>Mario Perez</td> -->
                                                <td>80</td>
                                                <td><a href="#">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>
                                      </div>
                                  </div>
                                  <div id="tab-lv23-last" class="tab-pane fade"><div class="timeline">

                                      <article class="post-wrap">
                                          <div class="media">
                                              <!-- -->
                                              <div class="post-media pull-left">
                                                  <img src="assets/img/preview/avatar-v2-1.jpg" alt="" class="media-object" />
                                              </div>
                                              <!-- -->
                                              <div class="media-body">
                                                  <div class="post-header">
                                                      <div class="post-meta">
                                                          <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                          <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                          </a>
                                                      </div>
                                                      <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                  </div>
                                                  <div class="post-body">
                                                      <div class="post-excerpt">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                      </div>
                                                  </div>
                                                  <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> <strong>John Doe</strong> / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                  </div>
                                              </div>
                                              <!-- -->
                                          </div>
                                      </article>

                                      <article class="post-wrap">
                                          <div class="media">
                                              <!-- -->
                                              <div class="post-media pull-left">
                                                  <img src="assets/img/preview/avatar-v2-2.jpg" alt="" class="media-object" />
                                              </div>
                                              <!-- -->
                                              <div class="media-body">
                                                  <div class="post-header">
                                                      <div class="post-meta">
                                                          <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                          <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                          </a>
                                                      </div>
                                                      <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                  </div>
                                                  <div class="post-body">
                                                      <div class="post-excerpt">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                      </div>
                                                  </div>
                                                  <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                  </div>
                                              </div>
                                              <!-- -->
                                          </div>
                                      </article>

                                      <article class="post-wrap">
                                          <div class="media">
                                              <!-- -->
                                              <div class="post-media pull-left">
                                                  <img src="assets/img/preview/avatar-v2-3.jpg" alt="" class="media-object" />
                                              </div>
                                              <!-- -->
                                              <div class="media-body">
                                                  <div class="post-header">
                                                      <div class="post-meta">
                                                          <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                          <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                          </a>
                                                      </div>
                                                      <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                  </div>
                                                  <div class="post-body">
                                                      <div class="post-excerpt">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                      </div>
                                                  </div>
                                                  <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                  </div>
                                              </div>
                                              <!-- -->
                                          </div>
                                      </article>

                                      <article class="post-wrap">
                                          <div class="media">
                                              <!-- -->
                                              <div class="post-media pull-left">
                                                  <img src="assets/img/preview/avatar-v2-4.jpg" alt="" class="media-object" />
                                              </div>
                                              <!-- -->
                                              <div class="media-body">
                                                  <div class="post-header">
                                                      <div class="post-meta">
                                                          <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                          <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                          </a>
                                                      </div>
                                                      <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                  </div>
                                                  <div class="post-body">
                                                      <div class="post-excerpt">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                      </div>
                                                  </div>
                                                  <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                  </div>
                                              </div>
                                              <!-- -->
                                          </div>
                                      </article>

                                  </div></div>
                              </div>
                          </div>
                          <!-- tab4 -->
                          <div id="tab-last" class="tab-pane fade">
                              <!-- <div class="schedule-tabs lv2">
                                  <ul id="tabs-lv24"  class="nav nav-justified">
                                      <li class="active"><a href="#tab-lv24-first" data-toggle="tab">HAll A</a></li>
                                      <li><a href="#tab-lv24-second" data-toggle="tab">HAll B</a></li>
                                      <li><a href="#tab-lv24-third" data-toggle="tab">HAll C</a></li>
                                      <li><a href="#tab-lv24-last" data-toggle="tab">HAll D</a></li>
                                  </ul>
                              </div> -->

                              <div class="tab-content lv2">
                                  <div id="tab-lv24-first" class="tab-pane fade in active">
                                      <div class="timeline">
                                        <div class="col-sm-12">

                                        <div class="col-sm-3">
                                          <h3> Lugares para Oratoria</h3><br>
                                          <h3>10 / 20</h3>
                                        </div>
                                        <div class="col-sm-3">
                                          <h3> Lugares para Oratoria</h3><br>
                                          <h3>10 / 20</h3>

                                        </div>
                                        <!-- <div class="col-sm-3">

                                        </div> -->
                                        </div>

                                        <div class="col-sm-12">
                                          <div class="col-sm-1">

                                          </div>
                                        <div class="col-sm-3">
                                          <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Sugerir dictamen</a> </button>

                                        </div>
                                        <div class="col-sm-3">
                                          <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Guardar cambio</a> </button>

                                        </div>
                                        <div class="col-sm-3">
                                          <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Cerrar proceso</a> </button>

                                        </div>
                                        </div>
                                        <br>


                                        <br>
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <!-- <th scope="col"></th> -->
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">R1</th>
                                                <th scope="col">R2</th>
                                                <th scope="col">R3</th>
                                                <!-- <th scope="col">Fecha de asignación</th> -->
                                                <!-- <th scope="col">Fecha de conclusión</th> -->
                                                <th scope="col">Puntaje</th>
                                                <th>Propuesta de dictamen</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <!-- <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td> -->
                                                <td scope="row">12285311F1</td>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>Juan Cuadros< <br> Cartel </td>
                                                <td>Maria Juarez <br> Cartel </td>
                                                <td>Mario Perez <br> Cartel</td>
                                                <!-- <td>05/06/2018</td> -->
                                                <!-- <td>05/06/2018</td> -->

                                                <td>90</td>
                                                  <td>Aceptado para exposición con cartel</td>
                                                <td>
                                                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <!-- <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td> -->
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Juan Cuadros< <br> Cartel </td>
                                                <td>Maria Juarez <br> Cartel</td>
                                                <td>N/A</td>
                                                <!-- <td>05/06/2018</td> -->
                                                <!-- <td>05/06/2018</td> -->
                                                <td>95</td>
                                                    <td>Aceptado para oratoria</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <!-- <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td> -->
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Santiago valladolid <br> Cartel </td>
                                                <td>Mario Juarez <br> Cartel</td>
                                                <td>N/A</td>
                                                <!-- <td>05/06/2018</td> -->
                                                <td>80</td>
                                                <td>Aceptado para oratoria</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <!-- <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td> -->
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Antonio Flores <br> Cartel</td>
                                                <td>Cristian Matias <br> Cartel</td>
                                                <td>N/A</td>
                                                <td>50</td>
                                                <td>Aceptado para oratoria</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <!-- <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td> -->
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Antonio Flores</td>
                                                <td>Cristian Matias</td>
                                                <td>N/A</td>
                                                <td>20</td>
                                                <td>Aceptado para oratoria</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                                                </td>
                                              </tr>
                                              <tr>
                                                <!-- <td>
                                                  <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  </div>
                                                </td> -->
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Antonio Flores</td>
                                                <td>Cristian Matias</td>
                                                <td>N/A</td>
                                                <td>100</td>
                                                <td>Rechazado</td>
                                                <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>



                                      </div>
                                  </div>
                                  <div id="tab-lv24-second" class="tab-pane fade">
                                      <div class="timeline">

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-3.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-4.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                      </div>
                                  </div>
                                  <div id="tab-lv24-third" class="tab-pane fade">
                                      <div class="timeline">

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-2.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-3.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                      </div>
                                  </div>
                                  <div id="tab-lv24-last" class="tab-pane fade">
                                      <div class="timeline">

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-1.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> <strong>John Doe</strong> / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-2.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-3.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                          <article class="post-wrap">
                                              <div class="media">
                                                  <!-- -->
                                                  <div class="post-media pull-left">
                                                      <img src="assets/img/preview/avatar-v2-4.jpg" alt="" class="media-object" />
                                                  </div>
                                                  <!-- -->
                                                  <div class="media-body">
                                                      <div class="post-header">
                                                          <div class="post-meta">
                                                              <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                              <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                              </a>
                                                          </div>
                                                          <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                      </div>
                                                      <div class="post-body">
                                                          <div class="post-excerpt">
                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                          </div>
                                                      </div>
                                                      <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                      </div>
                                                  </div>
                                                  <!-- -->
                                              </div>
                                          </article>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- tab3 -->
                          <div id="tab-five" class="tab-pane fade">
                              <!-- <div class="schedule-tabs lv2">
                                  <ul id="tabs-lv23"  class="nav nav-justified">
                                      <li class="active"><a href="#tab-lv23-first" data-toggle="tab">Aceptados</a></li>
                                      <li><a href="#tab-lv23-second" data-toggle="tab">En discrepancia</a></li>
                                      <li><a href="#tab-lv23-third" data-toggle="tab">Rechazados</a></li>
                                      <li><a href="#tab-lv23-last" data-toggle="tab">HAll D</a></li>
                                  </ul>
                              </div> -->
                              <div class="tab-content lv2">
                                  <div id="tab-lv23-first" class="tab-pane fade in active">
                                      <div class="timeline">

                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">Tipo de exposición</th>
                                                <th scope="col">Puntaje</th>
                                                <th scope="col">Motivo</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>Oratoria</td>
                                                <td>90</td>
                                                <td>Tema relacionado</td>
                                                <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Oratoria</td>

                                                <td>95</td>
                                                <td>Tema relacionado</td>

                                                <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Oratoria</td>

                                                <!-- <td>Mario Perez</td> -->
                                                <td>80</td>
                                                <td>Tema relacionado</td>

                                                <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>

                                      </div>
                                  </div>
                                  <div id="tab-lv23-second" class="tab-pane fade">
                                      <div class="timeline">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">Estatus</th>
                                                <th scope="col">Fecha de asignación</th>
                                                <th scope="col">Fecha de conclusión</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>En discrepancia</td>
                                                <td>05/06/2018</td>
                                                <td>05/06/2018</td>
                                                <td><a href="#">Ver</a> &nbsp  &nbsp
                                                    <a href="#">Asignar R3</a>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>En discrepancia</td>
                                                <td>05/06/2018</td>
                                                <td>05/06/2018</td>
                                                <td><a href="#">Ver</a> &nbsp  &nbsp
                                                      <a href="#">Asignar R3</a>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>En discrepancia</td>
                                                <td>05/06/2018</td>
                                                <td>05/06/2018</td>
                                                <td><a href="#">Ver</a> &nbsp  &nbsp
                                                        <a href="#">Asignar R3</a>
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>
                                      </div>
                                  </div>
                                  <div id="tab-lv23-third" class="tab-pane fade">
                                      <div class="timeline">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Folio</th>
                                                <th scope="col">Título</th>
                                                <th scope="col">Metodología</th>
                                                <th scope="col">R1</th>
                                                <th scope="col">R2</th>
                                                <th scope="col">R3</th>
                                                <!-- <th scope="col">Fecha de asignación</th> -->
                                                <th scope="col">Fecha de conclusión</th>
                                                <th scope="col">Puntaje</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">12285311F1</th>
                                                <td>La medicina general?</td>
                                                <td>cualitativo</td>
                                                <td>Juan Cuadros</td>
                                                <td>Maria Juarez</td>
                                                <td>Mario Perez</td>
                                                <!-- <td>05/06/2018</td> -->
                                                <td>05/06/2018</td>

                                                <td>90</td>
                                                <td><a href="#">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F2</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Juan Cuadros</td>
                                                <td>Maria Juarez</td>
                                                <td>N/A</td>
                                                <!-- <td>05/06/2018</td> -->
                                                <td>05/06/2018</td>
                                                <td>95</td>
                                                <td><a href="#">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">12285311F3</th>
                                                <td>La medicina general</td>
                                                <td>cualitativo</td>
                                                <td>Juan Cuadros</td>
                                                <td>Maria Juarez</td>
                                                <td>N/A</td>

                                                <!-- <td>05/06/2018</td> -->
                                                <td>05/06/2018</td>
                                                <!-- <td>Mario Perez</td> -->
                                                <td>80</td>
                                                <td><a href="#">Ver</a>
                                                    <!-- <a href="#">Evaluar</a> -->
                                                </td>
                                              </tr>
                                            </tbody>
                                            </table>
                                      </div>
                                  </div>
                                  <div id="tab-lv23-last" class="tab-pane fade"><div class="timeline">

                                      <article class="post-wrap">
                                          <div class="media">
                                              <!-- -->
                                              <div class="post-media pull-left">
                                                  <img src="assets/img/preview/avatar-v2-1.jpg" alt="" class="media-object" />
                                              </div>
                                              <!-- -->
                                              <div class="media-body">
                                                  <div class="post-header">
                                                      <div class="post-meta">
                                                          <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                          <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                          </a>
                                                      </div>
                                                      <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                  </div>
                                                  <div class="post-body">
                                                      <div class="post-excerpt">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                      </div>
                                                  </div>
                                                  <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> <strong>John Doe</strong> / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                  </div>
                                              </div>
                                              <!-- -->
                                          </div>
                                      </article>

                                      <article class="post-wrap">
                                          <div class="media">
                                              <!-- -->
                                              <div class="post-media pull-left">
                                                  <img src="assets/img/preview/avatar-v2-2.jpg" alt="" class="media-object" />
                                              </div>
                                              <!-- -->
                                              <div class="media-body">
                                                  <div class="post-header">
                                                      <div class="post-meta">
                                                          <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                          <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                          </a>
                                                      </div>
                                                      <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                  </div>
                                                  <div class="post-body">
                                                      <div class="post-excerpt">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                      </div>
                                                  </div>
                                                  <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                  </div>
                                              </div>
                                              <!-- -->
                                          </div>
                                      </article>

                                      <article class="post-wrap">
                                          <div class="media">
                                              <!-- -->
                                              <div class="post-media pull-left">
                                                  <img src="assets/img/preview/avatar-v2-3.jpg" alt="" class="media-object" />
                                              </div>
                                              <!-- -->
                                              <div class="media-body">
                                                  <div class="post-header">
                                                      <div class="post-meta">
                                                          <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                          <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                          </a>
                                                      </div>
                                                      <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                  </div>
                                                  <div class="post-body">
                                                      <div class="post-excerpt">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                      </div>
                                                  </div>
                                                  <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                  </div>
                                              </div>
                                              <!-- -->
                                          </div>
                                      </article>

                                      <article class="post-wrap">
                                          <div class="media">
                                              <!-- -->
                                              <div class="post-media pull-left">
                                                  <img src="assets/img/preview/avatar-v2-4.jpg" alt="" class="media-object" />
                                              </div>
                                              <!-- -->
                                              <div class="media-body">
                                                  <div class="post-header">
                                                      <div class="post-meta">
                                                          <span class="post-date"><i class="fa fa-clock-o"></i> 08:00 - 08:45</span>
                                                          <a href="#" class="pull-right">
                                                                  <span class="fa-stack fa-lg">
                                                                      <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                      <i class="fa fa-stack-1x fa-share-alt"></i>
                                                                  </span>
                                                          </a>
                                                      </div>
                                                      <h2 class="post-title"><a href="#">Speaker Content Header Is Header</a></h2>
                                                  </div>
                                                  <div class="post-body">
                                                      <div class="post-excerpt">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam metus. Donec cursus magna eget sem convallis facilisis. Vestibulum dictum nibh at ullamcorper tincidunt. Phasellus scelerisque nisl non ullamcorper pellentesque. Nunc sagittis, felis in feugiat mollis, libero eros consectetur elit non cursus lacus nisl at dolor.</p>
                                                      </div>
                                                  </div>
                                                  <div class="post-footer">
                                                          <span class="post-readmore">
                                                              <i class="fa fa-microphone"></i> John Doe / CEO at Crown.io
                                                              <a href="#"><i class="fa fa-facebook"></i></a>
                                                              <a href="#"><i class="fa fa-twitter"></i></a>
                                                              <a href="#"><i class="fa fa-linkedin"></i></a>
                                                              <a href="#"><i class="fa fa-instagram"></i></a>
                                                          </span>
                                                  </div>
                                              </div>
                                              <!-- -->
                                          </div>
                                      </article>

                                  </div></div>
                              </div>
                          </div>
                          <!-- tab4 -->
                      </div>
                  </div>
                  <!-- /Schedule -->

              </div>
          </section>
          <!-- /PAGE SCHEDULE -->



      </div>

      <!-- /Content area -->
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Asignar revisores</h3>
              <h4>Asigne dos revisores para los trabajos seleccionados</h4>
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Adscripción</th>
                      <th scope="col">Trabajos pendientes</th>
                      <th scope="col">Seleccionar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Juan Cuadros </th>
                      <td>IMSS</td>
                      <td>19</td>
                      <td>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Mariana Reyes</th>
                      <td>IMSS</td>
                      <td>19</td>
                      <td>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Cristina Pacheco</th>
                      <td>IMSS</td>
                      <td>19</td>
                      <td>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Cristina Pacheco</th>
                      <td>UNAM</td>
                      <td>19</td>
                      <td>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                      </td>
                    </tr>



                  </tbody>
                  </table>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-dismiss="modal">cerrar</button> -->
              <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block" class="btn btn-primary">Asignar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <!-- Modal 2 -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel2">Dictamen</h3>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nombre del trabajo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Lorem Ipsum ... </th>
                      <!-- <td>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                    </td>
                      <td>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                      </td> -->
                    </tr>
                    <tr>
                      <td scope="row">Lorem Ipsum ...</td>
                    </tr>
                    <tr>
                      <td scope="row">Lorem Ipsum ...</td>
                      <!-- <td>Neurocirugia</td> -->
                    </tr>
                    <tr>
                      <td scope="row">Lorem Ipsum ...</td>
                      <!-- <td>Neurocirugia</td> -->

                    </tr>
                  </tbody>
                  </table>
                  <div class="col-sm-12">
                    <div class="col-sm-4">
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block" class="btn btn-primary">Cartel</button>
                    </div>
                    <!-- <div class="col-sm-1">
                    </div> -->
                    <div class="col-sm-4">
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block" class="btn btn-primary">Ponencia</button>
                    </div>
                    <!-- <div class="col-sm-1"> -->

                    <div class="col-sm-4">
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block" class="btn btn-primary">Rechazar</button>
                    </div>

                  </div>


            </div>
            <div class="modal-footer">
              <br><br>
              <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-dismiss="modal">cerrar</button> -->
              <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block" class="btn btn-primary">Guardar</button> -->
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->



      <!-- FOOTER -->
      <!-- <footer class="footer">
          <div class="footer-meta">
              <div class="container text-center">
                  <div class="clearfix">
                      <ul class="social-line list-inline">
                          <li data-animation="flipInY" data-animation-delay="100"><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                          <li data-animation="flipInY" data-animation-delay="200"><a href="#" class="dribbble"><i class="fa fa-youtube"></i></a></li>
                          <li data-animation="flipInY" data-animation-delay="300"><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                      </ul>
                  </div>
                  <span class="copyright" data-animation="fadeInUp" data-animation-delay="100">&copy; 2014 im Event &#8212; An One Page Event Manager Theme made with passion by jThemes Studio</span>
              </div>
          </div>
          <!-- FOOTER -->
          <footer class="footer">
              <!-- <div class="footer-meta">
                  <div class="container text-center">
                      <span class="copyright" data-animation="fadeInUp" data-animation-delay="100">&copy; 2018 Instituto Mexicano del Seguro Social.</span>
                  </div>
              </div> -->
              <div class="footer-meta">
                  <div class="container">
                      <div class="clearfix text-center">
                          <ul class="social-line list-inline">
                              <li><img src="http://localhost/foro/assets/img/Logo_SaberIMSS.png" alt="..." width="70" height="70"></li>
                              <li data-animation="flipInY" data-animation-delay="100" class="animated flipInY visible"><a href="https://twitter.com/Saber_IMSS" class="twitter"><i class="fa fa-twitter"></i></a></li>
                              <li data-animation="flipInY" data-animation-delay="300" class="animated flipInY visible"><a href="https://www.facebook.com/SaberIMSS/" class="facebook"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="https://www.youtube.com/channel/UCvlda6Uw7N_pZAH_fxE9ZYA" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a></li>
                          </ul>
                      </div>
                      <!-- <span class="copyright" data-animation="fadeInUp" data-animation-delay="100">&copy; 2018 Instituto Mexicano del Seguro Social.</span>-->
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-left">
                          <a href="https://www.gob.mx/presidencia/" class="scroll-to">
                              <img src="../public/assets/img/logo-presidencia.png" class="img-responsive">
                          </a>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 text-left">
                          <a href="http://www.qroo.gob.mx/sedetur" class="scroll-to">
                              <img src="../public/assets/img/logo-Cancun.png" class="img-responsive">
                          </a>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 text-center pull-centerr">
                          <!-- <span class="copyright" data-animation="fadeInUp" data-animation-delay="100">&copy; 2018 IMSS, <a href="#">Aviso legal</a>.</span> -->
                          <a href="http://www.fundacionimss.org.mx/" class="scroll-to">
                              <img src="../public/assets/img/logo-fundacion-imss.png" class="img-responsive">
                          </a>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 text-right">
                          <a href="http://www.imss.gob.mx/" class="scroll-to">
                              <img src="../public/assets/img/logo-imss.png" class="img-responsive">
                          </a>
                      </div>
                  </div>
              </div>
          </footer>
          <!-- /FOOTER -->

      <div class="to-top"><i class="fa fa-angle-up"></i></div>

  </div>
<!-- /Wrap all content -->




<!-- JS Global -->

<!--[if lt IE 9]><script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script><![endif]-->
<!--[if gte IE 9]><!--><script src="../public/assets/plugins/jquery/jquery-2.1.1.min.js"></script><!--<![endif]-->
<script src="../public/assets/plugins/modernizr.custom.js"></script>
<script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="../public/assets/plugins/superfish/js/superfish.js"></script>
<script src="../public/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="../public/assets/plugins/placeholdem.min.js"></script>
<script src="../public/assets/plugins/jquery.smoothscroll.min.js"></script>
<script src="../public/assets/plugins/jquery.easing.min.js"></script>

<!-- JS Page Level -->
<script src="../public/assets/plugins/owlcarousel2/owl.carousel.min.js"></script>
<script src="../public/assets/plugins/waypoints/waypoints.min.js"></script>
<script src="../public/assets/plugins/countdown/jquery.plugin.min.js"></script>
<script src="../public/assets/plugins/countdown/jquery.countdown.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> -->

<script src="../public/assets/js/theme-ajax-mail.js"></script>
<script src="../public/assets/js/theme.js"></script>
<script src="../public/assets/js/custom.js"></script>
<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})
</script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        theme.init();
        theme.initMainSlider();
        theme.initCountDown();
        theme.initPartnerSlider();
        theme.initTestimonials();
        theme.initGoogleMap();
    });
    jQuery(window).load(function () {
        theme.initAnimation();
    });

    jQuery(window).load(function () { jQuery('body').scrollspy({offset: 100, target: '.navigation'}); });
    jQuery(window).load(function () { jQuery('body').scrollspy('refresh'); });
    jQuery(window).resize(function () { jQuery('body').scrollspy('refresh'); });

    jQuery(document).ready(function () { theme.onResize(); });
    jQuery(window).load(function(){ theme.onResize(); });
    jQuery(window).resize(function(){ theme.onResize(); });

    jQuery(window).load(function() {
        if (location.hash != '') {
            var hash = '#' + window.location.hash.substr(1);
            if (hash.length) {
                jQuery('html,body').delay(0).animate({
                    scrollTop: jQuery(hash).offset().top - 44 + 'px'
                }, {
                    duration: 1200,
                    easing: "easeInOutExpo"
                });
            }
        }
    });

</script>

</body>
</html>
