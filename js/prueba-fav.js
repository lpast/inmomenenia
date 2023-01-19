
// cuando se pulsa en "agregar a favoritos"

 document.getElementById("btnAddDeseo").addEventListener("click", function(e) {




  // hacemos que no se ejecute el enlace
  e.preventDefault();

  // leemos los datos clave del producto y los guardamos en un objeto
  var datos = {
    id: document.getElementById("id").value,
   
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


// leemos los favoritos del localStorage
var favoritos = localStorage.getItem("favoritos") || "[]";
favoritos = JSON.parse(favoritos);

// creamos una lista
var ul = document.createElement("ul");
// para cada producto en favoritos
for (var x = 0; x < favoritos.length; x++) {
  // creamos un elemento de lista
  var li = document.createElement("li");
  // con un enlace al producto
  var a = document.createElement("a");
  a.href = favoritos[x].url;
  a.textContent = favoritos[x].nombre;
  li.appendChild(a);
  ul.appendChild(li);
}
// agregamos el producto donde correspona
document.querySelector("#favoritos").appendChild(ul);

 });
