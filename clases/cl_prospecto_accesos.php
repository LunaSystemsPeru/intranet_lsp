<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 09/08/19
 * Time: 02:01 PM
 */

require_once 'cl_conectar.php';

class cl_prospecto_accesos
{
    private $id_acceso;
    private $id_prospecto;
    private $nombre;
    private $url;
    private $usuario;
    private $clave;
    private $c_conectar;

    /**
     * cl_prospecto_accesos constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdAcceso()
    {
        return $this->id_acceso;
    }

    /**
     * @param mixed $id_acceso
     */
    public function setIdAcceso($id_acceso)
    {
        $this->id_acceso = $id_acceso;
    }

    /**
     * @return mixed
     */
    public function getIdProspecto()
    {
        return $this->id_prospecto;
    }

    /**
     * @param mixed $id_prospecto
     */
    public function setIdProspecto($id_prospecto)
    {
        $this->id_prospecto = $id_prospecto;
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

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function ver_filas_json()
    {
        $sql = "select id_acceso, nombre, url, usuario, contrasena 
from prospectos_accesos 
where id_prospecto = '" . $this->id_prospecto . "'";
        $json = $this->c_conectar->get_json_rows($sql);
        return $json;
    }

}