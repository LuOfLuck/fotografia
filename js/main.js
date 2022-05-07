
const carruceImg = document.querySelectorAll(".elemento");

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
            e.src = imagenes[indiceImagenes];
            if(indiceImagenes<3){
                indiceImagenes++;
            }else{
                indiceImagenes=0;
            }
        }
        const cambiarImg = setInterval(cambiarImagenes, 500);
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