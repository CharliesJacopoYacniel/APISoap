# API Soap Template
APISoap Template es un proyecto libre para la implementación rápida de Servicios Web  SOAP con Php.

## Empezando
Para iniciar puedes hacer una copia de este proyecto haciendo el respectivo Git clone en la carpeta de tu servidor web.
``` git
git clone https://github.com/CharliesJacopoYacniel/APISoap.git 
```
Obtendremos el siguiente árbol de archivos que representan el código de plantilla para la publicación de tu API Soap usando Php y sus Clases nativas:
  - APISoap
    - conexion
        - crud.php
        - prueba.php
    - WSDLDocument
        - src
            - WSDLDocument.php 
        - INSTALL.txt
        - LICENSE.txt
    - Client.php
    - myClass.php
    - MyWsdl.wsdl
    - README.md
    - Server.php
    - test.wsdl

El archivo [crud.php](https://github.com/CharliesJacopoYacniel/APISoap/blob/master/conexion/crud.php) es una pequeña librería de funciones más utilizadas al momento de conectar con la base de datos,con el que puede hacer el clásico CRUD de datos así como la conexión y desconexión de sesiones con la base de datos que tu API vaya a utilizar.

El archivo [prueba.php](https://github.com/CharliesJacopoYacniel/APISoap/blob/master/conexion/prueba.php) es un pequeño main de la clase crud.php con el cual se hacen llamados de prueba a la base de datos que se usara en la API.

EL archivo [myClass.php](https://github.com/CharliesJacopoYacniel/APISoap/blob/master/myClass.php) contiene la estructura de la clase junto con sus métodos de prueba bien documentados, los cuales son los que seran publicos a traves de el servicio web  mediante la adición ?wsdl al archivo server.php 

Ela archivo [Server.php ](https://github.com/CharliesJacopoYacniel/APISoap/blob/master/Server.php)es el servidor que escucha los llamados de los distintos clientes y es accesible mediante la extensión [Server.php?wsdl](http://localhost:8888/APISoap/Server.php?swdl).

EL archivo [Client.php](https://github.com/CharliesJacopoYacniel/APISoap/blob/master/Client.php) contiene la url del server y un llamado de prueba a un función pública del servicio la cal se retorna en formato JSON,para visualización en el navegador, este llamado se realiza solo si se ha configurado una base de datos en la clase crud.php

El archivo  [MyWsdl.wsdl](https://github.com/CharliesJacopoYacniel/APISoap/blob/master/myWsdl.wsdl) es un documento de formato xml ,y es el contenido generado por la librería WDSLDocument mediante la clase "MyClass".

## Pre requisitos
APISoap es un proyecto ejecutable sobre un entorno de desarrollo [MAMP](https://www.mamp.info/en/) , en el cual debe copiarse los archivos en la carpeta htdocs ,en la instalación local de su servidor web.
Al mismo tiempo la base de datos se gestiona con MySql sobre la misma instalación de MAMP.
Para la implementación de la clases nativas de php es necesario antes configurar los componentes "Soap Client y Soap Server" de la siguiente  manera

![SAOP component](https://i.stack.imgur.com/YWDtj.jpg)

Imagen 1: captura de la información de php en el apartado "SOAP"
 

## Instalación
Para la implementación de el servidor web inicie la instalación de MAMP descargando los archivos para su sistema [aquí](https://www.mamp.info/en/downloads/).

## Corriendo las pruebas
Copiar los archivos del proyecto en la carpeta htdocs 
![GitHub Logo](https://silicodevalley.com/wp-content/uploads/2017/07/ruta-htdocs.png)

Imagen 1: Copiar el contenido en la carpeta htdocs.

ingresar a la dirección http://localhost:8888/apiSoap/server.php?wsdl   par aver el server en producción
ingresar a la dirección http://localhost:8888/APISoap/Client.php  para usar un  cliente del server en producción.

## Construido con
- [WSDLDocument](https://code.google.com/archive/p/wsdldocument/) - Proporciona la generación WSDL en PHP mediante el uso de clases php estructuradas.
```php 
$wsdl = new WSDLDocument("MyClass");// nombre de la clase ,No el nombre del archivo que contiene la clase
echo $wsdl->saveXml();
```
Con este simple código puede generar un documento WSDL para su servicio web.

## Versiones
Para las versiones disponibles, vea las etiquetas en este repositorio .

## Autores
**Charlies Yacniel** - Trabajo inicial - [CharliesJacopoYacniel](https://www.facebook.com/CharliesYacniel)
Vea también la lista de [colaboradores](https://github.com/CharliesJacopoYacniel/APISoap/graphs/contributors) que participaron en este proyecto.

License
----
Este proyecto es FREE lo encuentras en el repositorio personal de :studio_microphone: **Charlies Yacniel** :studio_microphone: ,espero sea de ayuda.

```Text
      ___           ___           ___           ___                                     ___           ___              
     /  /\         /__/\         /  /\         /  /\                      ___          /  /\         /  /\             
    /  /:/         \  \:\       /  /::\       /  /::\                    /  /\        /  /:/_       /  /:/_            
   /  /:/           \__\:\     /  /:/\:\     /  /:/\:\    ___     ___   /  /:/       /  /:/ /\     /  /:/ /\           
  /  /:/  ___   ___ /  /::\   /  /:/~/::\   /  /:/~/:/   /__/\   /  /\ /__/::\      /  /:/ /:/_   /  /:/ /::\          
 /__/:/  /  /\ /__/\  /:/\:\ /__/:/ /:/\:\ /__/:/ /:/___ \  \:\ /  /:/ \__\/\:\__  /__/:/ /:/ /\ /__/:/ /:/\:\         
 \  \:\ /  /:/ \  \:\/:/__\/ \  \:\/:/__\/ \  \:\/:::::/  \  \:\  /:/     \  \:\/\ \  \:\/:/ /:/ \  \:\/:/~/:/         
  \  \:\  /:/   \  \::/       \  \::/       \  \::/~~~~    \  \:\/:/       \__\::/  \  \::/ /:/   \  \::/ /:/          
   \  \:\/:/     \  \:\        \  \:\        \  \:\         \  \::/        /__/:/    \  \:\/:/     \__\/ /:/           
    \  \::/       \  \:\        \  \:\        \  \:\         \__\/         \__\/      \  \::/        /__/:/            
     \__\/         \__\/         \__\/         \__\/                                   \__\/         \__\/             
```
