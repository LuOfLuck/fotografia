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
<body>
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
                <li class="nav_menu__li">
                    <a href="#" class="nav_menu__li__a">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav_menu__li">
                    <a href="https://instagram.com/lucasgabrielph" class="nav_menu__li__a" target="_BLANK">
                        <i class="nav_menu__li__i fab fa-instagram" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav_menu__li">
                    <a href="" class="nav_menu__li__a" target="_BLANK">
                        <i class="nav_menu__li__i fab fa-whatsapp" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home" class="home_section">
            <div class="logo">
                <img src="imagenes/logo.png" class="logo__img" alt="Banner - Lucas Gabriel">  
                <div class="logo__p">
                    <p class="logo__p--name">LUCAS</p>
                    <p class="logo__p--name">GABRIEL</p>
                    <p class="logo__p--ofice">PHOTOGRAPHY</p>
                </div>
            </div>
        </section>
        <section id="about" class="about_section">
            <div class="main">
                <img src="imagenes/img5.jpg" alt="">
                <div class="about-text">
                    <h1>QUIEN SOY?</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Sint sapiente mollitia facere doloremque, provident aut 
                            accusamus nesciunt est eos nam vero error numquam dolores
                            reiciendis tempore suscipit voluptatum cupiditate a.</p>
                    </div>
                </div>
        </section>
        <section id="albums" class="album_section">
            <div id="arrow-left" class="arrow arrow--left"> < </div>
            <div id="arrow-right" class="arrow arrow--right"> > </div>
            <div id="carrusel" class="carrusel">
                <div class="containerImagen"> 
                    <img src="imagenes/img9.jpg" alt="" class="carrusel__img elemento">
                    <div class="carrusel__img__description">
                        <h3 class="img__description__h3">titulo</h3>
                        <p class="img__description__p">descricpion de lo que tendria que ver en pocas palabras porque si son muchas...</p>
                        <button class="img__description__button">exit</button>
                    </div>
                </div>
                <div class="containerImagen">
                    <img src="imagenes/lucasImg (1).jpg" alt="" class="carrusel__img elemento">
                    <div class="carrusel__img__description">
                        <h3 class="img__description__h3">titulo</h3>
                        <p class="img__description__p">descricpion de lo que tendria que ver en pocas palabras porque si son muchas...</p>
                        <button class="img__description__button">exit</button>
                    </div>
                </div>
                <div class="containerImagen">
                    <img src="imagenes/img4.jpg" alt="" class="carrusel__img elemento">
                    <div class="carrusel__img__description">
                        <h3 class="img__description__h3">titulo</h3>
                        <p class="img__description__p">descricpion de lo que tendria que ver en pocas palabras porque si son muchas...</p>
                        <button class="img__description__button">exit</button>
                    </div>
                </div>
                <div class="containerImagen">
                    <img src="imagenes/lucasImg(7).jpg" alt="" class="carrusel__img elemento">
                    <div class="carrusel__img__description">
                        <h3 class="img__description__h3">titulo</h3>
                        <p class="img__description__p">descricpion de lo que tendria que ver en pocas palabras porque si son muchas...</p>
                        <button class="img__description__button">exit</button>
                    </div>
                </div>  
                <div class="containerImagen">
                    <img src="imagenes/lucasImg(7).jpg" alt="" class="carrusel__img elemento">
                    <div class="carrusel__img__description">
                        <h3 class="img__description__h3">titulo</h3>
                        <p class="img__description__p">descricpion de lo que tendria que ver en pocas palabras porque si son muchas...</p>
                        <button class="img__description__button">exit</button>
                    </div>
                </div>  
                <div class="containerImagen">
                    <img src="imagenes/lucasImg(7).jpg" alt="" class="carrusel__img elemento">
                    <div class="carrusel__img__description">
                        <h3 class="img__description__h3">titulo</h3>
                        <p class="img__description__p">descricpion de lo que tendria que ver en pocas palabras porque si son muchas...</p>
                        <button class="img__description__button">exit</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact contact_section contact--focus">
            <form id="id_form" class="form_box" method="POST">
                <h1 class="from__h1">Contactame</h1>
                <div class="input_box">
                    <input type="text" class="form__input" name="nombre" placeholder="Nombre">
                </div>
                <div class="input_box">
                    <input type="email"  class="form__input" name="correo" placeholder="Email">
                </div>
                <div class="input_box">
                    <input type="text"  class="form__input" name="asunto" placeholder="Asunto">
                </div>
                <div class="input_box">
                    <textarea  class="form__input--textarea" name="mensaje" placeholder="Mensaje" maxlength="200"></textarea>
                </div>
                <div class="button">
                    <input type="submit" class="form__input form__input--submit" value="Enviar">
                </div>
            </form>

        </section>






        <!-- Model pero para probar y preparar -->
        <div class="cont">
            <div class="cont__exit">
            </div>
            <div id="modal" class="modal claro">
                <div class="modal__header">
                    <h1 class="modal__header__h1">ALBUM DE PRUEBA <span class="modal__header__span">16/03/2022</span></h1>
                    <p class="modal__header__p"> 
                        No Quiero usar Lorem porque se ve un toque mas raro,del mismo modo tengo que escribir algo para rellenar ette campo y probar la tipografia asi que bueno, copiaria y pegaria algun txto random pero tampoco esta tan maaaaal escribir lo que sea dea.<br>
                        Hoy me comi mandarias, son ricas, taban dulce, 80 pe el kilo, nada mal.
                    </p>
                </div>
                <div class="modal__body">
                    <div class="row">
                        <!--  HASTA 5 IMG POR COLUMNA -->
                        <!-- RES: ¡¡¡CLARISIMO SEÑORITA JUANA!!!! -->
                        <div class="column">
                            <img class="modal__img" alt="imagen1" src="imagenes/img11.jpg" >
                            <img class="modal__img" alt="imagen2" src="imagenes/img12.jpg" >
                            <img class="modal__img" alt="imagen3" src="imagenes/img9.jpg" >
                            <img class="modal__img" alt="imagen4" src="imagenes/img4.jpg" >
                            <img class="modal__img" alt="imagen5" src="imagenes/img5.jpg" >
                        </div>
                        <div class="column">
                            <img class="modal__img" alt="imagen1" src="imagenes/img8.jpg" >
                            <img class="modal__img" alt="imagen2" src="imagenes/img11.jpg" >
                            <img class="modal__img" alt="imagen3" src="imagenes/img8.jpg" >
                            <img class="modal__img" alt="imagen4" src="imagenes/img9.jpg" >
                            <img class="modal__img" alt="imagen5" src="imagenes/img10.jpg" >
                        </div>
                        <div class="column">
                            <img class="modal__img" alt="imagen1" src="imagenes/img11.jpg" >
                            <img class="modal__img" alt="imagen2" src="imagenes/img12.jpg" >
                            <img class="modal__img" alt="imagen3" src="imagenes/img5.jpg" >
                            <img class="modal__img" alt="imagen4" src="imagenes/img9.jpg" >
                            <img class="modal__img" alt="imagen5" src="imagenes/img5.jpg" >
                        </div>
                        <div class="column">
                            <img class="modal__img" alt="imagen1" src="imagenes/img6.jpg" >
                            <img class="modal__img" alt="imagen2" src="imagenes/img2.jpg" >
                            <img class="modal__img" alt="imagen3" src="imagenes/img8.jpg" >
                            <img class="modal__img" alt="imagen4" src="imagenes/img12.jpg" >
                            <img class="modal__img" alt="imagen5" src="imagenes/img11.jpg" >
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>
</body>
<script src="js/main.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script><footer>
</footer>
</html>