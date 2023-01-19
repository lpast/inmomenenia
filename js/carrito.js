const btnAddDeseo = document.querySelectorAll('.btnAddDeseo');
let listaDeseo = [];
document.addEventListener('DOMContentLoaded', function() {
    for (let i=0; i < btnAddDeseo.lenght; i++) {
        btnAddDeseo[i].addEventListener('click', function() {
            let idProducto =btnAddDeseo[i].getAttribute('prod');
            console.log (idProducto);
            agregarFavorito(idProducto);
        })

    }
})

function agregarFavorito(idProducto) {
    listaDeseo.push({
        'id':idProducto,
        'cantidad':1
    })
    localStorage.setItem('listaDeseo',JSON.stringify(listaDeseo));
    cantidadDeseo();
}

function cantidadDeseo() {
    let listas = JSON.parse(localStorage.getItem('listaDeseo'));
    console.log(listas);
}