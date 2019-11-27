<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 30/07/19
 * Time: 01:39 PM
 */
require_once 'cl_conectar.php';

class cl_alquiler
{

    private $id_alquiler;
    private $id_prospecto;
    private $id_producto_precio;
    private $id_producto;
    private $fecha_inicio;
    private $fecha_pago;
    private $fecha_siguiente_pago;
    private $monto_cuota;
    private $tipo_pago;
    private $c_conectar;

    /**
     * cl_alquiler constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdAlquiler()
    {
        return $this->id_alquiler;
    }

    /**
     * @param mixed $id_alquiler
     */
    public function setIdAlquiler($id_alquiler)
    {
        $this->id_alquiler = $id_alquiler;
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
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaPago()
    {
        return $this->fecha_pago;
    }

    /**
     * @param mixed $fecha_pago
     */
    public function setFechaPago($fecha_pago)
    {
        $this->fecha_pago = $fecha_pago;
    }

    /**
     * @return mixed
     */
    public function getFechaSiguientePago()
    {
        return $this->fecha_siguiente_pago;
    }

    /**
     * @param mixed $fecha_siguiente_pago
     */
    public function setFechaSiguientePago($fecha_siguiente_pago)
    {
        $this->fecha_siguiente_pago = $fecha_siguiente_pago;
    }

    /**
     * @return mixed
     */
    public function getMontoCuota()
    {
        return $this->monto_cuota;
    }

    /**
     * @param mixed $monto_cuota
     */
    public function setMontoCuota($monto_cuota)
    {
        $this->monto_cuota = $monto_cuota;
    }

    /**
     * @return mixed
     */
    public function getTipoPago()
    {
        return $this->tipo_pago;
    }

    /**
     * @param mixed $tipo_pago
     */
    public function setTipoPago($tipo_pago)
    {
        $this->tipo_pago = $tipo_pago;
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from producto_alquiler 
        where id_producto_alquiler = '" . $this->id_alquiler . "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->id_prospecto = $resultado['id_prospecto'];
        $this->id_producto_precio= $resultado['id_productos_precio'];
        $this->id_producto= $resultado['id_producto'];
        $this->fecha_inicio= $resultado['fecha_inicio'];
        $this->fecha_pago= $resultado['fecha_pago'];
        $this->fecha_siguiente_pago= $resultado['fecha_siguiente_pago'];
        $this->monto_cuota= $resultado['monto_cuota'];
        $this->tipo_pago = $resultado['tipo_pago'];
    }


    public function ver_filas_json()
    {
        $sql = "select pa.id_producto_alquiler ,pr.nombre, p.nombre_comercial, pa.tipo_pago, pa.monto_cuota, pa.fecha_inicio, pa.fecha_pago, pa.fecha_siguiente_pago, DATEDIFF(pa.fecha_siguiente_pago, CURRENT_DATE()) as dias_restante 
        from producto_alquiler as pa 
        inner join prospectos as p on p.id_prospecto = pa.id_prospecto
        inner join productos_precio as pp on pp.id_productos_precio = pa.id_productos_precio
        inner join productos as pr on pr.id_producto = pa.id_producto";
        $json = $this->c_conectar->get_json_rows($sql);
        return $json;
    }
}