<?php

require "conexion.php";


    //recuperar las variables
    $nameE=$_POST['g70-equipo'];
    $nombreArea=$_POST['g70-area'];
    $texto=$_POST['Descripcion'];
    

    if (isset($nameE) || isset($nombreArea) || isset($texto)) 
    {
          // SE EJECUTA LA PRIMER INSERCIÓN A LA TABLA NO. 1
    $insertarEquipo=$mysqli->query("INSERT INTO equipo (nameE) VALUES ('$nameE')");
    
    if ($insertarEquipo==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA 2
    {
    $insertarArea=$mysqli->query("INSERT INTO area (nombreArea) VALUES ('$nombreArea')");
    }

    if ($insertarArea==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA 3
    {
    $insertarDescripcion=$mysqli->query("INSERT INTO descripcion (texto) VALUES ('$texto')");
    }

    if($insertarDescripcion==true)// MENSAJE DE CONFIRMACIÓN DE INSERCIÓN
    {
    echo "<center><strong><h4>¡INSERCIÓN EXITOSA!<BR><a href='index.php'>VOLVER</a></strong></h4></center>";
    echo"<br> <center><h4><a href='reporte.php'>Reporte</a></h4></center>";
    }
    
    }else{
      
    echo " ¡Existen campos vacíos!";

    }


    


    $fi=fopen("prueba12.txt","a")
    or die("problemas al crear el archivo");


    fwrite($fi,"Datos:");
    fwrite($fi, "\n");
    fwrite($fi,$_POST['g70-equipo']);
    fwrite($fi,"\n");
    fwrite($fi,$_POST['g70-area']);
    fwrite($fi,"\n");
    fwrite($fi,$_POST['Descripcion']);
    fwrite($fi,"------------------------\n\n");
   

    fclose($fi);

    echo " Ordenes Guardadas!!!";


    ?>