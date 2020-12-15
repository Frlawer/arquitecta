<?php

/*
  |--------------------------------------------------------------------------
  | Restringir las vistas a incluir
  |--------------------------------------------------------------------------
  |
 */

function url_permitidas($view, $arr) {

    if (in_array($view, $arr) AND file_exists(RUTA_VISTAS . $view . '.php')) {
        return TRUE;
    } else {
        return FALSE;
    }
}