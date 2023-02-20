
window.onload = function() {
  var boton = document.getElementById("no_favorito");
  var favorito = document.getElementById("nuevo_favorito");

  favorito.addEventListener('click',cambiarImagen);

  function cambiarImagen() {
      
      if (favorito.innerHTML == 'Añadir favorito') {
          boton.setAttribute ('id','si_favorito');   
          boton.setAttribute ('src','../media/iconos/si-favorito.png'); 
          favorito.value == 'Borrar favorito';
          favorito.innerHTML = 'Borrar favorito';
      } else {
          boton.setAttribute ('id','no_favorito');   
          boton.setAttribute ('src','../media/iconos/no-favorito.png'); 
          favorito.value == 'Añadir favorito';
          favorito.innerHTML = 'Añadir favorito'; 
      }
  }
}
