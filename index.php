<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="jquery-3.1.1.js"></script>
	<script src="artyom.min.js"></script>
	<script src="artyomCommands.js"></script>
	     

	<style>
		.contenedor{
			width: 60%;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
</head>
<body>


   <form action="guardar.php" method="post" name="frm" id="frm">

	<header class="entry-header">
		<h1 class="entry-title"><center>ORDENES DE TRABAJO</center></h1>	</header><!-- .entry-header -->

		<br><br><br>

	
	<div class="contenedor">		
	
		<!-- botonera -->

          <div>
              <label for='g70-nombre' class='grunion-field-label name'>Equipo<span></span></label>
              <input type='text' name='g70-equipo' id='g70-nombre' value='' class='name'  required aria-required='true'/>
             </div>

             
		<br><br><br>

		<div>
              <label for='g70-nombre' class='grunion-field-label name'>Area<span></span></label>
              <input type='text' name='g70-area' id='g70-nombre' value='' class='name'  required aria-required='true'/>
             </div>

             <br>

		<div style="float: left;padding: 20px;">
			<input type="button" onclick="startArtyom();" value="Descripción Actividad" >
			<input type="button" onclick="stopArtyom();" value="Stop">
			<textarea id="salida" rows="20" cols="100" name='Descripcion' required></textarea>
		</div>


		<!-- Menu -->
		
		

		<div style="padding: 20px;">
			
			<textarea id="leer" rows="4" cols="100">Escribe un texto para leerlo</textarea>
			<input type="button" id="btnLeer" value="Leer">
		</div>

		<input type="submit"  value="Guardar" />

		<div style="float: right;padding: 20px;">
			<a href="http://www.facebook.com" target="_blank" id="uno">Facebook</a> | 
			<a href="https://www.youtube.com" target="_blank" id="dos">Youtube</a> | 
			<a href="https://twitter.com/iniciarsesion?lang=es" target="_blank" id="tres">Twitter</a> | 
			<a href="https://www.google.com/" target="_blank" id="cuatro">Google</a> | 
		</div>

	</div>

	<script>

	// $(document).ready(function() {

		$('#uno').mouseover(function() {
			artyom.say("enlace 1")
		});

		$('#uno').mouseout(function() {
			artyom.shutUp();
		});

		$('#dos').mouseover(function() {
			artyom.say("enlace 2")
		});

		$('#tres').mouseover(function() {
			artyom.say("enlace 3")
		});

		$('#cuatro').mouseover(function() {
			artyom.say("enlace 4")
		});

		//El sistema responde
		artyom.addCommands([
			{
				indexes:["buenos días",'cuál es tu banda favorita','Saluda a mis seguidores'],
				action: function(i){
					if (i==0) {
						artyom.say("Hola Raul, buenos dias");
					}
					if (i==1) {
						artyom.say("Raul, me gusta tu banda BLESS");
					}
					if (i==2) {
						artyom.say("Hola gente, espero les este yendo muy bien y que este tutorial les ayude de mucho. Saludos");
					}
				}
			},
			{
				indexes:['me voy','chau'],
				action: function(){
					alert('ok, chau');					
				}
			},
			{
				indexes:['abrir google','abrir facebook', 'abrir youtube'],
				action: function(i){
					if (i==0) {
						artyom.say("Abriendo google");
						window.open("http://www.google.com",'_blank');
					}
					if (i==1) {
						artyom.say("Abriendo facebook");
						window.open("http://www.facebook.com/intecsolt/",'_blank');
					}
					if (i==2) {
						artyom.say("Abriendo youtube");
						window.open("https://www.youtube.com/channel/UCF721oswf7EUSsQbuGFoMZQ",'_blank');
					}
				}
			},
			{
				indexes:['limpiar'],
				action: function(){
					$('#salida').val('');
				}
			}
		]); 

		// Escribir lo que escucha.
		artyom.redirectRecognizedTextOutput(function(text,isFinal){
			var texto = $('#salida');
			if (isFinal) {
				texto.val(text);
			}else{
				
			}
		});


		//inicializamos la libreria Artyom
		function startArtyom(){
			artyom.initialize({
				lang: "es-ES",
				continuous:true,// Reconoce 1 solo comando y para de escuchar
	            listen:true, // Iniciar !
	            debug:true, // Muestra un informe en la consola
	            speed:1 // Habla normalmente
			});
		};
		
		// Stop libreria;
		function stopArtyom(){
			artyom.fatality();// Detener cualquier instancia previa
		};

		// leer texto
		$('#btnLeer').click(function (e) {
            e.preventDefault();
            var btn = $('#btnLeer');
            if (artyom.speechSupported()) {
                btn.addClass('disabled');
                btn.attr('disabled', 'disabled');

                var text = $('#leer').val();
                if (text) {
                    var lines = $("#leer").val().split("\n").filter(function (e) {
                        return e
                    });
                    var totalLines = lines.length - 1;

                    for (var c = 0; c < lines.length; c++) {
                        var line = lines[c];
                        if (totalLines == c) {
                            artyom.say(line, {
                                onEnd: function () {
                                    btn.removeAttr('disabled');
                                    btn.removeClass('disabled');
                                }
                            });
                        } else {
                            artyom.say(line);
                        }
                    }
                }
            } else {
                alert("Your browser cannot talk !");
            }
        });

	// });
	</script>
	</form>
</body>
</html>