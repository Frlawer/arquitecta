<?php
require_once('conn.php');

class Img extends DBconn {
    /**
     * Administra la tabla de imagenes
     * @param int $id
     * @param string $nombre
     * @param string $url
     * @param string $create_at
     * @param string $update_at
     */
	var $id;
	var $nombre;
	var $url;
	var $create_at;
	var $update_at;

    /**
     * constructor
     * @param int $id
     * @param string $nombre
     * @param string $url
     */
	function __construct($id = 0, $nombre = '', $url = ''){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->url = $url;
	}
    
    /**
     * Insert
     * @access protected
     */
    protected function insert() {
        $this->query = "INSERT INTO img (
			nombre,
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

    /**
     * Delete
     * @access protected
     */
    protected function delete() {
        $this->query = "DELETE FROM img WHERE id = '".$this->id."'";
        $this->execute_single_query();
    }

    /**
     * Update
     * @access protected
     */
    protected function update() {
        $this->query = "UPDATE img SET
			nombre = '".$this->nombre."',
			url = '".$this->url."',
            create_at = null,
            update_at = date('Y-m-d H:i:s')
			WHERE id = ".$this->id."";
            $this->execute_single_query();
    }

    /**
     * Select 1 dato
     * @access public
     */
    public function select() {
        $this->query = "SELECT * FROM img ORDER BY id";
        $this->get_results_from_query();
        // retorna un array con los resultados $this->rows;
    }

    /**
     * Select categoria
     * @access public
     */
    public function selectCategoria($categoria) {
        $this->query = "SELECT * FROM img WHERE categoria = " . $categoria;
        $this->get_results_from_query();
        // retorna un array con los resultados $this->rows;
    }
    
    /**
     * 
     * @param array $listImg
     * @param boolean $thumb
     * @return array
     */
    public function onlyThumb($listImg, $thumb)
    {
        // array $lista
        $lista = $listImg;

        if ($thumb) {
            
            foreach ($lista as $key => $value) {
                if (is_int($key)) {
                    unset($lista[$key]);
                }
            }
            // if (($datos = array_search(1, $lista)) !== false )
            // {
            //     unset($lista[$datos]);
            // }
            
        }
        
        return $lista;
    }

    /**
     * Search
     * @access public
     */
	function BusquedaImg($busqueda){
		$this->query = "SELECT * FROM categoria WHERE MATCH (nombre) AGAINST ('*".$busqueda."*' IN BOOLEAN MODE)";
    	$this->get_results_from_query();
	}
}