<?php
require_once('conn.php');
class Proyecto extends DBconn {
    var $id;
    var $nombre;
    var $categoria_id;
    var $subCategoria;
    var $url;
    var $titulo;
    var $resenia;
    	
	function __construct(	
        $id = 0,
        $nombre = '',
        $categoria_id = 0,
        $subCategoria = 0,
        $url = '',
        $titulo = '',
        $resenia = ''
        )
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->categoria_id = $categoria_id;
        $this->subCategoria = $subCategoria;
        $this->url = $url;
        $this->titulo = $titulo;
        $this->resenia = $resenia;
	}

    protected function insert() {
        $this->query = "INSERT INTO proyecto (
            nombre,
            categoria_id,
            subCategoria,
            url,
            titulo,
            resenia
			) VALUES(
			'".$this->id."',
			'".$this->nombre."',
			'".$this->categoria_id."',
			'".$this->subCategoria."',
			'".$this->url."',
			'".$this->titulo."',
			'".$this->resenia."'
			)";
        $this->execute_single_query();
    }

    protected function delete() {
        $this->query = "DELETE FROM proyecto WHERE id = '".$this->id."'";
        $this->execute_single_query();
    }

    protected function update() {
        $this->query = "UPDATE proyecto SET
			nombre = '".$this->nombre."',
			categoria_id = '".$this->categoria_id."',
			subCategoria = '".$this->subCategoria."',
			url = '".$this->url."',
			titulo = '".$this->titulo."',
			resenia = '".$this->resenia."',
			WHERE id = ".$this->id."";
        $this->execute_single_query();
    }

    public function select() {
        $this->query = "SELECT * FROM proyecto ORDER BY id";
        $this->get_results_from_query();
        // retorna un array con los resultados $this->rows;
    }

    /**
     * Devuelve el nombre segun id
     * @param int $id
     * @return string
     */
    public function getProyectoCat($idCat){
        $this->query = "SELECT * FROM proyecto WHERE url LIKE '%/" . $idCat . "/%'";
        $this->get_results_from_query();
    }

    /**
     * Devuelve el proyecto segun id
     * @param int $idProyecto
     * @return array
     */
    public function getProyecto($idProyecto){
        $this->query = "SELECT * FROM proyecto WHERE id = " . $idProyecto;
        $this->get_results_from_query();
    }
}