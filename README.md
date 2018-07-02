# testAIVO
Test Back-end Dev AIVO
Instrucciones de instalación y prueba
1. Dentro de tu servidor PHP se debe crear un directorio con el nombre por ejemplo [api] y
acceder al mismo. Ejecutar los siguientes comandos
	a. mkdir api
	b. cd api
2. Luego, instalar el framework Slim a través de Composer . Ejecutar el siguiente comando
	a. php composer.phar require slim/slim
3. Seguidamente, instalar el SDK de facebook igualmente usando Composer. Ejecutar el
siguiente comando:
	a. composer require facebook/graph-sdk
4. Una vez hecho esto se procede a descargar del repositorio los archivos fuentes e formato
ZIP. Disponibles en el siguiente enlace: https://github.com/desireechacon/testAIVO.git
5. Finalmente copiar la carpeta public descargada dentro del directorio creado en el paso N°
1 [api]
6. Para probar se debe ejecutar cualquier navegador colocando el enlace del servidor
seguido del directorio del proyecto de la siguiente manera:
http://servidor/api/public/profile/facebook/{id}. En este caso el id corresponde al id de
usuario con el que se desea probar para obtener id, last name, first name. Por ejemplo:
http://localhost/api/public/profile/facebook/10157894696818128

NOTA: Si ya estan instaldos los paquetes indicados en los pasos 2 y 3 omitir estas instrucciones
