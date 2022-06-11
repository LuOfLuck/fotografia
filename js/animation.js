document.addEventListener("scroll", ()=>{
    let bloqueDentro = document.querySelectorAll('.animation--bottom');
    for (let i = 0; i < bloqueDentro.length; i++){
        let heightPantalla = window.innerHeight;
        let bloqueDentroTop = bloqueDentro[i].getBoundingClientRect().top;
        let mostrar = 50;
        if(bloqueDentroTop < heightPantalla - mostrar){
            bloqueDentro[i].classList.add('active');
        }else{
            bloqueDentro[i].classList.remove('active');
        }
    }
})