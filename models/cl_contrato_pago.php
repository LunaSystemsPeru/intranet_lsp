<?php

require_once 'cl_conectar.php';

class cl_contrato_pago
{
    private $id_contrato;
    private $id_movimiento;
    private $c_conectar;

    /**
     * cl_contrato_pago constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdContrato()
    {
        return $this->id_contrato;
    }

    /**
     * @param mixed $id_contrato
     */
    public function setIdContrato($id_contrato)
    {
        $this->id_contrato = $id_contrato;
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

    public function insertar()
    {
        $sql = "insert into contratos_pagos values ('" . $this->id_contrato . "', '" . $this->id_movimiento. "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas () {
        $sql = "select bm.id_movimiento, bm.fecha, bm.sale, cb.nombre
        from contratos_pagos as cp 
        inner join bancos_movimientos bm on cp.id_movimiento = bm.id_movimiento
        inner join caja_bancos cb on bm.id_banco = cb.id_banco
        where cp.id_contrato = '$this->id_contrato' ";
        return $this->c_conectar->get_Cursor($sql);
    }
}