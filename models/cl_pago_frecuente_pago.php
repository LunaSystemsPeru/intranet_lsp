<?php

require_once 'cl_conectar.php';

class cl_pago_frecuente_pago
{
    private $id_movimiento;
    private $id_frecuente;
    private $c_conectar;

    /**
     * cl_pago_frecuente_pago constructor.
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
    public function getIdFrecuente()
    {
        return $this->id_frecuente;
    }

    /**
     * @param mixed $id_frecuente
     */
    public function setIdFrecuente($id_frecuente)
    {
        $this->id_frecuente = $id_frecuente;
    }

    public function insertar()
    {
        $sql = "insert into pagos_frecuente_pago values ('" . $this->id_movimiento . "', '" . $this->id_frecuente. "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilasActual () {
        $sql = "select bm.id_movimiento, bm.fecha, bm.sale, cb.nombre
        from pagos_frecuente_pago as pfp 
        inner join bancos_movimientos bm on pfp.id_movimiento = bm.id_movimiento
        inner join caja_bancos cb on bm.id_banco = cb.id_banco
        inner join pagos_frecuentes pf on pfp.id_frecuente = pf.id_frecuente 
        where pfp.id_frecuente = '$this->id_frecuente' and month(bm.fecha) = month(pf.fecha_recordatorio)";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function verFilasTodos () {
        $sql = "select bm.id_movimiento, bm.fecha, bm.sale, cb.nombre
        from pagos_frecuente_pago as pfp 
        inner join bancos_movimientos bm on pfp.id_movimiento = bm.id_movimiento
        inner join caja_bancos cb on bm.id_banco = cb.id_banco
        inner join pagos_frecuentes pf on pfp.id_frecuente = pf.id_frecuente 
        where pfp.id_frecuente = '$this->id_frecuente' and DATE_FORMAT(bm.fecha, '%Y%m') < date_format(curdate(), '%Y%m')";
        return $this->c_conectar->get_Cursor($sql);
    }
}