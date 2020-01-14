# Angular: Parte visual. (Néstor, Enrique)
- Sobre todo hay que fijarse en los mockups.

# Presentación y documentación. (Entre todos)

# Laravel: API. (Jonathan, Enrique, Fran)
- Interconectividad.
- Realizar los servicios con la BBDD para angular.
- Los controladores.
- El middelware.

## Herramientas necesarias para el backend de la aplicación

- Instalar XAMPP (Servidor Base de Datos)
http://alexpereap.com/es/blog/como-instalar-xampp-en-ubuntu-1604
- Instalar PHP (Ultima versión para laravel)
https://www.laraveltip.com/como-instalar-php-7-4-en-apache-y-nginx-para-laravel/
- Laravel (Framework 5.5)
https://laravel.com/docs/5.8/installation
- PHPMyAdmin
https://askubuntu.com/questions/387062/how-to-solve-the-phpmyadmin-not-found-issue-after-upgrading-php-and-apache


## Pasos para ejecutar el proyecto

```php
$git clone https://github.com/emjf1/laravel_iweb.git 
$composer install
$php artisan --version
$php artisan serve 
```

## Inicializar la base de datos
- Conectar el panel de **XAMPP**
- Acceder con el navegador a [https://localhost.me/phpmyadmin](https://locallhost.me/phpmyadmin)
- Crear **migraciones y seeds** con:

```php
    php artisan make:migration create_pruebamigration_table
    php artisan make:seeder PruebaMigrationTableSeeder
```
-  Editar los ficheros creando las **tablas y datos** de la BD:
> /database/migrations

> /database/seeds

> /database/seeds/DatabaseSeeder.php 

- Ejecutar **migraciones y seeds** con:
```php
    $php artisan migrate:refresh --seed
```
- Ejecutar proyecto con:
```php
     $php artisan serve
```
- Recargar **PhpMyAdmin** y comprobar que se meten los datos


## Conectarse con la BBDD desde la aplicación
 
### 1. Modelos
> Cada modelo se corresponde con una tabla de la base de datos. Cuando creamos un modelo, sin tocar nada más, ya podemos hacer consultas desde el controlador. Los modelos solo los tocaremos para hacer las **relaciones con otras tablas** o añadir algún atributo muy concreto

 **Creamos el modelo en el directorio /app.** 
 *El parámetro "-m" crea el modelo con migración*

    $php artisan make:model Prueba [-m] 

## 
### 2. Controladores

> Los controladores sirven para hacer hacer las "queries" o llamadas a las base de datos y devolver la vista correspondiente. Son nuestro intermediario entre el frontend y los servicios que ofrece el API

- Creamos un **controller** por **cada tabla o modelo** en el directorio **/app/http/controllers**
	
```php
    $php artisan make:controller PruebaController
```
- En los controllers se pueden **definir métodos** para operar distintas queries. *Por ejemplo, recuperar la lista de items*. Estos métodos **deben devolver las vistas y la información pedida por el frontend**
```php
    return view('Pacientes', ['patients'=> $patients]);
```

##
### 3. Rutas

> Las rutas son las peticiones y url's que vienen por parte del cliente. Cada ruta esta asociada a un controlador o un método, de manera que cuando se hace una petición se devuelva el resultado de esa "querie" o función.

- **Vincular rutas a los métodos** de cada controlador. Para ello, editamos el fichero **routes/web.php**


>    Route::get('ruta', 'NombreController@metodo');

```php
    Route::get('user/{id}', 'UserController@showProfile');
```

##
### 4. Vistas

> Son los html`s o representaciones visuales de cada parte de la aplicación. Por lo general, los controladores pueden pasarle información a la vista, o en una misma vista, realizar diferentes peticiones. Esta parte es más del frontend

- Se almacenan en **/resources/views**
- Crear la vista y recibir parametros

## Comandos para corregir errores

- **Borrar migraciones**
	
```php
    Primero eliminar fichero .php y luego
    $ composer dump-autoload
```
