<?php

/*
  |--------------------------------------------------------------------------
  | En este array se ponen todas las vistas permitidas, sin el .php
  |--------------------------------------------------------------------------
  | Las vistas son archivos que vas a incluir en cada seccion de tu app.
  | Por ejemplo Home, Quienes Somos, Ayuda, etc. etc...
 */
$arr = array('inicio','nosotros','categoria','proyectos','img');
/*
  |--------------------------------------------------------------------------
  | Si queres mostrar errores de php en pantalla, ponela en SI sino en NO
  |--------------------------------------------------------------------------
  |
 */
define('MOSTRAR_ERRORES', 'SI');//SI ó NO


/*
  |--------------------------------------------------------------------------
  | Clave Recaptcha.
  |--------------------------------------------------------------------------
  |
 */
define('RECAPTCHA_KEY','6LcPR-IZAAAAACXBHIICa7eTDByjy1thNMK2BxDc');

/*
  |--------------------------------------------------------------------------
  | Nombre de la Empresa.
  |--------------------------------------------------------------------------
  |
 */
define('NOMBRE_ESTUDIO','Borgo Arquitectura - S&H');

/*
  |--------------------------------------------------------------------------
  | Esta es la base url de la app, fuera de facebook, osea la del dominio.
  |--------------------------------------------------------------------------
  |
 */
define('BASE_URL','http://borgoarquitectura.com.ar/');

/*
  |--------------------------------------------------------------------------
  | Ruta del servidor de las vistas
  |--------------------------------------------------------------------------
  |
 */
define("RUTA_VISTAS",getcwd().DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
