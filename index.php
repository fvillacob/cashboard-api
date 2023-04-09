
<?php

# Importamos librerias y clases
require 'flight/Flight.php';
require "util/Constantes.php"; 
require "delegate/Delegate.php";

# Declaramos variables
use util\Constantes;
use delegate\Delegate;
use dao\sentencias;



# Conectamos a la BD
Flight::register('db', 'PDO', array('mysql:host=' . Constantes::$DATABASE_HOST . ";dbname=" .  Constantes::$DATABASE_NAME  ,  Constantes::$DATABASE_USER   ,  Constantes::$DATABASE_PASS    ) );



Flight::route('/', function () {
    include 'intro.php';
});



#Listar todos los usuarios
Flight::route('GET /getUsuarios', function () {
    $delegate = new Delegate();
    $result = $delegate->listar_all_usuarios();
    return Flight::json($result); ;
});



#obtiene un usuario
Flight::route('GET /getUsuarioID/@id', function ( $id ) {
    $delegate = new Delegate();
    $result = $delegate->getUsuario( $id , sentencias::$SELECT_USER_ID );
    return Flight::json($result);
});



#obtiene un usuario
Flight::route('GET /getUsuarioCode/@code', function ( $code ) {
    $delegate = new Delegate();
    $result = $delegate->getUsuario( $code , sentencias::$SELECT_USER_CODE );
    return Flight::json($result);
});
        
        

        
#obtiene los movimientos del usuario
Flight::route('GET /getMovimientos/@iduser', function ( $iduser ) {
    $delegate = new Delegate();
    $result = $delegate->getMovimientos( $iduser );
    return Flight::json($result); ;
});
        
        


#Registrar un usuario
Flight::route('POST /addUser', function () { 
    
    #obtenemos los parametros
    $codigo =  Flight::request()->data->codigo;
    $clave  =  Flight::request()->data->clave;
    $nombre =  Flight::request()->data->nombre;
    
    #ejecutamos la senetencia en la BD
    $delegate = new Delegate();
    $result = $delegate->add_user( $codigo, $clave, $nombre );
    
    return Flight::json( $result ); 
});



#Registrar un movimiento
    Flight::route('POST /addMovimiento', function () {
        
    #obtenemos los parametros
    $tipo       = Flight::request()->data->tipo;
    $valor      = Flight::request()->data->valor;
    $moneda     = Flight::request()->data->moneda;
    $concepto   = Flight::request()->data->concepto;
    $comentario = Flight::request()->data->comentario;
    $referencia = Flight::request()->data->referencia;
    $usuario    = Flight::request()->data->usuario;
        
    #ejecutamos la senetencia en la BD
    $delegate = new Delegate();
    $result = $delegate->add_movimiento( $tipo, $valor, $concepto, $comentario, $referencia, $usuario );
    
    return Flight::json($result); ;
});
    

    
    

    
    
        
        
        



Flight::start();

