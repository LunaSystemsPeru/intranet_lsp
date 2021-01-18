<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 15/08/19
 * Time: 11:33 AM
 */

require_once 'cl_conectar.php';

class cl_producto_precio
{
    private $id_producto_precio;
    private $id_producto;
    private $nombre;
    private $precio;
    private $tipo_pago;
    private $caracteristicas;
    private $c_conectar;

    /**
     * cl_producto_precio constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdProductoPrecio()
    {
        return $this->id_producto_precio;
    }

    /**
     * @param mixed $id_producto_precio
     */
    public function setIdProductoPrecio($id_producto_precio)
    {
        $this->id_producto_precio = $id_producto_precio;
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
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getTipoPago()
    {
        if ($this->tipo_pago == 1) {
            $valor = "CONTADO";
        }
        if ($this->tipo_pago == 2) {
            $valor = "MENSUAL";
        }
        if ($this->tipo_pago == 3) {
            $valor = "ANUAL";
        }

        return $valor;
    }

    /**
     * @param mixed $tipo_pago
     */
    public function setTipoPago($tipo_pago)
    {
        $this->tipo_pago = $tipo_pago;
    }

    /**
     * @return mixed
     */
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    /**
     * @param mixed $caracteristicas
     */
    public function setCaracteristicas($caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from productos_precio 
        where id_productos_precio = '" . $this->id_producto_precio. "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->id_producto= $resultado['id_producto'];
        $this->nombre = $resultado['nombre'];
        $this->precio = $resultado['precio'];
        $this->tipo_pago= $resultado['tipo_pago'];
        $this->caracteristicas = $resultado['caracteristicas'];
        return $resultado;
    }

    public function ver_filas_json()
    {
        $sql = "select * from productos_precio where id_producto = '$this->id_producto'";
        return $this->c_conectar->get_json_rows($sql);
    }

}