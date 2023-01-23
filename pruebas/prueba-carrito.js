
// cuando se pulsa en "agregar a favoritos"
document.getElementById("agregar-favoritos").addEventListener("click", function(e) {

  // hacemos que no se ejecute el enlace
  e.preventDefault();

  // leemos los datos clave del producto y los guardamos en un objeto
  var datos = {
    id: document.getElementById("id").value,
    direccion: document.getElementById("producto-nombre").textContent,
    url: document.location.href
  };

  // leemos los favoritos del localStorage
  var favoritos = localStorage.getItem("favoritos") || "[]";
  favoritos = JSON.parse(favoritos);

  // buscamos el producto en la lista de favoritos
  var posLista = favoritos.findIndex(function(e) { return e.id == datos.id; });
  if (posLista > -1) {
    // si está, lo quitamos
    favoritos.splice(posLista, 1);
  } else {
    // si no está, lo añadimos
    favoritos.push(datos);
  }

  // guardamos la lista de favoritos 
  localStorage.setItem("favoritos", JSON.stringify(favoritos));

});