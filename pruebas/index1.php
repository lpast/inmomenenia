<html>
    <head>            
        <title>Ejemplo LocalStorage</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">     </script>
        <script>
            /*Funcion de Capturar, Almacenar datos y Limpiar campos*/
            $(document).ready(function(){    
            $('#boton-guardar').click(function(){        
                /*Captura de datos escrito en los inputs*/        
                var nom = document.getElementById("nombretxt").value;
                var apel = document.getElementById("apellidotxt").value;
                /*Guardando los datos en el LocalStorage*/
                localStorage.setItem("Nombre", nom);
                localStorage.setItem("Apellido", apel);
                /*Limpiando los campos o inputs*/
                document.getElementById("nombretxt").value = "";
                document.getElementById("apellidotxt").value = "";
            });   
        });

        /*Funcion Cargar y Mostrar datos*/
        $(document).ready(function(){    
            $('#boton-cargar').click(function(){                       
                /*Obtener datos almacenados*/
                var nombre = localStorage.getItem("Nombre");
                var apellido = localStorage.getItem("Apellido");
                /*Mostrar datos almacenados*/      
                document.getElementById("nombre").innerHTML = nombre;
                document.getElementById("apellido").innerHTML = apellido; 
            });   
        });
        </script>
    </head>
    <body>
        
<center><h1>Ejemplo - localStorage</h1>
              
<input type="text" placeholder="Nombre" id="nombretxt"><br><br>   
<input type="text" placeholder="Apellido" id="apellidotxt"><br><br>
<button id="boton-guardar">Guardar</button><br>
           
<hr />
Nombre almacenado:
<label type="text" id="nombre"></label><br>                          
Apellido almacenado:
<label "text" id="apellido"></label><br>

<button id="boton-cargar">
Cargar elementos
</button>
</center>

<hr />

</body> 
</html>