<?php
/**
 * Created by Desiree Chacón.
 * Date: 30/06/2018
 * Clase FBConfig: Establece conexion con Facebook para obetener información de perfil
 *                 Atributos: Establecen los valores de confirguración e identificacion de aplicación Profile en facebook developer
 */

//Cargar Framework Slim y Autoload Facebook
require_once '../vendor/autoload.php';

// incio de la clase
class FBConfig {
    // atributos    
    private $app_id;
    private $appi_secret;
    private $token;
    private $fb; 

    //Constructor
    //Se asigna a los atributos los valores de configuracion de aplicación  en facebook developer (id, secret y token) 
    function __construct(){
        $this->app_id='1851693668202777';
        $this->appi_secret='946591da8db5af87cf9c68e8279153c8';
        $this->token='EAAaUGwdTeRkBAPOyStMjP7zJiL8HG9KsUQj4zNA9O2jvZCdbNSRzrQ7L7krFqyoEockWezk68tlPA22ZBzDpRazjq7TE6arSJb6UxaViQed4677mL6dlcjHj3eu1f8L8xToF1nZBj7cGs9IZAmJ6pLkVDHB6vLkZD';
    }
    
    //Funcion crearFb
    //Instancia un objeto de la clase Facebook pasando por parámetro los atributos inicializados en el constructor de la clase (id y secret)
    function crearFb()
    {

      $this->fb = new Facebook\Facebook(['app_id' => $this->app_id ,
        'app_secret' => $this->appi_secret,'default_graph_version' => 'v2.12',]);
    }

    //Funcion getProfile
    //Obtiene información del Perfil de facebook 
    // Recibe como parámetro el id a consultar
    function getProfile($id)
    {
        
        try {
                // A través del método get obtiene un ojeto de  FacebookResponse`
                $profileRequest = $this->fb->get('/'.$id.'?fields= id,first_name,last_name',$this->token); 
                //Convierte el Objeto FacebookResponse en array
                $fbUserProfile = $profileRequest->getGraphNode()->asArray();
                //Imprime los datos del array en formato json
                echo json_encode($fbUserProfile);

            } catch(FacebookResponseException $e) {//atrapa excepcion si ocurren errores por objeto FacebookResponseException
                echo 'Graph returned an error: ' . $e->getMessage();
                session_destroy(); // destruye la sesion
                header("Location: ./");// Redirigir usuario a la página de inicio de sesión de la aplicación
                exit;
            } catch(FacebookSDKException $e) {//atrapa excepción si ocurren errores con el SDK
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }catch(Exception $e) {//atrapa excepción si ocurre cualquier otro errores
                echo 'Error general: ' . $e->getMessage();
                exit;
    }   

    }
    }
?>