<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 06/08/19
 * Time: 09:43 AM
 */
require_once 'cl_conectar.php';

class cl_banco_movimiento
{
    private $id_movimiento;
    private $id_banco;
    private $fecha;
    private $descripcion;
    private $ingresa;
    private $sale;
    private $id_usuario;
    private $id_clasificacion;
    private $c_conectar;

    /**
     * cl_banco_movimiento constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getIngresa()
    {
        return $this->ingresa;
    }

    /**
     * @param mixed $ingresa
     */
    public function setIngresa($ingresa)
    {
        $this->ingresa = $ingresa;
    }

    /**
     * @return mixed
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param mixed $sale
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
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
    public function getIdClasificacion()
    {
        return $this->id_clasificacion;
    }

    /**
     * @param mixed $id_clasificacion
     */
    public function setIdClasificacion($id_clasificacion)
    {
        $this->id_clasificacion = $id_clasificacion;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_movimiento) + 1, 1) as codigo 
        from bancos_movimientos";
        $this->id_movimiento = $this->c_conectar->get_valor_query($sql, "codigo");
    }


    public function insertar()
    {
        $sql = "insert into bancos_movimientos values ('" . $this->id_movimiento . "', '" . $this->id_banco. "', '" . $this->fecha. "', '" . $this->descripcion. "', 
        '" . $this->ingresa. "', '" . $this->sale. "', '" . $this->id_usuario. "', '" . $this->id_clasificacion. "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public  function  ver_ingresos_mensuales () {
        $sql = "select m.id as mes, ifnull(sum(bm.ingresa), 0) as ingresos, ifnull(sum(bm.sale), 0) as egresos 
from meses as m 
LEFT join bancos_movimientos as bm on month(bm.fecha) = m.id and year(bm.fecha) = year(CURRENT_DATE())
group by m.id";
        return $this->c_conectar->get_json_rows($sql);
    }


}