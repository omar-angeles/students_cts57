# Estadia

## Para poder utilizar el proyecto, es necesario instalar y configurar ciertas cosas, tales como:
* Instalar Composer.
* Configurar el php.ini.

## Para ello, primero empezaremos con la configuración del php.ini, para ello, debemos ubicar nuestro archivo.
* En Linux, el archivo por lo general se ecuentra en la siguiente ruta: /etc/php/
* En Windows, el archivo por lo general puedes accesar a el de la siguiente manera:
* Cuando lo abres, puedes buscar dentro del archivo con <ctrl + f> en caso de que uses visual code, o en caso de usar algun otro lector de datos, puede ser la conbinación <ctrl + b>.
* Escribes "extension=" y vas a habilitar los siguientes:
    * bz2
    * curl
    * exif
    * gd
    * gettext
    * iconv
    * mysqli
    * pdo_mysql
    * pdo*sqlite
    * soap
    * sockets
    * sodium
    * sqlite3
    * tidy
    * xsl
    * zip
* En caso de que en Linux, no te aparescan, puedes instalar cada una manualmente, de la siguiente manera:
    * Si usas alguna distribución basada en Arch Linux, es: sudo pacman *Ss <nombre_del_paquete> esto, para primero ver si existe.
    * Si existe, despues es: sudo pacman *S <nombre_del_paquete>
* Con esto, ya podras pasar a lo siguiente, la instalación de Composer:
* Para ello iremos al siguiente link:
    * https://getcomposer.org/
* Ahí, podremos ver la opción de "downloads", y nos saldran distintas opciones.
    * Para Linux, si es una distribución basada en Arch Linux, es: sudo pacman *S composer.
    * Para Windows, es ir a la siguiente liga y descargarlo como dice las instruciones de la pagina oficial https://getcomposer.org/download/
    
