<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 26/07/19
 * Time: 10:43 AM
 */
require_once 'cl_conectar.php';

class cl_prospecto
{

    private $id_prospecto;
    private $datos;
    private $celular;
    private $email;
    private $nombre_comercial;
    private $ruc;
    private $razon_social;
    private $direccion;
    private $estado;
    private $c_conectar;

    /**
     * cl_prospecto constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
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
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * @param mixed $datos
     */
    public function setDatos($datos)
    {
        $this->datos = $datos;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNombreComercial()
    {
        return $this->nombre_comercial;
    }

    /**
     * @param mixed $nombre_comercial
     */
    public function setNombreComercial($nombre_comercial)
    {
        $this->nombre_comercial = $nombre_comercial;
    }

    /**
     * @return mixed
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param mixed $ruc
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function insertar()
    {
        $query = "insert into prospectos values ('" . $this->id_prospecto . "', '" . $this->datos . "', '" . $this->celular . "', '" . $this->email . "', 
        '" . $this->nombre_comercial . "', '" . $this->razon_social . "', '" . $this->ruc . "','" . $this->direccion . "', '0') ";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_prospecto) + 1, 1) as codigo 
        from prospectos";
        $this->id_prospecto = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from prospectos 
        where id_prospecto = '" . $this->id_prospecto. "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->datos = $resultado['datos'];
        $this->celular = $resultado['celular'];
        $this->email= $resultado['email'];
        $this->nombre_comercial= $resultado['nombre_comercial'];
        $this->razon_social= $resultado['razon_social'];
        $this->ruc= $resultado['ruc'];
        $this->direccion= $resultado['direccion'];
        $this->estado = $resultado['estado'];
    }

    public function ver_filas_json()
    {
        $sql = "select * from prospectos";
        $json = $this->c_conectar->get_json_rows($sql);
        return $json;
    }

    public function ver_filas_busqueda($termino)
    {
        $sql = "select * 
        from prospectos 
        where datos like '%".$termino."%' or nombre_comercial like '%".$termino."%'";
        return $this->c_conectar->get_Cursor($sql);
    }

}