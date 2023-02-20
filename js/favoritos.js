
    window.onload = function() {
        var boton = document.getElementById("no_favorito");
        var favorito = document.getElementById("nuevo_favorito");

        favorito.addEventListener('click',cambiarImagen);
 
        function cambiarImagen() {
            boton.setAttribute('id','si_favorito');   
            boton.setAttribute('src','../media/iconos/si-favorito.png');  
        }
    }