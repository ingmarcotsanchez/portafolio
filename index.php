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
    $wk = $work->get_work();

    require_once("models/Estudio.php");
    $estudio = new Estudio();
    $cur = $estudio->get_curriculum();
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
        <a href="#" class="logo">Marco Sánchez<span class="animate" style="--i:1"></span></a>
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
            <h1 >Hola, Mi nombre es <span>Marco Sánchez Espinosa</span></h1>
    
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni optio, explicabo inventore ipsum iusto adipisci commodi iste corrupti maxime quidem placeat voluptate odio quis molestiae, itaque aperiam cupiditate veritatis quos.
            Cupiditate reprehenderit totam non error eveniet.</p>
            <div class="btn-box">
                <a href="#" class="btn" download="document/CV.pdf"><i class='bx bx-download'></i> Download CV</a>
                <a href="#" class="btn">Agendar cita</a>
            </div>
        </div>
        <div class="home-social"><!--social_media-->
            <?php
                for($i=0;$i<sizeof($soc);$i++):
            ?>

            <a href="<?php echo $soc[$i]["socmed_url"] ?>"><i class='bx bxl-<?php echo $soc[$i]["socmed_icono"] ?>'></i></a>
            
            <?php
                endfor;
            ?>
        </div>
        <div class="home-img"></div>
    </section>
    <section class="about" id="about">
        <div class="content-about">
            <h2 class="heading">Sobre <span>Mi</span></h2>
            <p><span>Hola! </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus nemo unde nobis incidunt eum a? Cumque sunt recusandae repellat cupiditate reiciendis tempora dolorum beatae architecto ratione, quisquam illo placeat.</p>
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
                            <b>Email</b>ing.marcotsanchez@gmail.com
                        </li>
                        <li>
                            <b>Dirección</b>Reserva de Peñalisa Creta
                        </li>
                        <li>
                            <b>Cargo Actual:</b>Profesor
                        </li>
                        <li>
                            <b>Cvlac</b><a href="#" class="cvlac" download="document/CV.pdf"><i class='bx bx-download'></i>Ver más</a>
                        </li>
                    </ul>
                </div>
                <div class="info-intereses">
                    <h3>Mis Intereses</h3>
                    <div class="content-intereses">
                        <div class="intereses">
                            <i class='bx bx-video-recording'></i>
                            <span>Peliculas</span>
                        </div>
                        <div class="intereses">
                            <i class='bx bxs-plane-alt'></i>
                            <span>Viajar</span>
                        </div>
                        <div class="intereses">
                            <i class='bx bx-car'></i>
                            <span>Automoviles</span>
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
                                <span class="skills-number">80%</span>
                            </div>

                            <div class="skills-bar">
                                <span class="skills-percentage" style="width: 80%;"></span>
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
                    <div class="experience-content">
                        <div class="content">
                            <div class="year"><i class="bx bxs-calendar"> 2010 - Actualidad</i></div>
                            <h3>Profesor Tiempo Completo</h3>
                            <p>Universidad Minuto de Dios.</p>
                        </div>
                    </div>
                    <div class="experience-content">
                        <div class="content">
                            <div class="year"><i class="bx bxs-calendar"> 2018 - 2019</i></div>
                            <h3>Profesor Catedra</h3>
                            <p>Universidad Piloto de Colombia.</p>
                        </div>
                    </div>
                    <div class="experience-content">
                        <div class="content">
                            <div class="year"><i class="bx bxs-calendar"> 2008 - 2009</i></div>
                            <h3>Profesor Catedra</h3>
                            <p>Compu basic.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="experience-column">
                <h3 class="title">Experiencia Profesional</h3>
                <div class="experience-box">
                    <div class="experience-content">
                        <div class="content">
                            <div class="year"><i class="bx bxs-calendar"> 2018 - Actualidad</i></div>
                            <h3>Ingeniero de Soporte</h3>
                            <p>Sistemas y Soluciones Integradas S.A.S.</p>
                        </div>
                    </div>
                    <div class="experience-content">
                        <div class="content">
                            <div class="year"><i class="bx bxs-calendar"> 2020 - 2021</i></div>
                            <h3>Coordinador de Tic</h3>
                            <p>Superando y Educando S.A.S.</p>
                        </div>
                    </div>
                    <div class="experience-content">
                        <div class="content">
                            <div class="year"><i class="bx bxs-calendar"> 2010 - Actualidad</i></div>
                            <h3>Profesor Tiempo Completo</h3>
                            <p>Universidad Minuto de Dios.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="work" id="portfolio">
        <h2 class="heading">Mis <span>Trabajos</span></h2>
        <div class="work-filters"><!--filtros-->
            <span class="work-item active-work" data-filter="all">All</span>
            <span class="work-item" data-filter=".design">Diseños</span>
            <span class="work-item" data-filter=".web">Web</span>
            <span class="work-item" data-filter=".software">Software</span>
        </div>
        <div class="work-container">
            <?php
                for($i=0;$i<sizeof($wk);$i++):
            ?>
            
            <div class="work-card mix <?php echo $wk[$i]["fil_id"] ?>design">
                <img src="public/images/<?php echo $wk[$i]["work_img"] ?>" alt="imagen" class="work-img">
                <h3 class="work-title"><?php echo $wk[$i]["work_titulo"] ?></h3>
                <span class="work-button">Demo
                    <i class='bx bx-right-arrow-alt work-button-icon'></i>
                </span>
                <div class="portfolio-item-details">
                    <h3 class="details-title"><?php echo $wk[$i]["work_titulo"] ?></h3>
                    <p class="details-description"><?php echo $wk[$i]["work_descripcion"] ?>.</p>
                    <ul class="details-info">
                        <li>Fecha - <span><?php echo $wk[$i]["work_fecha"] ?></span></li>
                        <li>Rol - <span><?php echo $wk[$i]["work_rol"] ?></span></li>
                        <li>Tecnología - <span><?php echo $wk[$i]["work_tecnologia"] ?></span></li>
                    </ul>
                </div>
            </div>
            <?php
                endfor;
            ?>
            <!--
            <div class="work-card mix design">
                <img src="" alt="" class="work-img">
                <h3 class="work-title">Lorem ipsum</h3>
                <span class="work-button">Demo
                    <i class='bx bx-right-arrow-alt work-button-icon'></i>
                </span>
                <div class="portfolio-item-details">
                    <h3 class="details-title">Lorem ipsum dolor2</h3>
                    <p class="details-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus doloremque iste.</p>
                    <ul class="details-info">
                        <li>Fecha - <span>Junio 2023</span></li>
                        <li>Rol - <span>Diseñador</span></li>
                        <li>Tecnología - <span>HTML - CSS</span></li>
                    </ul>
                </div>
            </div>

            <div class="work-card mix software">
                <img src="" alt="" class="work-img">
                <h3 class="work-title">Lorem ipsum</h3>
                <span class="work-button">Demo
                    <i class='bx bx-right-arrow-alt work-button-icon'></i>
                </span>
                <div class="portfolio-item-details">
                    <h3 class="details-title">Lorem ipsum dolor</h3>
                    <p class="details-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus doloremque iste.</p>
                    <ul class="details-info">
                        <li>Fecha - <span>Junio 2023</span></li>
                        <li>Rol - <span>Diseñador</span></li>
                        <li>Tecnología - <span>HTML - CSS</span></li>
                    </ul>
                </div>
            </div>

            <div class="work-card mix design">
                <img src="" alt="" class="work-img">
                <h3 class="work-title">Lorem ipsum</h3>
                <span class="work-button">Demo
                    <i class='bx bx-right-arrow-alt work-button-icon'></i>
                </span>
                <div class="portfolio-item-details">
                    <h3 class="details-title">Lorem ipsum dolor</h3>
                    <p class="details-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus doloremque iste.</p>
                    <ul class="details-info">
                        <li>Fecha - <span>Junio 2023</span></li>
                        <li>Rol - <span>Diseñador</span></li>
                        <li>Tecnología - <span>HTML - CSS</span></li>
                    </ul>
                </div>
            </div>

            <div class="work-card mix web">
                <img src="" alt="" class="work-img">
                <h3 class="work-title">Lorem ipsum</h3>
                <span class="work-button">Demo
                    <i class='bx bx-right-arrow-alt work-button-icon'></i>
                </span>
                <div class="portfolio-item-details">
                    <h3 class="details-title">Lorem ipsum dolor</h3>
                    <p class="details-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus doloremque iste.</p>
                    <ul class="details-info">
                        <li>Fecha - <span>Junio 2023</span></li>
                        <li>Rol - <span>Diseñador</span></li>
                        <li>Tecnología - <span>HTML - CSS</span></li>
                    </ul>
                </div>
            </div>

            <div class="work-card mix software">
                <img src="" alt="" class="work-img">
                <h3 class="work-title">Lorem ipsum</h3>
                <span class="work-button">Demo
                    <i class='bx bx-right-arrow-alt work-button-icon'></i>
                </span>
                <div class="portfolio-item-details">
                    <h3 class="details-title">Lorem ipsum dolor</h3>
                    <p class="details-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus doloremque iste.</p>
                    <ul class="details-info">
                        <li>Fecha - <span>Junio 2023</span></li>
                        <li>Rol - <span>Diseñador</span></li>
                        <li>Tecnología - <span>HTML - CSS</span></li>
                    </ul>
                </div>
            </div>
            -->
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
                    <div class="portfolio-popup-subtitle">Featured - <span>Design</span></div>
                    <div class="portfolio-popup-body">
                        <h3 class="details-title">Lorem ipsum dolor</h3>
                        <p class="details-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus doloremque iste.</p>
                        <ul class="details-info">
                            <li>Fecha - <span>Junio 2023</span></li>
                            <li>Rol - <span>Diseñador</span></li>
                            <li>Tecnología - <span>HTML - CSS</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact" id="contact">
        <h2 class="heading">Agendar <span>Reunión!</span></h2>
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
     
            <div id="calendar">
               
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
    
    <script src="public/js/script.js"></script>
</body>
</html>