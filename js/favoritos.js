/*Funcion de Capturar, Almacenar datos y Limpiar campos*/
            $(document).ready(function(){    
            $('#boton-favoritos').click(function(){        
                /*Captura de datos escrito en los inputs*/        
                var nom = document.getElementById("nombretxt").value;
               
                /*Guardando los datos en el LocalStorage*/
                localStorage.setItem("Nombre", nom);
               
                /*Limpiando los campos o inputs*/
                document.getElementById("nombretxt").value = "";
             
            });   
        });

        /*Funcion Cargar y Mostrar datos*/
        $(document).ready(function(){    
            $('#boton-cargar').click(function(){                       
                /*Obtener datos almacenados*/
                var nombre = localStorage.getItem("Nombre");
               
                /*Mostrar datos almacenados*/      
                document.getElementById("nombre").innerHTML = nombre;
                
            });   
        });