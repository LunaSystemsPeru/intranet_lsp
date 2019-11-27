<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 05/08/19
 * Time: 04:44 PM
 */

require_once 'cl_conectar.php';

class cl_orden_interna_venta
{
    private $id_orden_interna;
    private $id_venta;
    private $c_conectar;

    /**
     * cl_orden_interna_venta constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdOrdenInterna()
    {
        return $this->id_orden_interna;
    }

    /**
     * @param mixed $id_orden_interna
     */
    public function setIdOrdenInterna($id_orden_interna)
    {
        $this->id_orden_interna = $id_orden_interna;
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

    public function ver_filas()
    {
        $sql = "select v.fecha, ds.abreviatura, v.serie, v.numero, v.monto_total, v.estado 
from orden_interna_ventas as oiv 
inner join ventas as v on v.id_venta = oiv.id_venta 
inner join documentos_sunat as ds on ds.id_documento = v.id_documento
where oiv.id_orden_interna = '" . $this->id_orden_interna . "'";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "insert into orden_interna_ventas values ('" . $this->id_orden_interna . "', '" . $this->id_venta . "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }


}