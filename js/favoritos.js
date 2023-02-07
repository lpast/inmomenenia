
    window.onload = function(){
        var favorito = document.getElementById("favorito");
        favorito.addEventListener('mouseout',imagenInicial);
        favorito.addEventListener('mouseover',cambiarImagen);
    
        
        function cambiarImagen(){
            favorito.setAttribute('src','../media/iconos/si-favorito.png');   
        }
    
        function imagenInicial(){
            favorito.setAttribute('src','../media/iconos/no-favorito.png');
        }
    }