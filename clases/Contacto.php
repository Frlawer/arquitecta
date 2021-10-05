<?php
class Contacto extends Conn
{
    var $id;
    var $nombre;
    var $email;
    var $tel;
    var $msj;

    function __construct(
        $id = 0,
        $email = '',
        $tel = '',
        $msj = ''
    ){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->tel = $tel;
        $this->msj = $msj;
    }

    
}
