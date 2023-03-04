<?php

namespace Supertienda;

class Registro{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    public function registro($nombre_usuario, $clave, $correo){
        $sql = "INSERT INTO `usuarios`(`nombre_usuario`, `clave`, `correo`) 
        VALUES (:nombre_usuario,:clave,:correo)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre_usuario"=> $nombre_usuario,
            ":clave" => $clave,
            ":correo" => $correo
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }



  }