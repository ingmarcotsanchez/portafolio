<?php require_once("config/conexion.php");?>
<?php 
    require_once("models/Usuario.php");
    $usuario = new Usuario();
    $usu = $usuario->get_usuario();

    require_once("models/Social_Media.php");
    $social = new SocialMedia();
    $soc = $social->get_socialMedia();
    //print_r($soc);

    require_once("models/Work.php");
    $work = new Work();
    $wk = $work->get_works();

    require_once("models/Estudio.php");
    $estudio = new Estudio();
    $cur = $estudio->get_curriculum();

    require_once("models/Experiencia.php");
    $experiencia = new Experiencia();
    $exp = $experiencia->get_experience();

    require_once("models/Filtro.php");
    $filtro = new Filtro();
    $fil = $filtro->get_filter();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ing. Marco Sánchez Espinosa</title>
    <link rel="stylesheet" href="public/sass/style.css">
    <!-- Iconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src="public/js/fullcalendar.js"></script>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"><img src="public/images/logo.png" alt=""><span class="animate" style="--i:1"></span></a>
        <div class="bx bx-menu" id="menu-icon"><span class="animate" style="--i:2"></span></div>
        <nav class="navbar">
            <a href="#home" class="active">Inicio</a>
            <a href="#about">Sobre Mi</a>
            <a href="#skills">Habilidades</a>
            <a href="#education">Educación</a>
            <a href="#experience">Experiencia</a>
            <a href="#portfolio">Portafolio</a>
            <a href="#contact">Contacto</a>
            <a href="login.php" class="btn-form">Admon</a>

            <span class="active-nav"></span>
        </nav>
    </header>
    <section class="home show-animate" id="home">
        <div class="home-content">
            <h1 >Hola, soy <span>Diseñador Web</span></h1>
    
            <p>Soy una persona con más de 10 años de experiencia docente, me apaciona la parte FrontEnd, me gusta aprender diferentes temas en esta área para transmitirlas a mis estudiantes.</p>
            <div class="btn-box">
                <a href="#" class="btn" download="document/CV.pdf"><i class='bx bxs-file-pdf'></i> Download CV</a>
                <a href="https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001475324" class="btn" target="_blank"><i class='bx bxs-file-html'></i> CVLAC</a>
            </div>
        </div>
        <div class="home-social"><!--social_media-->
            <?php
                for($i=0;$i<sizeof($soc);$i++):
            ?>

            <a href="<?php echo $soc[$i]["socmed_url"] ?>" target="_blank"><i class='bx bxl-<?php echo $soc[$i]["socmed_icono"] ?>'></i></a>
            
            <?php
                endfor;
            ?>
        </div>
        <div class="home-img"></div>
    </section>
    <section class="about" id="about">
        <div class="content-about">
            <h2 class="heading">Sobre <span>Mi</span></h2>
            <p><span>Hola! </span>A continuación pueden conocer mis intereses personales e información personal.</p>
            <div class="content">
                <div class="info-personal">
                    <h3>Datos Personales</h3><!--info_personal-->
                    <ul>
                        <li>
                            <b>Cumpleaños</b>09 Junio 1985
                        </li>
                        <li>
                            <b>Celular</b>(+57) 321 461 4550
                        </li>
                        <li>
                            <b>Email</b>marcotsancheze@gmail.com
                        </li>
                        <li>
                            <b>Dirección</b>Reserva de Peñalisa Creta
                        </li>
                        <li>
                            <b>Cargo Actual:</b>Profesor Universitario
                        </li>
                    </ul>
                </div>
                <div class="info-intereses">
                    <h3>Mis Pasatiempos</h3>
                    <div class="content-intereses">
                        <div class="intereses">
                            <i class='bx bx-video-recording'></i>
                            <span>Películas</span>
                        </div>
                        <div class="intereses">
                            <i class='bx bxs-plane-alt'></i>
                            <span>Viajar</span>
                        </div>
                        <div class="intereses">
                            <i class='bx bx-car'></i>
                            <span>Automóviles</span>
                        </div>
                        <div class="intereses">
                            <i class='bx bxs-music'></i>
                            <span>Música</span>
                        </div>
                        <div class="intereses">
                            <i class='bx bxl-baidu'></i>
                            <span>Perros</span>
                        </div>
                        <div class="intereses">
                            <i class='bx bx-palette'></i>
                            <span>Dibujar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="skills" id="skills">
        <h2 class="heading">Mis <span>Habilidades</span></h2>
        <div class="skills-container">
            <div class="skills-tabs"> <!--skills-->
                <div class="skills-header skills-active" data-target="#frontend">
                    <i class='bx bx-sidebar skills-icon'></i>
                    <div>
                        <h2 class="skills-title">Frontend Developer</h2>
                        <span class="skills-subtitle">3 años</span>
                    </div>
                    <i class='bx bx-chevron-down skills-arrow'></i>
                </div>

                <div class="skills-header" data-target="#design">
                    <i class='bx bx-image skills-icon'></i>
                    <div>
                        <h2 class="skills-title">UI Design</h2>
                        <span class="skills-subtitle">2 años</span>
                    </div>
                    <i class='bx bx-chevron-down skills-arrow'></i>
                </div>

                <div class="skills-header" data-target="#backend">
                    <i class='bx bx-terminal skills-icon'></i>
                    <div>
                        <h2 class="skills-title">Backend Developer</h2>
                        <span class="skills-subtitle">1 año</span>
                    </div>
                    <i class='bx bx-chevron-down skills-arrow'></i>
                </div>
            </div>
            <div class="skills-content">
                <div class="skills-group skills-active" data-content id="frontend">
                    <div class="skills-list"><!--skill_det-->
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">HTML</h3>
                                <span class="skills-number">90%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 90%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">CSS</h3>
                                <span class="skills-number">80%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 80%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">SASS</h3>
                                <span class="skills-number">80%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 80%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">JS</h3>
                                <span class="skills-number">40%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 40%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">BOOSTRAP</h3>
                                <span class="skills-number">85%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 85%;"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="skills-group"  data-content id="design">
                    <div class="skills-list">
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">Figma</h3>
                                <span class="skills-number">90%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 90%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">XD</h3>
                                <span class="skills-number">50%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 50%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">Ilustrator</h3>
                                <span class="skills-number">40%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 40%;"></span>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="skills-group"  data-content id="backend">
                    <div class="skills-list">
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">PHP</h3>
                                <span class="skills-number">70%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 70%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">MySQL</h3>
                                <span class="skills-number">90%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 90%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">MariaDB</h3>
                                <span class="skills-number">90%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 90%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">PostgresSQL</h3>
                                <span class="skills-number">90%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 90%;"></span>
                            </div>
                        </div>
                        <div class="skills-data">
                            <div class="skills-titles">
                                <h3 class="skills-name">ORACLE</h3>
                                <span class="skills-number">40%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 40%;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="curriculum" id="education">
        <div class="content-curriculum"><!--estudios-->
            <h2 class="heading">Mi <span>Curriculum</span></h2>
            <div class="content-row">
                <div class="content-col education">
                    <h3 class="title">Educación</h3>
                    <?php
                        for($i=0;$i<sizeof($cur);$i++):
                    ?>
                    <?php if($cur[$i]["est_tipo"] == "E"): ?>
                    <div class="item izq">
                        <h4><?php echo $cur[$i]["est_titulo"] ?></h4>
                        <span class="lugar"><?php echo $cur[$i]["est_lugar"] ?></span>
                        <span class="fecha"><?php echo $cur[$i]["est_anno"] ?></span>
                        <div class="conectori">
                            <div class="circuloi"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <div class="content-col educationContinua">
                    <h3 class="title">Cursos</h3>
                    <?php
                        for($i=0;$i<sizeof($cur);$i++):
                    ?>
                    <?php if($cur[$i]["est_tipo"] == "C"): ?>
                    <div class="item der">
                    <h4><?php echo $cur[$i]["est_titulo"] ?></h4>
                        <span class="lugar"><?php echo $cur[$i]["est_lugar"] ?></span>
                        <span class="fecha"><?php echo $cur[$i]["est_anno"] ?></span>
                        <div class="conectord">
                            <div class="circulod"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="experience" id="experience"><!--experiencia-->
        <h2 class="heading">Mi <span>Experiencia</span></h2>
        <div class="experience-row">
            <div class="experience-column">
                <h3 class="title">Experiencia Académica</h3>
                <div class="experience-box">
                    <?php
                        for($i=0;$i<sizeof($exp);$i++):
                    ?>
                    <?php if($exp[$i]["exp_tipo"] == "A"): ?>
                    <div class="experience-content">
                        <div class="content">
                            <div class="year"><i class="bx bxs-calendar"> <?php echo $exp[$i]["exp_annoIni"] ?> - <?php echo $exp[$i]["exp_annoFin"] ?></i></div>
                            <h3><?php echo $exp[$i]["exp_titulo"] ?></h3>
                            <p><?php echo $exp[$i]["exp_lugar"] ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="experience-column">
                <h3 class="title">Experiencia Profesional</h3>
                <div class="experience-box">
                    <?php
                        for($i=0;$i<sizeof($exp);$i++):
                    ?>
                    <?php if($exp[$i]["exp_tipo"] == "P"): ?>
                    <div class="experience-content">
                        <div class="content">
                            <div class="year"><i class="bx bxs-calendar"> <?php echo $exp[$i]["exp_annoIni"] ?> - <?php echo $exp[$i]["exp_annoFin"] ?></i></div>
                            <h3><?php echo $exp[$i]["exp_titulo"] ?></h3>
                            <p><?php echo $exp[$i]["exp_lugar"] ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="work" id="portfolio">
        <h2 class="heading">Mis <span>Trabajos</span></h2>
        <div class="work-filters"><!--filtros-->
            <span class="work-item active-work" data-filter="all">All</span>
            <?php
                for($i=0;$i<sizeof($fil);$i++):
            ?>
            <span class="work-item" data-filter=".<?php echo $fil[$i]["fil_enlace"] ?>"><?php echo $fil[$i]["fil_titulo"] ?></span>
            <?php
                endfor;
            ?>
        </div>
        <div class="work-container">
            <?php
                for($i=0;$i<sizeof($wk);$i++):
            ?>
            
            <div class="work-card mix <?php echo $wk[$i]["fil_enlace"] ?>">
                <img src="public/images/proyectos/<?php echo $wk[$i]["work_img"] ?>" alt="imagen" class="work-img">
                <h3 class="work-title"><?php echo $wk[$i]["work_titulo"] ?></h3>
                <span class="work-button">Ver más
                    <i class='bx bx-right-arrow-alt work-button-icon'></i>
                </span>
                <div class="portfolio-item-details">
                    <h3 class="details-title"><?php echo $wk[$i]["work_titulo"] ?></h3>
                    <p class="details-description"><?php echo $wk[$i]["work_descripcion"] ?>.</p>
                    <ul class="details-info">
                        <li>Fecha - <span><?php echo $wk[$i]["work_fecha"] ?></span></li>
                        <li>Rol - 
                            <span>
                            <?php 
                                if ($wk[$i]["work_rol"] == "D"){
                                    echo "Diseñador";
                                } elseif($wk[$i]["work_rol"] == "P"){
                                    echo "Programador";
                                }
                            ?>
                            </span>
                        </li>
                        <li>Tecnología - <span><?php echo $wk[$i]["work_tecnologia"] ?></span></li>
                        <li>URL - <a href="<?php echo $wk[$i]["work_url"] ?>" target="_blank"><span class="span-url"><?php echo $wk[$i]["work_url"] ?></span></a></li>
                    </ul>
                </div>
            </div>
            <?php
                endfor;
            ?>
        </div>
    </section>
    <!-- Portfolio popup -->
    <div class="portfolio-popup">
        <div class="portfolio-popup-inner">
            <div class="portfolio-popup-content">
                <span class="portfolio-popup-close"><i class='bx bx-x'></i></span>
                <div class="pp-thumbnail">
                    <img src="" alt="" class="portfolio-popup-img">
                </div>
                <div class="portfolio-popup-info">
                    <div class="portfolio-popup-subtitle">Proyecto - <span>Design</span></div>
                    <div class="portfolio-popup-body">
                        <h3 class="details-title">Lorem ipsum dolor</h3>
                        <p class="details-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus doloremque iste.</p>
                        <ul class="details-info">
                            <li>Fecha - <span>Junio 2023</span></li>
                            <li>Rol - <span>Diseñador</span></li>
                            <li>Tecnología - <span>HTML - CSS</span></li>
                            <li>URL - <span>HTML - CSS</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact" id="contact">
        <h2 class="heading">Contácta <span>Me!</span></h2>
        <div class="contact-container">
            <div class="contact-info">
                <div class="contact-card">
                    <i class='bx bx-envelope contact-card-icon'></i>
                    <h3 class="contact-card-title">Email</h3>
                    <span class="contact-card-data">marcotsancheze@gmail.com</span>
                    <span class="contact-button">
                        Escribemé <i class='bx bx-edit-alt contact-button-icon'></i>
                    </span>
                </div>

                <div class="contact-card">
                    <i class='bx bxl-whatsapp contact-card-icon'></i>
                    <h3 class="contact-card-title">Whatsapp</h3>
                    <span class="contact-card-data">(+57) 3214614550</span>
                    <span class="contact-button">
                        Escribemé <i class='bx bx-edit-alt contact-button-icon'></i>
                    </span>
                </div>
            </div>
            <div class="contact-form">
                <form class="main-box" method="post" id="contact_form">
                    <input type="hidden" id="cli_id" name="cli_id">
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-id-card'></i></span>
                        <input type="text" id="cli_nombre" name="cli_nombre" required>
                        <label for="cli_nombre">Nombres y Apellidos</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-phone-call'></i></span>
                        <input type="text" id="cli_telef" name="cli_telef" required>
                        <label for="cli_telef">Celular</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" id="cli_correo" name="cli_correo" required>
                        <label for="cli_correo">Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-archive-out'></i></span>
                        <input type="text" id="cli_asunto" name="cli_asunto" required>
                        <label for="cli_asunto">Asunto</label>
                    </div>
                    <div class="input-area">
                        <textarea id="cli_mensaje" name="cli_mensaje" cols="124" rows="5" placeholder="Comentarios"></textarea>
                    </div>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-form">Enviar</button>
                </form>
            </div>
        </div>
        
    </section>
    <footer class="footer">
        <div class="footer-text">
            <p>Copyright &copy; 2024</p>
        </div>
        <div class="footer-iconTop">
            <a href="#"><i class="bx bx-up-arrow-alt"></i></a>
        </div>
    </footer>
    
    <script src="public/js/mixitup.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="public/js/script.js"></script>
    <script src="view/js/index.js"></script>
</body>
</html>