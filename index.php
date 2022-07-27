<?php
    include("admin/models/security.php");
    include("admin/models/models.php");
    $_SESSION['CSRFToken'] = $security->creartedToken();
    $token = $_SESSION['CSRFToken'];
    $arrayAlbum = $tableAlbum->getAll();
    if(!isset($_SESSION['active'])){
        $_SESSION['active'] = false;
    }
    $status = $_SESSION['active'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucas Gabriel PHOTOGRAPHY </title>
    <link rel="shortcut icon" href="imagenes/logo.png">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/galeria.css">
    <script src="https://kit.fontawesome.com/eb1dfef847.js" crossorigin="anonymous"></script>
                                                                
</head>
<body class="<?php if($status){echo 'admin';}?>" > 

    <!--
        Ignora esta parte, no vale descomentar
    <div class="circulo">
        <div class="circulo__cont">
            <p>sadsadsadsadsadsadsadsadsadsa</p>
        </div>
    </div>
    -->
    <header class="header">
        <nav class="nav"> 
            <div>
                <img src="imagenes/logo.png" alt="" class="site-logo" >
            </div>
            <input type="checkbox" id="check">
            <label for="check" class="bar-btn">
                <i class="fas fa-bars"></i>
            </label>

            <ul class="nav_menu">
                <li id="home_menu_header" class="nav_menu__li" > 
                    <a href="#home" class="nav_menu__li__a active">Home</a>
                </li>
                <li id="about_menu_header" class="nav_menu__li"> 
                    <a href="#about" class="nav_menu__li__a">About</a>
                </li>
                <li id="albums_menu_header" class="nav_menu__li"> 
                    <a href="#albums" class="nav_menu__li__a">Albums</a>
                </li>
                <li id="contact_menu_header" class="nav_menu__li"> 
                    <a href="#contact" class="nav_menu__li__a">Contact</a>
                </li>
                <li class="nav_menu__li nav_menu__li--redes">
                    <a href="https://www.facebook.com/profile.php?id=100081935944987" class="nav_menu__li__a">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                
                
                    <a href="https://instagram.com/lucasgabrielph" class="nav_menu__li__a" target="_BLANK">
                        <i class="nav_menu__li__i fab fa-instagram" aria-hidden="true"></i>
                    </a>
                
                
                    <a href="" class="nav_menu__li__a" target="_BLANK">
                        <i class="nav_menu__li__i fab fa-whatsapp" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home" class="home_section section">
            <div class="logo">
                <img src="imagenes/logo.png" class="logo__img animation--bottom" alt="Banner - Lucas Gabriel">  
                <div class="logo__p animation--bottom">
                    <p class="logo__p--name">LUCAS</p>
                    <p class="logo__p--name">GABRIEL</p>
                    <p class="logo__p--ofice">PHOTOGRAPHY</p>
                </div>
            </div>
        </section>
        <section id="about" class="about_section section">
            <div class="main">
                <img src="imagenes/imagenAbout1.jpg" class="animation--bottom" alt="">
                <div class="about-text animation--bottom">
                    <h1>¿QUIEN SOY?</h1>
                    <p>
                    ‌Mi nombre es Lucas Gabriel Carmelo, vivo en Argentina mas precisamente en Buenos Aires tengo 21 años y me dedico principalmente a la fotografía de retrato, fotografía de moda y fotografía de producto, espero que disfrutes de mi trabajo!
                    </p>
                </div>
            </div>
        </section>
        <section id="albums" class="album_section section">
            <h1 class="animation--bottom">ALBUMS</h1>
            <div class="carrusel__cont">
                <div id="arrow-left" class="arrow arrow--left"> < </div>
                <div id="arrow-right" class="arrow arrow--right"> > </div>
                
                <div id="carrusel" class="carrusel">
              
                    <?php 
                    if($_SESSION["active"]){ ?>
                    <div id="add__album" class="containerImagen containerImagen--add">
                        <div  class="containerImagen__icon">
                            <i class="fa fa-plus"></i>

                        </div>
                    </div>
                    <?php 
                        }
                    foreach ($arrayAlbum as &$album) {
                            $arrayFoto = $tableFoto->getForAlbum($album["id"]);       ?>
                            <div 
                                onmouseover="cambiarImagenes(
                                    '<?php echo "album-" . $album["id"];?>',
                                    <?php
                                    $cont = 0;
                                    echo "[";
                                    foreach ($arrayFoto as &$foto) {
                                        $cont++;
                                        echo "'" .  $foto['srcFoto'] . "',";
                                        if($cont > 5){
                                            break;
                                        }
                                    }
                                    echo "]";
                                    ?>
                                )" 
                                class="containerImagen ">
                                <img id='<?php echo "album-" . $album["id"];?>'  
                                    src="
                                    admin/models/img/<?php echo $arrayFoto[0]['srcFoto'];?>
                                    " 
                                    alt="" 
                                    class="carrusel__img elemento"
                                >
                                <div class="carrusel__img__description">
                                    <h3 class="img__description__h3"><?php echo $album["titulo"]; ?></h3>
                                    <p class="img__description__p"><?php echo $album["descripcion"]; ?></p>
                                    <button 
                                        onclick='modalImg(<?php echo json_encode($album);?>,<?php echo json_encode($arrayFoto);?>,"<?php echo $token;?>", <?php echo $_SESSION['active'];?>)'
                                        class="img__description__button">ver</button>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            
        </section>

        <section id="contact" class="contact contact_section section contact--focus">
            <form id="id_form" class="form_box" method="POST" action="correo.php">
                <h1 class="from__h1">Contactame</h1>
                <div class="input_box animation--bottom">
                    <input type="text" class="form__input" name="nombre" placeholder="Nombre">
                </div>
                <div class="input_box animation--bottom">
                    <input type="email"  class="form__input" name="correo" placeholder="Email">
                </div>
                <div class="input_box animation--bottom">
                    <input type="text"  class="form__input" name="asunto" placeholder="Asunto">
                </div>
                <div class="input_box animation--bottom">
                    <textarea  class="form__input--textarea" name="mensaje" placeholder="Mensaje" maxlength="200"></textarea>
                </div>
                <div class="button">
                    <input type="submit" class="form__input form__input--submit" value="Enviar">
                </div>
            </form>

        </section>






        <!-- Model pero para probar y preparar -->
        <div id="cont" class="cont">
            <div id="cont__exit" class="cont__exit">
           <p>x</p>
            </div>
            <div id="modal" class="modal claro">
           
                
            
            </div>
           
        </div>

    </main>
</body>

<script src="js/main.js"></script>
<script src="js/animation.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<footer class="footer">
        <div class="footer__block footer__media">
                    <a href="https://www.facebook.com/lu.de.luck/" rel="Facebook del autor" class="icon" target="_BLANK"><i class="fab fa-facebook-square footer__icon"></i>
                    <a href="https://www.instagram.com/lugically_cosmic2.2/" rel="instagram del autor" class="icon" target="_BLANK"><i class="fab fa-instagram footer__icon"></i></a>
                    <a href="https://twitter.com/Lu_Of_Luck" rel="Twitter del autor" class="icon" target="_BLANK"> <i class="fab fa-twitter footer__icon"></i></a>    
        </div>
		<div class="footer__block footer__aviso">
			<p>lucasGabrielPh © 2022</p>
		</div>
	</footer> 



</html>