const carruceImg = document.querySelectorAll(".elemento");
const modal = document.getElementById("modal");
const modalImgs = document.querySelectorAll(".modal__img");
const MovCarrucel = ()=>{
    const carrusel = document.getElementById("carrusel");
    const arrowLeft = document.getElementById("arrow-left");
    arrowLeft.addEventListener("click", ()=>{
        carrusel.scrollLeft -= 400;
    })    
    const arrowRight = document.getElementById("arrow-right");
    arrowRight.addEventListener("click", ()=>{
        carrusel.scrollLeft += 400;
    })
}
MovCarrucel()
var imagenes=[
    'imagenes/img11.jpg',
    'imagenes/img9.jpg',
    'imagenes/img4.jpg',
    'imagenes/img12.jpg'
];
var indiceImagenes=0;

carruceImg.forEach((e)=>{
    e.addEventListener('mouseover', function (){
        function cambiarImagenes(){
            e.classList.add("img--uptadate")
            setTimeout(()=>{
                e.src = imagenes[indiceImagenes];
                if(indiceImagenes<3){
                    indiceImagenes++;
                }else{
                    indiceImagenes=0;
                }
                e.classList.remove("img--uptadate");
            }, 500);

        }
        const cambiarImg = setInterval(cambiarImagenes, 2000);
        e.addEventListener("mouseout", ()=>{
                clearInterval(cambiarImg);
        })
        e.addEventListener("click", ()=>{
            console.log(e)
            const descripcionBox = e.nextElementSibling;
            descripcionBox.classList.add("carrusel__img__description--active");
            descripcionBox.addEventListener("click", (elem)=>{
                if(elem.target.tagName == "BUTTON"){
                    descripcionBox.classList.remove("carrusel__img__description--active");
                }
            });
        });
    });
});







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