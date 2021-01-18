<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 15/08/19
 * Time: 11:28 AM
 */

require_once 'cl_conectar.php';

class cl_producto
{
    private $id_producto;
    private $nombre;
    private $tipo_producto;
    private $vendidos;
    private $c_conectar;

    /**
     * cl_producto constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * @param mixed $id_producto
     */
    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
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
    public function getTipoProducto()
    {
        $valor_producto = "";
        if ($this->tipo_producto == 1) {
            $valor_producto = "SOFTWARE ESCRITORIO";
        }
        if ($this->tipo_producto == 2) {
            $valor_producto = "SOFTWARE WEB / SAAS";
        }
        if ($this->tipo_producto == 3) {
            $valor_producto = "CERTIFICADO DIGITAL PARA FACTURACION";
        }
        if ($this->tipo_producto == 4) {
            $valor_producto = "APP MOVIL";
        }
        return $valor_producto;
    }

    /**
     * @param mixed $tipo_producto
     */
    public function setTipoProducto($tipo_producto)
    {
        $this->tipo_producto = $tipo_producto;
    }

    /**
     * @return mixed
     */
    public function getVendidos()
    {
        return $this->vendidos;
    }

    /**
     * @param mixed $vendidos
     */
    public function setVendidos($vendidos)
    {
        $this->vendidos = $vendidos;
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from productos 
        where id_producto = '" . $this->id_producto. "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->nombre= $resultado['nombre'];
        $this->tipo_producto = $resultado['tipo_producto'];
        $this->vendidos = $resultado['vendidos'];
    }

    public function ver_filas_json()
    {
        $sql = "select * from productos";
        return $this->c_conectar->get_json_rows($sql);
    }

    public function ver_filas()
    {
        $sql = "select * from productos";
        return $this->c_conectar->get_Cursor($sql);
    }

}