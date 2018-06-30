<?php
/**
 * Created by Desiree Chacón.
 * Date: 30/06/2018
 * Project: Test Back-end Dev AIVO / API Facebook
 */
//Cargar Framework Slim
require_once '../vendor/autoload.php';


//Incluir Librerias
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//incluir fbConfig
require_once 'fbConfig.php'; 

//Crear aplicacion
	$app= new \Slim\App;

//  Crear ruta de prueba para facebook
	$app->get('/profile/facebook/{id}', function (Request $request, Response $response, array $args) {
	     //obteniendo parámetro HTTP
	    $id = $args['id'];
	    //construye objeto e inicializa parámetros de conexion
	    $fb=new FBConfig();
	    //instancia objeto
	    $fb->crearFb();
	    //obtiene perfil de usuario de facebook pasando por parámetro el id a consultar
	    $fb->getProfile($id);
    });
//Ejecutar
	$app->run();


?>