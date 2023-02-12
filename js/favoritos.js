
    window.onload = function(){
        var favorito = document.getElementById("no_favorito");
       
        favorito.addEventListener('click',cambiarImagen);
        
           
        function cambiarImagen(){
            favorito.setAttribute('id','si_favorito');   
            favorito.setAttribute('src','../media/iconos/si-favorito.png');   
        }


      
     /*
         var favorito = document.getElementById("si_favorito");
         favorito.addEventListener('click',imagenInicial);
        function imagenInicial(){
            favorito.setAttribute('id','no_favorito');
            favorito.setAttribute('src','../media/iconos/no-favorito.png');
        }
        */
    }