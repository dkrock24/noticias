<!doctype html>
<html class="no-js" lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> sisepudo.com </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/noticias/css/bootstrap.min.css" />

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="/noticias/css/vendor.css">
        <!-- Theme initialization -->

        <style>
        .loading{
          width:40px;
          height:40px;
          color:black;
          border-radius:100px;
          border:5px solid black;
          border-top-color:rgba(0,0,0,0.3);
          box-sizing:border-box;
          position:absolute;
          right:0%;
          margin-top:-35px;
          margin-left:-80px;
          animation:loading 1.2s linear infinite;
          -webkit-animation:loading 1.2s linear infinite;
          z-index: 1000px;
        }
        @keyframes loading{
          0%{transform:rotate(0deg)}
          100%{transform:rotate(360deg)}
        }
        @-webkit-keyframes loading{
          0%{-webkit-transform:rotate(0deg)}
          100%{-webkit-transform:rotate(360deg)}
        }

        html{height:100%;}
        body {background:#000;background:linear-gradient(#7D57C9, rgba(0, 0, 0, 0) 90%), linear-gradient(-45deg, #4DA2D6 25%, #000 75%) !important;background:-webkit-linear-gradient(#7D57C9, rgba(0, 0, 0, 0) 90%), -webkit-linear-gradient(-45deg, #4DA2D6 25%, #000 75%) !important;}
        </style>

        
        <script type="text/javascript" src="/noticias/js/jquery.js"></script> 
        

        <?php
            foreach ($lib_login as $value) {
        ?>
        <script type="text/javascript" src="<?php echo $value->url_libreria; ?>"></script>      
        <?php
        }
        ?>
        
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="/noticias/css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="/noticias/css/app.css">');
            }
        </script>
        <style type="text/css">
        select.form-control:not([size]):not([multiple]) {
        height: calc(3.5rem - 3px);
    }</style>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
          <i class="fa fa-bars"></i>
        </button> </div>
                    <div class="header-block header-block-search hidden-sm-down">
                       Backend || Adminsitrativo - <?php echo date("M-d-Y"); ?>
                    </div>

                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                          
    
            </a>
                                <div class="dropdown-menu notifications-dropdown-menu">
                                    <ul class="notifications-container">
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('/noticias/assets/faces/3.jpg')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p> <span class="accent">Zack Alien</span> pushed new commit: <span class="accent">Fix page load performance issue</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('/noticias/assets/faces/5.jpg')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p> <span class="accent">Amaya Hatsumi</span> started new task: <span class="accent">Dashboard UI design.</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('/noticias/assets/faces/8.jpg')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p> <span class="accent">Andy Nouman</span> deployed new version of <span class="accent">NodeJS REST Api V3</span> </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer>
                                        <ul>
                                            <li> <a href="">
                      View All
                    </a> </li>
                                        </ul>
                                    </footer>
                                </div>
                            </li>
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('../../../assets/images/avatars/<?php echo $usuario[0]->avatar; ?>')"> </div> 
                                    <span class="name"><?php echo $usuario[0]->nickname; ?></span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-user icon"></i>Perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-bell icon"></i>Notificaciones
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-gear icon"></i>Configuración
                                    </a>
                                    <div class="dropdown-divider"></div> 
                                    <a class="dropdown-item" href="salir">
                                        <i class="fa fa-power-off icon"></i>Salir
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo">
                                    <span class="l l1"></span>
                                    <span class="l l2"></span>
                                    <span class="l l3"></span>
                                    <span class="l l4"></span>
                                    <span class="l l5"></span>
                                </div> 
                                    <?php
                                        foreach ($empresa as $value) {
                                          echo $value->nombre_empresa.' '.$value->departamento;
                                        }
                                    ?>
                            </div>
                        </div>

                    <!-- MENU LEFT -->
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                            <?php
                                foreach ($menu as $value) {
                                ?>
                                <li class="<?php echo $value->class_menu ?>">
                                    <a href="#"><i class="<?php echo $value->icon_menu ?>"></i> <?php echo $value->nombre_menu ?> <i class="fa arrow"></i></a>
                                    <ul class=""> 
                                    <?php                    

                                        foreach($submenu as $sub_menu)
                                        {
                                            if($value->id_menu==$sub_menu->id_menu){
                                            ?>
                                                <li>
                                                    <a id="submenu" href="#<?php echo $sub_menu->url_submenu; ?>"> <?php echo $sub_menu->nombre_submenu; ?>
                                                    <input type='hidden' id="titulo_sub" value="<?php echo 1 ?>">
                                                    </a>
                                                </li>
                                            <?php
                                            }                    
                                        }
                                    ?> 
                                    </ul>               
                                </li>
                                <?php
                                }
                            ?>
                            </ul>
                        </nav>


                    
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="nav metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-xs-4"> </div>
                                                <div class="col-xs-4"> <label class="title">fixed</label> </div>
                                                <div class="col-xs-4"> <label class="title">static</label> </div>
                                            </div>
                                            <div class="row hidden-md-down">
                                                <div class="col-xs-4"> <label class="title">Sidebar:</label> </div>
                                                <div class="col-xs-4"> <label>
                                    <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" >
                                    <span></span>
                                </label> </div>
                                                <div class="col-xs-4"> <label>
                                    <input class="radio" type="radio" name="sidebarPosition" value="">
                                    <span></span>
                                </label> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"> <label class="title">Header:</label> </div>
                                                <div class="col-xs-4"> <label>
                                    <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                    <span></span>
                                </label> </div>
                                                <div class="col-xs-4"> <label>
                                    <input class="radio" type="radio" name="headerPosition" value="">
                                    <span></span>
                                </label> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"> <label class="title">Footer:</label> </div>
                                                <div class="col-xs-4"> <label>
                                    <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                    <span></span>
                                </label> </div>
                                                <div class="col-xs-4"> <label>
                                    <input class="radio" type="radio" name="footerPosition" value="">
                                    <span></span>
                                </label> </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li> <span class="color-item color-red" data-theme="red"></span> </li>
                                                <li> <span class="color-item color-orange" data-theme="orange"></span> </li>
                                                <li> <span class="color-item color-green active" data-theme=""></span> </li>
                                                <li> <span class="color-item color-seagreen" data-theme="seagreen"></span> </li>
                                                <li> <span class="color-item color-blue" data-theme="blue"></span> </li>
                                                <li> <span class="color-item color-purple" data-theme="purple"></span> </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul> <a href="">
              <i class="fa fa-cog"></i> Customize
            </a> </li>
                        </ul>
                    </footer>
                </aside>
                
                <article class="content dashboard-page">
                    
                    <section class="section">
                        <div class="row sameheight-container">

                            <div class="col-md-12">
                                <div class="card tasks">
                                    <div class="card-header bordered">
                                        <div class="header-block">
                                            <h3 class="title titulo_submenu"> BIENVENIDOS </h3>
                                            <div class="loading"></div>
                                        </div>
                                        <div class="header-block pull-right"> </div>
                                    </div>
                                    <div class="pages">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
                <footer class="footer">
                    <div class="footer-block buttons">   © 2017 - sisepudo.com </div>
                    <div class="footer-block author">
                       
                    </div>
                </footer>
                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
                                <h4 class="modal-title">Media Library</h4>
                            </div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a> </li>
                                    <li class="nav-item"> <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a> </li>
                                </ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row"> </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Insert Selected</button> </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
                                <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
                            </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button> <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        


    </body>
    
    <script src="/noticias/js/vendor.js"></script>
    <script src="/noticias/js/app.js"></script>




  <!-- include summernote -->
    <link href="../../../assets/dist/summernote.css" rel="stylesheet">
    <script src="../../../assets/dist/summernote.js"></script>
    <script src="../../../assets/dist/summernote.min.js"></script>

</html>