<?php

require_once 'cl_conectar.php';

class cl_clasificacion_movimientos
{
    private $id;
    private $nombre;
    private $conectar;

    /**
     * cl_clasificacion_movimientos constructor.
     */
    public function __construct()
    {
        $this->conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function obtener_datos()
    {
        $sql = "select * 
        from clasificacion_movimientos 
        where id_clasificacion = '$this->id'";
        $resultado = $this->conectar->get_Row($sql);
        $this->nombre =  $resultado['nombre'];
    }

    public function verFilas()
    {
        $sql = "select * 
        from clasificacion_movimientos 
        order by nombre asc";
        return $this->conectar->get_Cursor($sql);
    }

    public function verFilasJson()
    {
        $sql = "select * 
        from clasificacion_movimientos 
        order by nombre asc";
        return $this->conectar->get_json_rows($sql);
    }

}