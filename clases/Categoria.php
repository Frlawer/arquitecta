<?php
require_once('conn.php');
class Categoria extends DBconn {
	var $id;
	var $nombre;
	var $url;

	function __construct($id = 0, $nombre = '', $url = ''){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->url = $url;
	}

    protected function insert() {
        $this->query = "INSERT INTO categoria (
			nombre,
			id_padre,
            url,
            create_at,
            update_at
			) VALUES(
			'".$this->nombre."',
			'".$this->url."',
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')
			)";
        $this->execute_single_query();
    }

    protected function delete() {
        $this->query = "DELETE FROM categoria WHERE id = '".$this->id."'";
        $this->execute_single_query();
    }

    protected function update() {
        $this->query = "UPDATE categoria SET
			nombre = '".$this->nombre."',
			url = '".$this->url."',
            create_at = null,
            update_at = date('Y-m-d H:i:s')
			WHERE id = ".$this->id."";
        $this->execute_single_query();
    }

    public function select() {
        $this->query = "SELECT * FROM categoria ORDER BY id";
        $this->get_results_from_query();
        // retorna un array con los resultados $this->rows;
    }
/**
 * Devuelve el nombre segun id
 * @param int $id
 * @return string
 */
    public function nombreCat($id){
        if ($id = 1) :
            $nombre = 'Viviendas';
        elseif($id = 2):
            $nombre = 'Hoteles';
        else:
            $nombre = 'Industria';
        endif;
        return $nombre;
    }

/**
 * Extrae el proyecto del nombre
 * @param string $nombre
 * @return string
 */
    public function nProyecto($nombre){
        $datos = $nombre;
        list($images, $cat, $proyecto, $img) = explode("/", $datos);
        return $proyecto;
    }
}