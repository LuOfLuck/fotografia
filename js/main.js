const carruceImg = document.querySelectorAll(".elemento");
const modal = document.getElementById("modal");
const modalImgs = document.querySelectorAll(".modal__img");


const addAlbum = document.getElementById("add__album");
const cont = document.getElementById("cont");
const contExit = document.getElementById("cont__exit")



const MovCarrucel = ()=>{
    const carrusel = document.getElementById("carrusel");
    const arrowLeft = document.getElementById("arrow-left");
    arrowLeft.addEventListener("click", ()=>{
        carrusel.scrollLeft -= 100;
    })    
    const arrowRight = document.getElementById("arrow-right");
    arrowRight.addEventListener("click", ()=>{
        carrusel.scrollLeft += 100;
    })
}
MovCarrucel()


    function cambiarImagenes(idAlbum, imagenes){
        var indiceImagenes=0;
        console.log(idAlbum +" --- " + imagenes[2])
        const e = document.getElementById(idAlbum)
        console.log(e)
        function cambiarImagenesDelay(  ){
            e.classList.add("img--uptadate")
            setTimeout(()=>{
                e.src = "admin/models/img/" + imagenes[indiceImagenes];
                if(indiceImagenes<3){
                    indiceImagenes++;
                }else{
                    indiceImagenes=0;
                }
                e.classList.remove("img--uptadate");
            }, 300);

        }
        if(imagenes.length > 0){
            const cambiarImg = setInterval(cambiarImagenesDelay, 1500);
            e.addEventListener("mouseout", ()=>{
                    clearInterval(cambiarImg);
            })
        }
        e.addEventListener("click", ()=>{
            const descripcionBox = e.nextElementSibling;
            descripcionBox.classList.add("carrusel__img__description--active");

        });
    }

carrusel.addEventListener("click", (element) => {
    if(element.target.tagName == "BUTTON"){
        cont.classList.add("cont--active");
    }
})

            



const formContact = document.getElementById("id_form");
const contact = formContact.parentNode;
document.addEventListener("click", (e)=>{
    if(e.target.tagName == "INPUT"){
        contact.classList.add("contact--focus");
        //window.location.href ="#contact";
    }else{
        contact.classList.remove("contact--focus")
    }
});




modal.addEventListener("scroll", ()=>{
    let bloqueDentro = document.querySelectorAll('.animation--bottom');
    for (let i = 0; i < bloqueDentro.length; i++){
        let heightPantalla = window.innerHeight;
        let bloqueDentroTop = bloqueDentro[i].getBoundingClientRect().top;
        let mostrar = 100;
        if(bloqueDentroTop < heightPantalla - mostrar){
            bloqueDentro[i].classList.add('active');
        }else{
            bloqueDentro[i].classList.remove('active');
        }
    }
})

function modalImg(album, fotos, coken,active){
    modal.insertAdjacentHTML('afterbegin', `
        <div class="modal__header">
            <h1 class="modal__header__h1">${album.titulo} <span class="modal__header__span">${album.fecha}</span></h1>
            <p class="modal__header__p"> 
                ${album.descripcion}
            </p>
        </div>
        <div class="modal__body">
            <div class="row">   
                <div id="column" class="column">
                                    
                </div>
            </div>
            <a onclick="deleteAlbum(${album.id})" class="modal_icon"><i class="fa fa-trash"></i></a>
        </div>
        
    `);    
    var modalColumn = document.getElementById("column");
    if(active){
        modalColumn.insertAdjacentHTML('beforeend', `
            <form action="admin/models/urls.php" method="POST" enctype='multipart/form-data' class='custom__form'>
                <input type="hidden" name="album_id" value="${album.id}">
                <input type="hidden" name="CSRFToken" value="${coken}">
                <input type="hidden" name="addImg" value="addImg">
                <div class="custom__image-container">
                    <label id="add-img-label" for="image-input">+</label>
                    <input type="file" name="img[]" id="image-input" multiple="multiple" requerid>
              </div>
            <input type="submit" value="enviar">
            </form>
        `)
    }
    fotos.forEach((foto) =>{
        modalColumn.insertAdjacentHTML('beforeend', `
            <div id="imagen-${foto.id}" class="colum__img">
                <img class="modal__img" alt="${foto.descripcion}" src="admin/models/img/${foto.srcFoto}" >
                <div onclick="deleteImg(${foto.id}, '${foto.srcFoto}')" class="modal__before">
                    <span>x</span>
                </div>
            </div
        `)
    });
}        
/*
    esta dentro de un if porque este elemento solo se crea
    cuando el la sesion esta iniciada, de otro modo queda como codigo erroneo*/                              
if(addAlbum){
    addAlbum.addEventListener("click", ()=>{
        cont.classList.add("cont--active", "cont--active--form")

        modal.insertAdjacentHTML('beforeend', `
            <div class="modal__header">
                <h1 class="modal__header__h1">AGREGAR ALBUM</h1>
                <form action="admin/models/urls.php" method="POST" class="form__modal">
                    <input type="hidden" name="CSRFToken" value="<?php echo $_SESSION['CSRFToken']; ?>">
                    <input type="hidden" name="crearAlbum" value="True">
                    <input type="text" name="titulo" id="id_titulo" placeholder="Titulo" class="modal__input_txt">
                    <label for="id_descripcion"></label>
                    <textarea name="descripcion" id="id_descripcion" placeholder="Descricpion" class="modal__input_txt"></textarea>
                    <input type="submit" value="Enviar" class="modal__input_enviar">
                </form>
            </div>
        `);
    })
}

contExit.addEventListener("click", ()=>{
    cont.classList.remove("cont--active", "cont--active--form");
    modal.innerHTML = "";
})

const check = document.getElementById("check");
const menuList = document.getElementsByClassName("nav_menu__li__a");
for(elementoList of menuList){
    elementoList.addEventListener("click", (e)=>{
        check.checked = false; 
    })
}
const section = document.getElementsByClassName("section")
window.addEventListener("scroll", ()=>{
    let valor = 570;
    for(let i = 0; i < section.length; i++){
        let sectionTop = section[i].getBoundingClientRect().top;
        //console.log(section[i].id + "----" + sectionTop)
            if(sectionTop < 10){    
                for(let i2 = 0; i2 < menuList.length; i2++){
                    menuList[i2].classList.remove("active");
                }
                menuList[i].classList.add("active")
            }
    }
})

document.addEventListener("click", (e)=>{
    if (!(e.target.classList.contains("carrusel__img"))){
        const imagenes = document.querySelectorAll(".carrusel__img__description--active");
        for (imagen of imagenes){
            imagen.classList.remove("carrusel__img__description--active")
        }
    }
})