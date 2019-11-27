<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 06/08/19
 * Time: 09:47 AM
 */
require_once 'cl_conectar.php';

class cl_venta_cobro
{
    private $id_cobro;
    private $id_venta;
    private $fecha;
    private $monto;
    private $id_usuario;
    private $id_movimiento;
    private $c_conectar;

    /**
     * cl_venta_cobro constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCobro()
    {
        return $this->id_cobro;
    }

    /**
     * @param mixed $id_cobro
     */
    public function setIdCobro($id_cobro)
    {
        $this->id_cobro = $id_cobro;
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
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdMovimiento()
    {
        return $this->id_movimiento;
    }

    /**
     * @param mixed $id_movimiento
     */
    public function setIdMovimiento($id_movimiento)
    {
        $this->id_movimiento = $id_movimiento;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_cobro) + 1, 1) as codigo 
        from ventas_cobros";
        $this->id_cobro = $this->c_conectar->get_valor_query($sql, "codigo");
    }


    public function insertar()
    {
        $sql = "insert into ventas_cobros values ('" . $this->id_cobro . "', '" . $this->id_venta . "', '" . $this->fecha . "', '" . $this->monto . "', 
        '" . $this->id_usuario . "', '" . $this->id_movimiento . "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}