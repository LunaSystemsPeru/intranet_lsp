<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 16/08/19
 * Time: 10:56 AM
 */

require_once 'cl_conectar.php';

class cl_alquiler_pago
{
    private $id_pago;
    private $id_alquiler;
    private $id_venta;
    private $fecha;
    private $monto;
    private $id_banco;
    private $c_conectar;

    /**
     * cl_alquiler_pago constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdPago()
    {
        return $this->id_pago;
    }

    /**
     * @param mixed $id_pago
     */
    public function setIdPago($id_pago)
    {
        $this->id_pago = $id_pago;
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
    public function getIdVenta()
    {
        return $this->id_venta;
    }

    /**
     * @param mixed $id_venta
     */
    public function setIdVenta($id_venta)
    {
        $this->id_venta = $id_venta;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getIdBanco()
    {
        return $this->id_banco;
    }

    /**
     * @param mixed $id_banco
     */
    public function setIdBanco($id_banco)
    {
        $this->id_banco = $id_banco;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_pago) + 1, 1) as codigo 
        from pago_alquiler";
        $this->id_pago = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from pago_alquiler 
        where id_pago = '" . $this->id_pago. "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->id_alquiler= $resultado['id_producto_alquiler'];
        $this->id_venta= $resultado['id_venta'];
        $this->id_banco = $resultado['id_banco'];
    }

    public function insertar()
    {
        $sql = "insert into pago_alquiler values ('" . $this->id_pago. "', '" . $this->id_alquiler. "', '" . $this->id_venta. "', '" . $this->fecha. "', '" . $this->monto. "', '" . $this->id_banco. "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function ver_filas () {
        $sql = "select pa.id_pago, v.fecha, ds.abreviatura, v.serie, v.numero, v.monto_total, v.estado 
from pago_alquiler as pa 
inner join ventas as v on v.id_venta = pa.id_venta 
inner join documentos_sunat as ds on ds.id_documento = v.id_documento 
where pa.id_producto_alquiler = '".$this->id_alquiler."'";
        return $this->c_conectar->get_Cursor($sql);
    }



}