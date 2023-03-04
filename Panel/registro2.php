<?php

if($_SERVER['REQUEST_METHOD'] ==='POST'){

  $nombre_usuario = $_POST['nombre_usuario'];
  $clave = $_POST['clave'];
  $correo = $_POST['correo'];

    require '../vendor/autoload.php';
    $registro = new Supertienda\Registro;
    $resultado = $registro->registro($nombre_usuario, $clave, $correo);


    if($resultado){

      header('Location: index.php');

    }else{
      exit(json_encode(array('estado' => FALSE,'mensaje' => 'Error al registrar')));
    }

}